@extends('civitas.app')

@section('top-content')
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="grey-mobile-height">
        <div class="p-3 civitas-grey-menu d-flex align-items-center justify-content-between">
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
    <div class="text-center d-flex flex-column align-items-center">
        <img src="{{ asset('img/civitas/logo-civitas.png') }}" class="d-none d-sm-none d-md-none -d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <div class="mt-3 civitas-title-page">OMNIA INSTAURARE IN CHRISTO</div>
    </div>
</div>
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div>
        <img src="{{ asset('/img/civitas/omnia-first.png') }}" class="w-100" alt="logo" />
    </div>
    <div class="position-relative">
    <div class="new-page-absolute-img-top">
        <div class="position-relative">
            <img src="{{ asset('img/civitas/new-page-test.png') }}" alt="logo" />
            <div class="d-flex justify-content-end align-items-center red-cornered-content">
                C o n d a m n a t i o n  d u  r e l a t i v i s m e  p h i l o s o p h i q u e<br>d e  l a  f r a n c - m a ç o n n e r i e
            </div>
        </div>
    </div>
    <img src="{{ asset('/img/civitas/omnia-black.png') }}" class="w-100 d-none d-lg-block" alt="logo" />
    <img src="{{ asset('/img/civitas/omnia-black-resp.png') }}" class="w-100 d-block d-md-none" alt="logo" />
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    {!! trans('words.civitas_new_page') !!}
    <div class="d-flex justify-content-center align-items-center my-5">
        <img src="{{ asset('/img/logo/civitas_logo_small.png') }}" class="me-3" alt="logo" />
        <a href="javascript:void(0);" target="_blank" class="pdf-download">Télécharger au format PDF</a>
    </div>
    <div class="d-flex justify-content-center align-items-center flex-column">
        {!! trans('words.civitas_new_page_sec') !!}
        <div class="d-none d-lg-block">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/Nn6WmELnDxo?si=VdQ2j509hR6KLrre" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="d-block d-lg-none">
            <iframe class="w-100" height="250" src="https://www.youtube.com/embed/Nn6WmELnDxo?si=VdQ2j509hR6KLrre" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="mt-5 grey-box-full d-flex">
        <div class="position-relative w-100">
            <div class="bottom-0 position-absolute ms-5">
                <div class="medium-grey-new-page">
                    <div class="position-absolute new-page-absolute-img">
                        <img src="{{ asset('img/civitas/new-page-content.png') }}" class="" alt="logo" />
                    </div>
                    {!! trans('words.civitas_medium_grey_content') !!}
                </div>
            </div>
            <div class="d-flex justify-content-end align-items-center h-100">
                <img src="{{ asset('img/civitas/new-page-virgin-mary.png') }}" class="" alt="logo" />
                <div class="position-absolute end-0 top-50 translate-middle">
                    <div class="red-box-radious d-flex justify-content-center align-items-center">
                        <a href="https://www.youtube.com/watch?v=ySVsJWBXtB0&t=3301s" class="red-box-radient-content">ACCÉDER AUX AUDIOS</a>
                    </div>
                    <div class="mt-5 blue-box-radious d-flex justify-content-center align-items-center flex-column">
                        <div class="mb-3 blue-box-radient-content">#BERNARD FAY</div>
                        <div class="blue-box-radient-content">HISTOIRE DE LA<br>FRANC-MAÇONNERIE</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center flex-column">
        <div class="my-5 new-page-border"></div>
        <div class="new-page-lecture-title">LECTURE</div>
    </div>

    <div class="space-300"></div>
    <div class="position-relative">
        <div class="mt-5 grey-box-full">
            <div class="align-content-center medium-grey-new-page-sec px-5 pb-5">
                {!! trans('words.civitas_medium_grey_content_sec') !!}
                <div class="new-page-absolute-sec">
                    <img src="{{ asset('img/civitas/new-page-content-sec.png') }}" class="" alt="logo" />
                </div>
            </div>
        </div>
    </div>
    <div class="space-100"></div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="space-200"></div>
    <div class="position-relative">
        <div class="grey-box-full d-flex">
            <div class="new-page-responsive-black">
                <div class="medium-grey-new-page">
                    <div class="position-absolute new-page-absolute-img">
                        <img src="{{ asset('img/civitas/new-page-content.png') }}" class="" alt="logo" />
                    </div>
                    {!! trans('words.civitas_medium_grey_content') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="space-50"></div>
    <div class="position-relative">
        <div class="d-flex justify-content-end align-items-center">
            <img src="{{ asset('img/civitas/responsive/new-page-virgin-mary.png') }}" class="me-4" alt="logo" />
            <div class="position-absolute end-0 top-50 translate-middle">
                <div class="red-box-radious d-flex justify-content-center align-items-center">
                    <a href="https://www.youtube.com/watch?v=ySVsJWBXtB0&t=3301s" class="red-box-radient-content">ACCÉDER AUX AUDIOS</a>
                </div>
                <div class="mt-3 blue-box-radious d-flex justify-content-center align-items-center flex-column">
                    <div class="blue-box-radient-content">#BERNARD FAY<br>HISTOIRE DE LA<br>FRANC-MAÇONNERIE</div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center flex-column">
        <div class="my-5 new-page-border"></div>
        <div class="new-page-lecture-title">LECTURE</div>
    </div>
    <div class="space-200"></div>
    <div class="position-relative">
        <div class="mt-5 grey-box-full">
            <div class="medium-grey-new-page-sec">
                <div class="d-flex justify-content-center h-100 flex-column mt-5 px-3">
                    {!! trans('words.civitas_medium_grey_content_sec') !!}
                </div>
                <div class="new-page-absolute-sec">
                    <img src="{{ asset('img/civitas/responsive/new-page-content-sec.png') }}" class="" alt="logo" />
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-5 d-flex justify-content-center align-items-center flex-column">
    <div class="container">
        <div class="new-page-sec-title">AVEC L ‘ IMMACULÉE</div>
        <div class="new-page-red-underline-resp"></div>
    </div>
</div>
<div class="space-100 d-none d-lg-block"></div>
<div class="black-content-box">
    <div class="container h-100">
        <div class="black-content-new h-100 d-flex align-items-center justify-content-center">Ô Marie, conçue sans péché, priez pour les francs-maçons ! :</div>
    </div>
</div>
<div class="space-100 d-none d-lg-block"></div>
<div class="mt-4 mt-lg-0"></div>
<div class="container">
    {!! trans('words.civitas_italic_content') !!}
</div>
<div class="d-none d-lg-block">
    <div class="m-5">
        {!! trans('words.civitas_new_page_content_sec') !!}
    </div>
</div>
<div class="d-block d-lg-none">
    <div class="container my-3">
        {!! trans('words.civitas_new_page_content_sec') !!}
    </div>
    <div class="space-200"></div>
    <div class="position-relative">
        <div class="new-page-bg-specific">
            <div class="position-absolute top-0 start-50 translate-middle w-100">
                <div class="container">
                    <img src="{{ asset('img/civitas/responsive/new_page_bottom_right.png') }}" class="" alt="logo" />
                    <div class="new-page-under-last-img text-start mt-3">Saint Maximilien Kolbe (au centre) et ses compagnons de la Mission de l’Immaculée</div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-4"></div>
</div>
<div class="container">
    {!! trans('words.civitas_italic_content_sec') !!}
    <div class="d-flex justify-content-center my-5">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/xquKWilvAvY?si=rJVdob2UIrrMiJTE" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
<div class="d-none d-lg-block">
    <div class="container">
        {!! trans('words.civitas_italic_content_sec_italic') !!}
    </div>
    <div class="space-200"></div>
    <div class="new-page-red-bg">
        <div class="position-relative h-100">
            <div class="new-page-absolute-bottom-left">
                <img src="{{ asset('img/civitas/new_page_bottom_left.png') }}" class="" alt="logo" />
            </div>
            <div class="new-page-absolute-bottom-center">
                <div class="d-flex">
                    {!! trans('words.civitas_last_content') !!}
                    <img src="{{ asset('img/civitas/new_page_last.gif') }}" class="new-page-specific-height" alt="image">
                </div>
            </div>
            <div class="new-page-absolute-bottom-right">
                <img src="{{ asset('img/civitas/new_page_bottom_right.png') }}" class="" alt="logo" />
                <div class="new-page-under-last-img">Saint Maximilien Kolbe (au centre) et ses compagnons de la Mission de l’Immaculée</div>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-lg-none">
    <div class="space-400"></div>
    <div class="position-relative">
        <div class="new-page-bg-specific-last">
            <div class="new-page-absolute-last-responsive">
                <div class="container">
                    <div class="d-flex flex-column h-100">
                        <img src="{{ asset('img/civitas/responsive/new_page_bottom_left.png') }}" class="mb-4" alt="logo" />
                        {!! trans('words.civitas_last_content') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-5"></div>
    <div class="bg-dark">
        <div class="container">
            <div class="pt-3">
                {!! trans('words.civitas_italic_content_sec_italic') !!}
            </div>
            <div class="d-flex justify-content-center pb-5">
                <img src="{{ asset('img/civitas/new_page_last.gif') }}" class="new-page-specific-height" alt="image">
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('#read-more-link').click(function() {
        $('#hidden-content').toggleClass('d-none');
    });
</script>
@endsection