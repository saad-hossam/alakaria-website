@php
function getYoutubeThumbnail($url)
{
    preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $url, $matches);

    if (!empty($matches[1])) {
        $videoId = $matches[1];
        return "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg";
    }

    return null;
}

@endphp

<script>
    window.Laravel = {
        csrfToken: '{{ csrf_token() }}'
    };
</script>

@extends("layouts.front.master")

@section('content')

    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel position-relative">
            @foreach ($sliders as $slide )
            <div class="owl-carousel-item position-relative" data-dot="<img src='{{ asset('images/sliders/'. $slide->image) }}'>">
                    <img src="{{ asset('images/sliders/'. $slide->image) }}" alt="" height="520px">
                                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-10 col-lg-8 text-center">
                                <h3 class="display-6 text-white typewriter" >{{  trans('home.project')}} : {{$slide->translate(app()->getLocale())->title}}</h3>
                                {{-- <a href="" class="btn btn-primary py-3 mt-5 px-5 animated slideInLeft">{{trans('about.read_more')}}</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Carousel End -->



<!-- About Start -->
<div class="container-xxl py-5 about">
    <div class="container pt-5">
        <div class="row g-5 pt-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img">
                    <img class="img-fluid" src="{{asset('img/about-1.jpg')}}" alt="">
                    <img class="img-fluid" src="{{asset('img/about-2.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" style="font-size: 17px" data-wow-delay="0.5s">
                <h2 class="section-title">{{ trans('about.title') }}</h2>
                <h6 class="display-6 mb-4">{{ trans('about.headline') }}</h6>
                <p class="d-flex align-items-start">
                    <i class="fa fa-check text-primary me-2 mt-1"></i>
                    {{ trans('about.description.part1') }}
                </p>


                <p class="d-flex align-items-start">
                    <i class="fa fa-check text-primary me-2 mt-1"></i>
                    {{ trans('about.description.part2') }}
                </p>
                <p class="d-flex align-items-start">
                    <i class="fa fa-check text-primary me-2 mt-1"></i>
                    {{ trans('about.description.part3') }}
                </p>
                <p class="d-flex align-items-start">
                    <i class="fa fa-check text-primary me-2 mt-1"></i>
                    {{ trans('about.description.part4') }}
                </p>
                <p class="d-flex align-items-start">
                    <i class="fa fa-check text-primary me-2 mt-1"></i>
                    {{ trans('about.description.part5') }}
                </p>
                <p class="d-flex align-items-start">
                    <i class="fa fa-check text-primary me-2 mt-1"></i>
                    {{ trans('about.description.part6') }}
                </p>


                {{-- <p>{{ trans('about.description.part1') }}</p>
                <p>{{ trans('about.description.part2') }}</p>
                <p>{{ trans('about.description.part3') }}</p> --}}
                <div class="d-flex align-items-center mb-5">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center border border-5 border-primary" style="width: 120px; height: 120px;">
                        <h1 class="display-1 mb-n2" >25</h1>
                    </div>
                    <div class="ps-4">
                        <h3>{{ trans('about.years_working_experience') }}</h3>
                    </div>
                </div>
                <a style="border-radius: 25px" class="btn btn-primary py-3 px-5" href="{{ route('about') }}">{{ trans('about.read_more') }}</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Service Start -->
<div class="container-xxl py-5 mt-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="section-title">{{trans('services.services_title')}}</h4>
            <h3 class="display-7 mb-4">{{trans('services.services_subtitle')}}</h3>
        </div>
        <div class="row g-4">
            <!-- Always Visible Services -->
            @foreach ($services as $service )

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" >
                <div class="service-item d-flex position-relative text-center ">
                    <!-- <img class="bg-img  " src="{{ asset('img/service-2.jpg') }}" alt=""> -->
                    <div class="service-text  w-100">
                    <img class="mb-4 pb-3 pt-3" style="height:120px;width:120px" src="{{ asset('images/services/'. $service->image) }}" alt="Icon">
                    <h3 class="mb-3">{!! $service->translate(app()->getLocale())->name !!}</h3>
                    <!-- <p class="mb-4">{!! Str::words($service->translate(app()->getLocale())->description, 15, '...') !!}</p> -->
                                       <a class="btn mb-4" href="{{route('service_details',$service->id)}}"><i class="fa fa-plus text-primary  fs-2"></i>{{trans('about.read_more')}}</a>
                    </div>
                    <div>

                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <!-- Show More Button -->
        <div class="text-center mt-4">
           <a style="border-radius: 25px" href="{{ route('services') }}" class="btn btn-primary" id="toggle-more"> {{trans('projects.read_more')}}
           </a>
                </div>
    </div>
</div>
<!-- Service End -->

{{-- <hr> --}}
<!-- Facts Start -->
<div class="container ">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="section-title">{{ trans('about.facts_title') }}</h2>
            {{-- <h6 class="display-5 mb-4">{{trans('about.facts_content')}} </h6> --}}
        </div>
    </div>
</div>
<div class="container-xxl pt-5 ">

    <div class="container pt-5">

        <div class="row g-4">

            @foreach ($departments as $department )

            <div class="col-lg-3 col-md-6 wow fadeInUp pb-5 mt-5" data-wow-delay="0.1s">
                <div class="fact-item text-center bg-light h-100 p-5 pt-4">
                    <div class="fact-icon">
                        <img class="fact-icon m-0" src="{{asset('images/departments/'.$department->image)}}" alt="Icon">
                    </div>
                    <h3 class="mb-2">{!! $department->translate(app()->getLocale())->name !!}</h3>
                    <a href="{{route('projects.by_department',$department->id)}}" style="border-radius: 25px">
                    <button class="btn btn-primary mt-3" style="border-radius: 25px">{{trans('about.fact_button')}}</button>
                </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Facts End -->



{{-- <hr> --}}

<!-- Project Start -->
<div class="container-xxl project py-5">
    <div class="container">

        <!-- Header -->
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="section-title">{{ trans('projects.our_projects') }}</h4>
            <h3 class="display-7 mb-4">{{ trans('projects.projects_body') }}</h3>
        </div>

        <div class="row g-4 p-3 wow fadeInUp" data-wow-delay="0.3s"
            style="border:1px dashed rgb(229, 218, 218); border-radius:12px">

            <!-- LEFT: Project List -->
           <!-- LEFT: Project List -->
        <div class="col-lg-4">
            <div class="nav flex-column nav-pills w-100" id="project-tabs" role="tablist">

                @foreach($projects as $index => $project)
                <button
                    class="nav-link project-tab d-flex align-items-center py-3 px-3 mb-2 rounded @if($index==0) active @endif"
                    data-bs-toggle="pill"
                    data-bs-target="#tab-pane-{{ $index+1 }}"
                    type="button"
                    role="tab">

                    <div class="tab-number me-3">
                        {{ str_pad($index+1, 2, '0', STR_PAD_LEFT) }}
                    </div>

                    <span class="fw-bold project-title">
                        {!! $project->translate(app()->getLocale())->name !!}
                    </span>

                </button>
                @endforeach

            </div>
        </div>


            <!-- RIGHT: Project Content -->
            <div class="col-lg-8">
                <div class="tab-content">

                    @foreach($projects as $index => $project)
                    <div class="tab-pane fade @if($index==0) show active @endif"
                        id="tab-pane-{{ $index+1 }}" role="tabpanel">

                        <div class="row g-4">

                            <!-- Image -->
                            <div class="col-md-6">
                                <div class="project-img-container">
                                    <img src="{{ asset('images/projects/main/' . $project->image) }}"
                                         class="img-fluid rounded shadow-sm"
                                         alt="">
                                </div>
                            </div>

                            <!-- Text -->
                            <div class="col-md-6">

                                <h3 class="fw-bold mb-3">{!! $project->translate(app()->getLocale())->name !!}</h3>

                                @php
                                    $full = strip_tags($project->translate(app()->getLocale())->description);
                                    $sentences = preg_split('/(\.|\!|\?)\s+/', $full);
                                    $preview = implode('. ', array_slice($sentences, 0, 2)) . '...';
                                @endphp

                                <p class="text-muted" style="line-height: 1.7;">{!! $preview !!}</p>

                                <a href="{{ route('project_details', $project->id) }} "
                                   class="btn btn-primary px-4 py-2 mt-2 " style="border-radius: 25px">
                                   <i class="fa-solid fa-circle-info me-2"></i>
                                   {{ trans('projects.read_more') }}
                                </a>

                            </div>
                        </div>

                    </div>
                    @endforeach

                </div>
            </div>

        </div>

        <!-- Show All Projects -->
        <div class="text-center mt-4 pt-3"  >
            <a href="{{ route('projects_all') }}" >
                <button class="btn btn-primary px-5 py-2 " style="border-radius: 25px" >
                    {{ trans('projects.read_more') }}
                </button>
            </a>
        </div>

    </div>
</div>
<!-- Project End -->

<style>
    /* Active Tab */
.nav-pills .nav-link.active {
    background: #f1f1f1 !important;
    color: #000 !important;
    border-left: 4px solid #0d6efd;
}

/* Number Badge */
.tab-number {
    width: 40px;
    height: 40px;
    background: #e9f0ff;
    border: 2px solid #b48e65;
    color: #b48e65;
    font-weight: bold;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: .3s;
}

/* Tab container */
.project-tab {
    background: #ffffff;
    border: 1px solid #e9e9e9;
    transition: 0.3s;
    box-shadow: 0 0 0 rgba(0,0,0,0.02);
}

/* Hover */
.project-tab:hover {
    background: #f7f9ff;
    border-color: #d0ddff;
}

/* Active Tab */
.project-tab.active {
    background: #f1f5ff !important;
    border-left: 4px solid #b48e65 !important;
    border-color: #c6d7ff;
    transform: scale(1.02);
}

.project-tab.active .tab-number {
    background: #b48e65;
    color: #fff;
    border-color: #b48e65;
}

/* Title text */
.project-title {
    font-size: 16px;
    line-height: 1.4;
}

/* Image box clean */
.project-img-container {
    height: 330px;
    overflow: hidden;
    border-radius: 12px;
    background: #f4f4f4;
}

.project-img-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: .3s;
}

.project-img-container img:hover {
    transform: scale(1.05);
}


/* Normal Hover */
.nav-pills .nav-link:hover {
    background: #fafafa;
    transition: 0.3s;
}

/* Image Box */
.project-img-container {
    height: 330px;
    overflow: hidden;
    border-radius: 12px;
}

.project-img-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

</style>
 <!-- Video Library Section Start -->
       <section class="video-library-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header text-center">
                        <!-- <div class="section-badge wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                            <i class="fas fa-video"></i>
                            <span>{{ trans('home.our_videos') ?? 'Our Videos' }}</span>
                        </div> -->
                        <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                            {{ trans('home.our_videos') ?? 'Our Videos' }}
                        </h2>
                        <p class="section-subtitle wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                            {{ trans('home.video_library_subtitle') ?? 'Explore our latest videos and stay updated with our latest products and innovations' }}
                        </p>
                    </div>
                </div>
            </div>

            @if(isset($videos) && $videos->count() > 0)
                <div class="row">
                    @foreach($videos as $video)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="video_card wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                                <div class="video_thumbnail">
                                    <div class="video-badge"></div>
                                    @if($video->video_url)
                                        <img
                                            id="thumb-{{ $video->id }}"
                                            src="{{ getYoutubeThumbnail($video->video_url) }}"
                                            alt="Thumbnail"
                                            class="img-fluid"
                                        >
                                    @else
                                        <div class="video_placeholder">
                                            <i class="fas fa-play-circle"></i>
                                        </div>
                                    @endif
                                    <div class="video_overlay">
                                    <div
    class="play_button"
    onclick="playVideo(
        {{ Js::from($video->video_url) }},
        {{ Js::from($video->title[app()->getLocale()] ?? $video->title['en']) }},
        {{ $video->id }}
    )"
