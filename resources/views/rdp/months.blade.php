@extends('rdp.app')


@section('logo')
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('rdp.home') }}" class="absolute-logo-rdp">
        <img src="{{ asset('img/logo/logo_rdp.svg') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/logo/responsive/logo_rdp.svg') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </a>
</div>
@endsection


@section('content')
@if($page == 0)
<div class="position-relative">
    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
        <div class="p-3 blue-box-months">
            <div class="d-flex justify-content-start">
                <a href="{{ route('notredame') }}"><img src="{{ asset('img/rdp/responsive/back_button.png') }}" alt="logo" /></a>
            </div>
            <div class="blue-box-title d-flex align-items-center justify-content-center">Les Apparitions de l’Ange</div>
        </div>
    </div>
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="blue-box-months d-flex align-items-center justify-content-between">
            <a href="{{ route('notredame') }}" class="ms-4"><img src="{{ asset('img/rdp/back-button-rdp.png') }}" class="" alt="logo" /></a>
            <div class="d-flex align-items-center justify-content-center me-5">
                <div class="blue-box-title">Les<br>Apparitions de <br>l’Ange</div>
            </div>
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="m-auto d-flex justify-content-center">
        {!! trans('words.rdp_angel_title') !!}
    </div>
    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
        <div class="my-3 d-flex justify-content-center">
            <img src="{{ asset('img/rdp/responsive/angel_page.png') }}" class="logo z-1" alt="logo" />
        </div>
    </div>
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="d-flex justify-content-center mt-5">
            {!! trans('words.rdp_angel') !!}
        </div>
    </div>
    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
        <div class="container mt-5">
            {!! trans('words.rdp_angel') !!}
        </div>
    </div>
    <div class="position-absolute month-absolute-end">
        <img src="{{ asset('img/rdp/rdp-months-virgin-mary.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block " alt="logo" />
        <img src="{{ asset('img/rdp/responsive/month-virgin-mary.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="space-50"></div>
    <div class="d-flex justify-content-center">
        <img src="{{ asset('img/rdp/angel_page.png') }}" class="" alt="logo" />
    </div>
    <div class="space-50"></div>
