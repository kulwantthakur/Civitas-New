@extends('layouts.app-import')

@section('title', 'Import Pages from Bulletins')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-file-import me-2"></i>
                        Import Pages from Bulletin Files
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Current Status -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                <strong>Current Pages in Database:</strong> {{ $existingPagesCount }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Always run Preview first</strong> before importing!
                            </div>
                        </div>
                    </div>

                    <!-- Import Form -->
                    <form id="importForm">
                        <div class="row">
                            <!-- Source Path -->
                            <div class="col-md-6 mb-3">
                                <label for="source" class="form-label">
                                    <i class="fas fa-folder me-1"></i>
                                    Source Directory
                                </label>
                                <select class="form-select" id="source" name="source">
                                    <option value="">Auto-detect (recommended)</option>
                                    @foreach($availablePaths as $path => $label)
                                        <option value="{{ $path }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                                <div class="form-text">
                                    <span id="pathStatus" class="text-muted">Select a path to check directory status</span>
                                </div>
                            </div>

                            <!-- Custom Path -->
                            <div class="col-md-6 mb-3">
                                <label for="custom_source" class="form-label">
                                    <i class="fas fa-edit me-1"></i>
                                    Custom Path (optional)
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="custom_source" placeholder="e.g., import/my-bulletins">
                                    <button type="button" class="btn btn-outline-secondary" id="checkCustomPath">
                                        <i class="fas fa-search"></i> Check
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- User Selection -->
                            <div class="col-md-6 mb-3">
                                <label for="user_id" class="form-label">
                                    <i class="fas fa-user me-1"></i>
                                    User <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" id="user_id" name="user_id" required>
                                    <option value="">Select a user...</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->user_identifier }}">
                                            {{ $user->name }} ({{ $user->email }})
                                        </option>
                                    @endforeach
                                </select>
                                <div class="form-text">User who will own the imported pages</div>
                            </div>

                            <!-- Section Selection -->
                            <div class="col-md-6 mb-3">
                                <label for="section_id" class="form-label">
                                    <i class="fas fa-layer-group me-1"></i>
                                    Section <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" id="section_id" name="section_id" required>
                                    <option value="">Select a section...</option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section->id }}">{{ @$section->title }}</option>
                                    @endforeach
                                </select>
                                <div class="form-text">Section where pages will be organized</div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Category -->
                            <div class="col-md-6 mb-3">
                                <label for="category" class="form-label">
                                    <i class="fas fa-tag me-1"></i>
                                    Category
                                </label>
                                <input type="text" class="form-control" id="category" name="category" value="bulletin" placeholder="bulletin">
                                <div class="form-text">Category for the imported pages</div>
                            </div>

                            <!-- Limit -->
                            <div class="col-md-6 mb-3">
                                <label for="limit" class="form-label">
                                    <i class="fas fa-sort-numeric-up me-1"></i>
                                    Limit (for testing)
                                </label>
                                <input type="number" class="form-control" id="limit" name="limit" min="1" max="100" placeholder="No limit">
                                <div class="form-text">Limit number of pages to process (useful for testing)</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="duplicate_action" class="form-label">
                                    <i class="fas fa-sync me-1"></i>
                                    Duplicate Action <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" id="duplicate_action" name="duplicate_action" required>
                                    <option value="skip">Skip Duplicates</option>
                                    <option value="update">Update Duplicates</option>
                                </select>
                                <div class="form-text">Choose what to do with existing pages (Skip or Update)</div>
                            </div>
                        </div>
                        <!-- Action Buttons -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex gap-3">
                                    <button type="button" class="btn btn-outline-primary btn-lg" id="previewBtn">
                                        <i class="fas fa-eye me-2"></i>
                                        Preview Import (Dry Run)
                                    </button>
                                    <button type="button" class="btn btn-success btn-lg" id="importBtn" disabled>
                                        <i class="fas fa-upload me-2"></i>
                                        Run Import
                                    </button>
                                    <button type="button" class="btn btn-secondary" id="clearOutputBtn">
                                        <i class="fas fa-eraser me-2"></i>
                                        Clear Output
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Output Section -->
            <div class="card shadow-sm mt-4" id="outputSection" style="display: none;">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-terminal me-2"></i>
                        Command Output
                    </h5>
                </div>
                <div class="card-body">
                    <div id="loadingSpinner" class="text-center py-4" style="display: none;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Processing...</span>
                        </div>
                        <div class="mt-2">Processing command...</div>
                    </div>
                    <pre id="commandOutput" class="bg-dark text-light p-3 rounded" style="max-height: 500px; overflow-y: auto;"></pre>
                    <div id="outputActions" class="mt-3" style="display: none;">
                        <div class="alert alert-success" id="successAlert" style="display: none;">
                            <i class="fas fa-check-circle me-2"></i>
                            <span id="successMessage"></span>
                        </div>
                        <div class="alert alert-danger" id="errorAlert" style="display: none;">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <span id="errorMessage"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
