<!DOCTYPE html>
<html lang="en" class="no-js">
<head>

    <meta charset="utf-8">
    <title>Colmar</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{URL::asset('images/logo/217869725_118531940487221_4785815560090976289_n1.png')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ URL::asset('assets/front/lib/animate/animate.min.css') }} " rel="stylesheet">
    <link href="{{ URL::asset('assets/front/lib/owlcarousel/assets/owl.carousel.min.css') }} " rel="stylesheet">
    <link href="{{ URL::asset('assets/front/lib/lightbox/css/lightbox.min.css') }} " rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href=" {{ URL::asset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    @yield('meta')


    @if (app()->getLocale() == 'ar')
    <link id="theme-stylesheet" rel="stylesheet" href="{{  URL::asset('assets/front/css/style_rtl.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet"/>

    {{-- <link rel="stylesheet" href="{{ URL::asset('assets/front/css/main.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{ URL::asset('assets/front/css/custom.css')}}"> --}}


    @else
    <link id="theme-stylesheet" rel="stylesheet" href=" {{ URL::asset('assets/front/css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet"/>

    {{-- <link rel="stylesheet" href="{{ URL::asset('assets/front/css/main.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{ URL::asset('assets/front/css/custom.css')}}"> --}}


    @endif


    <!-- Structured Data  -->
    <script type="application/ld+json">
        {
        "@context": "http://schema.org",
        "@type": "WebSite",
        "name": "Replace_with_your_site_title",
        "url": "Replace_with_your_site_URL"
        }
    </script>


</head>

<body>
    <a href="https://api.whatsapp.com/send?phone=2001015791799" target="_blank"><svg viewBox="0 0 32 32" class="whatsapp-ico"><path d=" M19.11 17.205c-.372 0-1.088 1.39-1.518 1.39a.63.63 0 0 1-.315-.1c-.802-.402-1.504-.817-2.163-1.447-.545-.516-1.146-1.29-1.46-1.963a.426.426 0 0 1-.073-.215c0-.33.99-.945.99-1.49 0-.143-.73-2.09-.832-2.335-.143-.372-.214-.487-.6-.487-.187 0-.36-.043-.53-.043-.302 0-.53.115-.746.315-.688.645-1.032 1.318-1.06 2.264v.114c-.015.99.472 1.977 1.017 2.78 1.23 1.82 2.506 3.41 4.554 4.34.616.287 2.035.888 2.722.888.817 0 2.15-.515 2.478-1.318.13-.33.244-.73.244-1.088 0-.058 0-.144-.03-.215-.1-.172-2.434-1.39-2.678-1.39zm-2.908 7.593c-1.747 0-3.48-.53-4.942-1.49L7.793 24.41l1.132-3.337a8.955 8.955 0 0 1-1.72-5.272c0-4.955 4.04-8.995 8.997-8.995S25.2 10.845 25.2 15.8c0 4.958-4.04 8.998-8.998 8.998zm0-19.798c-5.96 0-10.8 4.842-10.8 10.8 0 1.964.53 3.898 1.546 5.574L5 27.176l5.974-1.92a10.807 10.807 0 0 0 16.03-9.455c0-5.958-4.842-10.8-10.802-10.8z" fill-rule="evenodd"></path></svg></a>



    @include('includes.front.header')
    @yield('content')
    @include('includes.front.footer')

    @yield('scripts')


</body>



<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{  URL::asset('assets/front/lib/wow/wow.min.js')}}"></script>
<script src="{{  URL::asset('assets/front/lib/easing/easing.min.js')}}"></script>
<script src="{{  URL::asset('assets/front/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{  URL::asset('assets/front/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{  URL::asset('assets/front/lib/counterup/counterup.min.js')}}"></script>
<script src="{{  URL::asset('assets/front/lib/parallax/parallax.min.js')}}"></script>
<script src="{{  URL::asset('assets/front/lib/lightbox/js/lightbox.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>



<script>

$(document).ready(function() {

 $(".owl-carousel").owlCarousel({

     autoPlay: 3000,
     items : 5,
     itemsDesktop : [400,3],
     itemsDesktopSmall : [979,3],
     center: true,
     nav:true,
     loop:true,
     responsive: {
       600: {
         items: 5
       }
     }

 });

});
</script>
<script>
    // JavaScript (or jQuery) to toggle sticky class on scroll
document.addEventListener('scroll', function () {
    const navbar = document.querySelector('.navbar.sticky-top');
    if (window.scrollY > 100) { // Adjust 100 to the scroll offset you prefer
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

</script>

<script>document.addEventListener("DOMContentLoaded", () => {
    const toggleButton = document.getElementById("toggle-rtl");
    const themeStylesheet = document.getElementById("theme-stylesheet");

    let isRtl = false;

    toggleButton.addEventListener("click", () => {
        isRtl = !isRtl;

        if (isRtl) {
            themeStylesheet.setAttribute("href", "css/style (copy).css");
            toggleButton.textContent = "Switch to LTR"; // Update button text
        } else {
            themeStylesheet.setAttribute("href", "css/style.css");
            toggleButton.textContent = "Switch to RTL"; // Update button text
        }
    });
});
</script>

<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<script>
    var typed = new Typed(".auto-type", {
        strings: ["{{ trans('header.first_text') }}", "{{ trans('header.second_text') }}"],
        typeSpeed: 150,
        backSpeed: 150,
        loop: true,
    });
</script>


<!-- Template Javascript -->
</html>
