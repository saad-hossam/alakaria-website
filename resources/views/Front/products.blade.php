@extends("layouts.front.master")

@section('content')


    <!-- Page Header Start -->
    <div class="container-fluid page-header bg-primary py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">{{trans('header.products')}}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">{{trans('home.house')}}</a></li>
                    <li class="breadcrumb-item"><a href="#"></a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('header.products')}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

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
<div class="container-xxl py-5" >
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
                        <div class="product-overlay">
                            <h1 style="color: #000">{{ $product->translate(app()->getLocale())->name }}</h1>
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="btn bg-secondary text-center rounded-pill py-3 px-5 mt-2 mb-2 " href="{{ route('details', $product->id) }}">{{ trans('about.read_more_info') }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Product End -->

@endsection
