@extends("layouts.front.master")

@section('content')

<style>
/* ---------- Project Card ---------- */
.project-item {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 12px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.08);
    text-align: center;
}

.project-item:hover {
    transform: translateY(-5px);
    box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.15);
}

/* ---------- Image Unified Size ---------- */
.project-img {
    width: 100%;
    height: 300px;             /* Fixed height for ALL images */
    object-fit: cover;         /* No distortion */
    object-position: center;
    border-bottom: 1px solid #eee;
}

/* ---------- Title ----------- */
.project-item h5 {
    font-size: 20px;
    font-weight: 700;
    margin: 18px 0 10px;
    color: #0d6efd;
}

/* ---------- Mobile Responsive ---------- */
@media (max-width: 576px) {
    .project-img {
        height: 200px;         /* smaller size on mobile */
    }
}
</style>



<!-- Page Header Start -->
<div class="container-fluid page-header bg-primary py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">{{ trans('header.projects') }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('home.house') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('header.projects') }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->



<div class="container-xxl py-5">
    <div class="container">

        <div class="row g-4">
            @foreach ($projects as $project)
            <div class="col-lg-4 col-md-6">
                <div class="project-item">

                    <!-- Image (Same Size for All) -->
                    <img src="{{ asset('images/projects/main/' . $project->image) }}"
                         class="project-img"
                         alt="{{ $project->name }}">

                    <!-- Name -->
                    <h5>{!! $project->translate(app()->getLocale())->name !!}</h5>

                    <!-- Button -->
                    <a href="{{ route('project_details', $project->id) }}"
                       class="btn btn-primary py-2 px-4 mb-4">
                       {{ trans('about.read_more') }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>

@endsection
