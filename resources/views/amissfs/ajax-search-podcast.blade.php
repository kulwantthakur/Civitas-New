<div class="searchResult">
    <div class="mb-5 podcast-home-category">Catégories</div>
    @if($categories->isEmpty())
    <div class="d-flex justify-content-center podcast-home-category">No categories found.</div>
    @else
    <div class="p-3 podcast-home-grid">
        @foreach($categories as $category)
        <a href="{{ route('podcast-subcategory', $category->url) }}"
            class="d-flex justify-content-between text-decoration-none"
            style="background-color: {{ $category->color }}; height: 107px;">
            <div class="d-flex justify-content-center align-items-start">
                <div class="podcast-grid-title text-uppercase p-3 w-100">{{ $category->name }}</div>
            </div>
            <div class="me-3 d-flex justify-content-center align-items-center">
                <img src="{{ asset($category->icon) }}" alt="logo" />
            </div>
        </a>
        @endforeach
    </div>
    @endif
    <div class="space-100"></div>

    <div class="mb-5 podcast-home-category">Fichiers Audio</div>
    @if($podcasts->isEmpty())
    <div class="d-flex justify-content-center podcast-home-category">No podcasts found.</div>
    @else
    <div class="p-3 podcast-home-grid potition-relative">
        @foreach($podcasts as $podcast)
        <div class="mb-5 position-relative">
            <a href="{{ route('podcast-name', ['categoryUrl' => $podcast->category->url, 'podcastUrl' => $podcast->url]) }}" class="text-decoration-none">
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
        <div class="load-more-container">
            <button class="load-more-btn">VOIR PLUS</button>
        </div>
    </div>
    @endif
</div>