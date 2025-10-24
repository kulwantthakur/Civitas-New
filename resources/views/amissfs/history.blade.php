@extends('amissfs.app')

@section('logo')
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('amissfs.home') }}" class="text-decoration-none">
        <img src="{{ asset('/img/logo/amissfs_logo_dark.svg') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('/img/logo/responsive/logo_amissfs_2.svg') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </a>
</div>
@endsection

@section('podcast')
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="space-100"></div>
    <div class="mx-5">
        <div class="d-flex justify-content-between align-items-center">
            <div class="flex-row d-flex align-items-center">
                <a href="{{ route('home') }}"><img src="{{ asset('img/amissfs/podcast/podcast-logo.png') }}" class="me-3" alt="logo-podcast" /></a>
                <div class="podcast-title">OMNIA INSTAURARE IN CHRISTO</div>
            </div>
            <div class="flex-row d-flex align-items-center">
                <div class="flex-row position-relative d-flex justify-content-between align-items-center">
                    <a href="javascript:void(0);" class="search-button h-100">
                        <img src="{{ asset('img/search.png') }}" class="" alt="search" />
                    </a>
                    <input type="search" name="search" class="form-control podcast-search" placeholder="CONFÉRENCES, SERMONS, CHANTS">
                </div>
                @auth
                <a href="{{ route('podcast-history') }}" class="podcast-history ms-5">
                    HISTORIQUE <i class="fa-solid fa-rotate-left"></i>
                </a>
                @endauth
            </div>
        </div>
    </div>
    <div class="space-100"></div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container">
        <div class="d-flex jutify-content-between align-items-center">
            <a href="{{ route('amissfs.home') }}" class="">
                <img src="{{ asset('img/amissfs/responsive/history.png') }}" class="" alt="amissfs" />
            </a>
        </div>
        <div class="my-3">
            <div class="amissfs-history">Rechercher &nbsp; A → Z</div>
        </div>
        <div class="flex-row position-relative d-flex justify-content-between align-items-center">
            <a href="javascript:void(0);" class="search-button h-100">
                <img src="{{ asset('img/search.png') }}" class="" alt="search" />
            </a>
            <input type="search" name="search" class="form-control podcast-search" placeholder="CONFÉRENCES, SERMONS, CHANTS">
        </div>
        <div class="d-flex justify-content-end ">
            <a href="{{ route('podcasts') }}" class="podcast-history">
                CATÉGORIES <i class="fa-solid fa-rotate-left"></i>
            </a>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="mx-5">
        <div class="searchResult">
            <div class="mb-5 podcast-home-category">Historique</div>
            <div class="p-3 podcast-home-grid">
                @foreach($history as $entry)
                <div class="mb-5 position-relative">
                    <a href="{{ route('podcast-name', ['categoryUrl' => $entry->podcast->category->url, 'podcastUrl' => $entry->podcast->url]) }}" class="text-decoration-none">
                        <div class="box-dimension mb-3" style="background-color: {{ $entry->podcast->category->color }}">
                            <div class="p-3 d-flex justify-content-between align-items-center">
                                <div class="podcast-name text-uppercase">{{ $entry->podcast->title }}</div>
                            </div>
                        </div>
                        <div class="podcast-absolute-grid">
                            <div class="podcast-author">{{ $entry->podcast->author }}</div>
                        </div>
                    </a>
                </div>
                @endforeach
                <div class="load-more-container">
                    <button class="load-more-btn">VOIR PLUS</button>
                </div>
            </div>
        </div>
    </div>
    <div class="my-5">
        <div class="podcast-red-bg d-flex flex-column justify-content-center align-items-center">
            <div class="podcast-bottom-title">Rejoignez Civitas !</div>
            <a href="{{ route('civitas.member') }}" class="mt-3 d-flex justify-content-center align-items-center podcast-bottom-button">EN SAVOIR PLUS</a>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container">
        <div class="searchResult">
            <div class="d-flex justify-content-start">
                <div class="podcast-home-category">Historique</div>
            </div>
            <div class="p-3 podcast-home-grid">
                @foreach($history as $entry)
                <div class="mb-5 position-relative">
                    <a href="{{ route('podcast-name', ['categoryUrl' => $entry->podcast->category->url, 'podcastUrl' => $entry->podcast->url]) }}" class="text-decoration-none">
                        <div class="box-dimension mb-3" style="background-color: {{ $entry->podcast->category->color }}">
                            <div class="p-3 d-flex justify-content-between align-items-center">
                                <div class="podcast-name text-uppercase">{{ $entry->podcast->title }}</div>
                            </div>
                        </div>
                        <div class="podcast-absolute-grid">
                            <div class="podcast-author">{{ $entry->podcast->author }}</div>
                        </div>
                    </a>
                </div>
                @endforeach
                <div class="load-more-container">
                    <button class="load-more-btn">VOIR PLUS</button>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <div class="podcast-red-bg d-flex flex-column justify-content-center align-items-center">
                <div class="mb-4 podcast-bottom-title podcast-big-font-responsive">Rejoignez Civitas !</div>
                <a href="{{ route('civitas.member') }}" class="d-flex justify-content-center align-items-center podcast-bottom-button">EN SAVOIR PLUS</a>
            </div>
        </div>
    </div>
</div>
@endsection