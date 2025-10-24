<?php

namespace App\Http\Controllers;

use App\Models\AudioFile;
use App\Models\PodcastCategory;
use App\Models\PodcastKeyword;
use App\Models\Podcast;
use App\Models\Section;
use App\Models\Page;
use App\Models\PodcastHistory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AmissfsController extends Controller
{

    protected $modelPodcastCategory;
    protected $modelPodcast;
    protected $AudioFile;
    protected $modelSection;
    protected $modelPage;
    protected $modelHistory;
    protected $modelPodcastKeyword;

    public function __construct(PodcastCategory $podcastcategoriesM, Podcast $podcastM, AudioFile $audioM, Section $sectionM, Page $pageM, PodcastHistory $podcastHistoryM, PodcastKeyword $podcastKeyM)
    {
        $this->modelPodcastCategory = $podcastcategoriesM;
        $this->modelPodcast = $podcastM;
        $this->AudioFile = $audioM;
        $this->modelSection = $sectionM;
        $this->modelPage = $pageM;
        $this->modelHistory = $podcastHistoryM;
        $this->modelPodcastKeyword = $podcastKeyM;
    }

    public function home()
    {
        return view('amissfs.home');
    }
    ///////////////////////SUBCATEGORY/////////////////////////////////
    public function association()
    {
        return view('amissfs.subcategory')->with('page', 0);
    }
    public function editions()
    {
        return view('amissfs.subcategory')->with('page', 1);
    }
    public function bulletin()
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);

        $latestRecord = $this->modelPage
            ->where('section_id', $section->id)
            ->where('is_active', 1)
            ->where('is_deleted', 0)
            ->orderByDesc('number')
            ->firstOrFail();

        return view('amissfs.subcategory', [
            'page'         => 2,
            'latestRecord' => $latestRecord,
            'section_id'   => $section->id,
        ]);
    }
    public function romKurier()
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);

        $latestRecord = $this->modelPage
            ->where('section_id', $section->id)
            ->where('is_active', 1)
            ->where('is_deleted', 0)
            ->orderByDesc('number')
            ->firstOrFail();

        return view('amissfs.subcategory', [
            'page'         => 3,
            'latestRecord' => $latestRecord,
            'section_id'   => $section->id,
        ]);
    }
    public function bookStore()
    {
        return view('amissfs.subcategory')->with('page', 4);
    }
    public function dons()
    {
        return view('amissfs.subcategory')->with('page', 5);
    }
    /////////////////////PAGES//////////////////////
    public function associationpage()
    {
        return view('amissfs.pages')->with('page', 0);
    }
    public function lebulletinDownload($number)
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);

        $latestRecord = $this->modelPage
            ->where('section_id', $section->id)
            ->where('is_active', 1)
            ->where('is_deleted', 0)
            ->where('number', $number)
            ->firstOrFail();

        return view('amissfs.pages', [
            'page' => 1,
            'latestRecord' => $latestRecord,
            'section_id' => $section->id
        ]);
    }
    public function lebulletinArchive()
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);
        $bulletinArchive = $this->modelPage->getAllBySectionObject($section)->sortByDesc('number');

        return view('amissfs.pages', [
            'page' => 2,
            'bulletinArchive' => $bulletinArchive,
            'section_id' => $section->id,
        ]);
    }
    public function lebulletinArchivePast($number)
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);
        $archive = $this->modelPage
            ->where('section_id', $section->id)
            ->where('is_active', 1)
            ->where('is_deleted', 0)
            ->where('number', $number)
            ->first();

        return view('amissfs.pages', [
            'page' => 8,
            'archive' => $archive,
            'section_id' => $section->id
        ]);
    }
    public function lebulletinCommander()
    {
        return view('amissfs.pages')->with('page', 3);
    }
    public function romKurierDownload($number)
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);

        $latestRecord = $this->modelPage
            ->where('section_id', $section->id)
            ->where('is_active', 1)
            ->where('is_deleted', 0)
            ->where('number', $number)
            ->firstOrFail();


        return view('amissfs.pages', [
            'page' => 4,
            'latestRecord' => $latestRecord,
            'section_id' => $section->id
        ]);
    }
    public function romKurierArchive()
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);
        $romKurierArchive = $this->modelPage->getAllBySectionObject($section)->sortByDesc('number');

        return view('amissfs.pages', [
            'page' => 5,
            'romKurierArchive' => $romKurierArchive,
            'section_id' => $section->id,
        ]);
    }
    public function romKurierCommander()
    {
        return view('amissfs.pages')->with('page', 6);
    }
    public function romKurierArchivePast($number)
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);
        $archive = $this->modelPage
            ->where('section_id', $section->id)
            ->where('is_active', 1)
            ->where('is_deleted', 0)
            ->where('number', $number)
            ->first();

        return view('amissfs.pages', [
            'page' => 7,
            'archive' => $archive,
            'section_id' => $section->id
        ]);
    }
    /////////////////////////NEWSLETTER/////////////////////
    public function amissfsNewsletter()
    {
        return view('amissfs.newsletter');
    }
    /////////////////////////CONTACT/////////////////////
    public function amissfsContact()
    {
        return view('amissfs.contact');
    }
    ///////////////////////////PODCAST///////////////////////
    public function podcasts()
    {
        $categories = $this->modelPodcastCategory->getAllCategories();
        $keywords = $this->modelPodcastKeyword->getAllKeywords();
        return view('amissfs.podcast-home', compact('categories', 'keywords'));
    }

    public function getCategoryPodcast($url)
    {
        $category = $this->modelPodcastCategory->where('url', $url)->where('is_active', '1')
            ->where('is_deleted', '0')->first();

        $podcasts = $this->modelPodcast->getPodcastByCategory($category->id);
        $keywords = $this->modelPodcastKeyword->getAllKeywords();
        return view('amissfs.audio-library', [
            'category' => $category,
            'podcasts' => $podcasts,
            'category_id' => $category->id,
            'keywords' => $keywords,
            'page' => 0,
        ]);
    }

    public function getPodcast($categoryUrl, $podcastUrl)
    {

        $category = $this->modelPodcastCategory::where('url', $categoryUrl)
            ->where('is_active', 1)
            ->where('is_deleted', 0)
            ->firstOrFail();

        $podcast = $this->modelPodcast->where('url', $podcastUrl)
            ->where('category_id', $category->id)
            ->where('is_active', 1)
            ->where('is_deleted', 0)
            ->firstOrFail();

        $keywords = $this->modelPodcastKeyword->getAllKeywords();
        $podcastKeywords = $podcast->keywords->pluck('id')->toArray();

        $audioFiles = $podcast->audioFiles()
            ->where('is_active', 1)
            ->where('is_deleted', 0)
            ->get();
        $audioFiles = $audioFiles->isEmpty() ? [] : $audioFiles->toArray();

        $podcastsByAuthor = $this->modelPodcast
            ->where('author', $podcast->author)
            ->where('id', '!=', $podcast->id)
            ->where('is_active', 1)
            ->where('is_deleted', 0)
            ->inRandomOrder()
            ->limit(5)
            ->get();

        $user = Auth::user();
        if ($user) {
            $podcastHistory = $this->modelHistory::firstOrCreate([
                'user_id' => $user->user_identifier,
                'podcast_id' => $podcast->podcast_identifier,
            ]);
        }
        return view('amissfs.audio-library', [
            'category' => $category,
            'podcast' => $podcast,
            'keywords' => $keywords,
            'podcastKeywords' => $podcastKeywords,
            'podcastsByAuthor' => $podcastsByAuthor,
            'podcastDetails' => [
                'audio_files' => $audioFiles,
            ],
            'page' => 1,
        ]);
    }

    public function history()
    {
        $user = Auth::user();
        $history = $this->modelHistory::where('user_id', $user->user_identifier)
            ->where('is_active', '1')
            ->where('is_deleted', '0')
            ->whereHas('podcast', function ($query) {
                $query->where('is_active', '1')
                    ->where('is_deleted', '0');
            })
            ->orderBy('updated_at', 'desc')
            ->with(['podcast' => function ($query) {
                $query->where('is_active', '1')
                    ->where('is_deleted', '0')
                    ->with(['category' => function ($query) {
                        $query->where('is_active', '1')
                            ->where('is_deleted', '0');
                    }]);
            }])
            ->get();
        return view('amissfs.history', compact('history'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $categories = $this->modelPodcastCategory::where(function ($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%")
                ->orWhereHas('keywords', function ($q) use ($query) {
                    $q->where('keyword', 'LIKE', "%{$query}%")
                        ->where('podcast_keywords.is_active', '1')
                        ->where('podcast_keywords.is_deleted', '0');
                });
        })
            ->where('is_active', 1)
            ->where('is_deleted', 0)
            ->with('keywords')
            ->get();

        $podcasts = $this->modelPodcast::where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('title', 'LIKE', "%{$query}%")
                ->orWhere('author', 'LIKE', "%{$query}%")
                ->orWhereHas('keywords', function ($q) use ($query) {
                    $q->where('keyword', 'LIKE', "%{$query}%")
                        ->where('podcast_keywords.is_active', '1')
                        ->where('podcast_keywords.is_deleted', '0');
                });
        })
            ->where('is_active', 1)
            ->where('is_deleted', 0)
            ->with('keywords')
            ->get();

        $html = view('amissfs.ajax-search-podcast', compact('categories', 'podcasts'))->render();

        return response()->json(['html' => $html]);
    }

    public function filterResults(Request $request, $sectionId)
    {
        $query = $this->modelPage->where('section_id', $sectionId)
            ->where('is_active', 1)
            ->where('is_deleted', 0)
            ->orderBy('number', 'desc');

        if ($request->has('year') && !empty($request->year)) {
            $query->where('year', $request->year);
        }

        if ($request->has('searchText') && !empty($request->searchText)) {
            $searchText = $request->searchText;
            $query->where(function ($q) use ($searchText) {
                $q->where('title', 'like', '%' . $searchText . '%')
                    ->orWhere('subtitle', 'like', '%' . $searchText . '%');
            });
        }

        $perPage = $request->get('perPage', 10);
        $page = $request->get('page', 1);

        if ($perPage === 'all') {
            $results = $query->get();
            $hasMore = false;
        } else {
            $perPage = (int)$perPage;
            $offset = ($page - 1) * $perPage;
            $results = $query->skip($offset)->take($perPage)->get();
            $totalCount = $query->count();
            $hasMore = $offset + $perPage < $totalCount;
        }

        $html = view('amissfs.amissfs-filter', ['results' => $results, 'sectionId' => $sectionId])->render();

        return response()->json([
            'html' => $html,
            'hasMore' => $hasMore,
        ]);
    }
}
