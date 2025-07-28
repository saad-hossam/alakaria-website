@extends("layouts.front.master")
@section('content')
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
                    <a href="" class="btn btn-primary">{{ __('Read More') }}</a>
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
