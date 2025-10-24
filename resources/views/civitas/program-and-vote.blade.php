@extends('civitas.app')

@section('top-content')
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="grey-mobile-height">
        <div class="p-3 civitas-grey-menu d-flex align-items-center justify-content-between">
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
@if($page == 0)
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="text-center d-flex flex-column align-items-center">
        <img src="{{ asset('/img/civitas/civitas_logo_pages.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('/img/civitas/responsive/civitas_logo_pages.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        <div class="mt-3 civitas-title-page">LE VOTE CATHOLIQUE</div>
        <div class="black-line-civitas"></div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    {!! trans('words.civitas_vote_1') !!}
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="my-3">
        <div class="container">
            {!! trans('words.civitas_vote_responsive') !!}
        </div>
        {!! trans('words.civitas_vote_responsive_gradient') !!}
        <div class="my-3 d-flex justify-content-center align-items-center my-sm-3 my-md-3 my-lg-5 my-xl-5 my-xxl-5">
            <img src="{{ asset('/img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
            <a href="javascript:void(0);" download class="pdf-download">Télécharger au format PDF</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="d-flex justify-content-center flex-column">
        {!! trans('words.civitas_vote_form') !!}
    </div>
    <div class="my-5 d-flex justify-content-center align-items-center">
        <img src="{{ asset('/img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
        <a href="javascript:void(0);" download class="pdf-download">Télécharger au format PDF</a>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-xl-block d-xxl-block"></div>
    <div class="civitas-grey-line-vote d-none d-sm-none d-md-none d-xl-block d-xxl-block"></div>
    <div class="space-100 d-none d-sm-none d-md-none d-xl-block d-xxl-block"></div>
    <div class="d-flex justify-content-center flex-column">
        {!! trans('words.civitas_vote_form_sec') !!}
    </div>
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="my-5 d-flex justify-content-center align-items-center">
            <img src="{{ asset('/img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
            <a href="javascript:void(0);" download class="pdf-download">Télécharger au format PDF</a>
        </div>
    </div>
    <div class="d-block d-sm-block d-md-none d-lg-none d-xl-none d-xxl-none">
        <div class="m-auto my-5 civitas-vote-black-box d-flex align-items-center justify-content-center">
            <a href="{{ route('political-programs') }}" class="civitas-black-box-vote-responsive">LE VOTE CATHOLIQUE</a>
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="d-flex justify-content-center">
        <div class="p-3 vote-catholic-red-box d-flex justify-content-center align-items-center flex-column">
            <div class="vote-catholic-red-box-content">LES POSITIONS POLITIQUES DE CIVITAS SUISSE</div>
            <a href="{{ route('political-program-home') }}" class="mt-5 vote-catholic-button d-flex justify-content-center align-items-center">VOIR LES THÈMES</a>
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
</div>
<div>
    @include('home_page_last_section')
