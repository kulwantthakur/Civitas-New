@extends('rdp.app')

@section('logo')
<div class="navbar-brand d-flex justify-content-center align-items-center">
    <a href="{{ route('rdp.home') }}" class="absolute-logo-rdp">
        <img src="{{ asset('img/logo/logo_rdp.svg') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <img src="{{ asset('img/logo/responsive/logo_rdp.svg') }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    </a>
</div>
@endsection

@section('content')
<div class="space-50 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@if($page == 0)
<div class="black-bg-prier d-flex align-items-center justify-content-end">
    <div class="p-4 prier-title me-0 me-lg-5 me-xl-5 me-xxl-5 p-sm-4 p-md-4 p-lg-0">Prier le Rosaire ?</div>
</div>
<div class="position-relative">
    <img src="{{ asset('img/rdp/prier_lerosaire.png') }}" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    <img src="{{ asset('img/rdp/responsive/prier_lerosaire-1.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
        <div class="bottom-0 prier-black-opacity position-absolute w-100 d-flex justify-content-center align-items-center">
            {!! trans('words.lerosaire_prier') !!}
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="p-5">
        {!! trans('words.lerosaire_prier') !!}
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="container custom-tweak">
        <div class="m-auto prier-quote">
            {!! trans('words.lerosaire_prier_quote') !!}
        </div>
        <div class="my-5">
            {!! trans('words.lerosaire_prier_first_par') !!}
        </div>
    </div>
    <div class="container custom-tweak">
        <div class="d-flex justify-content-center">
            <div class="position-relative">
                <img src="{{ asset('img/rdp/prier-lerosaire-second.png') }}" class="" alt="logo" />
                <div class="position-absolute prier-absolute-center-bottom">
                    <a href="{{ route('comment-lerosaire') }}" class="p-2 mb-5 rdp-prier-button-grey d-flex justify-content-center align-items-center">Comment Prier le Rosaire</a>
                    <a href="{{ route('notredame') }}" class="p-2 rdp-prier-button-orange d-flex justify-content-center align-items-center">Notre-Dame de Fatima</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container custom-tweak">
        <div class="prier-quote">
            {!! trans('words.lerosaire_prier_quote') !!}
        </div>
        <div class="p-3 my-3">
            {!! trans('words.lerosaire_prier_first_par') !!}
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="position-relative">
            <img src="{{ asset('img/rdp/responsive/prier_lerosaire_2.png') }}" class="" alt="logo" />
            <div class="position-absolute prier-absolute-center-bottom">
                <a href="{{ route('comment-lerosaire') }}" class="p-2 mb-5 rdp-prier-button-grey d-flex justify-content-center align-items-center">Comment Prier le Rosaire</a>
                <a href="{{ route('notredame') }}" class="p-2 rdp-prier-button-orange d-flex justify-content-center align-items-center">Notre-Dame de Fatima</a>
            </div>
        </div>
    </div>
</div>
<div class="position-relative">
    <div class="container custom-tweak">
        <div class="my-3 my-3 my-sm-3 my-md-3 my-lg-5 my-xl-5 my-xxl-5 px-3 px-sm-3 px-md-3 px-lg-0 px-xl-0 px-xxl-0">
            {!! trans('words.lerosaire_prier_second_par') !!}
        </div>
        <div class="my-3 d-flex justify-content-center my-sm-3 my-md-3 my-lg-5 my-xl-5 my-xxl-5">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/BdaWpDtgm18?si=o0PQh8Rkzybu1uVJ" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="my-3 px-3 px-sm-3 px-md-3 px-lg-0 px-xl-0 px-xxl-0">
            {!! trans('words.lerosaire_prier_third_par') !!}
        </div>
        <div class="space-700 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
        <div class="position-absolute bottom-0 start-0 end-0">
            <img src="{{ asset('img/rdp/prier-lerosaire-last.png') }}" height="918" class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
        </div>
    </div>
</div>
<div>
    <img src="{{ asset('img/rdp/responsive/prier-lerosaire-last.png') }}" class="w-100 d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" alt="logo" />
</div>
@elseif($page == 1)
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="black-bg-prier d-flex align-items-center justify-content-end">
        <div class="prier-title me-5">Comment Prier le Rosaire ?</div>
    </div>
    <div class="position-relative">
        <img src="{{ asset('img/rdp/comment-lerosaire.png') }}" class="w-100" height="1090" alt="logo" />
        <div class="top-0 position-absolute w-100">
            <div class="d-flex justify-content-end me-5">
                {!! trans('words.lerosaire_comment_quote') !!}
            </div>
            <div class="container custom-tweak">
                <div class="space-75"></div>
                <div class="comment-content-width">
                    {!! trans('words.lerosaire_comment_img') !!}
                </div>
            </div>
        </div>
    </div>

    <div class="container custom-tweak">
        <div class="my-5">
            {!! trans('words.lerosaire_comment_first') !!}
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/NOLnMvhZjwE?si=dM5LVKb9626Uj9jU" frameborder="0" allowfullscreen></iframe>
            <div class="d-flex justify-content-center align-items-center comment-black-box">
                <a href="{{ route ('lerosaire') }}" class="comment-box-content d-flex align-items-center justify-content-center">Plus d’infos sur le Rosaire</a>
            </div>
            <div class="d-flex justify-content-center align-items-center comment-orange-box">
                <a href="{{ route ('notredame') }}" class="comment-box-content d-flex align-items-center justify-content-center">Notre-Dame de Fatima</a>
            </div>
        </div>
    </div>
    <div class="space-50"></div>
    <div class="comment-black-bg d-flex align-items-center">
        <div class="container custom-tweak">
            <div class="comment-black-bg-title">Les mystères</div>
        </div>
    </div>
    <div class="container custom-tweak">
        <div class="my-5">
            {!! trans('words.lerosaire_comment_second') !!}
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 d-flex justify-content-center">
                <div class="p-3 d-flex flex-column comment-grey-opacity">
                    <div class="my-4 comment-grey-title">Mystères joyeux<br>(médités lundi et jeudi)</div>
                    <div class="">
                        <div class="grey-opacity-height">
                            <img src="{{ asset('img/rdp/comment-prier1.png') }}" class="logo" alt="logo" />
                            <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L’</span>Annonciation de l'Incarnation à la Sainte Vierge-Marie par l'archangenge Gabriel. Fruit du mystère, l'humilité.</div>
                        </div>
                        <div class="grey-opacity-height">
                            <img src="{{ asset('img/rdp/comment-prier2.png') }}" class="logo" alt="logo" />
                            <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>a Visitation de la Sainte Vierge-Marie à sa cousine Elisabeth, mère de Saint Jean-Baptsite, Précurseur du Sauveur. Fruit du mystère, l'obéissance et la pureté.</div>
                        </div>
                        <div class="grey-opacity-height">
                            <img src="{{ asset('img/rdp/comment-prier3.png') }}" class="logo" alt="logo" />
                            <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>a Nativité de Jésus, dans la crèche à Bethléem, la nuit de Noël. Fruit du mystère, la pauvreté.</div>
                        </div>
                        <div class="grey-opacity-height">
                            <img src="{{ asset('img/rdp/comment-prier4.png') }}" class="logo" alt="logo" />
                            <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>a Présentation de Jésus au Temple et la Purification de la la Sainte Vierge-Marie. Fruit du mystère, l'obéissance et la pureté.</div>
                        </div>
                        <div class="grey-opacity-height">
                            <img src="{{ asset('img/rdp/comment-prier5.png') }}" class="logo" alt="logo" />
                            <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>e recouvrement de Jésus au Temple. Fruit du mystère, la recherche de la volonté de Dieu en toute chose.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 d-flex justify-content-center">
                <div class="p-3 d-flex flex-column comment-grey-opacity">
                    <div class="my-4 comment-grey-title">Mystères douloureux<br>(médités mardi et vendredi)</div>
                    <div class="grey-opacity-height">
                        <img src="{{ asset('img/rdp/comment-prier2-1.png') }}" class="logo" alt="logo" />
                        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L’</span>agonie de Jésus au Jardin des oliviers. Fruit du mystère, la contrition des péchés.</div>
                    </div>
                    <div class="grey-opacity-height">
                        <img src="{{ asset('img/rdp/comment-prier2-2.png') }}" class="logo" alt="logo" />
                        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>a flagellation de Jésus au Prétoire de Pilate. Fruit du mystère, la mortification des sens et de la chair.</div>
                    </div>
                    <div class="grey-opacity-height">
                        <img src="{{ asset('img/rdp/comment-prier2-3.png') }}" class="logo" alt="logo" />
                        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>e courronnement d'épine. Fruit du mystère, la mortification de l'esprit.</div>
                    </div>
                    <div class="grey-opacity-height">
                        <img src="{{ asset('img/rdp/comment-prier2-4.png') }}" class="logo" alt="logo" />
                        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>e portement de la croix, du Prétoire au Calvaire. Fruit du mystère, la patience dans les épreuves et les humilitaion de cette vie.</div>
                    </div>
                    <div class="grey-opacity-height">
                        <img src="{{ asset('img/rdp/comment-prier2-5.png') }}" class="logo" alt="logo" />
                        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>a mort de Jésus crucifié. Fruit de ce mystère, l'amour du Saint-Sacrifice de la Messe et le don de soi-même à l'oeuvre de la Rédemption</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 d-flex justify-content-center">
                <div class="p-3 d-flex flex-column comment-grey-opacity">
                    <div class="my-4 comment-grey-title">Mystères glorieux<br><span class="comment-grey-title-small">(médités mercredi, samedi et dimanche)</span></div>
                    <div class="grey-opacity-height">
                        <img src="{{ asset('img/rdp/comment-prier3-1.png') }}" class="logo" alt="logo" />
                        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L’</span>a Résurrection de Jésus, le matin de Pâques. Fruit du mystère, la vertu théologale de Foi.</div>
                    </div>
                    <div class="grey-opacity-height">
                        <img src="{{ asset('img/rdp/comment-prier3-2.png') }}" class="logo" alt="logo" />
                        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>'Ascension de Jésus au Ciel, quarante jour après Pâques. Fruit du mystère, la vertu théologale d'Espérance.</div>
                    </div>
                    <div class="grey-opacity-height">
                        <img src="{{ asset('img/rdp/comment-prier3-3.png') }}" class="logo" alt="logo" />
                        <div class="p-4 comment-grey-content "><span class="comment-grey-content-l">L</span>a Pentecôte ou descente du Saint-Esprit sur la Sainte Vierge-Marie et les apôtres. Fruit du mystère, la vertu théologale de Charité et le zèle missionnaire.</div>
                    </div>
                    <div class="grey-opacity-height">
                        <img src="{{ asset('img/rdp/comment-prier3-4.png') }}" class="logo" alt="logo" />
                        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>'Assomption de la Sainte Vierge-Marie au Ciel. Fruit du mystère, la grâce d'une bonne et sainte mort.</div>
                    </div>
                    <div class="grey-opacity-height">
                        <img src="{{ asset('img/rdp/comment-prier3-5.png') }}" class="logo" alt="logo" />
                        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>e courronnenent de la Sainte Vierge-Marie au Ciel et la gloire de tous les Saints. Fruit du mystère, la piété et la dévotion mariales.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space-50"></div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="black-bg-prier d-flex align-items-center justify-content-end">
        <div class="p-4 prier-title">Comment Prier le Rosaire ?</div>
    </div>
    <img src="{{ asset('img/rdp/responsive/comment-lerosaire.png') }}" class="w-100" alt="logo" />
    <div class="container custom-tweak">
        <div>
            {!! trans('words.lerosaire_comment_quote') !!}
        </div>
        <div class="responsive-bg-image">
            {!! trans('words.lerosaire_comment_img') !!}
        </div>
        <div class="space-50"></div>
        <div class="">
            <iframe width="100%" height="196" src="https://www.youtube.com/embed/NOLnMvhZjwE?si=dM5LVKb9626Uj9jU" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    <div class="container custom-tweak my-3">
        {!! trans('words.lerosaire_comment_responsive_first') !!}
    </div>
    <img src="{{ asset('img/rdp/responsive/comment-responsive.png') }}" class="w-100" alt="logo" />
    <div class="container custom-tweak my-3">
        {!! trans('words.lerosaire_comment_responsive_sec') !!}
    </div>
    <div class="comment-black-bg d-flex align-items-center">
        <div class="container custom-tweak">
            <div class="comment-black-bg-title">Les mystères</div>
        </div>
    </div>
    <div class="container custom-tweak my-3">
        {!! trans('words.lerosaire_comment_second') !!}
    </div>
    <div class="comment-grey-responsive d-flex align-items-center">
        <div class="container custom-tweak">
            <div class="comment-grey-title">Mystères joyeux<br>(médités lundi et jeudi)</div>
        </div>
    </div>
    <div class="my-5">
        <img src="{{ asset('img/rdp/responsive/comment-prier1.png') }}" class="logo" alt="logo" />
        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L’</span>Annonciation de l'Incarnation à la Sainte Vierge-Marie par l'archangenge Gabriel. Fruit du mystère, l'humilité.</div>
        <img src="{{ asset('img/rdp/responsive/comment-prier2.png') }}" class="logo" alt="logo" />
        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>a Visitation de la Sainte Vierge-Marie à sa cousine Elisabeth, mère de Saint Jean-Baptsite, Précurseur du Sauveur. Fruit du mystère, l'obéissance et la pureté.</div>
        <img src="{{ asset('img/rdp/responsive/comment-prier3.png') }}" class="logo" alt="logo" />
        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>a Nativité de Jésus, dans la crèche à Bethléem, la nuit de Noël. Fruit du mystère, la pauvreté.</div>
        <img src="{{ asset('img/rdp/responsive/comment-prier4.png') }}" class="logo" alt="logo" />
        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>a Présentation de Jésus au Temple et la Purification de la la Sainte Vierge-Marie. Fruit du mystère, l'obéissance et la pureté.</div>
        <img src="{{ asset('img/rdp/responsive/comment-prier5.png') }}" class="logo" alt="logo" />
        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>e recouvrement de Jésus au Temple. Fruit du mystère, la recherche de la volonté de Dieu en toute chose.</div>
    </div>
    <div class="comment-grey-responsive d-flex align-items-center">
        <div class="container custom-tweak">
            <div class="comment-grey-title">Mystères douloureux<br>(médités mardi et vendredi)</div>
        </div>
    </div>
    <div class="my-5">
        <img src="{{ asset('img/rdp/responsive/comment-prier2-1.png') }}" class="logo" alt="logo" />
        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L’</span>agonie de Jésus au Jardin des oliviers. Fruit du mystère, la contrition des péchés.</div>
        <img src="{{ asset('img/rdp/responsive/comment-prier2-2.png') }}" class="logo" alt="logo" />
        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>a flagellation de Jésus au Prétoire de Pilate. Fruit du mystère, la mortification des sens et de la chair.</div>
        <img src="{{ asset('img/rdp/responsive/comment-prier2-3.png') }}" class="logo" alt="logo" />
        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>e courronnement d'épine. Fruit du mystère, la mortification de l'esprit.</div>
        <img src="{{ asset('img/rdp/responsive/comment-prier2-4.png') }}" class="logo" alt="logo" />
        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>e portement de la croix, du Prétoire au Calvaire. Fruit du mystère, la patience dans les épreuves et les humilitaion de cette vie.</div>
        <img src="{{ asset('img/rdp/responsive/comment-prier2-5.png') }}" class="logo" alt="logo" />
        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>a mort de Jésus crucifié. Fruit de ce mystère, l'amour du Saint-Sacrifice de la Messe et le don de soi-même à l'oeuvre de la Rédemption</div>
    </div>
    <div class="p-2 comment-grey-responsive d-flex align-items-center">
        <div class="comment-grey-title">Mystères glorieux<br><span class="comment-grey-title-small">(médités mercredi, samedi et dimanche)</span></div>
    </div>
    <div class="mt-5 mb-3">
        <img src="{{ asset('img/rdp/responsive/comment-prier3-1.png') }}" class="logo" alt="logo" />
        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L’</span>a Résurrection de Jésus, le matin de Pâques. Fruit du mystère, la vertu théologale de Foi.</div>
        <img src="{{ asset('img/rdp/responsive/comment-prier3-2.png') }}" class="logo" alt="logo" />
        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>'Ascension de Jésus au Ciel, quarante jour après Pâques. Fruit du mystère, la vertu théologale d'Espérance.</div>
        <img src="{{ asset('img/rdp/responsive/comment-prier3-3.png') }}" class="logo" alt="logo" />
        <div class="p-4 comment-grey-content "><span class="comment-grey-content-l">L</span>a Pentecôte ou descente du Saint-Esprit sur la Sainte Vierge-Marie et les apôtres. Fruit du mystère, la vertu théologale de Charité et le zèle missionnaire.</div>
        <img src="{{ asset('img/rdp/responsive/comment-prier3-4.png') }}" class="logo" alt="logo" />
        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>'Assomption de la Sainte Vierge-Marie au Ciel. Fruit du mystère, la grâce d'une bonne et sainte mort.</div>
        <img src="{{ asset('img/rdp/responsive/comment-prier3-5.png') }}" class="logo" alt="logo" />
        <div class="p-4 comment-grey-content"><span class="comment-grey-content-l">L</span>e courronnenent de la Sainte Vierge-Marie au Ciel et la gloire de tous les Saints. Fruit du mystère, la piété et la dévotion mariales.</div>
    </div>
    <div class="container custom-tweak">
        <div class="d-flex flex-column align-items-center">
            <div class="d-flex justify-content-center align-items-center comment-black-box">
                <a href="{{ route ('lerosaire') }}" class="comment-box-content d-flex align-items-center justify-content-center">Plus d’infos sur le Rosaire</a>
            </div>
            <div class="mt-5 d-flex justify-content-center align-items-center comment-orange-box">
                <a href="{{ route ('notredame') }}" class="p-3 comment-box-content d-flex align-items-center justify-content-center text-start">Notre-Dame de Fatima</a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection