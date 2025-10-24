@if($sectionId == 9)
@foreach ($results as $result)
<div class="flex-row mt-5 d-flex">
    <div class="col-4 col-sm-4 col-md-4 col-lg-6 col-xl-6 col-xxl-6">
        <div class="archive-plus text-dark">
            + <span class="archive-bulletin-page">N. {{ $result->number }}</span>
        </div>
    </div>
    <div class="col-8 col-sm-8 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
        <a href="{{ route('le-bulletin-archive-past', ['number' => $result->number]) }}"
            class="archive-bulletin-page">
            {{ $result->title }} {{ $result->subtitle }}
        </a>
    </div>
</div>
<div class="space-100"></div>
<div class="black-line-amissfs-light w-100"></div>
@endforeach
@elseif($sectionId == 10)
@foreach ($results as $result)
<div class="flex-row mt-5 d-flex">
    <div class="col-4 col-sm-4 col-md-4 col-lg-6 col-xl-6 col-xxl-6">
        <div class="archive-plus text-dark">
            + <span class="archive-bulletin-page">N. {{ $result->number }}</span>
        </div>
    </div>
    <div class="col-8 col-sm-8 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
        <a href="{{ route('rom-kurier-archive-past', ['number' => $result->number]) }}"
            class="archive-bulletin-page">
            {{ $result->title }} {{ $result->subtitle }}
        </a>
    </div>
</div>
<div class="space-100"></div>
<div class="black-line-amissfs-light w-100"></div>
@endforeach
@endif