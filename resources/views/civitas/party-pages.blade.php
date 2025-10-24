@extends('civitas.app')

@section('top-content')
@if($page != 5)
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="grey-mobile-height">
        <div class="civitas-grey-menu d-flex align-items-center justify-content-between p-3">
            <a href="{{ route('political-programs') }}" class="civitas-responsive-header-grey">POSITIONS</a>
            <a href="{{ route('civitas.party') }}" class="civitas-responsive-header-grey">MOUVEMENT</a>
            <a href="{{ route('civitas.news') }}" class="civitas-responsive-header-grey">ACTUALITÉS</a>
        </div>
    </div>
</div>
@endif
@endsection

@section('logo')
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('civitas.home') }}" class="logo-absolute text-decoration-none">
        <img src="{{ asset('img/logo/logo_civitas.svg') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/logo/responsive/civitas-logo-responsive.svg') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </a>
</div>
@endsection

@section('content')
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@if($page == 0)
<div class="">
    <img src="{{ asset('img/civitas/party_director.png') }}" class="w-100 d-none d-sm-none d-md-none d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/civitas/responsive/party-responsive-right.png') }}" class="w-100 d-block d-sm-block d-md-block d-xl-none d-xxl-none" alt="logo" />
</div>
<div class="container">
    <div class="my-3 my-sm-3 my-md-3 my-lg-5 my-xl-5 my-xxl-5">
        {!! trans('words.civitas_party_heritage') !!}
    </div>
    <div class="party-heritage-width-sec">
        <div class="row g-0">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                <div class="d-flex justify-content-center align-items-center flex-column my-3">
                    <div>
                        <img src="{{ asset('img/civitas/charles.png') }}" class="" alt="logo" />
                        <div class="party-heritage-name mt-3">Charles-Louis de Haller</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                <div class="d-flex justify-content-center align-items-center flex-column my-3">
                    <div>
                        <img src="{{ asset('img/civitas/alois.png') }}" class="" alt="logo" />
                        <div class="party-heritage-name mt-3">Alois von Reding</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                <div class="d-flex justify-content-center align-items-center flex-column my-3">
                    <div>
                        <img src="{{ asset('img/civitas/joseph.png') }}" class="" alt="logo" />
                        <div class="party-heritage-name mt-3">Joseph Leu von Ebersol</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                <div class="d-flex justify-content-center align-items-center flex-column my-3">
                    <div>
                        <img src="{{ asset('img/civitas/constantin.png') }}" class="" alt="logo" />
                        <div class="party-heritage-name mt-3">Constantin Siegwart-Müller</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                <div class="d-flex justify-content-center align-items-center flex-column my-3">
                    <div>
                        <img src="{{ asset('img/civitas/schorderet.png') }}" class="" alt="logo" />
                        <div class="party-heritage-name mt-3">Le chanoine Joseph Schorderet</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                <div class="d-flex justify-content-center align-items-center flex-column my-3">
                    <div>
                        <img src="{{ asset('img/civitas/george.png') }}" class="" alt="logo" />
                        <div class="party-heritage-name mt-3">Georges Python</div>
                    </div>
                </div>
            </div>
            <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
                <div class="col-12">
                    <div class="d-flex justify-content-center align-items-center flex-column mt-5">
                        <img src="{{ asset('img/civitas/church.png') }}" class="" alt="logo" />
                        <div class="party-heritage-name mt-3"> Chapelle du Sacré-Coeur de Posieux</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="space-50"></div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="d-flex justify-content-center align-items-center flex-column party-heritage-white-box">
                <div class="party-heritage-button-title">LE VOTE CATHOLIQUE</div>
                <a href="{{ route('political-program-home') }}" class="party-heritage-button d-flex justify-content-center align-items-center mt-3">VOIR </a>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="d-flex justify-content-center align-items-center flex-column my-4">
        <img src="{{ asset('img/civitas/church.png') }}" class="" alt="logo" />
        <div class="party-heritage-name mt-3"> Chapelle du Sacré-Coeur de Posieux</div>
    </div>
    <div class="container mb-5">
        <div class="d-flex justify-content-center align-items-center">
            <div class="d-flex justify-content-center align-items-center flex-column party-heritage-white-box">
                <div class="party-heritage-button-title">LE VOTE CATHOLIQUE</div>
                <a href="{{ route('political-program-home') }}" class="party-heritage-button d-flex justify-content-center align-items-center mt-3">VOIR </a>
            </div>
        </div>
    </div>
