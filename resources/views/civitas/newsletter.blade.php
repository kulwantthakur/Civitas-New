@extends('civitas.app')

@section('top-content')
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="grey-mobile-height">
        <div class="civitas-grey-menu d-flex align-items-center justify-content-between p-3">
            <a href="{{ route('political-programs') }}" class="civitas-responsive-header-grey">POSITIONS</a>
            <a href="{{ route('civitas.party') }}" class="civitas-responsive-header-grey">MOUVEMENT</a>
            <a href="{{ route('civitas.news') }}" class="civitas-responsive-header-grey">ACTUALITÉS</a>
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
            <label class="civitas-newsletter-salut">Madame</label>
            <div class="mx-3"></div>
            <input type="radio" name="gender" value="mr">
            <label class="civitas-newsletter-salut">Monsieur</label>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column">
            <input class="my-2" type="email" id="civitas-email-newsletter" name="email" placeholder="Votre adresse e-mail" required>
            <input class="my-2" type="text" id="civitas-first-name-newsletter" name="lname" placeholder="Prénom" required>
            <input class="my-2" type="text" id="civitas-name-newsletter" name="fname" placeholder="Nom" required>
            <div class="civitas-newsletter-salut-width">
                <select class="form-select-canton w-100" name="canton_province">
                <option value="" disabled selected>Canton / Pays</option>
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
        <div class="civitas-newsletter-red-box m-auto d-flex flex-column p-5">
            <div class="civitas-newsletter-red-box-content mb-4">Votre newsletter Civitas Suisse : </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" class="civitas-checkbox" name="analyses_opinions" value="1" />
                <label class="civitas-newsletter-red-box-content ms-2">Analyses, opinions, entrevues</label>
            </div>
            <div class="d-flex align-items-center my-3">
                <input type="checkbox" class="civitas-checkbox" name="events_civitas" value="1" />
                <label class="civitas-newsletter-red-box-content ms-2">Prochains événements</label>
            </div>
            <div class="d-flex align-items-start">
                <input type="checkbox" class="civitas-checkbox" class="mt-2" name="news" value="1" />
                <label class="civitas-newsletter-red-box-content ms-2">Toute l’actualité<br>valider</label>
            </div>
            <div class="my-5"></div>
            <div class="d-flex justify-content-center align-items-center civitas-newsletter-valider-box m-auto">
                <button type="submit" class="civitas-newsletter-valider border-0 background-none">VALIDER</button>
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
        <a href="javascript:void(0);" class=" civitas-newsletter-purple-box-content">Se désabonner de la newsletter</a>
    </div>
</div>
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="civitas-black-marquee d-flex align-items-center">
    <marquee behavior="scroll" direction="right" scrollamount="12" class="civitas-marquee">PROTECTION DES DONNÉES / DATENSCHUTZE</marquee>
</div>
@endsection



@section('scripts')
<script>
    $(document).on("submit", "#civitas-newsletter", function(e) {
        e.preventDefault();
        if ($('.civitas-checkbox:checked').length == 0) {
            toastr.error('Please check one');
        } else {
            $(".text-danger").remove();
            $(".is-invalid").removeClass("is-invalid");
            var currentUrl = window.location.href;
            $('[name="source_page"]').val(currentUrl);
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('submit-form') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        toastr.success("Email send successfully!", "Success");
                        $("#civitas-newsletter")[0].reset();
                    } else {
                        var errors = response.errors;
                        $.each(errors, function(field, messages) {
                            var inputField = $('[name="' + field + '"]');
                            inputField.addClass("is-invalid");
                            var errorMessages = messages.join("<br>");
                            inputField.after(
                                '<div class="text-danger">' + errorMessages + "</div>"
                            );
                        });
                    }
                },
                error: function(xhr) {
                    toastr.error("{!! trans('words.unexpected_error') !!}");
                },
            });
        }
    });
</script>
@endsection