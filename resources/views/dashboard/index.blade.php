@extends('layouts.dashboard')

@section('title', 'Tableau de bord')

@section('content')
    <div class="row g-4">
        <div class="col-12">
            <div class="card dashboard-card">
                <div class="card-body">
                    <h2 class="h5 mb-1">Bienvenue, {{ $admin->name }}</h2>
                    <p class="text-muted mb-0">Ceci est la coquille du tableau de bord. Les fonctionnalités (Paramètres, Gestion des pages) seront ajoutées ici.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
