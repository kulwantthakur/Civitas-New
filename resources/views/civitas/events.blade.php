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
@if($page == 0)
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    @if($latestevent)
    <div class="space-600"></div>
    @else
    <div class="space-100"></div>
    <div class="civitas-events-title mb-5">AUCUN ÉVÉNEMENT À VENIR.</div>
    @endif
    <div class="position-relative">
        <img src="{{ asset('img/civitas/events-black.png') }}" class="w-100" alt="Background Image" />
        @if($latestevent)
        <div class="events-position">
            <img src="{{ asset($latestevent->image) }}" class="w-100" alt="Event Image" />
        </div>
        @endif
        <div class="red-line-position"></div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container">
        @if(isset($latestevent))
        <img src="{{ asset($latestevent->image_responsive) }}" class="w-100" alt="Event Image" />
        @else
        <div class="civitas-events-title">AUCUN ÉVÉNEMENT À VENIR.</div>
        @endif
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="d-flex justify-content-center flex-column align-items-center ">
        <div class="events-red-box d-flex flex-column justify-content-center align-items-center p-3">
            <div class="events-red-box-content my-3">
                @if(!empty($latestevent))
                {{ \Carbon\Carbon::parse($latestevent->created_at)->locale('fr')->isoFormat('dddd D MMMM YYYY') }}
                @else
                <div>Aucun événement à venir.</div>
                @endif
            </div>
            <a href="{{ isset($latestevent) ? route('civitas.next-event', [
                    'created_at' => \Carbon\Carbon::parse($latestevent->created_at)->format('d-m-Y'),
                    'user_name' => strtolower(str_replace(' ', '-', Str::ascii($latestevent->user->name))),
                    'title' => strtolower(str_replace(' ', '-', Str::ascii($latestevent->title)))
                ]) : 'javascript:void(0);' }}"
                class="events-red-box-button d-flex justify-content-center align-items-center">
                PLUS D’INFORMATIONS
            </a>
        </div>
        <div class="events-black-box d-flex justify-content-center align-items-center p-3">
            <div class="events-black-box-content">Les conférences sont ouvertes à tous, adhérents ou non. Afin de faciliter l’organisation, nous vous serions très reconnaissants de nous informer de notre présence sur : <a href="mailto:event@civitassuisse.ch" class="events-black-box-content">event<span class="text-decoration-underline">@civitassuisse.ch</span></a></div>
        </div>
        <div class="mt-4 d-flex align-items-center justify-content-center responsive-width">
            <a href="{{ route('civitas.newsletter') }}" class="events-red-box-button-newsletter d-flex justify-content-center align-items-center">S’INSCRIRE À LA NEWSLETTER</a>
        </div>
        <div class="my-4">
            <div class="civitas-events-title">ÉVÉNEMENT<br>SUIVANT</div>
            @if(isset($secondUpcomingEvent))
            <a href="{{ route('civitas.next-event', [
                'created_at' => \Carbon\Carbon::parse($secondUpcomingEvent->created_at)->format('d-m-Y'),
                'user_name' => strtolower(str_replace(' ', '-', Str::ascii($secondUpcomingEvent->user->name))),
               'title' => strtolower(str_replace(' ', '-', Str::ascii($secondUpcomingEvent->title)))
                ]) }}">
                <img src="{{ asset($secondUpcomingEvent->icon) }}" width="460" class="mt-4" alt="Prochain événement" />
            </a>
            @else
            <div class="mt-4 civitas-events-title">Aucun événement disponible</div>
            @endif
        </div>
        <div class="d-flex align-items-center justify-content-center responsive-width my-5">
            <a href="{{ route('civitas.agenda') }}" class="events-red-box-button-agenda d-flex justify-content-center align-items-center">VOIR L’AGENDA DÉTAILLÉ</a>
        </div>
        <div class="my-5 ">
            <div class="civitas-events-title">ÉVÉNEMENTS<br>PASSÉS</div>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column">
            @foreach($allpastevents as $event)
            <div class="image-container mt-4">
                <img src="{{ asset($event->icon) }}" alt="event" class="default-image">
                <img src="{{ asset($event->image) }}" width="414" height="590" alt="event" class="hover-image">
            </div>
            @endforeach
        </div>

    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
