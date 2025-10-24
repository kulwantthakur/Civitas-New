@extends('civitas.app')

@section('top-content')
@if($page == 1 || $page == 2)
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="grey-mobile-height">
        <div class="civitas-grey-menu d-flex align-items-center justify-content-between p-3">
            <a href="{{ route('political-programs') }}" class="civitas-responsive-header-grey">POSITIONS</a>
            <a href="{{ route('civitas.party') }}" class="civitas-responsive-header-grey">MOUVEMENT</a>
            <a href="{{ route('civitas.news') }}" class="civitas-responsive-header-grey">ACTUALITÉS</a>
        </div>
    </div>
</div>
@else
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="grey-mobile-height">
        <div class="civitas-grey-menu d-flex align-items-center justify-content-between p-3">
            <a href="{{ route('civitas.agenda') }}" class="civitas-responsive-header-grey">AGENDA</a>
            <a href="{{ route('civitas.party') }}" class="civitas-responsive-header-grey">MOUVEMENT</a>
            <a href="j{{ route('civitas.news') }}" class="civitas-responsive-header-grey">ACTUALITÉS</a>
        </div>
    </div>
</div>
@endif
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
@if($page == 0)
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="position-relative">
    <img src="{{ asset('img/civitas/q&r.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/civitas/responsive/q&r.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none w-100" alt="logo" />
    <div class="join-position-center">
        <div class="join-civitas-title">OUI, j’adhère à CIVITAS</div>
        <div class="d-flex justify-content-center my-5">
            <a href="{{ route('civitas.advantages') }}" class="join-civitas-button d-flex justify-content-center align-items-center">DEVENIR MEMBRE</a>
        </div>
    </div>
</div>
<div class="space-200 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="border-bottom border-dark my-5 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none"></div>
<div class="position-relative">
    <div class="d-flex justify-content-center align-items-center">
        <div class="join-title">OMNIA INSTAURARE IN CHRISTO !</div>
        <div class="position-absolute end-0 bottom-0">
            <img src="{{ asset('img/civitas/questions.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
            <img src="{{ asset('img/civitas/responsive/question-red.png') }}" class="logo d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        </div>
    </div>
</div>
<div class="space-200 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="container">
    {!! trans('words.civitas_question') !!}
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="border-bottom border-dark my-3 my-sm-3 my-md-3 my-lg-5 my-xl-5 my-xxl-5"></div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="position-relative">
    <div class="d-flex justify-content-center align-items-center">
        <div class="join-title">DES QUESTIONS ?</div>
        <div class="position-absolute end-0 bottom-0">
            <img src="{{ asset('img/civitas/questions.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        </div>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="container">
    {!! trans('words.civitas_question_sec') !!}
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="d-flex flex-row justify-content-center align-items-center m-auto question-box-pdf">
    <img src="{{ asset('/img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
    <a href="javascript:void(0);" download class="participer-pdf-download">Nos principes (PDF)</a>
</div>
<div class="d-flex justify-content-center">
    <a href="{{ route('civitas.question') }}" class="question-last-button d-flex justify-content-center align-items-center my-5">PLUS DES QUESTIONS ? </a>
</div>
@elseif($page == 1 )
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="d-flex flex-column align-items-center text-center">
        <img src="{{ asset('/img/civitas/civitas_logo_pages.png') }}" class="d-none d-sm-none d-md-none -d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <div class="civitas-title-page mt-3">RÉSEAUX SOCIAUX</div>
        <div class="black-line-civitas"></div>
    </div>
