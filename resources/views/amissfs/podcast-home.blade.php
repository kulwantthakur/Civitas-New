@extends('amissfs.app')

@section('logo')
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('amissfs.home') }}" class="logo-absolute">
        <img src="{{ asset('/img/logo/amissfs_logo_dark.svg') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block logo-color" alt="logo" />
        <img src="{{ asset('/img/logo/responsive/logo_amissfs_2.svg') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </a>
</div>
@endsection

@section('podcast')
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="space-100"></div>
    <div class="mx-5">
        <div class="d-flex justify-content-between align-items-center">
            <div class="flex-row d-flex align-items-center">
                <a href="{{ route('home') }}"><img src="{{ asset('img/amissfs/podcast/podcast-logo.png') }}" class="me-3" alt="logo-podcast" /></a>
                <div class="podcast-title">OMNIA INSTAURARE IN CHRISTO</div>
            </div>
            <div class="flex-row d-flex align-items-center">
                <div class="flex-row position-relative d-flex justify-content-between align-items-center">
                    <a href="javascript:void(0);" class="search-button h-100">
                        <img src="{{ asset('img/search.png') }}" class="" alt="search" />
                    </a>
                    <input type="search" name="search" class="form-control podcast-search" placeholder="CONFÉRENCES, SERMONS, CHANTS">
                </div>
                @auth
                <a href="{{ route('podcast-history') }}" class="podcast-history ms-5">
                    HISTORIQUE <i class="fa-solid fa-rotate-left"></i>
                </a>
                @endauth
            </div>
        </div>
    </div>
    <div class="space-100"></div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="space-50"></div>
    <div class="container">
        <div class="flex-row position-relative d-flex justify-content-between align-items-center">
            <a href="javascript:void(0);" class="search-button h-100">
                <img src="{{ asset('img/search.png') }}" class="" alt="search" />
            </a>
            <input type="search" name="search" class="form-control podcast-search" placeholder="CONFÉRENCES, SERMONS, CHANTS">
        </div>
        <div class="d-flex justify-content-end ">
            @auth
            <a href="{{ route('podcast-history') }}" class="podcast-history">
                HISTORIQUE <i class="fa-solid fa-rotate-left"></i>
            </a>
            @endauth
            @guest
            <div class="mb-5"></div>
            @endguest
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="mx-5">
        <div class="searchResult">
            <div class="mb-5 podcast-home-category">Catégories</div>
            <div class="p-3 podcast-home-grid">
                @foreach($categories as $category)
                <a href="{{ route('podcast-subcategory', $category->url) }}"
                    class="d-flex justify-content-between text-decoration-none"
                    style="background-color: {{ $category->color }}; height: 107px;"><!--width: 271px;-->
                    <div class="d-flex justify-content-center align-items-start">
                        <div class="podcast-grid-title text-uppercase p-3 w-100">{{ $category->name }}</div>
                    </div>
                    <div class="me-3 d-flex justify-content-center align-items-center">
                        <img src="{{ asset($category->icon) }}" alt="logo" />
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="my-5">
        <div class="podcast-red-bg d-flex flex-column justify-content-center align-items-center">
            <div class="podcast-bottom-title">Les prochaines activités de Civitas Suisse et des Amis de Saint François de Sales</div>
            <a href="{{ route('civitas.events') }}" class="mt-4 d-flex justify-content-center align-items-center podcast-bottom-button">LE CALENDRIER</a>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container">
        <div class="searchResult">
            <div class="d-flex justify-content-start">
                <div class="mb-4 podcast-home-category">Catégories</div>
            </div>
            <div class="p-3 podcast-home-grid">
                @foreach($categories as $category)
                <a href="{{ route('podcast-subcategory', $category->url) }}" class="d-flex justify-content-between text-decoration-none" style="background-color: {{ $category->color }}; height: 67px;"><!--height: 67px;-->
                    <div class="d-flex justify-content-center align-items-start">
                        <div class="podcast-grid-title text-uppercase p-2 w-100">{{ $category->name }}</div>
                    </div>
                    <div class="me-2 d-flex justify-content-center align-items-center">
                        <img src="{{ asset($category->icon) }}" class="scale-podcast h-100" alt="logo" />
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        <div class="mt-5">
            <div class="podcast-red-bg d-flex flex-column justify-content-center align-items-center">
                <div class="podcast-bottom-title">Les prochaines activités de <br>Civitas Suisse</div>
                <a href="javascript:void(0);" class="mt-3 d-flex justify-content-center align-items-center podcast-bottom-button">LE CALENDRIER</a>
            </div>
        </div>
    </div>
