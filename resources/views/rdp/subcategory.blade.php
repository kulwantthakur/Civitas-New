@extends('rdp.app')

@section('logo')
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('rdp.home') }} " class="absolute-logo-rdp rdp-logo-outer">
        <img src="{{ asset('img/logo/logo_rdp.svg') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/logo/responsive/logo_rdp.svg') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </a>
</div>
@endsection

@section('content')
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@if($page == 0)
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xx-none">
    <div class="black-bg-prier d-flex align-items-center justify-content-end">
        <div class="p-4 prier-title">Qu’est ce que le Rosaire ?</div>
    </div>
</div>
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="position-relative">
    <img src="{{ asset('img/rdp/le_rosaire.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/rdp/le_rosaire.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="bottom-0 prier-black-opacity position-absolute w-100 d-flex justify-content-center align-items-center">
            {!! trans('words.lerosaire_title') !!}
        </div>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="container custom-tweak">
    <div>
        {!! trans('words.lerosaire_page_content') !!}
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="d-flex justify-content-center align-items-center flex-column">
            <div class="position-relative">
                <img src="{{ asset('img/rdp/le_rosaire2.png') }}" class="" alt="logo" />
                <div class="position-absolute lerosaire-absolute-center-bottom">
                    <a href="{{ route('prier-lerosaire') }}" class="p-2 rdp-lerosare-page-orange d-flex justify-content-center align-items-center">Prier le Rosaire </a>
                    <div class="space-75"></div>
                    <a href="{{ route('comment-lerosaire') }}" class="p-4 rdp-lerosare-page-grey d-flex justify-content-center align-items-center">Comment Prier le Rosaire</a>
                </div>
            </div>
        </div>
        <div class="space-100"></div>
        <div>
            {!! trans('words.lerosaire_page_content_sec') !!}
        </div>
    </div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="space-100"></div>
    <div class="position-relative">
        <div class="cornered-lerosaire">
            <div class="position-absolute absolute-left-center">
                <div class="cornered-content-rdp ms-5">LE ROSAIRE:<br> SON HISTOIRE ET SA PRATIQUE</div>
            </div>
            <div class="absolute-center-rdp">
                <div class="p-5 grey-box-lerosaire d-flex justify-content-between align-items-center">
                    <div class="audio-symbol d-flex justify-content-center align-items-center">
                        <img src="{{ asset('img/rdp/symbol_audio.png') }}" class="" width="40" height="41" alt="logo" />
                    </div>
                    <div class="audio-title-reactangle">Le rosaire: son histoire et sa pratique<br>Rév. père M. DOMINIQUE O.P.</div>
                    <div class="d-flex justify-content-center ">
                        <audio id="audioPlayer" class="d-none" controls>
                            <source src="your-audio-file.mp3" type="audio/mp3">
                        </audio>
                        <img class="playBtn" src="{{ asset('img/rdp/play_symbol.png') }}" alt="play logo" />
                        <img class="pauseBtn d-none" src="{{ asset('img/rdp/pause_symbol.png') }}" alt="pause logo" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space-100"></div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="position-relative">
        <img src="{{ asset('img/rdp/responsive/le_rosaire2.png') }}" class="" alt="logo" />
        <div class="position-absolute lerosaire-absolute-center-bottom">
            <a href="{{ route('prier-lerosaire') }}" class="p-2 mb-5 rdp-lerosare-page-orange d-flex justify-content-center align-items-center">Prier le Rosaire </a>
            <a href="{{ route('comment-lerosaire') }}" class="p-4 rdp-lerosare-page-grey d-flex justify-content-center align-items-center">Comment Prier le Rosaire</a>
        </div>
    </div>
    <div class="container custom-tweak my-5">
        {!! trans('words.lerosaire_page_content_sec') !!}
    </div>
    <div class="container custom-tweak mb-3">
        <div class="cornered-content-rdp">LE ROSAIRE: SON HISTOIRE ET SA PRATIQUE</div>
    </div>
    <div class="p-3 grey-box-lerosaire d-flex justify-content-between align-items-center">
        <div class="audio-symbol d-flex justify-content-center align-items-center">
            <img src="{{ asset('img/rdp/responsive/symbol_audio.png') }}" class="" alt="logo" />
        </div>
        <div class="audio-title-reactangle">Le rosaire: son histoire et sa pratique<br>Rév. père M. DOMINIQUE O.P.</div>
        <div class="d-flex justify-content-center ">
            <audio id="audioPlayer" class="d-none" controls>
                <source src="your-audio-file.mp3" type="audio/mp3">
            </audio>
            <img class="playBtn" src="{{ asset('img/rdp/responsive/play_symbol.png') }}" alt="play logo" />
            <img class="pauseBtn d-none" src="{{ asset('img/rdp/responsive/pause_symbol.png') }}" alt="pause logo" />
        </div>
    </div>
