@extends('layouts.app-import')

@section('title', __('words.podcast_import_from_excel'))

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-podcast me-2"></i>
                        {!! __('words.podcast_import_from_excel') !!}
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Current Status -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                <strong>{!! __('words.podcast_existing_in_database') !!}:</strong> {{ $existingPodcastsCount ?? 0 }}
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
                    <form id="importForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Excel File -->
                            <div class="col-md-6 mb-3">
                                <label for="file" class="form-label">
                                    <i class="fas fa-file-excel me-1"></i>
                                    {!! __('words.import_excel_file') !!} <span class="text-danger">*</span>
                                </label>
                                <input type="file" class="form-control" id="file" name="file" accept=".xls,.xlsx,.csv" required>
                                <div class="form-text">{!! __('words.podcast_upload_excel_file') !!}</div>
                            </div>

                            <!-- ZIP File (optional) -->
                            <!-- <div class="col-md-6 mb-3">
                                <label for="audio_zip" class="form-label">
                                    <i class="fas fa-file-archive me-1"></i>
                                    Audio ZIP (optional)
                                </label>
                                <input type="file" class="form-control" id="audio_zip" name="audio_zip" accept=".zip">
                                <div class="form-text">ZIP containing MP3 files named by reference (e.g., BL2.mp3).</div>
                            </div> -->
                            <!-- Limit -->
                            <div class="col-md-6 mb-3">
                                <label for="limit" class="form-label">
                                    <i class="fas fa-sort-numeric-up me-1"></i>
                                    {!! __('words.import_limit_for_testing') !!}
                                </label>
                                <input type="number" class="form-control" id="limit" name="limit" min="1" max="500" placeholder="{!! __('words.import_no_limit') !!}">
                                <div class="form-text">{!! __('words.podcast_limit_number_to_process') !!}</div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Duplicate Action -->
                            <div class="col-md-6 mb-3">
                                <label for="duplicate_action" class="form-label">
                                    <i class="fas fa-sync me-1"></i>
                                    {!! __('words.import_duplicate_action') !!} <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" id="duplicate_action" name="duplicate_action" required>
                                    <option value="skip">{!! __('words.import_skip_duplicates') !!}</option>
                                    <option value="update">{!! __('words.import_update_duplicates') !!}</option>
                                </select>
                                <div class="form-text">{!! __('words.podcast_duplicate_action_help') !!}</div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="row mt-4">
                            <div class="col-12 d-flex gap-3">
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

    $('#previewBtn').on('click', function() {
        const formData = new FormData($('#importForm')[0]);
        if (!validateForm(formData)) return;
        runCommand('preview', formData);
    });

    $('#importBtn').on('click', function() {
        if (!previewCompleted) {
            alert('{!! __('words.import_please_run_preview_first') !!}');
            return;
        }
        if (!confirm('{!! __('words.podcast_confirm_import') !!}')) return;

        const formData = new FormData($('#importForm')[0]);
        runCommand('import', formData);
    });

    $('#clearOutputBtn').on('click', function() {
        $('#outputSection').hide();
        $('#commandOutput').empty();
        $('#outputActions').hide();
        $('#successAlert, #errorAlert').hide();
        previewCompleted = false;
        $('#importBtn').prop('disabled', true);
    });

    function validateForm(formData) {
        if (!formData.get('file')) {
            alert('{!! __('words.import_please_select_excel_file') !!}');
            return false;
        }
        return true;
    }

    function runCommand(action, formData) {
        const url = action === 'preview'
            ? '{{ route("admin.import.podcasts.preview") }}'
            : '{{ route("admin.import.podcasts.import") }}';

        $('#outputSection').show();
        $('#loadingSpinner').show();
        $('#commandOutput').empty();
        $('#outputActions').hide();
        $('#previewBtn, #importBtn').prop('disabled', true);

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#loadingSpinner').hide();
                if (response.success) {
                    $('#commandOutput').text(response.output || '');
                    $('#successAlert').show().find('#successMessage').text(
                        action === 'preview'
                            ? '{!! __('words.import_preview_completed') !!}'
                            : '{!! __('words.import_completed') !!}' + ` ${response.new_pages_count || 'unknown'}`
                    );
                    $('#errorAlert').hide();

                    if (action === 'preview') {
                        previewCompleted = true;
                        $('#importBtn').prop('disabled', false);
                    }
                } else {
                    $('#commandOutput').text(response.error || 'Unknown error');
                    $('#errorAlert').show().find('#errorMessage').text(response.error || 'Command failed');
                    $('#successAlert').hide();
                }
                $('#outputActions').show();
            },
            error: function(xhr) {
                $('#loadingSpinner').hide();
                const error = xhr.responseJSON?.error || 'Request failed';
                $('#commandOutput').text(error);
                $('#errorAlert').show().find('#errorMessage').text(error);
                $('#successAlert').hide();
                $('#outputActions').show();
            },
            complete: function() {
                $('#previewBtn').prop('disabled', false);
                if (!previewCompleted && action !== 'preview') {
                    $('#importBtn').prop('disabled', true);
                }
            }
        });
    }
});
</script>
@endsection
@endsection
