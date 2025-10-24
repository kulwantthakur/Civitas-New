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
@if($page == 0)
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
    <div class="mx-5">
        <div class="d-flex flex-column align-items-center text-center">
            <img src="{{ asset('/img/civitas/civitas_logo_pages.png') }}" class="" alt="logo" />
            <div class="civitas-title-page mt-3">TOUTE L’ ACTUALITÉ</div>
            <div class="black-line-civitas"></div>
            <div class="civitas-news-subtitle mt-3">Catégorie</div>
        </div>
        <div class="my-5"></div>
        <div class="d-flex flex-column">
            <a href="{{ url('suisse/actualites/analyses')}}" class="d-flex align-items-center text-decoration-none my-3">
                <img src="{{ asset('img/news_right.png') }}" class="me-3" alt="logo" />
                <div class="civitas-news-title">ANALYSES</div>
            </a>
            <a href="{{ url('suisse/actualites/communiques')}}" class="d-flex align-items-center text-decoration-none my-3">
                <img src="{{ asset('img/news_right.png') }}" class="me-3" alt="logo" />
                <div class="civitas-news-title">COMMUNIQUÉS ET COMPTES RENDUS</div>
            </a>
            <a href="{{ url('suisse/actualites/entretiens')}}" class="d-flex align-items-center text-decoration-none my-3">
                <img src="{{ asset('img/news_right.png') }}" class="me-3" alt="logo" />
                <div class="civitas-news-title">ENTRETIENS</div>
            </a>
            <a href="{{ url('suisse/actualites/international')}}" class="d-flex align-items-center text-decoration-none my-3">
                <img src="{{ asset('img/news_right.png') }}" class="me-3" alt="logo" />
                <div class="civitas-news-title">INTERNATIONAL</div>
            </a>
            <a href="{{ url('suisse/actualites/opinions')}}" class="d-flex align-items-center text-decoration-none my-3">
                <img src="{{ asset('img/news_right.png') }}" class="me-3" alt="logo" />
                <div class="civitas-news-title">OPINIONS</div>
            </a>
            <a href="{{ url('suisse/actualites/pelerinages')}}" class="d-flex align-items-center text-decoration-none my-3">
                <img src="{{ asset('img/news_right.png') }}" class="me-3" alt="logo" />
                <div class="civitas-news-title">PÈLERINAGES DE SUISSE</div>
            </a>
            <a href="{{ url('suisse/actualites/votations')}}" class="d-flex align-items-center text-decoration-none my-3">
                <img src="{{ asset('img/news_right.png') }}" class="me-3" alt="logo" />
                <div class="civitas-news-title">VOTATIONS</div>
            </a>
        </div>
    </div>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
    <div class="m-auto">
        <div class="d-flex flex-column align-items-center text-center">
            <div class="civitas-title-page mt-3">TOUTE L’ ACTUALITÉ</div>
            <div class="civitas-news-subtitle mt-3">Catégorie</div>
        </div>
        <div class="line-with-dot">
            <div class="red-dot"></div>
            <div class="red-line"></div>
        </div>
    </div>
    <div class="container">
        <div class="my-5"></div>
        <div class="d-flex flex-column">
            <a href="{{ url('suisse/actualites/analyses')}}" class="d-flex align-items-center text-decoration-none my-3">
                <img src="{{ asset('img/news_right_responsive.png') }}" class="me-3" alt="logo" />
                <div class="civitas-news-title text-uppercase">ANALYSES</div>
            </a>
            <a href="{{ url('suisse/actualites/communiques')}}" class="d-flex align-items-center text-decoration-none my-3">
                <img src="{{ asset('img/news_right_responsive.png') }}" class="me-3" alt="logo" />
                <div class="civitas-news-title text-uppercase">COMMUNIQUÉS ET COMPTES RENDUS</div>
            </a>
            <a href="{{ url('suisse/actualites/entretiens')}}" class="d-flex align-items-center text-decoration-none my-3">
                <img src="{{ asset('img/news_right_responsive.png') }}" class="me-3" alt="logo" />
                <div class="civitas-news-title text-uppercase">ENTRETIENS</div>
            </a>
            <a href="{{ url('suisse/actualites/international')}}" class="d-flex align-items-center text-decoration-none my-3">
                <img src="{{ asset('img/news_right_responsive.png') }}" class="me-3" alt="logo" />
                <div class="civitas-news-title text-uppercase">INTERNATIONAL</div>
            </a>
            <a href="{{ url('suisse/actualites/opinions')}}" class="d-flex align-items-center text-decoration-none my-3">
                <img src="{{ asset('img/news_right_responsive.png') }}" class="me-3" alt="logo" />
                <div class="civitas-news-title text-uppercase">OPINIONS</div>
            </a>
            <a href="{{ url('suisse/actualites/pelerinages')}}" class="d-flex align-items-center text-decoration-none my-3">
                <img src="{{ asset('img/news_right_responsive.png') }}" class="me-3" alt="logo" />
                <div class="civitas-news-title text-uppercase">PÈLERINAGES DE SUISSE</div>
            </a>
            <a href="{{ url('suisse/actualites/votations')}}" class="d-flex align-items-center text-decoration-none my-3">
                <img src="{{ asset('img/news_right_responsive.png') }}" class="me-3" alt="logo" />
                <div class="civitas-news-title text-uppercase">VOTATIONS</div>
            </a>
        </div>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="elements-container">
        @foreach ($latestnews as $news)
        <div class="row">
            <div class="col-5 col-sm-5 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
                <a href="{{ route('civitas.newsheadline', ['url' => $news->url, 'title' => $news->slug]) }}" class="">
                    <img src="{{ asset($news->image) }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" width="365" height="240" alt="logo" />
                    <img src="{{ asset($news->image_responsive) }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" width="130" height="85" alt="logo" />
                </a>
            </div>
            <div class="col-7 col-sm-7 col-md-7 col-lg-8 col-xl-8 col-xxl-8">
                <div class="d-flex flex-column">
                    <div class="civitas-news-category-small">{{ $news->category }}</div>
                    <div class="civitas-news-title-content my-1">{{ $news->title }}</div>
                    <div class="civitas-news-category-small">
                        {{ $news->user->name ?? 'Unknown' }} | {{ $news->created_at->format('d.m.Y') }}
                    </div>
                </div>
            </div>
            <div class="civitas-grey-line-news my-3 my-sm-3 my-md-3 my-lg-5 my-xl-5 my-xxl-5"></div>
        </div>
        @endforeach
    </div>
    <div class="loader" style="display: none; text-align: center;">
        <img src="{{ asset('img/loading.gif') }}" alt="Loading..." />
    </div>
