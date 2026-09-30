<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Page;
use App\Models\FormSubmission;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CivitasController extends Controller
{
    protected $modelSection;
    protected $modelPage;
    protected $categorynews;
    protected $votes;

    public function __construct(Section $sectionM, Page $pageM)
    {
        $this->modelSection = $sectionM;
        $this->modelPage = $pageM;

        $this->categorynews = [
            'analyses' => 'Analyses',
            'communiques' => 'Communiqués Et Comptes Rendus',
            'entretiens' => 'Entretiens',
            'international' => 'International',
            'opinions' => 'Opinions',
            'pelerinages' => 'Pèlerinages De Suisse',
            'votations' => 'Votations',
        ];

        $this->votes = [
            'initiatives' => 'initiative-populaire',
            'referendums' => 'votations'
        ];
    }

    public function home()
    {
        $votes = $this->modelPage->where('section_id', 5)->get();

        $latestnews = $this->modelPage->orderBy('created_at', 'desc')->where('section_id', 6)->where('is_active', '1')
            ->take(4)->get();


        return view('civitas.home', compact('latestnews', 'votes'));
    }
    /////////////////////NEWPAGE_ADD///////////////////////////////
    public function  civitasNewPage()
    {
        return view('civitas.new_page');
    }
    /////////////////////NEWSLETTER///////////////////////////////
    public function  civitasNewsletter()
    {
        return view('civitas.newsletter');
    }
    /////////////////////NEWS///////////////////////////////
    public function generateSlug($title)
    {
        // Safe iconv with error handling
        $converted = @iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $title);
        $title = $converted !== false ? $converted : $title;
        
        // Use Laravel's Str::slug for robust slug generation
        return Str::slug($title);
    }
    public function civitasNews()
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);
        $latestnews = $this->modelPage->getPaginatedBySection($section);
        $hasMore = $latestnews->hasMorePages();

        foreach ($latestnews as $news) {
            $news->slug = $this->generateSlug($news->title);
        }

        return view('civitas.news')
            ->with('page', 0)
            ->with('latestnews', $latestnews)
            ->with('section_id', $section->id)
            ->with('has_more', $hasMore);
    }

    public function civitasCategoriesNews($url)
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);
        $categorynews = $this->modelPage->getPaginatedByUrl($url, $section->id);

        foreach ($this->categorynews as $key => $value) {
            if ($key == $url) {
                $categoryTitle = $value;
            }
        }

        $hasMore = $categorynews->hasMorePages();

        return view('civitas.news')
            ->with('page', 1)
            ->with('categorynews', $categorynews)
            ->with('section_id', $section->id)
            ->with('categoryTitle', $categoryTitle)
            ->with('has_more', $hasMore);
    }

    public function civitasHeadline($url, $slug)
    {
        $title = str_replace('-', ' ', $slug);
        $newsItem = $this->modelPage->getByTitleAndUrl($url, $title);

        $comments = FormSubmission::where('source_page', 'like', '%' . $newsItem->url . '%')
            ->where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('civitas.news', compact('newsItem', 'comments'))->with('page', 2);
    }

    /////////////////////PROGRAM-AND-VOTE///////////////////////////////////
    public function  civitasCatholicVote()
    {
        return view('civitas.program-and-vote')->with('page', 0);
    }

    public function  politicalProgramHome()
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);
        $allthemes = $this->modelPage->getAllBySectionObject($section);

        return view('civitas.program-and-vote', ['themes' => $allthemes])->with('page', 1)->with('section_id', $section->id);
    }
    public function  restorationCatholic()
    {
        return view('civitas.program-and-vote')->with('page', 2);
    }
    public function  politicalPrograms()
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);
        $positions = $this->modelPage->getAllBySectionObject($section);

        return view('civitas.program-and-vote', ['positions' => $positions])->with('page', 3);
    }

    public function programs($wordA, $wordB = null)
    {
        $urlToQuery = $wordB ? $wordA . '/' . $wordB : $wordA;
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);

        $current_page = $this->modelPage->getByUrl($urlToQuery, $section->id);

        return view('civitas.program-and-vote', compact('current_page', 'section'))->with('page', 4);
    }

    //////////////////////////////PARTICIPER///////////////////////////////////////////////////
    public function  civitasParticiper()
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);
        $caritas = $this->modelPage->getFirstBySection($section);

        return view('civitas.participer')->with('section_id', $section->id)->with('caritas', $caritas);
    }
    //////////////////////////////BECOME-MEMBER///////////////////////////////////////////////////
    public function  civitasMember()
    {
        return view('civitas.become-member')->with('page', 0);
    }
    public function  civitasAdvantages()
    {
        return view('civitas.become-member')->with('page', 1);
    }
    /////////////////////////////////MEMBERSHIP////////////////////////////////////////
    public function  civitasMembership()
    {
        return view('civitas.membership');
    }
    //////////////////////////////PARTICIPER_PAGES///////////////////////////////////////////////////
    public function  civitasJoin()
    {
        return view('civitas.participer-pages')->with('page', 0);
    }
    public function  civitasSocial()
    {
        return view('civitas.participer-pages')->with('page', 1);
    }
    public function  civitasGetInform($url)
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);
        $caritas_page = $this->modelPage->getByUrl($url, 2);

        return view('civitas.participer-pages', compact('caritas_page', 'section'))->with('page', 2);
    }
    //////////////////////////////AGENDA///////////////////////////////////////////////////

    public function civitasagenda(?string $range = null)
    {
        $dateCol    = 'created_at';
        $monthsCnt  = 4; // show 4 months total

        // --- Helpers ---
        $frMap = [
            'janvier' => 1,
            'fevrier' => 2,
            'février' => 2,
            'mars' => 3,
            'avril' => 4,
            'mai' => 5,
            'juin' => 6,
            'juillet' => 7,
            'aout' => 8,
            'août' => 8,
            'septembre' => 9,
            'octobre' => 10,
            'novembre' => 11,
            'decembre' => 12,
            'décembre' => 12,
        ];

        $buildSlug = function (Carbon $start, int $months = 4): string {
            $labels = collect(range(0, $months - 1))->map(function ($i) use ($start) {
                $d = $start->copy()->addMonths($i);
                // Full month in FR (lowercase), then slug without accents
                $label = $d->locale('fr')->isoFormat('MMMM');
                return Str::slug($label, '-', 'fr'); // e.g. "décembre" -> "decembre"
            });
            $year = $start->copy()->addMonths($months - 1)->year; // year of last month
            return $labels->implode('-') . '-' . $year;
        };

        // --- Decide startDate from URL or redirect to canonical ---
        if ($range) {
            // Expect: "{m1}-{m2}-{m3}-{m4}-{year}"
            $parts = array_values(array_filter(explode('-', $range)));
            if (count($parts) < 5) {
                // malformed → redirect to canonical "now"
                $canonical = $buildSlug(now()->startOfMonth(), $monthsCnt);
                return redirect()->route('civitas.agenda', ['range' => $canonical], 301);
            }

            $year = (int) array_pop($parts);
            $firstMonthRaw = $parts[0] ?? '';
            // Normalize month key (support both accented and non-accented)
            $firstMonthKey = Str::slug($firstMonthRaw, '-', 'fr'); // "février" => "fevrier"
            $monthNum = $frMap[$firstMonthKey] ?? null;

            if (!$monthNum || $year < 1900 || $year > 2100) {
                // invalid → redirect to canonical "now"
                $canonical = $buildSlug(now()->startOfMonth(), $monthsCnt);
                return redirect()->route('civitas.agenda', ['range' => $canonical], 301);
            }

            $startDate = Carbon::createFromDate($year, $monthNum, 1)->startOfMonth();
        } else {
            // No range → redirect to canonical for current month
            $canonical = $buildSlug(now()->startOfMonth(), $monthsCnt);
            return redirect()->route('civitas.agenda', ['range' => $canonical], 301);
        }

        $endDate = $startDate->copy()->addMonths($monthsCnt - 1)->endOfMonth();

        // --- Data queries (same logic as yours) ---
        $recentEvent = $this->modelPage->where('section_id', 7)
            ->where('is_active', 1)
            ->where($dateCol, '>=', now())
            ->orderBy($dateCol, 'asc')
            ->first();

        $events = $this->modelPage->where('is_active', 1)
            ->where('section_id', 7)
            ->whereBetween($dateCol, [$startDate, $endDate])
            ->orderBy($dateCol, 'asc')
            ->get();

        $groupedEvents = $events->groupBy(function ($event) use ($dateCol) {
            return Carbon::parse($event->{$dateCol})
                ->locale('fr')
                ->translatedFormat('F Y'); // e.g. "septembre 2025"
        });

        // Ensure all months exist
        $allMonths = [];
        $cursor = $startDate->copy();
        while ($cursor <= $endDate) {
            $key = $cursor->locale('fr')->translatedFormat('F Y');
            $allMonths[$key] = $groupedEvents->get($key, collect());
            $cursor->addMonth();
        }

        // Upcoming list (if needed)
        $latestEvents = $this->modelPage->where('section_id', 7)
            ->where('is_active', 1)
            ->where($dateCol, '>=', now())
            ->orderBy($dateCol, 'asc')
            ->get();

        // --- Slugs: current + prev/next ranges for navigation ---
        $rangeSlug      = $buildSlug($startDate, $monthsCnt);
        $prevRangeSlug  = $buildSlug($startDate->copy()->subMonths($monthsCnt), $monthsCnt);
        $nextRangeSlug  = $buildSlug($startDate->copy()->addMonths($monthsCnt), $monthsCnt);

        return view('civitas.agenda', [
            'groupedEvents' => $allMonths,
            'section_id'    => 7,
            'latestevent'   => $latestEvents,
            'recentevent'   => $recentEvent,
            'rangeSlug'     => $rangeSlug,
            'prevRangeSlug' => $prevRangeSlug,
            'nextRangeSlug' => $nextRangeSlug,
            'startDate'     => $startDate,
            'endDate'       => $endDate,
        ]);
    }


    ///////////////////PARTY/////////////////////////////////
    public function  partyHome()
    {
        return view('civitas.party-home');
    }
    public function  partyLegacy()
    {
        return view('civitas.party-pages')->with('page', 0);
    }
    public function  partyQuestions()
    {
        return view('civitas.party-pages')->with('page', 1);
    }

    public function  partyDiocesains(Request $request)
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);
        $diocesan = $this->modelPage->getAllBySectionObject($section);

        if ($request->ajax()) {
            $canton = $request->input('canton');
            $result = $this->modelPage
                ->where('category', 'LIKE', '%' . $canton . '%')
                ->where('is_active', 1)
                ->first();
            if ($result) {
                return response()->json([
                    'success' => true,
                    'data' => [
                        'title' => $result->title,
                        'content' => $result->content,
                    ],
                ]);
            } else {
                return response()->json(['success' => false]);
            }
        }
        return view('civitas.party-pages')->with('page', 2)->with('section_id', $section->id)->with('diocesan', $diocesan);
    }
    public function  partyDirector()
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);
        $directors = $this->modelPage->getAllBySectionObject($section);

        return view('civitas.party-pages')->with('page', 3)->with('section_id', $section->id)->with('directors', $directors);
    }
    public function  partyStatus()
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);
        $lateststatus = $this->modelPage->getPaginatedBySection($section);

        $hasMore = $lateststatus->hasMorePages();

        return view('civitas.party-pages')
            ->with('page', 4)
            ->with('section_id', $section->id)
            ->with('lateststatus', $lateststatus)
            ->with('has_more', $hasMore);
    }
    public function  partyStatusPAGE($url)
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);
        $parsedDate = \Carbon\Carbon::createFromFormat('d-m-Y', $url);
        $status = $this->modelPage->where('section_id', $section->id)->whereDate('url', $parsedDate)->first();

        return view('civitas.party-pages', compact('status'))->with('page', 5);
    }
    public function  partyLife()
    {
        return view('civitas.party-pages')->with('page', 6);
    }
    ///////////////////HOME SLIDER PAGES/////////////////////////////////
    public function  civitasInitiatives()
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);
        $initiatives = $this->modelPage->getAllBySectionAndCategory($section, 'initiatives-populaires');
        $referendums = $this->modelPage->getAllBySectionAndCategory($section, 'votations');

        return view('civitas.initiatives')->with('page', 0)->with('section_id', $section->id)->with('initiatives', $initiatives)->with('referendums', $referendums);
    }
    public function  civitasVotesOverview($category)
    {
        $votes = $this->modelPage->getAllByCategory($category);
        return view('civitas.initiatives')->with('page', 1)->with('votes', $votes)->with('category', $category);
    }

    public function  civitasSliderPages($category, $url)
    {
        $vote = $this->modelPage->getByCategoryAndUrl($category, $url);
        return view('civitas.initiatives', compact('vote'))->with('page', 2);
    }
    ///////////////////////SUPPORT-GOAL///////////////////////////
    public function  goalSupport()
    {
        return view('civitas.donate')->with('page', 0);
    }
    // public function  civitasSupport(\Illuminate\Http\Request $request)
    // {
    //     if ($request->has('amount')) {
    //         session([
    //             'selected_value' => $request->amount,
    //             'custom_amount'  => $request->get('custom'),
    //             'billing_cycle'  => 'monthly',
    //         ]);
    //     }
    //     return view('civitas.donate')->with('page', 1);
    // }

    public function civitasSupport(\Illuminate\Http\Request $request)
    {
        $customAmountLimit = 2500;

        if ($request->has('amount')) {
            $selectedValue = $request->amount;
            $customAmount  = $request->get('custom');

            // Check limit only when custom amount is being used
            if ($selectedValue == 'custom' && $customAmount !== null) {
                // Strip any non-numeric characters (e.g. "2,500" -> "2500")
                $numericAmount = (float) preg_replace('/[^0-9.]/', '', $customAmount);

                if ($numericAmount > $customAmountLimit) {
                    return redirect()->back()->with(
                        'amount_limit_error',
                        __('words.donate_limit_message', [
                            'amount' => $customAmountLimit,
                            'email'  => 'secretariat@civitassuisse.ch',
                        ])
                    );
                }
            }

            session([
                'selected_value' => $selectedValue,
                'custom_amount'  => $customAmount,
                'billing_cycle'  => 'monthly',
            ]);
        }

        return view('civitas.donate')->with('page', 1);
    }

    ////////////////////////////SOUTENIR/////////////////////////
    public function  civitasSoutenir(\Illuminate\Http\Request $request)
    {
        if ($request->has('amount')) {
            session([
                'selected_value' => $request->amount,
                'custom_amount'  => $request->get('custom'),
                'billing_cycle'  => 'monthly',
            ]);
        }
        $selectedValue = session('selected_value');
        $selectedPrice = session('custom_amount');
        return view('civitas.soutenir', compact('selectedValue', 'selectedPrice'));
    }
    /////////////////////////////GENERAL INFO///////////////////////////////////////
    public function  civitasStudy()
    {
        return view('civitas.general_info')->with('page', 0);
    }
    public function  civitasPoliticalAction()
    {
        return view('civitas.general_info')->with('page', 1);
    }
    public function  civitasFaith()
    {
        return view('civitas.general_info')->with('page', 2);
    }
    /////////////////CALENDAR////////////////////////////
    public function  civitasEventsOverview()
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);

        $latestevent = $this->modelPage->where('section_id', $section->id)
            ->where('is_active', '1')
            ->where('created_at', '>=', Carbon::now())
            ->orderBy('created_at', 'asc')
            ->first();

        $secondUpcomingEvent = $this->modelPage->where('section_id', $section->id)
            ->where('is_active', '1')
            ->where('created_at', '>=', Carbon::now())
            ->orderBy('created_at', 'asc')
            ->skip(1)
            ->first();

        $allpastevents = $this->modelPage->where('section_id', $section->id)
            ->where('is_active', '1')
            ->where('created_at', '<', Carbon::now())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('civitas.events', [
            'section_id' => $section->id,
            'page' => 0,
            'latestevent' => $latestevent,
            'allpastevents' => $allpastevents,
            'secondUpcomingEvent' => $secondUpcomingEvent,
        ]);
    }
    public function  civitasNextEvent($url)
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);
        $event = $this->modelPage->where('section_id', $section->id)->first();

        return view('civitas.events', compact('event'))->with('page', 1);
    }
    public function  civitasEventDetails($title)
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);
        $event = $this->modelPage->where('section_id', $section->id)->first();

        return view('civitas.events', compact('event'))->with('page', 2);
    }
    public function  civitasPastEvents()
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);

        $allpastevents = $this->modelPage->where('section_id', $section->id)
            ->where('is_active', '1')
            ->where('created_at', '<', Carbon::now())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('civitas.events', [
            'section_id' => $section->id,
            'page' => 3,
            'allpastevents' => $allpastevents
        ]);
    }
    //////////////////////////SOUTENIR-PAYMENT////////////////////////////////
    public function  soutenirPaymentCash()
    {
        return view('civitas.soutenir_payment')->with('page', 0);
    }
    public function  soutenirPaymentCrypto()
    {
        return view('civitas.soutenir_payment')->with('page', 2);
    }
    public function  soutenirPaymentBanking()
    {
        return view('civitas.soutenir_payment')->with('page', 3);
    }
    public function  soutenirPaymentReceipt()
    {
        return view('civitas.soutenir_payment')->with('page', 4);
    }
    //////////////////////////MEMBERSHIP-PAYMENT////////////////////////////////
    public function  memberPaymentEbanking()
    {
        return view('civitas.membership_payment')->with('page', 0);
    }
    public function memberPaymentReceipt()
    {
        return view('civitas.membership_payment')->with('page', 1);
    }
    public function memberPaymentCrypto()
    {
        return view('civitas.membership_payment')->with('page', 2);
    }
}
