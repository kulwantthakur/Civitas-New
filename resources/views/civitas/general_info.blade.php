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
@if($page == 0)
<div class="container">
    <div class="d-flex flex-column align-items-center text-center">
        <img src="{{ asset('img/civitas/logo-civitas.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/civitas/responsive/civitas_logo_pages.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        <div class="civitas-title-page mt-3">ÉTUDE</div>
        <div class="black-line-civitas"></div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="d-flex justify-content-center flex-column">
        <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
            <a href="{{ route('civitas.faith') }}" class="info-title-pages">
                <img src="{{ asset('img/civitas/general-info-next.png') }}" class=" me-4" alt="logo" />DÉFENSE DE LA FOI
            </a>
            <div class="my-lg-5"></div>
            <a href="{{ route('political-action') }}" class="info-title-pages">
                <img src="{{ asset('img/civitas/general-info-next.png') }}" class="me-4" alt="logo" />ACTION POLITIQUE
            </a>
        </div>
        <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none ">
            <a href="{{ route('civitas.faith') }}" class="info-title-pages">
                <img src="{{ asset('img/civitas/responsive/general-info-next.png') }}" class="me-4" alt="logo" />DÉFENSE DE LA FOI
            </a>
            <div class="my-3"></div>
            <a href="{{ route('political-action') }}" class="info-title-pages">
                <img src="{{ asset('img/civitas/responsive/general-info-next.png') }}" class="me-4" alt="logo" />ACTION POLITIQUE
            </a>
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div>
        {!! trans('words.civitas_etude') !!}
    </div>
    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none ">
        <div class="d-flex justify-content-center align-items-center ms-4">
            <img src="{{ asset('img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
            <a href="javascript:void(0);" download class="pdf-download">Télécharger au format PDF</a>
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
</div>
<div class="etude-grey-bg p-0 p-sm-0 p-md-0 p-lg-5 p-xl-5 p-xxl-5">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 col-xxl-5">
            <div class="d-flex justify-content-center align-items-center flex-column px-0 px-sm-0 px-md-0 px-lg-5 px-xl-5 px-xxl-5">
                <div class="p-4">
                    {!! trans('words.civitas_etude_left') !!}
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
                        <a href="javascript:void(0);" download class="pdf-download">Télécharger au format PDF</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="d-flex align-items-center h-100">
                <div class="general-info-border"></div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 col-xxl-5">
            <div class="d-flex justify-content-center align-items-center flex-column px-0 px-sm-0 px-md-0 px-lg-5 px-xl-5 px-xxl-5">
                <div class="p-4">
                    {!! trans('words.civitas_etude_right') !!}
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
                        <a href="javascript:void(0);" download class="pdf-download">Télécharger au format PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif($page == 1)
