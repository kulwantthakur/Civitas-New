@extends('rdp.app')

@section('rdp-top-content')
<div class="d-none d-lg-block">
    <div class="position-relative">
        <div class="rdp-home-absolute">
            <div class="position-relative">
                <img src="{{ asset('/img/rdp/rdp-home-absolute.png') }}" class="w-100" height="569" alt="logo" />
                <div class="position-absolute bottom-0 start-50 translate-middle-x text-white text-center p-2">
                    {!! trans('words.rdp_home_top') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('logo')
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('rdp.home') }}" class="absolute-logo-rdp rdp-logo-outer">
        <img src="{{ asset('img/logo/logo_rdp.svg') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/logo/responsive/logo_rdp.svg') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </a>
</div>
@endsection

@section('content')
<div class="space-400 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="d-block d-lg-none">
    <div class="position-relative">
        <img src="{{ asset('/img/rdp/responsive/rdp-home-top-left.png') }}" class="position-absolute" alt="logo" />
        <div class="">
            <div class="container custom-tweak mt-5">
                {!! trans('words.rdp_home_top') !!}
                <div class="mt-2">
                    {!! trans('words.rdp_home_responsive') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="container custom-tweak">
        <div class="my-3 rdp-border-read-more">
            <div class="px-2 d-flex align-items-center">
                <a href="javascript:void(0);" class="read-more-link d-flex justify-content-between align-items-center w-100 text-decoration-none">
                    <img src="{{ asset('img/rdp/responsive/read-more.png') }}" class="" alt="logo" />
                    <div class="rdp-news-more">(...)</div>
                </a>
            </div>
        </div>
        <div class="hidden-content d-none">
            {!! trans('words.rdp_home_responsive_read_more') !!}
        </div>
    </div>
</div>
<div class="container custom-tweak">
    <div class="d-none d-lg-block">
        {!! trans('words.rdp_home') !!}
    </div>
    <div class="my-5 d-lg-flex flex-column align-items-center">
        <div class="position-relative">
            <img src="{{ asset('img/rdp/rdp_home_1.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
            <img src="{{ asset('img/rdp/responsive/rdp_home_1.png') }}" class="w-100 d-block d-lg-none" alt="logo" />
            <div class="bottom-0 px-2 py-1 position-absolute black-opacity-1 w-100 d-lg-flex px-sm-2 px-md-2 px-lg-4 px-xl-4 px-xxl-4 py-sm-1 py-md-1 py-lg-3 py-xl-3 py-xxl-3">
                <div class="rdp-home-content-img d-flex justify-content-center">LE SAINT ROSAIRE EXPLIQUÉ</div>
                <div class="d-flex justify-content-end align-items-end">
                    <a href="{{ route('lerosaire') }}" class="rdp-home-voir-button d-flex justify-content-center align-items-center">VOIR</a>
                </div>
            </div>
        </div>
        <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
        <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
        <div class="position-relative">
            <img src="{{ asset('img/rdp/rdp_home_2.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
            <img src="{{ asset('img/rdp/responsive/rdp_home_2.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
            <div class="bottom-0 px-2 py-1 position-absolute black-opacity-1 w-100 d-lg-flex px-sm-2 px-md-2 px-lg-4 px-xl-4 px-xxl-4 py-sm-1 py-md-1 py-lg-3 py-xl-3 py-xxl-3">
                <div class="rdp-home-content-big-img d-flex justify-content-center">Notre-Dame de Fatima</div>
                <div class="d-flex justify-content-end align-items-end">
                    <a href="{{ route('notredame') }}" class="rdp-home-voir-button d-flex justify-content-center align-items-center">VOIR</a>
                </div>
            </div>
        </div>
        <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
        <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
        <div class="position-relative">
            <img src="{{ asset('img/rdp/rdp_home_3.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
            <img src="{{ asset('img/rdp/responsive/rdp_home_3.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
            <div class="bottom-0 px-2 py-2 position-absolute black-opacity-3 w-100 d-flex px-sm-2 px-md-2 px-lg-4 px-xl-4 px-xxl-4 py-sm-2 py-md-2 py-lg-3 py-xl-3 py-xxl-3">
                <div class="rdp-home-content-big-img d-flex align-items-end p-lg-2">le scapulaire de Notre-Dame du Mont-Carmel</div>
                <div class="d-flex align-items-end">
                    <a href="{{ route('lescapulaire') }}" class="rdp-home-voir-button d-flex justify-content-center align-items-center">VOIR</a>
                </div>
            </div>
        </div>
        <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
        <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
        <div class="position-relative">
            <img src="{{ asset('img/rdp/rdp_home_4.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
            <img src="{{ asset('img/rdp/responsive/rdp_home_4.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
            <div class="bottom-0 px-2 py-2 position-absolute black-opacity-3 w-100 d-flex px-sm-2 px-md-2 px-lg-4 px-xl-4 px-xxl-4 py-sm-2 py-md-2 py-lg-3 py-xl-3 py-xxl-3">
                <div class="rdp-home-content-big-img d-flex align-items-end p-lg-3">ler samedis du mois</div>
                <div class="d-flex align-items-end">
                    <a href="{{ route('lersamedis') }}" class="rdp-home-voir-button d-flex justify-content-center align-items-center">VOIR</a>
                </div>
            </div>
        </div>
        <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
        <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
        <div class="position-relative">
            <img src="{{ asset('img/rdp/rdp_home_5.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
            <img src="{{ asset('img/rdp/responsive/rdp_home_5.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
            <div class="bottom-0 px-2 py-2 position-absolute black-opacity-5 w-100 d-flex justify-content-between px-sm-2 px-md-2 px-lg-4 px-xl-4 px-xxl-4 py-sm-2 py-md-2 py-lg-3 py-xl-3 py-xxl-3">
                <div class="rdp-home-content-big-img">LE SECRET</div>
                <div class="d-flex align-items-end">
                    <a href="{{ route('lesecret') }}" class="rdp-home-voir-button d-flex justify-content-center align-items-center">VOIR</a>
                </div>
            </div>
        </div>
        <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
        <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
        <div class="position-relative">
            <img src="{{ asset('img/rdp/rdp_home_6.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
            <img src="{{ asset('img/rdp/responsive/rdp_home_6.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
            <div class="bottom-0 position-absolute black-opacity-3 w-100 d-flex justify-content-center align-items-center">
                <div class="rdp-home-content-img-50 cath-mb-big">CATÉCHISME</div>
                <div class="bottom-0 pb-3 position-absolute end-0 pe-2 pe-sm-2 pe-md-2 pe-lg-4 pe-xl-4 pe-xxl-4">
                    <a href="{{ route('catechisme') }}" class="rdp-home-voir-button d-flex justify-content-center align-items-center">VOIR</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="position-relative">
    <img src="{{ asset('img/rdp/rdp_home_7.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/rdp/responsive/rdp_home_7.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    <div class="position-absolute rdp-home-absolute-top">
        <a href="{{ route('prier-lerosaire') }}" class="rdp-home-content-last-img rdp-yellow-box d-flex justify-content-center align-items-center text-decoration-none">Prier le Rosaire</a>
        <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
        <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
        <a href="{{ route('comment-lerosaire') }}" class="p-4 rdp-home-content-last-img text-dark rdp-grey-box d-flex align-items-center text-decoration-none">Comment Prier le Rosaire</a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('.rdp-submenu').addClass('change-color');
    $('.rdp-submenu-small').css('color', '#fff');
    $('.black-border').css('background-color', '#fff');
    $('.read-more-link').click(function() {
        $('.hidden-content').toggleClass('d-none');
    });
</script>
@endsection