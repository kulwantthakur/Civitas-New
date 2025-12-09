<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Civitas</title>
    <meta name="robots" content="noindex">
    <meta property="og:locale"
        content="{{ str_replace('-', '_', app()->getLocale()) }}{{ app()->getLocale() === 'en' ? '_GB' : '' }}" />

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
                <div class="navbar-brand d-flex justify-content-center align-items-center bg-white flex-column home-page-height px-2 header-logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/blue-army/blue-logo.png') }}" alt="logo" />
                    </a>
                </div>
                <div class="ml-auto navbar-hamburger">
                    <a class="hamburger animate" data-bs-toggle="collapse"
                        data-bs-target="#mobileMenu"><span></span></a>
                </div>
                <div class="collapse navbar-collapse desktop-height desktop-width justify-content-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item ps-0 d-block d-sm-block d-md-block d-lg-block d-xl-none d-xxl-none">
                            <a class="nav-link" href="{{ route('civitas.participer') }}" id="participer">PARTICIPER</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('podcasts') }}" id="podcast">PODCASTS <img
                                    src="{{ asset('img/menu_next.png') }}" alt="logo" /></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('amissfs.home') }}" id="amissfs">AMISSFS <img
                                    src="{{ asset('img/menu_next.png') }}" alt="logo" /></a>
                        </li>
                        <li class="nav-item d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
                            <a class="nav-link" href="{{ route('rdp.home') }}" id="rdp">REFUGE DES PÉCHEURS <img
                                    src="{{ asset('img/menu_next.png') }}" alt="logo" /></a>
                        </li>
                        <li class="nav-item d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
                            <a class="nav-link" href="{{ route('rdp.home') }}" id="rdp">RDP <img
                                    src="{{ asset('img/menu_next.png') }}" alt="logo" /></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('civitas.home') }}" id="civitas-suisse">CIVITAS SUISSE
                                <img src="{{ asset('img/menu_next.png') }}" alt="logo" /></i></a>
                        </li>
                        <div class="d-none d-sm-none d-md-none d-lg-none d-xl-block d-xxl-block">
                            <div class="nav-item d-flex gap-2 align-items-center" id="language">
                                <span class="nav-link">
                                    <a class="text-white"
                                        href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('fr', route('language', [], false)) }}"
                                        id="language">FR</a>
                                </span>
                                <span class="lang-separator" id="language">|</span>
                                <span class="nav-link">
                                    <a class="text-white"
                                        href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('de', route('language', [], false)) }}"
                                        id="language">DE</a>
                                </span>
                                <span class="lang-separator" id="language">|</span>
                                <span class="nav-link">
                                    <a class="text-white"
                                        href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('it', route('language', [], false)) }}"
                                        id="language">IT</a>
                                </span>
                            </div>
                        </div>
                        <li class="nav-item d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
                            <div class="d-flex align-items-center" style="padding: 0 30px;">
                                <a class="nav-link mobile-menu-new fw-bolder"
                                    href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('fr', route('language', [], false)) }}">FR</a>
                                <span class="mx-2">-</span>
                                <a class="nav-link mobile-menu-new"
                                    href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('de', route('language', [], false)) }}">DE</a>
                                <span class="mx-2">-</span>
                                <a class="nav-link mobile-menu-new"
                                    href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('it', route('language', [], false)) }}">IT</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="d-none d-sm-none d-md-none d-lg-none d-xl-block d-xxl-block flex-grow-1 top-menu-empty">
                    <div class="d-flex align-items-center participer-height">
                        <a class="nav-link d-flex align-items-center justify-content-center"
                            href="{{ route('civitas.member') }}" id="participer">PARTICIPER</a>
                    </div>
                </div>
            </div>
         <div class="w-100 d-block d-sm-block d-md-block d-lg-block d-xl-none d-xxl-none">
                <div id="mobileMenu" class="p-0 collapse navbar-collapse second-collapse">
                    <ul class="m-auto nav navbar-nav">
                        <div class="d-flex justify-content-between align-items-center responsive-menu-back">
                            <a href="javascript:void(0);" class="close-menu"><img src="{{ asset('img/menu_back.png') }}" class=""></a>
                            <a href="{{ route('amissfs.home') }}"><img src="{{ asset('img/homebutton.png') }}" class=""></a>
                        </div>
                        <li class="px-2 nav-item">
                            <a class="nav-link navbar-submenu-ammisfs fw-bold" href="{{ route('amissfs.home') }}" id="amissfs">AMISSFS <img src="{{ asset('img/menu_next.png') }}" class=""></a>
                        </li>
                        <li class="px-2 nav-item">
                            <a class="nav-link navbar-submenu-ammisfs" href="{{route('association')}}" id="l'association">L’ ASSOCIATION <img src="{{ asset('img/menu_next.png') }}" class=""></a>
                        </li>
                        <li class="px-2 nav-item">
                            <a class="nav-link navbar-submenu-ammisfs" href="{{ route ('podcasts')}}" id="audiotheque">AUDIOTHÈQUE <img src="{{ asset('img/menu_next.png') }}" class=""></a>
                        </li>
                        <li class="px-2 nav-item">
                            <a class="nav-link navbar-submenu-ammisfs" href="{{ route ('editions')}}" id="editions">ÈDITIONS<img src="{{ asset('img/menu_next.png') }}" class=""></a>
                        </li>
                        <li class="px-2 nav-item">
                            <a class="nav-link navbar-submenu-ammisfs" href="{{route('bulletin')}}" id="bulletin">LE BULLETIN <img src="{{ asset('img/menu_next.png') }}" class=""></a>
                        </li>
                        <li class="px-2 nav-item">
                            <a class="nav-link navbar-submenu-ammisfs" href="{{ route ('rom-kurier')}}" id="rom-kurier">DER ROM KURIER <img src="{{ asset('img/menu_next.png') }}" class=""></a>
                        </li>
                        <li class="px-2 nav-item">
                            <a class="nav-link navbar-submenu-ammisfs" href="{{ route ('bookStore')}}" id="libraire">LA LIBRAIRIE <img src="{{ asset('img/menu_next.png') }}" class=""></a>
                        </li>
                        <li class="px-2 nav-item">
                            <a class="nav-link navbar-submenu-ammisfs" href="{{ route ('dons')}}" id="dons">DONS <img src="{{ asset('img/menu_next.png') }}" class=""></a>
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
    </div>
    <div>
        <img src="{{ asset('img/blue-army/banner-1.png') }}" class="w-100" alt="Logo">
    </div>
        <div class="container">
        <div class="heading_part">
            <h2>DEVENIR SOLDAT DE L’ARMéE BLEUE DU COEUR IMMACULé</h2>
        </div>
        <div class="heading-second">
            .
            <br>
            Dis à tout le monde que Dieu veut nous accorder ses grâces par le moyen du Cœur Immaculé de Marie ; que
            c’est à Elle qu’il faut les demander ; que le Cœur de Jésus veut qu’on vénère avec Lui le Cœur Immaculé de
            Marie ; que l’on demande la paix au Cœur Immaculé de Marie, car c’est à Elle que Dieu l’a confiée.
            <br>
            .
            <br>
            <p class="m-0"><span class="blue-color">Jacinthe</span> à soeur Lucie, 1920</p>
            .
            <br>
            .
        </div>
    </div>
    <div class="star-section">
        <div class="container">
            <div class="star-top-part">
                <img src="{{ asset('img/blue-army/white-star.png') }}" class="w-100 white-star-img" alt="Logo">
                 <img src="{{ asset('img/blue-army/advantage-star-hover.png') }}" class="w-100 advantage-star-hover" alt="Logo">
                <h2>C’EST ACCOMPLIR LES DEMANDES DE NOTRE DAME DE FATIMA EN APPUYANT SON RÔLE DE CO-RéDEMPTRICE ET DE
                    MéDIATRICE DE TOUTES LES GRÂCES AU SEIN D’UN GROUPE ORGANISé DANS UN ESPRIT DE RéPARATION POUR LES
                    PéCHéS COMMIS CONTRE LE COEUR IMMACULé DE MARIE.</h2>
            </div>
        </div>
        <div class="half-bg-sec">
            <div class="container">
                <div class="star_text">
                    <div class="d-flex ">
                            <img src="{{ asset('img/blue-army/white-star.png') }}" class="white-star-img">
                            <img src="{{ asset('img/blue-army/advantage-star-hover.png') }}" class="w-100 advantage-star-hover" alt="Logo">
                        <p class="m-0">TRAVAILLER à FAIRE RèGNER LE COEUR IMMACULé DE MARIE AVEC LE SACRé COEUR DE
                            JéSUS DANS LA SOCIéTé. </p>
                    </div>
                    <div class="d-flex ">
                        <img src="{{ asset('img/blue-army/white-star.png') }}" class="white-star-img">
                        <img src="{{ asset('img/blue-army/advantage-star-hover.png') }}" class="w-100 advantage-star-hover" alt="Logo">
                        <p class="m-0">COMBATTRE TOUT SPéCIALEMENT L’EMPRISE DES SOCIéTéS SECRETES ; éLITES
                            MONDIALISTES.</p>
                    </div>
                    <div class="d-flex ">
                        <img src="{{ asset('img/blue-army/white-star.png') }}" class="white-star-img">
                        <img src="{{ asset('img/blue-army/advantage-star-hover.png') }}" class="w-100 advantage-star-hover" alt="Logo">
                        <p class="m-0">TRAVAILLER POUR LA CONVERSION DES AUTORITéS ROMAINES.</p>
                    </div>
                    <div class="d-flex ">
                        <img src="{{ asset('img/blue-army/white-star.png') }}" class="white-star-img">
                        <img src="{{ asset('img/blue-army/advantage-star-hover.png') }}" class="w-100 advantage-star-hover" alt="Logo">
                        <p class="m-0">TRAVAILLER POUR éTABLIR LA VRAI PAIX ENTRE LES NATIONS.</p>
                    </div>
                    <div class="d-flex ">
                        <img src="{{ asset('img/blue-army/white-star.png') }}" class="white-star-img">
                        <img src="{{ asset('img/blue-army/advantage-star-hover.png') }}" class="w-100 advantage-star-hover" alt="Logo">
                        <p class="m-0">TRAVAILLER à LA CONVERSION DES PAUVRE PéCHEURS.</p>
                    </div>
                </div>
            </div>
            <div class="half-bg-sec-blue-part">
                <img src="{{ asset('img/blue-army/Group67.png') }}" class="w-100" alt="Logo">
            </div>
        </div>

    </div>
    <div class="container">
        <div class="heading-second">
            .
            <br>
            Si l’on fait ce que je vais vous dire, beaucoup d’âmes seront sauvées et l’on aura la paix.
            <br>
            .
            <br>
            <p class="m-0"><span class="blue-color">Notre Dame</span> à Fatima, le 13 juillet 1917</p>
            .
            <br>
            .
        </div>
        <div class="heading_part">
            <h2>CE QUE DOIT FAIRE LE SOLDAT DE L’ARMéE BLEUE DU COEUR IMMACULé</h2>
        </div>
    </div>
    <div class="ce-que">
        <div class="container">
            <div class="gray-bg-sec">
                <div class="d-flex ">
                    <img src="{{ asset('img/blue-army/white-star.png') }}" class="white-star-img">
                        <img src="{{ asset('img/blue-army/advantage-star-hover.png') }}" class="w-100 advantage-star-hover" alt="Logo">
                    <div class="gray-part">
                        <h3>1. d’offrir chaque jour les sacrifices qu’exige Son devoir quotidien</h3>
                        <div class="text">
                            <h3>AVEC L’INTENTION DE RéPONDRE AUX DEMANDES DE FATIMA</h3>
                            <p>(OFFRIR SES SACRIFICES POUR : CONVERSION D’UN PéCHEUR ? CONSéCRATION DE LA RUSSIE à SON
                                COEUR IMMACULé ? POUR LE SAINT PèRE ? OU SIMPLEMENT AUX INTENTIONS DE LA VIERGE MARIE
                                (C’EST ELLE QUI APPLIQUERA LES FRUITS DE NOS SACRIFICES SELON SON BON PLAISIR) ?</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex ">
                    <img src="{{ asset('img/blue-army/white-star.png') }}" class="white-star-img">
                        <img src="{{ asset('img/blue-army/advantage-star-hover.png') }}" class="w-100 advantage-star-hover" alt="Logo">
                    <div class="gray-part">
                        <h3>2. prier quotidiennement une partie du rosaire en méditant les mystères.</h3>
                        <div class="text">
                            <h3>AVEC L’INTENTION DE RéPONDRE AUX DEMANDES DE FATIMA</h3>
                            <p>(OFFRIR UN CHAPELET POUR : CONVERSION D’UN PéCHEUR ? CONSéCRATION DE LA RUSSIE à SON
                                COEUR IMMACULé ? POUR LE SAINT PèRE ? OU SIMPLEMENT AUX INTENTIONS DE LA VIERGE MARIE
                                (C’EST ELLE QUI APPLIQUERA LES FRUITS DE NOS SACRIFICES SELON SON BON PLAISIR) ?</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex ">
                    <img src="{{ asset('img/blue-army/white-star.png') }}" class="white-star-img">
                        <img src="{{ asset('img/blue-army/advantage-star-hover.png') }}" class="w-100 advantage-star-hover" alt="Logo">
                    <div class="gray-part">
                        <h3>3. porter le scapulaire du Mont-Carmel comme signe de mon engagement et comme un acte de
                            consécration à Notre-Dame.</h3>
                    </div>
                </div>
                <div class="d-flex ">
                    <img src="{{ asset('img/blue-army/white-star.png') }}" class="white-star-img">
                        <img src="{{ asset('img/blue-army/advantage-star-hover.png') }}" class="w-100 advantage-star-hover" alt="Logo">
                    <div class="gray-part">
                        <div class="text">
                            <h3>4. RéPARER LES OFFENSES FAITES AU COEUR IMMACULé PAR LA DéVOTION AUX cinq premier samedi
                                du mois</h3>
                            <p>(POUR AUTANT QUE CELA NOUS EST POSSIBLE ) </p>
                        </div>
                        <div class="text">
                            <h3>D’autres pratiques comme l’offrande d’intentions de messes aux intentions du cœur
                                immaculé, sont simplement suggérés. <img class="blue-qus-img"
                                    src="http://127.0.0.1:8000/img/blue-army/Group196.png"> </h3>
                        </div>
                    </div>
                </div>
                <p class="italic">Accomplir les différentes demandes de Notre Dame de Fatima, c’est chercher ce que
                    Dieu veut : La Gloire du Cœur Immaculé de Marie et lorsque la Russie se convertira, tout le monde
                    reconnaitra son triomphe ! En attendant l’heure est au combat...</p>
            </div>
        </div>
        <div class="half-bg-sec-blue-part">
            <img src="http://127.0.0.1:8000/img/blue-army/Group67.png" class="w-100" alt="Logo">
        </div>
        <img src="http://127.0.0.1:8000/img/blue-army/transparent-bg.png" class="transparent-bg" alt="">
    </div>
    <div class="video-section">
        <div class="container">
            <div class="text-center">
                <img src="http://127.0.0.1:8000/img/blue-army/VIDEO-img.png" class="VIDEO-img" alt="">
            </div>
        </div>
    </div>
    <div class="pera-font ">
        <div class="container">
            <p>Je fais déjà cela...
                <br>
                <br>
                Il ne fait pas de doute qu’un nombre de catholique accomplissent déjà ces demandes. Cependant combien
                font les liens entre les évènement politiques et les effets de ces différentes demandes ?
                <br>
                <br>
                Pour exemple : Nous accomplissons les 5 premiers samedis dans le but de réparer les offenses commises
                contre le Cœur Immaculé et c’est ce que Notre Dame a demandé à Pontevedra en 1925. Cependant, 4 ans plus
                tard Notre Dame vient demander expressément la consécration de la Russie à sœur Lucie à Tuy, en Espagne,
                le 13 juin 1929 :
                <br>
                <br>
                “Le moment est venu où Dieu demande au Saint-Père de faire, en union avec tous les évêques du monde, la
                consécration de la Russie à mon Cœur Immaculé, promettant de la sauver par ce moyen. Elles sont si
                nombreuses, les âmes que la justice de Dieu <strong>condamne pour des péchés commis contre moi, que je
                    viens demander réparation. Sacrifie-toi à cette intention et prie.</strong> ”
                <br>
                <br>
                Ne faisant nous pas les 5 premiers samedis pour réparer ? Si oui, les faisant nous avec l’intention et
                en priant pour la consécration de la Russie à son Cœur Immaculé afin que la Russie puisse se convertir
                et par ce fait que des âmes puissent se sauver ? Sans parler des conséquences géopolitique que cela
                pourrait induire pour le monde entier et la liberté d’agir pour l’Eglise Catholique !
                <br>
                <br>
                Si l’acte de consécration de la Russie au Cœur Immaculé de Marie dépend directement du bon vouloir de
                l’autorité hiérarchique dans l’Église (pape et évêques), la dévotion réparatrice des premiers samedis du
                mois est demandée à tous les catholiques. De cette pratique dépend le salut de beaucoup d’âmes et même
                la paix du monde.
            </p>
            <div class="text-center my-78 img-with-text">
                <img src="http://127.0.0.1:8000/img/blue-army/image_getborder_hard_.png" class=""
                    alt="">
                <p>Tour d'Ivan le Grand et Cathédrale de l'Archange Michel, Kremlin, Moscou, Russie, 1898.</p>
            </div>
            <p>Il est bien évidemment possible d accomplir ces demandes sans pour autant faire partie de l’Armée Bleue
                du C.I. Cependant en adhérant à L’Armée Bleue du Cœur Immaculé nous avons la possibilité de nous unir,
                nous prêter main forte, agir ensemble et d’avoir un poids considérable face au reste du monde apostat.
                <br>
                <br>
                En devenant Soldat de l’Armée Bleu du C.I. vous avez la possibilités <strong>de rejoindre différentes
                    sections proche de chez vous, de participer aux différents événements (prières, conférences,
                    rencontre de prêtres, etc)</strong>.
                <br>
                <br>
                <strong>Il vous sera aussi remit un insigne que nous vous invitons à porter !</strong>
            </p>
        </div>
    </div>
    <form action="#" method="post">
        <div class="form-section_cls">
            <div class="container py-4" style="max-width: 572px;">

                <div class="d-flex gap-4 mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="madame">
                        <label class="form-check-label" for="madame">
                            Madame
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="monsieur">
                        <label class="form-check-label" for="monsieur">
                            Monsieur
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control form-control-lg" placeholder="Votre adresse e-mail">
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control form-control-lg" placeholder="Prénom">
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control form-control-lg" placeholder="Nom">
                </div>

                <div class="mb-3 d-flex align-items-center gap-3 select-section-cls">
                    <label class="form-label" for="select-Canton">Canton / Pays</label>
                    <select id="select-Canton" class="form-select form-select-lg">
                        <option selected disabled>Choisir une option</option>
                        <option>Suisse</option>
                        <option>France</option>
                        <option>Belgique</option>
                        <option>Autre...</option>
                    </select>
                </div>

            </div>
        </div>
    </form>

    <div class="protection-ses">
        <div class="container">
            <div class="text-center">
                <div class="Envoyer-la">
                    <img src="http://127.0.0.1:8000/img/blue-army/Logo-Civitas-bluesmall.png" class=""
                        alt="">
                    <span>Envoyer la demande d’adhésion</span>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center black-bg full-bg-bar-sec">
            <div class="container">
                <div class="full-bg-bar-sec-text"> PROTECTION DES DONNéES / DATENSCHUTZ</div>
            </div>
        </div>


    </div>
    <div class="container">
        <div class="heading-second">
            .
            <br>
            À la fin, mon Cœur Immaculé
            triomphera. Le Saint-Père me consacrera la
            Russie qui se convertira, et il sera accordé au
            monde un certain temps de paix
            <br>
            .
            <br>
            <p class="m-0"><span class="blue-color">Notre-Dame</span>, à Fatima, le 13 juillet 1917 </p>
            .
            <br>
            .
            <div class="h-100px"></div>
        </div>
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



    <script src="{{ asset('js/jQuery/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('js/jQuery/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script> -->
    <script src="{{ asset('js/jQuery/toastr.js') }}"></script>
    <script src="{{ asset('js/jQuery/topbar.js') }}"></script>
    <script src="{{ asset('js/jQuery/scripts.js') }}"></script>
    <script src="{{ asset('js/jQuery/owl-carousel.js') }}"></script>
    <script src="{{ asset('js/jQuery/slider.js') }}"></script>
</body>

</html>