<div class="container">
    <div class="d-flex flex-column align-items-center text-center">
        <img src="{{ asset('img/civitas/logo-civitas.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/civitas/responsive/civitas_logo_pages.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        <div class="civitas-title-page mt-3">ACTION POLITIQUE</div>
        <div class="black-line-civitas"></div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="d-flex justify-content-center flex-column">
        <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
            <a href="{{ route('civitas.faith') }}" class="info-title-pages">
                <img src="{{ asset('img/civitas/general-info-next.png') }}" class=" me-4" alt="logo" />DÉFENSE DE LA FOI
            </a>
            <div class="my-lg-5"></div>
            <a href="{{ route('civitas.study') }}" class="info-title-pages">
                <img src="{{ asset('img/civitas/general-info-next.png') }}" class="me-4" alt="logo" />ÉTUDE
            </a>
        </div>
        <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none ">
            <a href="{{ route('civitas.faith') }}" class="info-title-pages">
                <img src="{{ asset('img/civitas/responsive/general-info-next.png') }}" class="me-4" alt="logo" />DÉFENSE DE LA FOI
            </a>
            <div class="my-3"></div>
            <a href="{{ route('civitas.study') }}" class="info-title-pages">
                <img src="{{ asset('img/civitas/responsive/general-info-next.png') }}" class="me-4" alt="logo" />ÉTUDE
            </a>
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div>
        {!! trans('words.civitas_action_politique') !!}
        <div class="d-flex justify-content-center align-items-center mt-3 mt-sm-3 mt-md-3 mt-lg-5 mt-xl-5 mt-xxl-5">
            <img src="{{ asset('img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
            <a href="javascript:void(0);" download class="pdf-download">Télécharger au format PDF</a>
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="civitas-grey-line-vote d-none d-sm-none d-md-none d-xl-block d-xxl-block"></div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div>
        {!! trans('words.civitas_action_politique_sec') !!}
        <div class="d-flex justify-content-center align-items-center mt-3 mt-sm-3 mt-md-3 mt-lg-5 mt-xl-5 mt-xxl-5">
            <img src="{{ asset('img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
            <a href="javascript:void(0);" download class="pdf-download">Télécharger au format PDF</a>
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
</div>
<div class="bg-dark">
    <div class="p-4 p-sm-4 p-md-4 p-lg-5 p-xl-5 p-xxl-5">
        {!! trans('words.civitas_action_politique_black_title') !!}
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 col-xxl-5">
                <div class="d-flex flex-column p-0 p-sm-0 p-md-0 p-lg-5 p-xl-5 p-xxl-5">
                    {!! trans('words.civitas_action_politique_black_left') !!}
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
                        <a href="javascript:void(0);" download class="pdf-download text-white">Télécharger au format PDF</a>
                    </div>
                    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
                    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
                    {!! trans('words.civitas_action_politique_black_left_sec') !!}
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
                        <a href="javascript:void(0);" download class="pdf-download text-white">Télécharger au format PDF</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-2">
                <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
                    <div class="d-flex align-items-center h-100">
                        <div class="action-politique-white-border"></div>
                    </div>
                </div>
                <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
                    <div class="my-5"></div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 col-xxl-5">
                <div class="d-flex flex-column p-0 p-sm-0 p-md-0 p-lg-5 p-xl-5 p-xxl-5">
                    {!! trans('words.civitas_action_politique_black_right') !!}
                    <div class="d-flex justify-content-center align-items-center ">
                        <img src="{{ asset('img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
                        <a href="javascript:void(0);" download class="pdf-download text-white">Télécharger au format PDF</a>
                    </div>
                    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
                    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
                    {!! trans('words.civitas_action_politique_black_right_sec') !!}
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
                        <a href="javascript:void(0);" download class="pdf-download text-white">Télécharger au format PDF</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    </div>
    <div class="space-50"></div>
</div>
@elseif($page == 2)
<div class="container">
    <div class="d-flex flex-column align-items-center text-center">
        <img src="{{ asset('img/civitas/logo-civitas.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/civitas/responsive/civitas_logo_pages.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        <div class="civitas-title-page mt-3">DÉFENSE DE LA FOI</div>
        <div class="black-line-civitas"></div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="d-flex justify-content-center flex-column">
        <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
            <a href="{{ route('civitas.study') }}" class="info-title-pages">
                <img src="{{ asset('img/civitas/general-info-next.png') }}" class="me-4" alt="logo" />ÉTUDE
            </a>
            <div class="my-5"></div>
            <a href="{{ route('political-action') }}" class="info-title-pages">
                <img src="{{ asset('img/civitas/general-info-next.png') }}" class="me-4" alt="logo" />ACTION POLITIQUE
            </a>
        </div>
        <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none ">
            <a href="{{ route('civitas.study') }}" class="info-title-pages">
                <img src="{{ asset('img/civitas/responsive/general-info-next.png') }}" class="me-4" alt="logo" />ÉTUDE
            </a>
            <div class="my-3"></div>
            <a href="{{ route('political-action') }}" class="info-title-pages">
                <img src="{{ asset('img/civitas/responsive/general-info-next.png') }}" class="me-4" alt="logo" />ACTION POLITIQUE
            </a>
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div>
        {!! trans('words.civitas_faith') !!}
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-3 mt-sm-3 mt-md-3 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="d-flex justify-content-center align-items-center ms-4">
        <img src="{{ asset('img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
        <a href="javascript:void(0);" download class="pdf-download">Télécharger au format PDF</a>
    </div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
</div>
@endif
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div>
    @include('home_page_last_section')
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@endsection