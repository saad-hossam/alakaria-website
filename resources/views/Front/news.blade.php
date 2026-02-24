@extends("layouts.front.master")
@section('content')

 <!-- Page Header Start -->
 <!-- Page Header Start -->
<div class="container-fluid  bg-primary py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 10px;">
    <div class="container text-center py-5 text-white">
        <h1 class="display-4 fw-bold">{{ trans('header.news') }}</h1>
        <nav aria-label="breadcrumb animated fadeInDown mt-3">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" class="text-light mx-2 ">{{trans('home.house')}}</a>
                </li> /
                <li class=" active text-white-50 mx-2">
                    {{ trans('header.news') }}
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Page Header End -->
<div class="container py-5">
    <h2 class="text-center mb-4">{{ __('News') }}</h2>

    <div class="row">
        @foreach ($news as $item)
        <div class="col-md-4 mb-4 text-center">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/news/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">{{ Str::limit(strip_tags($item->description), 100) }}</p>
                    <a style="border-radius: 25px" href="" class="btn btn-primary">{{ __('Read More') }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $news->links() }}
    </div>
</div>

@endsection
