@extends('civitas.app')

@section('logo')
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('civitas.home') }}" class="logo-absolute text-decoration-none">
        <img src="{{ asset('img/logo/logo_civitas.svg') }}" class="d-none d-lg-block" alt="logo" />
        <img src="{{ asset('img/logo/logo_civitas_new.svg') }}" class="d-block d-lg-none" alt="logo" />
    </a>
</div>
@endsection


@section('content')
<div>
    @include('civitas.initiative_slider')
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="space-100"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 d-flex justify-content-center">
                @if($latestnews->isNotEmpty())
                @php $latestArticle = $latestnews->first(); @endphp
                <div class="position-relative">
                    <div class="d-flex justify-content-center align-items-center civitas-home-article-opacity position-absolute top-50 w-100">
                        <div class="d-flex justify-content-center align-items-center civitas-home-article-opacity-content">LES ARTICLES</div>
                    </div>
                    <img src="{{ asset($latestArticle->image) }}" class="" width="550" height="580" alt="Latest Article" />
                    <div class="bottom-0 position-absolute start-50 translate-middle">
                        <a href="{{ route('civitas.newsheadline', ['url' => $latestArticle->url, 'title' => Str::slug($latestArticle->title)]) }}" class="d-flex justify-content-center align-items-center civitas-home-article-button">VOIR</a>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-12 col-md-6">
                @foreach($latestnews->skip(1) as $news)
                <div class="d-flex mb-3">
                    <div class="col-4">
                        <a href="{{ route('civitas.newsheadline', ['url' => $news->url, 'title' => Str::slug($news->title)]) }}">
                            <img src="{{ asset($news->image) }}" class="img-fluid" width="180" height="120" alt="Thumbnail" />
                        </a>
                    </div>
                    <div class="col-8 ms-3">
                        <div class="title-article-small">{{ $news->category }}</div>
                        <div class="title-article">{{ $news->title }}</div>
                        <div class="description-article">
                            {{ $news->user->name ?? 'Unknown' }} | {{ $news->created_at->format('d.m.Y') }}
                        </div>
                    </div>
                </div>
                @if(!$loop->last)
                <div class="civitas-grey-line-articles"></div>
                @endif
                @endforeach
                <div class="mt-5 d-flex justify-content-center align-items-center">
                    <a href="{{ route('civitas.news') }}" class="articles-button d-flex justify-content-center align-items-center">PLUS D’ACTUALITES</a>
                </div>
            </div>
        </div>
    </div>
    <div class="space-100"></div>
    <div class="position-relative">
        <div class="civitas-home-bg">
            <div class="d-flex align-items-center flex-column civitas-absolute-center-bottom">
                <div class="civitas-title-big-bg">NOTRE PROGRAMME</div>
                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/civitas/civitas_logo_pdf.png') }}" class="me-3" alt="logo" />
                    <a href="javascript:void(0);" download class="civitas-home-pdf text-decoration-underline">Télécharger au format PDF</a>
                </div>
                <img src="{{ asset('img/civitas/civitas_home_3.png') }}" class="mt-5 " alt="logo" />
            </div>
        </div>
    </div>
    <div class="py-5 text-center d-flex flex-column align-items-center bg-dark">
        <div class="mt-5 civitas-title-black-bg">"Les vrais amis du peuple ne sont ni révolutionnaires ni novateurs, mais traditionalistes.”</div>
        <div class="mt-4 civitas-title-black-bg">Saint Pie X</div>
        <div class="space-50"></div>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="p-3 civitas-home-grey-box d-flex flex-column justify-content-center align-items-center">
                    <div class="civitas-home-content-box">LES POSITIONS POLITIQUES DE CIVITAS SUISSE</div>
                    <a href="{{route ('political-program-home')}}" class="mt-3 d-flex justify-content-center align-items-center civitas-home-grey-box-button">VOIR LES THÈMES</a>
                </div>
                <div class="p-3 civitas-home-red-box d-flex flex-column justify-content-center align-items-center">
                    <div class="civitas-home-content-box">ADHÉREZ AU MOUVEMENT</div>
                    <br>
                    <a href="{{route ('civitas.member')}}" class="mt-3 d-flex justify-content-center align-items-center civitas-home-red-box-button">POUR LA SUISSE !</a>
                </div>
                <div class="p-3 civitas-home-grey-box d-flex flex-column justify-content-center align-items-center">
                    <div class="civitas-home-content-box">PARTICIPEZ À DES CONFÉRENCES<br>ET ÉVÉNEMENT</div>
                    <a href="{{ route('civitas.events') }}" class="mt-3 d-flex justify-content-center align-items-center civitas-home-grey-box-button-2">VOIR LE CALENDRIER</a>
                </div>
            </div>
            <div class="mt-5 d-flex justify-content-center">
                <a href="{{ route('civitas.initiatives') }}" class="d-flex justify-content-center align-items-center civitas-home-big-red-button">INITIATIVES ET RÉFÉRUNDUMS</a>
                <div class="mx-5"></div>
                <a href="{{ route('civitas.legacy') }}" class="d-flex justify-content-center align-items-center civitas-home-big-white-button">L’HÉRITAGE DE CIVITAS SUISSE</a>
            </div>
        </div>
    </div>

    <div class="space-50"></div>
    <a href="{{ route('civitas.votes_overview', ['category' => 'initiatives-populaires']) }}" class="text-decoration-none">
        <div class="civitas-home-new-gradient">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="civitas-home-new-content">Les prochaines votations populaires fédérales et/ou cantonales</div>
            </div>
        </div>
    </a>
    <div>
        @include('home_page_slider')
    </div>
    <div class="space-100"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-xl-6 col-xxl-6">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('img/civitas/civitas_home_5.png') }}" class="" alt="logo" />
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-xl-6">
                <div class="d-flex justify-content-center align-items-center h-100 border-button">
                    <a href="{{ route('catholic-vote') }}" class="d-flex justify-content-center align-items-center civitas-home-red-button-last">Défendons nos libertés !</a>
                </div>
            </div>
        </div>
    </div>
    <div class="space-500"></div>
    <div class="position-relative">
        <div class="d-flex justify-content-end">
            <img src="{{ asset('img/civitas/civitas_home_bg.png') }}" class="" alt="logo" />
        </div>
        <div class="top-0 position-absolute start-50 translate-middle">
            <a href="{{ route('civitas.newpage') }}" class="img-zoom">
                <img src="{{ asset('img/civitas/civitas_home_6.png') }}" class="" alt="logo" />
            </a>
        </div>
    </div>
    <div class="space-100"></div>
    <div>
        @include('home_page_last_section')
    </div>
    <div class="space-100"></div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="position-relative">
        @if($latestnews->isNotEmpty())
        @php $latestArticle = $latestnews->first(); @endphp
        <img src="{{ asset($latestArticle->image) }}" class="w-100" height="435" alt="Latest Article" />
        <div class="civitas-article-absolute-bottom w-100">
            <div class="d-flex justify-content-center align-items-center civitas-home-article-opacity-content">LES ARTICLES</div>
            <div class="mt-4 d-flex justify-content-center">
                <a href="{{ route('civitas.newsheadline', ['url' => $latestArticle->url, 'title' => Str::slug($latestArticle->title)]) }}" class="d-flex justify-content-center align-items-center civitas-home-article-button">VOIR</a>
            </div>
        </div>
        @endif
    </div>
    <div class="container my-3">
        @foreach($latestnews->skip(1) as $news)
        <div class="my-3 d-flex">
            <div class="col-4 col-sm-4 col-md-4">
                <a href="{{ route('civitas.newsheadline', ['url' => $news->url, 'title' => Str::slug($news->title)]) }}">
                    <img src="{{ asset($news->image) }}" class="" alt="Article Image" />
                </a>
            </div>
            <div class="col-8 col-sm-8 col-md-8">
                <div class="d-flex flex-column ms-4">
                    <div class="title-article-small">{{ $news->category }}</div>
                    <div class="title-article">{{ $news->title }}</div>
                    <div class="description-article">{{ $news->user->name ?? 'Unknown' }} | {{ $news->created_at->format('d.m.Y') }}</div>
                </div>
            </div>
        </div>
        @if(!$loop->last)
        <div class="civitas-grey-line-articles"></div>
        @endif
        @endforeach
        <div class="mt-4 d-flex justify-content-center align-items-center">
            <a href="{{ route('civitas.news') }}" class="articles-button d-flex justify-content-center align-items-center">PLUS D’ACTUALITES</a>
        </div>
    </div>
    <div class="position-relative">
        <div class="civitas-home-bg">
            <div class="position-absolute top-50 start-50 translate-middle w-100">
                <div class="d-flex align-items-center flex-column">
                    <div class="civitas-title-big-bg">NOTRE PROGRAMME</div>
                    <img src="{{ asset('img/civitas/responsive/civitas_home_3.png') }}" class="my-3" alt="logo" />
                    <div class="civitas-title-black-bg">"Les vrais amis du peuple ne sont ni révolutionnaires ni novateurs, mais traditionalistes.”</div>
                    <div class="my-3 civitas-title-black-bg">Saint Pie X</div>
                    <div class="flex-row d-flex align-items-center">
                        <img src="{{ asset('img/civitas/civitas_logo_pdf.png') }}" class="me-3" alt="logo" />
                        <a href="javascript:void(0);" download class="civitas-home-pdf text-decoration-underline">Télécharger au format PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-4 bg-dark">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="mb-4 w-100 p-3 civitas-home-grey-box d-flex flex-column justify-content-between align-items-center">
                    <div class="civitas-home-content-box">LES POSITIONS POLITIQUES DE CIVITAS SUISSE</div>
                    <a href="{{route ('political-program-home')}}" class="mt-3 d-flex justify-content-center align-items-center civitas-home-grey-box-button">VOIR LES THÈMES</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-4 w-100 p-3 civitas-home-grey-box d-flex flex-column justify-content-center align-items-center">
                    <div class="civitas-home-content-box">PARTICIPEZ À DES CONFÉRENCES<br>ET ÉVÉNEMENT</div>
                    <a href="{{ route('civitas.events') }}" class="mt-3 d-flex justify-content-center align-items-center civitas-home-grey-box-button-2">VOIR LE CALENDRIER</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-4 w-100 p-3 civitas-home-red-box d-flex flex-column justify-content-center align-items-center">
                    <div class="civitas-home-content-box">ADHÉREZ AU MOUVEMENT</div>
                    <br>
                    <a href="{{route ('civitas.member')}}" class="mt-3 d-flex justify-content-center align-items-center civitas-home-red-box-button">POUR LA SUISSE !</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('civitas.initiatives') }}" class="mb-4 mb-3 d-flex justify-content-center align-items-center civitas-home-big-red-button">INITIATIVES ET RÉFÉRUNDUMS</a>
            </div>
            <div class="col-md-6">
                <a href="{{ route('civitas.legacy') }}" class="mb-4 mb-3 d-flex justify-content-center align-items-center civitas-home-big-white-button">L’HÉRITAGE DE CIVITAS SUISSE</a>
            </div>
        </div>
    </div>
    <a href="{{ route('civitas.votes_overview', ['category' => 'initiatives-populaires']) }}" class="text-decoration-none">
        <div class="black-bg-full d-flex align-items-center my-3">
            <marquee behavior="scroll" direction="right" scrollamount="12" class="civitas-marquee-new">Les prochaines votations populaires fédérales et/ou cantonales</marquee>
        </div>
    </a>
    <div>
        @include('home_page_slider')
    </div>
    <div class="container my-5">
        <div class="d-flex justify-content-center">
            <img src="{{ asset('img/civitas/responsive/civitas_home_5.png') }}" class="" alt="logo" />
        </div>
        <div class="my-5 d-flex justify-content-center align-items-center">
            <a href="{{ route('catholic-vote') }}" class="d-flex justify-content-center align-items-center civitas-home-red-button-last">Défendons nos libertés !</a>
        </div>
        <div class="d-flex justify-content-center">
            <a href="{{ route('civitas.newpage') }}" class="">
                <img src="{{ asset('img/civitas/responsive/new_page.png') }}" class="" alt="logo" />
            </a>
        </div>
    </div>
    <div>
        @include('home_page_last_section')
    </div>
</div>
@endsection

