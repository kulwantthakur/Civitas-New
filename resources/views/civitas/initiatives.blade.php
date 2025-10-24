@extends('civitas.app')

@section('top-content')
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="grey-mobile-height">
        <div class="civitas-grey-menu d-flex align-items-center justify-content-between p-3">
            <a href="{{ route('political-programs') }}" class="civitas-responsive-header-grey">POSITIONS</a>
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
@if($page == 0)
<div class="container">
    <div class="d-flex flex-column align-items-center text-center">
        <img src="{{ asset('img/civitas/civitas_logo_pages.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/civitas/responsive/civitas_logo_pages.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        <div class="civitas-title-page mt-3">INITIATIVES ET RÉFÉRUNDUMS</div>
        <div class="black-line-civitas"></div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    {!! trans('words.civitas_initiatives') !!}
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="d-flex justify-content-center align-items-center">
        <img src="{{ asset('img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
        <a href="javascript:void(0);" download class="pdf-download">Télécharger au format PDF</a>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="container">
        {!! trans('words.civitas_initiatives_first_title') !!}
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container mt-5">
        {!! trans('words.civitas_initiatives_first_title') !!}
    </div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    @foreach($initiatives as $item)
    <div class="space-300"></div>
    <div class="position-relative">
        <div class="d-flex justify-content-end">
            <div class="initiatives-cornered">
                <div class="initiative-logo-absolute">
                    <a href="{{ route('civitas.voting', ['category' => $item->category, 'url' => $item->url]) }}">
                        <img src="{{ asset($item->icon) }}" class="" alt="logo" />
                    </a>
                </div>
                <div class="position-absolute end-0 top-50 translate-middle">
                    <img src="{{ asset('img/initiatives-cornered.png') }}" class="me-5" alt="logo" />
                </div>
                <div class="position-absolute start-50 bottom-0 translate-middle">
                    <div class="red-border-initiatives"></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    @foreach($initiatives as $item)
    <div class="space-100"></div>
    <div class="position-relative">
        <div class="d-flex justify-content-end">
            <div class="initiatives-cornered">
                <div class="initiative-logo-absolute">
                    <a href="{{ route('civitas.voting', ['category' => $item->category, 'url' => $item->url]) }}">
                        <img src="{{ asset($item->icon) }}" class="" width="260" height="102" alt="logo" />
                    </a>
                </div>
                <div class="position-absolute end-0 top-50 translate-middle">
                    <img src="{{ asset('img/civitas/initiative-new.png') }}" class="" alt="logo" />
                </div>
                <div class="position-absolute start-50 bottom-0 translate-middle">
                    <div class="red-border-initiatives"></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="container">
        {!! trans('words.civitas_initiatives_sec_title') !!}
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container mt-5">
        {!! trans('words.civitas_initiatives_sec_title') !!}
    </div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    @foreach($referendums as $item)
    <div class="space-300"></div>
    <div class="position-relative">
        <div class="d-flex justify-content-end">
            <div class="initiatives-cornered">
                <div class="initiative-logo-absolute">
                    <a href="{{ route('civitas.voting', ['category' => $item->category, 'url' => $item->url]) }}">
                        <img src="{{ asset($item->icon) }}" class="" alt="logo" />
                    </a>
                </div>
                <div class="position-absolute end-0 top-50 translate-middle">
                    <img src="{{ asset('img/initiatives-cornered.png') }}" class="me-5" alt="logo" />
                </div>
                <div class="position-absolute start-50 bottom-0 translate-middle">
                    <div class="red-border-initiatives"></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    @foreach($referendums as $item)
    <div class="space-100"></div>
    <div class="position-relative">
        <div class="d-flex justify-content-end">
            <div class="initiatives-cornered">
                <div class="initiative-logo-absolute">
                    <a href="{{ route('civitas.voting', ['category' => $item->category, 'url' => $item->url]) }}">
                        <img src="{{ asset($item->icon) }}" class="" width="260" height="102" alt="logo" />
                    </a>
                </div>
                <div class="position-absolute end-0 top-50 translate-middle">
                    <img src="{{ asset('img/civitas/initiative-new.png') }}" class="" alt="logo" />
                </div>
                <div class="position-absolute start-50 bottom-0 translate-middle">
                    <div class="red-border-initiatives"></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@elseif($page == 1)
