@extends("layouts.front.master")

@section('content')

<style>
/* ---------- Header ---------- */
.page-header {
    background:  #b48e65 ;
}

/* ---------- Main Image ---------- */
.main-preview-img {
    width: 100%;
    max-height: 480px;
    border-radius: 14px;
    object-fit: cover;
    box-shadow: 0 10px 25px rgba(0,0,0,0.12);
    transition: .3s ease;
    cursor: zoom-in;
}

.main-preview-img:hover {
    transform: scale(1.01);
}

/* ---------- Gallery Slider ---------- */
.gallery-wrapper {
    display: flex;
    gap: 12px;
    margin-top: 18px;
    overflow-x: auto;
    padding-bottom: 6px;
}

.gallery-img {
    height: 80px;
    width: 100px;
    object-fit: cover;
    border-radius: 10px;
    border: 2px solid transparent;
    cursor: pointer;
    transition: .3s;
}

.gallery-img:hover,
.gallery-img.active {
    border-color: #b48e65;
    transform: scale(1.08);
}

/* ---------- Right Side Info ---------- */
.project-box {
    background: #fff;
    padding: 40px;
    border-radius: 18px;
    box-shadow: 0 8px 35px rgba(0,0,0,0.08);
    transition: .3s ease;
}

.project-box:hover {
    transform: translateY(-3px);
}

.project-box h1 {
    font-size: 30px;
    font-weight: 700;
    color: #b48e65;
}

/* ---------- Department Badge ---------- */
.project-department {
    margin: 12px 0 20px;
}

.dept-badge {
    display: inline-flex;
    align-items: center;
    background: #e8f0ff;
    color: #b48e65;
    font-weight: 600;
    font-size: 17px;
    padding: 10px 18px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(13,110,253,0.15);
    border: 1px solid #cddcff;
    transition: 0.3s ease;
}

.dept-badge:hover {
    background: #b48e65;
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(13,110,253,0.4);
}

.dept-badge i {
    margin-left: 6px;
    margin-right: 6px;
}

/* ---------- Description ---------- */
.project-box .description {
    font-size: 15px;
    line-height: 1.7;
    color: #555;
}

/* ---------- Modal ---------- */
.modal-image {
    max-height: 550px;
    width: 100%;
    object-fit: contain;
}
/* Mobile Fix — Make all images same size */
@media (max-width: 576px) {

    /* Main image size fixed on mobile */
    .main-preview-img {
        height: 300px !important;
        object-fit: cover !important;
    }

    .project-box h1 {
    font-size: 20px;
    font-weight: 700;
    color: #b48e65;
}


    /* Gallery images same size on mobile */
    .gallery-img {
        width: 90px !important;
        height: 90px !important;
        object-fit: cover !important;
    }

    /* Force wrapper horizontal scroll */
    .gallery-wrapper {
        gap: 8px;
        overflow-x: auto;
        padding-bottom: 8px;
    }
}

</style>


<!-- Header -->
<div class="container-fluid page-header py-5 mb-5 text-center text-white">
    <h1 class="display-4 fw-bold"  style="    color: #ffff !important;
">{{ trans('header.projects') }}</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50">{{ trans('home.house') }}</a></li>
            <li class="breadcrumb-item active text-white">{{ trans('header.projects') }}</li>
        </ol>
    </nav>
</div>


<!-- Page Content -->
<div class="container py-5">
    <div class="row g-5">

        <!-- Left Side -->
        <div class="col-lg-6">
            <img id="previewImage"
                 src="{{ asset('images/projects/main/' . $project->image) }}"
                 class="main-preview-img"
                 onclick="openImageModal(this)">

            @if($project->images && count($project->images) > 0)
                <div class="gallery-wrapper">

                    @foreach($project->images as $image)
                        <img src="{{ asset('images/projects/gallary/' . $image) }}"
                             class="gallery-img"
                             onclick="changeImage(this)">
                    @endforeach

                </div>
            @endif
        </div>

        <!-- Right Side -->
        <div class="col-lg-6">
            <div class="project-box">

                <!-- Project Title -->
                <h1>{!! $project->translate(app()->getLocale())->name !!}</h1>

                <!-- Department -->
                <div class="project-department">
                    <span class="dept-badge">
                        <i class="fas fa-building"></i>
                        {!! $project->department->translate(app()->getLocale())->name !!}
                    </span>
                </div>

                <!-- Description -->
                <p class="description">
                    {!! $project->translate(app()->getLocale())->description !!}
                </p>

            </div>
        </div>

    </div>
</div>


<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header border-0">
                <h5 class="modal-title">{{ __('عرض الصورة') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <img id="modalImage" class="modal-image rounded">
            </div>
        </div>
    </div>
</div>


<script>
function changeImage(element) {
    document.getElementById("previewImage").src = element.src;

    document.querySelectorAll('.gallery-img').forEach(img => img.classList.remove('active'));
    element.classList.add('active');
}

function openImageModal(element) {
    document.getElementById("modalImage").src = element.src;

    const modal = new bootstrap.Modal(document.getElementById('imageModal'));
    modal.show();
}
</script>

@endsection