</div>
<div class="space-50"></div>
<div class="position-relative">
    <img src="{{ asset('img/civitas/social.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/civitas/responsive/social.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    <div class="social-media-absolute-title w-100">
        <div class="socials-title">RETROUVEZ :</div>
    </div>
    <div class="social-media-absolute w-100">
        <div class="d-flex justify-content-evenly align-items-center flex-column flex-sm-column flex-md-column flex-lg-row flex-xl-row flex-xxl-row margin-top-big-social">
            <div class="socials-titles-overlay d-flex align-items-center justify-content-center justify-content-lg-start justify-content-xl-start justify-content-xxl-start">- La revue de l’actualité<br>sur le canal de Civitas International</div>
            <div class="d-flex align-items-center">
                <a href="https://x.com/Civitas_" target="_blank">
                    <img src="{{ asset('img/civitas/twitter-social.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
                    <img src="{{ asset('img/civitas/responsive/twitter-light.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none my-3" alt="logo" />
                </a>
            </div>
        </div>
        <div class="space-200 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
        <div class="d-flex justify-content-evenly align-items-center flex-column flex-sm-column flex-md-column flex-lg-row flex-xl-row flex-xxl-row margin-top-big-social">
            <div class="socials-titles-overlay d-flex align-items-center justify-content-center justify-content-lg-start justify-content-xl-start justify-content-xxl-start">- Les plus belles images de la Suisse<br>catholique et de splendides<br>méditations métapolitiques sur<br>notre canal Instagram « Vox<br>Helvetica »
            </div>
            <div class="d-flex align-items-center">
                <a href="https://www.instagram.com/vox_helvetica/" target="_blank">
                    <img src="{{ asset('img/civitas/instagram-social.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
                    <img src="{{ asset('img/civitas/responsive/instagram-light.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none my-3" alt="logo" />
                </a>
            </div>
        </div>
        <div class="space-200 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
        <div class="d-flex justify-content-evenly align-items-center flex-column flex-sm-column flex-md-column flex-lg-row flex-xl-row flex-xxl-row margin-top-big-social">
            <div class="socials-titles-overlay d-flex align-items-center justify-content-center justify-content-lg-start justify-content-xl-start justify-content-xxl-start">- Toutes les dernières conférences et<br>cours sur le canal YouTube Civitas<br>International</div>
            <div class="d-flex align-items-center">
                <a href="https://www.youtube.com/@Civitas_International" target="_blank">
                    <img src="{{ asset('img/civitas/youtube-social.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
                    <img src="{{ asset('img/civitas/responsive/youtube-light.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none my-3" alt="logo" />
                </a>
            </div>
        </div>
        <div class="space-200 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
        <div class="d-flex justify-content-evenly align-items-center  flex-column flex-sm-column flex-md-column flex-lg-row flex-xl-row flex-xxl-row margin-top-big-social">
            <div class="socials-titles-overlay d-flex align-items-center justify-content-center justify-content-lg-start justify-content-xl-start justify-content-xxl-start">- Les nouvelles du jour sur notre canal<br>Telegram</div>
            <div class="d-flex align-items-center">
                <a href="https://t.me/civitas_suisse" target="_blank">
                    <img src="{{ asset('img/civitas/telegram-social.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
                    <img src="{{ asset('img/civitas/responsive/telegram-light.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none my-3" alt="logo" />
                </a>
            </div>
        </div>
    </div>
    <div class="social-red-box d-flex justify-content-center align-items-center flex-column">
        <div class="social-red-box-content">LES POSITIONS POLITIQUES<br>DE CIVITAS SUISSE</div>
        <a href="{{ route('political-program-home') }}" class="social-red-box-button d-flex justify-content-center align-items-center mt-5">VOIR LES THÈMES</a>
    </div>
</div>
<div class="space-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none"></div>
<div class="space-200 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
@elseif($page == 2)
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="d-flex flex-column align-items-center text-center">
        <img src="{{ asset('img/civitas/logo-civitas.png') }}" class="d-none d-sm-none d-md-none -d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('/img/civitas/responsive/civitas_logo_pages.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        <div class="civitas-title-page mt-3">LA REVUE CARITAS</div>
        <div class="black-line-civitas"></div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="get-inform-par">{!! $caritas_page->content !!}</div>
    <div class="d-flex justify-content-center align-items-center my-4 my-sm-4 my-md-4 my-lg-5 my-xl-5 my-xxl-5">
        <a href="javascript:void(0);" class="get-info-first-button d-flex justify-content-center align-items-center">COMMANDER</a>
    </div>
    {!! trans('words.civitas_get_inform_title') !!}
    <div class="d-flex justify-content-center align-items-center my-3 my-sm-3 my-md-3 my-lg-5 my-xl-5 my-xxl-5">
        <a href=" javascript:void(0);" class="get-info-sec-button d-flex justify-content-center align-items-center">DEVENIR MEMBRES </a>
    </div>
</div>
<div class="space-800 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="space-300 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none"></div>
<div class="position-relative">
    <img src="{{ asset('img/civitas/get_inform_black_bg.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/civitas/responsive/get_inform_black_bg.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    <div class="get-inform-position-img">
        <img src="{{ asset($caritas_page->image) }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" height="890" alt="logo" />
        <img src="{{ asset($caritas_page->image_responsive) }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-3 mt-sm-3 mt-md-3 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="get-inform-par">{!! $caritas_page->content_sec !!}</div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
@endif