</div>
<div class="container custom-tweak">
    {!! trans('words.lerosaire_page_content_third') !!}
</div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="space-50"></div>
@elseif($page == 1)
<div class="my-5 text-center d-flex flex-column align-items-center">
    <img src="{{ asset('img/rdp/virgin_mary.png') }}" class="mb-5 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/rdp/responsive/virgin_mary.png') }}" class="mb-5 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    <div class="catechisme-title">CATÉCHISME</div>
    <div class="black-line-amissfs"></div>
</div>
<div class="d-none d-lg-block">
    <div class="space-200"></div>
    <div class="header-bg-catechisme">
        <div class="container custom-tweak position-relative">
            <div class="position-absolute start-0 top-50 translate-middle-y">
                <div class="image-container custom-tweak ms-5">
                    <a href="http://www.liberius.net/livres/Catechisme_catholique_populaire_000001230.pdf" target="_blank">
                        <img src="{{ asset('img/rdp/catechisme_1.png') }}" class="default-image">
                        <img src="{{ asset('img/rdp/catechisme_hover_1.png') }}" class="hover-image">
                    </a>
                </div>
            </div>
            <div class="position-absolute start-50 top-50 translate-middle">
                <iframe width="382" height="246"
                    src="https://www.youtube.com/embed/POfum5PHPNM?si=WZsa3CgZcgq4bJAA"
                    frameborder="0"
                    allowfullscreen></iframe>
                <div class="video-button-absolute">
                    <a href="https://www.youtube.com/watch?v=POfum5PHPNM&list=PLd1rmdYholZMflEYxAk-T3HH__oZBKdIC&index=2" target="_blank" class="catechisme-voir-button d-flex justify-content-center align-items-center">VOIR</a>
                </div>
            </div>
            <div class="position-absolute end-0 top-50 translate-middle-y">
                <div class="image-container custom-tweak me-5">
                    <a href="https://ia801304.us.archive.org/25/items/catchismeducon01cath/catchismeducon01cath.pdf" target="_blank">
                        <img src="{{ asset('img/rdp/catechisme_2.png') }}" class="default-image">
                        <img src="{{ asset('img/rdp/catechisme_hover_2.png') }}" class="hover-image">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="catechisme-bg-light-yellow">
        <div class="space-200"></div>
        <div class="container custom-tweak">
            {!! trans('words.catechisme_home') !!}
        </div>
        <div class="space-100"></div>
    </div>
</div>
<div class="d-block d-lg-none">
    <div class="position-relative">
        <div class="header-bg-catechisme">
            <div class="catechisme-absolute-first text-center">
                <iframe width="382" height="246"
                    src="https://www.youtube.com/embed/POfum5PHPNM?si=WZsa3CgZcgq4bJAA"
                    frameborder="0"
                    allowfullscreen></iframe>
                <div class="video-button-absolute">
                    <a href="https://www.youtube.com/watch?v=POfum5PHPNM&list=PLd1rmdYholZMflEYxAk-T3HH__oZBKdIC&index=2" target="_blank" class="catechisme-voir-button d-flex justify-content-center align-items-center">VOIR</a>
                </div>
            </div>
        </div>
    </div>
    <div class="space-300"></div>
    <div class="position-relative">
        <div class="header-bg-catechisme" style="width: 85%;">
            <div class="position-absolute start-50 top-0 translate-middle-x">
                <div class="image-container custom-tweak mt-3">
                    <a href="http://www.liberius.net/livres/Catechisme_catholique_populaire_000001230.pdf" target="_blank">
                        <img src="{{ asset('img/rdp/catechisme_1.png') }}" class="default-image">
                        <img src="{{ asset('img/rdp/catechisme_hover_1.png') }}" class="hover-image">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="space-300"></div>
    <div class="position-relative">
        <div class="header-bg-catechisme" style="width: 85%;">
            <div class="position-absolute start-50 top-0 translate-middle-x">
                <div class="image-container custom-tweak mt-3">
                    <a href="https://ia801304.us.archive.org/25/items/catchismeducon01cath/catchismeducon01cath.pdf" target="_blank">
                        <img src="{{ asset('img/rdp/catechisme_2.png') }}" class="default-image">
                        <img src="{{ asset('img/rdp/catechisme_hover_2.png') }}" class="hover-image">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="space-300"></div>
