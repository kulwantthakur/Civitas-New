@extends('layouts.dashboard')

@section('title', 'Modifier la page')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h5 mb-0"><i class="fas fa-file-alt me-2 text-primary"></i>Modifier la page</h2>
            <span class="text-muted small">{{ $page->page_identifier }}</span>
        </div>
        <a href="{{ route('dashboard.pages.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i>Retour à la liste
        </a>
    </div>

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
        <div class="card-body p-4">
            <form method="POST" action="{{ route('dashboard.pages.update', $page) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('dashboard.pages._form', ['page' => $page, 'type' => $type])
                <hr class="my-4">
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('dashboard.pages.index') }}" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-2"></i>Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