</div>
@elseif($page == 1)
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="d-flex flex-column align-items-center text-center">
        <img src="{{ asset('/img/civitas/civitas_logo_pages.png') }}" class="d-none d-sm-none d-md-none -d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <div class="civitas-title-page smaller-font-responsive text-uppercase mt-3">{{ $categoryTitle }}</div>
        <div class="black-line-civitas d-none d-sm-none d-md-none -d-lg-block d-xl-block d-xxl-block"></div>
        <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
            <div class="line-with-dot">
                <div class="red-dot"></div>
                <div class="red-line"></div>
            </div>
        </div>
    </div>
</div>
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="elements-container">
        @foreach($categorynews as $news)
        <div class="row">
            <div class="col-5 col-sm-5 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
                <a href="{{ route('civitas.newsheadline', ['url' => $news->url, 'title' => Str::slug($news->title)]) }}" class="">
                    <img src="{{ asset($news->image) }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" width="365" height="240" alt="logo" />
                    <img src="{{ asset($news->image_responsive) }}" class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" width="130" height="85" alt="logo" />
                </a>
            </div>
            <div class="col-7 col-sm-7 col-md-7 col-lg-8 col-xl-8 col-xxl-8">
                <div class="d-flex flex-column">
                    <div class="civitas-news-category-small">{{ $news->category }}</div>
                    <div class="civitas-news-title-content my-1">{{ $news->title }}</div>
                    <div class="civitas-news-category-small">
                        {{ $news->user->name ?? 'Unknown' }} | {{ $news->created_at->format('d.m.Y') }}
                    </div>
                </div>
            </div>
            <div class="civitas-grey-line-news my-3 my-sm-3 my-md-3 my-lg-5 my-xl-5 my-xxl-5"></div>
        </div>
        @endforeach
    </div>
    <div class="loader" style="display: none; text-align: center;">
        <img src="{{ asset('img/loading.gif') }}" alt="Loading..." />
    </div>
</div>