$(document).ready(function() {
    let previewCompleted = false;

    // Check directory when source changes
    $('#source').on('change', function() {
        const path = $(this).val();
        if (path) {
            checkDirectory(path);
        } else {
            $('#pathStatus').text('Auto-detect will search common locations').removeClass('text-success text-danger').addClass('text-muted');
        }
    });

    // Check custom path
    $('#checkCustomPath').on('click', function() {
        const customPath = $('#custom_source').val().trim();
        if (customPath) {
            $('#source').val(''); // Clear dropdown selection
            checkDirectory(customPath);
        }
    });

    // Preview button
    $('#previewBtn').on('click', function() {
        const formData = getFormData();
        if (!validateForm(formData)) return;
        
        runCommand('preview', formData);
    });

    // Import button
    $('#importBtn').on('click', function() {
        if (!previewCompleted) {
            alert('Please run Preview first to see what will be imported!');
            return;
        }
        
        if (!confirm('Are you sure you want to import pages? This will create new records in the database.')) {
            return;
        }
        
        const formData = getFormData();
        if (!validateForm(formData)) return;
        
        runCommand('import', formData);
    });

    // Clear output
    $('#clearOutputBtn').on('click', function() {
        $('#outputSection').hide();
        $('#commandOutput').empty();
        $('#outputActions').hide();
        $('#successAlert, #errorAlert').hide();
        previewCompleted = false;
        $('#importBtn').prop('disabled', true);
    });

    function getFormData() {
        const customSource = $('#custom_source').val().trim();
        return {
            source: customSource || $('#source').val(),
            user_id: $('#user_id').val(),
            section_id: $('#section_id').val(),
            category: $('#category').val() || 'bulletin',
            limit: $('#limit').val() || null,
            duplicate_action: $('#duplicate_action').val()
        };
    }

    function validateForm(data) {
        if (!data.user_id) {
            alert('Please select a user.');
            $('#user_id').focus();
            return false;
        }
        if (!data.section_id) {
            alert('Please select a section.');
            $('#section_id').focus();
            return false;
        }
        return true;
    }

    function checkDirectory(path) {
        $.post('{{ route("admin.import.check-directory") }}', {
            path: path,
            _token: '{{ csrf_token() }}'
        })
        .done(function(response) {
            if (response.success && response.exists) {
                $('#pathStatus')
                    .html(`<i class="fas fa-check-circle text-success"></i> Found ${response.total_folders} folders, ${response.valid_folders} with bulletin.txt`)
                    .removeClass('text-danger text-muted')
                    .addClass('text-success');
            } else {
                $('#pathStatus')
                    .html(`<i class="fas fa-times-circle text-danger"></i> ${response.message || 'Directory not found'}`)
                    .removeClass('text-success text-muted')
                    .addClass('text-danger');
            }
        })
        .fail(function() {
            $('#pathStatus')
                .html('<i class="fas fa-exclamation-triangle text-warning"></i> Could not check directory')
                .removeClass('text-success text-muted')
                .addClass('text-warning');
        });
    }

    function runCommand(action, data) {
        const url = action === 'preview' ? '{{ route("admin.import.pages.preview") }}' : '{{ route("admin.import.pages.import") }}';
        
        // Show output section and loading
        $('#outputSection').show();
        $('#loadingSpinner').show();
        $('#commandOutput').empty();
        $('#outputActions').hide();
        
        // Disable buttons during processing
        $('#previewBtn, #importBtn').prop('disabled', true);

        const requestData = { ...data, _token: '{{ csrf_token() }}' };

        $.post(url, requestData)
        .done(function(response) {
            $('#loadingSpinner').hide();
            
            if (response.success) {
                $('#commandOutput').text(response.output);
                $('#successAlert').show().find('#successMessage').text(
                    action === 'preview' ? 'Preview completed successfully!' : 
                    `Import completed! New total pages: ${response.new_pages_count || 'Unknown'}`
                );
                $('#errorAlert').hide();
                
                if (action === 'preview') {
                    previewCompleted = true;
                    $('#importBtn').prop('disabled', false);
                }
            } else {
                $('#commandOutput').text(response.error || 'Unknown error occurred');
                $('#errorAlert').show().find('#errorMessage').text(response.error || 'Command failed');
                $('#successAlert').hide();
            }
            
            $('#outputActions').show();
        })
        .fail(function(xhr) {
            $('#loadingSpinner').hide();
            const error = xhr.responseJSON?.error || 'Request failed';
            $('#commandOutput').text(error);
            $('#errorAlert').show().find('#errorMessage').text(error);
            $('#successAlert').hide();
            $('#outputActions').show();
        })
        .always(function() {
            // Re-enable buttons
            $('#previewBtn').prop('disabled', false);
            if (!previewCompleted && action !== 'preview') {
                $('#importBtn').prop('disabled', true);
            }
        });
    }
});
</script>
@endsection
@endsection