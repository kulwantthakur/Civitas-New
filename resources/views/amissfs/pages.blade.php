@extends('amissfs.app')

@section('logo')
@if ($page == 0)
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('amissfs.home') }}" class="logo-absolute">
        <img src="{{ asset('/img/logo/amissfs_logo_dark.svg') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('/img/amissfs/responsive/amissfs-logo.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </a>
</div>
<div class="d-block d-lg-none">
    <div class="position-absolute top-50 start-50">
        <div class="amissfs-title-logo-responsive">L’ASSOCIATION</div>
    </div>
</div>
@elseif($page == 1 || $page == 2 || $page == 3 || $page == 5)
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('amissfs.home') }}" class="logo-absolute">
        <img src="{{ asset('/img/logo/amissfs_logo_dark.svg') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('/img/logo/responsive/logo_amissfs_2.svg') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </a>
</div>
@elseif($page == 4 || $page == 7)
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('amissfs.home') }}" class="">
        <img src="{{ asset('/img/logo/amissfs_logo_si_si.svg') }}" class="" alt="logo" />
        <!-- <img src="{{ asset('/img/logo/responsive/logo_amissfs_2.svg') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" /> -->
    </a>
</div>
@elseif($page == 6)
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('amissfs.home') }}" class="">
        <img src="{{ asset('/img/logo/amissfs_logo_si_si.svg') }}" class="" alt="logo" />
    </a>
</div>
@endif
@endsection


@section('content')
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@if($page == 0)
<div class="container">
    <div class="text-center d-flex flex-column align-items-center">
        <img src="{{ asset('/img/amissfs/amissfs-logo-page.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <div class="mt-3 amissfs-title-responsive">NOS ACTIVITÉS</div>
        <div class="black-line-amissfs"></div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div>
        {!! trans('words.amissfs_notre-mission') !!}
    </div>
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="position-relative">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('/img/amissfs/amissfs-notre.png') }}" class="" alt="logo" />
                <div class="absolute-center">
                    <div class="p-5 black-box-gradient-1">
                        <div class="px-3">
                            {!! trans('words.amissfs_first-box') !!}
                        </div>
                        <div class="m-auto d-flex justify-content-center align-items-center yellow-box width-240 height-44 suisse-regular-20">
                            <a href="{{ route('podcasts') }}" class="text-white euclid-16 text-decoration-none text-uppercase">Accéder aux audios</a>
                        </div>
                    </div>
                    <div class="space-100"></div>
                    <div class="p-5 black-box-gradient-2">
                        <div class="px-3">
                            {!! trans('words.amissfs_second-box') !!}
                        </div>
                        <div class="m-auto d-flex justify-content-center align-items-center yellow-box width-240 height-44 suisse-regular-20">
                            <a href="{{ route('le-bulletin-archive')}}" class="text-white euclid-16 text-decoration-none text-uppercase">Accéder à la lecture</a>
                        </div>
                        <div class="m-auto mt-5 d-flex justify-content-center align-items-center orange-light-box width-161 height-43 suisse-regular-20">
                            <a href="{{ route('le-bulletin-commander')}}" class="text-white euclid-16 text-decoration-none text-uppercase">commander</a>
                        </div>
                    </div>
                    <div class="space-100"></div>
                    <div class="p-5 black-box-gradient-3">
                        <div class="px-3">
                            {!! trans('words.amissfs_third-box') !!}
                        </div>
                        <div class="m-auto mt-3 d-flex justify-content-center align-items-center yellow-box width-161 height-43 suisse-regular-20">
                            <a href="{{ route('rom-kurier-archive')}}" class="text-white euclid-16 text-decoration-none text-uppercase">consulter</a>
                        </div>
                        <div class="m-auto mt-3 d-flex justify-content-center align-items-center orange-light-box width-161 height-43 suisse-regular-20">
                            <a href="{{ route('rom-kurier-commander')}}" class="text-white euclid-16 text-decoration-none text-uppercase">commander</a>
                        </div>
                    </div>
                    <div class="space-100"></div>
                    <div class="p-5 black-box-gradient-3">
                        <div class="px-3">
                            {!! trans('words.amissfs_fourth-box') !!}
                        </div>
                        <div class="red-bg-gradient width-472 height-76 d-flex justify-content-center flex-column">
                            <a href="{{ route('amissfs-contact') }}" class="text-decoration-none">
                                {!! trans('words.amissfs_red-box') !!}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="position-relative">
        <img src="{{ asset('/img/amissfs/responsive/association_page.png') }}" class="w-100" alt="logo" />
        <div class="absolute-top-responsive w-100 position-absolute top-0">
            <div class="p-3 association-page-title-responsive text-center text-white">NOS MOYENS DE DIFFUSION</div>
            <div class="p-3 mt-3 black-box-gradient-1">
                {!! trans('words.amissfs_first-box') !!}
                <div class="m-auto d-flex justify-content-center align-items-center yellow-box width-240 height-44 suisse-regular-20">
                    <a href="{{ route('podcasts') }}" class="text-white euclid-16 text-decoration-none text-uppercase">Accéder aux audios</a>
                </div>
            </div>
            <div class="p-3 mt-5 black-box-gradient-2">
                {!! trans('words.amissfs_second-box') !!}
                <div class="m-auto d-flex justify-content-center align-items-center yellow-box width-240 height-44 suisse-regular-20">
                    <a href="{{ route('le-bulletin-archive')}}" class="text-white euclid-16 text-decoration-none text-uppercase">Accéder à la lecture</a>
                </div>
                <div class="m-auto mt-5 d-flex justify-content-center align-items-center orange-light-box width-161 height-43 suisse-regular-20">
                    <a href="{{ route('le-bulletin-commander')}}" class="text-white euclid-16 text-decoration-none text-uppercase">commander</a>
                </div>
            </div>
            <div class="p-3 mt-5 black-box-gradient-3">
                {!! trans('words.amissfs_third-box') !!}
                <div class="m-auto mt-3 d-flex justify-content-center align-items-center yellow-box width-161 height-43 suisse-regular-20">
                    <a href="{{ route('rom-kurier-archive')}}" class="text-white euclid-16 text-decoration-none text-uppercase">consulter</a>
                </div>
                <div class="m-auto mt-3 d-flex justify-content-center align-items-center orange-light-box width-161 height-43 suisse-regular-20">
                    <a href="{{ route('rom-kurier-commander')}}" class="text-white euclid-16 text-decoration-none text-uppercase">commander</a>
                </div>
            </div>
            <div class="p-3 mt-5 black-box-gradient-3">
                {!! trans('words.amissfs_fourth-box') !!}
                <div class="p-2 my-auto red-bg-gradient">
                    <a href="{{ route('amissfs-contact') }}" class="text-decoration-none">
                        {!! trans('words.amissfs_red-box') !!}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@elseif($page == 1)
