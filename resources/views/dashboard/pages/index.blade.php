@extends('layouts.dashboard')

@section('title', 'Pages')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <strong>Veuillez corriger les erreurs suivantes :</strong>
            <ul class="mb-0 mt-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
    @endif

    <div class="card dashboard-card">
        <div class="card-header bg-white border-0 pt-4 px-4 d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div>
                <h2 class="h5 mb-1"><i class="fas fa-file-alt me-2 text-primary"></i>Gestion des pages</h2>
                <p class="text-muted small mb-0">Créez, modifiez et organisez le contenu des sections.</p>
            </div>
            <a href="{{ route('dashboard.pages.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i>Nouvelle page
            </a>
        </div>

        <div class="card-body p-4">
            {{-- Filters --}}
            <form method="GET" action="{{ route('dashboard.pages.index') }}" class="row g-3 mb-4">
                <div class="col-md-3">
                    <label for="filter-section" class="form-label small text-muted">Section</label>
                    <select id="filter-section" name="section_id" class="form-select">
                        <option value="">Toutes les sections</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}" {{ (int) ($filters['section_id'] ?? 0) === $section->id ? 'selected' : '' }}>
                                {{ $section->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="filter-type" class="form-label small text-muted">Type de contenu</label>
                    <select id="filter-type" name="type" class="form-select">
                        <option value="">Tous les types</option>
                        @foreach (config('pages.types', []) as $slug => $definition)
                            <option value="{{ $slug }}" {{ ($filters['type'] ?? '') === $slug ? 'selected' : '' }}>
                                {{ $definition['label'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="filter-active" class="form-label small text-muted">Statut</label>
                    <select id="filter-active" name="active" class="form-select">
                        <option value="">Tous</option>
                        <option value="1" {{ ($filters['active'] ?? '') === '1' ? 'selected' : '' }}>Actives</option>
                        <option value="0" {{ ($filters['active'] ?? '') === '0' ? 'selected' : '' }}>Inactives</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="filter-search" class="form-label small text-muted">Recherche</label>
                    <div class="input-group">
                        <input type="text" id="filter-search" name="search" class="form-control"
                            value="{{ $filters['search'] ?? '' }}" placeholder="Titre, URL, identifiant…">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <a href="{{ route('dashboard.pages.index') }}" class="btn btn-outline-secondary" title="Réinitialiser">
                        <i class="fas fa-undo"></i>
                    </a>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="text-center" style="width: 100px;">Ordre</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Section</th>
                            <th scope="col">Type</th>
                            <th scope="col" class="text-center">Statut</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pages as $page)
                            <tr>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <button type="button"
                                            class="btn btn-outline-secondary reorder-btn"
                                            data-url="{{ route('dashboard.pages.reorder', $page) }}"
                                            data-direction="up"
                                            title="Monter"
                                            {{ $loop->first ? 'disabled' : '' }}>
                                            <i class="fas fa-chevron-up"></i>
                                        </button>
                                        <button type="button"
                                            class="btn btn-outline-secondary reorder-btn"
                                            data-url="{{ route('dashboard.pages.reorder', $page) }}"
                                            data-direction="down"
                                            title="Descendre"
                                            {{ $loop->last ? 'disabled' : '' }}>
                                            <i class="fas fa-chevron-down"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.pages.edit', $page) }}" class="text-decoration-none">
                                        <span class="fw-semibold">{{ $page->title ?: '(sans titre)' }}</span>
                                    </a>
                                    <span class="text-muted small d-block">{{ $page->page_identifier }}</span>
                                    @if ($page->url)
                                        <span class="badge bg-light text-muted border mt-1">{{ $page->url }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($page->section)
                                        <span class="badge bg-primary text-white border">{{ $page->section->title }}</span>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td>
                                    @php $typeInfo = $sectionTypes[$page->section_id] ?? null; @endphp
                                    @if ($typeInfo)
                                        <span class="badge bg-primary text-white border">
                                            <i class="fas {{ $typeInfo['icon'] }} me-1"></i>{{ $typeInfo['label'] }}
                                        </span>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="form-check form-switch d-inline-block m-0">
                                        <input type="checkbox" class="form-check-input toggle-active"
                                            id="toggle-page-{{ $page->id }}"
                                            data-url="{{ route('dashboard.pages.toggle', $page) }}"
                                            {{ $page->is_active ? 'checked' : '' }}>
                                        <label class="form-check-label small" for="toggle-page-{{ $page->id }}">
                                            {{ $page->is_active ? 'Active' : 'Inactive' }}
                                        </label>
                                    </div>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('dashboard.pages.edit', $page) }}" class="btn btn-sm btn-outline-primary" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('dashboard.pages.destroy', $page) }}"
                                        class="d-inline delete-form"
                                        data-confirm="Supprimer la page « {{ $page->title ?: $page->page_identifier }} » ?">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Supprimer">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-5">
                                    <i class="fas fa-inbox fa-2x d-block mb-2"></i>
                                    Aucune page ne correspond à votre recherche.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4 d-flex justify-content-center">
                {{ $pages->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.toggle-active').forEach(function (input) {
            input.addEventListener('change', function () {
                var url = input.getAttribute('data-url');
                fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                    },
                }).then(function (response) { return response.json(); }).then(function (data) {
                    var label = input.nextElementSibling;
                    if (label) {
                        label.textContent = data.active ? 'Active' : 'Inactive';
                    }
                    if (!data.success) {
                        input.checked = !input.checked;
                    }
                }).catch(function () {
                    input.checked = !input.checked;
                });
            });
        });

        document.querySelectorAll('.reorder-btn').forEach(function (button) {
            button.addEventListener('click', function () {
                if (button.disabled) return;
                var url = button.getAttribute('data-url');
                var direction = button.getAttribute('data-direction');
                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ direction: direction }),
                }).then(function (response) { return response.json(); }).then(function (data) {
                    if (data.success) {
                        window.location.reload();
                    }
                });
            });
        });

        document.querySelectorAll('.delete-form').forEach(function (form) {
            form.addEventListener('submit', function (event) {
                var message = form.getAttribute('data-confirm') || 'Confirmer la suppression ?';
                if (!window.confirm(message)) {
                    event.preventDefault();
                }
            });
        });
    });
</script>
@endpush
