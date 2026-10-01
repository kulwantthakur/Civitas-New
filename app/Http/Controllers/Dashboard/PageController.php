<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Page\ReorderPageRequest;
use App\Http\Requests\Dashboard\Page\StorePageRequest;
use App\Http\Requests\Dashboard\Page\TogglePageRequest;
use App\Http\Requests\Dashboard\Page\UpdatePageRequest;
use App\Models\Page;
use App\Models\Section;
use App\Services\Dashboard\PageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * @var \App\Services\Dashboard\PageService
     */
    protected $pageService;

    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    /**
     * List pages with filtering and pagination.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $filters = [
            'section_id' => (int) $request->input('section_id'),
            'type' => $request->input('type'),
            'search' => $request->input('search'),
            'active' => $request->input('active'),
        ];

        $pages = $this->pageService->list($filters);
        $sections = $this->pageService->sections();

        $sectionTypes = [];
        foreach ($sections as $section) {
            $slug = $this->pageService->typeForSection($section);
            $definition = $this->pageService->typeDefinition($slug);
            $sectionTypes[$section->id] = [
                'slug' => $slug,
                'label' => $definition['label'] ?? $slug,
                'icon' => $definition['icon'] ?? 'fa-file-alt',
            ];
        }

        return view('dashboard.pages.index', compact('pages', 'sections', 'filters', 'sectionTypes'));
    }

    /**
     * Show the create page form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $data = $this->pageService->createData();
        $data['sectionTypeMap'] = $this->pageService->sectionTypeMap();

        return view('dashboard.pages.create', $data);
    }

    /**
     * Store a newly created page.
     *
     * @param \App\Http\Requests\Dashboard\Page\StorePageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePageRequest $request)
    {
        $this->pageService->create($request->validated());

        return redirect()->route('dashboard.pages.index')
            ->with('success', 'Page créée avec succès.');
    }

    /**
     * Show the edit page form.
     *
     * @param \App\Models\Page $page
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Page $page)
    {
        $data = $this->pageService->editData($page);
        $data['sectionTypeMap'] = $this->pageService->sectionTypeMap();

        return view('dashboard.pages.edit', $data);
    }

    /**
     * Update the specified page.
     *
     * @param \App\Http\Requests\Dashboard\Page\UpdatePageRequest $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        $this->pageService->update($page, $request->validated());

        return redirect()->route('dashboard.pages.edit', $page)
            ->with('success', 'Page mise à jour avec succès.');
    }

    /**
     * Soft-delete the specified page.
     *
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Page $page)
    {
        $this->pageService->delete($page);

        return redirect()->route('dashboard.pages.index')
            ->with('success', 'Page supprimée avec succès.');
    }

    /**
     * Toggle the active state of the specified page.
     *
     * @param \App\Http\Requests\Dashboard\Page\TogglePageRequest $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggleActive(TogglePageRequest $request, Page $page)
    {
        $active = $this->pageService->toggleActive($page);

        return response()->json([
            'success' => true,
            'active' => $active,
            'message' => $active
                ? 'Page activée avec succès.'
                : 'Page désactivée avec succès.',
        ]);
    }

    /**
     * Move a page up or down within its section.
     *
     * @param \App\Http\Requests\Dashboard\Page\ReorderPageRequest $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function reorder(ReorderPageRequest $request, Page $page)
    {
        $this->pageService->reorder($page, $request->input('direction'));

        return response()->json([
            'success' => true,
            'message' => 'Ordre mis à jour avec succès.',
        ]);
    }
}