</div>
<div class="row">
    @foreach($catechismeCategories as $category)
    <div class="p-0 col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
        <div class="header-bg-catechisme d-flex align-items-center">
            <div class="m-auto d-flex justify-content-between" style="width: 388px;">
                <div class="header-catechisme-title">{{ $category['title'] }}</div>
                <a href="{{ route('catechisme.category', ['url'=>$category['url']]) }}" class="header-catechisme-title-video">
                    {{ $category['video_count'] }} Videos
                </a>
            </div>
        </div>
        <div class="space-50"></div>
        @if ($category['first_video'])
        <div class="d-flex justify-content-center align-items-center">
            <div class="position-relative">
                <iframe width="382" height="246"
                    src="https://www.youtube.com/embed/{{ $category['first_video'] }}"
                    frameborder="0"
                    allowfullscreen></iframe>
                <div class="video-button-absolute">
                    <a href="https://www.youtube.com/watch?v={{ $category['first_video'] }}" target="_blank" class="catechisme-voir-button d-flex justify-content-center align-items-center">VOIR</a>
                </div>
            </div>
        </div>
        @else
        <div class="d-flex justify-content-center align-items-center" style="height: 246px;"></div>
        @endif
        <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
        <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    </div>
    @endforeach
</div>
<div class="space-100"></div>
@elseif($page == 2)
<div class="my-5 text-center d-flex flex-column align-items-center">
    <img src="{{ asset('img/rdp/virgin_mary.png') }}" class="mb-5 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/rdp/responsive/virgin_mary.png') }}" class="mb-5 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    <div class="catechisme-title-specific text-uppercase mb-3">{{ $categoryTitle }}</div>
    <div class="black-line-amissfs"></div>
</div>
<div class="row">
    @foreach($content as $item)
    <div class="p-0 col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
        <div class="header-bg-catechisme d-flex align-items-center justify-content-center {{ ($loop->index == count($content)-1 && ($loop->index + 1) % 3 != 0) ? 'cornered-catechsime' : '' }}">
            <div class="d-flex justify-content-center align-items-center catechisme-title-category">
                <div class="header-catechisme-title-specific">{{ $item->title }}</div>
            </div>
        </div>
        <div class="space-50"></div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
                <iframe width="382" height="246" src="https://www.youtube.com/embed/{{ $item->link }}" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
                <iframe width="100%" height="246" src="https://www.youtube.com/embed/{{ $item->link }}" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
        <div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    </div>
    @endforeach
</div>
@elseif($page == 3)
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="position-relative">
    <img src="{{ asset('img/rdp/fatima.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/rdp/responsive/fatima.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    <div class="fatima-title fatima-absolute-bottom">Fatima</div>
</div>
<div class="container custom-tweak">
    <div class="my-5">
        <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
            {!! trans('words.notredame_first_par') !!}
        </div>
        <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
            {!! trans('words.notredame_first_par-responsive') !!}
        </div>
    </div>
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="d-flex justify-content-center">
            <img src="{{ asset('img/rdp/notredame_2.png') }}" class="" alt="logo" />
        </div>
        <div class="my-5 d-flex justify-content-center fatima-big-title">NOTRE-DAME DE FATIMA</div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="d-flex justify-content-center">
        <img src="{{ asset('img/rdp/responsive/notredame_2.png') }}" class="w-100" alt="logo" />
    </div>
    <div class="my-5 d-flex justify-content-center fatima-big-title">NOTRE-DAME DE FATIMA</div>
</div>
<div class="position-relative">
    <div class="fatima-black-bg d-flex justify-content-center align-items-center">
        <div class="d-flex justify-content-center fatima-title-bg">Les Apparitions</div>
    </div>
