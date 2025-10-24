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
<div class="container">
    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
        <div class="d-flex flex-column">
            <a href="{{ route('civitas.last-event') }}" class="agenda-title"><img src="{{ asset('img/agenda-prev-resp.png') }}" class="me-2" alt="logo" /><span>ÉVÉNEMENTS PASSÉS</span></a>
            @if(isset($recentevent))
            <a href="{{ route('civitas.event-detail', [
                        'created_at' => \Carbon\Carbon::parse($recentevent->created_at)->format('d-m-Y'),
                        'user_name' => strtolower(str_replace(' ', '-', Str::ascii($recentevent->user->name))),
                        'title' => ($recentevent->title)
                    ]) }}" class="agenda-title my-3 ms-3"><span>PROCHAINE RENCONTRE</span><img src="{{ asset('img/agenda-next-resp.png') }}" class="ms-2" alt="logo" /></a>
            @else
            @endif
        </div>
    </div>
    <div class="d-flex flex-column align-items-center text-center">
        <div class="civitas-title-page mt-3">AGENDA</div>
        <div class="black-line-civitas d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="d-flex flex-column my-3 my-sm-3 my-md-3 my-lg-5 my-xl-5 my-xxl-5">
        <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
            <div class="d-flex flex-column">
                <a href="{{ route('civitas.last-event') }}" class="agenda-title"><img src="{{ asset('img/agenda-prev.png') }}" class="me-3" alt="logo" /><span>ÉVÉNEMENTS PASSÉS</span></a>
                @if(isset($recentevent))
                <a href="{{ route('civitas.event-detail', [
                            'created_at' => \Carbon\Carbon::parse($recentevent->created_at)->format('d-m-Y'),
                            'user_name' => strtolower(str_replace(' ', '-', Str::ascii($recentevent->user->name))),
                           'title' => strtolower(str_replace(' ', '-', Str::ascii($recentevent->title)))
                        ]) }}" class="agenda-title ms-3 mt-3"><span>PROCHAINE RENCONTRE</span><img src="{{ asset('img/agenda-next.png') }}" class="ms-3" alt="logo" /></a>
                @else
                @endif
                <div class="space-100"></div>
            </div>
        </div>
        <a href=" javascript:void(0);" download class="pdf-download agenda-resp">Agenda hiver 2023 (PDF)</a>
    </div>
    @foreach ($groupedEvents as $month => $events)
    <div class="row">
        <div class="col-md-12">
            <div class="agenda-month d-flex justify-content-center align-items-center text-uppercase">{{ $month }}</div>
        </div>
    </div>
    <div class="my-3 px-2">
        @if ($events->isEmpty())
        <div class="row">
            <div class="col-12 text-center">
                <div class="agenda-content">AUCUN ÉVÉNEMENT POUR CE MOIS.</div>
            </div>
        </div>
        @else
        @foreach ($events as $event)
        <div class="my-3"></div>
        <div class="row">
            <div class="col-2">
                <div class="d-flex flex-column">
                    <div class="agenda-day">{{ ucfirst(\Carbon\Carbon::parse($event->created_at)->locale('fr')->isoFormat('ddd')) }}</div>
                    <div class="agenda-number">{{ \Carbon\Carbon::parse($event->created_at)->format('d') }}</div>
                </div>
            </div>
            <div class="col-8 d-flex align-items-center">
                <div class="d-flex flex-column">
                    <div class="agenda-content">{{ $event->title }}</div>
                    <div class="agenda-content">{!! $event->content !!}</div>
                </div>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-end">
                @if(\Carbon\Carbon::parse($event->created_at)->isFuture())
                <a href="https://calendar.google.com/calendar/r/eventedit?text={{ urlencode($event->title) }}&dates={{ \Carbon\Carbon::parse($event->created_at)->format('Ymd\THis\Z') }}/{{ \Carbon\Carbon::parse($event->created_at)->addHours(1)->format('Ymd\THis\Z') }}&details={{ urlencode($event->description) }}&location={{ urlencode($event->location) }}&sf=true&output=xml" target="_blank">
                    <img src="{{ asset('img/download-event.png') }}" alt="Add to Google Calendar">
                </a>
                @endif
            </div>
        </div>
        @endforeach
        @endif
    </div>
    @endforeach
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>