@elseif($page == 1)
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="space-500"></div>
    <div class="position-relative">
        <img src="{{ asset('img/civitas/next-events-new.png') }}" class="w-100 next-event-height" alt="logo" />
        <div class="events-next-position">
            <img src="{{ asset($event->image) }}" class="w-100" alt="logo" />
        </div>

        <div class="events-next-position-grey">
            <div class="events-next-position-sec w-100">
                <div class="next-event-title">{{ $event->title }}</div>
            </div>
            <div class="grey-box-events">
                <div class="d-flex justify-content-center align-items-center flex-column h-100">
                    <div class="m-auto">
                        <a href="{{ route('civitas.event-detail', [
                                        'created_at' => \Carbon\Carbon::parse($event->created_at)->format('d-m-Y'),
                                        'user_name' => strtolower(str_replace(' ', '-', Str::ascii($event->user->name))),
                                         'title' => strtolower(str_replace(' ', '-', Str::ascii($event->title)))
                                    ]) }}" class="next-event-red-button d-flex justify-content-center align-items-center">
                            S’INSCRIRE
                        </a>
                        <div class="my-5"></div>
                        <a href="{{ route('civitas.agenda') }}" class="next-event-red-button d-flex justify-content-center align-items-center">VOIR L’AGENDA DÉTAILLÉ</a>
                        <div class="my-5"></div>
                        <div class="next-event-box-grey d-flex justify-content-center align-items-center flex-column">
                            <div class="next-event-box-grey-title">ADHÉRER À CIVITAS SUISSE</div>
                            <a href="{{ route('civitas.member') }}" class="next-event-grey-button d-flex justify-content-center align-items-center mt-4">DEVENIR MEMBRE</a>
                        </div>
                        <div class="my-5"></div>
                        <div class="next-event-box-red d-flex justify-content-center align-items-center flex-column">
                            <div class="next-event-box-red-title">S’INSCRIRE À LA NEWSLETTER</div>
                            <a href="{{ route('civitas.newsletter') }}" class="next-event-box-red-button d-flex justify-content-center align-items-center mt-4">RESTER INFORMÉ !</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container">
        <img src="{{ asset('img/civitas/events_dynamic.png') }}" class="w-100" alt="logo" />
        <a href="{{ route('civitas.event-detail', [
                'created_at' => \Carbon\Carbon::parse($event->created_at)->format('d-m-Y'),
                'user_name' => strtolower(str_replace(' ', '-', Str::ascii($event->user->name))),
                'title' => strtolower(str_replace(' ', '-', Str::ascii($event->title)))
            ]) }}" class="next-event-red-button d-flex justify-content-center align-items-center my-4">S’INSCRIRE</a>
    </div>
    <div class="events-next-black-bg-full d-flex align-items-center">
        <marquee behavior="scroll" direction="right" scrollamount="12" class="events-next-marquee">PROTECTION DES DONNÉES / DATENSCHUTZE</marquee>
    </div>
    <div class="container my-4">
        <div class="next-event-box-grey d-flex justify-content-center align-items-center flex-column ">
            <div class="next-event-box-grey-title">ADHÉRER À CIVITAS SUISSE</div>
            <a href="{{ route('civitas.member') }}" class="next-event-grey-button d-flex justify-content-center align-items-center mt-4">DEVENIR MEMBRE</a>
        </div>
        <div class="next-event-box-red d-flex justify-content-center align-items-center flex-column">
            <div class="next-event-box-red-title">S’INSCRIRE À LA NEWSLETTER</div>
            <a href="{{ route('civitas.newsletter') }}" class="next-event-box-red-button d-flex justify-content-center align-items-center mt-4">RESTER INFORMÉ !</a>
        </div>
        <a href="{{ route('civitas.agenda') }}" class="next-event-red-button d-flex justify-content-center align-items-center mt-4">VOIR L’AGENDA DÉTAILLÉ</a>
    </div>