@if(Auth::user() && ($page == 2))
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Page</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateCaritas" method="POST" action="{{ route('page-store.update', $caritas_page->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="number_validation" value="2">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label">URL</label>
                            <input type="text" class="form-control custom-form" name="url" value="{{ $caritas_page->url }}">
                        </div>
                        <div class="my-3"></div>
                        <div class="col-12">
                            <label class="form-label">Content</label>
                            <div id="summernote-caritas-edit" class="content"></div>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-12">
                            <label class="form-label">Second Paragraph Content</label>
                            <div id="summernote-caritas-edit_sec" class="content_sec"></div>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Current Thumbnail</label>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset($caritas_page->icon) }}" alt="Current Icon" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Current Image</label>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset($caritas_page->image) }}" alt="Current Image" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Upload New Thumbnail
                                <i class="fa-solid fa-info-circle ms-1"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="right"
                                    title="Upload a thumbnail with maximum width 400px and maximum height 380px. Accepted formats: PNG, JPEG, JPG.">
                                </i>
                            </label>
                            <input type="file" class="form-control custom-form" name="icon" accept=".png, .jpeg, .jpg">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Upload New Image
                                <i class="fa-solid fa-info-circle ms-1"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="right"
                                    title="Upload an image with maximum width 650px and maximum height 900px. Accepted formats: PNG, JPEG, JPG.">
                                </i>
                            </label>
                            <input type="file" class="form-control custom-form" name="image" accept=".png, .jpeg, .jpg">
                        </div>

                        <div class="my-3"></div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Current Image Responsive</label>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset($caritas_page->image_responsive) }}" alt="Current Image" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3"></div>
                        <div class="my-3"></div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Upload New Image Responsive
                                <i class="fa-solid fa-info-circle ms-1"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="right"
                                    title="Upload a responsive image with a maximum width of 300px and maximum height of 400px. Accepted formats: PNG, JPEG, JPG.">
                                </i>
                            </label>
                            <input type="file" class="form-control custom-form" name="image_responsive" accept=".png, .jpeg, .jpg">
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

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Delete Element</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="deleteCaritas">
                @csrf
                <input type="hidden" name="id" value="{{ $caritas_page->id }}">
                <div class="modal-body">
                    <p class="custom-form">Are you sure you want to delete this item?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection


@section('scripts')
@if(Auth::user() && ($page == 2))
<script>
    $('#summernote-caritas-edit').summernote({
        height: 300,
        placeholder: 'Write your content here...',
        toolbar: toolbarConfig
    });
    $('#summernote-caritas-edit_sec').summernote({
        height: 300,
        placeholder: 'Write your content here...',
        toolbar: toolbarConfig
    });

    var content_page = {!! json_encode($caritas_page->content) !!};
    var content_page_sec = {!! json_encode($caritas_page->content_sec) !!};
    $(document).on("shown.bs.modal", "#editModal", function(e) {
        if (content_page) {
            $('#summernote-caritas-edit').summernote('code', content_page);
        } else {
            $('#summernote-caritas-edit').summernote('code', '');
        }
        if (content_page_sec) {
            $('#summernote-caritas-edit_sec').summernote('code', content_page_sec);
        } else {
            $('#summernote-caritas-edit_sec').summernote('code', '');
        }
    });

    $(document).on("submit", "#updateCaritas", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        formData.append('content', $('#summernote-caritas-edit').summernote('code'));
        formData.append('content_sec', $('#summernote-caritas-edit_sec').summernote('code'));
        $.ajax({
            url: "{{ route('page-store.update', $caritas_page->id ) }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#editModal").modal("hide");
                    $("#updateCaritas")[0].reset();
                    toastr.success("{!! trans('words.message_successful_edit') !!}", "{!! trans('words.message_success') !!}");
                    window.location.href = response.data.url;
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

    $(document).on("submit", "#deleteCaritas", function(e) {
        e.preventDefault();
        var customRedirectUrl = "{{ route('civitas.participer') }}";
        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('delete.item') }}",
            type: "POST",
            data: formData,
            success: function(response) {
                if (response.success) {
                    toastr.success("{!! trans('words.message_successful_delete') !!}", "{!! trans('words.message_success') !!}");
                    $("#deleteModal").modal("hide");
                    setTimeout(function() {
                        window.location.href = customRedirectUrl;
                    }, 1000);
                } else {
                    toastr.error("{!! trans('words.unexpected_error') !!}", "{!! trans('words.message_error') !!}");
                }
            },
            error: function(xhr, status, error) {
                toastr.error("{!! trans('words.unexpected_error') !!}");
            },
        });
    });
</script>
@endif
@endsection