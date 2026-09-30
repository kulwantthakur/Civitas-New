@php
    $navLinks = [
        [
            'label' => 'Tableau de bord',
            'icon' => 'fa-tachometer-alt',
            'href' => route('dashboard.index'),
            'active' => request()->routeIs('dashboard.index'),
        ],
        [
            'label' => 'Paramètres',
            'icon' => 'fa-cog',
            'href' => route('dashboard.settings.edit'),
            'active' => request()->routeIs('dashboard.settings.*'),
        ],
        [
            'label' => 'Gestion des pages',
            'icon' => 'fa-file-alt',
            'href' => route('dashboard.pages.index'),
            'active' => request()->routeIs('dashboard.pages.*'),
        ],
        [
            'label' => 'Gestion des sections',
            'icon' => 'fa-th-large',
            'href' => route('dashboard.sections.index'),
            'active' => request()->routeIs('dashboard.sections.*'),
        ],
    ];
@endphp

@if ($inOffcanvas)
    <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="sidebarOffcanvas"
        aria-labelledby="sidebarOffcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarOffcanvasLabel">Panneau d'administration</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Fermer"></button>
        </div>
        <div class="offcanvas-body p-0">
            <nav class="dashboard-nav">
                <ul class="nav flex-column">
                    @foreach ($navLinks as $link)
                        <li class="nav-item">
                            <a class="nav-link {{ $link['active'] ? 'active' : '' }}" href="{{ $link['href'] }}">
                                <i class="fas {{ $link['icon'] }}"></i>
                                <span>{{ $link['label'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
@else
    <aside class="dashboard-sidebar">
        <div class="dashboard-sidebar-brand">
            <a href="{{ route('dashboard.index') }}">
                <img src="{{ asset('img/home/civitas_logo.svg') }}" width="45" height="45" alt="Logo du panneau d'administration" class="dashboard-logo">
                <span>Panneau d'administration</span>
            </a>
        </div>
        <nav class="dashboard-nav">
            <ul class="nav flex-column">
                @foreach ($navLinks as $link)
                    <li class="nav-item">
                        <a class="nav-link {{ $link['active'] ? 'active' : '' }}" href="{{ $link['href'] }}">
                            <i class="fas {{ $link['icon'] }}"></i>
                            <span>{{ $link['label'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </aside>
@endif
