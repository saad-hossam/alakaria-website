@extends("layouts.front.master")
@section('content')

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
                    <a class="btn bg-secondary rounded-pill py-3 px-5" href="#">{{trans('about.read_more_info')}}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


<!-- owl carousel start -->
<div class=" container mt-3">
    <div class="col-lg-12 wow fadeIn text-center" data-wow-delay="0.5s">
        <p class="section-title bg-white text-center text-primary ps-3"> {{trans('about.quality_marks')}}</p>
    </div>
    <div class="row ">
        <div class="owl-carousel ">
            <div class="item pe-3 ">
                <img src="{{asset('images/logo/217869725_118531940487221_4785815560090976289_n1.png')}}" alt="{{trans('pagination.alt_title')}}" />
            </div>
            <div class="item pe-3 " >
                <img src="{{asset('assets/front/img/w2.jpg')}}"  alt="{{trans('pagination.alt_title')}}" />
            </div>
            <div class="item pe-3 ">
                <img src="{{asset('assets/front/img/r1.jpg')}}"  alt="{{trans('pagination.alt_title')}}" />
            </div>
            <div class="item pe-3 ">
                <img src="{{asset('images/logo/217869725_118531940487221_4785815560090976289_n1.png')}}" alt="{{trans('pagination.alt_title')}}" />
            </div>
            <div class="item pe-3 " >
                <img src="{{asset('assets/front/img/w2.jpg')}}"  alt="{{trans('pagination.alt_title')}}" />
            </div>
            <div class="item pe-3 ">
                <img src="{{asset('assets/front/img/r1.jpg')}}"  alt="{{trans('pagination.alt_title')}}" />
            </div>

        </div>
    </div>
</div>
<!-- owl carousel end -->


<!-- Team Start -->
<div class="container-xxl mt-3 py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
            <p class="section-title bg-white text-center text-primary px-3">
                {{ trans('about.our_team')}}
            </p>
            <h1 class="mb-5"> {{trans('about.our_team_content')}} </h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded p-4">
                    <h5>آدم كرو</h5>
                    <p class="text-primary">المؤسس</p>
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-square text-dark btn-outline-primary rounded-circle mx-1" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square text-dark btn-outline-primary rounded-circle mx-1" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square text-dark btn-outline-primary rounded-circle mx-1" href=""><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item rounded p-4">
                    <h5>دوريس جوردان</h5>
                    <p class="text-primary">بيطرية</p>
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-square text-dark btn-outline-primary rounded-circle mx-1" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square text-dark btn-outline-primary rounded-circle mx-1" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square text-dark btn-outline-primary rounded-circle mx-1" href=""><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item rounded p-4">
                    <h5>جاك داوسون</h5>
                    <p class="text-primary">مزارع</p>
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-square text-dark btn-outline-primary rounded-circle mx-1" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square text-dark btn-outline-primary rounded-circle mx-1" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square text-dark btn-outline-primary rounded-circle mx-1" href=""><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

@endsection
