@extends('civitas.app')

@section('top-content')
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="grey-mobile-height">
        <div class="civitas-grey-menu d-flex align-items-center justify-content-between p-3">
            <a href="{{ route('civitas.agenda') }}" class="civitas-responsive-header-grey">AGENDA</a>
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
        <div class="become-member-header mt-3">DEVENIR MEMBRE DE CIVITAS SUISSE</div>
        <div class="become-member-black-line"></div>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="position-relative">
    <img src="{{ asset('img/civitas/become-member.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/civitas/responsive/become-member-home-responsive.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    <div class="position-absolute top-50 start-50 translate-middle w-100">
        {!! trans('words.civitas_member') !!}
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center text-center">
        <div class="become-member-header">FAIRE PARTIE D’UN MOUVEMENT À LA FOIS<br>LOCAL ET INTERNATIONAL</div>
        <div class="become-member-black-line mb-3 mb-sm-3 mb-md-3 mb-lg-5 mb-xl-5 mb-xxl-5"></div>
        {!! trans('words.civitas_member_first_par') !!}
        <a href="{{ route('civitas.diocesains') }}" class="become-member-button d-flex justify-content-center align-items-center">six groupes diocésains !</a>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-3 mt-sm-3 mt-md-3 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="d-flex justify-content-center">
        <div class="position-relative">
            <img src="{{ asset('img/civitas/member-img1.png') }}" class="" alt="logo" />
            <div class="become-member-image-overlay">
                {!! trans('words.civitas_member_image_overlay') !!}
            </div>
            <div class="position-absolute bottom-0 start-50 translate-middle">
                <a href="{{ route('civitas.participer') }}" class="become-meber-first-img-content-button d-flex justify-content-center align-items-center">DEVENIR MEMBRE</a>
            </div>
        </div>
    </div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="space-300"></div>
    <div class="position-relative">
        <img src="{{ asset('img/civitas/member-last.png') }}" class="w-100" alt="logo" />
        <div class="position-absolute bottom-0 start-50 translate-middle-x mb-5 w-100 text-center">
            <img src="{{ asset('img/civitas/member-img2.png') }}" class="" alt="logo" />
            <div class="position-absolute top-50 start-50 translate-middle w-100">
                {!! trans('words.civitas_member_image_overlay-second') !!}
            </div>
            <div class="position-absolute bottom-0 start-50 translate-middle">
                <a href="{{ route('civitas.soutenir') }}" class="become-meber-sec-img-content-button d-flex justify-content-center align-items-center">FAIRE UN DON</a>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container mt-5">
        <div class="position-relative text-center">
            <img src="{{ asset('img/civitas/member-img2.png') }}" class="" alt="logo" />
            <div class="position-absolute top-50 start-50 translate-middle w-100">
                {!! trans('words.civitas_member_image_overlay-second') !!}
            </div>
            <div class="position-absolute bottom-0 start-50 translate-middle">
                <a href="{{ route('civitas.soutenir') }}" class="become-meber-sec-img-content-button d-flex justify-content-center align-items-center">FAIRE UN DON</a>
            </div>
        </div>
    </div>