<div class="container">
    <div class="d-flex justify-content-center align-items-center amissfs-bulletin-absolute-top-responsive">
        <div class="position-relative">
            <div class="position-relative">
                <img src="{{ asset('/img/amissfs/amissfs-page-logo.png') }}" alt="logo" />
                <div class="numero-position-absolute sang-bleu-15 text-dark">
                    NUMÉRO {{ $latestRecord->number }}
                </div>
            </div>
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="amissfs-bulletin-specific-height d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none"></div>
    <div class="m-auto d-flex justify-content-center align-items-start flex-column width-329">
        <div class="bulletin-download-title">{{ $latestRecord->title }}<br>({{ $latestRecord->subtitle }}) </div>
        <div class="bulletin-download-content my-4">Période : {{ preg_replace('/,\s*/', ', ', $latestRecord->period) }} {{ $latestRecord->year }}</div>
        <div>
            <li class="bulletin-download-content-bullets">Contenu Thématique :</li>
            <div class="bulletin-download-content ms-5"> {!! $latestRecord->content !!}</div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center flex-column">
        <div class="my-5 d-flex justify-content-center align-items-center">
            <img src="{{ asset('/img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
            @if(isset($latestRecord->pdf))
            <a href="{{ asset($latestRecord->pdf) }}" target="_blank" class="pdf-download">Télécharger au format PDF</a>
            @else
            <a href="javascript:void(0);" class="pdf-download">Télécharger au format PDF</a>
            @endif
        </div>
        <div class="grey-box-bulletin d-flex justify-content-center align-items-center flex-column">
            <div class="p-3 text-center text-white suisse-italic-20">LE BULLETIN DES AMIS DE SAINT FRANÇOIS DE SALES</div>
            <a href="{{ route('le-bulletin-archive') }}" class="bg-white suisse-regular-18 width-201 height-38 text-dark d-flex justify-content-center align-items-center text-decoration-none">LES ARCHIVES</a>
        </div>
        <a href="{{ route('le-bulletin-commander') }}" class="mt-5 text-white red-box width-201 height-36 suisse-regular-18 lh-base d-flex justify-content-center align-items-center text-decoration-none">COMMANDER</a>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@elseif($page == 2)
<div class="container">
    <div class="m-auto d-flex flex-column der-rom-width">
        <div class="position-relative">
            <div class="archive-amissfs-bg">
                <div class="absolute-center w-100">
                    <div class="d-flex align-items-center flex-column">
                        <div class="archive-title">ARCHIVE</div>
                        <div class="mb-3 black-line-amissfs width-49"></div>
                        <div class="mt-3 suisse-italic-25 text-dark">
                            “Tout par amour. Rien par force“
                        </div>
                        <div class="amissfs-title-archive-blue">
                            St. François de Sales
                        </div>
                    </div>
                </div>

                <div class="space-100"></div>

                <div class="archive-absolute-bottom">
                    <div class="bulletin-title-bold ms-4">Le Bulletin</div>
                    <div class="d-flex flex-column">
                        <!-- Année -->
                        <div class="mt-5 d-flex justify-content-start align-items-center">
                            <label class="bulletin-label text-start width-107 ms-4">Année:</label>
                            <select
                                name="annee"
                                class="archive-bulletin-page text-dark width-115 height-38 archive-bulletin-page-img annee"
                            >
                                <option value="">Toutes</option>
                                <option value="2025">2025</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                            </select>
                        </div>

                        <!-- Afficher -->
                        <div class="mt-3 d-flex justify-content-start align-items-center">
                            <label class="bulletin-label text-start width-107 ms-4">Afficher</label>
                            <select
                                name="afficher"
                                class="archive-bulletin-page text-dark width-95 height-38 archive-bulletin-page-img afficher"
                            >
                                <option value="15">15</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="all">TOUT</option>
                            </select>
                        </div>

                        <!-- Filtre -->
                        <div class="mt-3 d-flex justify-content-start align-items-center">
                            <label class="bulletin-label text-start width-107 ms-4">Filtre:</label>
                            <input
                                type="text"
                                name="filter"
                                placeholder="Rechercher..."
                                class="width-200 height-38 bulletin-input filter-amissfs"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-100"></div>

        <div class="mt-5 row">
            <div class="flex-row d-flex">
                <div class="col-12">
                    <div class="flex-row d-flex">
                        <div class="col-4 col-sm-4 col-md-4 col-lg-6 col-xl-6 col-xxl-6">
                            <div class="archive-bulletin text-dark">Numéro</div>
                        </div>
                        <div class="col-8 col-sm-8 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
                            <div class="archive-bulletin text-dark">Titre</div>
                        </div>
                    </div>

                    <!-- Results Area -->
                    <div class="results-filter-amissfs" data-section-id="{{ $section_id }}"></div>

                    <!-- Pagination Controls -->
                    <div class="text-center mt-4">
                        <button class="loadMore btn btn-primary px-4 py-2" style="display:none;">
                            Charger plus
                        </button>
                        <div class="loadingSpinner mt-2" style="display:none;">
                            <img src="{{ asset('img/loading.gif') }}" alt="Loading..." width="40" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-100"></div>

        <div class="m-auto d-flex red-box width-201 height-36 justify-content-center align-items-center">
            <a href="{{ route('dons') }}" class="text-white archive-bulletin">FAIRE UN DON</a>
        </div>
    </div>
</div>

<div class="space-100"></div>
@elseif($page == 3)
<div class="container">
    <div>
        {!! trans('words.amissfs_commander') !!}
    </div>
    <div class="space-100"></div>
    <div class="text-center d-flex flex-column align-items-center">
        <div class="sang-bleu-24 text-dark text-uppercase">Formulaire<br>de commande</div>
        <div class="black-line-amissfs"></div>
    </div>
    <form id="form-lebulletin" method="POST" action="{{ route('submit-form') }}">
        @csrf
        <input type="hidden" class="commander-input" name="source_page">
        <div class="m-auto d-flex flex-column bulletin-comander-width">
            <div class="mt-5 d-flex align-items-center">
                <label class="commander-label width-85">Titre</label>
                <select class="commander-input archive-bulletin-page-img" name="gender" id="titre" data-required="true" @auth readonly disabled @endauth>
                    @auth
                    <option value="mrs" @if(Auth::user()->gender == 'mrs') selected @endif>MADAME</option>
                    <option value="mr" @if(Auth::user()->gender == 'mr') selected @endif>MONSIEUR</option>
                    @else
                    <option value="mrs">MADAME</option>
                    <option value="mr">MONSIEUR</option>
                    @endauth
                </select>
            </div>
            <div class="mt-3 d-flex align-items-center input-wrapper">
                <label class="commander-label width-155">Nom *</label>
                <input type="text" id="fname-amissfs" class="commander-input" name="firstname"
                    value="@auth{{ auth()->user()->firstname }}@endauth"
                    @auth readonly @else data-required="true" @endauth>
                     <span class="error-icon" style="display: none;">!</span>
            </div>
            <div class="mt-3 d-flex align-items-center input-wrapper">
                <label class="commander-label width-155">Prénom *</label>
                <input type="text" id="lname-amissfs" class="commander-input" name="lastname"
                    value="@auth{{ auth()->user()->lastname }}@endauth"
                    @auth readonly @else data-required="true" @endauth>
                     <span class="error-icon" style="display: none;">!</span>
            </div>
            <div class="mt-3 d-flex align-items-center input-wrapper">
                <label class="commander-label width-155">Adresse et numéro *</label>
                <input type="text" id="address-amissfs" class="commander-input" name="address" data-required="true">
                 <span class="error-icon" style="display: none;">!</span>
            </div>
            <div class="mt-3 d-flex align-items-center input-wrapper">
                <label class="commander-label width-155">NPA et Localité *</label>
                <input type="text" id="post-code-amissfs" class="commander-input" name="post_code" data-required="true">
                 <span class="error-icon" style="display: none;">!</span>
            </div>
            <div class="mt-3 d-flex align-items-center">
                <label class="commander-label width-155">Canton/Province</label>
                <input type="text" id="canton-province" class="commander-input" name="canton_province">
            </div>
            <div class="mt-3 d-flex align-items-center">
                <label class="commander-label width-155">Pays</label>
                <input type="text" id="pays-amissfs" class="commander-input" name="country">
            </div>
            <div class="mt-3 d-flex align-items-center input-wrapper">
                <label class="commander-label width-155">E-mail*</label>
                <input type="email" id="email-amissfs" class="commander-input" name="email"
                    value="@auth{{ auth()->user()->email }}@endauth"
                    @auth readonly @else data-required="true" @endauth>
                     <span class="error-icon" style="display: none;">!</span>
            </div>
            <div class="mt-3 d-flex align-items-center">
                <label class="commander-label width-155">Articles</label>
                <input type="text" id="articles-amissfs" class="commander-input" name="articles">
            </div>
            <div class="mt-3 d-flex align-items-center ">
                <label class="commander-label width-155">Référence</label>
                <input type="text" id="reference-amissfs" class="commander-input" name="reference">
            </div>
            <div class="mt-3 d-flex align-items-center">
                <label class="commander-label width-155">Titre</label>
                <input type="text" id="titre-amissfs" class="commander-input" name="titre_detail">
            </div>
            <div class="mt-3 d-flex align-items-center">
                <label class="commander-label width-155">Quantité</label>
                <input type="text" id="quantity-amissfs" class="commander-input" name="quantity">
            </div>
            <div class="mt-3 d-flex align-items-center">
                <label class="commander-label width-155">Prix</label>
                <input type="text" id="prix-amissfs" class="commander-input" name="price">
            </div>
            <div class="mt-3 d-flex align-items-center">
                {!! trans('words.amissfs_commander_last') !!}
            </div>
            <div class="m-auto mt-5 d-flex justify-content-center align-items-center valider-color width-163 height-62">
                <button type="submit" class="commander-valider text-decoration-none border-0 background-none">VALIDER</button>
            </div>

        </div>
    </form>

    <div class="m-auto mt-4 d-flex justify-content-center align-items-center fair-un-don-amissfs width-163 height-62">
        <a href="{{ route('dons')}}" class="commander-fair text-decoration-none">FAIR UN<br>DON</a>
    </div>
