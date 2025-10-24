@extends('amissfs.app')

@section('logo')
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('podcasts') }}" class="logo-absolute podcast-back-button">
        <img src="{{ asset('/img/logo/amissfs_logo_dark.svg') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block logo-color" alt="logo" />
        <img src="{{ asset('img/amissfs/podcast/podcast-back.png') }}" class="ps-3 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="back" />
    </a>
</div>
@endsection

@if($page == 1)
@section('podcast-buttons')
<div class="d-flex align-items-center ms-3">
    <button type="button"
        class="btn btn-info m-0"
        data-bs-toggle="modal"
        data-bs-target="#editModal"
        data-id="{{ $podcast->id }}"
        data-title="{{ $podcast->title }}"
        data-url="{{ $podcast->url }}"
        data-author="{{ $podcast->author }}"
        data-location="{{ $podcast->location }}"
        data-keywords="{{ $podcast->keywords->pluck('keyword')->implode(',') }}"
        data-start="{{ $podcast->start_date }}"
        data-end="{{ $podcast->end_date }}"
        data-description="{{ htmlentities($podcast->description) }}"
        data-files='@json($podcast->audioFiles)'>
        Edit
    </button>
    <div class="mx-3"></div>
    <button type="button" class="btn btn-danger m-0" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $podcast->id }}">
        Delete
    </button>
</div>
@endsection
@endif

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
@endsection

@section('content')
@if($page == 0)
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="mx-5">
        <div class="searchResult">
            <div class="d-flex align-items-center">
                <a href="{{ route('podcasts') }}" class="">
                    <img src="{{ asset('img/amissfs/podcast/podcast-back.png') }}" class="me-3" alt="back" />
                    <span class="podcast-back-button text-uppercase">{{ $category->name}}</span>
                </a>
            </div>
            <div class="my-4"></div>
            <div class="p-3 podcast-home-grid">
                @foreach($podcasts as $podcast)
                <div class="mb-5 position-relative">
                    <a href="{{ route('podcast-name', ['categoryUrl' => $category->url, 'podcastUrl' => $podcast->url]) }}" class="text-decoration-none">
                        <div class="box-dimension mb-3" style="background-color: {{ $podcast->category->color }}">
                            <div class="p-3 d-flex justify-content-between align-items-center">
                                <div class="podcast-name text-uppercase">{{ $podcast->title }}</div>
                            </div>
                        </div>
                        <div class="podcast-absolute-grid">
                            <div class="podcast-author">{{ $podcast->author }}</div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="my-5">
        <div class="podcast-red-bg d-flex flex-column justify-content-center align-items-center">
            <div class="mb-4 podcast-bottom-title">Rejoignez Civitas !</div>
            <a href="{{ route('civitas.member') }}" class="d-flex justify-content-center align-items-center podcast-bottom-button">EN SAVOIR PLUS</a>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="space-50"></div>
    <div class="container">
        <div class="mb-3 podcast-back-button text-uppercase ms-3">{{ $category->name}}</div>
        <div class="p-3 podcast-home-grid">
            @foreach($podcasts as $podcast)
            <div class="mb-3 position-relative">
                <a href="{{ route('podcast-name', ['categoryUrl' => $category->url, 'podcastUrl' => $podcast->url]) }}" class="text-decoration-none">
                    <div class="box-dimension mb-3" style="background-color: {{ $podcast->category->color }}">
                        <div class="p-2 d-flex justify-content-between align-items-center">
                            <div class="podcast-name text-uppercase">{{ $podcast->title }}</div>
                        </div>
                    </div>
                    <div class="podcast-absolute-grid">
                        <div class="podcast-author">{{ $podcast->author }}</div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="mt-5">
            <div class="podcast-red-bg d-flex flex-column justify-content-center align-items-center">
                <div class="mb-4 podcast-bottom-title podcast-big-font-responsive">Rejoignez Civitas !</div>
                <a href="{{ route('civitas.member') }}" class="d-flex justify-content-center align-items-center podcast-bottom-button">EN SAVOIR PLUS</a>
            </div>
        </div>
    </div>
