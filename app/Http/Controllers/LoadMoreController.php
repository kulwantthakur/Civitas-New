<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Page;
use Illuminate\Http\Request;

class LoadMoreController extends Controller
{
    protected $modelSection;
    protected $modelPage;

    public function __construct(Section $sectionM, Page $pageM)
    {
        $this->modelSection = $sectionM;
        $this->modelPage = $pageM;
    }

    public function loadMoreSection(Request $request)
    {
        $limit = 5;
        $page = $request->page ?? 1;
        $sectionId = $request->section_id;

        $posts = $this->modelPage
            ->where('section_id', $sectionId)
            ->where('is_active', 1)
            ->where('is_deleted', 0)
            ->paginate($limit);

        $hasMore = $posts->hasMorePages();

        return response()->json([
            'html' => view('civitas.post-item', ['posts' => $posts, 'sectionId' => $sectionId])->render(),
            'has_more' => $hasMore
        ]);
    }

    public function loadMoreCategory(Request $request)
    {
        $limit = 5;
        $page = $request->page ?? 1;
        $category = $request->category;
        $sectionId = $request->section_id;
        $categoryPost = $this->modelPage
            ->where('section_id', $sectionId)
            ->where('category', $category)
            ->where('is_active', 1)
            ->where('is_deleted', 0)
            ->paginate($limit);

        $hasMore = $categoryPost->hasMorePages();

        return response()->json([
            'html' => view('civitas.post-item', ['posts' => $categoryPost, 'type' => 'category', 'sectionId' => $sectionId])->render(),
            'has_more' => $hasMore
        ]);
    }
}
