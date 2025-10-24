@extends('civitas.app')

@section('top-content')
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="my-3">
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
<div class="container">
    <div class="d-flex flex-column align-items-center text-center">
        <div class="become-member-header mt-3">ADHÉRER À CIVITAS SUISSE</div>
        <div class="become-member-black-line"></div>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="position-relative">
    <img src="{{ asset('img/civitas/become-member.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/civitas/responsive/become-member-home-responsive.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    <div class="position-absolute top-50 start-50 translate-middle w-100">
        {!! trans('words.civitas_participer') !!}
        <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
            <div class="d-flex flex-row justify-content-center mt-4">
                <img src="{{ asset('/img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
                <a href="javascript:void(0);" download class="participer-pdf-download">La primauté du devoir d’état (PDF)</a>
            </div>
        </div>
    </div>
</div>
<div class="participer-bg-img-right">
    <div class="space-200"></div>
    <div class="position-relative">
        <div class="d-flex justify-content-end align-items-center">
            <div class="position-relative participer-cornered">
                <div class="cornered-content">
                    <img src="{{ asset('img/participer-logo-small.png') }}" class="me-3 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
                </div>
            </div>
        </div>
        <div class="participate-big-button-top">
            <a href="{{ route('civitas.join')}}" class="participer-home-button d-flex justify-content-center align-items-center">DEVENIR<br>MEMBRE</a>
        </div>
    </div>
    <div class="space-100"></div>
    <div class="container">
        <div class="row">
            <div class="d-flex align-items-center justify-content-center text-center flex-column flex-sm-column flex-md-column flex-lg-row flex-xl-row flex-xxl-row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="position-relative my-3">
                        <img src="{{ asset('img/civitas/participate1.png') }}" class="" alt="logo" />
                        <div class="position-absolute bottom-0 start-50 translate-middle">
                            <a href="{{ route('civitas.join')}}" class="participate-img-button d-flex justify-content-center align-items-center">FAIRE PARTIE DE CIVITAS SUISSE</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="position-relative my-3">
                        <img src="{{ asset('img/civitas/participate2.png') }}" class="" alt="logo" />
                        <div class="participer-img-content-absolute">
                            <div class="participer-img-content">Suivez nous sur Twitter, YouTube,<br>Instagram ou Telegram.</div>
                        </div>
                        <div class="position-absolute bottom-0 start-50 translate-middle">
                            <a href="{{ route('civitas.social')}}" class="participate-img-button d-flex justify-content-center align-items-center">SE METTRE EN RÉSEAU AVEC CIVITAS</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="position-relative my-3">
                        <img src="{{ asset('img/civitas/participate3.png') }}" class="" alt="logo" />
                        <div class="participer-img-content-sec">
                            <div class="participer-img-content">Soutenez-nous financièrement.<br>Nos campagnes ne sont pas gratuites.<br>Merci pour votre soutien !</div>
                        </div>
                        <div class="position-absolute bottom-0 start-50 translate-middle">
                            <a href="{{ route('civitas.soutenir') }}" class="participate-img-button d-flex justify-content-center align-items-center">FAIRE UN DON</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
        <div class="row">
            <div class="d-flex align-items-center justify-content-center text-center flex-column flex-sm-column flex-md-column flex-lg-row flex-xl-row flex-xxl-row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="position-relative my-3">
                        <img src="{{ asset('img/civitas/participate4.png') }}" class="" alt="logo" />
                        <div class="position-absolute bottom-0 start-50 translate-middle">
                            <a href="{{ route('civitas.events') }}" class="participate-img-button d-flex justify-content-center align-items-center">PARTICIPER À DES ÉVÉNEMENTS</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="position-relative my-3">
                        <img src="{{ asset('img/civitas/participate5.png') }}" class="" alt="logo" />
                        <div class="position-absolute bottom-0 start-50 translate-middle">
                            <a href="https://medias-culture-et-patrimoine.com/" target="_blank" class="participate-img-button d-flex justify-content-center align-items-center">VERS LA BOUTIQUE</a>
                        </div>
                    </div>
                </div>
                @if(isset($caritas))
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="position-relative my-3">
                        <img src="{{ asset($caritas->icon) }}" class="" alt="logo" />
                        <div class="position-absolute bottom-0 start-50 translate-middle">
                            <a href="{{ route('civitas.get_inform', ['caritas' => $caritas->url]) }}"
                                class="participate-img-button d-flex justify-content-center align-items-center">
                                S’INFORMER
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="space-100"></div>

@if(Auth::user())
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Create New Element</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createCaritas" method="POST" action="{{ route('page-store.store') }}" enctype="multipart/form-data" files="true">
                @csrf
                <input type="hidden" name="section_id" value="{{$section_id ?? ''}}">
                <input type="hidden" name="number_validation" value="2">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label">
                                URL*
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter a valid URL for the page."></i>
                            </label>
                            <input type="text" class="form-control custom-form" name="url" required>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Thumbnail*
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Upload a thumbnail with maximum width 370px and maximum height 250px. Accepted formats: PNG, JPEG, JPG."></i>
                            </label>
                            <input type="file" class="form-control custom-form" name="icon" accept=".png, .jpeg, .jpg" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Image*
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Upload an image with maximum width 650px and maximum height 900px. Accepted formats: PNG, JPEG, JPG."></i>
                            </label>
                            <input type="file" class="form-control custom-form" name="image" accept=".png, .jpeg, .jpg" required>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Image Responsive*
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Upload a responsive image with maximum width 300px and maximum height 400px. Accepted formats: PNG, JPEG, JPG."></i>
                            </label>
                            <input type="file" class="form-control custom-form" name="image_responsive" accept=".png, .jpeg, .jpg" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection


@section('scripts')
@if(Auth::user())
<script>
    $(document).on("submit", "#createCaritas", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        $.ajax({
            url: "{{ route('page-store.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#createModal").modal("hide");
                    $("#createCaritas")[0].reset();
                    toastr.success("{!! trans('words.message_successful_create') !!}", "{!! trans('words.message_success') !!}");
                    window.location.reload();
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
    });
</script>
@endif
@endsection