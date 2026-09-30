@extends('layouts.dashboard')

@section('title', 'Paramètres')

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

    <div class="row g-4">

        {{-- Informations du profil --}}
        <div class="col-lg-7">
            <div class="card dashboard-card h-100">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h2 class="h5 mb-1"><i class="fas fa-user-cog me-2 text-primary"></i>Informations du profil</h2>
                    <p class="text-muted small mb-0">Mettez à jour vos informations personnelles.</p>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('dashboard.settings.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nom <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" id="name" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $admin->name) }}" required>
                                </div>
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="firstname" class="form-label">Prénom <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user-pen"></i></span>
                                    <input type="text" id="firstname" name="firstname"
                                        class="form-control @error('firstname') is-invalid @enderror"
                                        value="{{ old('firstname', $admin->firstname) }}" required>
                                </div>
                                @error('firstname')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="lastname" class="form-label">Nom de famille <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    <input type="text" id="lastname" name="lastname"
                                        class="form-control @error('lastname') is-invalid @enderror"
                                        value="{{ old('lastname', $admin->lastname) }}" required>
                                </div>
                                @error('lastname')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" id="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', $admin->email) }}" required>
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <span class="form-label d-block">Genre <span class="text-danger">*</span></span>
                                <div class="btn-group w-100" role="group" aria-label="Genre">
                                    <input type="radio" class="btn-check" name="gender" id="genderMr" value="mr"
                                        {{ old('gender', $admin->gender) === 'mr' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-primary" for="genderMr">
                                        <i class="fas fa-mars me-1"></i>M.
                                    </label>
                                    <input type="radio" class="btn-check" name="gender" id="genderMrs" value="mrs"
                                        {{ old('gender', $admin->gender) === 'mrs' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-primary" for="genderMrs">
                                        <i class="fas fa-venus me-1"></i>Mme
                                    </label>
                                </div>
                                @error('gender')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="mobile" class="form-label">Mobile</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <input type="text" id="mobile" name="mobile"
                                        class="form-control @error('mobile') is-invalid @enderror"
                                        value="{{ old('mobile', $admin->mobile) }}">
                                </div>
                                @error('mobile')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="country" class="form-label">Pays</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                    <input type="text" id="country" name="country"
                                        class="form-control @error('country') is-invalid @enderror"
                                        value="{{ old('country', $admin->country) }}">
                                </div>
                                @error('country')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save me-2"></i>Enregistrer les modifications
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Changer le mot de passe --}}
        <div class="col-lg-5">
            <div class="card dashboard-card h-100">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h2 class="h5 mb-1"><i class="fas fa-lock me-2 text-primary"></i>Changer le mot de passe</h2>
                    <p class="text-muted small mb-0">Utilisez au moins 8 caractères.</p>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('dashboard.settings.password') }}">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-12">
                                <label for="current_password" class="form-label">Mot de passe actuel <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    <input type="password" id="current_password" name="current_password"
                                        class="form-control @error('current_password') is-invalid @enderror" required>
                                    <button type="button" class="btn btn-outline-secondary" data-password-toggle
                                        data-target="current_password" tabindex="-1" aria-label="Afficher/masquer le mot de passe">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                @error('current_password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="new_password" class="form-label">Nouveau mot de passe <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    <input type="password" id="new_password" name="new_password"
                                        class="form-control @error('new_password') is-invalid @enderror" required>
                                    <button type="button" class="btn btn-outline-secondary" data-password-toggle
                                        data-target="new_password" tabindex="-1" aria-label="Afficher/masquer le mot de passe">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                @error('new_password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="new_confirm_password" class="form-label">Confirmer le nouveau mot de passe <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    <input type="password" id="new_confirm_password" name="new_confirm_password"
                                        class="form-control @error('new_confirm_password') is-invalid @enderror" required>
                                    <button type="button" class="btn btn-outline-secondary" data-password-toggle
                                        data-target="new_confirm_password" tabindex="-1" aria-label="Afficher/masquer le mot de passe">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                @error('new_confirm_password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-key me-2"></i>Mettre à jour le mot de passe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('[data-password-toggle]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var input = document.getElementById(btn.dataset.target);
            var show = input.type === 'password';
            input.type = show ? 'text' : 'password';
            btn.querySelector('i').classList.toggle('fa-eye', !show);
            btn.querySelector('i').classList.toggle('fa-eye-slash', show);
        });
    });
</script>
@endpush
