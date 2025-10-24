<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Page;
use Illuminate\Http\Request;

class RdpController extends Controller
{
    protected $modelSection;
    protected $modelPage;
    protected $catechismeCategories;

    public function __construct(Section $sectionM, Page $pageM)
    {
        $this->modelSection = $sectionM;
        $this->modelPage = $pageM;

        $this->catechismeCategories = [
            [
                'title' => 'Partie I – Dieu, son existence et sa nature',
                'url' => 'cours-de-catechisme-partie-I',
                'video_count' => 0,
            ],
            [
                'title' => 'Partie II – La Création: Les Anges et l’Homme',
                'url' => 'cours-de-catechisme-partie-II',
                'video_count' => 0,
            ],
            [
                'title' => 'Partie III – L’Incarnation ; La Vierge Marie ; Jésus-Christ',
                'url' => 'cours-de-catechisme-partie-III',
                'video_count' => 0,
            ],
            [
                'title' => 'Partie IV – Le Mystère de la Rédemption',
                'url' => 'cours-de-catechisme-partie-IV',
                'video_count' => 0,
            ],
            [
                'title' => 'Partie V – Passion et Mort de Jésus-Christ',
                'url' => 'cours-de-catechisme-partie-V',
                'video_count' => 0,
            ],
            [
                'title' => 'Partie VI – Résurrection ; Jugement ; Le Saint-Esprit',
                'url' => 'cours-de-catechisme-partie-VI',
                'video_count' => 0,
            ],
            [
                'title' => 'Partie VII – L’Église ; La Vie Éternelle',
                'url' => 'cours-de-catechisme-partie-VII',
                'video_count' => 0,
            ],
            [
                'title' => 'Partie VIII – La Morale et les Lois',
                'url' => 'cours-de-catechisme-partie-VIII',
                'video_count' => 0,
            ],
            [
                'title' => 'Partie IX – Les Vertus',
                'url' => 'cours-de-catechisme-partie-IX',
                'video_count' => 0,
            ],
            [
                'title' => 'Partie X – Le Péché',
                'url' => 'cours-de-catechisme-partie-X',
                'video_count' => 0,
            ],
            [
                'title' => 'Partie XI – Les Commandements',
                'url' => 'cours-de-catechisme-partie-XI',
                'video_count' => 0,
            ],
            [
                'title' => 'Partie XII – La Grâce et les Sacrements',
                'url' => 'cours-de-catechisme-partie-XII',
                'video_count' => 0,
            ],
        ];
    }

    public function home()
    {
        return view('rdp.home');
    }
    ///////////////SUBCATEGORY////////////////////
    public function leRosaire()
    {
        return view('rdp.subcategory')->with('page', 0);
    }

    public function historique()
    {
        return view('rdp.historique');
    }
    ///////////////SUBCATEGORY////////////////////
    public function coeurImmacule()
    {
        return view('rdp.coeurImmacule');
    }
    
    public function catechisme()
    {
        $route = \Request::path();
        $section = $this->modelSection->getSectionByRoute($route);
        $catechisme = $this->modelPage->getAllBySectionObject($section);

        $videoCount = $catechisme->groupBy('category')->map(function ($group) {
            return $group->count();
        });
        foreach ($this->catechismeCategories as &$category) {
            $category['video_count'] = $videoCount[$category['title']] ?? 0;
            $firstVideo =  $this->modelPage
                ->where('category', $category['title'])
                ->first();
                
            $category['first_video'] = $firstVideo ? $firstVideo->link : null;
        }
        return view('rdp.subcategory')->with('page', 1)->with('section_id', $section->id)->with('catechismeCategories', $this->catechismeCategories);
    }

    public function notreDame()
    {
        return view('rdp.subcategory')->with('page', 3);
    }
    public function leScapulaire()
    {
        return view('rdp.subcategory')->with('page', 4);
    }
    public function lerSamedis()
    {
        return view('rdp.subcategory')->with('page', 5);
    }
    public function leSecret()
    {
        return view('rdp.subcategory')->with('page', 6);
    }

    ///////////////////PRIER-COMMENT(LAST TWO BUTTONS-HOME)////////////////////////////////
    public function prierleRosaire()
    {
        return view('rdp.lerosaire-page')->with('page', 0);
    }
    public function commentleRosaire()
    {
        return view('rdp.lerosaire-page')->with('page', 1);
    }
    ///////////////////MONTHS////////////////////////////////
    public function rdpAngel()
    {
        return view('rdp.months')->with('page', 0);
    }
    public function rdpMay()
    {
        return view('rdp.months')->with('page', 1);
    }
    public function rdpJune()
    {
        return view('rdp.months')->with('page', 2);
    }
    public function rdpJuly()
    {
        return view('rdp.months')->with('page', 3);
    }
    public function rdpAugust()
    {
        return view('rdp.months')->with('page', 4);
    }
    public function rdpAugustSec()
    {
        return view('rdp.months')->with('page', 5);
    }
    public function rdpSeptember()
    {
        return view('rdp.months')->with('page', 6);
    }
    public function rdpOctober()
    {
        return view('rdp.months')->with('page', 7);
    }

    public function catechismeCategories($url)
    {
        $category = collect($this->catechismeCategories)->firstWhere('url', $url);
        $content = $this->modelPage->getAllByUrl($url, 8);
        $categoryTitle = $category['title'];

        return view('rdp.subcategory', compact('categoryTitle', 'content'))->with('page', 2);
    }
}
