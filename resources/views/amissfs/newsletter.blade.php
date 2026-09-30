@extends('amissfs.app')

@section('logo')
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('amissfs.home') }}" class="text-decoration-none logo-absolute">
        <img src="{{ asset('/img/logo/amissfs_logo_dark.svg') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('/img/amissfs/responsive/amissfs-logo.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </a>
</div>
@endsection

@section('content')
<div class="space-50"></div>
<form id="amissfs-newsletter" method="POST" action="{{ route('submit-form') }}">
    @csrf
    <input type="hidden" class="commander-input" name="source_page">
    <div class="container">
        <div class="text-center d-flex flex-column align-items-center">
            <img src="{{ asset('/img/amissfs/amissfs-logo-page.png') }}" class="d-none d-sm-none d-md-none -d-lg-block d-xl-block d-xxl-block" alt="logo" />
            <div class="mt-3 amissfs-newsletter-title">NEWSLETTER</div>
            <div class="black-line-amissfs"></div>
        </div>
        <div class="my-5">
            {!! trans('words.amissfs_newsletter') !!}
        </div>
        <div class="m-auto d-flex align-items-center salutation-specific">
            <input type="radio" name="gender" value="mrs" required>
            <label class="amissfs-newsletter-salut">{!! __('words.common_mrs') !!}</label>
            <div class="mx-3"></div>
            <input type="radio" name="gender" value="mr">
            <label class="amissfs-newsletter-salut">{!! __('words.common_mr') !!}</label>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column">
            <input class="my-2" type="email" id="email-newsletter" name="email" placeholder="{!! __('words.common_your_email') !!}" required>
            <input class="my-2" type="text" id="name-newsletter" name="lname" placeholder="{!! __('words.common_firstname') !!}" required>
            <input class="my-2" type="text" id="name-1-newsletter" name="fname" placeholder="{!! __('words.common_lastname') !!}" required>
            <div class="canton-specific">
                <select class="form-select-canton w-100" name="canton_province">
                    <option value="" disabled selected>{!! __('words.common_canton_country') !!}</option>
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
        <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
            <div class="px-5 py-4 m-auto red-box newsletter-box d-flex flex-column" id="amissfsBox">
                <div class="mb-3 amissfs-newsletter-red-box-title">{!! __('words.amissfs_your_subscriptions') !!}</div>

                <label class="d-flex align-items-center amissfs-option py-2">
                    <input type="radio" name="subscription" value="bulletin" class="amissfs-radio me-2">
                    <span class="amissfs-newsletter-red-box ms-2">{!! __('words.amissfs_bulletin_amis') !!}</span>
                </label>

                <label class="d-flex align-items-center amissfs-option py-2 my-2">
                    <input type="radio" name="subscription" value="romkurier" class="amissfs-radio me-2">
                    <span class="amissfs-newsletter-red-box ms-2">{!! __('words.amissfs_rom_kurier_sisino') !!}</span>
                </label>

                <label class="d-flex align-items-center amissfs-option py-2">
                    <input type="radio" name="subscription" value="events_amissfs" class="amissfs-radio me-2">
                    <span class="amissfs-newsletter-red-box ms-2">{!! __('words.amissfs_events') !!}</span>
                </label>

                <div class="mt-3 d-flex justify-content-center align-items-center valider-color width-163 height-62 ms-3">
                    <button type="submit" class="amissfs-newsletter-valider border-0">{!! __('words.common_validate') !!}</button>
                </div>
            </div>

            <div class="my-4 d-flex justify-content-center align-items-center">
                {!! trans('words.amissfs_last_newsletter') !!}
            </div>
            <div class="m-auto d-flex justify-content-center align-items-center pink-box width-264 height-62">
                <a href="javascript:void(0);" class="text-center text-white riviera-20-lh text-decoration-none">{!! __('words.amissfs_unsubscribe') !!}</a>
            </div>
        </div>
    </div>
    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
        <div class="px-2 py-4 m-auto mt-3 mb-4 red-box d-flex flex-column">
            <div class="mb-3 amissfs-newsletter-red-box-title">{!! __('words.amissfs_your_subscriptions') !!}</div>
            <div class="d-flex align-items-center">
                <input type="checkbox" class="amissfs-checkbox" name="bulletin" value="1" />
                <label class="amissfs-newsletter-red-box ms-2">{!! __('words.amissfs_bulletin_amis') !!}</label>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" class="amissfs-checkbox" name="romkurier" value="1" />
                <label class="amissfs-newsletter-red-box ms-2">{!! __('words.amissfs_rom_kurier_sisino') !!}</label>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" class="amissfs-checkbox" name="events_amissfs" value="1" />
                <label class="amissfs-newsletter-red-box ms-2">{!! __('words.amissfs_events') !!}</label>
            </div>
            <div class="mt-3 d-flex justify-content-center align-items-center valider-color width-163 height-62 ms-3">
                <button type="submit" class="amissfs-newsletter-valider border-0">{!! __('words.common_validate') !!}</button>
            </div>
        </div>
        <div class="container">
            <div class="d-flex justify-content-center align-items-center">
                {!! trans('words.amissfs_last_newsletter') !!}
            </div>
            <div class="m-auto d-flex justify-content-center align-items-center pink-box width-264 height-62">
                <a href="javascript:void(0);" class="text-center text-white riviera-20-lh text-decoration-none">{!! __('words.amissfs_unsubscribe') !!}</a>
            </div>
        </div>
    </div>
</form>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<a href="{{ route('footer.protection') }}" class="text-decoration-none">
    <div class="black-bg-full d-flex align-items-center">
        <marquee behavior="scroll" direction="right" scrollamount="12" class="text-white sang-blue-regular-20">{!! __('words.amissfs_data_protection') !!}</marquee>
    </div>
</a>
@endsection



@section('scripts')
<script>
    $(document).on("submit", "#amissfs-newsletter", function(e) {
        e.preventDefault();
        if ($('.amissfs-checkbox:checked').length == 0) {
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
                        $("#amissfs-newsletter")[0].reset();
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