<div class="container">
    <div class="d-flex flex-column align-items-center text-center">
        <img src="{{ asset('img/civitas/civitas_logo_pages.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/civitas/responsive/civitas_logo_pages.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        <div class="civitas-title-page mt-3 text-uppercase">
            @if($category == 'votations')
                RÉFÉRENDUMS
            @else
                INITIATIVES
            @endif</div>
        <div class="black-line-civitas"></div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="d-flex justify-content-center align-items-center">
        @if($category == 'initiatives-populaires')
        {!! trans('words.civitas_initiatives_overview') !!}
        @else
        {!! trans('words.civitas_referendums_overview') !!}
        @endif
    </div>
    
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    @foreach($votes as $item)
    <div class="space-300"></div>
    <div class="position-relative">
        <div class="d-flex justify-content-end">
            <div class="initiatives-cornered">
                <div class="initiative-logo-absolute">
                    <a href="{{ route('civitas.voting', ['category' => $item->category, 'url' => $item->url]) }}">
                        <img src="{{ asset($item->icon) }}" class="" alt="logo" />
                    </a>
                </div>
                <div class="position-absolute end-0 top-50 translate-middle">
                    <img src="{{ asset('img/initiatives-cornered.png') }}" class="me-5" alt="logo" />
                </div>
                <div class="position-absolute start-50 bottom-0 translate-middle">
                    <div class="red-border-initiatives"></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    @foreach($votes as $item)
    <div class="space-100"></div>
    <div class="position-relative">
        <div class="d-flex justify-content-end">
            <div class="initiatives-cornered">
                <div class="initiative-logo-absolute">
                    <a href="{{ route('civitas.voting', ['category' => $item->category, 'url' => $item->url]) }}">
                        <img src="{{ asset($item->icon) }}" class="" width="260" height="102" alt="logo" />
                    </a>
                </div>
                <div class="position-absolute end-0 top-50 translate-middle">
                    <img src="{{ asset('img/civitas/initiative-new.png') }}" class="" alt="logo" />
                </div>
                <div class="position-absolute start-50 bottom-0 translate-middle">
                    <div class="red-border-initiatives"></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@elseif($page == 2)
