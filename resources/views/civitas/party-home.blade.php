@extends('civitas.app')

@section('top-content')
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="grey-mobile-height">
        <div class="civitas-grey-menu d-flex align-items-center justify-content-between p-3">
            <a href="{{ route('political-programs') }}" class="civitas-responsive-header-grey">POSITIONS</a>
            <a href="{{ route('civitas.party') }}" class="civitas-responsive-header-grey">MOUVEMENT</a>
            <a href="{{ route('civitas.news') }}" class="civitas-responsive-header-grey">ACTUALITÉS</a>
        </div>
    </div>
</div>
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
<div>
    <img src="{{ asset('img/civitas/party_home.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/civitas/responsive/party-responsive-home.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="d-flex justify-content-center align-items-center flex-column">
        {!! trans('words.civitas_party_title') !!}
        <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
        <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
        <div class="mb-3 mb-sm-3 mb-md-3 mb-lg-5 mb-xl-5 mb-xxl-5">
            <a href="{{ route('civitas.membership') }}" class="party-first-button d-flex justify-content-center align-items-center">POUR L'ÉGLISE ET LA SUISSE !</a>
        </div>
        {!! trans('words.civitas_first_form') !!}
    </div>
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="row">
            <div class="col-6">
                <div class="d-flex justify-content-center text-center align-items-center my-5">
                    <div class="position-relative party-img-zoom">
                        <img src="{{ asset('img/civitas/party_home1.png') }}" class="" alt="logo" />
                        <a href="{{ route('civitas.director')}}" class="party-img-overlay-absolute d-flex justify-content-end align-items-center text-decoration-none">
                            <div class="party-img-overlay me-5">LE COMITÉ DIRECTEUR</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex justify-content-center text-center align-items-center my-5">
                    <div class="position-relative party-img-zoom">
                        <img src="{{ asset('img/civitas/party_home2.png') }}" class="" alt="logo" />
                        <a href="{{ route('civitas.legacy')}}" class="party-img-overlay-sec-absolute d-flex justify-content-end align-items-center text-decoration-none">
                            <div class="party-img-overlay me-5 text-dark">L’HÉRITAGE DE CIVITAS SUISSE</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 mb-3">
            {!! trans('words.civitas_second_form') !!}
        </div>
        <div class="position-relative">
            <div class="d-flex justify-content-center align-content-center">
                <img src="{{ asset('img/civitas/party-hallebarde.png') }}" class="" alt="logo" />
            </div>
            <div class="party-cornered red-box-absolute">
                <div class="center-link ">
                    <a href="{{ route('civitas.diocesains') }}" class="party-cornered-button">GROUPES DIOCÉSAINS</a>
                </div>
            </div>
        </div>
        <div class="my-5">
            {!! trans('words.civitas_third_form') !!}
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column mt-5">
            <a href="{{ route('civitas.status') }}" class="party-grey-button d-flex justify-content-center align-items-center my-5">STATUTS ET<br>COMMUNIQUÉS DE PRESSE</a>
            <a href="{{ route('civitas.join') }}" class="party-first-button d-flex justify-content-center align-items-center my-5">DES QUESTIONS ? </a>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="my-3">
        <div class="position-relative party-img-zoom">
            <img src="{{ asset('img/civitas/responsive/party-responsive-first.png') }}" class="w-100" alt="logo" />
            <a href="{{ route('civitas.legacy')}}" class="party-img-overlay-sec-absolute d-flex justify-content-end align-items-center text-decoration-none">
                <div class="party-img-overlay me-5 text-dark">L’HÉRITAGE DE<br>CIVITAS SUISSE</div>
            </a>
        </div>
    </div>
    <div class="container d-flex justify-content-center align-items-center">
        {!! trans('words.civitas_second_form') !!}
    </div>
    <div class="position-relative">
        <div class="d-flex justify-content-between align-content-center">
            <img src="{{ asset('img/civitas/responsive/party-hallebarde.png') }}" class="" alt="logo" />
            <div class="party-cornered red-box-absolute">
                <div class="center-link">
                    <a href="{{ route('civitas.diocesains') }}" class="party-cornered-button">GROUPES DIOCÉSAINS</a>
                </div>
            </div>
        </div>

    </div>
    <div class="container d-flex justify-content-center mb-5">
        {!! trans('words.civitas_third_form') !!}
    </div>
    <div class="position-relative party-img-zoom">
        <img src="{{ asset('img/civitas/responsive/party-responsive-sec.png') }}" class="logo w-100" alt="logo" />
        <a href="{{ route('civitas.director')}}" class="party-img-overlay-absolute d-flex justify-content-end align-items-center text-decoration-none">
            <div class="party-img-overlay me-5">LE COMITÉ<br>DIRECTEUR</div>
        </a>
    </div>
    <div class="d-flex justify-content-center align-items-center flex-column">
        <a href="{{ route('civitas.status') }}" class="party-grey-button d-flex justify-content-center align-items-center mt-4 mb-5">STATUTS ET<br>COMMUNIQUÉS DE PRESSE</a>
        <a href="{{ route('civitas.join') }}" class="party-first-button d-flex justify-content-center align-items-center mb-5">DES QUESTIONS ? </a>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="position-relative party-img-zoom">
    <a href="{{ route('civitas.member') }}">
        <img src="{{ asset('img/civitas/party_home_last.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/civitas/responsive/party-responsive-last.png') }}" class="w-100 d-block d-sm-noblockne d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        <div class="party-img-overlay-last-absolute d-flex justify-content-end align-items-center text-decoration-none">
            <div class="img-overlay-party me-3 me-sm-3 me-md-3 me-lg-5 me-xl-5 me-xxl-5">VOUS ÊTES LES BIENVENUS !</div>
        </div>
    </a>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    {!! trans('words.civitas_fourth_form') !!}
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@endsection