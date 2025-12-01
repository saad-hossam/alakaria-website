@extends("layouts.front.master")
@section('content')

<style>
    /* HERO */
    .service-hero {
    background:  #b48e65 ;
        padding: 110px 0 90px;
        color: #fff;
        text-align: center;
    }
    .service-hero h1 {
        font-size: 3rem;
        font-weight: 800;
    }
    .service-hero p {
        font-size: 1.25rem;
        opacity: .90;
        margin-top: 10px;
    }

    /* MAIN CARD */
    .service-card {
        background: #fff;
        border-radius: 22px;
        padding: 40px;
        box-shadow: 0 10px 35px rgba(0,0,0,0.12);
        animation: fadeUp .8s ease;
        text-align: center;
    }

    /* SERVICE IMAGE */
    .service-img {
        width: 60%;
        max-width: 550px;
        max-height: 350px;
        object-fit: contain;
        border-radius: 18px;
        margin: 0 auto 25px;
        display: block;
        box-shadow: 0 6px 20px rgba(0,0,0,0.18);
    }

    /* SERVICE NAME */
    .service-card h2 {
        font-size: 2.2rem;
        font-weight: 800;
        color: #b48e65;
        text-align: center;
        margin-bottom: 25px;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        position: relative;
    }
    /* Optional underline */
    .service-card h2::after {
        content: '';
        display: block;
        width: 60px;
        height: 4px;
        background-color: #b48e65;
        margin: 8px auto 0;
        border-radius: 2px;
    }

    /* BOXES */
    .service-section-box {
        background: #f8fbff;
        border-left: 6px solid #b48e65;
        border-radius: 18px;
        padding: 25px 30px;
        margin-top: 40px;
        text-align: left;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.06);
        animation: fadeUp 1s ease;
    }

    .service-section-title {
        font-size: 1.6rem;
        font-weight: 700;
        color: #b48e65;
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 15px;
    }
    .service-section-title i {
        font-size: 1.4rem;
    }

    .service-section-text {
        font-size: 1.15rem;
        line-height: 1.9;
        color: #333;
    }

    /* CTA BUTTONS */
    .cta-buttons a {
        margin: 8px;
        padding: 12px 32px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 18px;
    }

    /* Animation */
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(40px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* Mobile */
    @media (max-width: 768px) {
        .service-img {
            width: 90%;
            max-height: 260px;
        }
        .service-section-title {
            font-size: 1.35rem;
        }
        .service-card h2 {
            font-size: 1.8rem;
        }
    }
</style>

<!-- HERO SECTION -->
<div class="service-hero">
    <h1>{{ trans('header.our_services') }}</h1>/
    <p>{{ $service->translate(app()->getLocale())->name }}</p>
</div>

<!-- MAIN CARD -->
<div class="container my-5">
    <div class="service-card">

        <!-- IMAGE -->
        <img src="{{ asset('images/services/' . $service->image) }}"
             class="service-img"
             alt="{{ $service->translate(app()->getLocale())->name }}">

        <!-- SERVICE NAME WITH ICON -->
        <h2>
            <i class="fa fa-cogs"></i>
            {{ $service->translate(app()->getLocale())->name }}
        </h2>

        <!-- DESCRIPTION BOX -->
        <div class="service-section-box">
            <h3 class="service-section-title">
                <i class="fa fa-info-circle"></i>
                {{ trans('services.Service_Description') }}
            </h3>
            <p class="service-section-text">
                {!! $service->translate(app()->getLocale())->description !!}
            </p>
        </div>

        <!-- DETAILS BOX -->
        <div class="service-section-box">
            <h3 class="service-section-title">
                <i class="fa fa-list-alt"></i>
                {{ trans('services.Service_Details') }}
            </h3>
            <p class="service-section-text">
                {!! $service->translate(app()->getLocale())->body !!}
            </p>
        </div>

        <!-- CTA BUTTONS -->
        <div class="text-center cta-buttons mt-4">
            <a href="{{ route('contact-us') }}" class="btn btn-primary">
                <i class="fa fa-phone me-2"></i> {{ trans('services.Get_in_Touch') }}
            </a>

            <a href="{{ route('services') }}" class="btn btn-outline-primary">
                <i class="fa fa-arrow-left me-2"></i> {{ trans('services.Go_To_Services') }}
            </a>
        </div>

    </div>
</div>

@endsection
