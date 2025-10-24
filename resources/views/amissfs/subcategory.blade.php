@extends('amissfs.app')

@section('amissfs-home')
@if($page == 0 )
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="position-top-img w-100">
        <div class="position-relative">
            <img src="{{ asset('img/amissfs/association-amissfs.png') }}" class="amissfs-association-image" alt="logo" />
            <div class="space-50"></div>
            <div class="position-absolute top-50 start-50 translate-middle w-100">
                <div class="space-100"></div>
                <div class="text-white association-title">L’ASSOCIATION</div>
                <div class="space-100"></div>
                <div class="association-bg-gradient">
                    <div class="mb-5 text-white association-subtitle-regular">Les Amis de Saint François de Sales existent depuis 1988.</div>
                    <div class="text-white association-subtitle-light">Ses membres sont des laïques œuvrant dans le prolongement de l’apostolat sacerdotal.
                        <br>Par l’archivage et la transmission de la bonne doctrine, principalement sous forme audio.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="position-top-img">
        <div class="position-relative">
            <img src="{{ asset('img/amissfs/responsive/association-amissfs.png') }}" class="w-100 specific-height" alt="logo" />
            <div class="association-bg-gradient">
                <div class="mb-3 text-white association-subtitle-regular">Les Amis de Saint François de Sales existent depuis 1988.</div>
                <div class="text-white association-subtitle-light">Ses membres sont des laïques œuvrant dans le prolongement de l’apostolat sacerdotal.
                    <br>Par l’archivage et la transmission de la bonne doctrine, principalement sous forme audio.
                </div>
                <div class="position-absolute top-50 start-50 translate-middle w-100">
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

@section('logo')
@if($page == 0 )
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('amissfs.home') }}" class="logo-absolute text-decoration-none">
        <img src="{{ asset('/img/logo/amissfs_logo_light.svg') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block logo_size" alt="logo" />
        <img src="{{ asset('/img/amissfs/responsive/amissfs-logo.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </a>
</div>
<div class="d-block d-lg-none">
    <div class="position-absolute top-50 start-50">
        <div class="text-white amissfs-title-logo-responsive">L’ASSOCIATION</div>
    </div>
</div>
@elseif($page == 1 || $page == 2 || $page == 3 || $page == 4)
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('amissfs.home') }}" class="logo-absolute text-decoration-none">
        <img src="{{ asset('/img/logo/amissfs_logo_dark.svg') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block logo-color" alt="logo" />
        <img src="{{ asset('/img/logo/responsive/logo_amissfs_2.svg') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </a>
</div>
@elseif($page == 5)
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('amissfs.home') }}" class="logo-absolute text-decoration-none">
        <img src="{{ asset('/img/logo/amissfs_logo_dark.svg') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block logo-color" alt="logo" />
        <img src="{{ asset('/img/amissfs/responsive/amissfs-logo.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </a>
</div>
<div class="d-block d-lg-none">
    <div class="position-absolute top-50 start-50">
        <div class="amissfs-title-logo-responsive">DONS</div>
    </div>
</div>
@endif
@endsection


@section('content')
@if($page == 0)
<div class="amissfs-association-height"></div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="association-transp-bg d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center flex-column">
                <div class="grey-box-association d-flex justify-content-center align-items-center flex-column">
                    <div class="p-3 text-center text-white suisse-italic-20">LE BULLETIN DES AMIS DE SAINT FRANÇOIS DE SALES</div>
                    <a href="{{ route('bulletin') }}" class="bg-white suisse-regular-18 width-201 height-38 text-dark d-flex justify-content-center align-items-center text-decoration-none hover-blue-white">CONSULTER</a>
                </div>
                <div class="red-box-association d-flex justify-content-center align-items-center flex-column">
                    <div class="p-3 text-center text-white suisse-italic-20">DER ROM-KURIER</div>
                    <a href="{{ route('rom-kurier') }}" class="bg-white suisse-regular-18 width-201 height-38 text-dark d-flex justify-content-center align-items-center text-decoration-none hover-blue-white">LESEN</a>
                </div>
            </div>
        </div>
    </div>
    <div class="position-relative">
        <a href="{{ route('association-page') }}">
            <div class="image-container">
                <img src="{{ asset('img/amissfs/association-last.png') }}" class="w-100 default-image amissfs-association-height-img" alt="logo" />
                <img src="{{ asset('img/amissfs/association-last-hover.png') }}" class="w-100 hover-image amissfs-association-height-img" alt="logo" />
            </div>
        </a>
        <div class="absolute-top-right ">
            <div class="cornered">
                <div class="text-center association-italic-black text-uppercase absolute-center w-100">trois décénnies au service du christ-roi</div>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="association-responsive-img"></div>
    <a href="{{ route('association-page') }}" class="text-decoration-none">
        <div class="association-black-bg d-flex justify-content-around align-items-center">
            <div class="text-center association-italic-black col-8 text-uppercase">trois décénnies au service du christ-roi</div>
        </div>
    </a>
    <div class="container">
        <div class="m-auto my-3 d-flex justify-content-center align-items-center red-box width-201 height-36">
            <a href="{{ route('amissfs-contact') }}" class="association-home-button text-decoration-none text-uppercase">NOUS CONTACTER</a>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column mb-3">
            <div class="grey-box-association d-flex justify-content-center align-items-center flex-column">
                <div class="p-3 text-center text-white suisse-italic-20">LE BULLETIN DES AMIS DE SAINT FRANÇOIS DE SALES</div>
                <a href="{{ route('bulletin') }}" class="bg-white suisse-regular-18 width-201 height-38 text-dark d-flex justify-content-center align-items-center text-decoration-none">CONSULTER</a>
            </div>
            <div class="red-box-association d-flex justify-content-center align-items-center flex-column">
                <div class="p-3 text-center text-white suisse-italic-20">DER ROM-KURIER</div>
                <a href="{{ route('rom-kurier') }}" class="bg-white suisse-regular-18 width-201 height-38 text-dark d-flex justify-content-center align-items-center text-decoration-none">LESEN</a>
            </div>
        </div>
    </div>
