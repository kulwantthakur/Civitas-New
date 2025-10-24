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
        <div class="civitas-title-page mt-3">OMNIA INSTAURARE IN CHRISTO</div>
    </div>
    <div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div>
        <img src="{{ asset('img/civitas/goal-support_1.png') }}" class="w-100" alt="logo" />
    </div>
    <div class="position-relative">
        <img src="{{ asset('img/civitas/goal-support_2.png') }}" class="w-100" alt="logo" />
        <div class="position-absolute bottom-0 end-0">
            <div class="position-relative">
                <img src="{{ asset('img/civitas/goal-support-red.png') }}" alt="logo" />
                <div class="goal-support-title position-absolute top-50 start-50 translate-middle text-white text-center">
                    VOS DONS<br>FONT LA<br>DIFFÉRENCE !
                </div>
            </div>
        </div>
    </div>
    <div class="space-100"></div>
    <div class="container">
        {!! trans('words.civitas_goal-support_1') !!}
        <div class="space-100"></div>
        <div class="d-flex justify-content-center align-items-center">
            <a href="{{ route('civitas.support')}}" class="d-flex align-items-center justify-content-evenly home-right-image-grey-box hover-blue">
                <img src="{{ asset('img/home/civitas_logo.svg') }}" class="" alt="Image">
                <div class="goal-support-soutenir">SOUTENIR</div>
            </a>
        </div>
        <div class="space-100"></div>
        {!! trans('words.civitas_goal-support_2') !!}
        <div class="space-100"></div>
        <div class="d-flex justify-content-center align-items-center">
            <a href="{{ route('civitas.status')}}" class="goal-support-red-button d-flex justify-content-center align-items-center">VOIR LES STATUTS DU PARTI</a>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div>
        <img src="{{ asset('img/civitas/responsive/goal_support_1.png') }}" class="w-100" alt="logo" />
    </div>
    <div class="position-relative">
        <div class="bg-dark space-300">
            <div class="goal-support-absolute goal-support-cornered">
                <div class="d-flex justify-content-center align-items-center title-height">
                    <div class="goal-support-title">VOS DONS<br>FONT LA DIFFÉRENCE !</div>
                </div>
            </div>
            <div class="position-absolute bottom-0 start-50 translate-middle">
                <a href="{{ route('civitas.support')}}" class="d-flex align-items-center justify-content-evenly home-right-image-grey-box hover-blue">
                    <img src="{{ asset('img/home/soutenir-logo-responsive.png') }}" class="" alt="Image">
                    <div class="goal-support-soutenir">SOUTENIR</div>
                </a>
            </div>
        </div>
    </div>
    <div class="container my-5">
        {!! trans('words.civitas_goal-support_1') !!}
    </div>
    <div class="goal-support-grey-bg py-4">
        <div class="container">
            {!! trans('words.civitas_goal-support_resp_1') !!}
        </div>
    </div>
    <div class="container my-3">
        {!! trans('words.civitas_goal-support_resp_2') !!}
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <a href="{{ route('civitas.status')}}" class="goal-support-red-button d-flex justify-content-center align-items-center">VOIR LES STATUTS DU PARTI</a>
    </div>
