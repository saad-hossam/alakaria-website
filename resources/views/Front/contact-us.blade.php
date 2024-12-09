@extends("layouts.front.master")
@section('content')


    <!-- Page Header Start -->
    <div class="container-fluid page-header bg-primary py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">{{trans('header.contact_us')}}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">{{trans('home.house')}}</a></li>
                    <li class="breadcrumb-item"><a href="#"></a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('header.contact_us')}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


<!-- Contact Start -->
<div class="container-xxl py-5" >
    <div class="container">
        {{-- {{ $products->first()->name }} --}}
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 650px;">
            <p class="section-title bg-white text-center text-primary px-3"> {{trans('contact.contact_us')}}</p>
            <h1 class="mb-5">{{trans('contact.head_of_form')}}  </h1>
        </div>
        <div class="row g-5">
            <iframe src="https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d7264953.539606746!2d33.785918124340554!3d27.239845366158193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e6!4m3!3m2!1d30.0778623!2d31.4098908!4m3!3m2!1d25.546449!2d32.0624828!5e0!3m2!1sar!2seg!4v1730290466358!5m2!1sar!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="row g-5 pt-5 ">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h3 class="mb-4">{{trans('contact.functional_form')}}</h3>
                <form id="contact-form" method="POST" action="{{ route('messages.store') }}">
                    @csrf
                    <div class="row g-3 pt-5">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name" placeholder="{{trans('contact.full_name')}}">
                                <label for="name">{{trans('contact.full_name')}}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" placeholder="{{trans('contact.email')}} ">
                                <label for="email"> {{trans('contact.email')}}</label>
                            </div>
                        </div>
                        {{-- <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="{{trans('contact.subject')}}">
                                <label for="subject">{{trans('contact.subject')}}</label>
                            </div>
                        </div> --}}
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control"  name="message" placeholder="{{trans('contact.write_message_here')}}" id="message" style="height: 250px"></textarea>
                                <label  for="message">{{trans('contact.message')}}</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn  bg-secondary rounded-pill py-3 px-5" type="submit"> {{trans('contact.write_message_here')}}</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 wow fadeInUp " data-wow-delay="0.5s">
                <h3 class="mb-4"> {{trans('contact.call_details')}}</h3>
                <div class="d-flex border-bottom pb-3 mb-3 pt-5">
                    <div class="flex-shrink-0 btn-square  rounded-circle">
                        <i class="fa fa-map-marker-alt text-body"></i>
                    </div>
                    <div class="me-3"> <!-- Change from ms-3 to me-3 for RTL -->
                        <h6>{{trans('contact.drop_by_our_office_at')}}</h6>
                        <span>‏قليوب‏، ‏محافظة القليوبية‏، ‏مصر‏ · ‏القاهرة‏، ‏محافظة القاهرة‏، ‏مصر‏ · ‏الجيزة‏، ‏محافظة الجيزة‏، ‏مصر‏</span>
                    </div>
                </div>
                <div class="d-flex border-bottom pb-3 mb-3">
                    <div class="flex-shrink-0 btn-square  rounded-circle">
                        <i class="fa fa-phone-alt text-body"></i>
                    </div>
                    <div class="me-3"> <!-- Change from ms-3 to me-3 for RTL -->
                        <h6> {{trans('contact.call_us')}}</h6>
                        <span>68722253 010</span>
                    </div>
                </div>
                <div class="d-flex border-bottom-0 pb-3 mb-3">
                    <div class="flex-shrink-0 btn-square  rounded-circle">
                        <i class="fa fa-envelope text-body"></i>
                    </div>
                    <div class="me-3"> <!-- Change from ms-3 to me-3 for RTL -->
                        <h6>{{trans('contact.email_address')}}</h6>
                        <span>info@example.com</span>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- Contact End -->


@endsection
