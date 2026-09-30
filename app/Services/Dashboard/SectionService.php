<?php

namespace App\Services\Dashboard;

use App\Models\Section;
use Illuminate\Support\Facades\DB;

class SectionService
{
    /**
     * List sections with their page count, ordered by display order.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list()
    {
        return Section::withCount('pages')->ordered()->get();
    }

    /**
     * Create a new section, appending it at the end of the ordering.
     *
     * @param array $data
     * @return \App\Models\Section
     */
    public function create(array $data)
    {
        $data['sort_order'] = (int) Section::max('sort_order') + 1;

        return Section::create($data);
    }

    /**
     * Update a section.
     *
     * @param \App\Models\Section $section
     * @param array $data
     * @return \App\Models\Section
     */
    public function update(Section $section, array $data)
    {
        $section->update($data);

        return $section;
    }

    /**
     * Soft-delete a section. Pages keep their FK but are no longer
     * reachable once their section is gone.
     *
     * @param \App\Models\Section $section
     * @return void
     */
    public function delete(Section $section)
    {
        $section->delete();
    }

    /**
     * Toggle the active state of a section.
     *
     * @param \App\Models\Section $section
     * @return bool New active state
     */
    public function toggleActive(Section $section)
    {
        $section->update(['is_active' => !$section->is_active]);

        return (bool) $section->is_active;
    }

    /**
     * Move a section one step up or down in the ordering.
     *
     * @param \App\Models\Section $section
     * @param string $direction up|down
     * @return void
     */
    public function reorder(Section $section, string $direction)
    {
        DB::transaction(function () use ($section, $direction) {
            $neighbor = $direction === 'up'
                ? Section::where('sort_order', '<', $section->sort_order)
                    ->orWhere(function ($q) use ($section) {
                        $q->where('sort_order', '=', $section->sort_order)
                          ->where('id', '<', $section->id);
                    })
                    ->orderByDesc('sort_order')
                    ->orderByDesc('id')
                    ->first()
                : Section::where('sort_order', '>', $section->sort_order)
                    ->orWhere(function ($q) use ($section) {
                        $q->where('sort_order', '=', $section->sort_order)
                          ->where('id', '>', $section->id);
                    })
                    ->orderBy('sort_order')
                    ->orderBy('id')
                    ->first();

            if (!$neighbor) {
                return;
            }

            $tmp = $section->sort_order;
            $section->sort_order = $neighbor->sort_order;
            $neighbor->sort_order = $tmp;

            $section->save();
            $neighbor->save();
        });
    }

    /**
     * Available content types, keyed by slug, with label + icon for forms.
     *
     * @return array
     */
    public function contentTypes()
    {
        $types = config('pages.types', []);
        $default = config('pages.default_type', 'generic');

        $options = [];
        foreach ($types as $slug => $definition) {
            $options[$slug] = [
                'label' => $definition['label'],
                'description' => $definition['description'] ?? null,
                'icon' => $definition['icon'] ?? 'fa-file-alt',
            ];
        }

        return [
            'options' => $options,
            'default' => $default,
        ];
    }
}
