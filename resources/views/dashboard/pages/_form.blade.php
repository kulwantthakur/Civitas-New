@php
    $page = $page ?? null;
    $periods = $page && $page->period ? array_map('trim', explode(',', $page->period)) : [];
    $fieldValue = fn ($field) => old($field, $page->{$field} ?? '');
@endphp

@push('styles')
<link rel="stylesheet" href="{{ asset('summernote/summernote-lite.min.css') }}">
@endpush

{{-- Hidden content type (used by validation + service) --}}
<input type="hidden" name="type" id="page-type" value="{{ old('type', $type ?? '') }}">

<div class="row g-4">
    <div class="col-md-6">
        <label for="page-section" class="form-label">Section <span class="text-danger">*</span></label>
        <select id="page-section" name="section_id" class="form-select" required>
            <option value="">— Sélectionner une section —</option>
            @foreach ($sections as $section)
                <option value="{{ $section->id }}"
                    {{ (int) old('section_id', $page->section_id ?? '') === $section->id ? 'selected' : '' }}>
                    {{ $section->title }}
                </option>
            @endforeach
        </select>
        @error('section_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="page-type-select" class="form-label">Type de contenu</label>
        <select id="page-type-select" class="form-select" @if ($page) disabled @endif>
            <option value="">— Choisir un type —</option>
            @foreach ($types as $slug => $definition)
                <option value="{{ $slug }}" {{ old('type', $type ?? '') === $slug ? 'selected' : '' }}>
                    {{ $definition['label'] }}
                </option>
            @endforeach
        </select>
        <div class="form-text">Le type est ajusté automatiquement selon la section choisie.</div>
    </div>
</div>

<hr class="my-4">

{{-- ============================================================
     Identification
--}}
<div class="row g-4" data-field="title">
    <div class="col-12">
        <label for="page-title" class="form-label">Titre <span class="text-danger">*</span></label>
        <input type="text" id="page-title" name="title" class="form-control @error('title') is-invalid @enderror"
            value="{{ $fieldValue('title') }}" required>
        @error('title')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row g-4 mt-0" data-field="subtitle">
    <div class="col-12">
        <label for="page-subtitle" class="form-label">Sous-titre</label>
        <input type="text" id="page-subtitle" name="subtitle" class="form-control" value="{{ $fieldValue('subtitle') }}">
    </div>
</div>

<div class="row g-4 mt-0" data-field="category">
    <div class="col-md-6">
        <label for="page-category" class="form-label">Catégorie</label>
        <input type="text" id="page-category" name="category" class="form-control"
            value="{{ $fieldValue('category') }}" maxlength="100">
        <div class="form-text">ex. analyses, initiatives, votations.populaires, Partie I – Dieu…</div>
    </div>
    <div class="col-md-6" data-field="url">
        <label for="page-url" class="form-label">URL</label>
        <input type="text" id="page-url" name="url" class="form-control"
            value="{{ $fieldValue('url') }}" maxlength="255">
        <div class="form-text">Segment d’URL utilisé par les routes du site.</div>
    </div>
</div>

<div class="row g-4 mt-0" data-field="number">
    <div class="col-md-3">
        <label for="page-number" class="form-label">Numéro</label>
        <input type="number" id="page-number" name="number" class="form-control" value="{{ $fieldValue('number') }}">
    </div>
    <div class="col-md-3" data-field="year">
        <label for="page-year" class="form-label">Année</label>
        <input type="number" id="page-year" name="year" class="form-control"
            value="{{ $fieldValue('year') }}" min="1900" max="2100">
    </div>
    <div class="col-md-6" data-field="period">
        <label for="page-period" class="form-label">Période</label>
        <select id="page-period" name="period[]" class="form-select" multiple>
            @foreach ($months as $month)
                <option value="{{ $month }}" {{ in_array($month, $periods) ? 'selected' : '' }}>{{ $month }}</option>
            @endforeach
        </select>
        <div class="form-text">Maintenez Ctrl (Cmd) pour sélectionner plusieurs mois.</div>
    </div>
</div>

<hr class="my-4">

{{-- ============================================================
     Contenu
--}}
<div class="row g-4 mt-0" data-field="content">
    <div class="col-12">
        <label for="page-content" class="form-label">Contenu</label>
        <textarea id="page-content" name="content" class="form-control summernote" rows="6">{{ $fieldValue('content') }}</textarea>
    </div>
</div>

<div class="row g-4 mt-0" data-field="content_sec">
    <div class="col-12">
        <label for="page-content-sec" class="form-label">Contenu secondaire</label>
        <textarea id="page-content-sec" name="content_sec" class="form-control summernote" rows="4">{{ $fieldValue('content_sec') }}</textarea>
    </div>
</div>

<div class="row g-4 mt-0" data-field="html_source">
    <div class="col-12">
        <label for="page-html-source" class="form-label">Source HTML</label>
        <textarea id="page-html-source" name="html_source" class="form-control" rows="4"
            placeholder="HTML personnalisé (utilisé par certains gabarits).">{{ $fieldValue('html_source') }}</textarea>
    </div>
</div>

<hr class="my-4">

{{-- ============================================================
     Médias
--}}
<div class="row g-4 mt-0" data-field="media_mode">
    <div class="col-12">
        <label class="form-label d-block">Type de média associé</label>
        <div class="btn-group" role="group">
            <input type="radio" class="btn-check" name="media_mode" id="mm-link" value="link"
                {{ old('media_mode', $page ? ($page->link ? 'link' : '') : 'link') === 'link' ? 'checked' : '' }}>
            <label class="btn btn-outline-primary" for="mm-link"><i class="fas fa-link me-1"></i>Lien</label>

            <input type="radio" class="btn-check" name="media_mode" id="mm-video" value="video"
                {{ old('media_mode', $page && $page->upload_video ? 'video' : '') === 'video' ? 'checked' : '' }}>
            <label class="btn btn-outline-primary" for="mm-video"><i class="fas fa-video me-1"></i>Vidéo</label>

            <input type="radio" class="btn-check" name="media_mode" id="mm-image" value="image"
                {{ old('media_mode', $page && $page->events_image ? 'image' : '') === 'image' ? 'checked' : '' }}>
            <label class="btn btn-outline-primary" for="mm-image"><i class="fas fa-image me-1"></i>Image</label>
        </div>
    </div>
</div>

<div class="row g-4 mt-0" data-field="link">
    <div class="col-md-6">
        <label for="page-link" class="form-label">Lien</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-link"></i></span>
            <input type="text" id="page-link" name="link" class="form-control"
                value="{{ $fieldValue('link') }}" maxlength="255" placeholder="https://…">
        </div>
    </div>
</div>

<div class="row g-4 mt-0" data-field="upload_video">
    <div class="col-md-6">
        <label for="page-video" class="form-label">Vidéo (fichier)</label>
        <input type="file" id="page-video" name="upload_video" class="form-control" accept="video/*">
        @if ($page && $page->upload_video)
            <div class="form-text">
                Fichier actuel : <a href="{{ asset($page->upload_video) }}" target="_blank" rel="noopener">voir la vidéo</a>
            </div>
        @endif
    </div>
</div>

<div class="row g-4 mt-0" data-field="icon">
    <div class="col-md-6">
        <label for="page-icon" class="form-label">Icône</label>
        <input type="file" id="page-icon" name="icon" class="form-control" accept="image/*">
        @if ($page && $page->icon)
            <div class="d-flex align-items-center gap-3 mt-2">
                <img src="{{ asset($page->icon) }}" alt="Icône actuelle" class="border rounded" style="max-height: 44px;">
                <span class="form-text">Icône actuelle</span>
            </div>
        @endif
    </div>
</div>

<div class="row g-4 mt-0" data-field="events_image">
    <div class="col-md-6">
        <label for="page-events-image" class="form-label">Image d’événement</label>
        <input type="file" id="page-events-image" name="events_image" class="form-control" accept="image/*">
        @if ($page && $page->events_image)
            <div class="form-text">
                Image actuelle : <a href="{{ asset($page->events_image) }}" target="_blank" rel="noopener">voir</a>
            </div>
        @endif
    </div>
</div>

<div class="row g-4 mt-0" data-field="image">
    <div class="col-md-6">
        <label for="page-image" class="form-label">Image</label>
        <input type="file" id="page-image" name="image" class="form-control" accept="image/*">
        @if ($page && $page->image)
            <div class="form-text">
                Image actuelle : <a href="{{ asset($page->image) }}" target="_blank" rel="noopener">voir</a>
            </div>
        @endif
    </div>
</div>

<div class="row g-4 mt-0" data-field="image_responsive">
    <div class="col-md-6">
        <label for="page-image-responsive" class="form-label">Image responsive</label>
        <input type="file" id="page-image-responsive" name="image_responsive" class="form-control" accept="image/*">
        @if ($page && $page->image_responsive)
            <div class="form-text">
                Image actuelle : <a href="{{ asset($page->image_responsive) }}" target="_blank" rel="noopener">voir</a>
            </div>
        @endif
    </div>
</div>

<div class="row g-4 mt-0" data-field="pdf">
    <div class="col-md-6">
        <label for="page-pdf" class="form-label">PDF</label>
        <input type="file" id="page-pdf" name="pdf" class="form-control" accept=".pdf">
        @if ($page && $page->pdf)
            <div class="form-check form-check-inline mt-2">
                <input type="checkbox" class="form-check-input" id="page-pdf-remove" name="remove_pdf" value="1">
                <label class="form-check-label" for="page-pdf-remove">Supprimer le PDF actuel</label>
            </div>
            <div class="form-text">
                Fichier actuel : <a href="{{ asset($page->pdf) }}" target="_blank" rel="noopener">télécharger</a>
            </div>
        @endif
    </div>
</div>

<hr class="my-4">

{{-- ============================================================
     Publication
--}}
<div class="row g-4 mt-0">
    <div class="col-md-4" data-field="is_active">
        <label class="form-label d-block">Statut</label>
        <div class="form-check form-switch mt-2">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" class="form-check-input" id="page-active" name="is_active" value="1"
                {{ (int) old('is_active', $page->is_active ?? 1) === 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="page-active">Page active</label>
        </div>
    </div>
    <div class="col-md-4" data-field="sort_order">
        <label for="page-sort-order" class="form-label">Ordre d’affichage</label>
        <input type="number" id="page-sort-order" name="sort_order" class="form-control"
            value="{{ old('sort_order', $page->sort_order ?? '') }}" min="0">
    </div>
    <div class="col-md-4" data-field="created_at">
        <label for="page-created-at" class="form-label">Date de publication</label>
        <input type="date" id="page-created-at" name="created_at" class="form-control"
            value="{{ old('created_at', $page && $page->created_at ? $page->created_at->format('Y-m-d') : '') }}">
        <div class="form-text">Laissé vide = aujourd’hui.</div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('summernote/summernote-lite.min.js') }}"></script>
<script>
    window.PAGE_FIELDS = @json(collect($types)->mapWithKeys(fn ($d, $slug) => [$slug => $d['fields']])->all());
    window.PAGE_SECTION_TYPES = @json($sectionTypeMap ?? []);

    document.addEventListener('DOMContentLoaded', function () {
        function setFieldVisible(field, show) {
            var el = document.querySelector('[data-field="' + field + '"]');
            if (!el) return;
            el.style.display = show ? '' : 'none';
            el.querySelectorAll('input, select, textarea, button').forEach(function (input) {
                input.disabled = !show;
            });
        }

        function applyType(type) {
            var visible = window.PAGE_FIELDS[type] || [];
            var fields = document.querySelectorAll('[data-field]');
            var allowed = new Set(visible);
            fields.forEach(function (el) {
                var field = el.getAttribute('data-field');
                if (field === 'media_mode') return;
                setFieldVisible(field, allowed.has(field));
            });
            applyMediaMode();
        }

        function applyMediaMode() {
            var mode = 'link';
            var checked = document.querySelector('input[name="media_mode"]:checked');
            if (checked) mode = checked.value;

            var mediaModeBlock = document.querySelector('[data-field="media_mode"]');
            var enabled = mediaModeBlock ? mediaModeBlock.style.display !== 'none' : false;

            var rules = { link: ['link'], video: ['upload_video'], image: ['events_image'] };
            var keep = enabled ? (rules[mode] || []) : [];
            var wanted = { link: keep.indexOf('link') !== -1, upload_video: keep.indexOf('upload_video') !== -1, events_image: keep.indexOf('events_image') !== -1 };

            // A media field is visible only when BOTH its type list allows it
            // and the current media mode requires it.
            var type = document.getElementById('page-type').value;
            var visible = window.PAGE_FIELDS[type] || [];

            ['link', 'upload_video', 'events_image'].forEach(function (field) {
                setFieldVisible(field, wanted[field] && visible.indexOf(field) !== -1);
            });
        }

        function syncType() {
            var value = typeSelect ? typeSelect.value : document.getElementById('page-type').value;
            document.getElementById('page-type').value = value;
            applyType(value);
        }

        var typeSelect = document.getElementById('page-type-select');
        var sectionSelect = document.getElementById('page-section');

        if (typeSelect) {
            typeSelect.addEventListener('change', syncType);
        }

        if (sectionSelect) {
            sectionSelect.addEventListener('change', function () {
                var slug = window.PAGE_SECTION_TYPES[sectionSelect.value];
                if (!slug) return;
                if (typeSelect) typeSelect.value = slug;
                document.getElementById('page-type').value = slug;
                applyType(slug);
            });
        }

        document.querySelectorAll('input[name="media_mode"]').forEach(function (radio) {
            radio.addEventListener('change', applyMediaMode);
        });

        document.querySelectorAll('.summernote').forEach(function (textarea) {
            if (typeof jQuery !== 'undefined' && jQuery.fn.summernote) {
                jQuery(textarea).summernote({
                    height: 220,
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['link', 'picture', 'table']],
                        ['view', ['fullscreen', 'codeview', 'help']],
                    ],
                });
            }
        });

        syncType();
    });
</script>
@endpush