</div>
<div class="space-50"></div>
<div class="black-bg-full d-flex align-items-center">
    <marquee behavior="scroll" direction="right" scrollamount="12" class="text-white sang-blue-regular-20">PROTECTION DES DONNÉES / DATENSCHUTZE</marquee>
</div>
@elseif($page == 4)
<div class="container">
    <div class="d-flex justify-content-center align-items-center flex-column ">
        <div class="d-flex flex-column">
            <div class="mt-5 rom-kurier-title-cloister mt-lg-0">DER ROM-KURIER</div>
            <div class="space-100"></div>
            <div class="sang-bleu-15 text-dark text-end">NUMÉRO {{ $latestRecord->number }}</div>
        </div>
        <div class="space-100"></div>
        <div class="m-auto d-flex justify-content-center align-items-start flex-column width-329">
            <div class="bulletin-download-title">{{ $latestRecord->title }}<br>({{ $latestRecord->subtitle }}) </div>
            <div class="bulletin-download-content my-4">Période : {{ preg_replace('/,\s*/', ', ', $latestRecord->period) }} {{ $latestRecord->year }}</div>
            <div>
                <li class="bulletin-download-content-bullets">Contenu Thématique :</li>
                <div class="bulletin-download-content ms-5"> {!! $latestRecord->content !!}</div>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column">
            <div class="my-5 d-flex justify-content-center align-items-center">
                <img src="{{ asset('/img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
                @if(isset($latestRecord->pdf))
                <a href="{{ asset($latestRecord->pdf) }}" target="_blank" class="pdf-download">Télécharger au format PDF</a>
                @else
                <a href="javascript:void(0);" class="pdf-download">Télécharger au format PDF</a>
                @endif
            </div>
            <div class="red-box-bulletin d-flex justify-content-center align-items-center flex-column">
                <div class="p-3 box-italic-20">Si Si No No en langue allemande</div>
                <a href="{{ route('rom-kurier-archive') }}" class="bg-white suisse-regular-18 width-277 height-38 text-dark d-flex justify-content-center align-items-center text-decoration-none text-uppercase">les archives du rom-kurier</a>
            </div>
            <a href="{{ route('rom-kurier-commander') }}" class="mt-5 text-white red-box width-201 height-38 suisse-regular-18 lh-base d-flex justify-content-center align-items-center text-decoration-none">COMMANDER</a>
        </div>
    </div>
</div>
<div class="space-100"></div>
@elseif($page == 5)
<div class="container">
    <div class="m-auto d-flex flex-column der-rom-width">
        <div class="position-relative">
            <div class="archive-amissfs-bg">
                <div class="absolute-center w-100">
                    <div class="d-flex align-items-center flex-column">
                        <div class="archive-title">ARCHIVE</div>
                        <div class="mb-3 black-line-amissfs width-49"></div>
                        <div class="mt-3 suisse-italic-25 text-dark">
                            “ Tu es Petrus “
                        </div>
                        <div class="amissfs-title-archive-blue">
                            ( Mt 16 : 18 )
                        </div>
                    </div>
                </div>

                <div class="space-100"></div>

                <div class="archive-absolute-bottom">
                    <div class="bulletin-title-bold ms-4">Der Rom Kurier</div>
                    <div class="d-flex flex-column">
                        <!-- Année -->
                        <div class="mt-5 d-flex justify-content-start align-items-center">
                            <label class="bulletin-label text-start width-107 ms-4">Année:</label>
                            <select
                                name="annee"
                                class="archive-bulletin-page text-dark width-115 height-38 archive-bulletin-page-img annee"
                            >
                                <option value="">Toutes</option>
                                <option value="2025">2025</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                            </select>
                        </div>

                        <!-- Afficher -->
                        <div class="mt-3 d-flex justify-content-start align-items-center">
                            <label class="bulletin-label text-start width-107 ms-4">Afficher</label>
                            <select
                                name="afficher"
                                class="archive-bulletin-page text-dark width-95 height-38 archive-bulletin-page-img afficher"
                            >
                                <option value="15">15</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="all">TOUT</option>
                            </select>
                        </div>

                        <!-- Filtre -->
                        <div class="mt-3 d-flex justify-content-start align-items-center">
                            <label class="bulletin-label text-start width-107 ms-4">Filtre:</label>
                            <input
                                type="text"
                                name="filter"
                                placeholder="Rechercher..."
                                class="width-200 height-38 bulletin-input filter-amissfs"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-100"></div>

        <div class="mt-5 row">
            <div class="flex-row d-flex">
                <div class="col-12">
                    <div class="flex-row d-flex">
                        <div class="col-4 col-sm-4 col-md-4 col-lg-6 col-xl-6 col-xxl-6">
                            <div class="archive-bulletin text-dark">Numéro</div>
                        </div>
                        <div class="col-8 col-sm-8 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
                            <div class="archive-bulletin text-dark">Titre</div>
                        </div>
                    </div>

                    <!-- Results Area -->
                    <div class="results-filter-amissfs" data-section-id="{{ $section_id }}"></div>

                    <!-- Pagination Controls -->
                    <div class="text-center mt-4">
                        <button class="loadMore btn btn-primary px-4 py-2" style="display:none;">
                            Charger plus
                        </button>
                        <div class="loadingSpinner mt-2" style="display:none;">
                            <img src="{{ asset('img/loading.gif') }}" alt="Loading..." width="40" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-100"></div>

        <div class="m-auto d-flex red-box width-201 height-36 justify-content-center align-items-center">
            <a href="{{ route('dons') }}" class="text-white archive-bulletin">FAIRE UN DON</a>
        </div>
    </div>
