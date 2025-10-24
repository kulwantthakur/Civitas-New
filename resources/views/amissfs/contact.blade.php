@extends('amissfs.app')

@section('logo')
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('amissfs.home') }}" class="text-decoration-none">
        <img src="{{ asset('/img/logo/amissfs_logo_dark.svg') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('/img/amissfs/responsive/amissfs-logo.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </a>
</div>
@endsection

@section('content')
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="text-center d-flex flex-column align-items-center">
        <img src="{{ asset('/img/amissfs/amissfs-logo-page.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <div class="mt-3 amissfs-title-responsive">CONTACT</div>
        <div class="black-line-amissfs"></div>
    </div>
    <div class="my-5 text-start">
        {!! trans('words.amissfs_contact') !!}
    </div>
</div>
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="black-bg-full d-flex align-items-center">
    <marquee behavior="scroll" direction="right" scrollamount="12" class="text-white sang-blue-regular-20">PROTECTION DES DONNÉES / DATENSCHUTZE</marquee>
</div>
@endsection
