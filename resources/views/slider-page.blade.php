@extends('civitas.app')
@section('logo')
@if($page == 0 || $page == 3)
<div class="navbar-brand d-flex justify-content-center align-items-center flex-column">
    <a href="{{ route('civitas.home') }}">
        <img src="{{ asset('img/logo/logo_civitas.svg') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/logo/responsive/civitas-logo-responsive.svg') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </a>
</div>
@elseif($page == 1)
<div class="navbar-brand d-flex justify-content-center align-items-center flex-column">
    <a href="{{ route('civitas.home') }}" class="logo-absolute">
        <img src="{{ asset('img/logo/amissfs_logo_dark.svg') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/logo/responsive/civitas-logo-responsive.svg') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </a>
</div>
@elseif($page ==2)
<div class="navbar-brand d-flex align-items-center flex-column slider-justify-responsive">
    <a href="{{ route('civitas.home') }}" class="logo-absolute">
        <img src="{{ asset('img/logo/logo_rdp.svg') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" width="140" height="122" alt="logo" />
        <img src="{{ asset('img/logo/responsive/civitas-logo-responsive.svg') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </a>
</div>
@endif
@endsection
@section('content')
@if($page == 0)
<div>
    <img src="{{ asset('img/slider/sengager_1.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/slider/responsive/sengager_1.png') }}" width="100%" height="152" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
</div>
<div class="container custom-tweak my-3 my-lg-5">
    {!! trans('words.slider_sengager_first') !!}
</div>
<div>
    <img src="{{ asset('img/slider/sengager_2.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/slider/responsive/sengager_2.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
</div>
<div class="container custom-tweak my-5">
    {!! trans('words.slider_sengager_sec') !!}
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="d-flex justify-content-between align-items-center my-5">
        <div class="red-rounded-box d-flex">
            <div class="container custom-tweak m-auto me-0">
                {!! trans('words.sengager_red_bg') !!}
            </div>
        </div>
        <div class="slider-logo-width d-flex justify-content-center">
            <img src="{{ asset('img/slider/red-rounded-box-logo.png') }}" class="" alt="logo" />
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="sengager-red-bg-responsive d-flex justify-content-center align-items-center">
        <div class="sengager-red-bg-responsive-omnia">OMNIA INSTAURARE IN CHRISTO</div>
    </div>
    <div class="container custom-tweak my-3 my-lg-5">
        {!! trans('words.sengager_red_bg') !!}
    </div>
</div>
<div class="container custom-tweak my-3">
    {!! trans('words.slider_sengager_third') !!}
    <div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
            <iframe width="580" height="375" src="https://www.youtube.com/embed/8VU-20nfRc4?si=tjvvu7zvHTh-IhDg" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/8VU-20nfRc4?si=tjvvu7zvHTh-IhDg" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    <div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container custom-tweak mb-4">
        {!! trans('words.sengager_red_bg') !!}
    </div>
    <div class="sengager-red-bg-responsive d-flex justify-content-center align-items-center">
        <div class="sengager-red-bg-responsive-omnia">OMNIA INSTAURARE IN CHRISTO</div>
    </div>
</div>
<div class="container custom-tweak mb-3 mb-lg-5 mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0">
    {!! trans('words.slider_sengager_fourth') !!}
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="space-200"></div>
    <div class="position-relative">
        <div class="position-absolute top-0 start-50 translate-middle">
            <!-- <img src="{{ asset('img/slider/video.png') }}" class="" alt="logo" /> -->
            <video width="580" height="375" controls autoplay muted loop>
                <source src="{{ asset('videos/sengager.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
    <div class="sengager-red-bg">
        <div class="d-flex justify-content-between h-100">
            <div class="d-flex justify-content-center align-items-center flex-column sengager-bottom-left">
                <div class="sengager-red-bg-left">OMNIA</div>
                <div class="sengager-red-bg-left">INSTAURARE IN<br>CHRISTO</div>
            </div>
            <div class="d-flex justify-content-end flex-column sengager-bottom-right">
                <div class="sengager-red-bg-right-dots">...</div>
                <div class="sengager-red-bg-right">Civitas International. Parce que les<br>Catholiques sont le sel de<br>la terre.</div>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container custom-tweak">
        <div class="">
            <!-- <img src="{{ asset('img/slider/video.png') }}" class="mb-3 mb-lg-5" alt="logo" /> -->
            <video width="100%" height="100%" controls>
                <source src="{{ asset('videos/sengager.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            {!! trans('words.sengager_red_bg') !!}
        </div>
    </div>
