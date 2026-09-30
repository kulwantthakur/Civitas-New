@extends('layouts.app-import')

@section('title', __('words.import_pages_from_bulletins'))

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-file-import me-2"></i>
                        {!! __('words.import_pages_from_bulletin_files') !!}
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Current Status -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                <strong>{!! __('words.import_current_pages_in_database') !!}:</strong> {{ $existingPagesCount }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>{!! __('words.import_always_run_preview_first') !!}</strong> {!! __('words.import_before_importing') !!}
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
                                    {!! __('words.import_source_directory') !!}
                                </label>
                                <select class="form-select" id="source" name="source">
                                    <option value="">{!! __('words.import_auto_detect_recommended') !!}</option>
                                    @foreach($availablePaths as $path => $label)
                                        <option value="{{ $path }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                                <div class="form-text">
                                    <span id="pathStatus" class="text-muted">{!! __('words.import_select_path_to_check') !!}</span>
                                </div>
                            </div>

                            <!-- Custom Path -->
                            <div class="col-md-6 mb-3">
                                <label for="custom_source" class="form-label">
                                    <i class="fas fa-edit me-1"></i>
                                    {!! __('words.import_custom_path_optional') !!}
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="custom_source" placeholder="{!! __('words.import_custom_path_placeholder') !!}">
                                    <button type="button" class="btn btn-outline-secondary" id="checkCustomPath">
                                        <i class="fas fa-search"></i> {!! __('words.import_check') !!}
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- User Selection -->
                            <div class="col-md-6 mb-3">
                                <label for="user_id" class="form-label">
                                    <i class="fas fa-user me-1"></i>
                                    {!! __('words.form_user') !!} <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" id="user_id" name="user_id" required>
                                    <option value="">{!! __('words.import_select_a_user') !!}...</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->user_identifier }}">
                                            {{ $user->name }} ({{ $user->email }})
                                        </option>
                                    @endforeach
                                </select>
                                <div class="form-text">{!! __('words.import_user_who_will_own_pages') !!}</div>
                            </div>

                            <!-- Section Selection -->
                            <div class="col-md-6 mb-3">
                                <label for="section_id" class="form-label">
                                    <i class="fas fa-layer-group me-1"></i>
                                    {!! __('words.form_section') !!} <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" id="section_id" name="section_id" required>
                                    <option value="">{!! __('words.import_select_a_section') !!}...</option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section->id }}">{{ @$section->title }}</option>
                                    @endforeach
                                </select>
                                <div class="form-text">{!! __('words.import_section_where_pages_organized') !!}</div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Category -->
                            <div class="col-md-6 mb-3">
                                <label for="category" class="form-label">
                                    <i class="fas fa-tag me-1"></i>
                                    {!! __('words.form_category') !!}
                                </label>
                                <input type="text" class="form-control" id="category" name="category" value="bulletin" placeholder="bulletin">
                                <div class="form-text">{!! __('words.import_category_for_imported_pages') !!}</div>
                            </div>

                            <!-- Limit -->
                            <div class="col-md-6 mb-3">
                                <label for="limit" class="form-label">
                                    <i class="fas fa-sort-numeric-up me-1"></i>
                                    {!! __('words.import_limit_for_testing') !!}
                                </label>
                                <input type="number" class="form-control" id="limit" name="limit" min="1" max="100" placeholder="{!! __('words.import_no_limit') !!}">
                                <div class="form-text">{!! __('words.import_limit_number_useful_testing') !!}</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="duplicate_action" class="form-label">
                                    <i class="fas fa-sync me-1"></i>
                                    {!! __('words.import_duplicate_action') !!} <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" id="duplicate_action" name="duplicate_action" required>
                                    <option value="skip">{!! __('words.import_skip_duplicates') !!}</option>
                                    <option value="update">{!! __('words.import_update_duplicates') !!}</option>
                                </select>
                                <div class="form-text">{!! __('words.import_duplicate_action_pages_help') !!}</div>
                            </div>
                        </div>
                        <!-- Action Buttons -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex gap-3">
                                    <button type="button" class="btn btn-outline-primary btn-lg" id="previewBtn">
                                        <i class="fas fa-eye me-2"></i>
                                        {!! __('words.import_preview_dry_run') !!}
                                    </button>
                                    <button type="button" class="btn btn-success btn-lg" id="importBtn" disabled>
                                        <i class="fas fa-upload me-2"></i>
                                        {!! __('words.import_run_import') !!}
                                    </button>
                                    <button type="button" class="btn btn-secondary" id="clearOutputBtn">
                                        <i class="fas fa-eraser me-2"></i>
                                        {!! __('words.import_clear_output') !!}
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
                        {!! __('words.import_command_output') !!}
                    </h5>
                </div>
                <div class="card-body">
                    <div id="loadingSpinner" class="text-center py-4" style="display: none;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">{!! __('words.common_processing') !!}...</span>
                        </div>
                        <div class="mt-2">{!! __('words.import_processing_command') !!}...</div>
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
            $('#pathStatus').text('{!! __('words.import_auto_detect_will_search') !!}').removeClass('text-success text-danger').addClass('text-muted');
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
            alert('{!! __('words.import_please_run_preview_to_see') !!}');
            return;
        }
        
        if (!confirm('{!! __('words.import_confirm_import_pages') !!}')) {
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
            alert('{!! __('words.import_please_select_user') !!}');
            $('#user_id').focus();
            return false;
        }
        if (!data.section_id) {
            alert('{!! __('words.import_please_select_section') !!}');
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
                    .html(`<i class="fas fa-check-circle text-success"></i> {!! __('words.import_found') !!} ${response.total_folders} {!! __('words.import_folders') !!}, ${response.valid_folders} {!! __('words.import_with_bulletin_txt') !!}`)
                    .removeClass('text-danger text-muted')
                    .addClass('text-success');
            } else {
                $('#pathStatus')
                    .html(`<i class="fas fa-times-circle text-danger"></i> ${response.message || '{!! __('words.import_directory_not_found') !!}'}`)
                    .removeClass('text-success text-muted')
                    .addClass('text-danger');
            }
        })
        .fail(function() {
            $('#pathStatus')
                .html('<i class="fas fa-exclamation-triangle text-warning"></i> {!! __('words.import_could_not_check_directory') !!}')
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
                    action === 'preview' ? '{!! __('words.import_preview_completed') !!}' : 
                    '{!! __('words.import_completed') !!}' + ` ${response.new_pages_count || '{!! __('words.common_unknown') !!}'}`
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