</div>
<div>
    @include('home_page_slider')
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@elseif($page == 1)
<div class="container">
    <div class="d-flex flex-column align-items-center text-center">
        <img src="{{ asset('/img/civitas/civitas_logo_pages.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('/img/civitas/responsive/civitas_logo_pages.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        <div class="civitas-title-page mt-3">QUESTIONS ET RÉPONSES</div>
        <div class="black-line-civitas"></div>
    </div>
</div>
<div class="space-200 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="position-relative">
    <div class="d-flex justify-content-center align-items-center">
        <div class="join-title">OMNIA INSTAURARE IN CHRISTO !</div>
        <div class="position-absolute end-0 bottom-0">
            <img src="{{ asset('img/civitas/questions.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
            <img src="{{ asset('img/civitas/responsive/question-red.png') }}" class="logo d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        </div>
    </div>
</div>
<div class="space-200 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="container">
    {!! trans('words.civitas_question') !!}
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="border-bottom border-dark my-3 my-sm-3 my-md-3 my-lg-5 my-xl-5 my-xxl-5"></div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="position-relative">
    <div class="d-flex justify-content-center align-items-center">
        <div class="join-title">DES QUESTIONS ?</div>
        <div class="position-absolute end-0 bottom-0">
            <img src="{{ asset('img/civitas/questions.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        </div>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="container">
    {!! trans('words.civitas_question_sec') !!}
</div>
<div class="container">
    <div class="d-flex justify-content-center align-items-center flex-column mt-5">
        <a href="{{ route('civitas.advantages') }}" class="party-first-button d-flex justify-content-center align-items-center">DEVENIR MEMBRE</a>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
