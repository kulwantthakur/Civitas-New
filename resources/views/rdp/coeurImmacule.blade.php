@extends('rdp.app')

@section('logo')
<div class="navbar-brand d-flex justify-content-center align-items-center rdp-banner-header">
    <a href="{{ route('rdp.home') }}" class=" rdp-logo-outer white-background">
        <img src="{{ asset('img/logo/historique.svg') }}" class=" d-lg-block d-xl-block d-xxl-block" alt="logo" />
    </a>
</div>
@endsection

@section('content')
<div class="rdp-banner">
    <img src="{{ asset('img/rdp/rdp-banner.png') }}" class="w-100" alt="Banner" />
</div>
<div class="rdp-page-cls">
    {!! __('words.immacule-content', [
    'historique' => route('historique'),
    'home' => route('home'),
    'lesecret' => route('lesecret'),
    'comment_lerosaire' => route('comment-lerosaire'),
    'lescapulaire' => route('lescapulaire'),
    'lersamedis' => route('lersamedis'),
    'wikipedia' => 'https://fr.wikipedia.org/wiki/Forum_%C3%A9conomique_mondial',
    'nostra' => 'https://www.vatican.va/archive/hist_councils/ii_vatican_council/documents/vat-ii_decl_19651028_nostra-aetate_fr.html',

    'logo_coeur' => asset('img/rdp/Logo_COeur_.png'),
    'img_nangis' => asset('img/rdp/Nangis_Saint-Martin_Catherine_Labouré.png'),
    'img_tuy' => asset('img/rdp/Theophanie-Tuy-.png'),
    'img_video' => 'https://www.youtube.com/embed/tk2qTUtKWRQ?si=pGhg7v1hvUKpjTv5',
    ]) !!}
</div>
@endsection