</div>

@if(Auth::user())
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Create New Element</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createPodcastCategory" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="createTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="basic-tab" data-bs-toggle="tab" data-bs-target="#basic" type="button" role="tab">Basic Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="keywords-tab" data-bs-toggle="tab" data-bs-target="#keywords" type="button" role="tab">Keywords</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-3" id="createTabContent">
                        <div class="tab-pane fade show active" id="basic" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">
                                        Title*
                                        <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" title="Provide a descriptive title."></i>
                                    </label>
                                    <input type="text" class="form-control custom-form" name="name" id="titleInput" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">
                                        URL*
                                        <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" title="Provide a descriptive URL."></i>
                                    </label>
                                    <input type="text" class="form-control custom-form" name="url" id="urlInput" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label class="form-label">
                                        Color*
                                        <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" title="Provide the color."></i>
                                    </label>
                                    <input data-jscolor="{ preset: 'dark', closeButton: true, closeText: 'OK' }" class="form-control custom-form" name="color" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label class="form-label">Keywords</label>
                                    <select class="form-control custom-form keywordSelect selectpicker" name="keywords[]" multiple>
                                        @foreach($keywords as $keyword)
                                        <option value="{{ $keyword->id }}">{{ $keyword->keyword }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label class="form-label">
                                        Icon*
                                        <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" title="Max 150x150px. Accepted: PNG, JPEG, JPG."></i>
                                    </label>
                                    <input type="file" class="form-control custom-form" name="icon" accept=".png, .jpeg, .jpg" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label class="form-label">
                                        Image*
                                        <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" title="Max 650x650px. Accepted: PNG, JPEG, JPG."></i>
                                    </label>
                                    <input type="file" class="form-control custom-form" name="image" accept=".png, .jpeg, .jpg" required>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="keywords" role="tabpanel">
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="form-label">
                                        Keyword Name
                                    </label>
                                    <input type="text" class="form-control custom-form" name="keyword">
                                </div>
                            </div>
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

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Element</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="updatePodcastCategory" method="POST" action="" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="" />
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="editTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="edit-basic-tab" data-bs-toggle="tab" data-bs-target="#edit-basic" type="button" role="tab">
                                Basic Info
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="edit-keywords-tab" data-bs-toggle="tab" data-bs-target="#edit-keywords" type="button" role="tab">
                                Keywords
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content pt-3" id="editTabContent">
                        <div class="tab-pane fade show active" id="edit-basic" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Choose Category</label>
                                    <select id="contentSelect" class="form-control custom-form" name="title">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->name }}"
                                            data-id="{{ $category->id }}"
                                            data-url="{{ $category->url }}"
                                            data-color="{{ $category->color }}"
                                            data-name="{{ $category->name }}"
                                            data-icon="{{ asset($category->icon) }}"
                                            data-image="{{ asset($category->image) }}"
                                            data-keyword="{{ $category->keywords->pluck('keyword')->implode(', ') }}">
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="toggle-content d-none">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Title*</label>
                                        <input type="text" class="form-control custom-form" name="name" id="titleInputEdit" data-required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">URL*</label>
                                        <input type="text" class="form-control custom-form" name="url" id="urlInputEdit" data-required>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label class="form-label">Color*</label>
                                        <input data-jscolor="{
                            preset: 'dark',
                            closeButton: true,
                            closeText: 'OK',
                            }" class=" form-control custom-form" name="color" id="category-color" value="">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label class="form-label">Keywords</label>
                                        <select class="form-control custom-form keywordSelect selectpicker" name="keywords[]" multiple>
                                            @foreach($keywords->unique('keyword') as $keyword)
                                            <option value="{{ $keyword->id }}">{{ $keyword->keyword }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="my-3"></div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Current Icon</label>
                                        <div class="d-flex align-items-center">
                                            <img src="" alt="Current Icon" id="currentIcon" class="img-thumbnail" style="background-color:;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Current Image</label>
                                        <div class="d-flex align-items-center">
                                            <img src="" alt="Current Image" id="currentImage" class="img-thumbnail" style="background-color:;">
                                        </div>
                                    </div>
                                    <div class="my-3"></div>
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            Upload New Icon
                                            <i class="fa-solid fa-info-circle ms-1"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="right"
                                                title="Upload an image with a maximum width of 150px and a maximum height of 150px. Accepted formats: PNG, JPEG, JPG"></i>
                                        </label>
                                        <input type="file" class="form-control custom-form" name="icon" accept=".png, .jpeg, .jpg">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            Upload New Image
                                            <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right"
                                                title="Upload an image with a maximum width of 650px and a maximum height of 650px. Accepted formats: PNG, JPEG, JPG."></i>
                                        </label>
                                        <input type="file" class="form-control custom-form" name="image" accept=".png, .jpeg, .jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="edit-keywords" role="tabpanel">
                            <div class="row mt-3">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Select Keyword</label>
                                    <select id="keywordSelectEdit" class="form-control custom-form">
                                        <option value="">Choose a keyword</option>
                                        @foreach($keywords->unique('keyword') as $keyword)
                                        <option value="{{ $keyword->keyword }}"
                                            data-id="{{ $keyword->id }}"
                                            data-keyword="{{ $keyword->keyword }}">
                                            {{ $keyword->keyword }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class=" col-md-12">
                                    <label class="form-label">Edit Keyword Name</label>
                                    <input type="text" class="form-control custom-form" id="editKeywordInput" name="keyword">
                                </div>
                            </div>
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
            <form id="deletePodcastCategory">
                @csrf
                <input type="hidden" name="id" id="categoryId" value="">
                <div class="modal-body">
                    <label for="categorySelect" class="form-label custom-form">Select Category to Delete</label>
                    <select class="form-select custom-form" id="categorySelect" required>
                        <option value="">Select a Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
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
@if(Auth::user())
<script>
    $('.keywordSelect').selectpicker();

    function slugify(text) {
        return text.toString().toLowerCase()
            .normalize("NFD").replace(/[\u0300-\u036f]/g, "")
            .replace(/[^a-z0-9 -]/g, "")
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
    }

    $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
        var activeTab = $(e.target).attr('data-bs-target');

        if (activeTab === '#basic') {
            $('#keywords input').removeAttr('required');
            $('#basic input[name="name"], #basic input[name="url"], #basic input[name="color"], #basic input[name="icon"], #basic input[name="image"]').attr('required', 'required');
        } else {
            $('#basic input').removeAttr('required');
            $('#keywords input[name="keyword"]').attr('required', 'required');
        }
    });

    $('#titleInput').on('input', function() {
        let title = $(this).val();
        let slug = title.toLowerCase().replace(/ /g, '-');
        $('#urlInput').val(slug);
    });

    $(document).on("submit", "#createPodcastCategory", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);

        var activeTab = $("#createTab .nav-link.active").attr("id");
        var ajaxUrl = (activeTab === "keywords-tab") ?
            "{{ route('keyword-store.store') }}" :
            "{{ route('podcast-store.store') }}";

        $.ajax({
            url: ajaxUrl,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#createModal").modal("hide");
                    $("#createPodcastCategory")[0].reset();
                    toastr.success("{!! trans('words.message_successful_category_create') !!}", "{!! trans('words.message_success') !!}");
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
 
    $('#contentSelect').on('change', function() {
        const $modal = $('#editModal');
        const selected = $(this).find('option:selected');

        const pageId = selected.data('id');
        const name = selected.data('name');
        const url = selected.data('url');
        const icon = selected.data('icon') || '';
        const image = selected.data('image') || '';
        const color = selected.data('color') || '';
        const keywordsRaw = selected.data('keyword') || '';
        const keywordArray = keywordsRaw.split(',').map(kw => kw.trim());

        $modal.find('input[name="id"]').val(pageId);
        $modal.find('input[name="name"]').val(name);
        $modal.find('input[name="url"]').val(url);

        if (color) {
            $('#category-color')[0].jscolor.fromString(color.replace('#', ''));
            $('#currentIcon, #currentImage').css('background-color', color);
        } else {
            $('#category-color')[0].jscolor.fromString('');
            $('#currentIcon, #currentImage').css('background-color', '');
        }

        $('#currentIcon').attr('src', icon);
        $('#currentImage').attr('src', image);

        const keywordIds = [];
        $('.keywordSelect option').each(function() {
            if (keywordArray.includes($(this).text().trim())) {
                keywordIds.push($(this).val());
            }
        });

        $('.keywordSelect')
            .selectpicker('val', keywordIds);

        if (this.value) {
            $modal.find('.toggle-content').removeClass('d-none').css('display', 'block');
        } else {
            $modal.find('.toggle-content').addClass('d-none');
        }
    });

    $('#titleInputEdit').on('input', function() {
        const title = $(this).val();
        $('#urlInputEdit').val(slugify(title));
    });

    $('#keywordSelectEdit').on('change', function() {
        const selected = $(this).find('option:selected');
        $('#editKeywordInput').val(selected.data('keyword'));
        $('input[name="id"]').val(selected.data('id'));
    });

    $(document).on("submit", "#updatePodcastCategory", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        const formData = new FormData(this);
        const activeTab = $("#editTab .nav-link.active").attr("id");
        const id = $('input[name="id"]').val();

        const podcastUpdateRoute = @json(route('podcast-store.update', ':id'));
        const keywordUpdateRoute = @json(route('keyword-store.update', ':id'));

        let ajaxUrl = '';
        if (activeTab === 'edit-keywords-tab') {
            if (!id) {
                toastr.error("Please select a keyword to edit.");
                return;
            }
            ajaxUrl = keywordUpdateRoute.replace(':id', id);
        } else {
            if (!id) {
                toastr.error("No category selected.");
                return;
            }
            ajaxUrl = podcastUpdateRoute.replace(':id', id);
        }

        $('[data-required]').removeAttr('required');
        if (activeTab === 'edit-basic-tab') {
            $('#titleInputEdit').attr('required', 'required');
            $('#urlInputEdit').attr('required', 'required');
            $('#category-color').attr('required', 'required');
        }

        $.ajax({
            url: ajaxUrl,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#editModal").modal("hide");
                    $("#updatePodcastCategory")[0].reset();
                    toastr.success(
                        "{!! trans('words.message_successful_category_edit') !!}",
                        "{!! trans('words.message_success') !!}"
                    );
                    window.location.reload();
                } else if (response.errors) {
                    $.each(response.errors, function(field, messages) {
                        const input = $('[name="' + field + '"]');
                        input.addClass("is-invalid");
                        input.after('<div class="text-danger">' + messages.join('<br>') + '</div>');
                    });
                }
            },
            error: function() {
                toastr.error("{!! trans('words.unexpected_error') !!}");
            }
        });
    });

    $('#categorySelect').on('change', function() {
        var selectedCategoryId = $(this).val();
        $('#categoryId').val(selectedCategoryId);
    });

    $(document).on("submit", "#deletePodcastCategory", function(e) {
        e.preventDefault();
        var customRedirectUrl = "{{ route('podcasts') }}";
        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('delete.podcast') }}",
            type: "POST",
            data: formData,
            success: function(response) {
                if (response.success) {
                    toastr.success("{!! trans('words.message_successful_category_delete') !!}", "{!! trans('words.message_success') !!}");
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