@elseif($page == 2)
<div class="container">
    <div class="d-flex flex-column align-items-center text-center">
        <img src="{{ asset('/img/civitas/civitas_logo_pages.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('/img/civitas/responsive/civitas_logo_pages.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        <div class="civitas-title-page mt-3">GROUPES DIOCÉSAINS</div>
        <div class="black-line-civitas"></div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div>
        {!! trans('words.civitas_diocesains') !!}
    </div>
    <div class="d-flex justify-content-center align-items-center my-3 my-sm-3 my-md-3 my-lg-5 my-xl-5 my-xxl-5">
        <img src="{{ asset('/img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
        <a href="javascript:void(0);" download class="pdf-download">Télécharger au format PDF</a>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="civitas-grey-line-vote d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    {!! trans('words.civitas_diocesains_sec') !!}
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
</div>
<div class="">
    <div class="position-relative">
        <div class="black-bg-map d-flex justify-content-evenly align-items-center">
            <div class="container">
                <div class="row gap-xl-0 gap-4 gap-md-5">
                    <div class="col-12 col-sm-12 col-md-12 col-xl-6 col-xl-6 col-xxl-6">
                        <div class="map-outer">
                        <div class="map-bg">
                            @include('civitas.map-svg.svg-image')
                            <!-- <div class="position-seventh">
                                <div class="image-container">
                                    <img src="{{ asset('img/civitas/map/bale-sec.svg') }}" class="default-image" alt="logo" />
                                    <img src="{{ asset('img/civitas/map/bale-sec-hover.svg') }}" class="hover-image" alt="logo" />
                                </div>
                                <div>
                                    <div class="position-lake-bale">
                                        <img src="{{ asset('img/civitas/map/lake-bale.svg') }}" class="" alt="logo" />
                                    </div>
                                </div>
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <div class="region-title">diocésan de<br>bâle</div>
                                </div>
                            </div> -->
                        </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-xl-6 col-xl-6 col-xxl-6">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="group-specific-width">
                                <div class="d-flex justify-content-center region-box-title mb-4">SÉLECTIONNER LE CANTON</div>
                                <div class="border">
                                    <form id="selected-cantons">
                                        <div class="select-canton dropdown w-100">
                                            <select name="cantons" id="cantons" class="w-100">
                                                <option disabled selected>CANTON</option>
                                                <option value="valais">VALAIS</option>
                                                <option value="fribourg">FRIBOURG</option>
                                                <option value="vaud">VAUD</option>
                                                <option value="geneve">GENÈVE</option>
                                                <option value="berne">BERNE</option>
                                                <option value="lucerne">LUCERNE</option>
                                                <option value="uri">URI</option>
                                                <option value="schwytz">SCHWYTZ</option>
                                                <option value="obwald">OBWALD</option>
                                                <option value="nidwald">NIDWALD</option>
                                                <option value="glaris">GLARIS</option>
                                                <option value="zug">ZOUG</option>
                                                <option value="soleure">SOLEURE</option>
                                                <option value="bale-ville">BALE-VILLE</option>
                                                <option value="bale-campagne">BÂLE-CAMPAGNE</option>
                                                <option value="schaffhouse">SCHAFFHOUSE</option>
                                                <option value="appenzell-r.h.-ext">APPENZELL RH.-EXT.</option>
                                                <option value="appenzell-r.h.-int">APPENZELL RH.-INT.</option>
                                                <option value="saint-gall">SAINT-GALL</option>
                                                <option value="grisons">GRISONS</option>
                                                <option value="argovie">ARGOVIE</option>
                                                <option value="thurgovie">THURGOVIE</option>
                                                <option value="tessin">TESSIN</option>
                                                <option value="neuchatel">NEUCHÂTEL</option>
                                                <option value="jura">JURA</option>
                                                <option value="zurich">ZURICH</option>
                                            </select>
                                        </div>
                                        <div class="border-top p-2">
                                            <div class="canton-title mb-4" id="canton-title">Groupe diocécan Civitas</div>
                                            <div class="canton-description mb-3" id="canton-content">
                                                Avenue de la Riviera 2<br>
                                                1820 Territet<br>
                                                021 XXX XX XX<br>
                                                <a href="mailto: ge.fr.vd@civitassuisse.ch" class="canton-description">ge.fr.vd@civitassuisse.ch</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="position-relative">
            <img src="{{ asset('img/civitas/member-img1.png') }}" class="" alt="logo" />
            <div class="become-member-image-overlay-group">
                {!! trans('words.civitas_member_image_overlay-group') !!}
            </div>
            <div class="position-absolute bottom-0 start-50 translate-middle">
                <a href="{{ route('civitas.participer') }}" class="become-meber-first-img-content-button d-flex justify-content-center align-items-center">DEVENIR MEMBRE</a>
            </div>
        </div>
    </div>
</div>
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
@elseif($page == 3)
<div class="container">
    <div class="d-flex flex-column align-items-center text-center">
        <img src="{{ asset('/img/civitas/civitas_logo_pages.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('/img/civitas/responsive/civitas_logo_pages.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        <div class="civitas-title-page mt-3">LE COMITÉ DIRECTEUR</div>
        <div class="black-line-civitas"></div>
    </div>
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="space-100"></div>
        @foreach ($directors as $director)
        <div class="position-relative">
            <div class="d-flex justify-content-center flex-column flex-md-row gap-3">
                <img src="{{ asset($director->image) }}" class="" alt="logo" />
                <div class="absolute-name-">
                    <div class="party-status-title">{!! $director->content !!}</div>
                </div>
            </div>
        </div>
        <div class="space-50"></div>
        @endforeach
    </div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="space-100"></div>
    <div class="position-relative">
        <div class="d-flex justify-content-center align-items-center">
            <a href="{{ route('civitas.status') }}" class="director-button-grey d-flex justify-content-center align-items-center">LES STATUS DU PARTI</a>
            <div class="position-absolute end-0 bottom-0">
                <img src="{{ asset('img/civitas/questions.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
            </div>
        </div>
    </div>
    <div class="space-100"></div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container">
        <div class="space-50"></div>
        @foreach ($directors as $director)
        <div class="d-flex justify-content-center gap-3">
            <img src="{{ asset($director->image) }}" class="" width="105" height="120" alt="logo" />
            <div class="party-status-title">{!! $director->content !!}</div>
        </div>
        <div class="space-50"></div>
        @endforeach
    </div>
    <div class="space-100"></div>
    <div class="position-relative">
        <div class="d-flex justify-content-center align-items-center">
            <a href="{{ route('civitas.status') }}" class="director-button-grey d-flex justify-content-center align-items-center">LES STATUS DU PARTI</a>
            <div class="position-absolute end-0 bottom-0">
                <img src="{{ asset('img/civitas/responsive/director-red.png') }}" class="" alt="logo" />
            </div>
        </div>
    </div>
