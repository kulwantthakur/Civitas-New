<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - Civitas</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('summernote/summernote-lite.min.css') }}">
    <style>
        :root {
            --sidebar-width: 250px;
            --header-height: 60px;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        /* Header */
        .admin-header {
            height: var(--header-height);
            background: #343a40;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
        }
        .admin-header .logo {
            height: 40px;
            filter: brightness(0) invert(1);
        }
        .admin-header .user-info {
            color: #fff;
        }
        /* Sidebar */
        .admin-sidebar {
            width: var(--sidebar-width);
            background: #fff;
            position: fixed;
            top: var(--header-height);
            left: 0;
            bottom: 0;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            overflow-y: auto;
        }
        .admin-sidebar .nav-item {
            border-bottom: 1px solid #eee;
        }
        .admin-sidebar .nav-link {
            color: #333;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            transition: all 0.2s;
        }
        .admin-sidebar .nav-link:hover {
            background: #f8f9fa;
            color: #007bff;
        }
        .admin-sidebar .nav-link.active {
            background: #007bff;
            color: #fff;
        }
        .admin-sidebar .nav-link i {
            width: 25px;
            margin-right: 10px;
        }
        /* Main Content */
        .admin-main {
            margin-left: var(--sidebar-width);
            margin-top: var(--header-height);
            padding: 30px;
            min-height: calc(100vh - var(--header-height));
        }
        /* Content Sections */
        .content-section {
            display: none;
        }
        .content-section.active {
            display: block;
        }
        /* Card Styles */
        .admin-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }
        .admin-card-header {
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            font-weight: 600;
        }
        .admin-card-body {
            padding: 20px;
        }
        /* Table */
        .admin-table {
            width: 100%;
            border-collapse: collapse;
        }
        .admin-table th {
            background: #f8f9fa;
            padding: 12px 15px;
            text-align: left;
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
        }
        .admin-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }
        .admin-table tr:hover {
            background: #f8f9fa;
        }
        /* Badges */
        .badge-pending { background: #ffc107; color: #000; }
        .badge-completed { background: #28a745; color: #fff; }
        .badge-failed { background: #dc3545; color: #fff; }
        .badge-cash { background: #28a745; }
        .badge-bank { background: #17a2b8; }
        .badge-bulletin { background: #fd7e14; }
        .badge-crypto { background: #6f42c1; }
        .badge-online { background: #6c757d; }
    </style>
</head>
<body>

<!-- Header -->
<header class="admin-header">
    <a href="{{ route('home') }}">
        <img src="{{ asset('img/home/civitas_logo.svg') }}" alt="Civitas" class="logo">
    </a>
    <div class="user-info">
        <i class="fa-solid fa-user me-2"></i>{{ Auth::user()->name }}
    </div>
</header>

<!-- Sidebar -->
<aside class="admin-sidebar">
    <nav>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="#" class="nav-link active" data-section="settings">
                    <i class="fa-solid fa-cog"></i> Paramètres
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-section="donations">
                    <i class="fa-solid fa-hand-holding-dollar"></i> Donations
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-section="emails">
                    <i class="fa-solid fa-envelope"></i> Email Templates
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-sign-out"></i> Déconnexion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</aside>

<!-- Main Content -->
<main class="admin-main">
    
    <!-- Settings Section -->
    <section class="content-section active" id="section-settings">
        <h2 class="mb-4"><i class="fa-solid fa-cog me-2"></i>Paramètres du compte</h2>
        
        <div class="admin-card" style="max-width: 500px;">
            <div class="admin-card-header">Changer le mot de passe</div>
            <div class="admin-card-body">
                <form action="{{ route('updatePassword') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nom</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mot de passe actuel</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password">
                        @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nouveau mot de passe</label>
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">
                        @error('new_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirmer le nouveau mot de passe</label>
                        <input type="password" class="form-control @error('new_confirm_password') is-invalid @enderror" name="new_confirm_password">
                        @error('new_confirm_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-save me-1"></i>Enregistrer
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Donations Section -->
    <section class="content-section" id="section-donations">
        <h2 class="mb-4"><i class="fa-solid fa-hand-holding-dollar me-2"></i>Gestion des donations</h2>
        
        <div class="admin-card">
            <div class="admin-card-header d-flex justify-content-between align-items-center">
                <span>Liste des donations</span>
                <span class="badge bg-primary">{{ $donations->count() }} total</span>
            </div>
            <div class="admin-card-body p-0">
                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Donateur</th>
                                <th>Email</th>
                                <th>Montant</th>
                                <th>Méthode</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($donations as $donation)
                            <tr>
                                <td><strong>#{{ $donation->id }}</strong></td>
                                <td>{{ $donation->created_at->format('d/m/Y H:i') }}</td>
                                <td>{{ $donation->firstname }} {{ $donation->lastname }}</td>
                                <td><a href="mailto:{{ $donation->email }}">{{ $donation->email }}</a></td>
                                <td><strong>CHF {{ number_format($donation->amount, 2) }}</strong></td>
                                <td>
                                    <span class="badge badge-{{ $donation->payment_method }}">
                                        {{ ucfirst($donation->payment_method) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-{{ $donation->status }}">
                                        {{ ucfirst($donation->status) }}
                                    </span>
                                </td>
                                <td>
                                    @if($donation->status === 'pending')
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-success btn-sm btn-status" data-id="{{ $donation->id }}" data-status="completed">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm btn-status" data-id="{{ $donation->id }}" data-status="failed">
                                            <i class="fa-solid fa-times"></i>
                                        </button>
                                    </div>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">Aucune donation</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Email Templates Section -->
    <section class="content-section" id="section-emails">
        <h2 class="mb-4"><i class="fa-solid fa-envelope me-2"></i>Email Templates</h2>
        
        <ul class="nav nav-tabs mb-4" id="emailTabs">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-cash">
                    <i class="fa-solid fa-money-bill me-1"></i>Espèces
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-bank">
                    <i class="fa-solid fa-building-columns me-1"></i>Virement
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-bulletin">
                    <i class="fa-solid fa-file-pdf me-1"></i>Bulletin
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-crypto">
                    <i class="fa-brands fa-bitcoin me-1"></i>Crypto
                </button>
            </li>
        </ul>

        <div class="tab-content">
            @foreach(['cash', 'bank', 'bulletin', 'crypto'] as $method)
            <div class="tab-pane fade {{ $method === 'cash' ? 'show active' : '' }}" id="tab-{{ $method }}">
                <div class="admin-card">
                    <div class="admin-card-header d-flex justify-content-between align-items-center">
                        <span>Template: {{ ucfirst($method) }}</span>
                        <a href="{{ route('admin.test-donation-email', $method) }}" class="btn btn-sm btn-info" 
                           onclick="return confirm('Envoyer un email test à {{ Auth::user()->email }}?')">
                            <i class="fa-solid fa-paper-plane me-1"></i>Test
                        </a>
                    </div>
                    <div class="admin-card-body">
                        <form class="email-form" data-method="{{ $method }}">
                            @csrf
                            <input type="hidden" name="payment_method" value="{{ $method }}">
                            <input type="hidden" name="template_id" value="{{ $templates[$method]->id ?? '' }}">
                            
                            <div class="mb-3">
                                <label class="form-label">Sujet</label>
                                <input type="text" class="form-control" name="subject" 
                                       value="{{ $templates[$method]->subject ?? 'Confirmation de votre don - Civitas' }}">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Contenu HTML</label>
                                <textarea class="summernote" id="editor-{{ $method }}">{{ $templates[$method]->html_content ?? '' }}</textarea>
                            </div>

                            @if($method === 'bulletin')
                            <div class="mb-3">
                                <label class="form-label">PDF joint</label>
                                <input type="file" class="form-control" name="pdf_attachment" accept=".pdf">
                                @if(isset($templates[$method]->pdf_attachment) && $templates[$method]->pdf_attachment)
                                    <small class="text-muted">Actuel: {{ $templates[$method]->pdf_attachment }}</small>
                                @endif
                            </div>
                            @endif

                            <button type="submit" class="btn btn-success">
                                <i class="fa-solid fa-save me-1"></i>Enregistrer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

</main>

<!-- Scripts -->
<script src="{{ asset('js/jQuery/jquery-3.6.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('summernote/summernote-lite.min.js') }}"></script>

<script>
$(document).ready(function() {
    
    // Navigation
    $('.nav-link[data-section]').on('click', function(e) {
        e.preventDefault();
        const section = $(this).data('section');
        
        $('.nav-link[data-section]').removeClass('active');
        $(this).addClass('active');
        
        $('.content-section').removeClass('active');
        $('#section-' + section).addClass('active');
    });
    
    // Initialize Summernote
    $('.summernote').summernote({
        height: 350,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture']],
            ['view', ['fullscreen', 'codeview']]
        ]
    });
    
    // Donation status update
    $('.btn-status').on('click', function() {
        const id = $(this).data('id');
        const status = $(this).data('status');
        
        if (!confirm('Confirmer le changement de statut?')) return;
        
        $.post('/admin/donations/' + id + '/status', {
            _token: '{{ csrf_token() }}',
            status: status
        }).done(function() {
            alert('Statut mis à jour');
            location.reload();
        }).fail(function() {
            alert('Erreur lors de la mise à jour');
        });
    });
    
    // Email template save
    $('.email-form').on('submit', function(e) {
        e.preventDefault();
        
        const form = $(this);
        const method = form.data('method');
        const formData = new FormData(this);
        const templateId = form.find('input[name="template_id"]').val();
        
        formData.append('html_content', $('#editor-' + method).summernote('code'));
        
        const url = templateId ? '/admin/email-templates/' + templateId : '/admin/email-templates';
        if (templateId) formData.append('_method', 'PUT');
        
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function() {
                alert('Template enregistré');
                location.reload();
            },
            error: function() {
                alert('Erreur lors de l\'enregistrement');
            }
        });
    });
});
</script>

</body>
</html>
