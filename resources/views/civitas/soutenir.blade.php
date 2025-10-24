@extends('civitas.app')

@section('top-content')
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="grey-mobile-height">
        <div class="civitas-grey-menu d-flex align-items-center justify-content-between p-3">
            <a href="{{ route('civitas.agenda') }}" class="civitas-responsive-header-grey">AGENDA</a>
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
<div class="d-flex justify-content-center">
    <img src="{{ asset('img/civitas/soutenir.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/civitas/soutenir.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none w-100" alt="logo" />
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <form id="donation-form" method="POST" action="{{ route('donation-store') }}">
        @csrf
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">
                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-5 col-xl-6 col-xxl-6">
                        <div class="table-height">
                            <div class="d-flex align-items-center mb-4">
                                <div class="red-circle d-flex justify-content-center align-items-center">1</div>
                                <div class="table-title">Montant du don</div>
                            </div>
                            <table class="table-1 w-100">
                                <tr>
                                    <td>
                                        <label class="chf custom-radio">
                                            <input type="radio" id="chf25" name="amount_type" value="25" {{ session('selected_value') == '25' ? 'checked' : '' }}>
                                            <span class="radio-circle"></span>
                                            CHF 25
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <label class="chf custom-radio">
                                            <input type="radio" id="chf50" name="amount_type" value="50" {{ session('selected_value') == '50' ? 'checked' : '' }}>
                                            <span class="radio-circle"></span>
                                            CHF 50
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <label class="chf custom-radio">
                                            <input type="radio" id="chf120" name="amount_type" value="120" {{ session('selected_value') == '120' ? 'checked' : '' }}>
                                            <span class="radio-circle"></span>
                                            CHF 120
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <label class="chf custom-radio">
                                            <input type="radio" id="chf500" name="amount_type" value="500" {{ session('selected_value') == '500' ? 'checked' : '' }}>
                                            <span class="radio-circle"></span>
                                            CHF 500
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <label class="chf custom-radio">
                                            <input type="radio" id="chf_custom" name="amount_type" value="custom" {{ session('selected_value') == 'custom' ? 'checked' : '' }}>
                                            <span class="radio-circle"></span>
                                            @if(session('selected_value') == 'custom' && session('custom_amount'))
                                            CHF {{ session('custom_amount') }}
                                            @else
                                            CHF MONTANT PERSONNALISÉ
                                            @endif
                                        </label>
                                        <input type="hidden" id="custom_amount" name="amount" value="{{ session('custom_amount') ?? '' }}">
                                    </td>
                                </tr>
                            </table>
                            <div id="amount_info_errors" class="text-danger"></div>
                        </div>
                        <div class="horizontal-line-table mb-3 mb-sm-3 mb-md-3 mb-lg-5 mb-xl-5 mb-xxl-5"></div>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-lg-5 col-xl-6 col-xxl-6">
                        <div class="table-height">
                            <div class="d-flex align-items-center mb-4 mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0">
                                <div class="red-circle d-flex justify-content-center align-items-center">2</div>
                                <div class="table-title">Choisir un mode de paiement</div>
                            </div>
                            <table class="table-1 w-100">
                                <tr>
                                    <td>
                                        <label class="custom-radio">
                                            <input type="radio" id="cash" name="payment_method" value="cash">
                                            <span class="radio-circle"></span>
                                            <a href="javascript:void(0);" class="chf">Versement liquide</a>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <label class="custom-radio">
                                            <input type="radio" id="online" name="payment_method" value="online">
                                            <span class="radio-circle"></span>
                                            <a href="javascript:void(0);" class="chf">Transfert électronique*</a>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <label class="custom-radio">
                                            <input type="radio" id="crypto" name="payment_method" value="crypto">
                                            <span class="radio-circle"></span>
                                            <a href="{{ route('civitas.soutenir_crypto') }}" class="chf">Monero(cryptomonnaie)</a>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <label class="custom-radio">
                                            <input type="radio" id="bank" name="payment_method" value="bank">
                                            <span class="radio-circle"></span>
                                            <a href="javascript:void(0);" class="chf">Virement bancaire</a>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <label class="custom-radio">
                                            <input type="radio" id="bulletin" name="payment_method" value="bulletin">
                                            <span class="radio-circle"></span>
                                            <a href="{{ route('civitas.soutenir_receipt') }}" class="chf">Bulletin de versement</a>
                                        </label>
                                    </td>
                                </tr>
                            </table>

                            <div class="d-flex flex-row mt-2">
                                <div class="text-black me-2">*</div>
                                <img src="{{ asset('img/civitas/payment-methods.svg') }}" class="" alt="info" />
                            </div>
                            <div id="payment_info_errors" class="text-danger"></div>
                        </div>
                        <div class="horizontal-line-table mb-3 mb-sm-3 mb-md-3 mb-lg-5 mb-xl-5 mb-xxl-5"></div>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-lg-5 col-xl-6 col-xxl-6">
                        <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0">
                            <div class="d-flex align-items-center mb-3 mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0">
                                <div class="red-circle d-flex justify-content-center align-items-center">3</div>
                                <div class="table-title">Saisir vos informations personnelles</div>
                            </div>
                            <table class="table-1 w-100">
                                <tr>
                                    <td>
                                        <div class="select-salutation dropdown w-100">
                                            <select id="salutation" name="gender" required>
                                                <option disabled @if(!Auth::check()) selected @endif>Salutation</option>
                                                @auth
                                                <option value="mr" @if(Auth::user()->gender == 'mr') selected @endif>M.</option>
                                                <option value="mrs" @if(Auth::user()->gender == 'mrs') selected @endif>Mme</option>
                                                @else
                                                <option value="mr">M.</option>
                                                <option value="mrs">Mme</option>
                                                @endauth
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        @auth
                                        <input
                                            type="text"
                                            id="name"
                                            name="firstname"
                                            value="{{ Auth::user()->firstname }}"
                                            readonly>
                                        @else
                                        <div class="input-wrapper">
                                            <input type="text" id="name" name="firstname" placeholder="Prénom">
                                            <span class="error-icon" style="display: none;">!</span>
                                        </div>
                                        @endauth
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        @auth
                                        <input
                                            type="text"
                                            id="surname"
                                            name="lastname"
                                            value="{{ Auth::user()->lastname }}"
                                            readonly>
                                        @else
                                        <div class="input-wrapper">
                                            <input type="text" id="surname" name="lastname" placeholder="Nom de famille">
                                            <span class="error-icon" style="display: none;">!</span>
                                        </div>
                                        @endauth
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        @auth
                                        <input
                                            type="email"
                                            id="e-mail"
                                            name="email"
                                            value="{{ Auth::user()->email }}"
                                            readonly>
                                        @else
                                        <div class="input-wrapper">
                                            <input type="email" id="e-mail" name="email" placeholder="Adresse e-mail">
                                            <span class="error-icon" style="display: none;">!</span>
                                        </div>
                                        @endauth
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0 notes-style">
                                        <textarea type="text" id="notes" name="notes" placeholder="Remarques (facultatif)" class="pt-2"></textarea>
                                    </td>
                                </tr>
                            </table>
                            <div id="personal_info_errors" class="text-danger"></div>
                        </div>
                        <div class="horizontal-line-table my-5 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none"></div>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-lg-5 col-xl-6 col-xxl-6">
                        <div class="">
                            <div class="d-flex align-items-center mb-3">
                                <div class="red-circle d-flex justify-content-center align-items-center">4</div>
                                <div class="table-title">Saisir votre adresse</div>
                            </div>
                            <table class="table-1 w-100">
                                <tr>
                                    <td>
                                        <div class="input-wrapper">
                                            <input type="text" id="street" name="street" placeholder="Rue">
                                            <span class="error-icon" style="display: none;">!</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <div class="input-wrapper">
                                            <input type="text" id="number" name="number" placeholder="Numéro">
                                            <span class="error-icon" style="display: none;">!</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <input type="text" id="complement" name="complement" placeholder="Complément (facultatif)">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <div class="input-wrapper">
                                            <input type="text" id="zipcode" name="zipcode" placeholder="Code postal">
                                            <span class="error-icon" style="display: none;">!</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <div class="input-wrapper">
                                            <input type="text" id="city" name="city" placeholder="Ville">
                                            <span class="error-icon" style="display: none;">!</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <div class="select-country dropdown w-100">
                                            <select name="country" id="country">
                                                <option disabled selected value="">Pays</option>
                                                <option value="ch-suisse">CH SUISSE</option>
                                                <option value="fr-france">FR FRANCE</option>
                                                <option value="de-allemagne">DE ALLEMAGNE</option>
                                                <option value="i-italie">I ITALIE</option>
                                                <option value="a-autriche">A AUTRICHE</option>
                                                <option value="qc-quebec">QC QUEBEC</option>
                                                <option value="world">RESTE DU MONDE</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div id="address_info_errors" class="text-danger"></div>
                        </div>
                        <div class="horizontal-line-table mt-5 mb-4 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 ">
                <div class="d-flex align-items-center mb-5">
                    <div class="red-circle d-flex justify-content-center align-items-center">5</div>
                </div>
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <button type="submit" class="send-donate d-flex justify-content-center align-items-center my-3">
                        <img src="{{ asset('img/civitas/civitas_logo_pdf.png') }}" class="small-logo me-1 me-sm-1 me-md-1 me-lg-3 me-xl-3 me-xxl-3 donate-img" alt="logo" />
                        Confirmer la don en toute sécurité
                    </button>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('img/civitas/soutenir-lock.png') }}" class="" alt="logo" />
                    </div>
                    <div class="d-flex align-items-center my-3">
                        <div class="soutenir-black-bg-marquee d-flex align-items-center">
                            <marquee behavior="scroll" direction="right" scrollamount="12" class="soutenir-marquee">PROTECTION DES DONNÉES / DATENSCHUTZE</marquee>
                        </div>
                    </div>
                    <div>
                        <div class="horizontal-line-table my-4"></div>
                        <div class="soutenir-title-card mb-2">Notre numéro de compte est le suivant :</div>
                        <div class="soutenir-banking">CH57 0900 0000 1772 4572 3</div>
                        <div class="horizontal-line-table my-4"></div>
                    </div>
                    <div>
                        <div class="soutenir-question">AVEZ-VOUS UNE QUESTION ?</div>
                        <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
                            <div class="soutenir-small-line my-4"></div>
                        </div>
                    </div>
                    <div class="d-flex flex-column my-3">
                        <div class="soutenir-before-email mb-3">Notre trésorier est à votre disposition.</div>
                        <a href="mailto:tresorier@civitassuisse.ch" class="soutenir-email">tresorier@civitassuisse.ch</a>
                    </div>
                </div>
                <div class="horizontal-line-table my-5 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none"></div>
            </div>
        </div>
    </form>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="soutenir-grey-bg p-5">
        <div class="row">
            <div class="col-7">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="soutenir-red-box d-flex justify-content-center align-items-center flex-column p-3">
                        {!! trans('words.soutenir_red_box') !!}
                    </div>
                </div>
            </div>
            <div class="col-1">
                <div class="d-flex align-itmes-center h-100">
                    <div class="soutenir-last-line"></div>
                </div>
            </div>
            <div class="col-4">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="soutenir-black-box d-flex justify-content-center align-items-center flex-column p-3">
                        {!! trans('words.soutenir_black_box') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="soutenir-red-box d-flex justify-content-center align-items-center flex-column p-3">
                {!! trans('words.soutenir_red_box') !!}
            </div>
        </div>
    </div>
    <div class="my-5"></div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="soutenir-black-box d-flex justify-content-center align-items-center flex-column px-5 py-4">
            {!! trans('words.soutenir_black_box') !!}
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('input[name="payment_method"]').on('change', function() {
        if (this.value === 'bulletin') {
            $('#country').val('ch-suisse');
        } else {
            $('#country').val('');
        }
    });

    $(document).on("submit", "#donation-form", function(e) {
        e.preventDefault();

        $(".input-error").removeClass("input-error");
        $(".radio-error").removeClass("radio-error");
        $(".input-invalid").removeClass("input-invalid");
        $(".error-icon").hide();
        $(".text-danger").empty();

        const formData = new FormData(this);

        $.ajax({
            url: "{{ route('donation-store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    toastr.success("Donation sent successfully!", "Success");
                    $("#donation-form")[0].reset();

                    if (response.redirect) {
                        window.location.href = response.redirect;
                    }
                } else {
                    $.each(response.errors, function(fieldGroup, messages) {
                        const errorContainer = $("#" + fieldGroup + "_errors");
                        if (errorContainer.length) {
                            errorContainer
                                .addClass("input-error")
                                .html(messages.join("<br>"));
                        }

                        const field = $("[name='" + fieldGroup + "']");
                        if (field.length) {
                            field.addClass("input-invalid");
                            field.closest(".input-wrapper").find(".error-icon").show();
                        }

                        if (fieldGroup === "payment_method") {
                            $("input[name='payment_method']").addClass("radio-error");
                        }

                        if (fieldGroup === "amount_type") {
                            $("input[name='amount_type']").addClass("radio-error");
                        }
                    });

                }
            },
            error: function() {
                toastr.error("Une erreur inattendue est survenue.");
            }
        });
    });

    $(document).on("change", "input[name='payment_method']", function() {
        $("input[name='payment_method']").removeClass("radio-error");
        $("#payment_info_errors").removeClass("input-error").empty();
    });
    $(document).on("change", "input[name='amount_type']", function() {
        $("input[name='amount_type']").removeClass("radio-error");
        $("#amount_info_errors").removeClass("input-error").empty();
    });
</script>
@endsection