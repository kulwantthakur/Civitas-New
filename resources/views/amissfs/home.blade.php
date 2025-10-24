@extends('amissfs.app')


@section('amissfs-home')
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="position-relative">
        <div class="position-top-img end-0">
            <img src="{{ asset('/img/amissfs/amissfs-home-1.png') }}" class="amissfs-home-image" alt="logo" />
            <div class="amissfs-black-op ms-4">
                <div class="amissfs-home-new-subtitle mb-5">Les Amis de Saint François de Sales<br>et de Notre Dame de Fatima</div>
                <div class="amissfs-home-sec-subtitle">Une association de laïques qui œuvrent dans le prolongement de l’apostolat<br>sacerdotal.</div>
            </div>
            <div class="position-absolute left-img" style="left: -25%; bottom: 2rem;">
                <img src="{{ asset('/img/amissfs/amissfs-home-2.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
                <div class="position-absolute amissfs-depuis">
                    <div class="amissfs-home-depuis">Depuis 1988.</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="position-relative">
        <div class="position-top-img">
            <img src="{{ asset('/img/amissfs/responsive/amissfs-home.png') }}" class="w-100 amissfs-home-specific-height" alt="logo">
            <div class="position-absolute amissfs-depuis">
                <div class="amissfs-home-depuis">Depuis 1988.</div>
            </div>
            <div class="amissfs-black-op">
                <div class="d-flex justify-content-center align-items-center flex-row">
                        <img src="{{ asset('/img/amissfs/responsive/HEADER.png') }}" class="h-100 me-4" alt="logo" />
                    <div>
                        <div class="amissfs-home-new-subtitle mb-2">Les Amis de Saint François de Sales<br>et de Notre Dame de Fatima</div>
                        <div class="amissfs-home-sec-subtitle">Une association de laïques qui œuvrent dans le<br>prolongement de l’apostolat sacerdotal.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('logo')
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('amissfs.home') }}" class="text-decoration-none">
        <div class="amissfs-logo-title">AMISSFS</div>
    </a>
</div>
@endsection

@section('content')
<style>
.navbar-submenu-ammisfs {
    color: #ffffff;
    mix-blend-mode: difference;
}
.hide-on-accueil-home {
    mix-blend-mode: color;
}

    </style>
<div class="amissfs-img-height"></div>
<div class="container">
    <div class="d-flex justify-content-center align-items-center flex-column flex-md-row">
        <div class="grey-box-amissfs-home d-flex justify-content-center align-items-center flex-column">
            <div class="grey-box-amissfs-home-content">LE BULLETIN DES AMIS DE SAINT FRANÇOIS DE SALES</div>
            <a href="{{ route('bulletin') }}" class="mt-3 amissfs-home-first-button d-flex justify-content-center align-items-center">CONSULTER</a>
        </div>
        <div class="mx-0 mx-lg-5"></div>
        <div class="red-box-amissfs-home d-flex justify-content-center align-items-center flex-column">
            <div class="mb-3 grey-box-amissfs-home-content">DER ROM-KURIER</div>
            <a href="{{ route('rom-kurier') }}" class="mt-3 amissfs-home-first-button d-flex justify-content-center align-items-center">LESEN</a>
        </div>
    </div>
