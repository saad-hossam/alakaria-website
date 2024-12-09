@extends("layouts.front.master")


@section('content')




<!-- Header Start -->
<div class="container-fluid bg-white p-0 mb-5" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <div class="row g-0 flex-column-reverse flex-lg-row">
        <div class="col-lg-5 p-0 wow fadeIn" data-wow-delay="0.1s">
            <div class="header-bg d-flex flex-column justify-content-center p-5" style="height: 92%">
                <h3 style="font-size: 50px; text-align: center; font-weight: 600;">
                    <span style="color: #000" class="auto-type"></span>
                </h3>
                <div class="d-flex align-items-center pt-4 animated slideInDown">
                    <a href="{{route('about')}}" class="btn bg-secondary py-sm-3 px-3 px-sm-5 me-5">
                        {{ trans('header.read_more') }}
                    </a>
                    <button type="button" class="btn-play bg-secondary mx-4" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                        <span></span>
                    </button>
                    <h6 class="text-dark m-0 me-4 d-none d-sm-block">{{ trans('header.watch_video') }}</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-7 wow fadeIn" data-wow-delay="0.5s">
            <!-- Carousel Start -->
            <div class="container-fluid px-0 mb-5">
                <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($sliders as $index => $slide )
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img class="" style="width: 100%" src="{{ URL::asset('images/gallary/' . $slide->image)}}" alt="{{trans('pagination.alt_title')}}">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8 text-center">
                                            {{-- <a href="" class="btn bg-secondary rounded-pill py-3 px-5 animated slideInRight"> --}}
                                                {{-- {{ trans('slider.slider_button') }} --}}
                                            {{-- </a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        {{-- <div class="carousel-item">
                            <img class="" src="{{ URL::asset('assets/front/img/WhatsApp Image 2024-10-25 at 16.00.32 (2).jpeg') }}" alt="Image">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8 text-center">
                                            <a href="" class="btn bg-secondary rounded-pill py-3 px-5 animated slideInRight">
                                                {{ trans('slider.slider_button') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- Carousel End -->
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Video Modal Start -->
<div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" dir="rtl">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">{{ trans('header.youtube_video') }}</h3>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
            </div>
            <div class="modal-body">
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Modal End -->


    <!-- About Start -->
    <div class="container-xxl py-5" >
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-lg-6">
                    <div class="row g-2">
                        <div class="col-6 wow   rounded text-center pt-5 fadeIn" data-wow-delay="0.7s">
                            <h1 class="display-1 mb-0 text-dark">5</h1>
                            <small class="fs-5 fw-bold">{{trans('about.year_of_experience')}}</small>
                        </div>
                        <div class="col-6 wow fadeIn" data-wow-delay="0.1s">
                            <img class="img-fluid rounded" src="{{asset('assets/front/img/WhatsApp Image 2024-10-25 at 16.00.32 (2).jpeg')}}" alt="{{trans('pagination.alt_title')}}">
                        </div>
                        <div class="col-6 wow fadeIn" data-wow-delay="0.3s">
                            <img class="img-fluid rounded" src="{{asset('assets/front/img/WhatsApp Image 2024-10-25 at 16.00.34.jpeg')}}" alt="{{trans('pagination.alt_title')}}">
                        </div>
                        <div class="col-6 wow fadeIn" data-wow-delay="0.5s">
                            <img class="img-fluid rounded" src="{{asset('assets/front/img/WhatsApp Image 2024-10-25 at 16.00.33 (1).jpeg')}}" alt="{{trans('pagination.alt_title')}}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="section-title me-5 bg-white  text-primary "> {{trans('about.about_us')}}</p>
                    <h1 class="mb-4 text-dark">{{trans('about.about_factory')}}</h1>
                    <p class="mb-4">
                        {{trans('about.about_factory_content')}}
                    </p>
                    <div class="row g-5 pt-2 mb-5">
                        <div class="col-sm-6">
                            <img class="img-fluid mb-4" src="{{asset('assets/front/img/service.png')}}" alt="{{trans('pagination.alt_title')}}">
                            <h5 class="mb-3"> {{trans('about.about_service_icon')}}</h5>
                            <span>{{trans('about.about_service_content')}}</span>
                        </div>
                        <div class="col-sm-6">
                            <img class="img-fluid mb-4" src="{{asset('assets/front/img/product.png')}}" alt="{{trans('pagination.alt_title')}}">
                            <h5 class="mb-3"> {{trans('about.about_product_icon')}}</h5>
                            <span>{{trans('about.about_product_content')}}</span>
                        </div>
                    </div>
                    <a class="btn bg-secondary rounded-pill py-3 px-5" href="{{route('about')}}">{{trans('about.read_more_info')}}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


	<!-- Start Gallery -->
	{{-- <div class="gallery-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Gallery</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<div class="tz-gallery">
				<div class="row">
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="{{  URL::asset('assets/saad/images/gallery-img-01.jpg')}}">
							<img class="img-fluid" src="{{  URL::asset('assets/saad/images/gallery-img-01.jpg')}}" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="{{  URL::asset('assets/saad/images/gallery-img-02.jpg')}}">
							<img class="img-fluid" src="{{  URL::asset('assets/saad/images/gallery-img-02.jpg')}}" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="{{  URL::asset('assets/saad/images/gallery-img-03.jpg')}}">
							<img class="img-fluid" src="{{  URL::asset('assets/saad/images/gallery-img-03.jpg')}}" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="{{  URL::asset('assets/saad/images/gallery-img-04.jpg')}}">
							<img class="img-fluid" src="{{  URL::asset('assets/saad/images/gallery-img-04.jpg')}}" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="{{  URL::asset('assets/saad/images/gallery-img-05.jpg')}}">
							<img class="img-fluid" src="{{  URL::asset('assets/saad/images/gallery-img-05.jpg')}}" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="{{  URL::asset('assets/saad/images/gallery-img-06.jpg')}}">
							<img class="img-fluid" src="{{  URL::asset('assets/saad/images/gallery-img-06.jpg')}}" alt="Gallery Images">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div> --}}
	<!-- End Gallery -->

    <!-- Features Start -->
    <div class="container-xxl py-5" >
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title bg-white text-end text-primary ps-3">{{ __('features.features_title') }}</p>
                    <h1 class="mb-4">{{ __('features.features_subtitle') }}</h1>
                    <p class="mb-4">{!! __('features.features_description') !!}</p>
                    <p><i class="fa fa-check text-primary ms-3"></i> <strong class="text-dark">{{ __('features.feature_1_title') }}:</strong> {{ __('features.feature_1_description') }}</p>
                    <p><i class="fa fa-check text-primary ms-3"></i> <strong class="text-dark">{{ __('features.feature_2_title') }}:</strong> {{ __('features.feature_2_description') }}</p>
                    <p><i class="fa fa-check text-primary ms-3"></i> <strong class="text-dark">{{ __('features.feature_3_title') }}:</strong> {{ __('features.feature_3_description') }}</p>
                    <a class="btn bg-secondary rounded-pill py-3 px-5 mt-3" href="#">{{ __('features.discover_more') }}</a>
                </div>
                <div class="col-lg-6">
                    <div class="rounded overflow-hidden">
                        <div class="row g-0">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="text-center bg-secondary py-5 px-4">
                                    <img class="img-fluid mb-4" src="img/experience.png" alt="{{trans('pagination.alt_title')}}">
                                    <h1 class="display-6 text-white" data-toggle="counter-up">5</h1>
                                    <span class="fs-5 fw-semi-bold text-secondary">{{ __('features.years_of_experience') }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="text-center  py-5 px-4">
                                    <img class="img-fluid mb-4" src="img/award.png" alt="{{trans('pagination.alt_title')}}">
                                    <h1 class="display-6" data-toggle="counter-up">183</h1>
                                    <span class="fs-5 fw-semi-bold text-primary">{{ __('features.awards') }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="text-center  py-5 px-4">
                                    <img class="img-fluid mb-4" src="img/animal.png" alt="{{trans('pagination.alt_title')}}">
                                    <h1 class="display-6" data-toggle="counter-up">2619</h1>
                                    <span class="fs-5 fw-semi-bold text-primary">{{ __('features.total_animals') }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                                <div class="text-center bg-secondary py-5 px-4">
                                    <img class="img-fluid mb-4" src="img/client.png" alt="{{trans('pagination.alt_title')}}">
                                    <h1 class="display-6 text-white" data-toggle="counter-up">1940</h1>
                                    <span class="fs-5 fw-semi-bold text-secondary">{{ __('features.happy_clients') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="section-title bg-white text-center text-primary ">{{ trans('services.services_title') }}</p>
            <h1 class="mb-5">{{ trans('services.services_subtitle') }}</h1>
        </div>
        <div class="row gy-5 gx-4">
            @foreach ($services as $service)
                <div class="col-lg-4 col-md-6 pt-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item d-flex h-100">
                        <div class="service-img">
                            <img class="img-fluid" src="{{ asset('assets/front/img/service-1.jpg') }}" alt="{{trans('pagination.alt_title')}}">
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

        <!-- Pagination Links -->
        <div class="row mt-4">
            <div class="col-12 text-center">
                {{ $services->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

    <!-- Gallery Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">{{trans('gallary.our_gallary')}}</p>
                <h1 class="mb-5">{{trans('gallary.our_gallary_content')}}</h1>
            </div>
            <div class="row g-0">
                @foreach ( $gallaries as $gallary)

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-0">
                        <div class="col-12">
                            <a class="d-block" href="{{ URL::asset('images/gallary/' . $gallary->image)}}" data-lightbox="gallery">
                                <img class="img-fluid" src="{{ URL::asset('images/gallary/' . $gallary->image) }}" alt="{{trans('pagination.alt_title')}}">
                            </a>
                        </div>

                    </div>
                </div>
                @endforeach

                {{-- <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="row g-0">
                        <div class="col-12">
                            <a class="d-block" href="{{ URL::asset('assets/front/img/gallery-2.jpg')}}" data-lightbox="gallery">
                                <img class="img-fluid" src="{{ URL::asset('assets/front/img/gallery-2.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-12">
                            <a class="d-block" href="{{ URL::asset('assets/front/img/gallery-6.jpg')}}" data-lightbox="gallery">
                                <img class="img-fluid" src="{{ URL::asset('assets/front/img/gallery-6.jpg')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row g-0">
                        <div class="col-12">
                            <a class="d-block" href="{{ URL::asset('assets/front/img/gallery-7.jpg')}}" data-lightbox="gallery">
                                <img class="img-fluid" src="{{ URL::asset('assets/front/img/gallery-7.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-12">
                            <a class="d-block" href="{{ URL::asset('assets/front/img/gallery-3.jpg')}}" data-lightbox="gallery">
                                <img class="img-fluid" src="{{ URL::asset('assets/front/img/gallery-3.jpg')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="row g-0">
                        <div class="col-12">
                            <a class="d-block" href="{{ URL::asset('assets/front/img/gallery-4.jpg')}}" data-lightbox="gallery">
                                <img class="img-fluid" src="{{ URL::asset('assets/front/img/gallery-4.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-12">
                            <a class="d-block" href="{{ URL::asset('assets/front/img/gallery-8.jpg')}}" data-lightbox="gallery">
                                <img class="img-fluid" src="{{ URL::asset('assets/front/img/gallery-8.jpg')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Gallery End -->
<!-- Start Menu -->
<div class="menu-box">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <p class="section-title bg-white text-center text-primary px-3">{{trans('product_filter.our_menu')}}</p>
                    <h1 class="mb-5">{{trans( 'product_filter.menu_details')}}</h1>

                </div>
            </div>
        </div>

        <div class="row inner-menu-box text-center mx-5">
            <div class="col-12">
                <div class="nav flex-row nav-pills  text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <!-- Render the "All" tab statically -->
                    <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all" role="tab" aria-controls="v-pills-all" aria-selected="true">{{ trans('home.all') }}</a>

                    <!-- Dynamic department tabs -->
                    @foreach($departments as $department)
                        <a class="nav-link {{ request()->route('departmentId') == $department->id ? 'active' : '' }}"
                           id="v-pills-{{ $department->id }}-tab"
                           data-toggle="pill"
                           href="{{ route('productsByDepartment', $department->id) }}"
                           role="tab"
                           aria-controls="v-pills-{{ $department->id }}"
                           aria-selected="false">{{ $department->translate(app()->getLocale())->name }}</a>
                    @endforeach
                </div>
            </div>

            <div class="col-12 mt-5">
                <div class="tab-content" id="v-pills-tabContent">
                    <!-- All products tab content -->
                    <div class="tab-pane fade show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-6 special-grid drinks">
                                    <div class="gallery-single fix">
                                        <img src="{{ URL::asset('images/products/layout/' . $product->image) }}" class="img-fluid" alt="Image">
                                        <div class="why-text">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">{{trans('product_filter.feature')}}</th>
                                                        <th scope="col">{{trans('product_filter.details')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{trans('product_filter.name')}}</td>
                                                        <td>{{ $product->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{trans('product_filter.description')}}</td>
                                                        <td>{!! $product->description  !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{trans('product_filter.body')}}</td>
                                                        <td>{!!$product->body !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{trans('product_filter.price')}}</td>
                                                        <td>{{ $product->price }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{trans('product_filter.on_sale')}}</td>
                                                        <td>{{ $product->onsale  }}</td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td>{{trans('product_filter.category')}}</td>
                                                        <td>{{ $product->category  }}</td>
                                                    </tr> --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <a href="{{ route('details', $product->id) }}">
                                        <button class="btn bg-secondary text-center rounded-pill py-3 px-5 mt-3 mb-3">{{ trans('home.show_more') }}</button>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Menu -->

<!-- Product Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="section-title bg-white text-center text-primary px-3">{{trans('home.products')}}</p>
            <h1 class="mb-5">{{trans('home.product_detail')}}</h1>
        </div>
        <div class="row gx-4">
            @foreach ($products as $product)
            <div class="col-md-6 col-lg-4 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="product-item">
                    <div class="position-relative">
                        <a class="animal-item" href="{{ route('details', $product->id) }}" data-lightbox="animal">
                            <img class="img-fluid" src="{{ URL::asset('images/products/layout/' . $product->image) }}" alt="{{trans('pagination.alt_title')}}">
                        </a>
                        <div class="product-overlay" >
                            <h1 style="color: #000">{{ $product->translate(app()->getLocale())->name }}</h1>
                        </div>
                    </div>
                    <div class="text-center">
                        {{-- <a href="">View Product</a> --}}

                        <a class="btn bg-secondary text-center rounded-pill py-3 px-5 mb-2 mt-2" href="{{ route('details', ['id' => $product->id]) }}">{{ trans('about.read_more_info') }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
         <!-- Pagination Links -->
         <div class="row mt-4">
            <div class="col-12 text-center">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
<!-- Product End -->



@endsection
