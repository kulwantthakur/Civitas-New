<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function language()
    {
        $locale = app()->getLocale();
        return view('language', compact('locale'));
    }
    public function  homeSengager()
    {
        return view('slider-page')->with('page', 0);
    }
    public function  homeEtudier()
    {
        return view('slider-page')->with('page', 1);
    }
    public function  homePrier()
    {
        return view('slider-page')->with('page', 2);
    }

    public function  homeAgir()
    {
        return view('slider-page')->with('page', 3);
    }
    public function impressum()
    {
        return view('footer')->with('page', 0);
    }
    public function protection()
    {
        return view('footer')->with('page', 1);
    }
    public function contact()
    {
        return view('footer')->with('page', 2);
    }
    public function cgu()
    {
        return view('footer')->with('page', 3);
    }
    public function armee_bleue_du_coeur()
    {
        return view('armee_bleue_du_coeur');
    }
}