</div>

<div class="space-100"></div>

@elseif($page == 6)
<div class="container">
    <div class="mb-5 d-flex flex-column">
        <div class="mt-5 rom-kurier-title-cloister ">DER ROM-KURIER</div>
    </div>
    <div>
        {!! trans('words.amissfs__de-rom_commander') !!}
    </div>
    <div class="space-100"></div>
    <div class="text-center d-flex flex-column align-items-center">
        <div class="sang-bleu-24 text-dark">FORMULAIRE<br>DE COMMANDE</div>
        <div class="black-line-amissfs"></div>
    </div>
    <form id="form-romkurier" method="POST" action="{{ route('submit-form') }}">
        @csrf
        <input type="hidden" class="commander-input" name="source_page">
        <div class="m-auto d-flex flex-column bulletin-comander-width">
            <div class="mt-5 d-flex align-items-center">
                <label class="commander-label width-85">Titre</label>
                <select class="commander-input archive-bulletin-page-img" name="gender" id="titre" data-required="true" @auth readonly disabled @endauth>
                    @auth
                    <option value="mrs" @if(Auth::user()->gender == 'mrs') selected @endif>MADAME</option>
                    <option value="mr" @if(Auth::user()->gender == 'mr') selected @endif>MONSIEUR</option>
                    @else
                    <option value="mrs">MADAME</option>
                    <option value="mr">MONSIEUR</option>
                    @endauth
                </select>
            </div>
            <div class="mt-3 d-flex align-items-center input-wrapper">
                <label class="commander-label width-155">Nom *</label>
                <input type="text" id="fname-amissfs" class="commander-input" name="firstname"
                    value="@auth{{ auth()->user()->firstname }}@endauth"
                    @auth readonly @else data-required="true" @endauth>
                <span class="error-icon" style="display: none;">!</span>
            </div>
            <div class="mt-3 d-flex align-items-center input-wrapper">
                <label class="commander-label width-155">Prénom *</label>
                <input type="text" id="lname-amissfs" class="commander-input" name="lastname"
                    value="@auth{{ auth()->user()->lastname }}@endauth"
                    @auth readonly @else data-required="true" @endauth>
                <span class="error-icon" style="display: none;">!</span>
            </div>
            <div class="mt-3 d-flex align-items-center input-wrapper">
                <label class="commander-label width-155">Adresse et numéro *</label>
                <input type="text" id="address-amissfs" class="commander-input" name="address" data-required="true">
                <span class="error-icon" style="display: none;">!</span>
            </div>
            <div class="mt-3 d-flex align-items-center input-wrapper">
                <label class="commander-label width-155">NPA et Localité *</label>
                <input type="text" id="post-code-amissfs" class="commander-input" name="post_code" data-required="true">
                <span class="error-icon" style="display: none;">!</span>
            </div>
            <div class="mt-3 d-flex align-items-center">
                <label class="commander-label width-155">Canton/Province</label>
                <input type="text" id="canton-province" class="commander-input" name="canton_province">
            </div>
            <div class="mt-3 d-flex align-items-center">
                <label class="commander-label width-155">Pays</label>
                <input type="text" id="pays-amissfs" class="commander-input" name="country">
            </div>
            <div class="mt-3 d-flex align-items-center input-wrapper">
                <label class="commander-label width-155">E-mail*</label>
                <input type="email" id="email-amissfs" class="commander-input" name="email"
                    value="@auth{{ auth()->user()->email }}@endauth"
                    @auth readonly @else data-required="true" @endauth>
                <span class="error-icon" style="display: none;">!</span>
            </div>
            <div class="mt-3 d-flex align-items-center">
                <label class="commander-label width-155">Articles</label>
                <input type="text" id="articles-amissfs" class="commander-input" name="articles">
            </div>
            <div class="mt-3 d-flex align-items-center ">
                <label class="commander-label width-155">Référence</label>
                <input type="text" id="reference-amissfs" class="commander-input" name="reference">
            </div>
            <div class="mt-3 d-flex align-items-center">
                <label class="commander-label width-155">Titre</label>
                <input type="text" id="titre-amissfs" class="commander-input" name="titre_detail">
            </div>
            <div class="mt-3 d-flex align-items-center">
                <label class="commander-label width-155">Quantité</label>
                <input type="text" id="quantity-amissfs" class="commander-input" name="quantity">
            </div>
            <div class="mt-3 d-flex align-items-center">
                <label class="commander-label width-155">Prix</label>
                <input type="text" id="prix-amissfs" class="commander-input" name="price">
            </div>
            <div class="mt-3 d-flex align-items-center">
                {!! trans('words.amissfs_commander_last') !!}
            </div>
            <div class="m-auto mt-5 d-flex justify-content-center align-items-center valider-color width-163 height-62">
                <button type="submit" class="commander-valider text-decoration-none border-0 background-none">VALIDER</button>
            </div>

        </div>
    </form>
    <div class="m-auto mt-4 d-flex justify-content-center align-items-center fair-un-don-amissfs width-163 height-62">
        <a href="{{ route('dons')}}" class="commander-fair text-decoration-none">FAIR UN<br>DON</a>
    </div>
</div>
<div class="space-50"></div>
<div class="black-bg-full d-flex align-items-center">
    <marquee behavior="scroll" direction="right" scrollamount="12" class="text-white sang-blue-regular-20">PROTECTION DES DONNÉES / DATENSCHUTZE</marquee>
</div>
@elseif($page == 7)
<div class="container">
    <div class="d-flex justify-content-center align-items-center flex-column ">
        <div class="d-flex flex-column">
            <div class="mt-5 rom-kurier-title-cloister mt-lg-0">DER ROM-KURIER</div>
            <div class="space-100"></div>
            <div class="sang-bleu-15 text-dark text-end">NUMÉRO {{ $archive->number }}</div>
        </div>
        <div class="space-100"></div>
        <div class="m-auto d-flex justify-content-center align-items-start flex-column width-329">
            <div class="bulletin-download-title">{{ $archive->title }}<br>({{ $archive->subtitle }}) </div>
            <div class="bulletin-download-content my-4">Période : {{ preg_replace('/,\s*/', ', ', $archive->period) }} {{ $archive->year }}</div>
            <div>
                <li class="bulletin-download-content-bullets">Contenu Thématique :</li>
                <div class="bulletin-download-content ms-5">{!! $archive->content !!}</div>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column">
            <div class="my-5 d-flex justify-content-center align-items-center">
                <img src="{{ asset('/img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
                @if(isset($archive->pdf))
                <a href="{{ asset($archive->pdf) }}" target="_blank" class="pdf-download">Télécharger au format PDF</a>
                @else
                <a href="javacript:void(0);" class="pdf-download">Télécharger au format PDF</a>
                @endif
            </div>
            <div class="red-box-bulletin d-flex justify-content-center align-items-center flex-column">
                <div class="p-3 box-italic-20">Si Si No No en langue allemande</div>
                <a href="{{ route('rom-kurier-archive') }}" class="bg-white suisse-regular-18 width-277 height-38 text-dark d-flex justify-content-center align-items-center text-decoration-none text-uppercase">les archives du rom-kurier</a>
            </div>
            <a href="{{ route('rom-kurier-commander') }}" class="mt-5 text-white red-box width-201 height-38 suisse-regular-18 lh-base d-flex justify-content-center align-items-center text-decoration-none">COMMANDER</a>
        </div>
    </div>
