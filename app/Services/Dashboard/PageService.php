<?php

namespace App\Services\Dashboard;

use App\Models\Page;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageService
{
    /**
     * @var \App\Services\Dashboard\PageMediaService
     */
    protected $mediaService;

    public function __construct(PageMediaService $mediaService)
    {
        $this->mediaService = $mediaService;
    }

    /**
     * List pages with optional filtering, ordered per content type.
     *
     * @param array $filters section_id, type, search, active
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function list(array $filters = [], int $perPage = 20): LengthAwarePaginator
    {
        $query = Page::with('section');

        if (!empty($filters['section_id'])) {
            $query->where('section_id', $filters['section_id']);
        }

        if (!empty($filters['active']) && in_array($filters['active'], ['1', '0'])) {
            $query->where('is_active', $filters['active']);
        }

        if (!empty($filters['search'])) {
            $term = trim($filters['search']);
            $query->where(function ($q) use ($term) {
                $q->where('title', 'like', "%{$term}%")
                    ->orWhere('subtitle', 'like', "%{$term}%")
                    ->orWhere('category', 'like', "%{$term}%")
                    ->orWhere('page_identifier', 'like', "%{$term}%");
            });
        }

        $type = $filters['type'] ?? null;
        $typeDefinition = $type ? $this->typeDefinition($type) : null;

        if ($typeDefinition) {
            $query->orderBy($typeDefinition['order_by'] ?? 'sort_order', $typeDefinition['order_direction'] ?? 'asc');
        } else {
            $query->orderByDesc('created_at');
        }

        return $query->paginate($perPage)->withQueryString();
    }

    /**
     * Data required by the create form.
     *
     * @return array
     */
    public function createData(): array
    {
        return [
            'sections' => Section::ordered()->get(),
            'types' => config('pages.types', []),
            'months' => config('pages.months', []),
        ];
    }

    /**
     * Data required by the edit form.
     *
     * @param \App\Models\Page $page
     * @return array
     */
    public function editData(Page $page): array
    {
        return [
            'page' => $page,
            'sections' => Section::ordered()->get(),
            'types' => config('pages.types', []),
            'type' => $this->typeForPage($page),
            'months' => config('pages.months', []),
        ];
    }

    /**
     * Create a page from validated data.
     *
     * @param array $data
     * @return \App\Models\Page
     */
    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $folderName = 'PA-' . uniqid('', true);

            $page = new Page();
            $page->page_identifier = $folderName;
            $page->user_id = Auth::user()->user_identifier;
            $page->section_id = $data['section_id'];
            $page->sort_order = $this->nextSortOrder((int) $data['section_id']);

            $this->fillFields($page, $data, []);

            $page->save();

            $stored = $this->mediaService->storeFiles($data, $folderName, []);
            if ($stored) {
                $page->fill($stored);
                $page->save();
            }

            $this->applyMediaMode($page, $data);

            return $page;
        });
    }

    /**
     * Update a page from validated data.
     *
     * @param \App\Models\Page $page
     * @param array $data
     * @return \App\Models\Page
     */
    public function update(Page $page, array $data)
    {
        return DB::transaction(function () use ($page, $data) {
            $oldFiles = [
                'icon' => $page->icon,
                'image' => $page->image,
                'image_responsive' => $page->image_responsive,
                'events_image' => $page->events_image,
                'pdf' => $page->pdf,
                'upload_video' => $page->upload_video,
            ];

            $this->fillFields($page, $data, $oldFiles);

            $stored = $this->mediaService->storeFiles($data, $page->page_identifier, $oldFiles);
            if ($stored) {
                $page->fill($stored);
            }

            $this->applyMediaMode($page, $data);

            $page->save();

            return $page;
        });
    }

    /**
     * Soft-delete a page.
     *
     * @param \App\Models\Page $page
     * @return void
     */
    public function delete(Page $page)
    {
        $page->delete();
    }

    /**
     * Toggle the active state of a page.
     *
     * @param \App\Models\Page $page
     * @return bool New active state
     */
    public function toggleActive(Page $page)
    {
        $page->update(['is_active' => !$page->is_active]);

        return (bool) $page->is_active;
    }

    /**
     * Move a page one step up or down within its section.
     *
     * @param \App\Models\Page $page
     * @param string $direction up|down
     * @return void
     */
    public function reorder(Page $page, string $direction)
    {
        DB::transaction(function () use ($page, $direction) {
            $neighbor = $direction === 'up'
                ? Page::where('section_id', $page->section_id)
                    ->where(function ($q) use ($page) {
                        $q->where('sort_order', '<', $page->sort_order)
                            ->orWhere(function ($q2) use ($page) {
                                $q2->where('sort_order', '=', $page->sort_order)
                                    ->where('id', '<', $page->id);
                            });
                    })
                    ->orderByDesc('sort_order')
                    ->orderByDesc('id')
                    ->first()
                : Page::where('section_id', $page->section_id)
                    ->where(function ($q) use ($page) {
                        $q->where('sort_order', '>', $page->sort_order)
                            ->orWhere(function ($q2) use ($page) {
                                $q2->where('sort_order', '=', $page->sort_order)
                                    ->where('id', '>', $page->id);
                            });
                    })
                    ->orderBy('sort_order')
                    ->orderBy('id')
                    ->first();

            if (!$neighbor) {
                return;
            }

            $tmp = $page->sort_order;
            $page->sort_order = $neighbor->sort_order;
            $neighbor->sort_order = $tmp;

            $page->save();
            $neighbor->save();
        });
    }

    /**
     * Content type slug for a given page.
     *
     * @param \App\Models\Page $page
     * @return string
     */
    public function typeForPage(Page $page): string
    {
        return $this->typeForSection($page->section);
    }

    /**
     * Content type slug matching a section (falls back to the default type).
     *
     * @param \App\Models\Section|null $section
     * @return string
     */
    public function typeForSection(?Section $section): string
    {
        if (!$section) {
            return config('pages.default_type', 'generic');
        }

        $title = Str::lower($section->title);

        foreach (config('pages.types', []) as $slug => $definition) {
            $matches = $definition['sections'] ?? [];
            if ($this->matchesSection($title, $matches)) {
                return $slug;
            }
        }

        return config('pages.default_type', 'generic');
    }

    /**
     * Resolve the content type definition, falling back to the default.
     *
     * @param string|null $type
     * @return array
     */
    public function typeDefinition(?string $type): array
    {
        $types = config('pages.types', []);
        $default = config('pages.default_type', 'generic');

        return $types[$type] ?? $types[$default] ?? [];
    }

    /**
     * Image dimension rules for a content type (empty when not defined).
     *
     * @param string|null $type
     * @return array
     */
    public function imageRules(?string $type): array
    {
        $definition = $this->typeDefinition($type);
        $validationKey = $definition['validation'] ?? null;

        if (!$validationKey) {
            return [];
        }

        return config('pages.image_rules.' . $validationKey, []);
    }

    /**
     * Map of section_id => content type slug for every section.
     *
     * @return array
     */
    public function sectionTypeMap(): array
    {
        $map = [];

        foreach (Section::ordered()->get() as $section) {
            $map[$section->id] = $this->typeForSection($section);
        }

        return $map;
    }

    /**
     * All sections that can receive pages, ordered.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function sections()
    {
        return Section::ordered()->get();
    }

    /**
     * Populate the scalar fields of a page from validated data.
     *
     * @param \App\Models\Page $page
     * @param array $data
     * @param array $oldFiles
     * @return void
     */
    protected function fillFields(Page $page, array $data, array $oldFiles)
    {
        $fillable = [
            'category', 'url', 'number', 'year', 'title', 'subtitle',
            'content', 'content_sec', 'link', 'html_source',
        ];

        foreach ($fillable as $field) {
            if (array_key_exists($field, $data)) {
                $page->{$field} = $data[$field];
            }
        }

        $page->section_id = $data['section_id'] ?? $page->section_id;

        if (array_key_exists('period', $data)) {
            $page->period = is_array($data['period'])
                ? implode(',', $data['period'])
                : $data['period'];
        }

        if (array_key_exists('is_active', $data)) {
            $page->is_active = $data['is_active'];
        }

        if (array_key_exists('sort_order', $data)) {
            $page->sort_order = (int) $data['sort_order'];
        }

        if (array_key_exists('created_at', $data) && $data['created_at']) {
            $page->created_at = Carbon::parse($data['created_at']);
        }

        if (!empty($data['remove_pdf']) && $page->pdf) {
            $this->mediaService->deleteFiles(['pdf' => $page->pdf]);
            $page->pdf = null;
        }
    }

    /**
     * Apply the media-mode logic inherited from the legacy editor
     * (mutually exclusive link / video / events image for event pages).
     *
     * @param \App\Models\Page $page
     * @param array $data
     * @return void
     */
    protected function applyMediaMode(Page $page, array $data)
    {
        $mode = $data['media_mode'] ?? null;

        if ($mode === 'video') {
            $page->link = null;
            $page->events_image = null;
        } elseif ($mode === 'image') {
            $page->link = null;
            $page->upload_video = null;
        } elseif ($mode === 'link') {
            $this->mediaService->deleteFiles([
                'upload_video' => $page->upload_video,
                'events_image' => $page->events_image,
            ]);
            $page->upload_video = null;
            $page->events_image = null;
        }
    }

    /**
     * Next available sort_order inside a section.
     *
     * @param int $sectionId
     * @return int
     */
    protected function nextSortOrder(int $sectionId): int
    {
        return (int) Page::where('section_id', $sectionId)->max('sort_order') + 1;
    }

    /**
     * Whether a section title matches any slug in the type mapping.
     *
     * @param string $title
     * @param array $matches
     * @return bool
     */
    protected function matchesSection(string $title, array $matches): bool
    {
        foreach ($matches as $match) {
            if ($match === $title || strpos($title, $match) !== false || strpos($match, $title) !== false) {
                return true;
            }
        }

        return false;
    }
}
