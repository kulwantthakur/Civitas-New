@extends('rdp.app')

@section('logo')
<div class="navbar-brand d-flex justify-content-center align-items-center rdp-banner-header">
    <a href="{{ route('rdp.home') }}" class=" rdp-logo-outer white-background">
        <img src="{{ asset('img/logo/historique.svg') }}" class=" d-lg-block d-xl-block d-xxl-block" alt="logo" />
    </a>
</div>
@endsection


@section('content')
{!! __('words.historique_content', [
// images
'img_plus' => asset('img/rdp/plus.png'),
'img1' => asset('img/rdp/img1.png'),
'img2' => asset('img/rdp/img2.png'),
'img3' => asset('img/rdp/img3.png'),
'img4' => asset('img/rdp/img4.png'),
'img5' => asset('img/rdp/img5.png'),
'img6' => asset('img/rdp/img6.png'),
'img7' => asset('img/rdp/img7.png'),
'img8' => asset('img/rdp/img8.png'),
'img9' => asset('img/rdp/img9.png'),
'img10' => asset('img/rdp/img10.png'),
'img11' => asset('img/rdp/img11.png'),
'img12' => asset('img/rdp/img12.png'),
'img13' => asset('img/rdp/img13.png'),
'img14' => asset('img/rdp/img14.png'),
'img15' => asset('img/rdp/img15.png'),

// video placeholders (you can swap for real iframes elsewhere)
'img_video_placeholder' => asset('img/rdp/VIDEO.png'),
'video1' => 'https://www.youtube.com/embed/4jto4mHf58I?si=q7JAuM93Ryws2x8X',
'video2' => 'https://www.youtube.com/embed/eJ1qHLpMRCI?si=JA2593NXUmSNBdRL',
'video3' => 'https://www.youtube.com/embed/qmHhaZ34mVQ?si=x2tBpELkgkPggqCX',
]) !!}
@endsection