</div>
@elseif($page == 1)
<div class="container">
    <div class="d-flex flex-column align-items-center text-center">
        <div class="become-member-header mt-3">VOS AVANTAGES EN TANT QUE MEMBRE</div>
        <div class="become-member-black-line"></div>
    </div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="d-flex justify-content-between mt-5">
        <div>
            <img src="{{ asset('img/civitas/advantages-bg.png') }}" class="mt-5" alt="logo" />
        </div>
        <div class="bg-dark position-relative" style="width: 80%;">
            <div class="advantages-back-bg"></div>
            <div class="advantages-black-box-star">
                <div class="d-flex">
                    <div class="image-container-star me-5">
                        <img src="{{ asset('img/civitas/advantage-star.png') }}" class="default-image" alt="star" />
                        <img src="{{ asset('img/civitas/advantage-star-hover.png') }}" class="hover-star" alt="star" />
                    </div>
                    <div class="advantages-stars-content">Abonnement à la revue Civitas 4x par an, recevez votre revue directement chez vous, dans votre boîte aux lettres.</div>
                </div>
                <div class="space-100"></div>
                <div class="d-flex">
                    <div class="image-container-star me-5">
                        <img src="{{ asset('img/civitas/advantage-star.png') }}" class="default-image" alt="star" />
                        <img src="{{ asset('img/civitas/advantage-star-hover.png') }}" class="hover-star" alt="star" />
                    </div>
                    <div class="advantages-stars-content">Accès gratuit aux conférences Sur présentation de votre carte d’adhérent, vous bénéficiez d’un accès gratuit à toutes les conférences organisées par Civitas Suisse.</div>
                </div>
                <div class="space-100"></div>
                <div class="d-flex">
                    <div class="image-container-star me-5">
                        <img src="{{ asset('img/civitas/advantage-star.png') }}" class="default-image" alt="star" />
                        <img src="{{ asset('img/civitas/advantage-star-hover.png') }}" class="hover-star" alt="star" />
                    </div>
                    <div class="advantages-stars-content">Accès au Cercle d’études Deux fois par mois, les mercredis soirs, vous bénéficiez d’un accès privilégié au Cercle d’étude en visioconférence.</div>
                </div>
            </div>

            <div class="advantages-red-cornered-position">
                <div class="advantages-red-cornered">
                    <div class="d-flex justify-content-end align-items-center white-logo-height">
                        <img src="{{ asset('img/civitas/advantages-logo-small.png') }}" class="me-5" alt="logo" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space-100"></div>
    <div class="position-relative">
        <img src="{{ asset('img/civitas/advantage-last-red.png') }}" class="w-100" alt="logo" />
        <div class="last-img-position">
            <img src="{{ asset('img/civitas/advantages-last-img.png') }}" class="w-100" alt="logo" />
            <div class="advantages-buttons-position">
                <a href="{{ route('civitas.membership') }}" class="advantages-last-button-black d-flex justify-content-center align-items-center mb-5">Oui, je deviens membre<br>de Civitas !</a>
                <a href="{{ route('civitas.membership') }}" class="advantages-last-button-white d-flex justify-content-center align-items-center m-auto">POUR LE CHRIST-ROI !</a>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container">
        <div class="d-flex mt-5">
            <div class="image-container-star me-3">
                <img src="{{ asset('img/civitas/responsive/advantage-star.png') }}" class="default-image" alt="star" />
                <img src="{{ asset('img/civitas/responsive/advantage-star-hover.png') }}" class="hover-star" alt="star" />
            </div>
            <div class="d-flex flex-column">
                <div class="advantages-stars-content-resp">Abonnement à la revue Civitas</div>
                <div class="advantages-stars-content-small-resp">4x par an, recevez votre revue directement chez vous, dans votre boîte aux lettres.</div>
            </div>
        </div>
        <div class="my-3"></div>
        <div class="d-flex">
            <div class="image-container-star me-3">
                <img src="{{ asset('img/civitas/responsive/advantage-star.png') }}" class="default-image" alt="star" />
                <img src="{{ asset('img/civitas/responsive/advantage-star-hover.png') }}" class="hover-star" alt="star" />
            </div>
            <div class="d-flex flex-column">
                <div class="advantages-stars-content-resp">Accès gratuit aux conférences</div>
                <div class="advantages-stars-content-small-resp">Sur présentation de votre carte d’adhérent, vous bénéficiez d’un accès gratuit à toutes les conférences organisées par Civitas Suisse.</div>
            </div>
        </div>
        <div class="my-3"></div>
        <div class="d-flex">
            <div class="image-container-star me-3">
                <img src="{{ asset('img/civitas/responsive/advantage-star.png') }}" class="default-image" alt="star" />
                <img src="{{ asset('img/civitas/responsive/advantage-star-hover.png') }}" class="hover-star" alt="star" />
            </div>
            <div class="d-flex flex-column">
                <div class="advantages-stars-content-resp">Accès au Cercle d’études</div>
                <div class="advantages-stars-content-small-resp">Deux fois par mois, les mercredis soirs, vous bénéficiez d’un accès privilégié au Cercle d’étude en visioconférence.</div>
            </div>
        </div>
    </div>
    <div class="position-relative mt-4">
        <img src="{{ asset('img/civitas/responsive/advantage-last-img.png') }}" class="w-100" alt="star" />
        <div class="position-absolute top-50 start-50 translate-middle w-100">
            <div class="mb-5">
                <a href="{{ route('civitas.membership') }}" class="advantages-last-button-black d-flex justify-content-center align-items-center">Oui, je deviens membre<br>de Civitas !</a>
                <div class="advantages-cornered-responsive"></div>
            </div>
        </div>
        <div class="advantages-buttons-position">
            <a href="{{ route('civitas.membership') }}" class="advantages-last-button-white d-flex justify-content-center align-items-center m-auto">POUR LE CHRIST-ROI !</a>
        </div>
    </div>
</div>
@endif
@endsection