</div>
@elseif($page == 2)
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="space-300"></div>
    <div class="position-relative">
        <img src="{{ asset('img/civitas/events-register-new.png') }}" class="w-100 register-event-height" alt="logo" />
        <div class="events-register-position">
            <img src="{{ asset($event->image) }}" class="d-flex m-auto" width="470" height="685" alt="logo" />
            <div class="space-50"></div>
            <div class="events-register-title text-uppercast">{{ $event->title }}</div>
            <div class="events-register-line mt-4"></div>
        </div>
        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="events-register-content-white">{{ ucwords(\Carbon\Carbon::parse($event->created_at)->locale('fr')->isoFormat('dddd D MMMM YYYY')) }}</div>
            <div class="events-register-content-white-small">{{ \Carbon\Carbon::parse($event->created_at)->format('H:i') }}</div>
            <div class="space-50"></div>
            <div class="events-register-content-black">{!! $event->content !!}</div>
            <div class="space-50"></div>
            <form id="event-register" method="POST" action="{{ route('submit-form') }}">
                @csrf
                <input type="hidden" class="commander-input" name="source_page">
                <div class="events-register-white-form p-3">
                    <div class="d-flex align-items-center">
                        <input type="radio" id="madame" name="gender" value="mrs">
                        <label class="events-register-radio">Madame</label>
                        <div class="mx-3"></div>
                        <input type="radio" id="monsieur" name="gender" value="mr">
                        <label class="events-register-radio">Monsieur</label>
                    </div>
                    <div class="d-flex flex-column">
                        <input class="my-2" type="email" id="email-register" name="email" placeholder="Votre adresse e-mail" required>
                        <input class="my-2" type="text" id="name-register" name="lname" placeholder="Prénom" required>
                        <input class="my-2" type="text" id="name-1-register" name="fname" placeholder="Nom" required>
                    </div>
                    <div class="d-flex justify-content-center align-items-center my-3">
                        <button type="submit" class="events-register-black-button d-flex justify-content-center align-items-center border-0">JE M’INSCRIS</button>
                    </div>
                    <div class="d-flex align-items-start">
                        <input type="checkbox" id="agree" name="agree_terms" value="1" required />
                        <label class="events-register-agree ms-1">* Je donne mon accord au traitement des données pour cette inscription.</label>
                    </div>
                </div>
            </form>
        </div>
        <div class="events-register-marquee-position w-100">
            <div class="black-bg-full d-flex align-items-center">
                <marquee behavior="scroll" direction="right" scrollamount="12" class="events-register-marquee">PROTECTION DES DONNÉES / DATENSCHUTZE</marquee>
            </div>
        </div>
        <div class="events-register-bottom-position">
            <a href="{{ route('civitas.agenda') }}" class="next-event-red-button d-flex justify-content-center align-items-center">VOIR L’AGENDA DÉTAILLÉ</a>
            <div class="my-5"></div>
            <div class="next-event-box-grey d-flex justify-content-center align-items-center flex-column">
                <div class="next-event-box-grey-title">ADHÉRER À CIVITAS SUISSE</div>
                <a href="{{ route('civitas.member') }}" class="next-event-grey-button d-flex justify-content-center align-items-center mt-4">DEVENIR MEMBRE</a>
            </div>
            <div class="my-5"></div>
            <div class="next-event-box-red d-flex justify-content-center align-items-center flex-column">
                <div class="next-event-box-red-title">S’INSCRIRE À LA NEWSLETTER</div>
                <a href="{{ route('civitas.newsletter') }}" class="next-event-box-red-button d-flex justify-content-center align-items-center mt-4">RESTER INFORMÉ !</a>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="container">
        <img src="{{ asset('img/civitas/events-register-dynamic.png') }}" class="w-100" alt="logo" />
        <div class="events-register-title-responsive text-uppercase mt-3">{{ $event->title }}</div>
    </div>
    <div class="position-relative mt-3">
        <div class="d-flex justify-content-end">
            <img src="{{ asset('img/civitas/responsive/events-register.png') }}" class="" alt="logo" />
            <div class="events-register-top-position">
                <div class="container">
                    <div class="events-register-content-white">{{ ucwords(\Carbon\Carbon::parse($event->created_at)->locale('fr')->isoFormat('dddd D MMMM YYYY')) }}</div>
                    <div class="events-register-content-white-small">{{ \Carbon\Carbon::parse($event->created_at)->format('H:i') }}</div>
                    <div class="events-register-content-black mt-3">Cette conférence blablabla</div>
                </div>
            </div>
            <div class="events-register-bg-opacity-position">
                <div class="events-register-bg-opacity d-flex align-items-center">
                    <div class="container">
                        <div class="events-register-content-black">{!! $event->content !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="my-3">
            <form id="event-register" method="POST" action="{{ route('submit-form') }}">
                @csrf
                <input type="hidden" class="commander-input" name="source_page">
                <div class="d-flex align-items-center">
                    <input type="radio" id="madame" name="gender" value="mrs" required>
                    <label class="events-register-radio">Madame</label>
                    <div class="mx-3"></div>
                    <input type="radio" id="monsieur" name="gender" value="mr">
                    <label class="events-register-radio">Monsieur</label>
                </div>
                <div class="d-flex flex-column">
                    <input class="my-2" type="email" id="email-register" name="email" placeholder="Votre adresse e-mail" required>
                    <input class="my-2" type="text" id="name-register" name="lname" placeholder="Prénom" required>
                    <input class="my-2" type="text" id="name-1-register" name="fname" placeholder="Nom" required>
                </div>
                <div class="d-flex justify-content-center align-items-center my-3">
                    <button type="submit" class="events-register-black-button d-flex justify-content-center align-items-center border-0 background-none">JE M’INSCRIS</button>
                </div>
                <div class="d-flex align-items-start">
                    <input type="checkbox" id="agree" name="agree_terms" value="1" required />
                    <label class="events-register-agree ms-1">* Je donne mon accord au traitement des données pour cette inscription.</label>
                </div>
            </form>
        </div>
    </div>
    <div class="black-bg-full d-flex align-items-center mb-3">
        <marquee behavior="scroll" direction="right" scrollamount="12" class="events-register-marquee">PROTECTION DES DONNÉES / DATENSCHUTZE</marquee>
    </div>
    <div class="container">
        <div class="next-event-box-grey d-flex justify-content-center align-items-center flex-column m-auto">
            <div class="next-event-box-grey-title">ADHÉRER À CIVITAS SUISSE</div>
            <a href="{{ route('civitas.member') }}" class="next-event-grey-button d-flex justify-content-center align-items-center mt-4">DEVENIR MEMBRE</a>
        </div>
        <div class="next-event-box-red d-flex justify-content-center align-items-center flex-column m-auto">
            <div class="next-event-box-red-title">S’INSCRIRE À LA NEWSLETTER</div>
            <a href="{{ route('civitas.newsletter') }}" class="next-event-box-red-button d-flex justify-content-center align-items-center mt-4">RESTER INFORMÉ !</a>
        </div>
        <div class="my-3"></div>
        <a href="{{ route('civitas.agenda') }}" class="next-event-red-button d-flex justify-content-center align-items-center m-auto">VOIR L’AGENDA DÉTAILLÉ</a>
    </div>
</div>
@elseif($page == 3)
<div class="d-flex flex-column align-items-center mb-2 mb-sm-2 mb-md-2 mb-lg-5 mb-xl-5 mb-xxl-5">
    <div class="past-events-title">ÉVÉNEMENTS PASSÉS</div>
</div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="position-relative">
        <img src="{{ asset('img/civitas/past-events.png') }}" class="w-100" alt="logo" />
        <div class="position-absolute start-50 top-50 translate-middle past-events-width">
            <div class="events-past-title">Conférence d’Alain Escada - 25 juin 2021</div>
            <div class="events-past-white-line my-3"></div>
            <div class="events-past-cotnent">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque bibendum libero sed fermentum ultricies. Morbi in tortor tellus. </div>
            <iframe class="w-100 mt-3" height="246" src="https://www.youtube.com/embed/kUh12GqmPNg?si=8CCpEHwmXwMcrdKT" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="bg-dark d-flex justify-content-center align-items-center mt-3">
        <div class="container my-3">
            <div class="events-past-title">Conférence d’Alain Escada - 25 juin 2021</div>
            <div class="events-past-white-line my-3"></div>
            <div class="events-past-cotnent">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque bibendum libero sed fermentum ultricies. Morbi in tortor tellus. </div>
            <iframe class="w-100 h-100 mt-3" src="https://www.youtube.com/embed/kUh12GqmPNg?si=8CCpEHwmXwMcrdKT" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="row">
        @foreach ($allpastevents as $event)
        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
            <div class="d-flex flex-column p-0 p-sm-0 p-md-0 p-lg-3 p-xl-3 p-xxl-3 my-3">
                <div class="events-past-title-form">
                    {{ $event->title }} - {{ ucwords(\Carbon\Carbon::parse($event->created_at)->locale('fr')->translatedFormat('d M Y')) }}
                </div>
                <div class="events-past-black-line my-3"></div>
                <div class="events-past-content-form">{!! $event->content_sec !!}</div>
                @if($event->events_image)
                <img src="{{ asset($event->events_image) }}" class="">
                @elseif($event->link)
                <iframe class="w-100 mt-3" height="315" src="{{ $event->link }}" frameborder="0" allowfullscreen></iframe>
                @elseif($event->upload_video)
                <iframe class="mt-3 w-100" height="315" src="{{ asset($event->upload_video) }}" frameborder="0"  allowfullscreen></iframe>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="d-flex align-items-center justify-content-center my-5">
        <a href="{{ route('civitas.agenda') }}" class="past-events-red-button d-flex justify-content-center align-items-center">VOIR L’AGENDA DÉTAILLÉ</a>
    </div>
</div>
@endif

@if(Auth::user() && ($page == 2))
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Page</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateDetailsEvent" method="POST" action="{{ route('page-store.update', $event->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="number_validation" value="6">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control custom-form titleInputEdit" name="title" value="{{ $event->title }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Event Date</label>
                            <input type="text" class="form-control custom-form" name="created_at" id="flatpickr-datetime-edit-next-event">
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-12">
                            <label class="form-label">Url</label>
                            <input type="text" class="form-control custom-form urlInputEdit" name="url" value="{{ $event->url }}" readonly>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-12">
                            <label class="form-label">Content</label>
                            <div class="content" id="summernote-event-edit-next"></div>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Current Image</label>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset($event->image) }}" alt="Current Image" id="currentImage" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Current Image Responsive</label>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset($event->image_responsive) }}" alt="Current Image Responsive" id="currentImageResponsive" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="my-3"></div>
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
            <form id="deleteDetailsEvent">
                @csrf
                <input type="hidden" name="id" value="{{ $event->id }}">
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
@elseif(Auth::user() && ($page == 3))
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Page</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updatePastEvent" method="POST" action="{{ route('page-store.update',1) }}" enctype="multipart/form-data">
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
                                @foreach($allpastevents as $events)
                                <option
                                    value="{{ $events->title }}"
                                    data-id="{{ $events->id }}"
                                    data-url="{{ $events->url }}"
                                    data-created_at="{{ $events->created_at }}"
                                    data-content-sec="{{ $events->content_sec }}"
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
                        <div class="row">
                            <div class="my-3"></div>
                            <div class="col-md-6">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control custom-form titleInputEdit" name="title" value="">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Event Date</label>
                                <input type="text" class="form-control custom-form" name="created_at" value="" id="flatpickr-datetime-edit-event">
                            </div>
                            <div class="my-3"></div>
                            <div class="col-md-12">
                                <label class="form-label">Url</label>
                                <input type="text" class="form-control custom-form urlInputEdit" name="url" value="" readonly>
                            </div>
                            <div class="my-3"></div>
                            <div class="col-md-12">
                                <label class="form-label">Description</label>
                                <div class="content_sec" id="summernote-event-edit-description"></div>
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
                                    <input type="file" name="upload_video" class="filepond" accept="video/*">
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
            <form id="deletePastEvent">
                @csrf
                <input type="hidden" name="id" id="pastEventId" value="">
                <div class="modal-body">
                    <label class="form-label">Select Past Event to Delete</label>
                    <select class="form-select custom-form" id="pastEvent" required>
                        <option value="">Select Event</option>
                        @foreach($allpastevents as $event)
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
<script>
    $(document).on("submit", "#event-register", function(e) {
        e.preventDefault();
        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");
        var currentUrl = window.location.href;
        $('[name="source_page"]').val(currentUrl);
        var formData = new FormData(this);
        $.ajax({
            url: "{{ route('submit-form') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    toastr.success("Email send successfully!", "Success");
                    $("#event-register")[0].reset();
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
@if(Auth::user() && ($page == 2))
<script>
    FilePond.registerPlugin(FilePondPluginMediaPreview);
    var pond = FilePond.create(document.querySelector('.filepond'), {
        acceptedFileTypes: ['video/*'],
    });
    var flatpickrEdit = $('#flatpickr-datetime-edit-next-event').flatpickr({
             enableTime: true,
            dateFormat: 'd-m-Y H:i'
    });
  
    $('#summernote-event-edit-next').summernote({
        height: 150,
        placeholder: 'Write your content here...',
        toolbar: toolbarConfig
    });
    var content_page = {!! json_encode($event->content) !!};
    var created_at = {!! json_encode($event->created_at) !!};
    $(document).on("shown.bs.modal", "#editModal", function(e) { 
        var formattedDate = moment(created_at).format('DD-MM-YYYY HH:mm');
        flatpickrEdit.setDate(formattedDate);
        if (content_page != '') {
            $('#summernote-event-edit-next').summernote('code', content_page);
        } else {
            $('#summernote-event-edit-next').summernote('code', '');
        }
    });
    let finalUrl;
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

    $(document).on("submit", "#updateDetailsEvent", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        formData.append('content', $('#summernote-event-edit-next').summernote('code'));
        $.ajax({
            url: "{{ route('page-store.update', $event->id) }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#editModal").modal("hide");
                    $("#updateDetailsEvent")[0].reset();
                    toastr.success("{!! trans('words.message_successful_edit') !!}", "{!! trans('words.message_success') !!}");
                    window.location.href = "{{ route('civitas.agenda') }}";
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
    $(document).on("submit", "#deleteDetailsEvent", function(e) {
        e.preventDefault();
        var customRedirectUrl = "{{ route('civitas.events') }}";
        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('delete.item') }}",
            type: "POST",
            data: formData,
            success: function(response) {
                if (response.success) {
                    toastr.success("{!! trans('words.message_successful_edit') !!}", "{!! trans('words.message_success') !!}");
                    $("#deleteModal").modal("hide");
                    setTimeout(function() {
                        window.location.href = customRedirectUrl;
                    }, 500);
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
@elseif(Auth::user() && ($page == 3))
<script>
    FilePond.registerPlugin(FilePondPluginMediaPreview);
    var pond = FilePond.create(document.querySelector('.filepond'), {
        acceptedFileTypes: ['video/*'],
    });
    var flatpickrCreate = document.querySelector('#flatpickr-datetime-edit-event');
    if (flatpickrCreate) {
        flatpickr(flatpickrCreate, {
            enableTime: true,
            dateFormat: 'Y-m-d H:i'
        });
    }
 
    var allpastevents = {!! json_encode($allpastevents) !!};
    $('#contentSelect').on('change', function() {
        var selectedOption = $('option:selected', this);
        var page_id = selectedOption.data('id');
        var current = allpastevents.find(element=>element.id==page_id);
        var title = current.title;
        var url = current.url;
        var formattedDate = moment(current.created_at).format('DD-MM-YYYY HH:mm');
        var content_sec = current.content_sec;
        var link = current.link;
        var uploadVideo = current.upload_video;
        var eventsImage = current.events_image;

        $('input[name="id"]').val(page_id);
        $('input[name="title"]').val(title);
        $('input[name="url"]').val(url);
        $('input[name="created_at"]').val(formattedDate);

        $('#summernote-event-edit-description').summernote({
            height: 100,
            placeholder: 'Write your content here...',
            toolbar: toolbarConfig
        });

        if (content_sec != '') {
            $('#summernote-event-edit-description').summernote('code', content_sec);
        } else {
            $('#summernote-event-edit-description').summernote('code', '');
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

        if (pond.getFiles().length === 0 && uploadVideo) {
            var videoFilePath = "{{ asset('') }}" + uploadVideo;
            pond.addFile(videoFilePath);
        }

        if (this.value) {
            $('.toggle-content').removeClass('d-none');
        } else {
            $('.toggle-content').addClass('d-none');
        }
    });
    let finalUrlPast;
    $(".titleInputEdit, #flatpickr-datetime-edit-event").on("input change", function() {
        let title = $(".titleInputEdit").val().trim();
        let date = $("#flatpickr-datetime-edit-event").val().trim();
        let userName = "{{ auth()->user()->name }}";

        if (title && date) {
            let formattedDate = date.split(" ")[0];
            let formattedTitle = title.toLowerCase().replace(/\s+/g, '-');
            let formattedUser = userName.toLowerCase().replace(/\s+/g, '-'); 

            let finalUrlPast = `events/next/register/${formattedDate}/${formattedUser}/${formattedTitle}`;
            $(".urlInputEdit").val(finalUrlPast);
        }
    });
    $(document).on("submit", "#updatePastEvent", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        formData.append('content_sec', $('#summernote-event-edit-description').summernote('code'));
        var selectedType = $('input[name="inputType"]:checked').val();
        formData.append('content_type', selectedType);
        if (selectedType === 'upload_video') {
            var pondFiles = pond.getFiles();
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
                    $("#updatePastEvent")[0].reset();
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

    $('#pastEvent').on('change', function() {
        var selectedPastEventId = $(this).val();
        $('#pastEventId').val(selectedPastEventId);
    });

    $(document).on("submit", "#deletePastEvent", function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var selectedPastEventId = $('#pastEventId').val();
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