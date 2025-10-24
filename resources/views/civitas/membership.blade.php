@extends('civitas.app')

@section('top-content')
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="grey-mobile-height">
        <div class="civitas-grey-menu d-flex align-items-center justify-content-between p-3">
            <a href="{{ route('political-programs') }}" class="civitas-responsive-header-grey">POSITIONS</a>
            <a href="{{ route ('civitas.party') }}" class="civitas-responsive-header-grey">MOUVEMENT</a>
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
<img src="{{ asset('img/civitas/membership-1.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
<img src="{{ asset('img/civitas/responsive/membership-1.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none ">
<div class="position-relative">
    <img src="{{ asset('img/civitas/membership-2.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <img src="{{ asset('img/civitas/responsive/membership-2.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none ">
    <div class="position-absolute top-50 start-50 translate-middle w-100">
        {!! trans('words.civitas_membership_title') !!}
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="d-flex justify-content-center">
            <div class="position-relative">
                <img src="{{ asset('img/civitas/membership-60.png') }}" class="">
                <div class="membership-top-right">
                    <div class="white-box-membership d-flex justify-content-center align-items-center">
                        <div class="membership-top-right-content">CONTRIBUTION ANNUELLE<br>INDIVIDUELLE</div>
                    </div>
                </div>
                <div class="membership-star-content position-relative">
                    <div class="absolute-stars">
                        <div class="d-flex align-items-center">
                            <div class="image-container-star">
                                <img src="{{ asset('img/civitas/membership-star.png') }}" class="default-image member-star" alt="star" />
                                <img src="{{ asset('img/civitas/membership-star-hover.png') }}" class="hover-star member-star" alt="star" />
                            </div>
                            <div class="membership-payment ms-4">Abonnement à la revue.</div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="image-container-star">
                                <img src="{{ asset('img/civitas/membership-star.png') }}" class="default-image member-star" alt="star" />
                                <img src="{{ asset('img/civitas/membership-star-hover.png') }}" class="hover-star member-star" alt="star" />
                            </div>
                            <div class="membership-payment ms-4">Accès gratuit aux conférences</div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="image-container-star">
                                <img src="{{ asset('img/civitas/membership-star.png') }}" class="default-image member-star" alt="star" />
                                <img src="{{ asset('img/civitas/membership-star-hover.png') }}" class="hover-star member-star" alt="star" />
                            </div>
                            <div class="membership-payment ms-4">Accès au cercle d’études</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-5"></div>
        <div class="d-flex justify-content-center">
            <div class="position-relative">
                <img src="{{ asset('img/civitas/membership-30.png') }}" class="">
                <div class="membership-top-right">
                    <div class="white-box-membership d-flex justify-content-center align-items-center">
                        <div class="membership-top-right-content">CONTRIBUTION ANNUELLE<br>INDIVIDUELLE</div>
                    </div>
                </div>
                <div class="membership-star-content position-relative">
                    <div class="absolute-stars">
                        <div class="d-flex align-items-center">
                            <div class="image-container-star">
                                <img src="{{ asset('img/civitas/membership-star.png') }}" class="default-image member-star" alt="star" />
                                <img src="{{ asset('img/civitas/membership-star-hover.png') }}" class="hover-star member-star" alt="star" />
                            </div>
                            <div class="membership-payment ms-4">Accès gratuit aux conférences</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-5"></div>
        <div class="d-flex justify-content-center">
            <div class="position-relative">
                <img src="{{ asset('img/civitas/membership-80.png') }}" class="">
                <div class="membership-top-right">
                    <div class="white-box-membership d-flex justify-content-center align-items-center">
                        <div class="membership-top-right-content">CONTRIBUTION ANNUELLE<br>INDIVIDUELLE</div>
                    </div>
                </div>
                <div class="membership-star-content position-relative">
                    <div class="membership-star-content position-relative">
                        <div class="absolute-stars">
                            <div class="d-flex align-items-center">
                                <div class="image-container-star">
                                    <img src="{{ asset('img/civitas/membership-star.png') }}" class="default-image member-star" alt="star" />
                                    <img src="{{ asset('img/civitas/membership-star-hover.png') }}" class="hover-star member-star" alt="star" />
                                </div>
                                <div class="membership-payment ms-4">Abonnement à la revue.</div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="image-container-star">
                                    <img src="{{ asset('img/civitas/membership-star.png') }}" class="default-image member-star" alt="star" />
                                    <img src="{{ asset('img/civitas/membership-star-hover.png') }}" class="hover-star member-star" alt="star" />
                                </div>
                                <div class="membership-payment ms-4">Accès gratuit aux conférences</div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="image-container-star">
                                    <img src="{{ asset('img/civitas/membership-star.png') }}" class="default-image member-star" alt="star" />
                                    <img src="{{ asset('img/civitas/membership-star-hover.png') }}" class="hover-star member-star" alt="star" />
                                </div>
                                <div class="membership-payment ms-4">Accès au cercle d’études</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
        <div class="d-flex justify-content-center">
            <div class="position-relative">
                <img src="{{ asset('img/civitas/membership-60.png') }}" class="">
                <div class="membership-top-right">
                    <div class="white-box-membership d-flex justify-content-center align-items-center">
                        <div class="membership-top-right-content">CONTRIBUTION ANNUELLE<br>INDIVIDUELLE</div>
                    </div>
                </div>
                <div class="membership-star-content position-relative">
                    <div class="absolute-stars">
                        <div class="d-flex align-items-center">
                            <div class="image-container-star">
                                <img src="{{ asset('img/civitas/responsive/membership-star.png') }}" class="default-image member-star" alt="star" />
                                <img src="{{ asset('img/civitas/responsive/membership-star-hover.png') }}" class="hover-star member-star" alt="star" />
                            </div>
                            <div class="membership-payment ms-4">Abonnement à la revue.</div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="image-container-star">
                                <img src="{{ asset('img/civitas/responsive/membership-star.png') }}" class="default-image member-star" alt="star" />
                                <img src="{{ asset('img/civitas/responsive/membership-star-hover.png') }}" class="hover-star member-star" alt="star" />
                            </div>
                            <div class="membership-payment ms-4">Accès gratuit aux conférences</div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="image-container-star">
                                <img src="{{ asset('img/civitas/responsive/membership-star.png') }}" class="default-image member-star" alt="star" />
                                <img src="{{ asset('img/civitas/responsive/membership-star-hover.png') }}" class="hover-star member-star" alt="star" />
                            </div>
                            <div class="membership-payment ms-4">Accès au cercle d’études</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-5"></div>
        <div class="d-flex justify-content-center">
            <div class="position-relative">
                <img src="{{ asset('img/civitas/membership-30.png') }}" class="">
                <div class="membership-top-right">
                    <div class="white-box-membership d-flex justify-content-center align-items-center">
                        <div class="membership-top-right-content">CONTRIBUTION ANNUELLE<br>INDIVIDUELLE</div>
                    </div>
                </div>
                <div class="membership-star-content position-relative">
                    <div class="absolute-stars">
                        <div class="d-flex align-items-center">
                            <div class="image-container-star">
                                <img src="{{ asset('img/civitas/responsive/membership-star.png') }}" class="default-image member-star" alt="star" />
                                <img src="{{ asset('img/civitas/responsive/membership-star-hover.png') }}" class="hover-star member-star" alt="star" />
                            </div>
                            <div class="membership-payment ms-4">Accès gratuit aux conférences</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-5"></div>
        <div class="d-flex justify-content-center">
            <div class="position-relative">
                <img src="{{ asset('img/civitas/membership-80.png') }}" class="">
                <div class="membership-top-right">
                    <div class="white-box-membership d-flex justify-content-center align-items-center">
                        <div class="membership-top-right-content">CONTRIBUTION ANNUELLE<br>INDIVIDUELLE</div>
                    </div>
                </div>
                <div class="membership-star-content position-relative">
                    <div class="membership-star-content position-relative">
                        <div class="absolute-stars">
                            <div class="d-flex align-items-center">
                                <div class="image-container-star">
                                    <img src="{{ asset('img/civitas/responsive/membership-star.png') }}" class="default-image member-star" alt="star" />
                                    <img src="{{ asset('img/civitas/responsive/membership-star-hover.png') }}" class="hover-star member-star" alt="star" />
                                </div>
                                <div class="membership-payment ms-4">Abonnement à la revue.</div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="image-container-star">
                                    <img src="{{ asset('img/civitas/responsive/membership-star.png') }}" class="default-image member-star" alt="star" />
                                    <img src="{{ asset('img/civitas/responsive/membership-star-hover.png') }}" class="hover-star member-star" alt="star" />
                                </div>
                                <div class="membership-payment ms-4">Accès gratuit aux conférences</div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="image-container-star">
                                    <img src="{{ asset('img/civitas/responsive/membership-star.png') }}" class="default-image member-star" alt="star" />
                                    <img src="{{ asset('img/civitas/responsive/membership-star-hover.png') }}" class="hover-star member-star" alt="star" />
                                </div>
                                <div class="membership-payment ms-4">Accès au cercle d’études</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<form id="membership-form" method="POST" action="{{ route('membership-store') }}">
    @csrf
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="position-relative">
            <img src="{{ asset('img/civitas/membership-new.png') }}" class="w-100">
            <div class="position-absolute top-50 start-50 translate-middle">
                <div class="agree-membership-width">
                    <div class="d-flex align-items-start">
                        <input type="checkbox" id="agree-membership" />
                        <label for="agree-membership" class="membership-checkbox ms-4">Contribution annuelle (avec abonnement à la Revue) réduite à CHF 45<br><span class="membership-checkbox-small">
                                Pour les membres du Clergé, les personnes bénéficiaires de l’AVS / AI, les stagiaires, les étudiants, les personnes en difficulté financière.</span></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="container">
        <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
            <div class="col-12">
                <div class="horizontal-line-table my-4"></div>
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <div class="soutenir-question-responsive">AVEZ-VOUS UNE QUESTION ?</div>
                    <div class="soutenir-small-line my-4"></div>
                    <div class="mb-3">
                        <div class="membership-content-responsive">Responsable national (-------) :</div>
                        <a href="javascript:void(0);" class="membership-content-responsive">------</a>
                    </div>
                    <div class="mb-3">
                        <div class="membership-content-responsive">Du lundi au vendredi de 17h00 à 20h00 (mercredi excepté) et samedi de 09h00 à 12h00.</div>
                    </div>
                    <div>
                        <div class="membership-content-responsive">Ou par e-mail :</div>
                        <a href="javascript:void(0);" class="membership-content-responsive">-------------------</a>
                    </div>
                </div>
                <div class="horizontal-line-table my-4"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4">
                <div class="table-height">
                    <div class="d-flex align-items-center mb-4">
                        <div class="red-circle d-flex justify-content-center align-items-center">1</div>
                        <div class="table-title">Montant de la cotisation</div>
                    </div>
                    <table class="table-1 w-100" id="amount_type_table">
                        <tr>
                            <td>
                                <label class="chf custom-radio">
                                    <input type="radio" id="chf60" name="amount_type" value="60">
                                    <span class="radio-circle"></span>
                                    CHF 60
                            </td>
                        </tr>
                        <tr>
                            <td class="border-top-0">
                                <label class="chf custom-radio">
                                    <input type="radio" id="chf30" name="amount_type" value="30">
                                    <span class="radio-circle"></span>
                                    CHF 30
                            </td>
                        </tr>
                        <tr>
                            <td class="border-top-0">
                                <label class="chf custom-radio">
                                    <input type="radio" id="chf80" name="amount_type" value="80">
                                    <span class="radio-circle"></span>
                                    CHF 80
                            </td>
                        </tr>
                    </table>
                    <div id="amount_info_errors" class="text-danger"></div>
                </div>
                <div class="horizontal-line-table mb-3 mb-sm-3 mb-md-3 mb-lg-5 mb-xl-5 mb-xxl-5"></div>
            </div>
            <div class="col-12 col-md-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4">
                <div class="table-height mt-5 mt-lg-0">
                    <div class="d-flex align-items-center mb-3 mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0">
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
            <div class="space-50 d-block d-lg-none"></div>
            <div class="col-12 col-md-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4">
                <div class="table-height">
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
                <div class="horizontal-line-table mb-3 mb-sm-3 mb-md-3 mb-lg-5 mb-xl-5 mb-xxl-5"></div>
            </div>
            <div class="space-50 d-block d-lg-none"></div>
            <div class="col-12 col-md-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4">
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
            <div class="col-12 col-md-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4 ">
                <div class="d-flex align-items-center mb-3">
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
    </div>
</form>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="d-flex justify-content-center align-items-center flex-column flex-lg-row">
        <div class="membership-last-box-grey d-flex flex-column justify-content-center align-items-center">
            <div class="membership-last-content">Envie de vous engager auprès de l’un de nos groupes diocésains ?</div>
            <a href="{{ route('civitas.diocesains') }}" class="membership-last-box-grey-button d-flex justify-content-center align-items-center mt-3">POUR LE CHRIST-ROI !</a>
        </div>
        <div class="mx-5"></div>
        <div class="membership-last-box-red d-flex flex-column justify-content-center align-items-center">
            <div class="membership-last-content">Un immense MERCI pour votre confiance ! On se réjouit de vous revoir bientôt !</div>
            <a href="javascript:void(0);" class="membership-last-box-red-button d-flex justify-content-center align-items-center mt-3">PROCHAIN ÉVÉNEMENT</a>
        </div>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@endsection

@section('scripts')
<script>
    $('#agree-membership').on('change', function() {
        const $chf30Row = $('#chf80').closest('tr');
        const $existing = $('#radio-45');

        if ($(this).is(':checked')) {
            if ($existing.length === 0) {
                const newRow = `
                    <tr class="border-top-0" id="radio-45">
                        <td class="border-top-0">
                            <label class="chf custom-radio">
                                <input type="radio" id="chf45" name="amount_type" value="45" checked>
                                <span class="radio-circle"></span>
                                CHF 45
                            </label>
                        </td>
                    </tr>`;
                $chf30Row.after(newRow);
            }
        } else {
            $existing.remove();
        }
    });

    $(document).on('change', 'input[name="amount_type"]', function() {
        if (this.value !== '45') {
            $('#agree-membership').prop('checked', false);
            $('#radio-45').remove();
        }
    });


    $('input[name="payment_method"]').on('change', function() {
        if (this.value === 'bulletin') {
            $('#country').val('ch-suisse');
        } else {
            $('#country').val('');
        }
    });

    $(document).on("submit", "#membership-form", function(e) {
        e.preventDefault();

        $(".input-error").removeClass("input-error");
        $(".radio-error").removeClass("radio-error");
        $(".error-icon").hide();
        $(".text-danger").empty();

        const formData = new FormData(this);

        $.ajax({
            url: "{{ route('membership-store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    toastr.success("Member create successfully!", "Success");
                    $("#membership-form")[0].reset();

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