</div>
@elseif($page == 1)
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="mx-5">
        <div class="searchResult">
            <div class="d-flex align-items-center">
                <a href="{{ route('podcast-subcategory', $category->url) }}" class="podcast-back-button">
                    <img src="{{ asset('img/amissfs/podcast/podcast-back.png') }}" class="me-3" alt="back" /><span class="text-uppercase">{{ $category->name}}</span>
                </a>
            </div>
            <div class="my-3 bg-dark">
                <div class="p-5 row">
                    <div class="col-4">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="podcast-container" style="background-color: {{ $category->color }};">
                                <img src="{{ asset($category->image) }}" alt="Podcast Logo" />
                                <div class="absolute-play-podcast">
                                    <div class="play-podcast">
                                        @if(isset($podcastDetails['audio_files']) && count($podcastDetails['audio_files']) > 0)
                                        <audio id="audioPlayer" class="d-none" controls>
                                            <source src="{{ asset($podcastDetails['audio_files'][0]['file_path']) }}" type="audio/mp3">
                                            Your browser does not support the audio element.
                                        </audio>
                                        <button id="playPauseButton" class="play-button-sec">
                                            <img id="playPauseIcon" src="{{ asset('img/amissfs/podcast/podcast-play.png') }}" alt="Play">
                                        </button>
                                        @else
                                        <div class="no-file">{!! trans('words.audio_file') !!}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="d-flex justify-content-start flex-column h-100">
                            <div class="podcast-title-specific text-uppercase">{{ $podcast->title }}</div>
                            <div class="mb-1 podcast-location-specific text-uppercase">{{ $podcast->location }}</div>
                            <div class="mb-4 podcast-location-specific text-uppercase">
                                @if($podcast->start_date && $podcast->end_date)
                                {{ \Carbon\Carbon::parse($podcast->start_date)->format('d.m') }} - {{ \Carbon\Carbon::parse($podcast->end_date)->format('d.m.Y') }}
                                @elseif($podcast->start_date)
                                {{ \Carbon\Carbon::parse($podcast->start_date)->format('d.m.Y') }}
                                @endif
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="podcast-author-specific text-uppercase">{{ $podcast->author }}</div>
                                <a href="javascript:void(0);" class="download-podcast" data-podcast-id="{{ $podcast->id }}"
                                    data-title="{{ e($podcast->title) }}">
                                    <img src="{{ asset('img/download.png') }}" alt="Download Podcast" />
                                </a>
                            </div>
                            <div class="space-50"></div>
                            <div class="mb-4 podcast-description-title">Descriptif</div>
                            <div class="podcast-description">{!! $podcast->description ?? 'Description not available.' !!}</div>
                        </div>
                    </div>
                </div>
                @if(isset($podcastDetails['audio_files']) && count($podcastDetails['audio_files']) > 1)
                <div class="px-5">
                    <div class="mb-4 multi-audio-title">Pistes</div>
                    <div class="d-flex flex-column">
                        @foreach($podcastDetails['audio_files'] as $index => $audio)
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="my-2 multi-audio-title-index">Piste {{ $index + 1 }}</div>
                            <audio id="audioPlayer-{{ $index }}" class="audio-player d-none" controls>
                                <source src="{{ asset($audio['file_path']) }}" type="audio/mp3">
                                Your browser does not support the audio element.
                            </audio>
                            <button id="playPauseButton-{{ $index }}" class="play-button-sec">
                                <img id="playPauseIcon-{{ $index }}" src="{{ asset('img/amissfs/podcast/podcast-white-play.png') }}" alt="Play">
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                <div class="px-4">
                    <div class="px-3 my-5 border-podcast"></div>
                    <div class="mb-4 multi-audio-title">Duo même auteur</div>
                    <div class="podcast-home-grid">
                        @foreach($podcastsByAuthor as $podcast)
                        <div class="mb-5 position-relative">
                            <a href="{{ route('podcast-name', ['categoryUrl' => $category->url, 'podcastUrl' => $podcast->url]) }}" class="text-decoration-none">
                                <div class="box-dimension mb-3" style="background-color: {{ $podcast->category->color }};">
                                    <div class="p-3 d-flex justify-content-between align-items-center">
                                        <div class="podcast-name">{{ $podcast->title }}</div>
                                    </div>
                                </div>
                                <div class="podcast-absolute-grid">
                                    <div class="podcast-author">{{ $podcast->author }}</div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-5">
        <div class="podcast-red-bg d-flex flex-column justify-content-center align-items-center">
            <div class="mb-4 podcast-bottom-title">Les prochaines activites de Civitas Suisse</div>
            <a href="{{ route('civitas.events') }}" class="d-flex justify-content-center align-items-center podcast-bottom-button">LE CALENDRIER</a>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="space-25"></div>
    <div class="container">
        <a class="podcast-back-button">{{ $category->name }}</a>
        <div class="my-3 bg-dark">
            <div class="px-4 py-3 row">
                <div class="col-12">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="podcast-container" style="background-color: {{ $category->color }};">
                            <img src="{{ asset($category->image) }}" width="150" height="180" alt="logo" />
                            <div class="absolute-play-podcast">
                                <div class="play-podcast">
                                    @if(isset($podcastDetails['audio_files']) && count($podcastDetails['audio_files']) > 0)
                                    <audio id="audioPlayer" class="d-none" controls>
                                        <source src="{{ asset($podcastDetails['audio_files'][0]['file_path']) }}" type="audio/mp3">
                                        Your browser does not support the audio element.
                                    </audio>
                                    <button id="playPauseButton" class="play-button-sec w-100 h-100">
                                        <img id="playPauseIcon" src="{{ asset('img/amissfs/podcast/podcast-play.png') }}" alt="Play">
                                    </button>
                                    @else
                                    <div class="no-file">{!! trans('words.audio_file') !!}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-start flex-column h-100">
                        <div class="mt-5 podcast-title-specific text-uppercase">{{ $podcast->title }}</div>
                        <div class="my-2 podcast-location-specific text-uppercase">{{ $podcast->location }}</div>
                        <div class="podcast-location-specific text-uppercase">
                            @if($podcast->start_date && $podcast->end_date)
                            {{ \Carbon\Carbon::parse($podcast->start_date)->format('d.m') }} - {{ \Carbon\Carbon::parse($podcast->end_date)->format('d.m.Y') }}
                            @elseif($podcast->start_date)
                            {{ \Carbon\Carbon::parse($podcast->start_date)->format('d.m.Y') }}
                            @endif
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="my-4 podcast-author-specific text-uppercase">{{ $podcast->author }}</div>
                            <a href="javascript:void(0);" class="download-podcast" data-podcast-id="{{ $podcast->id }}"
                                data-title="{{ e($podcast->title) }}">
                                <img src="{{ asset('img/download-responsive.png') }}" class="" alt="download logo"/>
                            </a>
                        </div>
                        <div class="mb-3 podcast-description-title">Descriptif</div>
                        <div class="podcast-description">{!! $podcast->description ?? 'Description not available.' !!}</div>
                    </div>
                </div>
                @if(isset($podcastDetails['audio_files']) && count($podcastDetails['audio_files']) > 1)
                <div class="my-4">
                    <div class="mb-2 multi-audio-title">Pistes</div>
                    <div class="d-flex flex-column">
                        @foreach($podcastDetails['audio_files'] as $index => $audio)
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="my-2 multi-audio-title-index">Piste {{ $index + 1 }}</div>
                            <audio id="audioPlayer-{{ $index }}" class="audio-player d-none" controls>
                                <source src="{{ asset($audio['file_path']) }}" type="audio/mp3">
                                Your browser does not support the audio element.
                            </audio>
                            <button id="playPauseButton-{{ $index }}" class="play-button-sec d-flex align-items-center">
                                <img id="playPauseIcon-{{ $index }}" src="{{ asset('img/amissfs/podcast/podcast-white-play.png') }}" alt="Play">
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            <div class="container">
                <div class="my-3 boder-podcast"></div>
                <div class="mb-3 multi-audio-title px-0 px-md-4" >Duo même auteur</div>
                <div class="podcast-home-grid px-0 px-md-4">
                    @foreach($podcastsByAuthor as $podcastAuthor)
                    <div class="mb-4 position-relative">
                        <a href="{{ route('podcast-name', ['categoryUrl' => $category->url, 'podcastUrl' => $podcastAuthor->url]) }}" class="text-decoration-none">
                            <div class="box-dimension mb-3" style="background-color: {{ $podcastAuthor->category->color }};">
                                <div class="p-2 d-flex justify-content-between align-items-center">
                                    <div class="podcast-name">{{ $podcastAuthor->name }}</div>
                                </div>
                            </div>
                            <div class="podcast-absolute-grid">
                                <div class="podcast-author">{{ $podcastAuthor->author }}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="mt-3">
            <div class="podcast-red-bg d-flex flex-column justify-content-center align-items-center">
                <div class="mb-4 podcast-bottom-title">Les prochaines activites de<br>Civitas Suisse</div>
                <a href="{{ route('civitas.events') }}" class="d-flex justify-content-center align-items-center podcast-bottom-button">LE CALENDRIER</a>
            </div>
        </div>
    </div>