</div>
<div class="space-100"></div>
@elseif($page == 8)
<div class="container">
    <div class="d-flex justify-content-center align-items-center amissfs-bulletin-absolute-top-responsive">
        <div class="position-relative">
            <div class="potition-relative">
                <img src="{{ asset('/img/amissfs/amissfs-page-logo.png') }}" alt="logo" />
                <div class="numero-position-absolute sang-bleu-15 text-dark">NUMÉRO {{ $archive->number }}</div>
            </div>
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="amissfs-bulletin-specific-height d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none"></div>
    <div class="m-auto d-flex justify-content-center align-items-start flex-column width-329">
        <div class="bulletin-download-title">{{ $archive->title }}<br>({{ $archive->subtitle }}) </div>
        <div class="bulletin-download-content my-4">Période : {{ preg_replace('/,\s*/', ', ', $archive->period) }} {{ $archive->year }}</div>
        <div>
            <li class="bulletin-download-content-bullets">Contenu Thématique :</li>
            <div class="bulletin-download-content ms-5"> {!! $archive->content !!}</div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center flex-column">
        <div class="my-5 d-flex justify-content-center align-items-center">
            <img src="{{ asset('/img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
            @if(isset($archive->pdf))
            <a href="{{ asset($archive->pdf) }}" target="_blank" class="pdf-download">Télécharger au format PDF</a>
            @else
            <a href="javascript:void(0);" class="pdf-download">Télécharger au format PDF</a>
            @endif
        </div>
        <div class="grey-box-bulletin d-flex justify-content-center align-items-center flex-column">
            <div class="p-3 text-center text-white suisse-italic-20">LE BULLETIN DES AMIS DE SAINT FRANÇOIS DE SALES</div>
            <a href="{{ route('le-bulletin-archive') }}" class="bg-white suisse-regular-18 width-201 height-38 text-dark d-flex justify-content-center align-items-center text-decoration-none">LES ARCHIVES</a>
        </div>
        <a href="{{ route('le-bulletin-commander') }}" class="mt-5 text-white red-box width-201 height-36 suisse-regular-18 lh-base d-flex justify-content-center align-items-center text-decoration-none">COMMANDER</a>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@endif


@if(Auth::user() && ($page == 2))
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Create New Element</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createBulletin" method="POST" action="{{ route('podcast-store.store') }}" enctype="multipart/form-data" files="true">
                @csrf
                <input type="hidden" name="section_id" value="{{ $section_id ?? ''}}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">
                                Title*
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Provide a descriptive title."></i>
                            </label>
                            <input type="text" class="form-control custom-form" name="title" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Author*
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Provide a descriptive author."></i>
                            </label>
                            <input type="text" class="form-control custom-form" name="subtitle" required>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">Number</label>
                            <input type="text" class="form-control custom-form" name="number" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">PDF</label>
                            <input type="file" class="form-control custom-form" name="pdf" accept=".pdf" required>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <div class="d-flex flex-column">
                                <label class="form-label">Select Period</label>
                                <select class="monthSelect selectpicker form-control custom-form" name="period[]" multiple title="Select Period">
                                    <option value="Janvier">Janvier</option>
                                    <option value="Février">Février</option>
                                    <option value="Mars">Mars</option>
                                    <option value="Avril">Avril</option>
                                    <option value="Mai">Mai</option>
                                    <option value="Juin">Juin</option>
                                    <option value="Juillet">Juillet</option>
                                    <option value="Août">Août</option>
                                    <option value="Septembre">Septembre</option>
                                    <option value="Octobre">Octobre</option>
                                    <option value="Novembre">Novembre</option>
                                    <option value="Décembre">Décembre</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Year</label>
                            <input type="text" class="form-control custom-form" name="year" required>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-12">
                            <label class="form-label">Content</label>
                            <div class="content" id="summernote-bulletin-create"></div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>