</div>
@elseif($page == 1)
<!--------------------------MAY------------------------------------------>
<div class="position-relative">
    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
        <div class="p-3 blue-box-months">
            <div class="d-flex justify-content-start">
                <a href="{{ route('notredame') }}"><img src="{{ asset('img/rdp/responsive/back_button.png') }}" alt="logo" /></a>
            </div>
            <div class="blue-box-title d-flex align-items-center justify-content-center">Les 13 mai 1917</div>
        </div>
    </div>
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="blue-box-months d-flex align-items-center justify-content-between">
            <a href="{{ route('notredame') }}" class="ms-4"><img src="{{ asset('img/rdp/back-button-rdp.png') }}" class="" alt="logo" /></a>
            <div class="d-flex align-items-center justify-content-center me-5">
                <div class="blue-box-title">Les 13 mai<br>1917</div>
            </div>
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="m-auto d-flex justify-content-center">
        {!! trans('words.may_title') !!}
    </div>
    <div class="container mt-5">
        {!! trans('words.may_contet') !!}
    </div>
    <div class="position-absolute month-absolute-end">
        <img src="{{ asset('img/rdp/rdp-months-virgin-mary.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/rdp/responsive/month-virgin-mary.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="container custom-tweak">
        <div class="black-bg-gradient-rounded">
            <div class="p-5 d-flex justify-content-center align-items-center may-title-gradient">Événement historique</div>
            <div class="d-flex justify-content-center">
                <div class="position-relative">
                    <img src="{{ asset('img/rdp/may_1.png') }}" class="logo" alt="logo" />
                    <div class="white-bg-rounded-left">
                        <div class="p-3 d-flex justify-content-center align-items-center">
                            {!! trans('words.rdp_may_first') !!}
                        </div>
                    </div>
                    <div class="white-bg-rounded-right">
                        <div class="p-4 d-flex justify-content-center align-items-center">
                            {!! trans('words.rdp_may_second') !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center may-small-under-img">
                L’armée du Portugal au front en 1917
            </div>
            <div class="space-400"></div>
            <div class="position-relative">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('img/rdp/may_2.png') }}" class="logo" alt="logo" />
                </div>
                <div class="white-bg-rounded-center-big">
                    <div class="p-4 mt-4 d-flex justify-content-end align-items-center">
                        {!! trans('words.rdp_may_third') !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="space-75"></div>
        <div class="position-relative">
            <div class="position-absolute top-100 start-50 translate-middle">
                <img src="{{ asset('img/rdp/may_3.png') }}" class="logo" alt="logo" />
            </div>
            <div class="white-bg-rounded-center-last">
                <div class="p-4 d-flex justify-content-center align-items-center">
                    {!! trans('words.rdp_may_last') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="space-600"></div>
    <div class="space-50"></div>
</div>

<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="may-blue-bg-responsive">
        <div class="position-relative">
            <div class="p-5 d-flex justify-content-center align-items-center may-title-gradient">Événement historique</div>
            <div class="white-bg-rounded-left">
                <div class="d-flex justify-content-center align-items-center py-4 py-lg-0">
                    {!! trans('words.rdp_may_first') !!}
                </div>
            </div>
            <div class="space-300"></div>
            <div class="space-75"></div>
            <img src="{{ asset('img/rdp/responsive/may_1.png') }}" class="w-100" alt="logo" />
            <div class="d-flex justify-content-center align-items-center may-small-under-img">L’armée du Portugal au front en 1917</div>
        </div>
        <div class="my-5">
            <div class="white-bg-rounded-right">
                <div class="p-3 d-flex justify-content-center align-items-center">
                    {!! trans('words.rdp_may_second') !!}
                </div>
            </div>
        </div>
        <div class="position-relative">
            <img src="{{ asset('img/rdp/responsive/may_2.png') }}" class="logo" alt="logo" />
            <div class="white-bg-rounded-center-big">
                <div class="p-2">
                    {!! trans('words.rdp_may_third') !!}
                </div>
            </div>
        </div>
        <div class="space-400"></div>
        <div class="position-relative">
            <img src="{{ asset('img/rdp/responsive/may_3.png') }}" class="logo" alt="logo" />
            <div class="white-bg-rounded-center-last">
                <div class="px-3 py-2">
                    {!! trans('words.rdp_may_last') !!}
                </div>
            </div>
        </div>
        <div class="text-white d-flex justify-content-center align-items-center may-center-content-last-small">le 13 mai 1917, Mgr Eugenio Pacelli recevait la consécration épiscopale des mains du pape Benoît XV.</div>
        <div class="space-50"></div>
    </div>
</div>
@elseif($page == 2)
<!--------------------------JUNE------------------------------------------>
<div class="position-relative">
    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
        <div class="p-3 blue-box-months">
            <div class="d-flex justify-content-start">
                <a href="{{ route('notredame') }}"><img src="{{ asset('img/rdp/responsive/back_button.png') }}" alt="logo" /></a>
            </div>
            <div class="blue-box-title d-flex align-items-center justify-content-center">Les 13 juin 1917</div>
        </div>
    </div>
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="blue-box-months d-flex align-items-center justify-content-between">
            <a href="{{ route('notredame') }}" class="ms-4"><img src="{{ asset('img/rdp/back-button-rdp.png') }}" class="" alt="logo" /></a>
            <div class="d-flex align-items-center justify-content-center me-5">
                <div class="blue-box-title">Les 13 juin<br>1917</div>
            </div>
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="m-auto d-flex justify-content-center">
        {!! trans('words.june_title') !!}
    </div>
    <div class="container mt-0 mt-sm-0 mt-md-0 mt-lg-5 mt-xl-5 mt-xxl-5">
        {!! trans('words.june_content') !!}
    </div>
    <div class="position-absolute month-absolute-end">
        <img src="{{ asset('img/rdp/rdp-months-virgin-mary.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/rdp/responsive/month-virgin-mary.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="container custom-tweak">
        <div class="px-4 pt-5 dark-blue-bg-gradient">
            <div class="d-flex justify-content-between">
                <div>
                    <img src="{{ asset('img/rdp/june_1.png') }}" class="" alt="logo" />
                </div>
                <div class="june-quote-width d-flex justify-content-center flex-column">
                    {!! trans('words.june_quote') !!}
                </div>
                <div class="py-3 june-white-box ps-2 my-auto">
                    {!! trans('words.june_white_bg') !!}
                </div>
            </div>
        </div>
        <div class="position-relative">
            <div class="position-absolute start-50 top-100 translate-middle">
                <iframe width="872" height="490" src="https://www.youtube.com/embed/NOLnMvhZjwE?si=BFAWkwRVyt4l8959" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="space-300"></div>
    </div>
    <div class="june-black-bg d-flex justify-content-center align-items-center">
        <div class="container">
            {!! trans('words.june_black_title') !!}
        </div>
    </div>
    <div class="container my-5">
        {!! trans('words.june_second') !!}
    </div>
    <div class="june-black-box-left d-flex justify-content-center align-items-center">
        <div class="container june-white-border">
            {!! trans('words.june_blackbox') !!}
        </div>
    </div>
    <div class="container mt-5">
        {!! trans('words.june_third') !!}
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="space-100"></div>
    <div class="space-50"></div>
    <div class="june-blue-bg-responsive">
        <div class="space-200"></div>
        <div class="position-relative">
            <div class="d-flex justify-content-center align-items-center">
                <div class="june-img-absolute-responsive">
                    <img src="{{ asset('img/rdp/responsive/june_1.png') }}" class="" alt="logo" />
                </div>
                <div class="p-2 pt-3 june-white-box-responsive">
                    {!! trans('words.june_quote') !!}
                </div>
            </div>
            <div class="mt-3 d-flex justify-content-center align-items-center flex-column">
                <div class="p-2 june-white-box">
                    {!! trans('words.june_white_bg') !!}
                </div>
            </div>
        </div>
        <div class="space-50"></div>
    </div>
    <div class="position-relative">
        <div class="position-absolute june-video-responsive">
            <iframe height="210" src="https://www.youtube.com/embed/NOLnMvhZjwE?si=BFAWkwRVyt4l8959" class="w-100" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    <div class="space-200"></div>
    <div class="june-black-bg d-flex justify-content-center align-items-center">
        {!! trans('words.june_black_title') !!}
    </div>
    <div class="container mt-5">
        <div>
            {!! trans('words.june_second') !!}
        </div>
        <div>
            {!! trans('words.june_blackbox-responsive') !!}
        </div>
        <div>
            {!! trans('words.june_third') !!}
        </div>
    </div>
</div>
@elseif($page == 3)
<!--------------------------JULY------------------------------------------>
<div class="position-relative">
    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
        <div class="p-3 blue-box-months">
            <div class="d-flex justify-content-start">
                <a href="{{ route('notredame') }}"><img src="{{ asset('img/rdp/responsive/back_button.png') }}" alt="logo" /></a>
            </div>
            <div class="blue-box-title d-flex align-items-center justify-content-center">Le 13 juillet 1917</div>
        </div>
    </div>
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="blue-box-months d-flex align-items-center justify-content-between">
            <a href="{{ route('notredame') }}" class="ms-4"><img src="{{ asset('img/rdp/back-button-rdp.png') }}" class="" alt="logo" /></a>
            <div class="d-flex align-items-center justify-content-center me-5">
                <div class="blue-box-title">Le 13 juillet<br>1917</div>
            </div>
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="m-auto d-flex justify-content-center">
        {!! trans('words.july_title') !!}
    </div>
    <div class="container mt-0 mt-sm-0 mt-md-0 mt-lg-5 mt-xl-5 mt-xxl-5 px-4">
        {!! trans('words.july_content') !!}
    </div>
    <div class="position-absolute month-absolute-end">
        <img src="{{ asset('img/rdp/rdp-months-virgin-mary.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/rdp/responsive/month-virgin-mary.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="container">
        <div class="mt-5 d-flex justify-content-center align-items-center flex-column">
            <img src="{{ asset('img/rdp/july_1.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
            <div class="mt-3 july-content-under-img">Les voyants, aussitôt après l’apparition du 13 juillet et la<br>vision de l’enfer.</div>
        </div>
        <div class="space-50"></div>
        {!! trans('words.july_second') !!}
        <div class="space-50"></div>
        <div class="d-flex justify-content-center">
            <iframe width="872" height="490" src="https://www.youtube.com/embed/NOLnMvhZjwE?si=BFAWkwRVyt4l8959" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" frameborder="0" allowfullscreen></iframe>
            <iframe width="100%" height="200" src="https://www.youtube.com/embed/NOLnMvhZjwE?si=BFAWkwRVyt4l8959" class="mt-3 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="mt-5 d-flex justify-content-center align-items-center flex-column">
        <img src="{{ asset('img/rdp/responsive/july_1.png') }}" class="" alt="logo" />
        <div class="mt-3 july-content-under-img">Les voyants, aussitôt après l’apparition du 13 juillet et la vision de l’enfer.</div>
    </div>
    <div class="container">
        <div class="mt-3"></div>
        {!! trans('words.july_second') !!}
        <div class="mt-3 d-flex justify-content-center">
            <iframe width="100%" height="200" src="https://www.youtube.com/embed/NOLnMvhZjwE?si=BFAWkwRVyt4l8959" class="" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="space-50"></div>
    <div class="container custom-tweak">
        <div class="p-5 pb-0 july-black-bg-gradient-rounded">
            <div class="my-5 d-flex justify-content-center align-items-center july-title-gradient">Événement historique</div>
            <div class="mt-5 d-flex justify-content-center align-items-center flex-column">
                <div>
                    {!! trans('words.july_first_par') !!}
                </div>
                <div>
                    <img src="{{ asset('img/rdp/july_2.png') }}" class="mt-3" alt="logo" />
                </div>
                <div class="px-5 mb-2 july-white-box">
                    {!! trans('words.july_second_par') !!}
                </div>
                <div>
                    <img src="{{ asset('img/rdp/july_3.png') }}" class="" alt="logo" />
                </div>
                <div class="p-5 july-white-box-sec">
                    {!! trans('words.july_third_par') !!}
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <img src="{{ asset('img/rdp/july_4.png') }}" class="" alt="logo" />
        </div>
        <div class="container mt-5 px-5">
            {!! trans('words.july_last_par') !!}
        </div>
    </div>
    <div class="space-50"></div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="mt-5 july-blue-bg-responsive">
        <div class="container">
            <div class="py-5 d-flex justify-content-center align-items-center july-title-gradient">Événement historique</div>
            <div class="d-flex justify-content-center align-items-center flex-column">
                <div>
                    {!! trans('words.july_first_par') !!}
                </div>
                <div class="mt-5">
                    <img src="{{ asset('img/rdp/responsive/july_2.png') }}" class="" alt="logo" />
                    {!! trans('words.july_under_img') !!}
                </div>
                <div class="p-2 july-white-box">
                    {!! trans('words.july_second_par') !!}
                </div>
                <div class="mt-5">
                    <img src="{{ asset('img/rdp/responsive/july_3.png') }}" class="" alt="logo" />
                    {!! trans('words.july_under_second_img') !!}
                </div>
                <div class="my-3"></div>
                <div class="px-2 py-3 july-white-box-sec">
                    {!! trans('words.july_third_par') !!}
                </div>
            </div>
        </div>
        <div class="space-400"></div>
    </div>
    <div class="position-relative d-flex justify-content-center">
        <div class="july-absolute-responsive">
            <img src="{{ asset('img/rdp/responsive/july_4.png') }}" class="" alt="logo" />
        </div>
    </div>
    <div class="space-75"></div>
    <div class="container">
        {!! trans('words.july_last_par') !!}
    </div>
</div>
@elseif($page == 4)
<!--------------------------AUGUST 13------------------------------------------>
<div class="position-relative">
    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
        <div class="p-3 blue-box-months">
            <div class="d-flex justify-content-start">
                <a href="{{ route('notredame') }}"><img src="{{ asset('img/rdp/responsive/back_button.png') }}" alt="logo" /></a>
            </div>
            <div class="blue-box-title d-flex align-items-center justify-content-center">Le 13 août 1917</div>
        </div>
    </div>
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="blue-box-months d-flex align-items-center justify-content-between">
            <a href="{{ route('notredame') }}" class="ms-4"><img src="{{ asset('img/rdp/back-button-rdp.png') }}" class="" alt="logo" /></a>
            <div class="d-flex align-items-center justify-content-center me-5">
                <div class="blue-box-title">Le 13 août<br>1917</div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        {!! trans('words.rdp_13august') !!}
    </div>
    <div class="position-absolute month-absolute-end">
        <img src="{{ asset('img/rdp/rdp-months-virgin-mary.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/rdp/responsive/month-virgin-mary.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </div>
</div>
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
@elseif($page == 5)
<!--------------------------AUGUST 19------------------------------------------>
<div class="position-relative">
    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
        <div class="p-3 blue-box-months">
            <div class="d-flex justify-content-start">
                <a href="{{ route('notredame') }}"><img src="{{ asset('img/rdp/responsive/back_button.png') }}" alt="logo" /></a>
            </div>
            <div class="blue-box-title d-flex align-items-center justify-content-center">Le 19 août 1917</div>
        </div>
    </div>
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="blue-box-months d-flex align-items-center justify-content-between">
            <a href="{{ route('notredame') }}" class="ms-4"><img src="{{ asset('img/rdp/back-button-rdp.png') }}" class="" alt="logo" /></a>
            <div class="d-flex align-items-center justify-content-center me-5">
                <div class="blue-box-title">Le 19 août<br>1917</div>
            </div>
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="m-auto d-flex justify-content-center">
        {!! trans('words.19august_title') !!}
    </div>
    <div class="container my-0 my-sm-0 my-md-0 my-lg-5 my-xl-5 my-xxl-5">
        {!! trans('words.19august_content') !!}
    </div>
    <div class="position-absolute month-absolute-end">
        <img src="{{ asset('img/rdp/rdp-months-virgin-mary.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/rdp/responsive/month-virgin-mary.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="space-200"></div>
    <div class="container custom-tweak mt-5">
        <div class="august-19-blue-bg">
            <div class="position-relative">
                <div class="top-0 position-absolute start-50 translate-middle" style="width: 851px;">
                    <img src="{{ asset('img/rdp/19august_1.png') }}" class="" alt="logo" />
                </div>
                <div class="space-100"></div>
                <div class="m-auto august-19-white-box">
                    <div class="p-4 pb-0 d-flex flex-column">
                        <div class="space-100"></div>
                        <div class="space-75"></div>
                        {!! trans('words.19august_last_title') !!}
                        {!! trans('words.19august_last') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space-50"></div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="space-100"></div>
    <div class="august-19-blue-bg">
        <div class="position-relative">
            <div class="absolute-august-19">
                <img src="{{ asset('img/rdp/responsive/19august_1.png') }}" class="" alt="logo" />
                <div class="d-flex justify-content-center align-items-center august-19-under-img-bg">La petite Jacinthe</div>
            </div>
            <div class="space-100"></div>
            <div class="space-50"></div>
            <div class="m-auto august-19-white-box">
                <div class="p-2 d-flex flex-column">
                    {!! trans('words.19august_last_title') !!}
                    {!! trans('words.19august_last') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@elseif($page == 6)
<!--------------------------SEPTEMBER------------------------------------------>
<div class="position-relative">
    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
        <div class="p-3 blue-box-months">
            <div class="d-flex justify-content-start">
                <a href="{{ route('notredame') }}"><img src="{{ asset('img/rdp/responsive/back_button.png') }}" alt="logo" /></a>
            </div>
            <div class="blue-box-title d-flex align-items-center justify-content-center me-3">Le 13 septembre<br>1917</div>
        </div>
    </div>
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="blue-box-months d-flex align-items-center justify-content-between">
            <a href="{{ route('notredame') }}" class="ms-4"><img src="{{ asset('img/rdp/back-button-rdp.png') }}" class="" alt="logo" /></a>
            <div class="d-flex align-items-center justify-content-center me-5">
                <div class="blue-box-title">Le 13 septembre<br>1917</div>
            </div>
        </div>
    </div>
    <div class="space-75 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="m-auto d-flex justify-content-center">
        {!! trans('words.september_title') !!}
    </div>
    <div class="container mt-0 mt-sm-0 mt-md-0 mt-lg-5 mt-xl-5 mt-xxl-5">
        {!! trans('words.september_content') !!}
    </div>
    <div class="position-absolute month-absolute-end">
        <img src="{{ asset('img/rdp/rdp-months-virgin-mary.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/rdp/responsive/month-virgin-mary.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </div>
</div>
<div class="my-5">
    <img src="{{ asset('img/rdp/september_1.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/rdp/responsive/september_1.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="container custom-tweak">
        <div class="p-5 september-dark-blue-bg">
            <div class="d-flex justify-content-center flex-column">
                {!! trans('words.september_title_bg') !!}
                {!! trans('words.september_first') !!}
            </div>
            <div class="m-auto september-white-box-1">
                <div class="d-flex justify-content-center p-4">
                    {!! trans('words.september_second') !!}
                </div>
            </div>
        </div>
        <div class="space-50"></div>
        <div class="p-5 september-orange-bg">
            <div class="d-flex justify-content-center flex-column">
                {!! trans('words.september_title_orange') !!}
                {!! trans('words.september_first_orange') !!}
            </div>
            <div class="m-auto september-white-box-2">
                <div class="px-5 py-4">
                    {!! trans('words.september_second_orange') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="space-50"></div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="p-3 september-dark-blue-bg">
        <div class="my-4 d-flex justify-content-center flex-column">
            {!! trans('words.september_title_bg') !!}
            {!! trans('words.september_first') !!}
        </div>
        <div class="m-auto september-white-box-1">
            <div class="p-3">
                {!! trans('words.september_second') !!}
            </div>
        </div>
        <div class="my-5"></div>
    </div>
    <div class="space-50"></div>
    <div class="p-3 september-orange-bg">
        <div class="my-3 d-flex justify-content-center flex-column">
            {!! trans('words.september_title_orange') !!}
            {!! trans('words.september_first_orange') !!}
        </div>
        <div class="m-auto september-white-box-2">
            <div class="p-3">
                {!! trans('words.september_second_orange') !!}
            </div>
        </div>
        <div class="my-3"></div>
    </div>
</div>
@elseif($page == 7)
<!--------------------------OCTOBER------------------------------------------>
<div class="position-relative">
    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
        <div class="p-3 blue-box-months">
            <div class="d-flex justify-content-start">
                <a href="{{ route('notredame') }}"><img src="{{ asset('img/rdp/responsive/back_button.png') }}" alt="logo" /></a>
            </div>
            <div class="blue-box-title d-flex align-items-center justify-content-center me-3">Le 13 octobre<br>1917</div>
        </div>
        <div class="position-relative">
            <img src="{{ asset('img/rdp/responsive/rdp-october-top.png') }}" alt="logo" />
            <div class="absolute-responsive-october">
                <div class="october-title-bg-img">Le miracle du<br>soleil à Fatima</div>
            </div>
        </div>
        <div class="position-absolute month-absolute-end">
            <img src="{{ asset('img/rdp/responsive/month-virgin-mary.png') }}" class="" alt="logo" />
        </div>
    </div>
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="position-relative">
            <div class="blue-box-months d-flex align-items-center justify-content-between">
                <a href="{{ route('notredame') }}" class="ms-4"><img src="{{ asset('img/rdp/back-button-rdp.png') }}" class="" alt="logo" /></a>
                <div class="d-flex align-items-center justify-content-center me-5">
                    <div class="blue-box-title">Le 13 octobre<br>1917</div>
                </div>
            </div>
            <div class="october-absolute-top">
                <div class="rdp-october-bg">
                    <div class="position-absolute month-absolute-end">
                        <img src="{{ asset('img/rdp/rdp-october-right.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
                    </div>
                </div>
                <div class="position-absolute start-50 translate-middle w-100" style="bottom: 4rem;">
                    <div class="october-title-bg-img">Le miracle du<br>soleil à Fatima</div>
                </div>
            </div>
        </div>
        <div class="space-700"></div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="m-auto d-flex justify-content-center">
        {!! trans('words.october_title') !!}
    </div>
    <div class="container my-3 my-lg-5">
        {!! trans('words.october_content') !!}
    </div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="container custom-tweak">
        <div class="px-5 py-3 mt-5 october-orange-bg">
            <div class="my-3 d-flex justify-content-center align-items-center flex-column">
                {!! trans('words.october_title_orange') !!}
                {!! trans('words.october_first_orange') !!}
            </div>
            <div class="m-auto mb-3 october-orange-white-box">
                <div class="p-4">
                    {!! trans('words.october_first_white') !!}
                    <div class="my-3 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('img/rdp/october_2.png') }}" class="" alt="logo" />
                    </div>
                    {!! trans('words.october_second_white') !!}
                </div>
            </div>
        </div>
        <div class="my-4"></div>
        <div class="p-5 october-grey-bg">
            <div class="m-auto october-grey-white-box">
                <div class="p-4">
                    <div class="my-3 d-flex justify-content-center flex-column">
                        {!! trans('words.october_title_grey') !!}
                        {!! trans('words.october_grey_first_white') !!}
                        <div class="my-3 d-flex justify-content-center align-items-center flex-column">
                            <div class="">
                                <img src="{{ asset('img/rdp/october_3.png') }}" class="" alt="logo" />
                                <div class="october-grey-content-title mt-3">Article paru le 13 octobre 1917</div>
                            </div>
                        </div>
                    </div>
                    {!! trans('words.october_grey_second_white') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="space-50"></div>
    <div class="october-black-row d-flex align-items-center">
        <div class="container">
            {!! trans('words.october_black_title') !!}
        </div>
    </div>
    <div class="container my-5">
        {!! trans('words.october_black_first') !!}
        <div class="my-5 d-flex justify-content-center ">
            <img src="{{ asset('img/rdp/october_4.png') }}" class="p-5 bg-dark" alt="logo" />
        </div>
        <div class="m-auto" style="width:90%;">
            {!! trans('words.october_black_second') !!}
        </div>
    </div>
    <div class="october-black-row d-flex align-items-center">
        <div class="container">
            {!! trans('words.october_black_second_title') !!}
        </div>
    </div>
    <div class="container mt-5">
        {!! trans('words.october_black_third') !!}
        <div class="p-5 pb-2 october-gradient-last">
            <div class="my-5 d-flex justify-content-center align-items-center october-title-gradient">Événement historique</div>
            <div class="space-200"></div>
            <div class="p-4 m-auto october-white-box-last">
                <div class="position-relative">
                    <div class="d-flex justify-content-center rdp-october-fifth-image">
                        <img src="{{ asset('img/rdp/october_5.png') }}" class="" height="988" alt="logo" />
                    </div>
                </div>
                <div class="space-800"></div>
                <div class="space-50"></div>
                <div class="d-flex flex-column">
                    {!! trans('words.october_last_par') !!}
                </div>
                <div class="d-flex justify-content-center mb-5">
                    <img src="{{ asset('img/rdp/october_6.png') }}" class="" width="824" alt="logo" />
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="p-3 pb-0 october-orange-bg">
        <div class="my-3 d-flex justify-content-center flex-column">
            {!! trans('words.october_title_orange') !!}
            {!! trans('words.october_first_orange') !!}
        </div>
        <div class="m-auto mt-3 october-orange-white-box">
            <div class="p-1">
                {!! trans('words.october_first_white') !!}
                <div class="full-width-image-wrapper">
                    <img src="{{ asset('img/rdp/responsive/october_2.png') }}" class="w-100 my-2" alt="logo" />
                </div>
                {!! trans('words.october_second_white') !!}
            </div>
        </div>
    </div>
    <div class="mt-5 mb-3 d-flex justify-content-center flex-column">
        {!! trans('words.october_title_grey') !!}
        {!! trans('words.october_grey_first_white') !!}
        <div class="space-75"></div>
    </div>
    <div class="p-3 october-grey-bg">
        <div class="position-relative">
            <div class="position-absolute start-50 translate-middle w-100" style="top: 3rem;">
                <img src="{{ asset('img/rdp/responsive/october_3.png') }}" class="d-flex m-auto" alt="logo" />
            </div>
        </div>
        <div class="space-100"></div>
        <div class="space-50"></div>
        <div class="m-auto mb-4 october-grey-white-box">
            <div class="space-50"></div>
            <div class="p-2">
                <div class="october-grey-content-title mb-3">Article paru le 13 octobre 1917</div>
                {!! trans('words.october_grey_second_white') !!}
            </div>
        </div>
    </div>
    <div class="space-50"></div>
    <div class="october-black-row d-flex align-items-center">
        <div class="container">
            {!! trans('words.october_black_title') !!}
        </div>
    </div>
    <div class="container my-2">
        {!! trans('words.october_black_first') !!}
    </div>

    <div class="">
        <img src="{{ asset('img/rdp/responsive/october_4.png') }}" class="p-3 bg-dark" alt="logo" />
    </div>
    <div class="container my-2">
        {!! trans('words.october_black_second') !!}
        {!! trans('words.october_black_second_title') !!}
        {!! trans('words.october_black_third') !!}
    </div>
    <div class="october-blue-bg">
        <div class="d-flex justify-content-center align-items-center october-title-gradient pt-4 pb-5">Événement historique</div>
        <div class="position-relative">
            <div class="october-responsive-fifth-image">
                <img src="{{ asset('img/rdp/responsive/october_5.png') }}" class="w-100" alt="logo" />
            </div>
        </div>
        <div class="container">
            <div class="october-white-box-responsive">
                <div class="space-200"></div>
                <div class="space-75"></div>
                <div class="p-3 position-relative">
                    {!! trans('words.october_last_par') !!}
                    <div class="space-300"></div>
                    <div class="october-absolute-last-img">
                        <img src="{{ asset('img/rdp/responsive/october_6.png') }}" class="w-100" alt="logo" />
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="space-100"></div>
    <div class="container">
        {!! trans('words.october_last_par_responsive') !!}
    </div>
</div>
@endif
@endsection


@section('scripts')
<script>
    $('.parent-body').addClass('display-months-header');
</script>
@endsection