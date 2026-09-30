@extends('civitas.app')

@section('top-content')
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="grey-mobile-height">
        <div class="civitas-grey-menu d-flex align-items-center justify-content-between justify-content-md-evenly p-3">
            <a href="{{ route('civitas.agenda') }}" class="civitas-responsive-header-grey">{!! __('words.nav_agenda') !!}</a>
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
<div class="d-flex justify-content-center">
    <img src="{{ asset('img/civitas/soutenir.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/civitas/soutenir.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none w-100" alt="logo" />
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <form id="donation-form" method="POST" action="{{ route('donation-store') }}">
        @csrf
        <div class="row justify-content-md-center">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-5 col-xl-6 col-xxl-6">
                        <div class="table-height">
                            <div class="d-flex align-items-center mb-4">
                                <div class="step-circle d-flex justify-content-center align-items-center {{ session('selected_value') ? 'completed' : '' }}" id="step-circle-1">1</div>
                                <div class="table-title">{!! __('words.donate_amount') !!}</div>
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
                                            CHF 
                                            <input 
                                                type="number" 
                                                id="custom_amount_input" 
                                                name="amount" 
                                                placeholder="{!! __('words.donate_custom_amount') !!}"
                                                value="{{ session('custom_amount') ?? '' }}"
                                                min="1"
                                                step="0.01"
                                                style="border: none; outline: none; background: transparent; width: auto; max-width: 200px; display: inline;">
                                        </label>
                                    </td>
                                </tr>
                            </table>
                            <div class="d-flex justify-content-center align-items-center gap-4 mt-3">
                                <label class="chf custom-radio m-0 text-decoration-none">
                                    <input
                                        type="radio"
                                        id="cycle_monthly"
                                        name="billing_cycle"
                                        value="monthly"
                                        {{ session('billing_cycle', 'monthly') === 'monthly' ? 'checked' : '' }}>
                                    <span class="radio-circle ms-0"></span>
                                    <span>{!! __('words.donate_monthly') !!}</span>
                                </label>

                                <label class="chf custom-radio m-0 text-decoration-none">
                                    <input
                                        type="radio"
                                        id="cycle_annual"
                                        name="billing_cycle"
                                        value="annual"
                                        {{ session('billing_cycle') === 'annual' ? 'checked' : '' }}>
                                    <span class="radio-circle ms-0"></span>
                                    <span>{!! __('words.donate_annual') !!}</span>
                                </label>
                            </div>
                            <div id="amount_info_errors" class="text-danger"></div>
                        </div>
                        <div class="horizontal-line-table mb-3 mb-sm-3 mb-md-3 mb-lg-5 mb-xl-5 mb-xxl-5"></div>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-lg-5 col-xl-6 col-xxl-6">
                        <div class="table-height">
                            <div class="d-flex align-items-center mb-4 mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0">
                                <div class="step-circle d-flex justify-content-center align-items-center" id="step-circle-2">2</div>
                                <div class="table-title">{!! __('words.payment_choose_method') !!}</div>
                            </div>
                            <table class="table-1 w-100">
                                <tr>
                                    <td>
                                        <label class="custom-radio">
                                            <input type="radio" id="cash" name="payment_method" value="cash">
                                            <span class="radio-circle"></span>
                                            <a href="javascript:void(0);" class="chf">{!! __('words.payment_cash') !!}</a>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <label class="custom-radio">
                                            <input type="radio" id="online" name="payment_method" value="online">
                                            <span class="radio-circle"></span>
                                            <a href="javascript:void(0);" class="chf">{!! __('words.payment_electronic_transfer') !!}*</a>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <label class="custom-radio">
                                            <input type="radio" id="crypto" name="payment_method" value="crypto">
                                            <span class="radio-circle"></span>
                                            <a href="{{ route('civitas.soutenir_crypto') }}" class="chf">{!! __('words.payment_monero') !!}</a>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <label class="custom-radio">
                                            <input type="radio" id="bank" name="payment_method" value="bank">
                                            <span class="radio-circle"></span>
                                            <a href="javascript:void(0);" class="chf">{!! __('words.payment_bank_transfer') !!}</a>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <label class="custom-radio">
                                            <input type="radio" id="bulletin" name="payment_method" value="bulletin">
                                            <span class="radio-circle"></span>
                                            <a href="{{ route('civitas.soutenir_receipt') }}" class="chf">{!! __('words.payment_deposit_slip') !!}</a>
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
                                <div class="step-circle d-flex justify-content-center align-items-center" id="step-circle-3">3</div>
                                <div class="table-title">{!! __('words.form_enter_personal_info') !!}</div>
                            </div>
                            <table class="table-1 w-100">
                                <tr>
                                    <td>
                                        <div class="select-salutation dropdown w-100">
                                            <select id="salutation" name="gender" required>
                                                <option disabled @if(!Auth::check()) selected @endif>{!! __('words.form_salutation') !!}</option>
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
                                            <input type="text" id="name" name="firstname" placeholder="{!! __('words.form_first_name') !!}">
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
                                            <input type="text" id="surname" name="lastname" placeholder="{!! __('words.form_last_name') !!}">
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
                                            <input type="email" id="e-mail" name="email" placeholder="{!! __('words.form_email') !!}">
                                            <span class="error-icon" style="display: none;">!</span>
                                        </div>
                                        @endauth
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0 notes-style">
                                        <textarea type="text" id="notes" name="notes" placeholder="{!! __('words.form_notes_optional') !!}" class="pt-2"></textarea>
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
                                <div class="step-circle d-flex justify-content-center align-items-center" id="step-circle-4">4</div>
                                <div class="table-title">{!! __('words.form_enter_address') !!}</div>
                            </div>
                            <table class="table-1 w-100">
                                <tr>
                                    <td>
                                        <div class="input-wrapper">
                                            <input type="text" id="street" name="street" placeholder="{!! __('words.form_street') !!}">
                                            <span class="error-icon" style="display: none;">!</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <div class="input-wrapper">
                                            <input type="text" id="number" name="number" placeholder="{!! __('words.form_number') !!}">
                                            <span class="error-icon" style="display: none;">!</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <input type="text" id="complement" name="complement" placeholder="{!! __('words.form_complement_optional') !!}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <div class="input-wrapper">
                                            <input type="text" id="zipcode" name="zipcode" placeholder="{!! __('words.form_postal_code') !!}">
                                            <span class="error-icon" style="display: none;">!</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <div class="input-wrapper">
                                            <input type="text" id="city" name="city" placeholder="{!! __('words.form_city') !!}">
                                            <span class="error-icon" style="display: none;">!</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top-0">
                                        <div class="select-country dropdown w-100">
                                            <select name="country" id="country">
                                                <option disabled selected value="">{!! __('words.form_country') !!}</option>
                                                <option value="ch-suisse">{!! __('words.form_country_switzerland') !!}</option>
                                                <option value="fr-france">{!! __('words.form_country_france') !!}</option>
                                                <option value="de-allemagne">{!! __('words.form_country_germany') !!}</option>
                                                <option value="i-italie">{!! __('words.form_country_italy') !!}</option>
                                                <option value="a-autriche">{!! __('words.form_country_austria') !!}</option>
                                                <option value="qc-quebec">{!! __('words.form_country_quebec') !!}</option>
                                                <option value="world">{!! __('words.form_country_rest_of_world') !!}</option>
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
                    <div class="step-circle d-flex justify-content-center align-items-center" id="step-circle-5">5</div>
                </div>
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <button type="submit" class="send-donate d-flex justify-content-center align-items-center my-3">
                        <img src="{{ asset('img/civitas/civitas_logo_pdf.png') }}" class="small-logo me-1 me-sm-1 me-md-1 me-lg-3 me-xl-3 me-xxl-3 donate-img" alt="logo" />
                        {!! __('words.payment_confirm_secure') !!}
                    </button>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('img/civitas/soutenir-lock.png') }}" class="" alt="logo" />
                    </div>
                    <div class="d-flex align-items-center my-3">
                        <a href="{{ route('footer.protection') }}" class="text-decoration-none d-block">
                            <div class="soutenir-black-bg-marquee d-flex align-items-center">
                                <marquee behavior="scroll" direction="right" scrollamount="12" class="soutenir-marquee">{!! __('words.payment_data_protection') !!}</marquee>
                            </div>
                        </a>
                    </div>
                    <div>
                        <div class="horizontal-line-table my-4"></div>
                        <div class="soutenir-title-card mb-2">{!! __('words.payment_account_number') !!}</div>
                        <div class="soutenir-banking">CH57 0900 0000 1772 4572 3</div>
                        <div class="horizontal-line-table my-4"></div>
                    </div>
                    <div>
                        <div class="soutenir-question">{!! __('words.form_have_question') !!}</div>
                        <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
                            <div class="soutenir-small-line my-4"></div>
                        </div>
                    </div>
                    <div class="d-flex flex-column my-3">
                        <div class="soutenir-before-email mb-3">{!! __('words.payment_treasurer_available') !!}</div>
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
    // When custom amount input is focused, check the custom radio
    $('#custom_amount_input').on('focus', function() {
        $('#chf_custom').prop('checked', true).trigger('change');
    });
    
    // When custom amount input changes, update session
    $('#custom_amount_input').on('blur', function() {
        const customValue = $(this).val();
        
        if (customValue && customValue > 0) {
            $.ajax({
                url: '{{ route("set-donation-amount") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    amount_type: 'custom',
                    custom_amount: customValue,
                    billing_cycle: $('input[name="billing_cycle"]:checked').val()
                }
            });
        }
    });

    // Update session when amount changes on soutenir page
    $('input[name="amount_type"]').on('change', function() {
        const selectedValue = $(this).val();
        let customAmount = null;
        
        if (selectedValue === 'custom') {
            customAmount = $('#custom_amount_input').val();
        } else {
            customAmount = selectedValue;
        }
        
        $.ajax({
            url: '{{ route("set-donation-amount") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                amount_type: selectedValue,
                custom_amount: customAmount,
                billing_cycle: $('input[name="billing_cycle"]:checked').val()
            }
        });
    });
    
    // Update session when billing cycle changes
    $('input[name="billing_cycle"]').on('change', function() {
        const selectedAmount = $('input[name="amount_type"]:checked').val();
        let customAmount = null;
        
        if (selectedAmount === 'custom') {
            customAmount = $('#custom_amount_input').val();
        }
        
        $.ajax({
            url: '{{ route("set-donation-amount") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                amount_type: selectedAmount || '25',
                custom_amount: customAmount,
                billing_cycle: $(this).val()
            }
        });
    });

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

    // ---- Step completion tracking ----
    function isStep1Done() {
        return !!document.querySelector('input[name="amount_type"]:checked');
    }
    function isStep2Done() {
        return !!document.querySelector('input[name="payment_method"]:checked');
    }
    function isStep3Done() {
        var sal = document.getElementById('salutation');
        var n   = document.getElementById('name');
        var s   = document.getElementById('surname');
        var e   = document.getElementById('e-mail');
        return (sal && sal.value.trim()) && (n && n.value.trim()) && (s && s.value.trim()) && (e && e.value.trim());
    }
    function isStep4Done() {
        var st = document.getElementById('street');
        var z  = document.getElementById('zipcode');
        var c  = document.getElementById('city');
        var co = document.getElementById('country');
        return (st && st.value.trim()) && (z && z.value.trim()) && (c && c.value.trim()) && (co && co.value.trim());
    }

    function updateSteps() {
        var s2 = isStep2Done();
        var s3 = isStep3Done();
        var s4 = isStep4Done();

        document.getElementById('step-circle-2').classList.toggle('completed', s2);
        document.getElementById('step-circle-3').classList.toggle('completed', s3);
        document.getElementById('step-circle-4').classList.toggle('completed', s4);

        var s1 = document.getElementById('step-circle-1').classList.contains('completed');
        var allDone = s1 && s2 && s3 && s4;
        document.getElementById('step-circle-5').classList.toggle('completed', allDone);
    }

    $('input[name="amount_type"]').on('change', function() {
        document.getElementById('step-circle-1').classList.add('completed');
        updateSteps();
    });

    $('input[name="payment_method"]').on('change', updateSteps);
    $('#name, #surname, #e-mail, #street, #zipcode, #city').on('input', updateSteps);
    $('#salutation, #country').on('change', updateSteps);
</script>
@endsection