@elseif(Auth::user() && ($page == 1))
@if(isset($latestRecord))
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Page</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateBulletin" method="POST" action="{{ route('page-store.update', $latestRecord->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control custom-form" name="title" value="{{ $latestRecord->title }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Author</label>
                            <input type="text" class="form-control custom-form" name="subtitle" value="{{ $latestRecord->subtitle }}">
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">Number</label>
                            <input type="text" class="form-control custom-form" name="number" value="{{ $latestRecord->number }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">PDF</label>
                            <input type="file" class="form-control custom-form" name="pdf" accept=".pdf">
                            @if($latestRecord->pdf)
                            <div class="custom-form mt-2">Current PDF: <a href="{{ asset($latestRecord->pdf) }}" target="_blank">View PDF</a></div>
                            @endif
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <div class="d-flex flex-column">
                                <label class="form-label">Select Period</label>
                                <select class="monthSelect selectpicker form-control custom-form" name="period[]" multiple title="Select Period" value="">
                                    <option value="Janvier">Janvier</option>
                                    <option value="Février">Février</option>
                                    <option value="Mars">Mars</option>
                                    <option value="Avril">Avril</option>
                                    <option value="Mai">Mai</option>
                                    <option value="Juin">Juin</option>
                                    <option value="Juillet">Juillet</option>
                                    <option value="Août">Août</option>
                                    <option value="Septembre">Septembre</option>
                                    <option value="Octobre">Octobre</option>
                                    <option value="Novembre">Novembre</option>
                                    <option value="Décembre">Décembre</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Year</label>
                            <input type="text" class="form-control custom-form" name="year" value="{{ $latestRecord->year }}">
                        </div>
                        <div class="my-3"></div>
                        <div class="col-12">
                            <label class="form-label">Content</label>
                            <div class="content" id="summernote-bulletin-edit"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Delete Element</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="deleteBulletin">
                @csrf
                <input type="hidden" name="id" value="{{ $latestRecord->id }}">
                <div class="modal-body">
                    <p class="custom-form">Are you sure you want to delete this item?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@elseif(Auth::user() && ($page == 8))
@if(isset($archive))
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Page</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateBulletinPast" method="POST" action="{{ route('page-store.update', $archive->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control custom-form" name="title" value="{{ $archive->title }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Author</label>
                            <input type="text" class="form-control custom-form" name="subtitle" value="{{ $archive->subtitle }}">
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">Number</label>
                            <input type="text" class="form-control custom-form" name="number" value="{{ $archive->number }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">PDF</label>
                            <input type="file" class="form-control custom-form" name="pdf" accept=".pdf">
                            @if($archive->pdf)
                            <div class="custom-form mt-2">Current PDF: <a href="{{ asset($archive->pdf) }}" target="_blank">View PDF</a></div>
                            @endif
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <div class="d-flex flex-column">
                                <label class="form-label">Select Period</label>
                                <select class="monthSelect selectpicker form-control custom-form" name="period[]" multiple title="Select Period" value="">
                                    <option value="Janvier">Janvier</option>
                                    <option value="Février">Février</option>
                                    <option value="Mars">Mars</option>
                                    <option value="Avril">Avril</option>
                                    <option value="Mai">Mai</option>
                                    <option value="Juin">Juin</option>
                                    <option value="Juillet">Juillet</option>
                                    <option value="Août">Août</option>
                                    <option value="Septembre">Septembre</option>
                                    <option value="Octobre">Octobre</option>
                                    <option value="Novembre">Novembre</option>
                                    <option value="Décembre">Décembre</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Year</label>
                            <input type="text" class="form-control custom-form" name="year" value="{{ $archive->year }}">
                        </div>
                        <div class="my-3"></div>
                        <div class="col-12">
                            <label class="form-label">Content</label>
                            <div class="content" id="summernote-bulletin-edit-past"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Delete Element</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="deleteBulletinPast">
                @csrf
                <input type="hidden" name="id" value="{{ $archive->id }}">
                <div class="modal-body">
                    <p class="custom-form">Are you sure you want to delete this item?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endif

@if(Auth::user() && ($page == 5))
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Create New Element</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createRomKurier" method="POST" action="{{ route('podcast-store.store') }}" enctype="multipart/form-data" files="true">
                @csrf
                <input type="hidden" name="section_id" value="{{ $section_id ?? ''}}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">
                                Title*
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Provide a descriptive title."></i>
                            </label>
                            <input type="text" class="form-control custom-form" name="title" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Author*
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Provide a descriptive author."></i>
                            </label>
                            <input type="text" class="form-control custom-form" name="subtitle" required>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">Number</label>
                            <input type="text" class="form-control custom-form" name="number" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">PDF</label>
                            <input type="file" class="form-control custom-form" name="pdf" accept=".pdf" required>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <div class="d-flex flex-column">
                                <label class="form-label">Select Period</label>
                                <select class="monthSelect selectpicker form-control custom-form" name="period[]" multiple title="Select Period">
                                    <option value="Janvier">Janvier</option>
                                    <option value="Février">Février</option>
                                    <option value="Mars">Mars</option>
                                    <option value="Avril">Avril</option>
                                    <option value="Mai">Mai</option>
                                    <option value="Juin">Juin</option>
                                    <option value="Juillet">Juillet</option>
                                    <option value="Août">Août</option>
                                    <option value="Septembre">Septembre</option>
                                    <option value="Octobre">Octobre</option>
                                    <option value="Novembre">Novembre</option>
                                    <option value="Décembre">Décembre</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Year</label>
                            <input type="text" class="form-control custom-form" name="year" required>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-12">
                            <label class="form-label">Content</label>
                            <div class="content" id="summernote-romkurier-create"></div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>
@elseif(Auth::user() && ($page == 4))
@if(isset($latestRecord))
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Page</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateRomKurier" method="POST" action="{{ route('page-store.update', $latestRecord->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control custom-form" name="title" value="{{ $latestRecord->title }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Author</label>
                            <input type="text" class="form-control custom-form" name="subtitle" value="{{ $latestRecord->subtitle }}">
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">Number</label>
                            <input type="text" class="form-control custom-form" name="number" value="{{ $latestRecord->number }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">PDF</label>
                            <input type="file" class="form-control custom-form" name="pdf" accept=".pdf">
                            @if($latestRecord->pdf)
                            <div class="custom-form mt-2">Current PDF: <a href="{{ asset($latestRecord->pdf) }}" target="_blank">View PDF</a></div>
                            @endif
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <div class="d-flex flex-column">
                                <label class="form-label">Select Period</label>
                                <select class="monthSelect selectpicker form-control custom-form" name="period[]" multiple title="Select Period" value="">
                                    <option value="Janvier">Janvier</option>
                                    <option value="Février">Février</option>
                                    <option value="Mars">Mars</option>
                                    <option value="Avril">Avril</option>
                                    <option value="Mai">Mai</option>
                                    <option value="Juin">Juin</option>
                                    <option value="Juillet">Juillet</option>
                                    <option value="Août">Août</option>
                                    <option value="Septembre">Septembre</option>
                                    <option value="Octobre">Octobre</option>
                                    <option value="Novembre">Novembre</option>
                                    <option value="Décembre">Décembre</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Year</label>
                            <input type="text" class="form-control custom-form" name="year" value="{{ $latestRecord->year }}">
                        </div>
                        <div class="my-3"></div>
                        <div class="col-12">
                            <label class="form-label">Content</label>
                            <div class="content" id="summernote-romkurier-edit"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Delete Element</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="deleteRomKurier">
                @csrf
                <input type="hidden" name="id" value="{{ $latestRecord->id }}">
                <div class="modal-body">
                    <p class="custom-form">Are you sure you want to delete this item?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@elseif(Auth::user() && ($page == 7))
@if(isset($archive))
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Page</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateRomKurierPast" method="POST" action="{{ route('page-store.update', $archive->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control custom-form" name="title" value="{{ $archive->title }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Author</label>
                            <input type="text" class="form-control custom-form" name="subtitle" value="{{ $archive->subtitle }}">
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">Number</label>
                            <input type="text" class="form-control custom-form" name="number" value="{{ $archive->number }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">PDF</label>
                            <input type="file" class="form-control custom-form" name="pdf" accept=".pdf">
                            @if($archive->pdf)
                            <div class="custom-form mt-2">Current PDF: <a href="{{ asset($archive->pdf) }}" target="_blank">View PDF</a></div>
                            @endif
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <div class="d-flex flex-column">
                                <label class="form-label">Select Period</label>
                                <select class="monthSelect selectpicker form-control custom-form" name="period[]" multiple title="Select Period" value="">
                                    <option value="Janvier">Janvier</option>
                                    <option value="Février">Février</option>
                                    <option value="Mars">Mars</option>
                                    <option value="Avril">Avril</option>
                                    <option value="Mai">Mai</option>
                                    <option value="Juin">Juin</option>
                                    <option value="Juillet">Juillet</option>
                                    <option value="Août">Août</option>
                                    <option value="Septembre">Septembre</option>
                                    <option value="Octobre">Octobre</option>
                                    <option value="Novembre">Novembre</option>
                                    <option value="Décembre">Décembre</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Year</label>
                            <input type="text" class="form-control custom-form" name="year" value="{{ $archive->year }}">
                        </div>
                        <div class="my-3"></div>
                        <div class="col-12">
                            <label class="form-label">Content</label>
                            <div class="content" id="summernote-romkurier-edit-past"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Delete Element</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="deleteRomKurierPast">
                @csrf
                <input type="hidden" name="id" value="{{ $archive->id }}">
                <div class="modal-body">
                    <p class="custom-form">Are you sure you want to delete this item?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endif
@endsection



@section('scripts')
@if($page == 2 || $page == 5)
<script>
    const startYear = 1989;
    const currentYear = new Date().getFullYear();
    const selectElement = document.querySelector('.archive-bulletin-page.annee');
    for (let year = currentYear; year >= startYear; year--) {
        const option = document.createElement('option');
        option.value = year;
        option.textContent = year;
        selectElement.appendChild(option);
    }
    const toutOption = document.createElement('option');
    toutOption.value = 'all';
    toutOption.textContent = 'TOUT';
    selectElement.appendChild(toutOption);
</script>
<script>
    const sectionId = "{{ $section_id }}";
</script>
<script src="{{ asset('js/filter.js') }}"></script>
@endif
<script>
    $(document).on('input change', '.commander-input[data-required="true"]', function() {
        const $field = $(this);
        if ($field.val().trim() !== '') {
            $field.removeClass('input-error-border');
            $field.closest('.input-wrapper').find('.error-icon').hide();
        }
    });

    $(document).on('submit', '#form-lebulletin', function(e) {
        e.preventDefault();

        $(".input-error-border").removeClass("input-error-border");
        let isValid = true;
        $('[data-required="true"]').each(function() {
            const $input = $(this);
            if ($input.val().trim() === '') {
                $input.addClass('input-error-border');
                const wrapper = $input.closest('.input-wrapper');
                wrapper.find('.error-icon').show();
                isValid = false;
            } else {
                $input.removeClass('input-error-border');
                const wrapper = $input.closest('.input-wrapper');
                wrapper.find('.error-icon').hide();
            }
        });

        if (!isValid) {
            return false;
        }
        var currentUrl = window.location.href;
        $('[name="source_page"]').val(currentUrl);
        var formData = new FormData(this);

        $.ajax({
            url: "{{ route('submit-form') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    toastr.success("Email sent successfully!", "Success");
                    $("#form-lebulletin")[0].reset();
                } else {
                    var errors = response.errors;
                    $.each(errors, function(field, messages) {
                        var inputField = $('[name="' + field + '"]');
                        inputField.addClass("input-error-border");
                        inputField.closest(".input-wrapper").find(".error-icon").show();
                    });
                }
            },
            error: function(xhr) {
                toastr.error("{!! trans('words.unexpected_error') !!}");
            },
        });
    });

    $(document).on("submit", "#form-romkurier", function(e) {
        e.preventDefault();

        $(".input-error-border").removeClass("input-error-border");
        let isValid = true;
        $('[data-required="true"]').each(function() {
            const $input = $(this);
            if ($input.val().trim() === '') {
                $input.addClass('input-error-border');
                const wrapper = $input.closest('.input-wrapper');
                wrapper.find('.error-icon').show();

                isValid = false;
            } else {
                $input.removeClass('input-error-border');
                const wrapper = $input.closest('.input-wrapper');
                wrapper.find('.error-icon').hide();
            }
        });
        if (!isValid) {
            return false;
        }
        var currentUrl = window.location.href;
        $('[name="source_page"]').val(currentUrl);
        var formData = new FormData(this);

        $.ajax({
            url: "{{ route('submit-form') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    toastr.success("Email send successfully!", "Success");
                    $("#form-romkurier")[0].reset();
                } else {
                    var errors = response.errors;
                   $.each(errors, function(field, messages) {
                        var inputField = $('[name="' + field + '"]');
                        inputField.addClass("input-error-border");
                        inputField.closest(".input-wrapper").find(".error-icon").show();
                    });
                }
            },
            error: function(xhr) {
                toastr.error("{!! trans('words.unexpected_error') !!}");
            },
        });
    });
</script>
@if(Auth::user() && ($page == 2))
<script>
    $('#summernote-bulletin-create').summernote({
        height: 300,
        placeholder: 'Write your content here...',
        toolbar: toolbarConfig
    });
    $('.monthSelect').selectpicker();
    $(document).on("submit", "#createBulletin", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        formData.append('content', $('#summernote-bulletin-create').summernote('code'));
        $.ajax({
            url: "{{ route('page-store.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#createModal").modal("hide");
                    $("#createBulletin")[0].reset();
                    toastr.success("{!! trans('words.message_archive_create') !!}", "{!! trans('words.message_success') !!}");
                    window.location.reload();
                } else {
                    var errors = response.errors;
                    $.each(errors, function(field, messages) {
                        var inputField = $('[name="' + field + '"]');
                        inputField.addClass("is-invalid");

                        var errorMessages = messages.join("<br>");
                        inputField.after(
                            '<div class="text-danger">' + errorMessages + "</div>"
                        );
                    });
                }
            },
            error: function(xhr) {
                toastr.error("{!! trans('words.unexpected_error') !!}");
            },
        });
    });
</script>
@elseif(Auth::user() && ($page == 1))
<script>
    $('#summernote-bulletin-edit').summernote({
        height: 300,
        placeholder: 'Write your content here...',
        toolbar: toolbarConfig
    });
    var content_page = {!! json_encode($latestRecord->content) !!};
    var selectedPeriods = {!! json_encode($latestRecord->period) !!};
    $(document).on("shown.bs.modal", "#editModal", function(e) {
        if (content_page != '') {
            $('#summernote-bulletin-edit').summernote('code', content_page);
        } else {
            $('#summernote-bulletin-edit').summernote('code', '');
        }
        if (selectedPeriods) {
            var periodsArray = selectedPeriods.split(',');
            $('.monthSelect').selectpicker('val', periodsArray);
        }
    });

    $(document).on("submit", "#updateBulletin", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        formData.append('content', $('#summernote-bulletin-edit').summernote('code'));
        $.ajax({
            url: "{{ route('page-store.update', $latestRecord->id ) }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#editModal").modal("hide");
                    $("#updateBulletin")[0].reset();
                    toastr.success("{!! trans('words.message_archive_edit') !!}", "{!! trans('words.message_success') !!}");
                    window.location.reload();
                } else {
                    var errors = response.errors;
                    $.each(errors, function(field, messages) {
                        var inputField = $('[name="' + field + '"]');
                        inputField.addClass("is-invalid");

                        var errorMessages = messages.join("<br>");
                        inputField.after(
                            '<div class="text-danger">' + errorMessages + "</div>"
                        );
                    });
                }
            },
            error: function(xhr) {
                toastr.error("{!! trans('words.unexpected_error') !!}");
            },
        });
    });

    $(document).on("submit", "#deleteBulletin", function(e) {
        e.preventDefault();
        var customRedirectUrl = "{{ route('le-bulletin-archive') }}";
        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('delete.item') }}",
            type: "POST",
            data: formData,
            success: function(response) {
                if (response.success) {
                    toastr.success("{!! trans('words.message_archive_delete') !!}", "{!! trans('words.message_success') !!}");
                    $("#deleteModal").modal("hide");
                    setTimeout(function() {
                        window.location.href = customRedirectUrl;
                    }, 1000);
                } else {
                    toastr.error("{!! trans('words.unexpected_error') !!}", "{!! trans('words.message_error') !!}");
                }
            },
            error: function(xhr, status, error) {
                toastr.error("{!! trans('words.unexpected_error') !!}");
            },
        });
    });
