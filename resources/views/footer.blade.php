@extends('civitas.app')

@section('logo')
<div class="navbar-brand d-flex justify-content-center align-items-center flex-column">
    <a href="{{ route('civitas.home') }}" class="logo-absolute text-decoration-none">
        <img src="{{ asset('img/logo/logo_civitas.svg') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/logo/responsive/civitas-logo-responsive.svg') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </a>
</div>
@endsection

@section('content')
<div class="space-100 d-none d-sm-none d-md-none d-xl-block d-xxl-block"></div>
@if($page == 0)
<!----------------------------IMPESSUM-------------------------------------------->
<div class="d-flex flex-column align-items-center text-center">
    <img src="{{ asset('img/home/footer-page-logo.svg') }}" class="d-none d-sm-none d-md-none d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/home/footer-page-logo-responsive.png') }}" class="d-block d-sm-block d-md-block d-xl-none d-xxl-none" alt="logo" />
    <div class="footer-page-title mt-5">IMPESSUM</div>
    <div class="black-line-footer-page"></div>
</div>
<div class="space-100"></div>
<div class="container">
    {!! trans('words.impressum') !!}
</div>
@elseif($page == 1)
<!----------------------------PROTECTION DATA-------------------------------------------->
<div class="container my-5">
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/home/legal-logo.png') }}" class="logo" alt="logo" />
            <div class="ms-3 legal-title">PROTECTION DES DONNÉES</div>
        </div>
    </div>
    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
        <div class="d-flex flex-column align-items-center text-center my-5">
            <img src="{{ asset('img/home/footer-page-logo-responsive.png') }}" class="" alt="logo" />
            <div class="footer-page-title mt-5">PROTECTION DES DONNÉES</div>
            <div class="black-line-footer-page"></div>
        </div>
    </div>
</div>
<div>
    {!! trans('words.data-protection') !!}
</div>
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <a href="javascript:void(0)" class="scroll-top"><img src="{{ asset('img/home/top-arrow.png') }}" alt="logo" /></a>
        <a href="javascript:void(0);"><img src="{{ asset('img/home/legal-bottom.png') }}" class="" alt="logo" />
    </div>
</div>
@elseif($page == 2)
<!----------------------------CONTACT-------------------------------------------->
<div class="d-flex flex-column align-items-center text-center my-5">
    <img src="{{ asset('img/home/footer-page-logo.svg') }}" class="d-none d-sm-none d-md-none d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/home/footer-page-logo-responsive.png') }}" class="d-block d-sm-block d-md-block d-xl-none d-xxl-none" alt="logo" />
    <div class="footer-page-title mt-5">CONTACT</div>
    <div class="black-line-footer-page"></div>
</div>
<div class="space-100"></div>
<div class="container custom-tweak">
    {!! trans('words.contact', [
    'followUrl' => route('civitas.social'),
    'newsletterUrl' => route('civitas.newsletter'),
    ]) !!}

</div>
@elseif($page == 3)
<!----------------------------CGU-------------------------------------------->
<div class="d-flex flex-column align-items-center text-center my-5">
    <img src="{{ asset('img/home/footer-page-logo.svg') }}" class="d-none d-sm-none d-md-none d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/home/footer-page-logo-responsive.png') }}" class="d-block d-sm-block d-md-block d-xl-none d-xxl-none" alt="logo" />
    <div class="footer-page-title mt-5">CONDITIONS GÉNÉRALES</div>
    <div class="black-line-footer-page"></div>
</div>
<div class="space-100"></div>
<div class="container">
    {!! trans('words.cgu') !!}
</div>
@endif
<div class="black-bg-full d-flex align-items-center mt-5">
    <marquee behavior="scroll" direction="right" scrollamount="12" class="sang-blue-regular-20 text-white">PROTECTION DES DONNÉES / DATENSCHUTZE</marquee>
</div>
@endsection


@section('scripts')
<script>
    $(document).on('click', '.scroll-top', function(event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 'slow');
    });
</script>
@endsection