@extends("layouts.front.master")
@section('content')

 <!-- Page Header Start -->
 <div class="container-fluid page-header bg-primary py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style=" margin-top: 10px;">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">{{trans('header.news')}}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{trans('home.house')}}</a></li>
                               <li class="breadcrumb-item"><a href="#"></a></li>

                    <li class=" " aria-current="page">{{trans('header.news')}}</li>
            </ol>
        </nav>
    </div>
</div>
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
