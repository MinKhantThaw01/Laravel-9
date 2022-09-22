<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Kris - Personal Portfolio</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('fronted/assets/img/favicon.png') }}">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('fronted/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('fronted/assets/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('fronted/assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('fronted/assets/css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('fronted/assets/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('fronted/assets/css/default.css') }}">
        <link rel="stylesheet" href="{{ asset('fronted/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('fronted/assets/css/responsive.css') }}">
    </head>
    <body>

        <!-- preloader-start -->
        <div id="preloader">
            <div class="rasalina-spin-box"></div>
        </div>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
       @include('fronted.body.header')
        <!-- header-area-end -->

        <!-- main-area -->
        <main>

          @yield('main')

        </main>
        <!-- main-area-end -->



        <!-- Footer-area -->
       @include('fronted.body.footer')
        <!-- Footer-area-end -->




		<!-- JS here -->
        <script src="{{ asset('fronted/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('fronted/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('fronted/assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('fronted/assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('fronted/assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('fronted/assets/js/element-in-view.js') }}"></script>
        <script src="{{ asset('fronted/assets/js/slick.min.js') }}"></script>
        <script src="{{ asset('fronted/assets/js/ajax-form.js') }}"></script>
        <script src="{{ asset('fronted/assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('fronted/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('fronted/assets/js/main.js') }}"></script>
    </body>
</html>
