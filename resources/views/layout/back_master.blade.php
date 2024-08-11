<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from code-theme.com/html/findhouses/add-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jul 2024 06:22:16 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <title>Find Houses - HTML5 Template</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/jquery-ui.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css')}}">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/search.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/dashbord-mobile-menu.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/lightcase.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/owl-carousel.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/menu.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/styles.css')}}">
    <link rel="stylesheet" id="color" href="{{ URL::asset('assets/css/default.css')}}">
    @yield('style')
</head>

<body class="inner-pages maxw1600 m0a dashboard-bd">
    <!-- Wrapper -->
    <div id="wrapper" class="int_main_wraapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <div class="dash-content-wrap">
            
        </div>
        <div class="clearfix"></div>
        <!-- Header Container / End -->

        @include('comman.notify')
        @include('comman.back_header')
        @yield('content');
        @include('comman.back_footer')



        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->

        <!-- ARCHIVES JS -->
        <script src="{{url('assets/js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{url('assets/js/popper.min.js')}}"></script>
        <script src="{{url('assets/js/jquery-ui.js')}}"></script>
        <script src="{{url('assets/js/tether.min.js')}}"></script>
        <script src="{{url('assets/js/moment.js')}}"></script>
        <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{url('assets/js/mmenu.min.js')}}"></script>
        <script src="{{url('assets/js/mmenu.js')}}"></script>
        <script src="{{url('assets/js/swiper.min.js')}}"></script>
        <script src="{{url('assets/js/swiper.js')}}"></script>
        <script src="{{url('assets/js/slick.min.js')}}"></script>
        <script src="{{url('assets/js/slick2.js')}}"></script>
        <script src="{{url('assets/js/fitvids.js')}}"></script>
        <script src="{{url('assets/js/jquery.waypoints.min.js')}}"></script>
        <script src="{{url('assets/js/jquery.counterup.min.js')}}"></script>
        <script src="{{url('assets/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{url('assets/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{url('assets/js/smooth-scroll.min.js')}}"></script>
        <script src="{{url('assets/js/lightcase.js')}}"></script>
        <script src="{{url('assets/js/search.js')}}"></script>
        <script src="{{url('assets/js/owl.carousel.js')}}"></script>
        <script src="{{url('assets/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{url('assets/js/ajaxchimp.min.js')}}"></script>
        <script src="{{url('assets/js/newsletter.js')}}"></script>
        <script src="{{url('assets/js/jquery.form.js')}}"></script>
        <script src="{{url('assets/js/jquery.validate.min.js')}}"></script>
        <script src="{{url('assets/js/searched.js')}}"></script>
        <script src="{{url('assets/js/dashbord-mobile-menu.js')}}"></script>
        <script src="{{url('assets/js/forms-2.js')}}"></script>
        <script src="{{url('assets/js/color-switcher.js')}}"></script>
        <script src="{{url('assets/js/dropzone.js')}}"></script>

        <!-- MAIN JS -->
        <script src="{{url('assets/js/script.js')}}"></script>
        <script>
            $(".dropzone").dropzone({
                dictDefaultMessage: "<i class='fa fa-cloud-upload'></i> Click here or drop files to upload",
            });

        </script>
        <script>
            $(".header-user-name").on("click", function() {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });

        </script>

    </div>
    <!-- Wrapper / End -->
    @yield('script')
</body>


<!-- Mirrored from code-theme.com/html/findhouses/add-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jul 2024 06:22:16 GMT -->
</html>