</div>
<div>
    <img src="{{ asset('img/rdp/notredame_3.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/rdp/responsive/notredame_3.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
</div>
<div class="container custom-tweak my-5">
    <div class="d-flex flex-column ms-0 ms-sm-0 ms-md-0 ms-lg-5 ms-xl-5 ms-xxl-5">
        <ul>
            <li class="mt-5 notredame-bullets"><a href="{{ route('rdp-angel') }}" class="notredame-bullets">les Apparitions de l’Ange</a></li>
            <div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
            <li class="my-4 notredame-bullets"><a href="{{ route('rdp-may') }}" class="notredame-bullets">Le 13 mai 1917</a></li>
            <div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
            <li class="my-4 notredame-bullets"><a href="{{ route('rdp-june') }}" class="notredame-bullets">Le 13 juin 1917</a></li>
            <div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
            <li class="my-4 notredame-bullets"><a href="{{ route('rdp-juillet') }}" class="notredame-bullets">Le 13 juillet 1917</a></li>
            <div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
            <li class="my-4 notredame-bullets"><a href="{{ route('rdp-aout-13') }}" class="notredame-bullets">Le 13 août 1917</a></li>
            <div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
            <li class="my-4 notredame-bullets"><a href="{{ route('rdp-aout') }}" class="notredame-bullets">Le 19 août 1917</a></li>
            <div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
            <li class="my-4 notredame-bullets"><a href="{{ route('rdp-septembre') }}" class="notredame-bullets">Le 13 septembre 1917</a></li>
            <div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
            <li class="my-4 notredame-bullets"><a href="{{ route('rdp-october') }}" class="notredame-bullets">Le 13 octobre 1917</a></li>
        </ul>
    </div>
    <div class="mt-3 d-flex justify-content-center flex-column align-items-center mt-sm-3 mt-md-3 mt-lg-5 mt-xl-5 mt-xxl-5">
        <a href="{{ route('prier-lerosaire') }}" class="mt-5 fatima-orange-box d-flex justify-content-center align-items-center">Prier le Rosaire</a>
        <a href="{{ route('comment-lerosaire') }}" class="p-3 mt-5 fatima-grey-box d-flex justify-content-center align-items-center p-sm-3 p-md-3 p-lg-5 p-xl-5 p-xxl-5">Comment Prier le Rosaire</a>
    </div>
</div>
<div class="bg-black d-flex justify-content-center align-items-center">
    <div class="container custom-tweak mt-5 mb-0">
        <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
            <div class="d-flex justify-content-center align-items-center flex-column">
                <div class="space-50"></div>
                <iframe class="" width="800" height="500" src="https://www.youtube.com/embed/ptlmLDwtemQ?si=H_m4ZCzjQqjwhjie" frameborder="0" allowfullscreen></iframe>
                <div class="space-100"></div>
                <iframe class="" width="800" height="500" src="https://www.youtube.com/embed/NOLnMvhZjwE?si=ViAvR-cQdn7yQ6BS" frameborder="0" allowfullscreen></iframe>
                <div class="space-50"></div>
            </div>
        </div>
        <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
            <div class="d-flex justify-content-center align-items-center flex-column">
                <iframe class="mb-5 w-100" height="218" src="https://www.youtube.com/embed/ptlmLDwtemQ?si=H_m4ZCzjQqjwhjie" frameborder="0" allowfullscreen></iframe>
                <iframe class="mb-5 w-100" height="218" src="https://www.youtube.com/embed/NOLnMvhZjwE?si=ViAvR-cQdn7yQ6BS" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
@elseif($page == 4)
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container custom-tweak">
    {!! trans('words.lescapulaire_title') !!}
</div>
<div class="space-100"></div>
<div class="container">
    <div>
        {!! trans('words.lescapulaire_par') !!}
    </div>
</div>
<div class="my-5 d-flex justify-content-center flex-column align-items-center">
    <img src="{{ asset('img/rdp/lescapulaire2.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/rdp/responsive/lescapulaire2.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    <div class="mt-3 lescapulaire-content-small">sanctuaire de Notre-Dame de Bourguillon, Fribourg (CH).</div>