<div class="d-flex justify-content-center">
    <img src="{{ asset($vote->image) }}" class="" alt="logo" />
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="space-100"></div>
    <div class="position-relative">
        <div class="bg-dark">
            <div class="container py-5">
                {!! trans('words.civitas_vote') !!}
                <div class="my-5 referendum-black-subtitle text-center text-uppercase">“{{ $vote->title }}“</div>
            </div>
            <div class="position-relative">
                <div class="d-flex justify-content-end">
                    <div class="referendum-cornered">
                        <div class="position-absolute end-0 top-50 translate-middle">
                            <img src="{{ asset('img/initiatives-cornered.png') }}" class="me-5" alt="logo" />
                        </div>
                        <div class="position-absolute start-50 bottom-0 translate-middle">
                            <div class="red-border-initiatives"></div>
                        </div>
                        <div class="position-absolute start-50 top-50 translate-middle">
                            {!! trans('words.civitas_referendum_grey_content') !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center mt-5 pb-5">
                <img src="{{ asset('img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
                @if(isset($vote->pdf))
                <a href="{{ asset($vote->pdf) }}" target="_blank" class="pdf-download-white">Télécharger au format PDF</a>
                @else
                <a href="javascript:void(0);" class="pdf-download-white">Télécharger au format PDF</a>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container mt-5">
        <div>{!! trans('words.civitas_vote') !!}</div>
        <div class="my-4 referendum-black-subtitle text-uppercase">“{{ $vote->title }}“</div>
        <div>{!! trans('words.civitas_referendum_grey_content') !!}</div>
        <div class="d-flex justify-content-center align-items-center mt-3 mb-5">
            <img src="{{ asset('img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
            @if(isset($vote->pdf))
            <a href="{{ asset($vote->pdf) }}" target="_blank" class="pdf-download">Télécharger au format PDF</a>
            @else
            <a href="javascript:void(0);" class="pdf-download">Télécharger au format PDF</a>
            @endif
        </div>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="d-flex justify-content-center flex-column align-items-center">
        <a href="{{ route('civitas.initiatives')}}" class="initiatives-red-button d-flex justify-content-center align-items-center">INITIATIVES ET RÉFÉRUNDUMS</a>
        <a href="{{ $vote->link }}" target="_blank" class="initiatives-link my-5">{{ $vote->link }}</a>
        <div class="initiative-red-box d-flex justify-content-center align-items-center flex-column">
            <div class="inititative-red-box-content mb-4">LE VOTE CATHOLIQUE</div>
            <div class="d-flex justify-content-center">
                <a href="{{ route('political-program-home') }}" class="inititative-red-box-button d-flex justify-content-center align-items-center">VOIR</a>
            </div>
        </div>
        <div class="initiative-grey-box d-flex justify-content-center align-items-center flex-column mt-5">
            <div class="inititative-grey-box-content mb-4">NOTRE<br>NEWS LETTER</div>
            <div class="d-flex justify-content-center">
                <a href="{{ route('civitas.newsletter')}}" class="inititative-grey-box-button d-flex justify-content-center align-items-center">POUR NE RIEN MANQUER</a>
            </div>
        </div>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@endif

@if(Auth::user())
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Create New Element</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createVote" method="POST" action="{{ route('page-store.store') }}" enctype="multipart/form-data" files="true">
                @csrf
                <input type="hidden" name="section_id" value="{{$section_id ?? ''}}">
                <input type="hidden" name="number_validation" value="5">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label">Category*
                            </label>
                            <select class="form-control custom-form" name="category" id="categorySelect" required>
                                <option value="" disabled selected>Select a category</option>
                                <option value="initiatives-populaires">INITIATIVES</option>
                                <option value="votations">RÉFÉRENDUMS</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-none toggle-content" id="toggleContent">
                        <div class="row">
                            <div class="my-3"></div>
                            <div class="col-md-6">
                                <label class="form-label">
                                    Title*
                                    <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Provide a descriptive title."></i>
                                </label>
                                <input type="text" class="form-control custom-form titleInput" name="title" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">
                                    URL*
                                    <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Provide a descriptive url."></i>
                                </label>
                                <input type="text" class="form-control custom-form urlInput" name="url" required>
                            </div>
                            <div class="my-3"></div>
                            <div class="col-md-6">
                                <label class="form-label">
                                    Thumbnail*
                                    <i class="fa-solid fa-info-circle ms-1"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Upload an thumbnail with maximum width 550px and maximum height 250px. Accepted formats: PNG, JPEG, JPG."></i>
                                </label>
                                <input type="file" class="form-control custom-form" name="icon" accept=".png, .jpeg, .jpg" required>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="my-3"></div>
                            <div class="col-md-6">
                                <label class="form-label">
                                    Image*
                                    <i class="fa-solid fa-info-circle ms-1"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Upload an image with maximum width 1200px and maximum height 570px. Accepted formats: PNG, JPEG, JPG."></i>
                                </label>
                                <input type="file" class="form-control custom-form" name="image" accept=".png, .jpeg, .jpg" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">
                                    Slider Image*
                                    <i class="fa-solid fa-info-circle ms-1"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Upload a slider image with maximum width 500px and maximum height 480px. Accepted formats: PNG, JPEG, JPG."></i>
                                </label>
                                <input type="file" class="form-control custom-form" name="image_responsive" accept=".png, .jpeg, .jpg" required>
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
@if($page == 2)
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Page</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateVote" method="POST" action="{{ route('page-store.update', $vote->id ) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="number_validation" value="5">
                <input type="hidden" name="category" value="{{ $vote->category }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control custom-form titleInputEdit" name="title" value="{{ $vote->title }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">URL</label>
                            <input type="text" class="form-control custom-form urlInputEdit" name="url" value="{{ $vote->url }}">
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">PDF</label>
                            <input type="file" class="form-control custom-form" name="pdf" accept=".pdf">
                            @if($vote->pdf)
                            <div class="custom-form mt-2">Current PDF: <a href="{{ asset($vote->pdf) }}" target="_blank">View PDF</a></div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Link</label>
                            <input type="text" class="form-control custom-form" name="link" value="{{ $vote->link }}">
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">Current Thumbnail</label>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset($vote->icon) }}" alt="Current Icon" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Current Image</label>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset($vote->image) }}" alt="Current Image" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Upload New Thumbnail
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Upload an icon with a maximum width of 550px and maximum height 250px. Accepted formats: PNG, JPEG, JPG."></i>
                            </label>
                            <input type="file" class="form-control custom-form" name="icon" accept=".png, .jpeg, .jpg .svg">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Upload New Image
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Upload an image with a maximum width of 1200px and maximum height 570px. Accepted formats: PNG, JPEG, JPG."></i>
                            </label>
                            <input type="file" class="form-control custom-form" name="image" accept=".png, .jpeg, .jpg">
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">Current Slider Image</label>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset($vote->image_responsive) }}" alt="Current Image Responsive" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Upload New Slider Image
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Upload a slider image with a maximum width of 500px and maximum height 400px. Accepted formats: PNG, JPEG, JPG."></i>
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
            <form id="deleteVote">
                @csrf
                <input type="hidden" name="id" value="{{ $vote->id }}">
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
@endif

@endsection


@section('scripts')
<script>
    $('#categorySelect').on('change', function() {
        var selectedCategory = $(this).val();
        if (this.value) {
            $('#toggleContent').removeClass('d-none').addClass('d-block');
        } else {
            $('#toggleContent').removeClass('d-block').addClass('d-none');
        }
    });
</script>
@if(Auth::user())
<script>
    $(document).on("submit", "#createVote", function(e) {
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
                    $("#createVote")[0].reset();
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
@if($page == 2)
<script>
    $(document).on("submit", "#updateVote", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        $.ajax({
            url: "{{ route('page-store.update', $vote->id) }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#editModal").modal("hide");
                    $("#updateVote")[0].reset();
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

    $(document).on("submit", "#deleteVote", function(e) {
        e.preventDefault();
        var customRedirectUrl = "{{ route('civitas.initiatives') }}";
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
@endif
@endsection