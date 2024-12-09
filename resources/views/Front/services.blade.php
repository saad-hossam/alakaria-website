@extends("layouts.front.master")
@section('content')


    <!-- Page Header Start -->
    <div class="container-fluid page-header bg-primary py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">{{trans('header.our_services')}}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">{{trans('home.house')}}</a></li>
                    <li class="breadcrumb-item"><a href="#"></a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('header.our_services')}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">{{ trans('services.services_title') }}</p>
                <h1 class="mb-5">{{ trans('services.services_subtitle') }}</h1>
            </div>
            <div class="row gy-5 gx-4">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 pt-5 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item d-flex h-100">
                            <div class="service-img">
                                <img class="img-fluid"  src="{{ asset('assets/front/img/service-1.jpg') }}" alt="{{trans('pagination.alt_title')}}">
                            </div>
                            <div class="service-text p-5 pt-0">
                                <div class="service-icon">
                                    <i class="{{ $service->icon }}" style="margin:10px;font-size: 5rem; color: var(--primary);"></i>
                                </div>
                                <h5 class="mb-3">{{ $service->translate(app()->getLocale())->name }}</h5>
                                <p class="mb-4">{{ $service->translate(app()->getLocale())->description }}</p>
                                <a class="btn btn-square rounded-circle" href=""><i class="bi bi-chevron-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>




@endsection
