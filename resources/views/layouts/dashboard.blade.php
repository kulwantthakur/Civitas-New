<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Tableau de bord')</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome/fontawesome-all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">

    @stack('styles')
</head>

<body>
    <div class="dashboard-wrapper">

        @include('dashboard.partials.sidebar', ['inOffcanvas' => false])

        <div class="dashboard-main">
            @include('dashboard.partials.header')

            <main class="dashboard-content">
                @yield('content')
            </main>
        </div>

        @include('dashboard.partials.sidebar', ['inOffcanvas' => true])
    </div>

    <script src="{{ asset('js/jQuery/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>

    @stack('scripts')
</body>

</html>