@elseif($page == 2)
<div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
<div class="mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
<div class="container">
    <div class="d-flex flex-column align-items-center text-center">
        <img src="{{ asset('/img/civitas/civitas_logo_pages.png') }}" class="d-none d-sm-none d-md-none -d-lg-block d-xl-block d-xxl-block" alt="logo" />
        <div class="civitas-news-subtitle-content mt-3 text-uppercase">{{ $newsItem->category }}</div>
        <div class="black-line-civitas d-none d-sm-none d-md-none -d-lg-block d-xl-block d-xxl-block"></div>
    </div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="mt-3 mt-sm-3 mt-md-3 mt-lg-0 mt-xl-0 mt-xxl-0"></div>
    <div class="article-title">{{ $newsItem->title }}</div>
    <div class="civitas-news-category-small mt-0 mt-lg-2">{{ $newsItem->user->name ?? 'Unknown' }}</div>
    <div class="civitas-news-category-small-op my-1">{{ $newsItem->created_at->format('d.m.Y') }}</div>
    <div class="d-flex align-items-center share-border-news mb-5">
        <a href="https://t.me/share/url?url={{ urlencode(route('civitas.newsheadline', ['url' => $newsItem->url, 'title' => Str::slug($newsItem->title)])) }}&text={{ urlencode($newsItem->title) }}" target="_blank">
            <img src="{{ asset('img/telegram-news.png') }}" alt="Share on Telegram">
        </a>
        <div class="mx-2"></div>
        <a href="mailto:?subject={{ urlencode($newsItem->title) }}&body={{ urlencode(route('civitas.newsheadline', ['url' => $newsItem->url, 'title' => Str::slug($newsItem->title)])) }}" target="_blank">
            <img src="{{ asset('img/email-news.png') }}" alt="Share via Email">
        </a>
        <div class="mx-2"></div>
        <a href="javascript:window.print()" target="_blank">
            <img src="{{ asset('img/print-news.png') }}" alt="Print">
        </a>
        <div class="mx-2"></div>
        <a href="https://twitter.com/intent/tweet?text={{ urlencode($newsItem->title) }}&url={{ urlencode(route('civitas.newsheadline', ['url' => $newsItem->url, 'title' => Str::slug($newsItem->title)])) }}" target="_blank">
            <img src="{{ asset('img/twitter-news.png') }}" alt="Share on Twitter">
        </a>
    </div>
    <div class="civitas-news-page-content mt-3">{!! $newsItem->content !!}</div>
    <div class="border-bottom-news-content my-5"></div>
    <div class="space-100 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block"></div>
    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none">
        <div class="space-50"></div>
        <div class="news-comment-title d-flex justify-content-center align-items-center">COMMENTAIRES</div>
        <div class="space-50"></div>
    </div>
    <div class="comment-section">
        <form id="news-comment" action="{{ route('submit-form', $newsItem->id) }}" method="POST">
            @csrf
            <input type="hidden" class="commander-input" name="source_page">
            <div class="m-auto news-form-width">
                <textarea name="comment" id="summernote-article-comment" class="summernote" required></textarea>
                <div class="mb-3"></div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            @if (auth()->check())
                            <input class="form-control" type="text" id="name-1-register" name="fname" value="{{ auth()->user()->firstname }}" readonly required>
                            @else
                            <input class="form-control" type="text" id="name-1-register" name="fname" placeholder="Nom*" required>
                            @endif
                        </div>

                        <div class="form-group">
                            @if (auth()->check())
                            <input class="form-control" type="text" id="name-register" name="lname" value="{{ auth()->user()->lastname }}" readonly required>
                            @else
                            <input class="form-control" type="text" id="name-register" name="lname" placeholder="Prénom*" required>
                            @endif
                        </div>

                        <div class="form-group">
                            @if (auth()->check())
                            <input type="email" id="email-register" class="form-control commander-input" name="email" value="{{ auth()->user()->email }}" readonly required>
                            @else
                            <input type="email" id="email-register" class="form-control commander-input" name="email" placeholder="Email*" required>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="d-flex justify-content-end align-items-center h-100">
                            <button type="submit" class="news-submit-comment d-flex justify-content-center align-items-center border-0 background-none">Publier le commentaire</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="space-100"></div>
    <div class="comment-title">
        @foreach($comments as $comment)
        @if(Auth::check())
        {{ Auth::user()->firstname }} {{ Auth::user()->lastname }},
        @else($comment->fname)
        {{ $comment->fname }} {{ $comment->lname }},
        @endif
        {{ $comment->created_at->format('d.m.Y') }}
        <div class="comment-body">{!! $comment->comment !!}</div>
        <div class="space-50"></div>
        @endforeach
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
            <form id="createArticle" method="POST" action="{{ route('page-store.store') }}" enctype="multipart/form-data" files="true">
                @csrf
                <input type="hidden" name="section_id" value="{{$section_id ?? ''}}">
                <input type="hidden" name="number_validation" value="4">
                <input type="hidden" id="categoryUrl" name="url">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label">Category*
                            </label>
                            <select class="form-control custom-form" name="category" id="categorySelect" required>
                                <option value="" disabled selected>Select a category</option>
                                <option value="Analyses" data-url="analyses">ANALYSES</option>
                                <option value="Communiqués Et Comptes Rendus" data-url="communiques">COMMUNIQUÉS ET COMPTES RENDUS</option>
                                <option value="Entretiens" data-url="entretiens">ENTRETIENS</option>
                                <option value="Opinions" data-url="opinions">OPINIONS</option>
                                <option value="Pèlerinages De Suisse" data-url="legal">PÈLERINAGES DE SUISSE</option>
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
                            <div class="col-md-6">
                                <label class="form-label">
                                    Thumbnail*
                                    <i class="fa-solid fa-info-circle ms-1"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Upload an thumbnail with maximum width 600px and maximum height 600px. Accepted formats: PNG, JPEG, JPG."></i>
                                </label>
                                <input type="file" class="form-control custom-form" name="image" accept=".png, .jpeg, .jpg" required>
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
@if(isset($newsItem))
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Page</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateArticle" method="POST" action="{{ route('page-store.update', $newsItem->id ) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="number_validation" value="1">
                <input type="hidden" name="category" value="{{ $newsItem->category }}">
                <input type="hidden" name="url" value="{{ $newsItem->url }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control custom-form" name="title" value="{{ $newsItem->title }}">
                        </div>
                        <div class="my-3"></div>
                        <div class="col-12">
                            <label class="form-label">Content</label>
                            <div class="content" id="summernote-article-edit"></div>
                        </div>
                        <div class="my-3"></div>
                        <div class="col-md-6">
                            <label class="form-label">Current Thumbnail</label>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset($newsItem->image) }}" alt="Current Icon" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Upload New Thumbnail
                                <i class="fa-solid fa-info-circle ms-1"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="right"
                                    title="Upload an thumbnail with maximum width 600px and maximum height 600px. Accepted formats: PNG, JPEG, JPG."></i>
                            </label>
                            <input type="file" class="form-control custom-form" name="image" accept=".png, .jpeg, .jpg">
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
            <form id="deleteArticle">
                @csrf
                <input type="hidden" name="id" value="{{ $newsItem->id }}">
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
@if($page == 2)
<script>
    $('#summernote-article-comment').summernote({
        height: 100,
        placeholder: 'Soyez le premier à commenter !',
        toolbar: toolbarConfig
    });

    $(document).on("submit", "#news-comment", function(e) {
        e.preventDefault();
        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");
        var currentUrl = window.location.href;
        $('[name="source_page"]').val(currentUrl);
        var formData = new FormData(this);

        $.ajax({
            url: "{{ route('submit-form', $newsItem->id) }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    toastr.success("Your comment has been posted!", "Success");
                    $("#news-comment")[0].reset();
                    $('.summernote').summernote('reset');
                } else {
                    var errors = response.errors;
                    $.each(errors, function(field, messages) {
                        var inputField = $('[name="' + field + '"]');
                        inputField.addClass("is-invalid");
                        var errorMessages = messages.join("<br>");
                        inputField.after('<div class="text-danger">' + errorMessages + "</div>");
                    });
                }
            },
            error: function(xhr) {
                toastr.error("An unexpected error occurred. Please contact the development team.", "Error");
            },
        });
    });
