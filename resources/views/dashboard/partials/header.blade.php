<header class="dashboard-topbar">
    <div class="d-flex align-items-center justify-content-between">

        <button class="btn btn-outline-secondary d-md-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas" aria-label="Basculer la navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="dashboard-topbar-title d-none d-md-block">
            <h1 class="h5 mb-0">@yield('title', 'Tableau de bord')</h1>
        </div>

        <div class="dropdown" id="adminDropdown">
            <button class="btn d-flex align-items-center gap-2 dropdown-toggle" type="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <span class="dashboard-avatar"><i class="fas fa-user"></i></span>
                <span class="d-none d-sm-inline">{{ Auth::user()->name }}</span>
            </button>

            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt me-2"></i>Déconnexion</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var dropdown = document.getElementById('adminDropdown');
        if (!dropdown) return;

        var toggle = dropdown.querySelector('[data-bs-toggle="dropdown"]');
        var instance = bootstrap.Dropdown.getOrCreateInstance(toggle);

        dropdown.addEventListener('mouseenter', function () {
            instance.show();
        });
        dropdown.addEventListener('mouseleave', function () {
            instance.hide();
        });
    });
</script>
@endpush