</div>
@elseif($page == 1)
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="container">
        <div class="text-center d-flex flex-column align-items-center">
            <img src="{{ asset('/img/amissfs/amissfs-logo-page.png') }}" class="logo" alt="logo" />
            <div class="mt-3 sang-blue-30 text-dark">NOTRE MISSION</div>
            <div class="black-line-amissfs"></div>
        </div>
    </div>
</div>
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div>
    <img src="{{ asset('/img/amissfs/amissfs-editions.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('/img/amissfs/responsive/edition-home.png') }}" class="w-100 d-block d-sm-block d-md-blcok d-lg-none d-xl-none d-xxl-none" alt="logo" />
</div>
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="">
        {!! trans('words.amissfs_editions') !!}
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
            <div class="d-flex justify-content-center align-items-center">
                <div class="position-relative w-100">
                    <img src="{{ asset('/img/amissfs/amissfs-editions1.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
                    <img src="{{ asset('/img/amissfs/responsive/edition-first.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
                    <a href="{{ route('bookStore') }}">
                        <div class="amissfs-edition-white-box position-absolute d-flex justify-content-center align-items-end flex-column">
                            <div class="edition-title-box me-5">LA LIBRAIRIE</div>
                            <div class="edition-subtitle-box me-5">COMMANDER</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="mt-5 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0">
            <div class="d-flex justify-content-center align-items-center">
                <div class="position-relative w-100">
                    <img src="{{ asset('/img/amissfs/amissfs-editions2.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
                    <img src="{{ asset('/img/amissfs/responsive/edition-sec.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
                    <div class="d-flex justify-content-center amissfs-absolute-bottom">
                        <a href="https://medias-culture-et-patrimoine.com/" target="_blank" class="edition-button-right d-flex justify-content-center align-items-center">VERS LA BOUTIQUE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="d-flex justify-content-center align-items-center flex-column">
        <a href="{{ route('amissfs-contact') }}" class="mb-5 text-white red-box width-201 height-36 suisse-regular-18 d-flex justify-content-center align-items-center text-decoration-none">NOUS CONTACTER</a>
        <div class="grey-box-amissfs-home d-flex justify-content-center align-items-center flex-column">
            <div class="grey-box-amissfs-home-content">RECEVEZ LA NEWSLETTER DES AMIS<br>DE SAINT FRANÇOIS DE SALES</div>
            <a href="{{ route('amissfs-newsletter') }}" class="mt-3 amissfs-home-sec-button d-flex justify-content-center align-items-center">S’INSCRIRE</a>
        </div>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@elseif($page == 2)
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="text-center d-flex flex-column align-items-center">
            <img src="{{ asset('/img/amissfs/amissfs-logo-page.png') }}" class="logo" alt="logo" />
            <div class="mt-3 sang-blue-30 text-dark text-uppercase">le bulletin</div>
            <div class="black-line-amissfs"></div>
        </div>
    </div>
    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
        <a href="{{ route('association-page')}}">
            <img src="{{ asset('/img/amissfs/responsive/association-back.png') }}" class="" alt="logo" />
        </a>
    </div>
    <div class="my-3 my-lg-5">
        {!! trans('words.amissfs_rom-kurier') !!}
    </div>
    <div class="d-flex justify-content-center align-items-center flex-column">
        <div class="grey-box-bulletin d-flex justify-content-center align-items-center flex-column">
            <div class="p-3 text-center text-white suisse-italic-20">LE BULLETIN DES AMIS DE SAINT FRANÇOIS DE SALES</div>
            <a href="{{ route('le-bulletin-download', ['number' => $latestRecord->number]) }}" class="bg-white suisse-regular-18 width-201 height-38 text-dark d-flex justify-content-center align-items-center text-decoration-none">TÉLÉCHARGER</a>
        </div>
        <div class="red-box-bulletin d-flex justify-content-center align-items-center flex-column">
            <div class="p-3 mb-3 text-center text-white suisse-italic-20">DER ROM-KURIER</div>
            <a href="{{ route('rom-kurier-download',['number' => $latestRecord->number]) }}" class="bg-white suisse-regular-18 width-201 height-38 text-dark d-flex justify-content-center align-items-center text-decoration-none">UNTERLADEN</a>
        </div>
        <a href="{{ route('le-bulletin-commander') }}" class="mt-5 text-white red-box width-201 height-36 suisse-regular-18 d-flex justify-content-center align-items-center text-decoration-none">S’ABONNER</a>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@elseif($page == 3)
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
        <a href="{{ route('association-page')}}" class="my-3">
            <img src="{{ asset('/img/amissfs/responsive/association-back.png') }}" class="" alt="logo" />
        </a>
    </div>
    <div class="d-flex flex-column align-items-center">
        <div class="mt-5 rom-kurier-title-cloister">DER ROM-KURIER</div>
        <img src="{{ asset('/img/amissfs/si-si-no-no.png') }}" class="my-3 my-lg-5" alt="logo" />
    </div>
    <div class="my-5 text-start">
        {!! trans('words.amissfs_rom-kurier') !!}
    </div>
    <div class="d-flex justify-content-center align-items-center flex-column">
        <div class="grey-box-bulletin d-flex justify-content-center align-items-center flex-column">
            <div class="p-3 text-center text-white suisse-italic-20">LE BULLETIN DES AMIS DE SAINT FRANÇOIS DE SALES</div>
            <a href="{{ route('le-bulletin-download', ['number' => $latestRecord->number]) }}" class="bg-white suisse-regular-18 width-201 height-38 text-dark d-flex justify-content-center align-items-center text-decoration-none">TÉLÉCHARGER</a>
        </div>
        <div class="red-box-bulletin d-flex justify-content-center align-items-center flex-column">
            <div class="p-3 mb-3 text-center text-white suisse-italic-20">DER ROM-KURIER</div>
            <a href="{{ route('rom-kurier-download',['number' => $latestRecord->number]) }}" class="bg-white suisse-regular-18 width-201 height-38 text-dark d-flex justify-content-center align-items-center text-decoration-none">UNTERLADEN</a>
        </div>
        <a href="{{ route('rom-kurier-commander') }}" class="mt-5 text-white red-box width-201 height-36 suisse-regular-18 lh-base d-flex justify-content-center align-items-center text-decoration-none">S’ABONNER</a>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@elseif($page == 4)
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="position-relative">
    <img src="{{ asset('/img/amissfs/amissfs-under-construction.png') }}" class="w-100" alt="logo" />
    <div class="amissfs-construction absolute-center d-flex justify-content-center align-items-center">EN CONSTRUCTION</div>
</div>
@elseif($page == 5)
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="text-center d-flex flex-column align-items-center">
        <img src="{{ asset('/img/amissfs/amissfs-logo-page.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <div class="mt-3 sang-blue-30 text-dark text-uppercase d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">DONS</div>
        <div class="black-line-amissfs d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    </div>
    <div class="my-5 text-start">
        {!! trans('words.amissfs_dons') !!}
    </div>
    <div class="dons-red-button d-flex justify-content-center align-items-center">
        <a href="{{ route('amissfs-contact') }}" class="dons-red-button-content">NOUS CONTACTER</a>
    </div>
</div>
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="black-bg-full d-flex align-items-center">
    <marquee behavior="scroll" direction="right" scrollamount="12" class="text-white sang-blue-regular-20">PROTECTION DES DONNÉES / DATENSCHUTZE</marquee>
</div>
@endif
@endsection


@section('scripts')
@if($page == 0)
<script>
    $('.navbar-submenu-ammisfs').addClass('change-color');
    $('.black-border').addClass('change-color-border');
</script>
@endif
@endsection