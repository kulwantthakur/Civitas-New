<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Civitas</title>
    <meta name="robots" content="noindex">
    <meta property="og:locale" content="{{ str_replace('-', '_', app()->getLocale()) }}{{ app()->getLocale() === 'en' ? '_GB' : '' }}" />

    <meta name="mobile-web-app-capable" content="yes" />
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('summernote/summernote-lite.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/civitas.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tablet.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/filepond.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/filepond-preview.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome/fontawesome-all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/countrySelect.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl-carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl-carousel-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flatpickr.min.css') }}">
    @yield('css')
</head>

<body>
    @if(Auth::user() && !Route::is('admin.email-templates.index'))
    <div class="admin-bar my-4">
        <div class="d-flex justify-content-between align-items-center">
            @if(Route::is('political-program-home','civitas.participer','civitas.news','civitas.initiatives','civitas.status'))
            <div class="d-flex algin-items-center ms-3">
                <button type="button" class="btn btn-success m-0" data-bs-toggle="modal" data-bs-target="#createModal">
                    {!! __('words.admin_create_new') !!}
                </button>
            </div>
            @elseif(request()->routeIs('programs','civitas.get_inform'))
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-info m-0 ms-3" data-bs-toggle="modal" data-bs-target="#editModal">
                    {!! __('words.admin_edit') !!}
                </button>
                <div class="mx-3"></div>
                <button type="button" class="btn btn-danger m-0" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    {!! __('words.admin_delete') !!}
                </button>
            </div>
            @elseif(Route::is('civitas.director','civitas.agenda'))
            <div class="d-flex algin-items-center ms-3">
                <button type="button" class="btn btn-success m-0" data-bs-toggle="modal" data-bs-target="#createModal">
                    {!! __('words.admin_create_new') !!}
                </button>
                <div class="mx-3"></div>
                <button type="button" class="btn btn-info m-0" data-bs-toggle="modal" data-bs-target="#editModal">
                    {!! __('words.admin_edit') !!}
                </button>
                <div class="mx-3"></div>
                <button type="button" class="btn btn-danger m-0" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    {!! __('words.admin_delete') !!}
                </button>
            </div>
            @elseif(Route::is('civitas.newsheadline','civitas.voting','civitas.statuspage', 'civitas.event-detail', 'civitas.last-event'))
            <div class="d-flex algin-items-center ms-3">
                <button type="button" class="btn btn-info m-0" data-bs-toggle="modal" data-bs-target="#editModal">
                    {!! __('words.admin_edit') !!}
                </button>
                <div class="mx-3"></div>
                <button type="button" class="btn btn-danger m-0" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    {!! __('words.admin_delete') !!}
                </button>
            </div>
            @elseif(Route::is('civitas.diocesains'))
            <div class="d-flex algin-items-center ms-3">
                <button type="button" class="btn btn-info m-0" data-bs-toggle="modal" data-bs-target="#editModal">
                    {!! __('words.admin_edit') !!}
                </button>
            </div>
            @else
            <div></div>
            @endif
            <div class="d-flex justify-content-end align-items-center">
                <div class="admin-zone-name me-3">{!! __('words.admin_hello') !!} <a href="{{ route('account')}}" class="admin-zone-name">{{ Auth::user()->name }}</a></div>
                <div class="">
                    <a class="d-flex align-items-center admin-zone-logout me-3"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-user me-2"></i>{!! __('words.admin_logout') !!}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="parent-body">
        @yield('top-content')
        <nav class="top-0 navbar inverse-text">
            <div class="d-flex justify-content-between @if (Route::is('civitas.home')) align-items-center @else align-items-center @endif">
                @yield('logo')
                <div class="d-flex align-items-center">
                    @if(Route::is('civitas.home'))
                    <div class="d-block d-sm-block d-md-block d-lg-block d-xl-none d-xxl-none">
                        <div class="d-flex align-items-center me-3">
                            <a class="nav-link d-flex align-items-center justify-content-center" href="{{ route('civitas.support') }}" id="donate">{!! __('words.civitas_make_donation') !!}</a>
                        </div>
                    </div>
                    @endif
                    <div class="ml-auto navbar-hamburger">
                        <a class="hamburger animate" data-bs-toggle="collapse" data-bs-target=".second-collapse"><span></span></a>
                    </div>
                </div>

                <div class="collapse navbar-collapse desktop-height desktop-width">
                    <ul class="nav navbar-nav ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('podcasts') }}" id="podcast">{!! __('words.nav_podcasts') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" /></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('amissfs.home') }}" id="amissfs">{!! __('words.nav_amis_sfs') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" /></a>
                        </li>
                        <li class="nav-item d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
                            <a class="nav-link" href="{{ route('rdp.home') }}" id="rdp">{!! __('words.nav_refuge_des_pecheurs') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" /></a>
                        </li>
                        <li class="nav-item d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
                            <a class="nav-link" href="{{ route('rdp.home') }}" id="rdp">{!! __('words.nav_rdp') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" /></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('civitas.home') }}" id="civitas-suisse">{!! __('words.nav_civitas_suisse') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" /></a>
                        </li>
                        <div class="d-none d-sm-none d-md-none d-lg-none d-xl-block d-xxl-block">
                            <div class="nav-item d-flex gap-2 align-items-center" id="language">
                                <span class="nav-link">
                                    <a class="text-white" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('fr', route('language', [], false)) }}" id="language">FR</a>
                                </span>
                                <span class="lang-separator" id="language">|</span>
                                <span class="nav-link">
                                    <a class="text-white" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('de', route('language', [], false)) }}" id="language">DE</a>
                                </span>
                                <span class="lang-separator" id="language">|</span>
                                <span class="nav-link">
                                    <a class="text-white" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('it', route('language', [], false)) }}" id="language">IT</a>
                                </span>
                                <span class="lang-separator" id="language">|</span>
                                <span class="nav-link">
                                    <a class="text-white" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('en', route('language', [], false)) }}" id="language">EN</a>
                                </span>
                            </div>
                        </div>
                        <li class="nav-item d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
                            <div class="d-flex align-items-center" style="padding: 0 30px;">
                                <a class="nav-link mobile-menu-new fw-bolder" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('fr', route('language', [], false)) }}">FR</a>
                                <span class="mx-2">-</span>
                                <a class="nav-link mobile-menu-new" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('de', route('language', [], false)) }}">DE</a>
                                <span class="mx-2">-</span>
                                <a class="nav-link mobile-menu-new" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('it', route('language', [], false)) }}">IT</a>
                                <span class="mx-2">-</span>
                                <a class="nav-link mobile-menu-new" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('en', route('language', [], false)) }}">EN</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="d-none d-sm-none d-md-none d-lg-none d-xl-block d-xxl-block flex-grow-1 top-menu-empty">
                    <div class="d-flex align-items-center participer-height">
                        <a class=" nav-link d-flex align-items-center justify-content-center" href="{{ route('civitas.member') }}" id="participer">{!! __('words.nav_participer') !!}</a>
                    </div>
                </div>
            </div>
            <div class="w-100 d-block d-sm-block d-md-block d-lg-block d-xl-none d-xxl-none">
                <div class="p-0 collapse navbar-collapse second-collapse">
                    <ul class="m-auto nav navbar-nav">
                        <div class="d-flex justify-content-between align-items-center responsive-menu-back">
                            <a href="javascript:void(0);" class="close-menu"><img src="{{ asset('img/menu_back.png') }}" class=""></a>
                            <a href="{{ route('home') }}" class="home-button"><img src="{{ asset('img/homebutton.png') }}" class=""></a>
                        </div>
                        <li class="px-2 nav-item">
                            <a class="nav-link navbar-submenu fw-bold" href="{{route('civitas.home')}}" id="agenda">
                                {!! __('words.nav_civitas_suisse') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                            </a>
                        </li>
                        <li class="px-2 nav-item">
                            <a class="nav-link navbar-submenu mobile-submenu" href="javascript:void(0);" id="participer1">
                                {!! __('words.nav_participer') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                            </a>
                            <ul class="submenu d-none">
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="{{ route('civitas.member') }}">
                                        {!! __('words.nav_become_member') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="{{ route('civitas.events') }}">
                                        {!! __('words.nav_conferences') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="px-2 nav-item">
                            <a class="nav-link navbar-submenu mobile-submenu" href="javascript:void(0);" id="agenda">
                                {!! __('words.nav_agenda') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                            </a>
                            <ul class="submenu d-none">
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="{{ route('civitas.agenda')}}">
                                        {!! __('words.nav_agenda') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="{{ route('civitas.events') }}">
                                        {!! __('words.nav_conferences') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="px-2 nav-item">
                            <a class="nav-link navbar-submenu mobile-submenu" href="javascript:void(0);" id="mouvement">
                                {!! __('words.nav_movement') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                            </a>
                            <ul class="submenu d-none">
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="{{ route('civitas.diocesains') }}">
                                        {!! __('words.nav_groupes_diocesains') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="{{ route('civitas.director') }}">
                                        {!! __('words.nav_comite_directeur') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="{{ route('civitas.status') }}">
                                        {!! __('words.nav_statuts') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="{{ route('civitas.question') }}">
                                        {!! __('words.nav_questions_reponses') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="{{ route('civitas.status') }}#communiques">
                                        {!! __('words.nav_communiques') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="{{ route('political-action') }}">
                                        {!! __('words.nav_activites') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="px-2 nav-item">
                            <a class="nav-link navbar-submenu mobile-submenu" href="javascript:void(0);" id="actualites">
                                {!! __('words.nav_news_mobile') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                            </a>
                            <ul class="submenu d-none">
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="{{ route('political-action') }}">
                                        {!! __('words.nav_toute_actualite_mobile') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="{{ route('catholic-vote') }}">
                                        {!! __('words.nav_vote_catholique') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="px-2 nav-item">
                            <a class="nav-link navbar-submenu mobile-submenu" href="javascript:void(0);" id="catholic-vote">
                                {!! __('words.nav_vote_catholique') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                            </a>
                            <ul class="submenu d-none">
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="{{ route('civitas.legacy') }}">
                                        {!! __('words.nav_notre_heritage') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="{{ route('civitas.initiatives') }}">
                                        {!! __('words.nav_notre_vote') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="{{ route('civitas.votes_overview', ['category'=>'initiatives-populaires']) }}">
                                        {!! __('words.nav_initiatives') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="{{ route('civitas.votes_overview', ['category'=>'votations']) }}">
                                        {!! __('words.nav_referendums') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="px-2 nav-item">
                            <a class="nav-link navbar-submenu mobile-submenu" href="javascript:void(0);" id="actions">
                                {!! __('words.nav_programme_politique') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                            </a>
                            <ul class="submenu d-none">
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="{{ route('political-program-home') }}">
                                        {!! __('words.nav_vision_generale') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="{{ route('political-programs') }}">
                                        {!! __('words.nav_par_themes') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="px-2 nav-item">
                            <a class="nav-link navbar-submenu mobile-submenu" href="javascript:void(0);" id="boutique">
                                {!! __('words.nav_boutiques') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                            </a>
                            <ul class="submenu d-none">
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="https://medias-culture-et-patrimoine.com/" target="_blank">
                                        {!! __('words.nav_medias_culture') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="{{ route('bookStore') }}">
                                        {!! __('words.nav_editions_amis') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="https://medias-culture-et-patrimoine.com/collections/revue-caritas-format-papier" target="_blank">
                                        {!! __('words.nav_revue_caritas') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                                <li class="nav-item ps-0">
                                    <a class="nav-link" href="https://civitas-international-boutique.tpopsite.com/collection/suisse?page=1" target="_blank">
                                        {!! __('words.nav_produits_derives') !!} <img src="{{ asset('img/menu_next.png') }}" alt="logo" />
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item px-2" style="background-color: #d9d9d9;">
                            <div class="d-flex align-items-center" style="padding: 0 30px;">
                                <a class="nav-link mobile-menu-new fw-bolder" href="{{ route('language') }}">FR</a>
                                <span class="mx-2">-</span>
                                <a class="nav-link mobile-menu-new" href="{{ route('language') }}">DE</a>
                                <span class="mx-2">-</span>
                                <a class="nav-link mobile-menu-new" href="{{ route('language') }}">IT</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @if(Route::currentRouteName() !== 'language')
        <div class="d-none d-sm-none d-md-none d-lg-none d-xl-flex d-xxl-flex">
            <div class="submenu-logo navbar-brand"></div>
            <div class="d-flex justify-content-start align-items-center navbar-collapse top-menu-height top-menu">
                <ul class="menu-list ms-3">
                    <li class="menu-item d-flex align-items-center">
                        <a class="nav-link navbar-submenu" href="#" id="agenda">
                            {!! __('words.nav_agenda') !!}
                        </a>
                        <div class="black-border"></div>
                        <div class="mega-menu dropdown-menu" aria-labelledby="agenda">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="p-3">
                                            <a href="{{ route('civitas.agenda') }}"
                                                class="d-flex justify-content-between align-items-center civitas-submenu">
                                                {!! __('words.nav_agenda') !!}
                                                <img src="{{ asset('img/desktop-submenu.png') }}" alt="icon"
                                                    class="menu-icon" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3">
                                            <a href="{{ route('civitas.events') }}"
                                                class="d-flex justify-content-between align-items-center civitas-submenu">
                                                {!! __('words.nav_conferences') !!}
                                                <img src="{{ asset('img/desktop-submenu.png') }}" alt="icon"
                                                    class="menu-icon" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </li>
                    <li class="menu-item d-flex align-items-center">
                        <a class="nav-link navbar-submenu" href="#" id="parti">
                            {!! __('words.nav_movement') !!}
                        </a>
                        <div class="black-border"></div>
                        <div class="mega-menu dropdown-menu" aria-labelledby="parti">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="p-3">
                                            <a class="d-flex justify-content-between align-items-center civitas-submenu"
                                                href="{{ route('civitas.diocesains') }}">
                                                {!! __('words.nav_groupes_diocesains') !!}
                                                <img src="{{ asset('img/desktop-submenu.png') }}" alt="logo"
                                                    class="menu-icon" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="p-3">
                                            <a class="d-flex justify-content-between align-items-center civitas-submenu"
                                                href="{{ route('civitas.status') }}">
                                                {!! __('words.nav_statuts') !!}
                                                <img src="{{ asset('img/desktop-submenu.png') }}" alt="logo"
                                                    class="menu-icon" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="p-3">
                                            <a class="d-flex justify-content-between align-items-center civitas-submenu"
                                                href="{{ route('civitas.status') }}#communiques">
                                                {!! __('words.nav_communiques') !!}
                                                <img src="{{ asset('img/desktop-submenu.png') }}" alt="logo"
                                                    class="menu-icon" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="p-3">
                                            <a class="d-flex justify-content-between align-items-center civitas-submenu"
                                                href="{{ route('civitas.director') }}">
                                                {!! __('words.nav_comite_directeur') !!}
                                                <img src="{{ asset('img/desktop-submenu.png') }}" alt="logo"
                                                    class="menu-icon" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="p-3">
                                            <a class="d-flex justify-content-between align-items-center civitas-submenu"
                                                href="{{ route('civitas.question') }}">
                                                {!! __('words.nav_questions_reponses') !!}
                                                <img src="{{ asset('img/desktop-submenu.png') }}" alt="logo"
                                                    class="menu-icon" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="p-3">
                                            <a class="d-flex justify-content-between align-items-center civitas-submenu"
                                                href="{{ route('political-action') }}">
                                               {!! __('words.nav_activites') !!}
                                                <img src="{{ asset('img/desktop-submenu.png') }}" alt="logo"
                                                    class="menu-icon" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item d-flex align-items-center">
                        <a class="nav-link navbar-submenu" href="#" id="actualites">
                            {!! __('words.nav_news') !!}
                        </a>
                        <div class="black-border"></div>
                        <div class="mega-menu dropdown-menu" aria-labelledby="actualites">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="p-3">
                                            <a class="d-flex justify-content-between align-items-center civitas-submenu"
                                                href="{{ route('civitas.news') }}">
                                                {!! __('words.nav_toute_actualite') !!}
                                                <img src="{{ asset('img/desktop-submenu.png') }}" alt="logo"
                                                    class="menu-icon" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3">
                                            <a class="d-flex justify-content-between align-items-center civitas-submenu"
                                                href="{{ route('catholic-vote') }}">
                                                {!! __('words.nav_vote_catholique') !!}
                                                <img src="{{ asset('img/desktop-submenu.png') }}" alt="logo"
                                                    class="menu-icon" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item  d-flex align-items-center">
                        <a class="nav-link navbar-submenu lh-1" href="#" id="le-vote-catholique">
                            {!! __('words.nav_vote_catholique') !!}
                        </a>
                        <div class="black-border"></div>
                        <div class="mega-menu dropdown-menu" aria-labelledby="le-vote-catholique">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="p-3">
                                            <a class="d-flex justify-content-between align-items-center civitas-submenu"
                                                href="{{ route('civitas.legacy') }}">
                                                {!! __('words.nav_notre_heritage') !!}
                                                <img src="{{ asset('img/desktop-submenu.png') }}" alt="logo"
                                                    class="menu-icon" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="p-3">
                                            <a class="d-flex justify-content-between align-items-center civitas-submenu"
                                                href="{{ route('civitas.initiatives') }}">
                                                {!! __('words.nav_notre_vote') !!}
                                                <img src="{{ asset('img/desktop-submenu.png') }}" alt="logo"
                                                    class="menu-icon" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <div class="p-3">
                                            <a class="d-flex justify-content-between align-items-center civitas-submenu"
                                                href="{{ route('civitas.votes_overview', ['category'=>'initiatives-populaires']) }}">
                                                {!! __('words.nav_initiatives') !!}
                                                <img src="{{ asset('img/desktop-submenu.png') }}" alt="logo"
                                                    class="menu-icon" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="p-3">
                                            <a class="d-flex justify-content-between align-items-center civitas-submenu"
                                                href="{{ route('civitas.votes_overview', ['category'=>'votations']) }}">
                                                {!! __('words.nav_referendums') !!}
                                                <img src="{{ asset('img/desktop-submenu.png') }}" alt="logo"
                                                    class="menu-icon" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item d-flex align-items-center">
                        <a class="nav-link navbar-submenu lh-1" href="#" id="program-politique">
                            {!! __('words.nav_programme_politique') !!}
                        </a>
                        <div class="black-border"></div>
                        <div class="mega-menu dropdown-menu" aria-labelledby="program-politique">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="p-3">
                                            <a class="d-flex justify-content-between align-items-center civitas-submenu"
                                                href="{{ route('political-program-home') }}">
                                                {!! __('words.nav_vision_generale') !!}
                                                <img src="{{ asset('img/desktop-submenu.png') }}" alt="logo"
                                                    class="menu-icon" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3">
                                            <a class="d-flex justify-content-between align-items-center civitas-submenu"
                                                href="{{ route('political-programs') }}">
                                                {!! __('words.nav_par_themes') !!}
                                                <img src="{{ asset('img/desktop-submenu.png') }}" alt="logo"
                                                    class="menu-icon" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item d-flex align-items-center">
                        <a class="nav-link navbar-submenu" href="#" id="boutique">
                            {!! __('words.nav_boutique') !!}
                        </a>
                        <div class="mega-menu dropdown-menu" aria-labelledby="boutique">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="p-3">
                                            <a class="d-flex justify-content-between align-items-center civitas-submenu"
                                                href="https://medias-culture-et-patrimoine.com/" target="_blank">
                                                {!! __('words.nav_medias_culture') !!}
                                                <img src="{{ asset('img/desktop-submenu.png') }}" alt="logo"
                                                    class="menu-icon" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="p-3">
                                            <a class="d-flex justify-content-between align-items-center civitas-submenu"
                                                href="{{ route('bookStore') }}">
                                                {!! __('words.nav_editions_amis') !!}
                                                <img src="{{ asset('img/desktop-submenu.png') }}" alt="logo"
                                                    class="menu-icon" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="p-3">
                                            <a class="d-flex justify-content-between align-items-center civitas-submenu"
                                                href="https://medias-culture-et-patrimoine.com/collections/revue-caritas-format-papier" target="_blank">
                                                {!! __('words.nav_revue_caritas') !!}
                                                <img src="{{ asset('img/desktop-submenu.png') }}" alt="logo"
                                                    class="menu-icon" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="p-3">
                                            <a class="d-flex justify-content-between align-items-center civitas-submenu"
                                                href="https://civitas-international-boutique.tpopsite.com/collection/suisse?page=1" target="_blank">
                                                 {!! __('words.nav_produits_derives') !!}
                                                <img src="{{ asset('img/desktop-submenu.png') }}" alt="logo"
                                                    class="menu-icon" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            @if(Route::is('civitas.home', 'civitas.support'))
            <div class="d-none d-lg-block flex-grow-1 top-menu-empty">
                <div class="d-flex align-items-center top-menu-height">
                    <a class="nav-link d-flex align-items-center justify-content-center" href="{{ route('civitas.goal') }}" id="donate">FAIRE UN DON</a>
                </div>
            </div>
            @else
            <div class="top-menu-empty"></div>
            @endif
        </div>
        @endif
    </div>
    @include('cookie-bar')
    <div>
        @yield('content')
    </div>

    <footer class="dark-wrapper d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" style="background: #000 !important;">
        <div class="sub-footer">
            <div class="py-4 text-center inner footer-width">
                <div class="white-border d-flex mb-5">
                    <img src="{{ asset('img/home/footer-logo.svg') }}" class="mb-4 me-4" alt="logo" />
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <a href="{{ route('home') }}" class="footer-omnia text-decoration-none">{!! __('words.home_omnia_instaurare') !!}</a>
                        <p class="text-white suisse-light-14">{!! __('words.nav_un_mouvement') !!}</p>
                    </div>
                </div>
                <div class="my-4 row ms-3">
                    <div class="col-4 d-flex align-items-center">
                        <a href="{{ route('civitas.home') }}" class="footer-title text-decoration-none">{!! __('words.nav_civitas_suisse') !!}</a>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <a href="{{ route('amissfs.home') }}" class="footer-title text-decoration-none">{!! __('words.nav_amis_sfs') !!}</a>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <a href="{{ route('rdp.home') }}" class="footer-title text-decoration-none">{!! __('words.nav_refuge_des_pecheurs') !!}</a>
                    </div>
                </div>

                <div class="my-4 row ms-3">
                    <div class="col-4 d-flex align-items-center">
                        <a href="{{ route('political-programs') }}" class="footer-submenu text-decoration-none">{!! __('words.nav_positions') !!}</a>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <a href="{{ route('podcasts') }}" class="footer-submenu text-decoration-none">{!! __('words.nav_audiotheque') !!}</a>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <a href="{{ route('notredame') }}" class="footer-submenu text-decoration-none">{!! __('words.nav_notre_dame') !!}</a>
                    </div>
                </div>

                <div class="my-4 row ms-3">
                    <div class="col-4 d-flex align-items-center">
                        <a href="{{ route('civitas.party') }}" class="footer-submenu text-decoration-none">{!! __('words.nav_movement') !!}</a>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <a href="{{ route('editions') }}" class="footer-submenu text-decoration-none">{!! __('words.nav_editions') !!}</a>
                    </div>
                    <div class="col-4 text-end"></div>
                </div>

                <div class="my-4 row ms-3">
                    <div class="col-4 d-flex align-items-center">
                        <a href="{{ route('civitas.diocesains') }}" class="footer-submenu text-decoration-none">{!! __('words.nav_groupes_diocesains') !!}</a>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <a href="{{ route('bulletin') }}" class="footer-submenu text-decoration-none">{!! __('words.nav_bulletin') !!}</a>
                    </div>
                    <div class="col-4 text-start">
                        <a href="https://x.com/Civitas_" target="_blank"><img src="{{ asset('img/twitter.png') }}" class="me-3"></a>
                        <a href="https://www.instagram.com/vox_helvetica/" target="_blank"><img src="{{ asset('img/instagram.png') }}" class="me-3"></a>
                        <a href="https://www.youtube.com/@Civitas_International" target="_blank"><img src="{{ asset('img/youtube.png') }}" class="me-3"></a>
                        <a href="https://t.me/civitas_suisse" target="_blank"><img src="{{ asset('img/telegram1.png') }}" class="me-3"></a>
                        <a href="{{ route('civitas.home') }}"><img src="{{ asset('img/civitas_footer.png') }}" class="me-3"></a>
                    </div>
                </div>

                <div class="my-4 row ms-3">
                    <div class="col-4 text-start">
                        <a href="{{ route('civitas.news') }}" class="footer-submenu text-decoration-none">{!! __('words.nav_news') !!}</a>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4"></div>
                </div>

                <div class="flex-row mt-5">
                    <div class="row">
                        <div class="col-8">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('footer.impressum') }}" class="footer-last text-decoration-none">{!! __('words.footer_impressum') !!}</a>

                                <div class="mx-4 border-footer"></div>
                                <a href="{{ route('footer.protection') }}" class="footer-last text-decoration-none">{!! __('words.footer_data_protection') !!}</a>

                                <div class="mx-4 border-footer"></div>
                                <a href="{{ route('footer.contact') }}" class="footer-last text-decoration-none">{!! __('words.footer_contact') !!}</a>

                                <div class="mx-4 border-footer"></div>
                                <a href="{{ route('footer.cgu') }}" class="footer-last text-decoration-none">{!! __('words.footer_cgu') !!}</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="footer-last-civitas">© {{ date('Y') }} Civitas Suisse</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <footer class="dark-wrapper d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" style="background: #fff !important;">
        <div class="sub-footer">
            <div class="p-2 pb-0 text-center inner display-block">
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <img src="{{ asset('img/logo/responsive/logo_civitas_footer.svg') }}" class="mb-4 logo" alt="logo" />
                    <div>
                        <a href="{{ route('home') }}" class="sang-bleu-20 text-decoration-none text-dark">{!! __('words.home_omnia_instaurare') !!}</a>
                        <p class="suisse-light-14 text-dark">{!! __('words.nav_un_mouvement') !!}</p>
                    </div>
                </div>
                <div class="flex-row mx-2 mt-5 mb-4 d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <a href="https://x.com/Civitas_" target="_blank"><img src="{{ asset('img//twitter-black.png') }}" class="me-2"></a>
                        <a href="https://www.instagram.com/vox_helvetica/" target="_blank"><img src="{{ asset('img/instagram-black.png') }}" class="me-2"></a>
                        <a href="https://www.youtube.com/@Civitas_International" target="_blank"><img src="{{ asset('img/youtube-black.png') }}" class="me-2"></a>
                        <a href="https://t.me/civitas_suisse" target="_blank"><img src="{{ asset('img/telegram-black.png') }}" class="me-2"></a>
                    </div>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('civitas.home') }}"><img src="{{ asset('img/civitas-logo-black.png') }}" class=""></a>
                    </div>
                </div>
                <div class="mx-2 black-line"></div>
                <div class="tablet-footer-menu">
                    <div class="">
                        <div class="mt-4 d-flex flex-column align-items-start">
                            <a href="{{ route('civitas.home') }}" class="footer-title text-decoration-none">{!! __('words.nav_civitas_suisse') !!}</a>
                            <a href="{{ route('political-programs') }}" class="footer-submenu text-decoration-none">{!! __('words.nav_positions') !!}</a>
                            <a href="{{ route('civitas.party') }}" class="footer-submenu text-decoration-none">{!! __('words.nav_movement') !!}</a>
                            <a href="{{ route('civitas.diocesains') }}" class="footer-submenu text-decoration-none">{!! __('words.nav_groupes_diocesains') !!}</a>
                            <a href="{{ route('civitas.news') }}" class="footer-submenu text-decoration-none">{!! __('words.nav_news') !!}</a>
                        </div>
                    </div>
                    <div class="">
                        <div class="mt-4 d-flex flex-column align-items-start">
                            <a href="{{ route('amissfs.home') }}" class="footer-title text-decoration-none">{!! __('words.nav_amis_sfs') !!}</a>
                            <a href="{{ route('podcasts') }}" class="footer-submenu text-decoration-none">{!! __('words.nav_audiotheque') !!}</a>
                            <a href="{{ route('editions') }}" class="footer-submenu text-decoration-none">{!! __('words.nav_editions') !!}</a>
                            <a href="{{ route('bulletin') }}" class="footer-submenu text-decoration-none">{!! __('words.nav_bulletin') !!}</a>
                        </div>
                    </div>
                    <div class="">
                        <div class="mt-4 d-flex flex-column align-items-start">
                            <a href="{{ route('rdp.home') }}" class="footer-title text-decoration-none">{!! __('words.nav_refuge_des_pecheurs') !!}</a>
                            <a href="{{ route('notredame') }}" class="footer-submenu text-decoration-none">{!! __('words.nav_notre_dame') !!}</a>
                        </div>
                    </div>
                </div>
                <div class="flex-row mt-4 d-flex justify-content-center">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('footer.impressum') }}" class="footer-last text-decoration-none">{!! __('words.footer_impressum') !!}</a>

                        <div class="mx-1 border-footer"></div>
                        <a href="{{ route('footer.protection') }}" class="footer-last text-decoration-none">{!! __('words.footer_data_protection') !!}</a>

                        <div class="mx-1 border-footer"></div>
                        <a href="{{ route('footer.contact') }}" class="footer-last text-decoration-none">{!! __('words.footer_contact') !!}</a>

                        <div class="mx-1 border-footer"></div>
                        <a href="{{ route('footer.cgu') }}" class="footer-last text-decoration-none">{!! __('words.footer_cgu') !!}</a>

                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="footer-last-civitas">© {{ date('Y') }} Civitas Suisse</div>
                </div>
            </div>
    </footer>


    <script src="{{ asset('js/map.js') }}"></script>
    <script src="{{ asset('js/jQuery/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('js/jQuery/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script> -->
    <script src="{{ asset('summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('js/jQuery/toastr.js') }}"></script>
    <script src="{{ asset('js/jQuery/topbar.js') }}"></script>
    <script src="{{ asset('js/jQuery/scripts.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/jQuery/owl-carousel.js') }}"></script>
    <script src="{{ asset('js/jQuery/slider.js') }}"></script>
    <script src="{{ asset('js/flatpickr.js') }}"></script>
    <script src="{{ asset('js/filepond.js') }}"></script>
    <script src="{{ asset('js/filepond-preview.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>

    @php
    $routeName = optional(request()->route())->getName();
    $topbarColors = [
    'slider.sengager' => '#D4AF37',
    'slider.etudier' => '#2563EB',
    'slider.prier' => '#F59E0B',
    ];

    $topbarColor = $topbarColors[$routeName] ?? '#E10B17';
    @endphp

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        topbar.config({
            barColors: {
                0: @json($topbarColor)
            }
        });

        toastr.options = {
            "positionClass": "toast-bottom-right",
        }

        var toolbarConfig = [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture']]
        ];

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    @yield('scripts')
</body>

</html>