</div>
@elseif($page == 1)
<div>
    <img src="{{ asset('img/slider/etudier_1.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/slider/responsive/etudier_1.png') }}" width="100%" height="152" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
</div>
<div class="container custom-tweak my-3 my-lg-5">
    {!! trans('words.slider_etudier_first') !!}
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="space-300"></div>
    <div class="position-relative">
        <div class="etudier-grey-background d-flex flex-column justify-content-end align-items-end">
            <div class="etudier-absolute-img">
                <img src="{{ asset('img/slider/etudier_2.png') }}" class="" alt="logo" />
            </div>
            <div class="black-rounded-box">
                <div class="black-rounded-box-width d-flex align-items-end pb-5 ms-5">
                    {!! trans('words.slider_etudier_black_bg') !!}
                </div>
            </div>
            <div class="etudier-quote-width-80">
                {!! trans('words.slider_etudier_first_quote') !!}
            </div>
            <div class="mt-5"></div>
            <div class="position-absolute top-100 start-50 translate-middle">
                <a href="{{ route('podcasts') }}" class="etudier-podcast-button d-flex justify-content-center align-items-center">ACCÉDER AUX AUDIOS</a>
            </div>
        </div>
    </div>
    <div class="space-75"></div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="position-relative">
        <div class="container custom-tweak">
            <img src="{{ asset('img/slider/responsive/etudier_2.png') }}" class="" alt="logo" />
            <div class="mt-4">
                <div class="mb-3">
                    {!! trans('words.slider_etudier_black_bg') !!}
                </div>
                <div class="mb-5">
                    {!! trans('words.slider_etudier_first_quote') !!}
                </div>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('podcasts') }}" class="etudier-podcast-button d-flex justify-content-center align-items-center">ACCÉDER AUX AUDIOS</a>
                </div>
            </div>
        </div>
        <div class="etudier-bg-logo-responsive">
            <img src="{{ asset('img/slider/responsive/etudier-bg-logo.png') }}" class="" alt="logo" />
        </div>
    </div>
</div>
<div class="container custom-tweak mb-5 mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0">
    {!! trans('words.slider_etudier_sec') !!}
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="d-flex justify-content-center my-5">
            <img src="{{ asset('img/slider/etudier_3.png') }}" class="" alt="logo" />
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <img src="{{ asset('img/slider/responsive/etudier_3.png') }}" class="" alt="logo" />
</div>
<div class="container custom-tweak my-5">
    {!! trans('words.slider_etudier_third') !!}
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="position-relative">
        <div class="d-flex justify-content-center">
            <a href="{{ route('podcasts') }}" class="etudier-podcast-button d-flex justify-content-center align-items-center">ACCÉDER AUX AUDIOS</a>
        </div>
        <div class="etudier-bg-logo-responsive-sec">
            <img src="{{ asset('img/slider/responsive/etudier-bg-logo.png') }}" class="" alt="logo" />
        </div>
    </div>
</div>
<div class="container custom-tweak my-5">
    {!! trans('words.slider_etudier_fourth') !!}
    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
        <div class="d-flex justify-content-center my-5">
            <a href="{{ route('podcasts') }}" class="etudier-podcast-button d-flex justify-content-center align-items-center">ACCÉDER AUX AUDIOS</a>
        </div>
    </div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="row">
        <div class="etudier-dark-grey-box d-flex justify-content-center align-items-center">
            <div class="col-6">
                <div class="d-flex flex-column m-auto" style="width: 597px;">
                    {!! trans('words.slider_etudier_last_paragraph_left') !!}
                </div>
            </div>
            <div class="d-flex align-items-center h-100">
                <div class="etudier-border-last"></div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column m-auto" style="width: 597px;">
                    {!! trans('words.slider_etudier_last_paragraph_right') !!}
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('civitas.study') }}" class="etudier-last-right-content-button d-flex justify-content-center align-items-center">PARTICIPER AUX MERCREDIS DE FORMATION</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container custom-tweak">
        {!! trans('words.slider_etudier_last_paragraph_left') !!}
    </div>
    <div class="etudier-black-bg-responsive my-5 p-3">
        {!! trans('words.slider_etudier_last_paragraph_right') !!}
        <div class="d-flex justify-content-center mt-3">
            <a href="{{ route('civitas.study') }}" class="etudier-last-right-content-button d-flex justify-content-center align-items-center p-2">PARTICIPER AUX MERCREDIS DE FORMATION</a>
        </div>
    </div>