</script>
@endif
@if(isset($has_more))
<script>
    let hasMore = {!! json_encode($has_more) !!};
    const sectionId = "{{ $section_id }}";
    const category = "{{ $categoryTitle ?? '' }}";
</script>
<script src="{{ asset('js/main.js') }}"></script>
@endif
@if(Auth::user() && $page == 0)
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
    $(document).on("submit", "#createArticle", function(e) {
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
                    $("#createArticle")[0].reset();
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
@endif
@if(Auth::user() && $page == 2)
<script>
    $('#summernote-article-edit').summernote({
        height: 300,
        placeholder: 'Write your content here...',
        toolbar: toolbarConfig
    });
    var content_page = {!! json_encode($newsItem->content) !!};
    $(document).on("shown.bs.modal", "#editModal", function(e) {
        if (content_page != '') {
            $('#summernote-article-edit').summernote('code', content_page);
        } else {
            $('#summernote-article-edit').summernote('code', '');
        }
    });
    $(document).on("submit", "#updateArticle", function(e) {
        e.preventDefault();

        $(".text-danger").remove();
        $(".is-invalid").removeClass("is-invalid");

        var formData = new FormData(this);
        formData.append('content', $('#summernote-article-edit').summernote('code'));
        $.ajax({
            url: "{{ route('page-store.update', $newsItem->id) }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#editModal").modal("hide");
                    $("#updateArticle")[0].reset();
                    toastr.success("{!! trans('words.message_successful_edit') !!}", "{!! trans('words.message_success') !!}");
                    let formattedTitle = response.data.title.trim().replace(/\s+/g, '-');
                    window.location.href = formattedTitle;
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

    $(document).on("submit", "#deleteArticle", function(e) {
        e.preventDefault();
        var customRedirectUrl = "{{ route('civitas.news') }}";
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
@endsection