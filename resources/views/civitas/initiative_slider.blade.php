<div class="d-none d-lg-block">
    <div class="space-50"></div>
    <div class="row">
        <div class="col-md-2 ps-4">
            <div class="bg-image-slider">
                <a href="{{ route('civitas.initiatives') }}">
                    <div class="bg-image-slider-content">Civitas Suisse<br>soutient<br>les initiatives<br>populaires<br>fédérales<br>suivantes :</div>
                </a>
                <div class="circle-arrow" role="button" tabindex="0" aria-label="Next slide">
                    <img src="{{ asset('img/home_arrow.png') }}" alt="Next" />
                </div>
            </div>
        </div>
        <div class="col-md-10 p-0">
            <div class="d-flex justify-content-center align-items-center">
                <div class="initiative-slider owl-carousel civitas-slider-opacity">
                    @foreach($votes as $vote)
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="{{ route('civitas.voting', ['category' => $vote->category, 'url' => $vote->url]) }}" class="p-3" style="display: block; width: 100%;">
                            <img src="{{ asset($vote->image_responsive) }}" style="width: 100%; aspect-ratio: 1/1; object-fit: contain;" alt="logo" class="slider-image" />
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-lg-none">
    <div class="mt-3">
        <div class="d-flex justify-content-center align-items-center mb-5">
            <div class="initiative-slider owl-carousel civitas-slider-opacity">
                @foreach($votes as $vote)
                <div class="d-flex justify-content-center align-items-center">
                    <a href="{{ route('civitas.voting', ['category' => $vote->category, 'url' => $vote->url]) }}" class="" style="display: block; width: 100%;">
                        <img src="{{ asset($vote->image_responsive) }}" style="width: 100%; aspect-ratio: 1/1; object-fit: contain;" alt="logo" class="slider-image" />
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>