</div>
@elseif($page == 4)
<div class="container">
    <div class="d-flex flex-column align-items-center text-center">
        <img src="{{ asset('/img/civitas/civitas_logo_pages.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('/img/civitas/responsive/civitas_logo_pages.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        <div class="civitas-title-page mt-3">STATUTS ET<br>COMMUNIQUÉS DE PRESSE</div>
        <div class="black-line-civitas"></div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
</div>
<div class="position-relative">
    <div class="container">
        <div class="status-page-title mb-3 ms-3 ms-sm-3 ms-md-3 ms-lg-0 ms-xl-0 ms-xxl-0">Status</div>
        <a href="{{ asset('pdf/status.pdf') }}" target="_blank">
            <div class="status-page-pdf">
                <div class="d-flex justify-content-center align-items-center mt-3 mt-lg-5 me-5">
                    <div class="status-page-pdf-title ">STATUS<br>DE CIVITAS Suisse</div>
                </div>
                <div class="space-300 d-none d-lg-block"></div>
                <div class="space-200 d-block d-lg-none"></div>
                <div class="d-flex justify-content-end align-items-center p-4 p-lg-5">
                    <img src="{{ asset('img/civitas/status_page_pdf.png') }}" alt="logo" class="">
                </div>
            </div>
        </a>
    </div>
    <div class="position-absolute end-0 bottom-0">
        <img src="{{ asset('img/civitas/questions.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    </div>
    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
        <div class="d-flex justify-content-center align-items-center mt-5 mb-3">
            <img src="{{ asset('/img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
            <a href="{{ asset('pdf/status.pdf') }}" target="_blank" class="pdf-download">Télécharger au format PDF</a>
        </div>
        <div class="status-line-red"></div>
        <div class="space-25"></div>
    </div>
</div>
<div class="space-200 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    {!! trans('words.civitas_party_status') !!}
</div>
<div class="space-50"></div>
<div class="elements-container">
    @foreach($lateststatus as $status)
    <div class="position-relative">
        <div class="container">
            <div class="status-page-content mb-3">{{ \Carbon\Carbon::parse($status->url)->locale('fr')->format('d F Y, H\hi') }}</div>
            <a href="{{ route('civitas.statuspage',['url' => \Carbon\Carbon::parse($status->url)->format('d-m-Y')]) }}" class="party-hover">
                <div class="status-page-content-blue">{{ $status->title }}</div>
            </a>
        </div>
        <div class="position-absolute end-0 bottom-0">
            <img src="{{ asset('img/civitas/questions.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        </div>
    </div>
    <div class="space-50"></div>
    @endforeach
