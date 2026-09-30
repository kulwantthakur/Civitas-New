<?php

namespace App\Traits;

use App\Models\Section;

/**
 * Trait for resolving sections from routes.
 * Centralizes the common pattern of getting section by route.
 */
trait ResolvesSection
{
    /**
     * Get section by current route path.
     *
     * @param Section $sectionModel
     * @return Section|null
     */
    protected function getSectionFromRoute(Section $sectionModel)
    {
        $route = \Request::path();
        return $sectionModel->getSectionByRoute($route);
    }

    /**
     * Get section by specific route.
     *
     * @param Section $sectionModel
     * @param string $route
     * @return Section|null
     */
    protected function getSectionByRoute(Section $sectionModel, $route)
    {
        return $sectionModel->getSectionByRoute($route);
    }

    /**
     * Get active pages for a section with standard ordering.
     *
     * @param Section $section
     * @param int $limit
     * @param string $orderBy
     * @param string $orderDirection
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getActivePagesForSection($section, $limit = null, $orderBy = 'created_at', $orderDirection = 'desc')
    {
        $query = $section->pages()
            ->active()
            ->orderBy($orderBy, $orderDirection);
        
        if ($limit) {
            $query->limit($limit);
        }
        
        return $query->get();
    }
}
