<!-- Footer Start -->
<div class="container-fluid bg-secondary footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s" >
    <div class="container py-5">
        <div class="row ">
            <div class="col-lg-4 col-md-6">
                <h5 class="text-white mb-4">{{ __('footer.office_title') }}</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{ __('footer.address') }}</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ __('footer.phone') }}</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ __('footer.email') }}</p>
                <div class="d-flex pt-3">
                    <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-primary rounded-circle me-2" href="https://m.me/your-messenger-id" target="_blank"><i class="fab fa-facebook-messenger"></i></a>
                    <a class="btn btn-square btn-primary rounded-circle me-2" href="https://wa.me/your-phone-number" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>


                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <h5 class="text-white mb-4">{{ __('footer.quick_links') }}</h5>
                <a class="btn btn-link" href="{{route('home')}}">{{ trans('home.home') }}</a>
                <a class="btn btn-link" href="{{route('about')}}">{{ __('footer.about_us') }}</a>
                <a class="btn btn-link" href="{{route('contact-us')}}">{{ __('footer.contact_us') }}</a>
                <a class="btn btn-link" href="{{route('services')}}">{{ __('footer.services') }}</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">{{ __('footer.working_hours') }}</h5>
                <p class="mb-1">{{ __('footer.saturday_thursday') }}</p>
                <h6 class="text-light">{{ __('footer.working_time') }}</h6>
                <p class="mb-1">{{ __('footer.friday') }}</p>
                <h6 class="text-light">{{ __('footer.closed') }}</h6>
            </div>
            <div class="col-lg-3 col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d7264953.539606746!2d33.785918124340554!3d27.239845366158193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e6!4m3!3m2!1d30.0778623!2d31.4098908!4m3!3m2!1d25.546449!2d32.0624828!5e0!3m2!1sar!2seg!4v1730290466358!5m2!1sar!2seg" width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
<!-- Copyright Start -->
<div class="container-fluid bg-secondary text-white copyright py-2" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                &copy; <a class="fw-semi-bold" href="#">كولمار</a>, {{ __('footer.all_rights_reserved') }}
            </div>
            <div class="col-md-6 text-center text-md-end">
                {{ __('footer.design_by') }}
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->


<!-- Back to Top -->
<a href="#"  class="btn btn-lg bg-secondary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>
