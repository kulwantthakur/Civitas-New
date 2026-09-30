<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Section\ReorderSectionRequest;
use App\Http\Requests\Dashboard\Section\StoreSectionRequest;
use App\Http\Requests\Dashboard\Section\ToggleSectionRequest;
use App\Http\Requests\Dashboard\Section\UpdateSectionRequest;
use App\Models\Section;
use App\Services\Dashboard\SectionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * @var \App\Services\Dashboard\SectionService
     */
    protected $sectionService;

    public function __construct(SectionService $sectionService)
    {
        $this->sectionService = $sectionService;
    }

    /**
     * List all sections with their page counts.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $sections = $this->sectionService->list();

        return view('dashboard.sections.index', compact('sections'));
    }

    /**
     * Store a newly created section.
     *
     * @param \App\Http\Requests\Dashboard\Section\StoreSectionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSectionRequest $request)
    {
        $this->sectionService->create($request->validated());

        return redirect()->route('dashboard.sections.index')
            ->with('success', 'Section créée avec succès.');
    }

    /**
     * Update the specified section.
     *
     * @param \App\Http\Requests\Dashboard\Section\UpdateSectionRequest $request
     * @param \App\Models\Section $section
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSectionRequest $request, Section $section)
    {
        $this->sectionService->update($section, $request->validated());

        return redirect()->route('dashboard.sections.index')
            ->with('success', 'Section mise à jour avec succès.');
    }

    /**
     * Soft-delete the specified section.
     *
     * @param \App\Models\Section $section
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Section $section)
    {
        $this->sectionService->delete($section);

        return redirect()->route('dashboard.sections.index')
            ->with('success', 'Section supprimée avec succès.');
    }

    /**
     * Toggle the active state of the specified section.
     *
     * @param \App\Http\Requests\Dashboard\Section\ToggleSectionRequest $request
     * @param \App\Models\Section $section
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggleActive(ToggleSectionRequest $request, Section $section)
    {
        $active = $this->sectionService->toggleActive($section);

        return response()->json([
            'success' => true,
            'active' => $active,
            'message' => $active
                ? 'Section activée avec succès.'
                : 'Section désactivée avec succès.',
        ]);
    }

    /**
     * Move a section up or down in the ordering.
     *
     * @param \App\Http\Requests\Dashboard\Section\ReorderSectionRequest $request
     * @param \App\Models\Section $section
     * @return \Illuminate\Http\JsonResponse
     */
    public function reorder(ReorderSectionRequest $request, Section $section)
    {
        $this->sectionService->reorder($section, $request->input('direction'));

        return response()->json([
            'success' => true,
            'message' => 'Ordre mis à jour avec succès.',
        ]);
    }
}
