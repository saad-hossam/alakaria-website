@extends("layouts.front.master")

@section('content')

<style>
    .main-preview-img {
        width: 100%;
        max-height: 450px;
        object-fit: contain;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
    }

    .gallery-img {
        height: 70px;
        width: 90px;
        object-fit: cover;
        border-radius: 6px;
        border: 2px solid transparent;
        cursor: pointer;
        transition: transform 0.3s ease, border 0.3s ease;
    }

    .gallery-img:hover,
    .gallery-img.active {
        transform: scale(1.1);
        border-color: #0d6efd;
    }

    .thumbnail-wrapper {
        display: flex;
        flex-wrap: nowrap;
        gap: 10px;
        overflow-x: auto;
        margin-top: 15px;
        padding-bottom: 5px;
    }

    .project-details {
        background: #fff;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
    }

    .project-details h1 {
        font-size: 32px;
        font-weight: bold;
        color: #0d6efd;
    }

    .project-details p.lead {
        font-size: 18px;
        color: #333;
        margin-bottom: 10px;
    }

    .project-details p.description {
        font-size: 16px;
        color: #666;
        line-height: 1.6;
    }

    .modal-image {
        max-height: 500px;
    }
</style>

<!-- Page Header -->
<div class="container-fluid page-header bg-primary py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4">{{ trans('header.projects') }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{trans('home.house')}}</a></li>
                <li class="breadcrumb-item active">{{ trans('header.projects') }}</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Project Content -->
<div class="container py-5">
    <div class="row g-5 align-items-start">
        <!-- Left: Image + Gallery -->
        <div class="col-lg-6">
            <div class="text-center mb-3">
                <img id="previewImage" src="{{ asset('images/projects/main/' . $project->image) }}"
                     class="img-fluid main-preview-img" onclick="openImageModal(this)">
            </div>

            @if($project->images && count($project->images) > 0)
                <div class="thumbnail-wrapper">
                    @foreach($project->images as $image)
                        <img src="{{ asset('images/projects/gallary/' . $image) }}"
                             class="gallery-img"
                             onclick="changeImage(this)">
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Right: Text Info -->
        <div class="col-lg-6">
            <div class="project-details">
                <h1>{!! $project->translate(app()->getLocale())->name !!}</h1>
                <p class="lead">{!! $project->department->translate(app()->getLocale())->name !!}</p>
                <p class="description">{!! $project->translate(app()->getLocale())->description !!}</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header border-0">
                <h5 class="modal-title">{{ __('عرض الصورة') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" class="img-fluid rounded shadow modal-image">
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
