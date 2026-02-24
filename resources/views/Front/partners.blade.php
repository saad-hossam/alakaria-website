@extends("layouts.front.master")
@section('content')

<div class="container-fluid py-5">

  <!-- Page Header Start -->
<div class="container-fluid  bg-primary py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 10px;">
    <div class="container text-center py-5 text-white">
        <h1 class="display-4 fw-bold">{{ trans('header.partners') }}</h1>
        <nav aria-label="breadcrumb animated fadeInDown mt-3">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" class="text-light mx-2">{{trans('home.house')}}</a>
                </li> /
                <li class=" active text-white-50 mx-2">
                    {{ trans('header.partners') }}
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
    <div class="row g-4 justify-content-center">

        @forelse($partners as $partner)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="partner-card text-center p-4">

                    @if($partner->url)
                        <a href="{{ $partner->url }}" target="_blank">
                    @endif

                    <img src="{{ asset('images/partners/' . $partner->logo) }}"
                         alt="{{ $partner->name }}"
                         class="img-fluid partner-logo">

                    @if($partner->url)
                        </a>
                    @endif

                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>No partners available.</p>
            </div>
        @endforelse

    </div>

</div>

@endsection