</div>
<div class="space-100 d-none d-sm-none d-md-none d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@elseif($page == 1)
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="text-center d-flex flex-column align-items-center">
        <img src="{{ asset('img/civitas/logo-civitas.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('/img/civitas/responsive/civitas_logo_pages.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        <div class="mt-3 civitas-title-page">LE PROGRAMME POLITIQUE<br class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">DU CHRIST - ROI</div>
        <div class="black-line-civitas"></div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    {!! trans('words.civitas_political_program_first') !!}
    <div class="my-5 civitas-red-bg">
        <div class="p-3 p-sm-3 p-md-3 p-lg-5 p-xl-5 p-xxl-5">
            {!! trans('words.civitas_political_programm_red_bg') !!}
        </div>
    </div>
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="space-100"></div>
        <div class="civitas-grey-line-vote"></div>
        <div class="space-100"></div>
        <div class="d-flex justify-content-center flex-column">
            {!! trans('words.civitas_political_program_sec') !!}
        </div>
        <div class="mt-5 d-flex justify-content-center align-items-center">
            <img src="{{ asset('/img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
            <a href="javascript:void(0);" download class="pdf-download">Télécharger au format PDF</a>
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="p-3 m-auto civitas-politiac-grey-box d-flex justify-content-center align-items-center flex-column">
        <div class="civitas-politiac-grey-box-content">LE PROGRAMME POLITIQUE DE CIVITAS SUISSE</div>
        <a href="{{ route('restoration') }}" class="p-4 mt-4 civitas-politiac-grey-box-button d-flex justify-content-center align-items-center">Pour le redressement de notre pays</a>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="m-auto themes-width">
        <div class="d-flex flex-column">
            <div class="themes-title-home">THÈMES</div>
            <div class="my-3 theme-border-bottom"></div>
            @foreach($themes as $key => $theme)
            <div class="civitas-theme-border d-flex justify-content-between align-items-center p-2 pe-3 {{ $key !== 0 ? 'border-top-0' : '' }}">
                <div class="d-flex align-items-center">
                    <img src="{{ asset( $theme->icon ) }}" class="me-4" width="58" height="58" alt="logo" />
                    <span class="table-theme-title">{{ $theme['title'] }}</span>
                </div>
                <div>
                    <a href="{{ route('programs', ['wordA' => $theme->url]) }}">
                        <img src="{{ asset('img/political-program-next.png') }}" class="" alt="logo" />
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="d-flex justify-content-center">
        <div class="civitas-political-red-button d-flex justify-content-center align-items-center">
            <a href="javascript:void(0);" class="civitas-political-red-button-content">SUIVRE DES COURS DE<br>CATÉCHISME</a>
        </div>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@elseif($page == 2)
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="text-center d-flex flex-column align-items-center">
        <img src="{{ asset('img/civitas/logo-civitas.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('/img/civitas/responsive/civitas_logo_pages.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        <div class="mt-3 civitas-title-page smaller-font-size">POUR LA RESTAURATION DES CANTONS CATHOLIQUES</div>
        <div class="black-line-civitas"></div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div clas="d-flex justify-content-center flex-column">
        {!! trans('words.civitas_restoration') !!}
        <div class="mt-5 d-flex justify-content-center align-items-center">
            <img src="{{ asset('/img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
            <a href="javascript:void(0);" download class="pdf-download">Télécharger au format PDF</a>
        </div>
        <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
        <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
        <div class="m-auto civitas-restoration-red-box d-flex justify-content-center align-items-center">
            <a href="{{ route('political-programs') }}" class="civitas-restoration-red-box-content">VOIR LES THÈMES</a>
        </div>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@elseif($page == 3)
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="text-center d-flex flex-column align-items-center">
        <img src="{{ asset('/img/civitas/civitas_logo_pages.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('/img/civitas/responsive/civitas_logo_pages.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
        <div class="mt-3 civitas-title-page">LE PROGRAMME POLITIQUE DE CIVITAS</div>
        <div class="black-line-civitas"></div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="row gy-3 gy-lg-5">
        @foreach($positions as $item)
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
            <div class="d-flex flex-column align-items-center justify-content-between 
            @if ($loop->odd) red-bg-themes @else grey-bg-themes @endif">
                <div class="m-auto civitas-themes-content text-uppercase">{{ $item->title }}</div>
                <a href="{{ route('programs', ['wordA' => $item->url]) }}" class="m-auto civitas-themes-button d-flex justify-content-center align-items-center">SUR CE THÈMES</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
@elseif($page == 4)
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<img src="{{ asset($current_page->image) }}" class="d-none d-lg-block w-100" alt="logo" />
<img src="{{ asset($current_page->image_responsive) }}" class="d-block d-lg-none w-100" alt="logo" />
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="text-center d-flex flex-column align-items-center">
        <div class="civitas-title-page text-uppercase">{{ $current_page->title}}</div>
        <div class="mb-5 black-line-civitas"></div>
        <div class="civitas-restoration-content">{!! $current_page->content !!}</div>
    </div>
    <div class="my-5 d-flex justify-content-center align-items-center">
        <img src="{{ asset('/img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
        @if(isset($current_page->pdf))
        <a href="{{ asset($current_page->pdf) }}" target="_blank" class="pdf-download">Extrait du programme de restauration</a>
        @else
        <a href="javascript:void(0);" class="pdf-download">Extrait du programme de restauration</a>
        @endif
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <a href="{{ route('political-program-home') }}" class="civitas-theme-red-button d-flex justify-content-center align-items-center">LE PROGRAMME POLITIQUE<br>DU CHRIST - ROI</a>
    </div>
</div>
<div class="space-100"></div>
@endif

