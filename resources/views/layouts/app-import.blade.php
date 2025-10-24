<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Laravel')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 10px;
        }
        .card-header {
            border-radius: 10px 10px 0 0 !important;
        }
        .btn {
            border-radius: 6px;
        }
        .form-control, .form-select {
            border-radius: 6px;
        }
        #commandOutput {
            font-family: 'Courier New', monospace;
            font-size: 0.875rem;
            line-height: 1.4;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        .spinner-border {
            width: 3rem;
            height: 3rem;
        }
        .alert {
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fas fa-cogs me-2"></i>Admin Panel
                </a>
                
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        @php
                            $isPages = request()->routeIs('admin.import.pages');
                            $route   = $isPages ? 'admin.import.pages' : 'admin.import.podcasts';
                            $label   = $isPages ? 'Import Pages' : 'Import Podcasts';
                        @endphp
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route($route) }}">
                                <i class="fas fa-file-import me-1"></i> {{ $label }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
</body>
</html>