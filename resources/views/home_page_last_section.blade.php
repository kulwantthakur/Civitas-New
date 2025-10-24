<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="container-fluid"> <!--REMOVE CONTAINER-->
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                <div class="d-flex justify-content-end">
                    <div class="position-relative">
                        <div class="home-left-img p-4">
                            <div class="home-left-img-title ps-4">Un don pour <span class="red-box">restaurer</span> la Chrétienté !</div>
                            <div class="home-left-img-content">Chaque don, quelque soit le montant, nous permet d'engager une action concrète pour que la vérité sociale et politique puisse à nouveau être entendue par le plus grand nombre.</div>
                        </div>
                        <img src="{{ asset('img/home/home-bg-11.png') }}" class="" width="702" height="482" alt="logo">
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                <div class="d-flex justify-content-start">
                    <div class="position-relative">
                        <div class="position-absolute home-right-img mt-2">
                            <div class="d-flex align-items-center flex-column">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center home-right-image-box {{ session('selected_value') == 25 ? 'active-box-soutenir' : '' }}" data-value="25">CHF 25</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center home-right-image-box {{ session('selected_value') == 50 ? 'active-box-soutenir' : '' }}" data-value="50">CHF 50</a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center home-right-image-box {{ session('selected_value') == 120 ? 'active-box-soutenir' : '' }}" data-value="120">CHF 120</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center home-right-image-box {{ session('selected_value') == 500 ? 'active-box-soutenir' : '' }}" data-value="500">CHF 500</a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="d-flex align-items-center justify-content-center home-right-image-big-box {{ session('selected_value') == 'custom' ? 'active-box-soutenir' : '' }}">
                                            CHF
                                            <input type="text"
                                                name="custom_amount"
                                                id="custom-amount"
                                                class="home-right-image-big-box-italic"
                                                placeholder="MONTANT PERSONNALISÉ"
                                                value="{{ session('custom_amount') ?? '' }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('civitas.support') }}" class="d-flex align-items-center justify-content-evenly home-right-image-grey-box hover-blue">
                                            <img src="{{ asset('img/home/civitas_logo.svg') }}" alt="Image">
                                            <div class="home-right-image-grey-box-content">SOUTENIR</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="{{ asset('img/home/home_background2.png') }}" class="" width="702" height="482" alt="logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mb-4">
                <div class="">
                    <div class="position-relative">
                        <div class="home-left-img px-4 mt-5">
                            <div class="home-left-img-title">Un don pour <span class="red-box">restaurer</span> la Chrétienté !</div>
                            <div class="home-left-img-content">Chaque don, quelque soit le montant, nous permet d'engager une action concrète pour que la vérité sociale et politique puisse à nouveau être entendue par le plus grand nombre.</div>
                        </div>
                        <img src="{{ asset('img/home/home-page-1-responsive.png') }}" class="" height="331" width="100%" style="" alt="logo">
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                <div class="">
                    <div class="position-relative">
                        <div class="position-absolute home-right-img">
                            <div class="d-flex align-items-center flex-column">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center home-right-image-box {{ session('selected_value') == 25 ? 'active-box-soutenir' : '' }}" data-value="25">CHF 25</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center home-right-image-box {{ session('selected_value') == 50 ? 'active-box-soutenir' : '' }}" data-value="50">CHF 50</a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center home-right-image-box {{ session('selected_value') == 120 ? 'active-box-soutenir' : '' }}" data-value="120">CHF 120</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center home-right-image-box {{ session('selected_value') == 500 ? 'active-box-soutenir' : '' }}" data-value="500">CHF 500</a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="d-flex align-items-center justify-content-center home-right-image-big-box {{ session('selected_value') == 'custom' ? 'active-box-soutenir' : '' }}">
                                            CHF
                                            <input type="text"
                                                name="custom_amount"
                                                id="custom-amount"
                                                class="home-right-image-big-box-italic"
                                                placeholder="MONTANT PERSONNALISÉ"
                                                value="{{ session('custom_amount') ?? '' }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <a href="{{ route('civitas.support') }}" class="d-flex align-items-center justify-content-evenly home-right-image-grey-box hover-blue">
                                            <img src="{{ asset('img/home/soutenir-logo-responsive.png') }}" class="" alt="Image">
                                            <div class="home-right-image-grey-box-content">SOUTENIR</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="{{ asset('img/home/home_background2.png') }}" class="" width="100%" height="285" alt="logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>