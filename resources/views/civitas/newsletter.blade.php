@extends('civitas.app')

@section('top-content')
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="grey-mobile-height">
        <div class="civitas-grey-menu d-flex align-items-center justify-content-between justify-content-md-evenly p-3">
            <a href="{{ route('political-programs') }}" class="civitas-responsive-header-grey">{!! __('words.nav_positions') !!}</a>
            <a href="{{ route('civitas.party') }}" class="civitas-responsive-header-grey">{!! __('words.nav_movement') !!}</a>
            <a href="{{ route('civitas.news') }}" class="civitas-responsive-header-grey">{!! __('words.nav_news') !!}</a>
        </div>
    </div>
</div>
@endsection
@section('logo')
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('civitas.home') }}" class="logo-absolute text-decoration-none">
        <img src="{{ asset('img/logo/logo_civitas.svg') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/logo/responsive/civitas-logo-responsive.svg') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </a>
</div>
@endsection

@section('content')
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<form id="civitas-newsletter" method="POST" action="{{ route('submit-form') }}">
    @csrf
    <input type="hidden" class="commander-input" name="source_page">
    <div class="container">
        <div class="d-flex flex-column align-items-center text-center">
            <img src="{{ asset('/img/civitas/civitas_logo_pages.png') }}" class="d-none d-sm-none d-md-none -d-lg-block d-xl-block d-xxl-block" alt="logo" />
            <div class="civitas-title-page mt-3">NEWSLETTER</div>
            <div class="black-line-civitas"></div>
        </div>
        <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
        <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
        <div class="d-flex align-items-center m-auto civitas-newsletter-salut-width">
            <input type="radio" name="gender" value="mrs" required>
            <label class="civitas-newsletter-salut">{!! __('words.form_mrs') !!}</label>
            <div class="mx-3"></div>
            <input type="radio" name="gender" value="mr">
            <label class="civitas-newsletter-salut">{!! __('words.form_mr') !!}</label>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column">
            <input class="my-2" type="email" id="civitas-email-newsletter" name="email" placeholder="{!! __('words.form_your_email') !!}" required>
            <input class="my-2" type="text" id="civitas-first-name-newsletter" name="lname" placeholder="{!! __('words.form_first_name') !!}" required>
            <input class="my-2" type="text" id="civitas-name-newsletter" name="fname" placeholder="{!! __('words.form_last_name') !!}" required>
            <div class="civitas-newsletter-salut-width">
                <select class="form-select-canton w-100" name="canton_province">
                    <option value="" disabled selected>{!! __('words.form_canton_country') !!}</option>
                    <option value="AR">AR Appenzell Rhodes-Extérieures</option>
                    <option value="AI">AI Appenzell Rhodes-Intérieures</option>
                    <option value="AG">AG Argovie</option>
                    <option value="BL">BL Bâle-Campagne</option>
                    <option value="BS">BS Bâle-Ville</option>
                    <option value="BE">BE Berne</option>
                    <option value="FR">FR Fribourg</option>
                    <option value="GE">GE Genève</option>
                    <option value="GL">GL Glaris</option>
                    <option value="GR">GR Grisons</option>
                    <option value="JU">JU Jura</option>
                    <option value="LU">LU Lucerne</option>
                    <option value="NE">NE Neuchâtel</option>
                    <option value="NW">NW Nidwald</option>
                    <option value="OW">OW Obwald</option>
                    <option value="SG">SG Saint-Gall</option>
                    <option value="SH">SH Schaffhouse</option>
                    <option value="SZ">SZ Schwytz</option>
                    <option value="SO">SO Soleure</option>
                    <option value="TI">TI Tessin</option>
                    <option value="TG">TG Turgovie</option>
                    <option value="UR">UR Uri</option>
                    <option value="VS">VS Valais</option>
                    <option value="VD">VD Vaud</option>
                    <option value="ZG">ZG Zoug</option>
                    <option value="ZH">ZH Zürich</option>
                    <option value="FR_FRANCE">FR FRANCE</option>
                    <option value="DE_ALLEMAGNE">DE ALLEMAGNE</option>
                    <option value="I_ITALIE">I ITALIE</option>
                    <option value="A_AUTRICHE">A AUTRICHE</option>
                    <option value="QC_QUEBEC">QC QUEBEC</option>
                    <option class="font-weight-bold" value="RESTE_DU_MONDE">RESTE DU MONDE</option>
                </select>
            </div>
        </div>
        <div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
        <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
        <div class="container">
            {!! trans('words.civitas_newsletter_first') !!}
        </div>
        <div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
        <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    </div>
    <div class="civitas-newsletter-grey">
        <div class="container">
            {!! trans('words.civitas_newsletter_grey_box') !!}
        </div>
    </div>
    <div class="space-50"></div>
    <div class="container">
        {!! trans('words.civitas_newsletter_before_red') !!}
    </div>
    <div class="space-50"></div>
    <div class="">
        <div class="civitas-newsletter-red-box m-auto d-flex flex-column p-5" id="newsletterBox">
            <div class="civitas-newsletter-red-box-content mb-4">{!! __('words.civitas_your_newsletter') !!}</div>

            <!-- Analyses -->
            <input type="hidden" name="analyses_opinions" value="0">
            <label class="d-flex align-items-center newsletter-option py-2">
                <input type="checkbox" class="civitas-checkbox me-2" name="analyses_opinions" value="1">
                <span class="civitas-newsletter-red-box-content">{!! __('words.civitas_analyses_opinions') !!}</span>
            </label>

            <!-- Events -->
            <input type="hidden" name="events_civitas" value="0">
            <label class="d-flex align-items-center newsletter-option py-2 my-2">
                <input type="checkbox" class="civitas-checkbox me-2" name="events_civitas" value="1">
                <span class="civitas-newsletter-red-box-content">{!! __('words.civitas_upcoming_events') !!}</span>
            </label>

            <!-- News -->
            <input type="hidden" name="news" value="0">
            <label class="d-flex align-items-start newsletter-option py-2">
                <input type="checkbox" class="civitas-checkbox me-2 mt-1" name="news" value="1">
                <span class="civitas-newsletter-red-box-content">Toute l’actualité</span>
            </label>

            <div class="my-4"></div>
            <div class="d-flex justify-content-center align-items-center civitas-newsletter-valider-box m-auto">
                <button type="submit" class="civitas-newsletter-valider border-0 background-none">{!! __('words.form_validate') !!}</button>
            </div>
        </div>

    </div>
