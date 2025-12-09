<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Civitas</title>
    <meta name="robots" content="noindex">
    <meta property="og:locale" content="{{ str_replace('-', '_', app()->getLocale()) }}{{ app()->getLocale() === 'en' ? '_GB' : '' }}" />

    <meta name="mobile-web-app-capable" content="yes" />
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tablet.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome/fontawesome-all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/countrySelect.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl-carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl-carousel-theme.css') }}">
</head>

<body>
    <div class="parent-body">
        <nav class="top-0 navbar inverse-text">
            <div class="d-flex align-items-center justify-content-between">
                <div class="navbar-brand d-flex justify-content-center align-items-center logo-position flex-column home-page-height">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/home/civitas_logo.svg') }}" alt="logo" />
                    </a>
                </div>
                <div class="ml-auto navbar-hamburger">
                    <a class="hamburger animate" data-bs-toggle="collapse" data-bs-target=".navbar-collapse"><span></span></a>
                </div>
                <div class="collapse navbar-collapse desktop-height desktop-width justify-content-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item ps-0 d-block d-sm-block d-md-block d-lg-block d-xl-none d-xxl-none">
                            <a class="nav-link" href="{{ route('civitas.participer')}}" id="participer">PARTICIPER</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('podcasts') }}" id="podcast">PODCASTS <img src="{{ asset('img/menu_next.png') }}" alt="logo" /></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('amissfs.home') }}" id="amissfs">AMIS S.F.S. <img src="{{ asset('img/menu_next.png') }}" alt="logo" /></a>
                        </li>
                        <li class="nav-item d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
                            <a class="nav-link" href="{{ route('rdp.home') }}" id="rdp">REFUGE DES PÉCHEURS <img src="{{ asset('img/menu_next.png') }}" alt="logo" /></a>
                        </li>
                        <li class="nav-item d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
                            <a class="nav-link" href="{{ route('rdp.home') }}" id="rdp">RDP <img src="{{ asset('img/menu_next.png') }}" alt="logo" /></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('civitas.home') }}" id="civitas-suisse">CIVITAS SUISSE <img src="{{ asset('img/menu_next.png') }}" alt="logo" /></i></a>
                        </li>
                        <div class="d-none d-sm-none d-md-none d-lg-none d-xl-block d-xxl-block">
                            <div class="nav-item d-flex gap-2 align-items-center" id="language">
                                <span class="nav-link">
                                    <a class="text-white" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('fr', route('language', [], false)) }}" id="language">FR</a>
                                </span>
                                <span class="lang-separator" id="language">|</span>
                                <span class="nav-link">
                                    <a class="text-white" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('de', route('language', [], false)) }}" id="language">DE</a>
                                </span>
                                <span class="lang-separator" id="language">|</span>
                                <span class="nav-link">
                                    <a class="text-white" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('it', route('language', [], false)) }}" id="language">IT</a>
                                </span>
                            </div>
                        </div>
                        <li class="nav-item d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
                            <div class="d-flex align-items-center" style="padding: 0 30px;">
                                <a class="nav-link mobile-menu-new fw-bolder" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('fr', route('language', [], false)) }}">FR</a>
                                <span class="mx-2">-</span>
                                <a class="nav-link mobile-menu-new" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('de', route('language', [], false)) }}">DE</a>
                                <span class="mx-2">-</span>
                                <a class="nav-link mobile-menu-new" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('it', route('language', [], false)) }}">IT</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="d-none d-sm-none d-md-none d-lg-none d-xl-block d-xxl-block flex-grow-1 top-menu-empty">
                    <div class="d-flex align-items-center participer-height">
                        <a class="nav-link d-flex align-items-center justify-content-center" href="{{ route('civitas.member') }}" id="participer">PARTICIPER</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    @include('cookie-bar')
    <section id="home">
        <div class="video-background">
            <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
                <img src="{{ asset('img/home/video_background.png') }}" class="video-img-right">
                <video loop muted playsinline class="video_home">
                    <source src="{{ asset('img/home/home_video.mp4') }}" type="video/mp4">
                </video>
            </div>
            <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
                <img src="{{ asset('img/home/video_bg_responsive.png') }}" class="video-img-right">
                <video loop muted playsinline class="video_home video_mobile">
                    <source src="{{ asset('img/home/mobile_video.mp4') }}" type="video/mp4">
                </video>
            </div>
        </div>
    </section>
    <div class="space-50"></div>
    <!-- <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div> -->
    <div class="container custom-tweak">
        <div class="row justify-content-center">
            <div class="text-center col-12 col-md-6 col-lg-4 d-flex justify-content-center mb-4 mb-lg-0">
                <div class="grey-box width-370 height-142 d-flex justify-content-center align-items-center flex-column">
                    <div class="p-2 text-white suisse-italic-20">PARTICIPER à DES CONFéRENCES<br>ET DES ATELIERS</div>
                    <a href="{{ route('civitas.events') }}" class="home-boxes-white-button-1 d-flex justify-content-center align-items-center text-decoration-none">VOIR LE CALENDRIER</a>
                </div>
            </div>
            <div class="text-center col-12 col-md-6 col-lg-4 d-flex justify-content-center mb-4 mb-lg-0">
                <div class="red-box width-370 height-142 d-flex justify-content-center align-items-center flex-column">
                    <div class="p-2 text-white suisse-italic-20">DES CENTAINES DE CONFéRENCES<br>ET DE SERMONS</div>
                    <a href="{{ route('podcasts') }}" class="home-boxes-white-button-2 d-flex justify-content-center align-items-center text-decoration-none">ACCÉDER AUX PODCASTS</a>
                </div>
            </div>
            <div class="text-center col-12 col-md-6 col-lg-4 d-flex justify-content-center mb-4 mb-lg-0">
                <div class="grey-box width-370 height-142 d-flex justify-content-center align-items-center flex-column">
                    <div class="p-2 text-white suisse-italic-20">SUIVRE DES COURS <br>DE CATéCHISME EN LIGNE </div>
                    <a href="{{ route('catechisme') }}" class="bg-white suisse-regular-18 width-138 height-38 text-dark d-flex justify-content-center align-items-center text-decoration-none">SE FORMER</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 mt-sm-3 mt-md-3 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div>
        @include('home_page_slider')
    </div>
    <div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-3 mt-sm-3 mt-md-3 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="">
        @include('home_page_last_section')
    </div>
    <div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>

    <footer class="dark-wrapper d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" style="background: #000 !important;">
        <div class="sub-footer">
            <div class="py-4 text-center inner footer-width">
                <div class="white-border d-flex mb-5">
                    <img src="{{ asset('img/home/footer-logo.svg') }}" class="mb-4 me-4" alt="logo" />
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <a href="{{ route('home') }}" class="footer-omnia text-decoration-none">OMNIA INSTAURARE IN CHRISTO</a>
                        <p class="text-white suisse-light-14">UN MOUVEMENT INTERNATIONAL</p>
                    </div>
                </div>
                <div class="my-4 row ms-3">
                    <div class="col-4 d-flex align-items-center">
                        <a href="{{ route('civitas.home') }}" class="footer-title text-decoration-none">CIVITAS SUISSE</a>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <a href="{{ route('amissfs.home') }}" class="footer-title text-decoration-none">AMIS S.F.S.</a>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <a href="{{ route('rdp.home') }}" class="footer-title text-decoration-none">REFUGE DES PÉCHEURS</a>
                    </div>
                </div>

                <div class="my-4 row ms-3">
                    <div class="col-4 d-flex align-items-center">
                        <a href="{{ route('political-programs') }}" class="footer-submenu text-decoration-none">POSITIONS</a>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <a href="{{ route('podcasts') }}" class="footer-submenu text-decoration-none">AUDIOTHÈQUE</a>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <a href="{{ route('notredame') }}" class="footer-submenu text-decoration-none">NOTRE DAME DE FATIMA</a>
                    </div>
                </div>

                <div class="my-4 row ms-3">
                    <div class="col-4 d-flex align-items-center">
                        <a href="{{ route('civitas.party') }}" class="footer-submenu text-decoration-none">MOUVEMENT</a>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <a href="{{ route('editions') }}" class="footer-submenu text-decoration-none">ÉDITIONS</a>
                    </div>
                    <div class="col-4 text-end"></div>
                </div>

                <div class="my-4 row ms-3">
                    <div class="col-4 d-flex align-items-center">
                        <a href="{{ route('civitas.diocesains') }}" class="footer-submenu text-decoration-none">GROUPES DIOCÉSAINS</a>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <a href="{{ route('bulletin') }}" class="footer-submenu text-decoration-none">BULLETIN</a>
                    </div>
                    <div class="col-4 text-start">
                        <a href="https://x.com/Civitas_" target="_blank"><img src="{{ asset('img/twitter.png') }}" class="me-3"></a>
                        <a href="https://www.instagram.com/vox_helvetica/" target="_blank"><img src="{{ asset('img/instagram.png') }}" class="me-3"></a>
                        <a href="https://www.youtube.com/@Civitas_International" target="_blank"><img src="{{ asset('img/youtube.png') }}" class="me-3"></a>
                        <a href="https://t.me/civitas_suisse" target="_blank"><img src="{{ asset('img/telegram1.png') }}" class="me-3"></a>
                        <a href="{{ route('civitas.home') }}"><img src="{{ asset('img/civitas_footer.png') }}" class="me-3"></a>
                    </div>
                </div>

                <div class="my-4 row ms-3">
                    <div class="col-4 text-start">
                        <a href="{{ route('civitas.news') }}" class="footer-submenu text-decoration-none">ACTUALITÉS</a>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4"></div>
                </div>

                <div class="flex-row mt-5">
                    <div class="row">
                        <div class="col-8">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('footer.impressum') }}" class="footer-last text-decoration-none">IMPRESSUM</a>

                                <div class="mx-4 border-footer"></div>
                                <a href="{{ route('footer.protection') }}" class="footer-last text-decoration-none">PROTECTION DES DONNÉES</a>

                                <div class="mx-4 border-footer"></div>
                                <a href="{{ route('footer.contact') }}" class="footer-last text-decoration-none">CONTACT</a>

                                <div class="mx-4 border-footer"></div>
                                <a href="{{ route('footer.cgu') }}" class="footer-last text-decoration-none">CGU</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="footer-last-civitas">© {{ date('Y') }} Civitas Suisse</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <footer class="dark-wrapper d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" style="background: #fff !important;">
        <div class="sub-footer">
            <div class="p-2 pb-0 text-center inner display-block">
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <img src="{{ asset('img/logo/responsive/logo_civitas_footer.svg') }}" class="mb-4 logo" alt="logo" />
                    <div>
                        <a href="{{ route('home') }}" class="sang-bleu-20 text-decoration-none text-dark">OMNIA INSTAURARE IN CHRISTO</a>
                        <p class="suisse-light-14 text-dark">UN MOUVEMENT INTERNATIONAL</p>
                    </div>
                </div>
                <div class="flex-row mx-2 mt-5 mb-4 d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <a href="https://x.com/Civitas_" target="_blank"><img src="{{ asset('img//twitter-black.png') }}" class="me-2"></a>
                        <a href="https://www.instagram.com/vox_helvetica/" target="_blank"><img src="{{ asset('img/instagram-black.png') }}" class="me-2"></a>
                        <a href="https://www.youtube.com/@Civitas_International" target="_blank"><img src="{{ asset('img/youtube-black.png') }}" class="me-2"></a>
                        <a href="https://t.me/civitas_suisse" target="_blank"><img src="{{ asset('img/telegram-black.png') }}" class="me-2"></a>
                    </div>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('civitas.home') }}"><img src="{{ asset('img/civitas-logo-black.png') }}" class=""></a>
                    </div>
                </div>
                <div class="mx-2 black-line"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mt-4 d-flex flex-column align-items-start">
                            <a href="{{ route('civitas.home') }}" class="footer-title text-decoration-none">CIVITAS SUISSE</a>
                            <a href="{{ route('political-programs') }}" class="footer-submenu text-decoration-none">POSITIONS</a>
                            <a href="{{ route('civitas.party') }}" class="footer-submenu text-decoration-none">MOUVEMENT</a>
                            <a href="{{ route('civitas.diocesains') }}" class="footer-submenu text-decoration-none">GROUPES DIOCÉSAINS</a>
                            <a href="{{ route('civitas.news') }}" class="footer-submenu text-decoration-none">ACTUALITÉS</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-4 d-flex flex-column align-items-start">
                            <a href="{{ route('amissfs.home') }}" class="footer-title text-decoration-none">AMIS S.F.S.</a>
                            <a href="{{ route('podcasts') }}" class="footer-submenu text-decoration-none">AUDIOTHÈQUE</a>
                            <a href="{{ route('editions') }}" class="footer-submenu text-decoration-none">ÉDITIONS</a>
                            <a href="{{ route('bulletin') }}" class="footer-submenu text-decoration-none">BULLETIN</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-4 d-flex flex-column align-items-start">
                            <a href="{{ route('rdp.home') }}" class="footer-title text-decoration-none">REFUGE DES PÉCHEURS</a>
                            <a href="{{ route('notredame') }}" class="footer-submenu text-decoration-none">NOTRE DAME DE FATIMA</a>
                        </div>
                    </div>
                </div>
                <div class="flex-row mt-4 d-flex justify-content-center">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('footer.impressum') }}" class="footer-last text-decoration-none">IMPRESSUM</a>

                        <div class="mx-1 border-footer"></div>
                        <a href="{{ route('footer.protection') }}" class="footer-last text-decoration-none">PROTECTION DES DONNÉES</a>

                        <div class="mx-1 border-footer"></div>
                        <a href="{{ route('footer.contact') }}" class="footer-last text-decoration-none">CONTACT</a>

                        <div class="mx-1 border-footer"></div>
                        <a href="{{ route('footer.cgu') }}" class="footer-last text-decoration-none">CGU</a>

                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="footer-last-civitas">© {{ date('Y') }} Civitas Suisse</div>
                </div>
            </div>
    </footer>

    <script src="{{ asset('js/map.js') }}"></script>
    <script src="{{ asset('js/jQuery/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('js/jQuery/popper.min.js') }}"></script>
    <!-- <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script> -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jQuery/toastr.js') }}"></script>
    <script src="{{ asset('js/jQuery/topbar.js') }}"></script>
    <script src="{{ asset('js/jQuery/scripts.js') }}"></script>
    <script src="{{ asset('js/jQuery/owl-carousel.js') }}"></script>
    <script src="{{ asset('js/jQuery/slider.js') }}"></script>



    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        toastr.options = {
            "positionClass": "toast-bottom-right",
        }
    </script>
    @yield('scripts')
</body>

</html>
