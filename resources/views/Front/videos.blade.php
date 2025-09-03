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

@extends('layouts.front.master')

@section('content')

    <!-- Hero Banner Section Start -->
    <section class="video-hero-section d-flex align-items-center" style=" margin-top: 10px;">
        <div class="hero-overlay"></div>
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="hero-content text-center">
                        <!-- <div class="hero-badge wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                            <i class="fas fa-play-circle"></i>
                            <span>Video Library</span>
                        </div> -->
                        <h1 class="hero-title wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                            {{ trans('home.video_library') ?? 'Video Library' }}
                        </h1>
                        <p class="hero-subtitle wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                            {{ trans('home.video_library_desc') ?? 'Discover our collection of videos showcasing our products, processes, and innovations' }}
                        </p>
                        <div class="hero-stats wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1.4s">
                        <div class="stat-item">
                                <span class="stat-number">HD</span>
                                <span class="stat-label">{{trans('home.quality')}}</span>
                            </div>

                        <div class="stat-item">
                                <span class="stat-number">{{ isset($videos) ? $videos->count() : 0 }}</span>
                                <span class="stat-label">{{trans('home.video')}}</span>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Hero Banner Section End -->

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
            <div class="row">
    <div class="col-12 d-flex justify-content-center mt-4">
        <div class="custom-pagination">
            {{ $videos->links() }}
        </div>
    </div>
        </div>

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

@endsection