</script>
@elseif(Auth::user() && ($page == 8))
<script>
    $('#summernote-bulletin-edit-past').summernote({
        height: 300,
        placeholder: 'Write your content here...',
        toolbar: toolbarConfig
    });

    var content_page = {!! json_encode($archive->content) !!};
    var selectedPeriods = {!! json_encode($archive->period) !!};
    $(document).on("shown.bs.modal", "#editModal", function(e) {
        if (content_page != '') {
            $('#summernote-bulletin-edit-past').summernote('code', content_page);
        } else {
            $('#summernote-bulletin-edit-past').summernote('code', '');
        }
        if (selectedPeriods) {
            var periodsArray = selectedPeriods.split(',');
            $('.monthSelect').selectpicker('val', periodsArray);
        }
    });

    $(document).on("submit", "#updateBulletinPast", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        formData.append('content', $('#summernote-bulletin-edit-past').summernote('code'));
        var updatedNumber = $('[name="number"]').val();
        $.ajax({
            url: "{{ route('page-store.update', $archive->id ) }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#editModal").modal("hide");
                    $("#updateBulletinPast")[0].reset();
                    toastr.success("{!! trans('words.message_archive_edit') !!}", "{!! trans('words.message_success') !!}");
                    var newUrl = window.location.href.replace(/numero-\d+/, 'numero-' + updatedNumber);
                    window.location.href = newUrl;
                } else {
                    var errors = response.errors;
                    $.each(errors, function(field, messages) {
                        var inputField = $('[name="' + field + '"]');
                        inputField.addClass("is-invalid");

                        var errorMessages = messages.join("<br>");
                        inputField.after(
                            '<div class="text-danger">' + errorMessages + "</div>"
                        );
                    });
                }
            },
            error: function(xhr) {
                toastr.error("{!! trans('words.unexpected_error') !!}");
            },
        });
    });

    $(document).on("submit", "#deleteBulletinPast", function(e) {
        e.preventDefault();
        var customRedirectUrl = "{{ route('le-bulletin-archive') }}";
        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('delete.item') }}",
            type: "POST",
            data: formData,
            success: function(response) {
                if (response.success) {
                    toastr.success("{!! trans('words.message_archive_edit') !!}", "{!! trans('words.message_success') !!}");
                    $("#deleteModal").modal("hide");
                    setTimeout(function() {
                        window.location.href = customRedirectUrl;
                    }, 1000);
                } else {
                    toastr.error("{!! trans('words.unexpected_error') !!}", "{!! trans('words.message_error') !!}");
                }
            },
            error: function(xhr, status, error) {
                toastr.error("{!! trans('words.unexpected_error') !!}");
            },
        });
    });
