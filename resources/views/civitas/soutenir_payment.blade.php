@extends('civitas.app')

@section('top-content')
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="grey-mobile-height">
        <div class="civitas-grey-menu d-flex align-items-center justify-content-between justify-content-md-evenly p-3">
            <a href="{{ route('political-programs') }}" class="civitas-responsive-header-grey">{!! __('words.nav_positions') !!}</a>
            <a href="{{ route('civitas.party') }}" class="civitas-responsive-header-grey">{!! __('words.nav_movement') !!}</a>
            <a href="{{ route('civitas.news') }}" class="civitas-responsive-header-grey">{!! __('words.nav_news') !!}</a>
        </div>
    </div>
</div>
@endsection
@section('logo')
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('civitas.home') }}" class="logo-absolute text-decoration-none">
        <img src="{{ asset('img/logo/logo_civitas.svg') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/logo/responsive/civitas-logo-responsive.svg') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </a>
</div>
@endsection

@section('content')
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@if($page == 0)
<div class="container">
    <div class="d-flex flex-column align-items-center text-center">
        <img src="{{ asset('/img/civitas/civitas_logo_pages.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('/img/civitas/responsive/civitas_logo_pages.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        <div class="civitas-title-page mt-3">{!! __('words.payment_cash_deposit') !!}</div>
        <div class="black-line-civitas"></div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    {!! trans('words.civitas_payment_cash') !!}
</div>
<div class="payment-grey-bg my-5">
    <div class="container py-3">
        {!! trans('words.civitas_payment_cash_content') !!}
    </div>
</div>
<div class="container">
    {!! trans('words.civitas_payment_ebanking_content_last') !!}
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="d-flex justify-content-end">
    <img src="{{ asset('img/civitas/soutenir-payment.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/civitas/responsive/soutenir-payment.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
</div>
@elseif($page == 2)
<div class="container">
    <div class="d-flex flex-column align-items-center text-center">
        <img src="{{ asset('/img/civitas/civitas_logo_pages.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('/img/civitas/responsive/civitas_logo_pages.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        <div class="civitas-title-page mt-3">{!! __('words.payment_crypto_donations') !!}</div>
        <div class="black-line-civitas"></div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    {!! trans('words.civitas_payment_crypto_title') !!}
</div>
<div class="payment-grey-bg my-3 my-sm-3 my-md-3 my-lg-5 my-xl-5 my-xxl-5">
    <div class="container py-3">
        {!! trans('words.civitas_payment_crypto') !!}
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container mt-4 mb-5">
        <a href="mailto:tresorier@civitassuisse.ch" class="soutenir-payment-title-blue">tresorier@civitassuisse.ch</a>
    </div>
</div>
<div class="container">
    {!! trans('words.civitas_payment_ebanking_content_last') !!}
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="d-flex justify-content-end">
    <img src="{{ asset('img/civitas/soutenir-payment.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/civitas/responsive/soutenir-payment.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
</div>
@elseif($page == 3)
<div class="container">
    <div class="d-flex flex-column align-items-center text-center">
        <img src="{{ asset('/img/civitas/civitas_logo_pages.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('/img/civitas/responsive/civitas_logo_pages.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        <div class="civitas-title-page mt-3">{!! __('words.payment_bank_transfer') !!}</div>
        <div class="black-line-civitas"></div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    {!! trans('words.civitas_payment_receipt') !!}
</div>
<div class="payment-grey-bg my-5">
    <div class="container py-3">
        {!! trans('words.civitas_payment_ebanking_content') !!}
    </div>
</div>
<div class="container">
    {!! trans('words.civitas_payment_ebanking_content_last') !!}
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="d-flex justify-content-end">
    <img src="{{ asset('img/civitas/soutenir-payment.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/civitas/responsive/soutenir-payment.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
</div>
@elseif($page == 4)
<div class="container">
    <div class="d-flex flex-column align-items-center text-center">
        <img src="{{ asset('/img/civitas/civitas_logo_pages.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('/img/civitas/responsive/civitas_logo_pages.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        <div class="civitas-title-page mt-3">{!! __('words.payment_no_fees_donations') !!}</div>
        <div class="black-line-civitas"></div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    {!! trans('words.civitas_bulletin_receipt') !!}
</div>
<div class="my-5">
    <div class="container text-center">
        <div class="bulletin-image-wrapper" style="cursor: pointer;">
            <a href="{{ asset('pdf/bulletin_versement_civitas.pdf') }}" download="bulletin_versement_civitas.pdf" class="text-decoration-none">
                <img src="{{ asset('img/civitas/bulletin-versement.png') }}" 
                     alt="Bulletin de versement" 
                     class="img-fluid bulletin-receipt-image" 
                     style="max-width: 600px; border: 2px solid #ddd; box-shadow: 0 4px 8px rgba(0,0,0,0.1); transition: transform 0.2s;"
                     onmouseover="this.style.transform='scale(1.02)'" 
                     onmouseout="this.style.transform='scale(1)'">
                <div class="mt-3">
                    <span class="btn btn-primary">
                        <i class="fas fa-download"></i> {!! __('words.download_bulletin') !!}
                    </span>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="container">
    {!! trans('words.civitas_payment_ebanking_content_last') !!}
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="d-flex justify-content-end">
    <img src="{{ asset('img/civitas/soutenir-payment.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/civitas/responsive/soutenir-payment.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
</div>
@endif
@endsection