@if(Auth::user())
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Create New Event</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createNewEvent" method="POST" action="{{ route('page-store.store') }}" enctype="multipart/form-data" files="true">
                @csrf
                <input type="hidden" name="section_id" value="{{ $section_id ?? ''}}">
                <input type="hidden" name="number_validation" value="6">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Title*</label>
                            <input type="text" class="form-control custom-form titleInput" name="title" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Event Date*</label>
                            <input type="text" class="form-control custom-form" name="created_at" placeholder="DD-MM-YYYY HH:MM" id="flatpickr-datetime-create-event" />
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-12">
                            <label class="form-label">Url*</label>
                            <input type="text" class="form-control custom-form urlInput" name="url" required>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Thumbnail*
                                <i class="fa-solid fa-info-circle ms-1"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="right"
                                    title="Upload an image with a maximum width of 230px and a maximum height of 250px. Accepted formats: PNG, JPEG, JPG."></i>
                            </label>
                            <input type="file" class="form-control custom-form" name="icon" accept=".png, .jpeg, .jpg" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Image*
                                <i class="fa-solid fa-info-circle ms-1"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="right"
                                    title="Upload an image with a maximum width of 230px and a maximum height of 250px. Accepted formats: PNG, JPEG, JPG."></i>
                            </label>
                            <input type="file" class="form-control custom-form" name="image" accept=".png, .jpeg, .jpg" required>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Image Responsive*
                                <i class="fa-solid fa-info-circle ms-1"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="right"
                                    title="Upload a responsive image with a maximum width of 105px and a maximum height of 120px. Accepted formats: PNG, JPEG, JPG."></i>
                            </label>
                            <input type="file" class="form-control custom-form" name="image_responsive" accept=".png, .jpeg, .jpg" required>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="my-3"></div>
                        <div class="col-md-12">
                            <label class="form-label">Content*</label>
                            <div id="summernote-event-create" class="content"></div>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-12">
                            <label class="form-label">Description*</label>
                            <div id="summernote-event-create-description" class="content_sec"></div>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-12">
                            <label class="form-label">Choose one*</label>
                            <div class="d-flex mt-3">
                                <div class="form-check me-3">
                                    <input class="form-check-input videoLink" type="radio" name="inputType" value="link">
                                    <label class="form-label">Video Link</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input upload_video" type="radio" name="inputType" value="upload_video">
                                    <label class="form-label">Upload Video</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input image_past" type="radio" name="inputType" value="events_image">
                                    <label class="form-label">Image</label>
                                </div>
                            </div>
                            <div class="videoLinkInput mt-3 d-none">
                                <label class="form-label">
                                    Youtube Link*
                                    <i class="fa-solid fa-info-circle ms-1"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Example: https://www.youtube.com/embed/example_video_1"></i>
                                </label>
                                <input type="text" class="form-control custom-form" name="link">
                            </div>
                            <div class="uploadVideo mt-3 d-none">
                                <label class="form-label">Upload Video*</label>
                                <input type="file" name="upload_video" class="filepond" accept="video/*">
                            </div>
                            <div class="imagePast mt-3 d-none">
                                <label class="form-label">
                                    Image Past*
                                    <i class="fa-solid fa-info-circle ms-1"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Upload an image with a maximum width of 700px and a maximum height of 350px. Accepted formats: PNG, JPEG, JPG."></i>
                                </label>
                                <input type="file" class="form-control custom-form" name="events_image" accept=".png, .jpeg, .jpg">
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
                <h1 class="modal-title fs-5">Edit Event</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateFutureEvent" method="POST" action="{{ route('page-store.update', 1) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="number_validation" value="6">
                <input type="hidden" name="id" value="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label">Choose Past Event</label>
                            <select id="contentSelect" class="form-control custom-form" name="title">
                                <option value="">Select Event</option>
                                @foreach($latestevent as $events)
                                <option
                                    value="{{ $events->title }}"
                                    data-id="{{ $events->id }}"
                                    data-url="{{ $events->url }}"
                                    data-content="{{ $events->content }}"
                                    data-created_at="{{ $events->created_at }}"
                                    data-content-sec="{{ $events->content_sec }}"
                                    data-icon="{{ $events->icon }}"
                                    data-image="{{ asset($events->image) }}"
                                    data-image_responsive="{{ asset($events->image_responsive) }}"
                                    data-link="{{ $events->link }}"
                                    data-upload_video="{{ $events->upload_video }}"
                                    data-events_image="{{ $events->events_image }}">
                                    {{ $events->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-none toggle-content">
                        <div class="my-3"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control custom-form titleInputEdit" name="title" value="">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Event Date</label>
                                <input type="text" class="form-control custom-form" name="created_at" value="" id="flatpickr-datetime-edit-next-event">
                            </div>
                            <div class="my-3"></div>
                            <div class="col-md-12">
                                <label class="form-label">Url</label>
                                <input type="text" class="form-control custom-form urlInputEdit" name="url" value="" readonly>
                            </div>
                            <div class="my-3"></div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Current Thumbnail</label>
                                <div class="d-flex align-items-center">
                                    <img src="" alt="Current Image" id="currentIcon" class="img-thumbnail">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Current Image</label>
                                <div class="d-flex align-items-center">
                                    <img src="" alt="Current Image" id="currentImage" class="img-thumbnail">
                                </div>
                            </div>
                            <div class="my-3"></div>
                            <div class="col-md-6">
                                <label class="form-label">
                                    Upload New Thumbnail
                                    <i class="fa-solid fa-info-circle ms-1"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Upload an image with a maximum width of 230px and a maximum height of 250px. Accepted formats: PNG, JPEG, JPG."></i>
                                </label>
                                <input type="file" class="form-control custom-form" name="icon" accept=".png, .jpeg, .jpg">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">
                                    Upload New Image
                                    <i class="fa-solid fa-info-circle ms-1"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Upload an image with a maximum width of 230px and a maximum height of 250px. Accepted formats: PNG, JPEG, JPG."></i>
                                </label>
                                <input type="file" class="form-control custom-form" name="image" accept=".png, .jpeg, .jpg">
                            </div>
                            <div class="my-3"></div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Current Image Responsive</label>
                                <div class="d-flex align-items-center">
                                    <img src="" alt="Current Image Responsive" id="currentImageResponsive" class="img-thumbnail">
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="my-3"></div>
                            <div class="col-md-6">
                                <label class="form-label">
                                    Upload New Image Responsive
                                    <i class="fa-solid fa-info-circle ms-1"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Upload a responsive image with a maximum width of 105px and a maximum height of 120px. Accepted formats: PNG, JPEG, JPG."></i>
                                </label>
                                <input type="file" class="form-control custom-form" name="image_responsive" accept=".png, .jpeg, .jpg">
                            </div>
                            <div class="my-3"></div>
                            <div class="col-md-12">
                                <label class="form-label">Content</label>
                                <div class="content" id="summernote-event-edit-future"></div>
                            </div>
                            <div class="my-3"></div>
                            <div class="col-md-12">
                                <label class="form-label">Description</label>
                                <div class="content_sec" id="summernote-event-future-description"></div>
                            </div>
                            <div class="my-3"></div>
                            <div class="col-md-12">
                                <label class="form-label">Choose one</label>
                                <div class="d-flex">
                                    <div class="form-check me-3">
                                        <input class="form-check-input radioLink" type="radio" name="inputType" value="link">
                                        <label class="form-label">Link</label>
                                    </div>
                                    <div class="form-check me-3">
                                        <input class="form-check-input radioUploadVideo" type="radio" name="inputType" value="upload_video">
                                        <label class="form-label">Upload Video</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input radioEventsImage" type="radio" name="inputType" value="events_image">
                                        <label class="form-label">Event Image</label>
                                    </div>
                                </div>
                                <div class="mt-3 linkInput d-none">
                                    <label class="form-label">
                                        Youtube Link*
                                        <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Example: https://www.youtube.com/embed/example_video_1"></i>
                                    </label>
                                    <input type="text" class="form-control custom-form" name="link">
                                </div>
                                <div class="mt-3 uploadVideoInput d-none">
                                    <label class="form-label">Upload Video*</label>
                                    <input type="file" name="upload_video" class="filepond-edit" accept="video/*">
                                </div>
                                <div class="mt-3 imageInput d-none">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label d-none">Current Event Image</label>
                                        <div class="d-flex align-items-center">
                                            <img src="" id="currentIconRadio" alt="Current Event Image" class="img-thumbnail">
                                        </div>
                                    </div>
                                    <label class="form-label">
                                        Event Image*
                                        <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Upload an image with a maximum width of 700px and a maximum height of 350px. Accepted formats: PNG, JPEG, JPG."></i>
                                    </label>
                                    <input type="file" class="form-control custom-form" name="events_image" accept=".png, .jpeg, .jpg">
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
            <form id="deleteFutureEvent">
                @csrf
                <input type="hidden" name="id" id="FutureEventId" value="">
                <div class="modal-body">
                    <label for="FutureEvent" class="form-label">Select Past Event to Delete</label>
                    <select class="form-select custom-form" id="FutureEvent" required>
                        <option value="">Select Event</option>
                        @foreach($latestevent as $event)
                        <option value="{{ $event->id }}">{{ $event->title }}</option>
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
    FilePond.registerPlugin(FilePondPluginMediaPreview);
    var pond = FilePond.create(document.querySelector('.filepond'), {
        acceptedFileTypes: ['video/*'],
    });
    FilePond.registerPlugin(FilePondPluginMediaPreview);
    var pondEdit = FilePond.create(document.querySelector('.filepond-edit'), {
        acceptedFileTypes: ['video/*'],
    });
    let userName = "{{ auth()->user()->name }}";
    var flatpickrCreate = document.querySelector('#flatpickr-datetime-create-event');
    if (flatpickrCreate) {
        flatpickr(flatpickrCreate, {
            enableTime: true,
            dateFormat: 'd-m-Y H:i'
        });
    }
    function generateUrl() {
        let title = $(".titleInput").val().trim();
        let date = $("#flatpickr-datetime-create-event").val().trim();
        let userName = "{{ auth()->user()->name }}";
        
        if (title && date) {
            let formattedDate = date.split(" ")[0];
            let formattedTitle = title.toLowerCase().replace(/\s+/g, '-');
            let formattedUser = userName.toLowerCase().replace(/\s+/g, '-');
            let finalUrl = `events/next/register/${formattedDate}/${formattedUser}/${formattedTitle}`;
            $(".urlInput").val(finalUrl);
        }
    }
    $(".titleInput").on("keyup", generateUrl);
    $("#flatpickr-datetime-create-event").on("change", generateUrl);

    $('input[name="inputType"]').on('change', function() {
        $('.videoLinkInput, .uploadVideo, .imagePast').addClass('d-none');
        if ($(this).val() === 'link') {
            $('.videoLinkInput').removeClass('d-none');
        } else if ($(this).val() === 'upload_video') {
            $('.uploadVideo').removeClass('d-none');
        } else if ($(this).val() === 'events_image') {
            $('.imagePast').removeClass('d-none');
        }
    });
    $('#summernote-event-create').summernote({
        height: 100,
        placeholder: 'Write your content here...',
        toolbar: toolbarConfig
    });
    $('#summernote-event-create-description').summernote({
        height: 100,
        placeholder: 'Write your content here...',
        toolbar: toolbarConfig
    });
    $(document).on("submit", "#createNewEvent", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        formData.append('content', $('#summernote-event-create').summernote('code'));
        formData.append('content_sec', $('#summernote-event-create-description').summernote('code'));

        var inputType = $('input[name="inputType"]:checked').val();
        if (inputType === 'upload_video') {
            var pondFiles = pond.getFiles();
            for (var i = 0; i < pondFiles.length; i++) {
                formData.append('upload_video', pondFiles[i].file);
            }
        }
        formData.append('inputType', inputType);

        $.ajax({
            url: "{{ route('page-store.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#createModal").modal("hide");
                    $("#createNewEvent")[0].reset();
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
    var flatpickrCreate = document.querySelector('#flatpickr-datetime-edit-next-event');
    if (flatpickrCreate) {
        flatpickr(flatpickrCreate, {
            enableTime: true,
            dateFormat: 'd-m-Y H:i'
        });
    }
    var allevents = {!! json_encode($groupedEvents) !!};
    $('#contentSelect').on('change', function() {
        var selectedOption = $('option:selected', this);
        var page_id = selectedOption.data('id');
        var current = null;
        for (var month in allevents) {
            if (allevents.hasOwnProperty(month)) {
                current = allevents[month].find(event => event.id == page_id);
                if (current) break;
            }
        }
        var title = current.title;
        var url = current.url;
        var formattedDate = moment(current.created_at).format('DD-MM-YYYY HH:mm');
        var icon = current.icon;
        var image = current.image;
        var imageResponsive = current.image_responsive;
        var content_page = current.content;
        var content_sec = current.content_sec;
        var link = current.link;
        var uploadVideo = current.upload_video;
        var eventsImage = current.events_image;

        $('input[name="id"]').val(page_id);
        $('input[name="title"]').val(title);
        $('input[name="url"]').val(url);
        $('input[name="created_at"]').val(formattedDate);

        $('#summernote-event-edit-future').summernote({
            height: 100,
            placeholder: 'Write your content here...',
            toolbar: toolbarConfig
        });
        $('#summernote-event-future-description').summernote({
            height: 100,
            placeholder: 'Write your content here...',
            toolbar: toolbarConfig
        });

        if (content_page != '') {
            $('#summernote-event-edit-future').summernote('code', content_page);
        } else {
            $('#summernote-event-edit-future').summernote('code', '');
        }
        if (content_sec != '') {
            $('#summernote-event-future-description').summernote('code', content_sec);
        } else {
            $('#summernote-event-future-description').summernote('code', '');
        }

        if (icon) {
            $('#currentIcon').attr('src', icon);
        } else {
            $('#currentIcon').removeAttr('src');
        }

        if (image) {
            $('#currentImage').attr('src', image);
        } else {
            $('#currentImage').removeAttr('src');
        }

        if (imageResponsive) {
            $('#currentImageResponsive').attr('src', imageResponsive);
        } else {
            $('#currentImageResponsive').removeAttr('src');
        }

        if (link) {
            $('.radioLink').prop('checked', true);
            $('.linkInput').removeClass('d-none');
            $('input[name="link"]').val(link);
            $('.uploadVideoInput').addClass('d-none');
            $('.imageInput').addClass('d-none');
        } else if (uploadVideo) {
            $('.radioUploadVideo').prop('checked', true);
            $('.uploadVideoInput').removeClass('d-none');
            $('.linkInput').addClass('d-none');
            $('.imageInput').addClass('d-none');
        } else if (eventsImage) {
            $('.radioEventsImage').prop('checked', true);
            $('.imageInput').removeClass('d-none');
            $('.linkInput').addClass('d-none');
            $('.uploadVideoInput').addClass('d-none');
        } else {
            $('.linkInput').addClass('d-none');
            $('.uploadVideoInput').addClass('d-none');
            $('.imageInput').addClass('d-none');
        }
        $('input[name="inputType"]').on('change', function() {
            var selectedContentType = $('input[name="inputType"]:checked').val();
            $('.linkInput').addClass('d-none');
            $('.uploadVideoInput').addClass('d-none');
            $('.imageInput').addClass('d-none');
            if (selectedContentType === 'link') {
                $('.linkInput').removeClass('d-none');
                $('input[name="link"]').val('');
            } else if (selectedContentType === 'upload_video') {
                $('.uploadVideoInput').removeClass('d-none');
            } else if (selectedContentType === 'events_image') {
                $('.imageInput').removeClass('d-none');
            }
        });

        if (eventsImage) {
            var imagePath = '{{ asset('') }}' + eventsImage;
            $('#currentIconRadio').attr('src', imagePath);
            $('.imageInput .d-flex').removeClass('d-none');
            $('.imageInput .form-label').removeClass('d-none');
        } else {
            $('#currentIconRadio').removeAttr('src');
            $('.imageInput .d-flex').addClass('d-none');
        }

        if (pondEdit.getFiles().length === 0 && uploadVideo) {
            var videoFilePath = "{{ asset('') }}" + uploadVideo;
            pondEdit.addFile(videoFilePath);
        }

        if (this.value) {
            $('.toggle-content').removeClass('d-none');
        } else {
            $('.toggle-content').addClass('d-none');
        }
    });

    $(".titleInputEdit, #flatpickr-datetime-edit-next-event").on("input change", function() {
        let title = $(".titleInputEdit").val().trim();
        let date = $("#flatpickr-datetime-edit-next-event").val().trim();
        let userName = "{{ auth()->user()->name }}";

        if (title && date) {
            let formattedDate = date.split(" ")[0];
            let formattedTitle = title.toLowerCase().replace(/\s+/g, '-');
            let formattedUser = userName.toLowerCase().replace(/\s+/g, '-'); 

            let finalUrl = `events/next/register/${formattedDate}/${formattedUser}/${formattedTitle}`;
            $(".urlInputEdit").val(finalUrl);
        }
    });

    $(document).on("submit", "#updateFutureEvent", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        formData.append('content', $('#summernote-event-edit-future').summernote('code'));
        formData.append('content_sec', $('#summernote-event-future-description').summernote('code'));

        var selectedType = $('input[name="inputType"]:checked').val();
        formData.append('content_type', selectedType);
        if (selectedType === 'upload_video') {
            var pondFiles = pondEdit.getFiles();
            if (pondFiles.length > 0) {
                formData.append('upload_video', pondFiles[0].file);
            }
        }
        formData.append('inputType', selectedType);

        $.ajax({
            url: "{{ route('page-store.update', 1) }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#editModal").modal("hide");
                    $("#updateFutureEvent")[0].reset();
                    toastr.success("{!! trans('words.message_successful_edit') !!}", "{!! trans('words.message_success') !!}");
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

    $('#FutureEvent').on('change', function() {
        var selectedFutureEventId = $(this).val();
        $('#FutureEventId').val(selectedFutureEventId);
    });

    $(document).on("submit", "#deleteFutureEvent", function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var selectedFutureEventId = $('#FutureEventId').val();
        $.ajax({
            url: "{{ route('delete.item') }}",
            type: "POST",
            data: formData,
            success: function(response) {
                if (response.success) {
                    toastr.success("{!! trans('words.message_successful_delete') !!}", "{!! trans('words.message_success') !!}");
                    $("#deleteModal").modal("hide");
                    setTimeout(function() {
                        window.location.reload();
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