>
    <i class="fa fa-play"></i>
</div>


                                        <!-- @if($video->duration)
                                            <div class="video_info">
                                                <span class="video_duration_badge">{{ $video->duration }}</span>
                                            </div>
                                        @endif -->
                                    </div>
                                </div>

                                <div class="video_content">
                                    <h4 class="video_title">
                                        {{ $video->title[app()->getLocale()] ?? $video->title['en'] }}
                                    </h4>
                                    <div class="video_meta">
                                    <span class="video_views" id="video-views-{{ $video->id }}">
    <i class="fa fa-eye"></i> {{ $video->views }}
</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            @else
                <div class="row">
                    <div class="col-12">
                        <div class="no_videos text-center wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                            <i class="fas fa-video-slash fa-3x mb-3" style="color: #ccc;"></i>
                            <h4>{{ trans('home.no_videos') ?? 'No Videos Available' }}</h4>
                            <p>{{ trans('home.no_videos_desc') ?? 'We are currently working on adding videos to our library. Please check back soon!' }}</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div width="70px" class="text-center">
                                <a class="btn btn-link" href="{{ route('videos') }}">{{ trans('home.show_more') }}</a>

                            </div>

    </section>
    <!-- Video Library Section End -->

    <!-- Video Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel"></h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="video-container">
                        <iframe class="video-iframe" id="videoIframe" src="" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>





<!-- Carousel -->

<!-- Heading for Our Partners -->
<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">

    <h2 class="section-title">{{trans('home.heading.title')}}</h2>
    <h3 class="display-7 mb-4">{{trans('home.heading.subtitle')}}</h3>
</div>
<!-- </div> -->

<!-- Carousel -->
<div id="carouselExampleCaptions" class="carousel container-fluid slide container" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($partners->chunk(4) as $chunkIndex => $partnerChunk)
            <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}" data-bs-interval="1500">
                <div class="d-flex justify-content-between">
                    @foreach ($partnerChunk as $partner)
                        <img src="{{ asset('images/partners/' . $partner->logo) }}"
                             class="d-block"
                             alt="Partner {{ $loop->iteration }}"
                             style="height: 200px; width: 200px;">
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>


    <!-- Carousel Controls -->
    {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button> --}}
</div>





@endsection