</div>
@elseif($page == 2)
<div>
    <img src="{{ asset('img/slider/prier_1.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/slider/responsive/prier_1.png') }}" width="100%" height="152" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="container custom-tweak my-5">
        {!! trans('words.slider_prier_first') !!}
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="position-relative">
        <div class="container custom-tweak my-3">
            {!! trans('words.slider_prier_first') !!}
        </div>
        <div class="position-absolute top-50 end-0">
            <img src="{{ asset('img/slider/responsive/prier-bg-logo.png') }}" class="" alt="logo" />
        </div>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div>
    <img src="{{ asset('img/slider/prier_2.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/slider/responsive/prier_2.png') }}" class="m-auto d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
</div>
<div class="container custom-tweak my-5">
    {!! trans('words.slider_prier_sec') !!}
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="prier-grey-bg d-flex align-items-center justify-content-center">
        <div class="position-relative">
            <img src="{{ asset('img/slider/prier_3.png') }}" class="" alt="logo" />
            <div class="position-absolute top-50 start-50 translate-middle">
                <a href="https://www.youtube.com/@refugedespecheurs3644" class="prier-video-button d-flex justify-content-center align-items-center">ACCÉDER AUX VIDÉOS</a>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="position-relative">
        <div class="position-absolute top-100 end-0 translate-middle-y">
            <img src="{{ asset('img/slider/responsive/prier-bg-logo.png') }}" class="" alt="logo" />
        </div>
        <a href="https://www.youtube.com/@refugedespecheurs3644" class="prier-video-button m-auto d-flex justify-content-center align-items-center">ACCÉDER AUX VIDÉOS</a>
    </div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="container custom-tweak my-5">
        {!! trans('words.slider_prier_third') !!}
        <div class="space-100"></div>
        <div class="d-flex justify-content-center">
            <img src="{{ asset('img/slider/prier_4.png') }}" class="" alt="logo" />
        </div>
        <div class="space-100"></div>
        {!! trans('words.slider_prier_fourth') !!}
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container custom-tweak my-5">
        {!! trans('words.slider_prier_third') !!}
    </div>
    <img src="{{ asset('img/slider/responsive/prier_4.png') }}" class="w-100" alt="logo" />
    <div class="container custom-tweak my-5">
        {!! trans('words.slider_prier_fourth') !!}
    </div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="row">
        <div class="prier-dark-grey-box d-flex flex-row justify-content-center py-3">
            <div class="col-6">
                <div class="d-flex flex-column p-5">
                    {!! trans('words.slider_prier_box_paragraph_left') !!}
                    <div class="d-flex justify-content-end">
                        <a href="https://laportelatine.org/wp-content/uploads/2024/01/Calendrier-Retraites-2024.pdf" class="prier-red-button-grey-box d-flex justify-content-center align-items-center">AGENDA DES RETRAITES DE SAINT-IGNACE (PDF)</a>
                    </div>
                </div>
            </div>
            <div class="col-1">
                <div class="d-flex align-items-center h-100">
                    <div class="etudier-border-last"></div>
                </div>
            </div>
            <div class="col-5">
                <div class="d-flex flex-column p-4">
                    {!! trans('words.slider_prier_box_paragraph_right') !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <a href="https://www.youtube.com/@refugedespecheurs3644" class="prier-video-button m-auto d-flex justify-content-center align-items-center">ACCÉDER AUX VIDÉOS</a>
    <div class="grey-bg-responsive mt-5 p-4">
        {!! trans('words.slider_prier_box_paragraph_left') !!}
        {!! trans('words.slider_prier_box_paragraph_right') !!}
    </div>
</div>
<div class="container custom-tweak my-5">
    {!! trans('words.slider_prier_fifth') !!}
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="prier-red-bg-last d-flex flex-column p-5 pt-0">
        {!! trans('words.slider_prier_last') !!}
        <div class="d-flex justify-content-center">
            <a href="https://laportelatine.org/wp-content/uploads/2024/01/Calendrier-Retraites-2024.pdf" target="_blank" class="prier-last-button d-flex justify-content-center align-items-center">AGENDA DES RETRAITES DE SAINT-IGNACE (PDF)</a>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container custom-tweak">
        {!! trans('words.slider_prier_last') !!}
        <div class="d-flex justify-content-center mt-4 mb-3">
            <a href="https://laportelatine.org/wp-content/uploads/2024/01/Calendrier-Retraites-2024.pdf" target="_blank" class="prier-last-button p-3 d-flex justify-content-center align-items-center">AGENDA DES RETRAITES DE SAINT-IGNACE (PDF)</a>
        </div>
    </div>
</div>
@elseif($page == 3)
<div>
    <img src="{{ asset('img/slider/agir_1.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/slider/responsive/agir_1.png') }}" width="100%" height="152" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="container custom-tweak my-5">
        {!! trans('words.slider_agir_title') !!}
        {!! trans('words.slider_agir_first') !!}
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container custom-tweak mt-3">
        {!! trans('words.slider_agir_title') !!}
    </div>
    <div class="position-relative">
        <div class="container custom-tweak my-3">
            {!! trans('words.slider_agir_first') !!}
        </div>
        <div class="position-absolute top-0">
            <img src="{{ asset('img/slider/responsive/agir_bg_logo.png') }}" class="" alt="logo" />
        </div>
    </div>
</div>
<div>
    <img src="{{ asset('img/slider/agir_2.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/slider/responsive/agir_2.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
</div>
<div class="container custom-tweak my-5">
    {!! trans('words.slider_agir_sec') !!}
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="d-flex align-items-center my-5">
        <div class="red-rounded-box d-flex">
            <div class="container custom-tweak m-auto me-0">
                {!! trans('words.slider_agir_red_bg') !!}
            </div>
        </div>
        <div class="slider-logo-width d-flex justify-content-center">
            <img src="{{ asset('img/slider/red-rounded-box-logo.png') }}" class="" alt="logo" />
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="sengager-red-bg-responsive d-flex justify-content-center align-items-center">
        <div class="sengager-red-bg-responsive-omnia">OMNIA INSTAURARE IN CHRISTO</div>
    </div>
    <div class="container custom-tweak mt-3">
        {!! trans('words.slider_agir_red_bg') !!}
    </div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="space-50"></div>
    <div class="agir-title-big">Ni de gauche, ni de droite. La solution est catholique !</div>
    <div class="container custom-tweak mb-5">
        <!-- {!! trans('words.slider_agir_third') !!} -->
        <div class="space-100"></div>
        <div class="d-flex justify-content-center">
            <img src="{{ asset('img/slider/agir_3.png') }}" class="" alt="logo" />
        </div>
        <div class="space-100"></div>
        {!! trans('words.slider_agir_fourth') !!}
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container custom-tweak my-4">
        <div class="agir-title-big">Ni de gauche, ni de droite. La solution est catholique !</div>
        {!! trans('words.slider_agir_third') !!}
    </div>
    <img src="{{ asset('img/slider/responsive/agir_3.png') }}" class="w-100" alt="logo" />
    <div class="container custom-tweak my-5">
        {!! trans('words.slider_agir_fourth') !!}
    </div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="space-500"></div>
    <div class="agir-red-bg">
        <div class="position-relative">
            <div class="agir-absolute w-100">
                <img src="{{ asset('img/slider/agir_4.png') }}" class="d-flex m-auto" width="1168" height="753" alt="logo" />
            </div>
        </div>
        <div class="d-flex justify-content-end flex-column h-100">
            <div class="container custom-tweak ">
                {!! trans('words.slider_agir_fifth') !!}
            </div>
            <div class="my-3"></div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <img src="{{ asset('img/slider/responsive/agir_4.png') }}" class="w-100" alt="logo" />
    <div class="container custom-tweak mt-5">
        {!! trans('words.slider_agir_fifth') !!}
    </div>
</div>
@endif
@endsection


@section('scripts')
<script>
    $('.slider-justify-responsive').addClass('remove-justify');
</script>
@endsection
