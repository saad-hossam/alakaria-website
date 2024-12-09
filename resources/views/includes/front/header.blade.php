@section('css')
<style>


</style>

@endsection


{{-- <div class="container-fluid bg-dark px-0">
    <div class="row g-0 d-none d-lg-flex">
        <div class="col-lg-6 ps-5 text-start">
            <div class="h-100 d-inline-flex align-items-center text-light">
                <span>Follow Us:</span>
                <a class="btn btn-link text-light" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-link text-light" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn btn-link text-light" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-link text-light" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="col-lg-6 text-end">
            <div class="h-100 bg-secondary d-inline-flex align-items-center text-dark py-2 px-4">
                <span class="me-2 fw-semi-bold"><i class="fa fa-phone-alt me-2"></i>Call Us:</span>
                <span>+012 345 6789</span>
            </div>
        </div>
    </div>
</div> --}}
<!-- Topbar End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 " >

    <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center">
        <h1 class="m-0"><img src="{{asset('images/logo/217869725_118531940487221_4785815560090976289_n1.png')}}" alt="{{trans('pagination.alt_title')}}" width="120px" height="70px"></h1>
    </a>
    <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">

            <a href="{{route('home')}}" class="nav-item nav-link active">{{trans('header.home')}}</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{trans('header.about_us')}}</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="{{route('about')}}" class="dropdown-item">{{trans('header.about_us')}} </a>

                    <a href="{{route('vision')}}" class="dropdown-item">{{trans('header.our_vision')}}</a>
                    <a href="{{route('message')}}" class="dropdown-item">{{trans('header.our_message')}}</a>
                    <a href="{{route('goal')}}" class="dropdown-item">{{trans('header.our_goal')}}</a>
                    <!-- <a href="404.html" class="dropdown-item">صفحة 404</a> -->
                </div>
            </div>

            {{-- <div class="nav-item dropdown"> --}}
                {{-- <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ trans('header.products') }}</a> --}}
                {{-- <div class="dropdown-menu bg-light m-0"> --}}
                    {{-- @foreach($departments as $department) --}}
                        <a class="nav-item nav-link" href="{{ route('products') }}">
                            {{ trans('header.products') }}
                        </a>
                    {{-- @endforeach --}}
                {{-- </div> --}}
            {{-- </div> --}}


            <a href="{{route('services')}}" class="nav-item nav-link">{{trans('header.our_services')}}</a>
            {{-- <a href="product.html" class="nav-item nav-link">{{trans('header.products')}}</a> --}}


            <a href="{{route('gallary')}}" class="nav-item nav-link">{{trans('header.gallary')}}</a>

            <a href="{{route('contact-us')}}" class="nav-item nav-link">{{trans('header.contact_us')}}</a>
        </div>
        <div class="border-start ps-4 d-none d-lg-block">
            @if (app()->getLocale() == 'en')
                <a rel="alternate" hreflang="ar"
                   href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                    <button class="btn btn-danger">
                        <i class="fa fa-globe" style="margin-right: 5px;"></i> عربى
                    </button>
                </a>
            @else
                <a rel="alternate" hreflang="en"
                   href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                    <button class="btn btn-danger">
                        <i class="fa fa-globe" style="margin-right: 5px;"></i> English
                    </button>
                </a>
            @endif
        </div>

    </div>
</nav>
<!-- Navbar End -->

@section('scripts')

<script>
document.querySelectorAll('.dropdown-submenu .dropdown-toggle').forEach(function (element) {
    element.addEventListener('click', function (e) {
        let nextEl = element.nextElementSibling;
        if (nextEl && nextEl.classList.contains('dropdown-menu')) {
            nextEl.classList.toggle('show');
            e.preventDefault();
        }
    });
});
</script>
@endsection