</div>
<div class="d-flex align-items-center lescapulaire-title-black-bg">
    <div class="container custom-tweak">
        <div class="le-scapulaire-bg-title">Qu’est-ce que un scapulaire ?</div>
    </div>
</div>
<div class="container custom-tweak">
    <div class="mt-5 lescapulaire-par d-flex align-items-center flex-column flex-sm-column flex-md-column flex-lg-row flex-xl-row flex-xxl-row mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0">
        {!! trans('words.lescapulaire_questions') !!}
        <img src="{{ asset('img/rdp/lescapulaire3.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/rdp/responsive/lescapulaire3.png') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </div>
</div>
<div class="d-flex align-items-center lescapulaire-title-black-bg">
    <div class="container">
        <div class="le-scapulaire-bg-title question-big-responsive">LES PRIVILÈGES LIÉS AU SCAPULAIRE</div>
    </div>
</div>
<div class="container">
    <div class="mt-5">
        {!! trans('words.lescapulaire_questions2') !!}
    </div>
</div>
<div class="mt-5 d-flex justify-content-center align-items-center">
    <iframe width="856" height="479" src="https://www.youtube.com/embed/NOLnMvhZjwE?si=xVdM7Myyc1HHy4gA" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" frameborder="0" allowfullscreen></iframe>
    <iframe width="100%" height="215" src="https://www.youtube.com/embed/NOLnMvhZjwE?si=xVdM7Myyc1HHy4gA" class="cusotm-video-iframe padding-container custom-tweak d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" frameborder="0" allowfullscreen></iframe>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
@elseif($page == 5)
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="mb-5 position-relative">
        <img src="{{ asset('img/rdp/ler-samedis.png') }}" class="w-100" alt="logo" />
        <div class="p-5 position-absolute black-opacity-ler-samedis d-flex justify-content-center align-items-center">
            {!! trans('words.lersamedis_img_title') !!}
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="position-relative">
        <div class="position-absolute black-opacity-ler-samedis d-flex justify-content-center align-items-center">
            {!! trans('words.lersamedis_img_title') !!}
        </div>
        <img src="{{ asset('img/rdp/responsive/ler-samedis.png') }}" class="w-100" alt="logo" />
        <div class="bottom-0 p-3 position-absolute">
            {!! trans('words.lersamedis_first_par') !!}
        </div>
    </div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="m-auto width-quote">
        {!! trans('words.lersamedis_first_par') !!}
    </div>
</div>
<div class="container custom-tweak my-5">
    {!! trans('words.lersamedis_second_par') !!}
    <div class="my-5 d-flex justify-content-center align-items-center">
        <iframe class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" width="768" height="434" src="https://www.youtube.com/embed/TBa88aJZGVA?si=Mqod3IZHgyiG8UzT" frameborder="0" allowfullscreen></iframe>
        <iframe class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" width="388" height="220" src="https://www.youtube.com/embed/TBa88aJZGVA?si=Mqod3IZHgyiG8UzT" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="position-relative">
        <div class="cornered-ler-samedis">
            <div class="position-absolute start-50 top-50 translate-middle w-100">
                <div class="container custom-tweak cornered-ler-samedis-title">Ce qu’il faut accomplir :</div>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container custom-tweak mt-5">
        <div class="cornered-ler-samedis-title">Ce qu’il faut accomplir :</div>
    </div>
</div>
<div class="container custom-tweak my-5">
    {!! trans('words.lersamedis_third_par') !!}
</div>
<div class="d-none d-sm-noe d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="position-relative">
        <img src="{{ asset('img/rdp/ler-samedis-last.png') }}" class="w-100" alt="logo" />
        <div class="position-absolute top-100 start-50 translate-middle w-100 white-opacity">
            <div class="container custom-tweak">
                <div class="my-4"></div>
                {!! trans('words.lersamedis_fouth_par') !!}
            </div>
        </div>
    </div>
    <div class="space-800"></div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <img src="{{ asset('img/rdp/responsive/ler-samedis-last.png') }}" class="w-100" alt="logo" />
    <div class="container custom-tweak mt-3">
        {!! trans('words.lersamedis_fouth_par') !!}
    </div>