@if(Auth::user())
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Create New Element</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createProgram" method="POST" action="{{ route('page-store.store') }}" enctype="multipart/form-data" files="true">
                @csrf
                <input type="hidden" name="section_id" value="{{$section_id ?? ''}}">
                <input type="hidden" name="number_validation" value="1">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">
                                URL*
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter a valid URL for the page. This field is required."></i>
                            </label>
                            <input type="text" class="form-control custom-form" name="url" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Title*
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Provide a descriptive title."></i>
                            </label>
                            <input type="text" class="form-control custom-form" name="title" required>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Icon*
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Upload an icon with a maximum width of 60px and a maximum height of 60px. Accepted formats: PNG, JPEG, JPG."></i>
                            </label>
                            <input type="file" class="form-control custom-form" name="icon" accept=".png, .jpeg, .jpg" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Image*
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Upload an image with a minimum width of 1500px and a maximum height of 650px. Accepted formats: PNG, JPEG, JPG."></i>
                            </label>
                            <input type="file" class="form-control custom-form" name="image" accept=".png, .jpeg, .jpg" required>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Image Responsive*
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Upload a responsive image with a maximum width of 500px and a maximum height of 200px. Accepted formats: PNG, JPEG, JPG."></i>
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

@if(isset($current_page))
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Page</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateProgram" method="POST" action="{{ route('page-store.update', $current_page->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="number_validation" value="1">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">URL</label>
                            <input type="text" class="form-control custom-form" name="url" value="{{ $current_page->url }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control custom-form" name="title" value="{{ $current_page->title }}">
                        </div>
                        <div class="my-3"></div>
                        <div class="col-12">
                            <label class="form-label">Content</label>
                            <div class="content" id="summernote-program-edit"></div>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-12">
                            <label class="form-label">PDF</label>
                            <input type="file" class="form-control custom-form" name="pdf" accept=".pdf">
                            @if($current_page->pdf)
                            <div class="custom-form mt-2">Current PDF: <a href="{{ asset($current_page->pdf) }}" target="_blank">View PDF</a></div>
                            @endif
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">Current Icon</label>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset($current_page->icon) }}" alt="Current Icon" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Current Image</label>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset($current_page->image) }}" alt="Current Image" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Upload New Icon
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Upload an icon with a maximum width of 60px and a maximum height of 60px. Accepted formats: PNG, JPEG, JPG."></i>
                            </label>
                            <input type="file" class="form-control custom-form" name="icon" accept=".png, .jpeg, .jpg">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Upload New Image
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Upload an image with a minimum width of 1500px and a maximum height of 650px. Accepted formats: PNG, JPEG, JPG."></i>
                            </label>
                            <input type="file" class="form-control custom-form" name="image" accept=".png, .jpeg, .jpg">
                        </div>

                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">Current Image Responsive</label>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset($current_page->image_responsive) }}" alt="Current Image Responsive" id="currentImageResponsive" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Upload New Image Responsive
                                <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Upload a responsive image with a maximum width of 500px and a maximum height of 200px. Accepted formats: PNG, JPEG, JPG."></i>
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
            <form id="deleteProgram">
                @csrf
                <input type="hidden" name="id" value="{{ $current_page->id }}">
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
@if(Auth::user())
<script>
    $(document).on("submit", "#createProgram", function(e) {
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
                    $("#createProgram")[0].reset();
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
@if($page == 4 )
<script>
    $('#summernote-program-edit').summernote({
        height: 300,
        placeholder: 'Write your content here...',
        toolbar: toolbarConfig
    });
    var content_page = {!! json_encode($current_page->content) !!};
    $(document).on("shown.bs.modal", "#editModal", function(e) {
        if (content_page != '') {
            $('#summernote-program-edit').summernote('code', content_page);
        } else {
            $('#summernote-program-edit').summernote('code', '');
        }
    });

    $(document).on("submit", "#updateProgram", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        formData.append('content', $('#summernote-program-edit').summernote('code'));
       
        $.ajax({
            url: "{{ route('page-store.update', $current_page->id ) }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {

                    $("#editModal").modal("hide");
                    $("#updateProgram")[0].reset();
                    toastr.success("{!! trans('words.message_successful_edit') !!}", "{!! trans('words.message_success') !!}");
                    window.location.href = "/civitas/programme/themes/but/" + response.data.url;
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

    $(document).on("submit", "#deleteProgram", function(e) {
        e.preventDefault();
        var customRedirectUrl = "{{ route('political-program-home') }}";
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