@extends('layouts.dashboard')

@section('title', 'Sections')

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
                <h2 class="h5 mb-1"><i class="fas fa-th-large me-2 text-primary"></i>Gestion des sections</h2>
                <p class="text-muted small mb-0">Créez, modifiez et réorganisez les sections du site.</p>
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSectionModal">
                <i class="fas fa-plus me-1"></i>Nouvelle section
            </button>
        </div>

        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="text-center" style="width: 110px;">Ordre</th>
                            <th scope="col">Titre</th>
                            <th scope="col" class="text-center">Pages</th>
                            <th scope="col" class="text-center">Statut</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sections as $section)
                            <tr id="section-row-{{ $section->id }}">
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <button type="button"
                                            class="btn btn-outline-secondary reorder-btn"
                                            data-url="{{ route('dashboard.sections.reorder', $section) }}"
                                            data-direction="up"
                                            title="Monter"
                                            {{ $loop->first ? 'disabled' : '' }}>
                                            <i class="fas fa-chevron-up"></i>
                                        </button>
                                        <button type="button"
                                            class="btn btn-outline-secondary reorder-btn"
                                            data-url="{{ route('dashboard.sections.reorder', $section) }}"
                                            data-direction="down"
                                            title="Descendre"
                                            {{ $loop->last ? 'disabled' : '' }}>
                                            <i class="fas fa-chevron-down"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-semibold">{{ $section->title }}</span>
                                    <span class="text-muted small d-block">#{{ $section->id }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-light text-dark border">{{ $section->pages_count }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="form-check form-switch d-inline-block m-0">
                                        <input type="checkbox" class="form-check-input toggle-active"
                                            id="toggle-section-{{ $section->id }}"
                                            data-url="{{ route('dashboard.sections.toggle', $section) }}"
                                            {{ $section->is_active ? 'checked' : '' }}>
                                        <label class="form-check-label small" for="toggle-section-{{ $section->id }}">
                                            {{ $section->is_active ? 'Active' : 'Inactive' }}
                                        </label>
                                    </div>
                                </td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-sm btn-outline-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editSectionModal"
                                        data-edit-id="{{ $section->id }}"
                                        data-edit-title="{{ $section->title }}"
                                        data-edit-active="{{ $section->is_active ? 1 : 0 }}"
                                        title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form method="POST" action="{{ route('dashboard.sections.destroy', $section) }}"
                                        class="d-inline delete-form" data-confirm="Supprimer la section « {{ $section->title }} » ?">
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
                                <td colspan="5" class="text-center text-muted py-5">
                                    <i class="fas fa-inbox fa-2x d-block mb-2"></i>
                                    Aucune section pour le moment.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Create modal --}}
    <div class="modal fade" id="createSectionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('dashboard.sections.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Nouvelle section</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="create-title" class="form-label">Titre <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                <input type="text" id="create-title" name="title" class="form-control"
                                    value="{{ old('title') }}" required maxlength="50"
                                    placeholder="ex. actualites">
                            </div>
                            <div class="form-text">
                                Le titre est utilisé pour associer la section aux URL du site.
                            </div>
                        </div>
                        <div class="form-check form-switch">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" class="form-check-input" id="create-active" name="is_active" value="1" checked>
                            <label class="form-check-label" for="create-active">Section active</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit modal --}}
    <div class="modal fade" id="editSectionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="editSectionForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Modifier la section</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit-title" class="form-label">Titre <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                <input type="text" id="edit-title" name="title" class="form-control" required maxlength="50">
                            </div>
                        </div>
                        <div class="form-check form-switch">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" class="form-check-input" id="edit-active" name="is_active" value="1">
                            <label class="form-check-label" for="edit-active">Section active</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editModal = document.getElementById('editSectionModal');
        if (editModal) {
            editModal.addEventListener('show.bs.modal', function (event) {
                var trigger = event.relatedTarget;
                var id = trigger.getAttribute('data-edit-id');
                var title = trigger.getAttribute('data-edit-title');
                var active = trigger.getAttribute('data-edit-active') === '1';

                editModal.querySelector('#editSectionForm').setAttribute('action', '/dashboard/sections/' + id);
                editModal.querySelector('#edit-title').value = title;
                editModal.querySelector('#edit-active').checked = active;
            });
        }

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