</form>
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="d-flex justify-content-center align-items-center">
        {!! trans('words.civitas_last_newsletter') !!}
    </div>
    <div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="d-flex justify-content-center align-items-center civitas-newsletter-purple-box p-3 p-sm-3 p-md-3p-lg-5 p-xl-5 p-xxl-5 m-auto">
        <a href="javascript:void(0);" class=" civitas-newsletter-purple-box-content">{!! __('words.civitas_unsubscribe_newsletter') !!}</a>
    </div>
</div>
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="civitas-black-marquee d-flex align-items-center">
    <marquee behavior="scroll" direction="right" scrollamount="12" class="civitas-marquee">{!! __('words.civitas_data_protection') !!}</marquee>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        const $a = $('input[name="analyses_opinions"]'); // 1st
        const $b = $('input[name="events_civitas"]'); // 2nd
        const $c = $('input[name="news"]'); // 3rd

        let syncing = false;

        function setChecked($el, val) {
            if ($el.prop('checked') === val) return;
            syncing = true;
            $el.prop('checked', val).trigger('change');
            syncing = false;
        }

        function enforceOnce() {
            if ($b.is(':checked')) setChecked($c, true);
            if ($c.is(':checked')) {
                setChecked($a, true);
                setChecked($b, false);
            }
        }

        enforceOnce();

        $a.on('change', function() {
            if (syncing) return;
            // καμία αυτόματη αλλαγή για το 1ο
        });

        $b.on('change', function() {
            if (syncing) return;
        });

        $c.on('change', function() {
            if (syncing) return;
            if (this.checked) {
                setChecked($a, true); // 3ο ⇒ τσεκάρει το 1ο
            }
        });
    });
</script>

<script>
    $(document).on("submit", "#civitas-newsletter", function(e) {
        e.preventDefault();

        if ($('.civitas-checkbox:checked').length === 0) {
            toastr.error('Please check at least one');
            return;
        }

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");
        $('[name="source_page"]').val(window.location.href);

        // Build form data
        const formData = new FormData(this);

        // Ensure each flag is a single 0/1 value (avoid hidden+checked duplication)
        ['analyses_opinions', 'events_civitas', 'news'].forEach(function(name) {
            const isChecked = $('input.civitas-checkbox[name="' + name + '"]').is(':checked');
            formData.delete(name);
            formData.append(name, isChecked ? 1 : 0);
        });

        $.ajax({
            url: "{{ route('submit-form') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    toastr.success("Email sent successfully!", "Success");
                    $("#civitas-newsletter")[0].reset();
                } else {
                    const errors = response.errors || {};
                    $.each(errors, function(field, messages) {
                        const $field = $('[name="' + field + '"]');
                        $field.addClass("is-invalid")
                            .after('<div class="text-danger">' + messages.join("<br>") + "</div>");
                    });
                }
            },
            error: function() {
                toastr.error("{!! trans('words.unexpected_error') !!}");
            }
        });
    });
</script>
@endsection