</div>
@elseif($page == 1)
<div class="d-flex justify-content-center">
    <div class="position-relative">
        <img src="{{ asset('img/civitas/support_1.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="Image">
        <img src="{{ asset('img/civitas/responsive/support_1.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="Image">
        <div class="support-title-absolute">
            <div class="support-title">La Chrétienté n’est<br>pas morte !</div>
            <div class="support-title-underline"></div>
        </div>
        <div class="support-red-box-absolute">
            <div class="support-red-box d-flex justify-content-center align-items-center p-3 ps-3 p-md-3 p-lg-5 p-xl-5 p-xxl-5">
                <div class="support-red-box-content">JE FAIS UN DON POUR LES DROITS DE LA VÉRITÉ !</div>
            </div>
        </div>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="support-grey-box">
        <div class="p-5">
            <div class="row">
                <div class="col-md-5">
                    <div class="d-flex align-items-center flex-column">
                        <div class="row mb-3">
                            <div class="col-6">
                                <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center home-right-image-box {{ session('selected_value') == 25 ? 'active-box-soutenir' : '' }}" data-value="25">CHF 25</a>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center home-right-image-box {{ session('selected_value') == 50 ? 'active-box-soutenir' : '' }}" data-value="50">CHF 50</a>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center home-right-image-box {{ session('selected_value') == 120 ? 'active-box-soutenir' : '' }}" data-value="120">CHF 120</a>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center home-right-image-box {{ session('selected_value') == 500 ? 'active-box-soutenir' : '' }}" data-value="500">CHF 500</a>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-center home-right-image-big-box {{ session('selected_value') == 'custom' ? 'active-box-soutenir' : '' }}">
                                    CHF
                                    <input type="text"
                                        name="custom_amount"
                                        id="custom-amount"
                                        class="home-right-image-big-box-italic"
                                        placeholder="MONTANT PERSONNALISÉ"
                                        value="{{ session('custom_amount') ?? '' }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <a href="{{ route('civitas.soutenir') }}" class="d-flex align-items-center justify-content-evenly home-right-image-grey-box hover-blue">
                                    <img src="{{ asset('img/home/soutenir-logo-responsive.png') }}" class="" alt="Image">
                                    <div class="home-right-image-grey-box-content">SOUTENIR</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="d-flex align-items-center h-100">
                        <div class="support-border"></div>
                    </div>
                </div>
                <div class="col-md-5 d-flex justify-content-center">
                    <div class="d-flex justify-content-center align-content-center flex-column">
                        <div>
                            {!! trans('words.civitas_support_right') !!}
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('civitas.soutenir') }}" class="support-grey-right-button d-flex justify-content-center align-items-center">FAIR UN DON</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="bg-dark">
        <div class="position-relative">
            <div class="support-title-sec-absolute">
                <div class="support-title-sec">RENFORCER<br>NOS CONVICTIONS</div>
                <div class="support-title-sec-underline"></div>
            </div>
        </div>
        <div class="space-300"></div>
        <div class="d-flex justify-content-center">
            <div class="position-relative">
                <img src="{{ asset('img/civitas/support_2.png') }}" class="" alt="Image">
                <div class="support-absolute-boxes-first">
                    <div class="support-red-box-button d-flex flex-column justify-content-center align-items-center">
                        <div class="support-boxes-title">SAUVER CE QUI<br>PEUT ENCORE L’ÊTRE</div>
                        <a href="{{ route('political-action') }}" class="support-boxes-button d-flex justify-content-center align-items-center mt-3">PLUS D’INFORMATIONS</a>
                    </div>
                </div>
                <div class="support-absolute-boxes-sec">
                    <div class="support-grey-box-button d-flex flex-column justify-content-center align-items-center">
                        <div class="support-boxes-title">PROTÉGER<br>NOTRE FOI</div>
                        <a href="{{ route('civitas.faith') }}" class="support-boxes-button d-flex justify-content-center align-items-center mt-3">SAUVER L’ESSENTIEL</a>
                    </div>
                </div>
                <div class="support-absolute-boxes-third">
                    <div class="support-red-box-button d-flex flex-column justify-content-center align-items-center">
                        <div class="support-boxes-title">À QUOI SERVENT<br>VOS DONS ?</div>
                        <a href="{{ route('civitas.goal') }}" class="support-boxes-button d-flex justify-content-center align-items-center mt-3">PLUS D’INFORMATIONS</a>
                    </div>
                </div>
                <div class="support-absolute-sec d-flex justify-content-center">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <div class="support-title-third">VOTRE SOUTIEN EST FONDAMENTAL</div>
                        <div class="support-title-third-underline"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-200"></div>
    </div>
    <div class="position-relative">
        <div class="position-absolute top-0 start-50 translate-middle">
            <div class="support-last-red-box d-flex flex-column justify-content-center align-items-center">
                <div class="support-last-red-box-title">NOTRE<br>NEWS LETTER</div>
                <a href="{{ route('civitas.newsletter')}}" class="support-last-red-box-button d-flex justify-content-center align-items-center mt-3">POUR NE RIEN MANQUER</a>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container">
        <div class="my-5">
            <div class="d-flex justify-content-between align-items-center my-3">
                <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center support-boxes" data-value="25">CHF 25</a>
                <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center support-boxes" data-value="50">CHF 50</a>
            </div>
            <div class="d-flex justify-content-between align-items-center my-3">
                <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center support-boxes" data-value="120">CHF 120</a>
                <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center support-boxes" data-value="500">CHF 500</a>
            </div>
            <div class="d-flex justify-content-center my-3">
                
                <div class="custom-amount-container d-flex align-items-center justify-content-center support-boxes-big {{ session('selected_value') == 'custom' ? 'active-box-soutenir' : '' }}">
                    CHF
                    <input type="text"
                        name="custom_amount"
                        id="custom-amount"
                        class="home-right-image-big-box-italic"
                        placeholder="MONTANT PERSONNALISÉ"
                        value="{{ session('custom_amount') ?? '' }}" />
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a href="{{ route('civitas.soutenir') }}" class="d-flex align-items-center justify-content-evenly support-white-soutenir">
                    <img src="{{ asset('img/home/soutenir-logo-responsive.png') }}" class="" alt="Image">
                    <div class="goal-support-soutenir">SOUTENIR</div>
                </a>
            </div>
        </div>
        <div>
            {!! trans('words.civitas_support_right') !!}
        </div>
        <div class="d-flex justify-content-center my-5">
            <a href="{{ route('civitas.soutenir') }}" class="support-grey-right-button d-flex justify-content-center align-items-center">FAIR UN DON</a>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column my-5">
            <div class="support-title-third">VOTRE SOUTIEN<br>EST FONDAMENTAL</div>
            <div class="support-title-third-underline mt-4"></div>
        </div>
        <div class="support-red-box-button d-flex flex-column justify-content-center align-items-center">
            <div class="support-boxes-title">À QUOI SERVENT<br>VOS DONS ?</div>
            <a href="{{ route('civitas.goal') }}" class="support-boxes-button d-flex justify-content-center align-items-center mt-3">PLUS D’INFORMATIONS</a>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column my-5">
            <div class="support-title-sec">RENFORCER<br>NOS CONVICTIONS</div>
            <div class="support-title-third-underline mt-4"></div>
        </div>
    </div>
    <div class="position-relative">
        <img src="{{ asset('img/civitas/responsive/support_2.png') }}" class="" alt="Image">
        <div class="support-absolute-position-responsive">
            <div class="support-red-box-button width-reset d-flex flex-column justify-content-center align-items-center">
                <div class="support-boxes-title">SAUVER CE QUI<br>PEUT ENCORE L’ÊTRE</div>
                <a href="{{ route('political-action') }}" class="support-boxes-button d-flex justify-content-center align-items-center mt-3">PLUS D’INFORMATIONS</a>
            </div>
        </div>
        <div class="support-absolute-position-sec-responsive">
            <div class="support-grey-box-button d-flex flex-column justify-content-center align-items-center">
                <div class="support-boxes-title">PROTÉGER<br>NOTRE FOI</div>
                <a href="{{ route('civitas.faith') }}" class="support-boxes-button d-flex justify-content-center align-items-center mt-3">SAUVER L’ESSENTIEL</a>
            </div>
            <div class="my-5"></div>
            <div class="support-last-red-box d-flex flex-column justify-content-center align-items-center">
                <div class="support-last-red-box-title">NOTRE<br>NEWS LETTER</div>
                <a href="{{ route('civitas.newsletter')}}" class="support-last-red-box-button d-flex justify-content-center align-items-center mt-3">POUR NE RIEN MANQUER</a>
            </div>
        </div>
    </div>
</div>
@endif
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@endsection