</div>
<div class="loader" style="display: none; text-align: center;">
    <img src="{{ asset('img/loading.gif') }}" alt="Loading..." />
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@elseif($page == 5)
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('civitas.status') }}">
            <img src="{{ asset('img/party-status-back.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
            <img src="{{ asset('img/menu_back.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        </a>
        <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
            <img src="{{ asset('img/logo_civitas_party.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    {!! trans('words.civitas_party_status') !!}
    <div class="status-page-content my-4"></div>
    <div class="status-page-content-blue">{{ $status->title }}</div>
    <div class="space-50"></div>
    <div>
        <div class="party-status-content-page mb-0">{!! $status->content !!}</div>
    </div>
    <div class="space-50"></div>
    <div class="d-flex justify-content-start align-items-center">
        <img src="{{ asset('/img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
        <a href="{{ asset($status->pdf) }}" target="_blank" class="pdf-download">Télécharger au format PDF</a>
    </div>
    <div class="space-50"></div>
    <div>
        {!! trans('words.civitas_party_status_contant') !!}
    </div>
</div>
<div class="space-100 d-none d-lg-block"></div>
<div class="space-50 d-block d-lg-none"></div>
@elseif($page == 6)
<div class="container">
    <div class="d-flex flex-column align-items-center text-center">
        <img src="{{ asset('/img/civitas/civitas_logo_pages.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('/img/civitas/responsive/civitas_logo_pages.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        <div class="civitas-title-page mt-3">LA VIE DU PARTI</div>
        <div class="black-line-civitas"></div>
    </div>
    <div class="space-100"></div>
    <div class="d-flex justify-content-center align-items-center contruction-title">EN CONSTRUCTION</div>
    <div class="space-100"></div>
</div>
@endif

