@extends("layouts.front.master")
@section('content')

<style>
    .contact-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 20px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        transition: 0.3s ease;
    }

    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 16px rgba(0,0,0,0.08);
    }

    .contact-icon-box {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        background: #b48e65; /* primary */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .contact-icon-box i {
        font-size: 22px;
        color: white;
    }

    .contact-form .form-control {
        border-radius: 10px !important;
    }

    .contact-form button {
        border-radius: 50px;
        font-size: 18px;
        font-weight: 600;
    }

    /* Map radius */
    .map-frame {
        border-radius: 15px;
        overflow: hidden;
    }

    /* section subtitles */
    .contact-section-subtitle {
        color: #777;
        font-size: 18px;
        margin-top: -10px;
    }
</style>

<!-- Page Header Start -->
<div class="container-fluid  bg-primary py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 10px;">
    <div class="container text-center py-5 text-white">
        <h1 class="display-4 fw-bold">{{ trans('header.contact_us') }}</h1>
        <nav aria-label="breadcrumb animated fadeInDown mt-3">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" class="text-light mx-2">{{trans('home.house')}}</a>
                </li> /
                <li class=" active text-white-50 mx-2">
                    {{ trans('header.contact_us') }}
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Section Title -->
<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
    <h4 class="section-title">
        {{ __('contact.contact_section.section_title') }}
    </h4>
    <h3 class="contact-section-subtitle">
        {{ __('contact.contact_section.section_subtitle') }}
    </h3>
</div>


<!-- Google Map -->
<div class="container map-frame px-0 wow fadeIn mb-5" data-wow-delay="0.1s">
    <iframe class="w-100" style="height: 450px;"
        src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d55238.93196350343!2d31.442309149602174!3d30.0817760250493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x1458178d9fbacd13%3A0x1151dbf2a01c10fb!2z2LHYptin2LPYqSDYp9mE2YfZitim2Kkg2KfZhNi52LHYqNmK2Kkg2YTZhNiq2LXZhtmK2LksINi32LHZitmCINmF2LXYsSwg2LTZitix2KfYqtmI2YYg2KfZhNmF2LfYp9ix2Iwg2YLYs9mFINin2YTZhtiy2YfYqdiMINmF2K3Yp9mB2LjYqSDYp9mE2YLYp9mH2LHYqeKArCA0NDcyMTIw!3m2!1d30.0822455!2d31.4066826!5e0!3m2!1sar!2seg!4v1753432839143!5m2!1sar!2seg"
        frameborder="0" allowfullscreen></iframe>
</div>


<!-- Contact Section -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">

            <!-- Contact Info -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">

                <div class="contact-card mb-4">
                    <div class="contact-icon-box">
                        <i class="fa fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <p class="mb-1 text-muted">{{ __('contact.contact_section.address_label') }}</p>
                        <h5 class="fw-bold">{{ __('footer.address1') }}</h5>
                    </div>
                </div>

                <div class="contact-card mb-4">
                    <div class="contact-icon-box">
                        <i class="fa fa-phone-alt"></i>
                    </div>
                    <div>
                        <p class="mb-1 text-muted">{{ __('contact.contact_section.phone_label') }}</p>
                        <h5 class="fw-bold">{{ __('footer.mobile') }}</h5>
                    </div>
                </div>

                <div class="contact-card mb-4">
                    <div class="contact-icon-box">
                        <i class="fa fa-fax"></i>
                    </div>
                    <div>
                        <p class="mb-1 text-muted">{{ __('contact.contact_section.phone_label') }}</p>
                        <h5 class="fw-bold">{{ __('footer.fax') }}</h5>
                    </div>
                </div>

                <div class="contact-card">
                    <div class="contact-icon-box">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div>
                        <p class="mb-1 text-muted">{{ __('contact.contact_section.email_label') }}</p>
                        <h5 class="fw-bold">{{ __('footer.email_address') }}</h5>
                    </div>
                </div>

            </div>

            <!-- Contact Form -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">

                <h3 class="text-center mb-4">
                    {{ trans('contact.email_label1') }}
                </h3>

                <form action="{{ route('messages.store') }}" method="POST" class="contact-form">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="name" placeholder="Name">
                                <label>{{ __('contact.contact_section.form.name_placeholder') }}</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                                <label>{{ __('contact.contact_section.form.email_placeholder') }}</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" style="height: 130px" name="message" placeholder="Message"></textarea>
                                <label>{{ __('contact.contact_section.form.message_placeholder') }}</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3">
                                {{ __('contact.contact_section.form.submit_button') }}
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