</div>
@endif

@if(Auth::user() && ($page == 0))
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Create New Element</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createPodcast" method="POST" action="{{ route('podcast-specific-store.store') }}" enctype="multipart/form-data" files="true">
                @csrf
                <input type="hidden" name="category_id" value="{{ $category_id ?? ''}}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">
                                Title*
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Provide a descriptive title."></i>
                            </label>
                            <input type="text" class="form-control custom-form" name="title" id="PodcastTitle" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">
                                URL*
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Provide a descriptive url."></i>
                            </label>
                            <input type="text" class="form-control custom-form" name="url" id="PodcastUrl" required>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Author*
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Provide the Author."></i>
                            </label>
                            <input type="text" class="form-control custom-form" name="author" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Location*
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Provide the Location."></i>
                            </label>
                            <input type="text" class="form-control custom-form" name="location" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label class="form-label">Keywords</label>
                            <select class="form-control custom-form keywordSelect selectpicker" name="keywords[]" multiple>
                                @foreach($keywords as $keyword)
                                <option value="{{ $keyword->id }}">{{ $keyword->keyword }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">Starting Date*</label>
                            <input type="text" class="form-control custom-form" name="start_date" placeholder="DD-MM-YYYY" id="flatpickr-datetime-create-podcast-start-date" required />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ending Date*</label>
                            <input type="text" class="form-control custom-form" name="end_date" placeholder="DD-MM-YYYY" id="flatpickr-datetime-create-podcast-end-date" />
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-12">
                            <label class="form-label">
                                Description*
                            </label>
                            <div id="summernote-description-podcast" class="description"></div>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-12">
                            <label class="form-label">Audio Files</label>
                            <input type="file" name="audio_files[]" class="filepond" multiple accept="audio/*">
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

@elseif(Auth::user() && ($page == 1))
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Page</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updatePodcast" method="POST" action="" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="podcastIdHidden">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control custom-form" name="title" id="PodcastEditTitle" value="{{ $podcast->title }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Url</label>
                            <input type="text" class="form-control custom-form" name="url" id="PodcastEditUrl" value="{{ $podcast->url }}">
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">Author</label>
                            <input type="text" class="form-control custom-form" name="author" value="{{ $podcast->author }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control custom-form" name="location" value="{{ $podcast->location }}">
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-12">
                            <select class="form-control custom-form keywordSelect selectpicker" name="keywords[]" multiple id="keywordSelectEdit">
                                @foreach($keywords->unique('keyword') as $keyword)
                                <option value="{{ $keyword->id }}">{{ $keyword->keyword }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">Starting Date</label>
                            <input type="text" class="form-control custom-form" name="start_date" value="" id="flatpickr-datetime-edit-podcast-start-date">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ending Date</label>
                            <input type="text" class="form-control custom-form" name="end_date" value="" id="flatpickr-datetime-edit-podcast-end-date" autocomplete="off">
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <div class="description" id="summernote-description-edit"></div>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-12">
                            <label class="form-label">Audio Files</label>
                            <input type="file" name="audio_files[]" class="filepond" multiple accept="audio/*">
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
            <form id="deletePodcast">
                @csrf
                <input type="hidden" name="id" id="deletePodcastId" value="">
                <div class="modal-body">
                    <div class="modal-body">
                        <p class="custom-form">Are you sure you want to delete this item?</p>
                    </div>
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
<script>
    $(document).ready(function() {
        let currentAudio = null;
        let currentButton = null;
        let currentIcon = null;
        let currentPisteTitle = null;

        function toggleAudio(audio, icon, playSrc, pauseSrc, pisteTitle = null) {
            if (currentAudio && currentAudio !== audio) {
                currentAudio.pause();
                if (currentIcon) {
                    currentIcon.attr('src', currentButton.hasClass('main-audio-button') ?
                        '{{ asset("img/amissfs/podcast/podcast-play.png") }}' :
                        '{{ asset("img/amissfs/podcast/podcast-white-play.png") }}');
                }

                if (currentPisteTitle) {
                    currentPisteTitle.css('font-family', '');
                }
            }

            if (audio.paused) {
                audio.play();
                icon.attr('src', pauseSrc);
                if (pisteTitle) pisteTitle.css('font-family', 'SuisseScreenRegular');
            } else {
                audio.pause();
                icon.attr('src', playSrc);
                if (pisteTitle) pisteTitle.css('font-family', '');
            }

            currentAudio = audio;
            currentButton = icon;
            currentIcon = icon;
            currentPisteTitle = pisteTitle;
        }
        $('#playPauseButton').on('click', function() {
            let audio = $('#audioPlayer')[0];
            let icon = $('#playPauseIcon');

            icon.addClass('main-audio-button');
            toggleAudio(
                audio,
                icon,
                '{{ asset("img/amissfs/podcast/podcast-play.png") }}',
                '{{ asset("img/amissfs/podcast/podcast-pause.png") }}'
            );
        });
        $('[id^=playPauseButton-]').on('click', function() {
            let index = $(this).attr('id').split('-')[1];
            let audio = $('#audioPlayer-' + index)[0];
            let icon = $('#playPauseIcon-' + index);
            let pisteTitle = $('.multi-audio-title-index').eq(index);

            toggleAudio(
                audio,
                icon,
                '{{ asset("img/amissfs/podcast/podcast-white-play.png") }}',
                '{{ asset("img/amissfs/podcast/podcast-white-pause.png") }}',
                pisteTitle
            );

            icon.removeClass('main-audio-button');
        });
        $('audio').on('play', function() {
            if (currentAudio && currentAudio !== this) {
                currentAudio.pause();
            }
            currentAudio = this;
        });
        $('audio').on('ended', function() {
            if (!currentAudio) return;

            if (currentIcon) {
                currentIcon.attr('src', currentButton.hasClass('main-audio-button') ?
                    '{{ asset("img/amissfs/podcast/podcast-play.png") }}' :
                    '{{ asset("img/amissfs/podcast/podcast-white-play.png") }}');
            }

            if (currentPisteTitle) {
                currentPisteTitle.css('font-family', '');
            }

            currentAudio = null;
            currentIcon = null;
            currentButton = null;
            currentPisteTitle = null;
        });
    });
</script>
@if($page == 1)
<script>
    $('.download-podcast').on('click', function() {
        const $btn = $(this);
        $btn.prop('disabled', true);

        const podcastId = $btn.data('podcast-id');
        const audioFiles = {!! json_encode($podcastDetails['audio_files']) !!};
        let podcastTitle = $btn.data('title') || 'podcast';

        if (!audioFiles.length) {
            toastr.error('No audio files available for download.');
            $btn.prop('disabled', false);
            return;
        }

        podcastTitle = podcastTitle.replace(/[^a-z0-9]/gi, '_').toLowerCase();

        const zip = new JSZip();
        let filesProcessed = 0;

        audioFiles.forEach(function(audio, index) {
            const fileName = audio.file_path.split('/').pop();
            const filePath = "{{ asset('') }}" + audio.file_path;

            fetch(filePath)
                .then(response => response.blob())
                .then(blob => {
                    zip.file(fileName, blob);
                    filesProcessed++;
                    if (filesProcessed === audioFiles.length) {
                        zip.generateAsync({
                                type: 'blob'
                            })
                            .then(function(content) {
                                saveAs(content, podcastTitle + '.zip');
                                $btn.prop('disabled', false); // re-enable
                            });
                    }
                })
                .catch(function(error) {
                    toastr.error('Error downloading file: ' + fileName);
                    $btn.prop('disabled', false);
                });
        });
    });
</script>
@endif
@if(Auth::user() && ($page == 0))
<script>
    $('.keywordSelect').selectpicker();

    FilePond.registerPlugin(FilePondPluginMediaPreview);
    var pond = FilePond.create(document.querySelector('.filepond'), {
        acceptedFileTypes: ['audio/*'],
    });

    $('#summernote-description-podcast').summernote({
        height: 300,
        placeholder: 'Write your content here...',
        toolbar: toolbarConfig
    });

    $('#PodcastTitle').on('input', function() {
        let title = $(this).val();
        let slug = title.toLowerCase().replace(/ /g, '-');
        $('#PodcastUrl').val(slug);
    });

    if (document.querySelector('#flatpickr-datetime-create-podcast-start-date')) {
        var startDateInput = flatpickr('#flatpickr-datetime-create-podcast-start-date', {
            enableTime: false,
            dateFormat: 'd-m-Y'
        });
    }

    if (document.querySelector('#flatpickr-datetime-create-podcast-end-date')) {
        var endDateInput = flatpickr('#flatpickr-datetime-create-podcast-end-date', {
            enableTime: false,
            dateFormat: 'd-m-Y'
        });
    }

    $(document).on("submit", "#createPodcast", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        formData.append('description', $('#summernote-description-podcast').summernote('code'));

        var pondFiles = pond.getFiles();
        for (var i = 0; i < pondFiles.length; i++) {
            formData.append('audio_files[]', pondFiles[i].file);
        }
        $.ajax({
            url: "{{ route('podcast-specific-store.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#createModal").modal("hide");
                    $("#createPodcast")[0].reset();
                    toastr.success("{!! trans('words.message_successful_podcast_create') !!}", "{!! trans('words.message_success') !!}");
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
@elseif(Auth::user() && ($page == 1))
<script>
    $('#keywordSelectEdit').selectpicker();

    function selectKeywordsByText(selectId, csvKeywords) {
        const keywordIds = [];
        const keywordArray = (csvKeywords || '').split(',').map(kw => kw.trim());
        $(`#${selectId} option`).each(function() {
            if (keywordArray.includes($(this).text().trim())) {
                keywordIds.push($(this).val());
            }
        });
        $(`#${selectId}`).selectpicker('val', keywordIds);
    }

    FilePond.registerPlugin(FilePondPluginMediaPreview);

    let deletedFiles = [];
    let uploadedFiles = [];
    let unchangedFiles = [];
    let audioFiles = [];

    const pond = FilePond.create(document.querySelector('.filepond'), {
        acceptedFileTypes: ['audio/mp3'],
        onaddfile: (error, file) => {
            if (!error) uploadedFiles.push(file);
        },
        onremovefile: (error, file) => {
            if (!error && file.getMetadata('origin') === 'local') {
                deletedFiles.push(file.source.name);
            }
        }
    });

    const startDateInput = $('#flatpickr-datetime-edit-podcast-start-date').flatpickr({
        enableTime: false,
        dateFormat: 'd-m-Y'
    });
    const endDateInput = $('#flatpickr-datetime-edit-podcast-end-date').flatpickr({
        enableTime: false,
        dateFormat: 'd-m-Y',
        allowInput: true,
    });

    $('#summernote-description-edit').summernote({
        height: 300,
        placeholder: 'Write your content here...',
        toolbar: toolbarConfig
    });

    $(document).on("shown.bs.modal", "#editModal", function(e) {
        const $btn = $(e.relatedTarget);
        const podcastId = $btn.data('id');
        audioFiles = $btn.data('files') || [];

        $('#updatePodcast').data('podcast-id', podcastId);
        $('#podcastIdHidden').val(podcastId);
        $('#PodcastEditTitle').val($btn.data('title') || '');
        $('#PodcastEditUrl').val($btn.data('url') || '');
        $('input[name="author"]').val($btn.data('author') || '');
        $('input[name="location"]').val($btn.data('location') || '');

        const start = $btn.data('start');
        const end = $btn.data('end');
        if (startDateInput) startDateInput.setDate(start, true, 'd-m-Y');
        if (endDateInput) endDateInput.setDate(end, true, 'd-m-Y');

        selectKeywordsByText('keywordSelectEdit', $btn.data('keywords'));

        const description = $('<textarea/>').html($btn.data('description')).text();
        $('#summernote-description-edit').summernote('code', description);

        pond.removeFiles();
        deletedFiles = [];
        unchangedFiles = [];
        uploadedFiles = [];

        audioFiles.forEach(audio => {
            const filePath = window.location.origin + '/' + audio.file_path;
            fetch(filePath)
                .then(response => response.blob())
                .then(blob => {
                    const file = new File([blob], audio.file_path.split('/').pop(), {
                        type: blob.type
                    });
                    pond.addFile(file, {
                        metadata: {
                            origin: 'local'
                        }
                    }).catch(err => console.error("FilePond Load Error:", err));
                    unchangedFiles.push(audio.file_path);
                })
                .catch(err => console.error("Failed to fetch file:", err));
        });
    });

    $(document).on("submit", "#updatePodcast", function(e) {
        e.preventDefault();
        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        const formData = new FormData(this);
        formData.append('description', $('#summernote-description-edit').summernote('code'));

        unchangedFiles = [];
        pond.getFiles().forEach(file => {
            if (!deletedFiles.includes(file.source.name)) {
                unchangedFiles.push(file.source.name);
            }
        });

        formData.append('deleted_files', JSON.stringify(deletedFiles));
        formData.append('uploaded_files', JSON.stringify(uploadedFiles.map(file => file.file.name)));
        formData.append('unchanged_files', JSON.stringify(unchangedFiles));

        // Add actual uploaded audio files
        uploadedFiles.forEach(file => {
            if (!deletedFiles.includes(file.source.name)) {
                formData.append('audio_files[]', file.file);
            }
        });

        const podcastId = $('#updatePodcast').data('podcast-id');
        const updateUrl = `{{ route('podcast-specific-store.update', ':id') }}`.replace(':id', podcastId);
        const categoryUrl = "{{ $category->url }}";

        $.ajax({
            url: updateUrl,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    const newUrl = $('#PodcastEditUrl').val().trim();
                    $("#editModal").modal("hide");
                    $("#updatePodcast")[0].reset();
                    toastr.success("{!! trans('words.message_successful_podcast_edit') !!}", "{!! trans('words.message_success') !!}");
                    const redirectUrl = `/amissfs/podcasts/${categoryUrl}/${newUrl}`;
                    setTimeout(() => {
                        window.location.href = redirectUrl;
                    }, 800);
                } else {
                    $.each(response.errors, function(field, messages) {
                        const inputField = $('[name="' + field + '"]');
                        inputField.addClass("is-invalid");
                        inputField.after('<div class="text-danger">' + messages.join("<br>") + '</div>');
                    });
                }
            },
            error: function() {
                toastr.error("{!! trans('words.unexpected_error') !!}");
            }
        });
    });

    $(document).on("shown.bs.modal", "#deleteModal", function(e) {
        const podcastId = $(e.relatedTarget).data('id');
        $('#deletePodcastId').val(podcastId);
    });

    $(document).on("submit", "#deletePodcast", function(e) {
        e.preventDefault();
        const redirectUrl = "{{ route('podcast-subcategory', $category->url) }}";
        const formData = $(this).serialize();

        $.ajax({
            url: "{{ route('delete.specific.podcast') }}",
            type: "POST",
            data: formData,
            success: function(response) {
                if (response.success) {
                    toastr.success("{!! trans('words.message_successful_podcast_delete') !!}");
                    $("#deleteModal").modal("hide");
                    setTimeout(() => window.location.href = redirectUrl, 1000);
                } else {
                    toastr.error("{!! trans('words.unexpected_error') !!}");
                }
            },
            error: function() {
                toastr.error("{!! trans('words.unexpected_error') !!}");
            }
        });
    });
</script>
@endif

@endsection