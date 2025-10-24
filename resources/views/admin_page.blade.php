<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Civitas</title>
    <meta name="robots" content="noindex">
    <meta property="og:locale" content="en_GB" />
    <meta name="mobile-web-app-capable" content="yes" />
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/civitas.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome/fontawesome-all.css') }}">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light h-100">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('img/home/civitas_logo.svg') }}" alt="Logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link admin-zone-name" href="{{ route('home') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link admin-zone-name"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></i>Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="space-50"></div>
    <div class="container">
        <div class="container mt-5">
            <form action="{{ route('updatePassword') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="box_general padding_bottom p-3 shadow-sm border rounded mx-auto" style="max-width: 600px;">
                    <div class="modal-title mb-3">
                        <i class="fa-solid fa-user me-2"></i>Account Settings
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="current_password" class="form-label">Full Name</label>
                                <input id="full_name" class="form-control" value="{{ Auth::user()->name }}" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="current_password" class="form-label">Old Password</label>
                                <input id="current_password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" type="password" placeholder="Enter your old password">
                                @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input id="new_password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" type="password" placeholder="Enter a new password">
                                @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="new_confirm_password" class="form-label">Confirm New Password</label>
                                <input id="new_confirm_password" class="form-control @error('new_confirm_password') is-invalid @enderror" name="new_confirm_password" type="password" placeholder="Re-enter your new password">
                                @error('new_confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <a href="{{ url('/') }}" class="btn btn-secondary btn-sm">
                                <i class="fa-solid fa-arrow-left"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fa-solid fa-save"></i> Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="space-50"></div>
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small class="admin-zone-name">© Developed By <a href="https://thebrainpixels.com/">The Brain Pixels</a> 2024</small>
            </div>
        </div>
    </footer>


    <script src="{{ asset('js/jQuery/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>



</html>