@if(Auth::user() && ($page == 2))
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Page</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateDiocesan" method="POST" action="{{ route('page-store.update',1) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="">
                <input type="hidden" name="category" value="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label">Choose Diocesan</label>
                            <select id="contentSelectDiocesan" class="form-control custom-form" name="title">
                                <option value="">Select Diocesan</option>
                                @foreach($diocesan as $item)
                                <option
                                    value="{{ $item->title }}"
                                    data-id="{{ $item->id }}"
                                    data-category="{{ $item->category }}"
                                    data-title="{{ $item->title }}"
                                    data-content="{{ $item->content }}">
                                    {{ $item->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-none toggle-content">
                        <div class="row">
                            <div class="my-3"></div>
                            <div class="col-md-12">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control custom-form" name="title" value="">
                            </div>
                            <div class="my-3"></div>
                            <div class="col-md-12">
                                <label class="form-label">Diocesan Informations</label>
                                <div id="summernote-diocesan-edit" class="content"></div>
                            </div>
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
@elseif(Auth::user() && ($page == 3))
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Create New Element</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createPerson" method="POST" action="{{ route('page-store.store') }}" enctype="multipart/form-data" files="true">
                @csrf
                <input type="hidden" name="section_id" value="{{$section_id ?? ''}}">
                <input type="hidden" name="number_validation" value="3">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label">Title*</label>
                            <input type="text" class="form-control custom-form" name="title" required>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-12">
                            <label class="form-label">Personal Informations</label>
                            <div id="summernote-person" class="content"></div>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-12">
                            <label class="form-label">
                                Image*
                                <i class="fa-solid fa-info-circle ms-1"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="right"
                                    title="Upload an image with a maximum width of 230px and a maximum height of 250px. Accepted formats: PNG, JPEG, JPG."></i>
                            </label>
                            <input type="file" class="form-control custom-form" name="image" accept=".png, .jpeg, .jpg" required>
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

@if(isset($directors))
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Page</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updatePerson" method="POST" action="{{ route('page-store.update',1) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="number_validation" value="3">
                <input type="hidden" name="id" value="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label">Choose Person</label>
                            <select id="contentSelect" class="form-control custom-form" name="title">
                                <option value="">Select Person</option>
                                @foreach($directors as $director)
                                <option
                                    value="{{ $director->title }}"
                                    data-id="{{ $director->id }}"
                                    data-content="{{ $director->content }}"
                                    data-image="{{ asset($director->image) }}">
                                    {{ $director->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-none toggle-content">
                        <div class="row">
                            <div class="my-3"></div>
                            <div class="col-md-12">
                                <label class="form-label">Personal Information</label>
                                <div class="content" id="summernote-person-edit"></div>
                            </div>
                            <div class="my-3"></div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Current Image</label>
                                <div class="d-flex align-items-center">
                                    <img src="" alt="Current Image" id="currentImage" class="img-thumbnail">
                                </div>
                            </div>
                            <div class="my-3"></div>
                            <div class="col-md-6">
                                <label class="form-label">
                                    Upload New Image
                                    <i class="fa-solid fa-info-circle ms-1"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Upload an image with a maximum width of 230px and a maximum height of 250px. Accepted formats: PNG, JPEG, JPG."></i>
                                </label>
                                <input type="file" class="form-control custom-form" name="image" accept=".png, .jpeg, .jpg">
                            </div>
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
            <form id="deletePerson">
                @csrf
                <input type="hidden" name="id" id="personId" value="">
                <div class="modal-body">
                    <label for="personSelect" class="form-label">Select Person to Delete</label>
                    <select class="form-select custom-form" id="personSelect" required>
                        <option value="">Select a person</option>
                        @foreach($directors as $person)
                        <option value="{{ $person->id }}">{{ $person->title }}</option>
                        @endforeach
                    </select>
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

@if(Auth::user() && ($page == 4))
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Create New Element</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createStatus" method="POST" action="{{ route('page-store.store') }}" enctype="multipart/form-data" files="true">
                @csrf
                <input type="hidden" name="section_id" value="{{$section_id ?? ''}}">
                <input type="hidden" name="number_validation" value="3">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label">Title*</label>
                            <input type="text" class="form-control custom-form" name="title" required>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">Created At*</label>
                            <input type="text" class="form-control custom-form" name="url" placeholder="YYYY-MM-DD HH:MM" id="flatpickr-datetime-create" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">PDF*</label>
                            <input type="file" class="form-control custom-form" name="pdf" accept=".pdf" required>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-12">
                            <label class="form-label">Content*</label>
                            <div id="summernote-status" class="content"></div>
                        </div>
                        <div class="my-3"></div>
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

@elseif(Auth::user() && ($page == 5))
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Page</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateStatus" method="POST" action="{{ route('page-store.update', $status->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="number_validation" value="3">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control custom-form" name="title" value="{{ $status->title }}">
                        </div>
                        <div class="my-3"></div>
                        <div class="col-6">
                            <label class="form-label">Created At</label>
                            <input type="text" class="form-control custom-form" name="url" value="{{ $status->url }}" id="flatpickr-datetime-edit">
                        </div>
                        <div class="col-6">
                            <label class="form-label">PDF</label>
                            <input type="file" class="form-control custom-form" name="pdf" accept=".pdf">
                            <div class="custom-form mt-2">Current PDF: <a href="{{ asset($status->pdf) }}" target="_blank">View PDF</a></div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Content</label>
                            <div class="content" id="summernote-status-edit"></div>
                        </div>
                        <div class="my-3"></div>

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
            <form id="deleteStatus">
                @csrf
                <input type="hidden" name="id" value="{{ $status->id }}">
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

@endsection

@section('scripts')
@if(isset($has_more))
<script>
    let hasMore = {
        !!json_encode($has_more) !!
    };
    const sectionId = "{{ $section_id }}";
    const category = "{{ $category ?? '' }}";
</script>
<script src="{{ asset('js/main.js') }}"></script>
@endif
<script>
    $('#cantons').on('change', function() {
        const selectedCanton = $(this).val();
        $('.image-container').removeClass('active');
        $('.image-container').each(function() {
            const cantonData = $(this).data('canton');
            if (typeof cantonData === 'string') {
                const cantons = cantonData.split(' ');
                if (cantons.includes(selectedCanton)) {
                    $(this).addClass('active');
                }
            }
        });
    });
    $('.group-specific-width').on('mouseleave', function() {
        $('.image-container').removeClass('active');
    });
</script>
<script>
    $('#cantons').on('change', function() {
        var canton = $(this).val();
        if (canton) {
            $('#loading-indicator').show();

            $.ajax({
                url: "{{ route('getCantonResults') }}",
                type: 'GET',
                data: {
                    canton: canton,
                },
                success: function(response) {
                    $('#loading-indicator').hide();
                    if (response.success) {
                        $('#canton-title').html(response.data.title);
                        $('#canton-content').html(response.data.content);
                    } else {
                        $('#canton-title').html("{!! trans('words.message_error') !!}");
                        $('#canton-content').html("{!! trans('words.unexpected_error') !!}");
                    }
                },
                error: function(xhr, status, error) {
                    $('#loading-indicator').hide();
                    $('#canton-title').html("{!! trans('words.message_error') !!}");
                    $('#canton-content').html("{!! trans('words.unexpected_error') !!}");
                },
            });
        }
    });
</script>
@if(Auth::user() && ($page == 2))
<script>
    $('#contentSelectDiocesan').on('change', function() {
        var selectedOption = $(this).find('option:selected');
        var page_id = selectedOption.data('id');
        var category = selectedOption.data('category');
        var title = selectedOption.data('title');
        var content = selectedOption.data('content');

        $('input[name="id"]').val(page_id);
        $('input[name="title"]').val(title);
        $('input[name="category"]').val(category);

        $('#summernote-diocesan-edit').summernote({
            height: 300,
            placeholder: 'Write your content here...',
            toolbar: toolbarConfig
        });

        if (content != '') {
            $('#summernote-diocesan-edit').summernote('code', content);
        } else {
            $('#summernote-diocesan-edit').summernote('code', '');
        }

        if (this.value) {
            $('.toggle-content').removeClass('d-none');
        } else {
            $('.toggle-content').addClass('d-none');
        }
    });

    $(document).on("submit", "#updateDiocesan", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        formData.append('content', $('#summernote-diocesan-edit').summernote('code'));
        $.ajax({
            url: "{{ route('page-store.update', 1) }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#editModal").modal("hide");
                    $("#updateDiocesan")[0].reset();
                    toastr.success("{!! trans('words.message_successful_edit') !!}", "{!! trans('words.message_success') !!}");
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
@elseif(Auth::user() && ($page == 3))
<script>
    $('#summernote-person').summernote({
        height: 300,
        placeholder: 'Write your content here...',
        toolbar: toolbarConfig
    });

    $(document).on("submit", "#createPerson", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        formData.append('content', $('#summernote-person').summernote('code'));
        $.ajax({
            url: "{{ route('page-store.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#createModal").modal("hide");
                    $("#createPerson")[0].reset();
                    toastr.success("{!! trans('words.message_successful_create') !!}", "{!! trans('words.message_success') !!}");
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
@if(isset($director))
<script>
    $('#contentSelect').on('change', function() {
        var selectedOption = $('option:selected', this);
        var page_id = selectedOption.data('id');
        var content = selectedOption.data('content');
        var image = selectedOption.data('image');
        var content_page = {
            !!json_encode($director - > content) !!
        };

        $('input[name="id"]').val(page_id);

        $('#summernote-person-edit').summernote({
            height: 300,
            placeholder: 'Write your content here...',
            toolbar: toolbarConfig
        });

        if (content_page != '') {
            $('#summernote-person-edit').summernote('code', content_page);
        } else {
            $('#summernote-person-edit').summernote('code', '');
        }

        if (image) {
            $('#currentImage').attr('src', image);
        } else {
            $('#currentImage').removeAttr('src');
        }

        if (this.value) {
            $('.toggle-content').removeClass('d-none');
        } else {
            $('.toggle-content').addClass('d-none');
        }
    });

    $(document).on("submit", "#updatePerson", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        formData.append('content', $('#summernote-person-edit').summernote('code'));
        $.ajax({
            url: "{{ route('page-store.update', 1) }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#editModal").modal("hide");
                    $("#updatePerson")[0].reset();
                    toastr.success("{!! trans('words.message_successful_edit') !!}", "{!! trans('words.message_success') !!}");
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

    $('#personSelect').on('change', function() {
        var selectedPersonId = $(this).val();
        $('#personId').val(selectedPersonId);
    });

    $(document).on("submit", "#deletePerson", function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var personId = $('#personId').val();

        if (personId) {
            $.ajax({
                url: "{{ route('delete.item') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    if (response.success) {
                        toastr.success("{!! trans('words.message_successful_delete') !!}", "{!! trans('words.message_success') !!}");
                        $("#deleteModal").modal("hide");
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    } else {
                        toastr.error(response.message, "Error");
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error("{!! trans('words.unexpected_error') !!}", "{!! trans('words.message_error') !!}");
                },
            });
        } else {
            toastr.warning("{!! trans('words.warning_person') !!}", "{!! trans('words.message_warning') !!}");
        }
    });
</script>
@endif
@elseif(Auth::user() && ($page == 4))
<script>
    var flatpickrCreate = document.querySelector('#flatpickr-datetime-create');
    if (flatpickrCreate) {
        flatpickr(flatpickrCreate, {
            enableTime: true,
            dateFormat: 'Y-m-d H:i'
        });
    }

    $('#summernote-status').summernote({
        height: 300,
        placeholder: 'Write your content here...',
        toolbar: toolbarConfig
    });

    $(document).on("submit", "#createStatus", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        formData.append('content', $('#summernote-status').summernote('code'));
        $.ajax({
            url: "{{ route('page-store.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#createModal").modal("hide");
                    $("#createStatus")[0].reset();
                    toastr.success("{!! trans('words.message_successful_create') !!}", "{!! trans('words.message_success') !!}");
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
@elseif(Auth::user() && ($page == 5))
<script>
    var flatpickrEdit = document.querySelector('#flatpickr-datetime-edit');
    if (flatpickrEdit) {
        flatpickr(flatpickrEdit, {
            enableTime: true,
            dateFormat: 'Y-m-d H:i'
        });
    }
    $('#summernote-status-edit').summernote({
        height: 300,
        placeholder: 'Write your content here...',
        toolbar: toolbarConfig
    });
    var content_page = {
        !!json_encode($status - > content) !!
    };
    $(document).on("shown.bs.modal", "#editModal", function(e) {
        if (content_page != '') {
            $('#summernote-status-edit').summernote('code', content_page);
        } else {
            $('#summernote-status-edit').summernote('code', '');
        }
    });
    $(document).on("submit", "#updateStatus", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        formData.append('content', $('#summernote-status-edit').summernote('code'));
        $.ajax({
            url: "{{ route('page-store.update', $status->id) }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#editModal").modal("hide");
                    $("#updateStatus")[0].reset();
                    toastr.success("{!! trans('words.message_successful_edit') !!}", "{!! trans('words.message_success') !!}");
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
    $(document).on("submit", "#deleteStatus", function(e) {
        e.preventDefault();
        var customRedirectUrl = "{{ route('civitas.status') }}";
        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('delete.item') }}",
            type: "POST",
            data: formData,
            success: function(response) {
                if (response.success) {
                    toastr.success("{!! trans('words.message_successful_delete') !!}", "{!! trans('words.message_success') !!}");
                    $("#deleteModal").modal("hide");
                    setTimeout(function() {
                        window.location.href = customRedirectUrl;
                    }, 500);
                } else {
                    toastr.error(response.message, "Error");
                }
            },
            error: function(xhr, status, error) {
                toastr.error("{!! trans('words.unexpected_error') !!}");
            },
        });
    });
</script>
@endif

@if($page == 5)
<script>
    if (window.innerWidth <= 768) {
        $('.parent-body').addClass('d-none');
    }
</script>
@endif


<script>
// Select all paths inside your SVG
const paths = document.querySelectorAll('svg path');

paths.forEach(path => {
  path.addEventListener('mouseenter', () => {
    // Agar path ke paas class hai
    if(path.classList.length > 0){
      // Body me wahi class add karo
      document.body.classList.add(...path.classList);
    }
  });

  path.addEventListener('mouseleave', () => {
    // Agar path ke paas class hai
    if(path.classList.length > 0){
      // Body se class remove karo
      document.body.classList.remove(...path.classList);
    }
  });
});
</script>
@endsection