</script>
@endif
@if(Auth::user() && ($page == 5))
<script>
    $('#summernote-romkurier-create').summernote({
        height: 300,
        placeholder: 'Write your content here...',
        toolbar: toolbarConfig
    });
    $('.monthSelect').selectpicker();
    $(document).on("submit", "#createRomKurier", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        formData.append('content', $('#summernote-romkurier-create').summernote('code'));
        $.ajax({
            url: "{{ route('page-store.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#createModal").modal("hide");
                    $("#createRomKurier")[0].reset();
                    toastr.success("{!! trans('words.message_archive_create') !!}", "{!! trans('words.message_success') !!}");
                    window.location.reload();
                } else {
                    var errors = response.errors;
                    $.each(errors, function(field, messages) {
                        var inputField = $('[name="' + field + '"]');
                        inputField.addClass("is-invalid");

                        var errorMessages = messages.join("<br>");
                        inputField.after(
                            '<div class="text-danger">' + errorMessages + "</div>"
                        );
                    });
                }
            },
            error: function(xhr) {
                toastr.error("{!! trans('words.unexpected_error') !!}");
            },
        });
    });
</script>
@elseif(Auth::user() && ($page == 4))
<script>
    $('#summernote-romkurier-edit').summernote({
        height: 300,
        placeholder: 'Write your content here...',
        toolbar: toolbarConfig
    });
    var content_page = {!! json_encode($latestRecord->content) !!};
    var selectedPeriods = {!! json_encode($latestRecord->period) !!};
    $(document).on("shown.bs.modal", "#editModal", function(e) {
        if (content_page != '') {
            $('#summernote-romkurier-edit').summernote('code', content_page);
        } else {
            $('#summernote-romkurier-edit').summernote('code', '');
        }
        if (selectedPeriods) {
            var periodsArray = selectedPeriods.split(',');
            $('.monthSelect').selectpicker('val', periodsArray);
        }
    });

    $(document).on("submit", "#updateRomKurier", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        formData.append('content', $('#summernote-romkurier-edit').summernote('code'));
        $.ajax({
            url: "{{ route('page-store.update', $latestRecord->id ) }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#editModal").modal("hide");
                    $("#updateRomKurier")[0].reset();
                    toastr.success("{!! trans('words.message_archive_edit') !!}", "{!! trans('words.message_success') !!}");
                    window.location.reload();
                } else {
                    var errors = response.errors;
                    $.each(errors, function(field, messages) {
                        var inputField = $('[name="' + field + '"]');
                        inputField.addClass("is-invalid");

                        var errorMessages = messages.join("<br>");
                        inputField.after(
                            '<div class="text-danger">' + errorMessages + "</div>"
                        );
                    });
                }
            },
            error: function(xhr) {
                toastr.error("{!! trans('words.unexpected_error') !!}");
            },
        });
    });

    $(document).on("submit", "#deleteRomKurier", function(e) {
        e.preventDefault();
        var customRedirectUrl = "{{ route('rom-kurier-archive') }}";
        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('delete.item') }}",
            type: "POST",
            data: formData,
            success: function(response) {
                if (response.success) {
                    toastr.success("{!! trans('words.message_archive_delete') !!}", "{!! trans('words.message_success') !!}");
                    $("#deleteModal").modal("hide");
                    setTimeout(function() {
                        window.location.href = customRedirectUrl;
                    }, 1000);
                } else {
                    toastr.error("{!! trans('words.unexpected_error') !!}", "{!! trans('words.message_error') !!}");
                }
            },
            error: function(xhr, status, error) {
                toastr.error("{!! trans('words.unexpected_error') !!}");
            },
        });
    });
</script>
@elseif(Auth::user() && ($page == 7))
<script>
    $('#summernote-romkurier-edit-past').summernote({
        height: 300,
        placeholder: 'Write your content here...',
        toolbar: toolbarConfig
    });

    var content_page = {!! json_encode($archive->content) !!};
    var selectedPeriods = {!! json_encode($archive->period) !!};
    $(document).on("shown.bs.modal", "#editModal", function(e) {
        if (content_page != '') {
            $('#summernote-romkurier-edit-past').summernote('code', content_page);
        } else {
            $('#summernote-romkurier-edit-past').summernote('code', '');
        }
        if (selectedPeriods) {
            var periodsArray = selectedPeriods.split(',');
            $('.monthSelect').selectpicker('val', periodsArray);
        }
    });

    $(document).on("submit", "#updateRomKurierPast", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        formData.append('content', $('#summernote-romkurier-edit-past').summernote('code'));
        var updatedNumber = $('[name="number"]').val();
        $.ajax({
            url: "{{ route('page-store.update', $archive->id ) }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#editModal").modal("hide");
                    $("#updateRomKurierPast")[0].reset();
                    toastr.success("{!! trans('words.message_archive_edit') !!}", "{!! trans('words.message_success') !!}");
                    var newUrl = window.location.href.replace(/numero-\d+/, 'numero-' + updatedNumber);
                    window.location.href = newUrl;
                } else {
                    var errors = response.errors;
                    $.each(errors, function(field, messages) {
                        var inputField = $('[name="' + field + '"]');
                        inputField.addClass("is-invalid");

                        var errorMessages = messages.join("<br>");
                        inputField.after(
                            '<div class="text-danger">' + errorMessages + "</div>"
                        );
                    });
                }
            },
            error: function(xhr) {
                toastr.error("{!! trans('words.unexpected_error') !!}");
            },
        });
    });

    $(document).on("submit", "#deleteRomKurierPast", function(e) {
        e.preventDefault();
        var customRedirectUrl = "{{ route('rom-kurier-archive') }}";
        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('delete.item') }}",
            type: "POST",
            data: formData,
            success: function(response) {
                if (response.success) {
                    toastr.success("{!! trans('words.message_archive_delete') !!}", "{!! trans('words.message_success') !!}");
                    $("#deleteModal").modal("hide");
                    setTimeout(function() {
                        window.location.href = customRedirectUrl;
                    }, 1000);
                } else {
                    toastr.error("{!! trans('words.unexpected_error') !!}", "{!! trans('words.message_error') !!}");
                }
            },
            error: function(xhr, status, error) {
                toastr.error("{!! trans('words.unexpected_error') !!}");
            },
        });
    });
</script>
@endif
@endsection