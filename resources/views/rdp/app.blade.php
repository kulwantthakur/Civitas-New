<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Civitas</title>
    <meta name="robots" content="noindex">
    <meta property="og:locale" content="{{ str_replace('-', '_', app()->getLocale()) }}{{ app()->getLocale() === 'en' ? '_GB' : '' }}" />

    <meta name="mobile-web-app-capable" content="yes" />
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/civitas.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/rdp.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome/fontawesome-all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/countrySelect.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl-carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl-carousel-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tablet.css') }}">
</head>

<body>
    @if(Auth::user())
    <div class="admin-bar my-4">
        <div class="d-flex justify-content-between align-items-center">
            @if(Route::is('catechisme'))
            <div class="d-flex algin-items-center ms-3">
                <button type="button" class="btn btn-success m-0" data-bs-toggle="modal" data-bs-target="#createModal">
                    Create New
                </button>
            </div>
            @elseif(Route::is('catechisme.category'))
            <div class="d-flex algin-items-center ms-3">
                <button type="button" class="btn btn-info m-0" data-bs-toggle="modal" data-bs-target="#editModal">
                    Edit
                </button>
                <div class="mx-3"></div>
                <button type="button" class="btn btn-danger m-0" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    Delete
                </button>
            </div>
            @else
            <div></div>
            @endif
            <div class="d-flex justify-content-end align-items-center">
                <div class="admin-zone-name me-3">Hello <a href="{{ route('account')}}" class="admin-zone-name">{{ Auth::user()->name }}</a></div>
                <div class="">
                    <a class="d-flex align-items-center admin-zone-logout me-3"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-user me-2"></i>Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="parent-body">
        @yield('rdp-top-content')
        <nav class="top-0 navbar inverse-text padding-top-rdp">
            <div class="d-flex align-items-center justify-content-between">
                @yield('logo')
                <div class="ml-auto navbar-hamburger">
                    <a class="hamburger animate" data-bs-toggle="collapse" data-bs-target=".second-collapse"><span></span></a>
                </div>
                <div class="collapse navbar-collapse desktop-height desktop-width">
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('podcasts') }}" id="podcast">PODCASTS <img src="{{ asset('img/menu_next.png') }}" alt="logo" /></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('amissfs.home') }}" id="amissfs">AMISSFS <img src="{{ asset('img/menu_next.png') }}" alt="logo" /></a>
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
                        @if(!in_array(Route::currentRouteName(), ['historique', 'coeurImmacule'])) 
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
                         @endif
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
                        <a class=" nav-link d-flex align-items-center justify-content-center" href="{{ route('civitas.member') }}" id="participer">PARTICIPER</a>
                    </div>
                </div>
            </div>

            <div class="w-100 d-block d-sm-block d-md-block d-lg-block d-xl-none d-xxl-none">
                <div class="p-0 collapse navbar-collapse second-collapse">
                    <ul class="m-auto nav navbar-nav">
                        <div class="d-flex justify-content-between align-items-center responsive-menu-back">
                            <a href="javascript:void(0);" class="close-menu"><img src="{{ asset('img/menu_back.png') }}" class=""></a>
                            <a href="{{ route('civitas.home') }}"><img src="{{ asset('img/rdp_home_responsive.png') }}" class=""></a>
                        </div>
                        <li class="px-2 nav-item">
                            <a class="nav-link rdp-submenu-home fw-bold" href="{{ route('rdp.home') }}" id="rdp">REFUGE DES PÈCHEURS <img src="{{ asset('img/menu_next.png') }}" class=""></a>
                        </li>
                        <li class="px-2 nav-item">
                            <a class="nav-link rdp-submenu" href="{{route('lerosaire')}}" id="lerosaire">LE ROSAIRE 2<img src="{{ asset('img/menu_next.png') }}" class=""></a>
                        </li>
                        <li class="px-2 nav-item">
                            <a class="nav-link rdp-submenu" href="{{route('catechisme')}}" id="catechisme">CATÈCHISME <img src="{{ asset('img/menu_next.png') }}" class=""></a>
                        </li>
                        <li class="px-2 nav-item">
                            <a class="nav-link rdp-submenu" href="{{route('notredame')}}" id="notredame">NOTRE DAME DE FATIMA <img src="{{ asset('img/menu_next.png') }}" class=""></a>
                        </li>
                        <li class="px-2 nav-item">
                            <a class="nav-link rdp-submenu" href="{{route('lescapulaire')}}" id="lescapulaire">LE SCAPULAIRE DE<br class="d-none d-xl-block">NOTRE-DAME <img src="{{ asset('img/menu_next.png') }}" class=""></a>
                        </li>
                        <li class="px-2 nav-item">
                            <a class="nav-link rdp-submenu" href="{{route('lersamedis')}}" id="lersamedis">LER SAMEDIS DU MOIS <img src="{{ asset('img/menu_next.png') }}" class=""></a>
                        </li>
                        <li class="px-2 nav-item">
                            <a class="nav-link rdp-submenu" href="{{route('lesecret')}}" id="lesecret">LE SECRET <img src="{{ asset('img/menu_next.png') }}" class=""></a>
                        </li>
                        
                        <li class="nav-item px-2">
                            <div class="d-flex align-items-center" style="padding: 0 30px;">
                                <a class="nav-link mobile-menu-new fw-bolder" href="{{ route('language') }}">FR</a>
                                <span class="mx-2">-</span>
                                <a class="nav-link mobile-menu-new" href="{{ route('language') }}">DE</a>
                                <span class="mx-2">-</span>
                                <a class="nav-link mobile-menu-new" href="{{ route('language') }}">IT</a>
                            </div>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </nav>
    @if(!in_array(Route::currentRouteName(), ['historique', 'coeurImmacule']))
        <div class="d-none d-sm-none d-md-none d-lg-none d-xl-flex d-xxl-flex">
            <div class="submenu-logo navbar-brand"></div>
            <div class="d-flex justify-content-start align-items-center navbar-collapse top-menu-height top-menu">
                <div class="d-flex align-items-center">
                    <a class="nav-link rdp-submenu ps-3" href="{{route('lerosaire')}}" id="lerosaire">LE ROSAIRE</a>
                    <div class="black-border"></div>
                </div>
                <div class="d-flex align-items-center ">
                    <a class="nav-link rdp-submenu" href="{{ route('catechisme')}}" id="catechisme">CATÈCHISME</a>
                    <div class="black-border"></div>
                </div>
                <div class="d-flex align-items-center ">
                    <a class="nav-link rdp-submenu-small" href="{{ route('notredame')}}" id="notredame">NOTRE DAME<br>DE FATIMA</a>
                    <div class="black-border"></div>
                </div>
                <div class="d-flex align-items-center ">
                    <a class="nav-link rdp-submenu-small" href="{{ route('lescapulaire')}}" id="lescapulaire">LE SCAPULAIRE<br>DE NOTRE-DAME </a>
                    <div class="black-border"></div>
                </div>
                <div class="d-flex align-items-center">
                    <a class="nav-link rdp-submenu-small" href="{{ route('lersamedis')}}" id="lersamedis">LER SAMEDIS<br>DU MOIS</a>
                    <div class="black-border"></div>
                </div>
                <div class="d-flex align-items-center">
                    <a class="nav-link rdp-submenu" href="{{ route('lesecret')}}" id="lescret">LE SECRET</a>
                </div>
            </div>
        </div>
    @endif
    </div>
    @include('cookie-bar')
    <div>
        @yield('content')
    </div>

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
                        <a href="{{ route('amissfs.home') }}" class="footer-title text-decoration-none">AMIS.S.F.S</a>
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
                            <a href="{{ route('amissfs.home') }}" class="footer-title text-decoration-none">AMIS.S.F.S</a>
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
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script> -->
    <script src="{{ asset('js/jQuery/toastr.js') }}"></script>
    <script src="{{ asset('js/jQuery/topbar.js') }}"></script>
    <script src="{{ asset('js/jQuery/scripts.js') }}"></script>
    <script src="{{ asset('js/jQuery/owl-carousel.js') }}"></script>
    <script src="{{ asset('js/jQuery/slider.js') }}"></script>

    <script>
        topbar.config({
            barColors: {
                0: '#ff9900'
            }
        });

        toastr.options = {
            "positionClass": "toast-bottom-right",
        }

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    @yield('scripts')
</body>

</html>