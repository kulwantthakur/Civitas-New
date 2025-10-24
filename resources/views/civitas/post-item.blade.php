@if($sectionId == 6)
@foreach ($posts as $news)
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

@elseif($type == 'category' && $sectionId == 6)
@foreach($category as $news)
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

@elseif($sectionId == 4)
@foreach($posts as $status)
<div class="position-relative">
    <div class="container">
        <div class="status-page-content mb-3">{{ \Carbon\Carbon::parse($status->url)->locale('fr')->format('d F Y, H\hi') }}</div>
        <a href="{{ route('civitas.statuspage',['url' => \Carbon\Carbon::parse($status->url)->format('d-m-Y')]) }}" class="party-hover">
            <div class="status-page-content-blue">{{ $status->title }}</div>
        </a>
    </div>
    <div class="position-absolute end-0 bottom-0">
        <img src="{{ asset('img/civitas/questions.png') }}" class="d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" alt="logo" />
    </div>
</div>
<div class="space-50"></div>
@endforeach
@endif