</div>
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
            <div class="d-flex justify-content-center justify-content-lg-end align-items-center">
                <div class="position-relative w-100-tab">
                    <img src="{{ asset('/img/amissfs/amissfs-home-left.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
                    <img src="{{ asset('/img/amissfs/responsive/amissfs-home-left.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none w-100" alt="logo" />
                    <a href="{{ route('editions') }}">
                        <div class="white-box-amissfs-home position-absolute d-flex justify-content-center flex-column">
                            <div class="d-flex justify-content-center align-items-end flex-column me-4 me-sm-4 me-md-4 me-lg-5 me-xl-5 me-xxl-5">
                                <div class="amissfs-home-left-title">LES ÉDITIONS</div>
                                <div class="amissfs-home-left-subtitle grey-color-op">VOIR</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
            <div class="mt-5 d-flex justify-content-center justify-content-lg-start align-items-center mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0">
                <div class="position-relative w-100-tab">
                    <img src="{{ asset('/img/amissfs/amissfs-home-right.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
                    <img src="{{ asset('/img/amissfs/responsive/amissfs-home-right.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none w-100" alt="logo" />
                    <a href="{{ route('bookStore') }}">
                        <div class="white-box-amissfs-home-2 position-absolute d-flex justify-content-center flex-column">
                            <div class="d-flex justify-content-center align-items-end flex-column me-4 me-sm-4 me-md-4 me-lg-5 me-xl-5 me-xxl-5">
                                <div class="amissfs-home-left-title">LA LIBRAIRIE</div>
                                <div class="amissfs-home-left-subtitle grey-color-op">COMMANDER</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="d-flex justify-content-center">
        <div class="grey-box-amissfs-home d-flex justify-content-center align-items-center flex-column">
            <div class="grey-box-amissfs-home-content">RECEVEZ LA NEWSLETTER DES AMIS<br>DE SAINT FRANÇOIS DE SALES</div>
            <a href="{{ route('amissfs-newsletter') }}" class="mt-3 amissfs-home-sec-button d-flex justify-content-center align-items-center">S’INSCRIRE</a>
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="position-relative">
        <img src="{{ asset('img/amissfs/amissfs-home-last.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"  alt="logo" />
        <div class="top-0 position-absolute start-50 translate-middle">
            <a href="{{ route('podcasts') }}" class="amissfs-podcast d-flex justify-content-center align-items-center">ACCÉDER AUX AUDIOS</a>
        </div>
        <div class="position-absolute top-100 start-50 translate-middle">
            <a href="{{ route('podcasts') }}" class="amissfs-voir d-flex justify-content-center align-items-center">VOIR PLUS</a>
        </div>
        <div class="absolute-center">
            <div class="amissfs-grid-home">
                <a href="{{ url('amissfs/podcasts/action-catholique') }}" class="p-3 d-flex justify-content-between green-light text-decoration-none amissfs-box-podcast">
                    <div class="amissfs-home-title-podcast">ACTION<br>CATHOLIQUE</div>
                    <div class=" d-flex justify-content-center align-items-center"><img src="{{ asset('/img/amissfs/icon1.png') }}" alt="logo" /></div>
                </a>
                <a href="{{ url('amissfs/podcasts/apparitions') }}" class="p-3 d-flex justify-content-between shade-pink text-decoration-none amissfs-box-podcast">
                    <div class="amissfs-home-title-podcast">APPARITIONS</div>
                    <div class=" d-flex justify-content-center align-items-center"><img src="{{ asset('/img/amissfs/icon2.png') }}" alt="logo" /></div>
                </a>
                <a href="{{ url('amissfs/podcasts/autorité-religieuse') }}" class="p-3 d-flex justify-content-between bright-shade-orange text-decoration-none amissfs-box-podcast">
                    <div class="amissfs-home-title-podcast ">AUTORITÉ<br>RELIGIEUSE</div>
                    <div class=" d-flex justify-content-center align-items-center"><img src="{{ asset('/img/amissfs/icon3.png') }}" alt="logo" /></div>
                </a>
                <a href="{{ url('amissfs/podcasts/bioéthique') }}" class="p-3 d-flex justify-content-between bright-shade-cyan text-decoration-none amissfs-box-podcast">
                    <div class="amissfs-home-title-podcast ">BIOÉTHIQUE</div>
                    <div class=" d-flex justify-content-center align-items-between"><img src="{{ asset('/img/amissfs/icon4.png') }}" alt="logo" /></div>
                </a>
                <a href="{{ url('amissfs/podcasts/carmel') }}" class="p-3 d-flex justify-content-between bright-insade-blue text-decoration-none amissfs-box-podcast">
                    <div class="amissfs-home-title-podcast">CARMEL</div>
                    <div class=" d-flex justify-content-center align-items-center"><img src="{{ asset('/img/amissfs/icon5.png') }}" alt="logo" /></div>
                </a>
                <a href="{{ url('amissfs/podcasts/civitas') }}" class="p-3 d-flex justify-content-between bright-bold-red text-decoration-none amissfs-box-podcast">
                    <div class="amissfs-home-title-podcast">CIVITAS</div>
                    <div class=" d-flex justify-content-center align-items-center"><img src="{{ asset('/img/amissfs/icon6.png') }}" alt="logo" /></div>
                </a>
                <a href="{{ url('amissfs/podcasts/crise-de-l’église') }}" class="px-3 d-flex justify-content-between neon-green text-decoration-none amissfs-box-podcast">
                    <div class="py-3 amissfs-home-title-podcast">CRISE DE<br>L’ÉGLISE</div>
                    <div class=" d-flex justify-content-center align-items-center"><img src="{{ asset('/img/amissfs/icon7.png') }}" alt="logo" /></div>
                </a>
                <a href="{{ url('amissfs/podcasts/culture') }}" class="p-3 d-flex justify-content-between bright-sky-blue text-decoration-none amissfs-box-podcast">
                    <div class="amissfs-home-title-podcast">CULTURE</div>
                    <div class=" d-flex justify-content-center align-items-center"><img src="{{ asset('/img/amissfs/icon8.png') }}" alt="logo" /></div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="position-relative">
        <div class="top-0 position-absolute start-50 translate-middle">
            <a href="{{ route('podcasts') }}" class="amissfs-podcast d-flex justify-content-center align-items-center">ACCÉDER AUX AUDIOS</a>
        </div>
        <div class="position-absolute top-100 start-50 translate-middle">
            <a href="{{ route('podcasts') }}" class="amissfs-voir d-flex justify-content-center align-items-center">VOIR PLUS</a>
        </div>
        <div class="amissfs-black-bg-home d-flex justify-content-center align-items-center">
            <div class="amissfs-grid-home">
                <a href="{{ url('amissfs/podcasts/action-catholique') }}" class="p-2 d-flex justify-content-between amissfs-podcast-boxes green-light text-decoration-none">
                    <div class="amissfs-home-title-podcast">ACTION<br>CATHOLIQUE</div>
                    <div class="d-flex justify-content-center align-items-center"><img src="{{ asset('/img/amissfs/icon1.png') }}" alt="logo" /></div>
                </a>
                <a href="{{ url('amissfs/podcasts/apparitions') }}" class="p-2 d-flex justify-content-between amissfs-podcast-boxes shade-pink text-decoration-none">
                    <div class="amissfs-home-title-podcast">APPARITIONS</div>
                    <div class=" d-flex justify-content-center align-items-center"><img src="{{ asset('/img/amissfs/icon2.png') }}" alt="logo" /></div>
                </a>
                <a href="{{ url('amissfs/podcasts/autorité-religieuse') }}" class="p-2 d-flex justify-content-between amissfs-podcast-boxes bright-shade-orange text-decoration-none">
                    <div class="amissfs-home-title-podcast">AUTORITÉ<br>RELIGIEUSE</div>
                    <div class=" d-flex justify-content-center align-items-center"><img src="{{ asset('/img/amissfs/icon3.png') }}" alt="logo" /></div>
                </a>
                <a href="{{ url('amissfs/podcasts/bioéthique') }}" class="p-2 d-flex justify-content-between amissfs-podcast-boxes bright-shade-cyan text-decoration-none">
                    <div class="amissfs-home-title-podcast">BIOÉTHIQUE</div>
                    <div class=" d-flex justify-content-center align-items-center"><img src="{{ asset('/img/amissfs/icon4.png') }}" alt="logo" /></div>
                </a>
                <a href="{{ url('amissfs/podcasts/carmel') }}" class="p-2 d-flex justify-content-between amissfs-podcast-boxes bright-insade-blue text-decoration-none">
                    <div class="amissfs-home-title-podcast">CARMEL</div>
                    <div class=" d-flex justify-content-center align-items-center"><img src="{{ asset('/img/amissfs/icon5.png') }}" alt="logo" /></div>
                </a>
                <a href="{{ url('amissfs/podcasts/civitas') }}" class="p-2 d-flex justify-content-between amissfs-podcast-boxes bright-bold-red text-decoration-none">
                    <div class="amissfs-home-title-podcast">CIVITAS</div>
                    <div class=" d-flex justify-content-center align-items-center"><img src="{{ asset('/img/amissfs/icon6.png') }}" alt="logo" /></div>
                </a>
                <a href="{{ url('amissfs/podcasts/crise-de-l’église') }}" class="d-flex justify-content-between amissfs-podcast-boxes neon-green text-decoration-none">
                    <div class="p-2 amissfs-home-title-podcast">CRISE DE<br>L’ÉGLISE</div>
                    <div class=" d-flex justify-content-center align-items-center"><img src="{{ asset('/img/amissfs/icon7.png') }}" alt="logo" /></div>
                </a>
                <a href="{{ url('amissfs/podcasts/culture') }}" class="p-2 d-flex justify-content-between amissfs-podcast-boxes bright-sky-blue text-decoration-none">
                    <div class="amissfs-home-title-podcast">CULTURE</div>
                    <div class=" d-flex justify-content-center align-items-center"><img src="{{ asset('/img/amissfs/icon8.png') }}" alt="logo" /></div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@endsection

@section('scripts')
<script>
    $('.navbar-submenu-ammisfs').addClass('change-color');
    $('.black-border').addClass('change-color-border');
</script>
@endsection