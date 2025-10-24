@extends('civitas.app')

@section('css')
<link href="{{ asset('css/errors.css') }}" rel="stylesheet">
@endsection

@section('logo')
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('civitas.home') }}">
        <img src="{{ asset('img/logo/logo_civitas.svg') }}" class="" alt="logo" />
    </a>
</div>
@endsection

@section('content')
<div class="space-200 d-none d-lg-block"></div>
<div class="space-100 d-block d-lg-none"></div>
<div class="container">
    <div class="d-flex justify-content-center align-items-center flex-column">
        {!! trans('words.error_401_page', [
        'image_url' => url('img/home/footer-logo.svg'),
        'contact_url' => route('footer.contact'),
        'home_url' => route('home'),
        ]) !!}
    </div>
</div>
<div class="space-200 d-none d-lg-block"></div>
<div class="space-50 d-block d-lg-none"></div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.top-menu').addClass('d-none');
        $('.submenu-logo').addClass('d-none');
        $('.top-menu-empty').addClass('d-none');
    });
</script>
@endsection