</div>
@elseif($page == 6)
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="space-50"></div>
    <div class="mx-5">
        {!! trans('words.le_secret') !!}
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/rdp/secret-pdf.png') }}" class="me-3" alt="logo" />
            <a href="https://www.focolari.fr/wp-content/uploads/2015/06/Texte-LM-Montf.-Le-Secret-de-Marie.pdf" target="_blank" class="rdp-pdf-download">Télécharger au format PDF</a>
        </div>
        <div class="d-flex justify-content-center my-5">
            <img src="{{ asset('img/rdp/secret_first.png') }}" class="" alt="logo" />
        </div>
        <div>
            {!! trans('words.le_secret_content') !!}
        </div>
        <div class="container custom-tweak">
            {!! trans('words.le_secret_content_sec') !!}
        </div>
        <div class="space-100"></div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container custom-tweak mt-3">
        {!! trans('words.le_secret') !!}
        <div class="d-flex align-items-center justify-content-center">
            <img src="{{ asset('img/civitas/civitas_logo_pdf.png') }}" class="me-3" alt="logo" />
            <a href="https://www.focolari.fr/wp-content/uploads/2015/06/Texte-LM-Montf.-Le-Secret-de-Marie.pdf" target="_blank" class="rdp-pdf-download">Télécharger au format PDF</a>
        </div>
        <div class="d-flex justify-content-center my-5">
            <img src="{{ asset('img/rdp/responsive/secret_first.png') }}" class="" alt="logo" />
        </div>
        <div style="width: 75%; margin: auto;">
            {!! trans('words.le_secret_content') !!}
        </div>
        <div>
            {!! trans('words.le_secret_content_sec') !!}
        </div>
    </div>
</div>
@endif

@if(Auth::user())
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Create New Element</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createCatechisme" method="POST" action="{{ route('page-store.store') }}" enctype="multipart/form-data" files="true">
                @csrf
                <input type="hidden" name="section_id" value="{{$section_id ?? ''}}">
                <input type="hidden" name="number_validation" value="5">
                <input type="hidden" id="categoryUrl" name="url">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label">Category*
                            </label>
                            <select class="form-control custom-form" name="category" id="categorySelect" required>
                                <option value="" disabled selected>Select a category</option>
                                <option value="Partie I – Dieu, son existence et sa nature" data-url="cours-de-catechisme-partie-I">Partie I – Dieu, son existence et sa nature</option>
                                <option value="Partie II – La Création: Les Anges et l’Homme" data-url="cours-de-catechisme-partie-II">Partie II – La Création: Les Anges et l’Homme</option>
                                <option value="Partie III – L’Incarnation ; La Vierge Marie ; Jésus-Christ" data-url="cours-de-catechisme-partie-III">Partie III – L’Incarnation ; La Vierge Marie ; Jésus-Christ</option>
                                <option value="Partie IV – Le Mystère de la Rédemption" data-url="cours-de-catechisme-partie-IV">Partie IV – Le Mystère de la Rédemption</option>
                                <option value="Partie V – Passion et Mort de Jésus-Christ" data-url="cours-de-catechisme-partie-V">Partie V – Passion et Mort de Jésus-Christ</option>
                                <option value="Partie VI – Résurrection ; Jugement ; Le Saint-Esprit" data-url="cours-de-catechisme-partie-VI">Partie VI – Résurrection ; Jugement ; Le Saint-Esprit</option>
                                <option value="Partie VII – L’Église ; La Vie Éternelle" data-url="cours-de-catechisme-partie-VII">Partie VII – L’Église ; La Vie Éternelle</option>
                                <option value="Partie VIII – La Morale et les Lois" data-url="cours-de-catechisme-partie-VIII">Partie VIII – La Morale et les Lois</option>
                                <option value="Partie IX – Les Vertus" data-url="cours-de-catechisme-partie-IX">Partie IX – Les Vertus</option>
                                <option value="Partie X – Le Péché" data-url="cours-de-catechisme-partie-X">Partie X – Le Péché</option>
                                <option value="Partie XI – Les Commandements" data-url="cours-de-catechisme-partie-XI">Partie XI – Les Commandements</option>
                                <option value="Partie XII – La Grâce et les Sacrements" data-url="cours-de-catechisme-partie-XII">Partie XII – La Grâce et les Sacrements</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-none toggle-content" id="toggleContent">
                        <div class="row">
                            <div class="my-3"></div>
                            <div class="col-md-12">
                                <label class="form-label">
                                    Title*
                                    <i class="fa-solid fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Provide a descriptive title."></i>
                                </label>
                                <input type="text" class="form-control custom-form" name="title" required>
                            </div>
                            <div class="my-3"></div>
                            <div class="col-md-12">
                                <label class="form-label">
                                    Youtube Link*
                                    <i class="fa-solid fa-info-circle ms-1"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Example: https://www.youtube.com/embed/example_video_1"></i>
                                </label>
                                <input type="text" class="form-control custom-form" name="link" required>
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
@if($page == 2 && isset($item))
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Page</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateCatechisme" method="POST" action="{{ route('page-store.update', 1 ) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="number_validation" value="5">
                <input type="hidden" name="id" value="">
                <input type="hidden" name="category" value="{{ $item->category }}">
                <input type="hidden" name="url" value="{{ $item->url }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label">Select Title</label>
                            <select class="form-select custom-form" id="contentSelect" required>
                                <option value="">Select Title</option>
                                @foreach($content as $item)
                                <option
                                    value="{{ $item->title }}"
                                    data-id="{{ $item->id }}"
                                    data-title="{{ $item->title }}"
                                    data-link="{{ $item->link }}">
                                    {{ $item->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-none toggle-content">
                        <div class="row">
                            <div class="my-3"></div>
                            <div class="col-md-12">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control custom-form" name="title" id="editTitle" value="">
                            </div>
                            <div class="my-3"></div>
                            <div class="col-md-12">
                                <label class="form-label">Link</label>
                                <input type="text" class="form-control custom-form" name="link" id="editLink" value="">
                            </div>
                            <div class="my-3"></div>
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
            <form id="deleteCatechisme">
                @csrf
                <input type="hidden" name="id" id="specificContentId" value="">
                <div class="modal-body">
                    <label for="specificContentSelect" class="form-label">Select Title to Delete</label>
                    <select class="form-select custom-form" id="specificContentSelect" required>
                        <option value="">Select Title</option>
                        @foreach($content as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
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
@endif

@endsection

@section('scripts')
<script>
    $('.playBtn').click(function() {
        var audioPlayer = $('#audioPlayer')[0];
        audioPlayer.play();
        $('.playBtn').addClass('d-none');
        $('.pauseBtn').removeClass('d-none');
    });

    $('.pauseBtn').click(function() {
        var audioPlayer = $('#audioPlayer')[0];
        audioPlayer.pause();
        $('.pauseBtn').addClass('d-none');
        $('.playBtn').removeClass('d-none');
    });
</script>
@if(Auth::user())
<script>
    $('#categorySelect').on('change', function() {
        var selectedCategory = $(this).val();
        var selectedUrl = $(this).find('option:selected').data('url');
        $('#categoryUrl').val(selectedUrl);
        if (this.value) {
            $('#toggleContent').removeClass('d-none').addClass('d-block');
        } else {
            $('#toggleContent').removeClass('d-block').addClass('d-none');
        }
    });

    $(document).on("submit", "#createCatechisme", function(e) {
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
                    $("#createCatechisme")[0].reset();
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
    $('#contentSelect').on('change', function() {
        var selectedOption = $('option:selected', this);
        var page_id = selectedOption.data('id');
        var title = selectedOption.data('title');
        var link = selectedOption.data('link');

        $('input[name="id"]').val(page_id);

        $('#editTitle').val(title);
        $('#editLink').val(link);

        if (this.value) {
            $('.toggle-content').removeClass('d-none');
        } else {
            $('.toggle-content').addClass('d-none');
        }
    });
    $(document).on("submit", "#updateCatechisme", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        $.ajax({
            url: "{{ route('page-store.update', 1) }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#editModal").modal("hide");
                    $("#updateCatechisme")[0].reset();
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

    $('#specificContentSelect').on('change', function() {
        var selectedContentId = $(this).val();
        $('#specificContentId').val(selectedContentId);
    });

    $(document).on("submit", "#deleteCatechisme", function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var specificContentId = $('#specificContentId').val();

        if (specificContentId) {
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
        } else {
            toastr.warning("{!! trans('words.warning_catechisme') !!}", "{!! trans('words.message_warning') !!}");
        }
    });
</script>
@endif
@endif

@endsection