<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from code-theme.com/html/findhouses/my-listings.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jul 2024 06:22:16 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
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
</head>

<body class="maxw1600 m0a dashboard-bd">
    <!-- Wrapper -->
    <div id="wrapper" class="int_main_wraapper">
        <!-- START SECTION HEADINGS -->
        <!-- inclode header -->
        @include('comman.notify')



    @include('admin.comman.header') 

       
        <!-- START SECTION USER PROFILE -->
        <section class="user-page section-padding pt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash">
                        <!-- inclod side bar -->
                        @include('admin.comman.sidebar')
                    </div>
                    @yield('content');
                    
                </div>
            </div>
        </section>
        <!-- END SECTION USER PROFILE -->

       <!-- inclod footer -->
       @include('admin.comman.footer')
        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->

        <!-- ARCHIVES JS -->
        <script src="{{ URL::asset('assets/js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/jquery-ui.js')}}"></script>
        <script src="{{ URL::asset('assets/js/tether.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/moment.js')}}"></script>
        <script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/mmenu.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/mmenu.js')}}"></script>
        <script src="{{ URL::asset('assets/js/swiper.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/swiper.js')}}"></script>
        <script src="{{ URL::asset('assets/js/slick.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/slick2.js')}}"></script>
        <script src="{{ URL::asset('assets/js/fitvids.js')}}"></script>
        <script src="{{ URL::asset('assets/js/jquery.waypoints.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/jquery.counterup.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/smooth-scroll.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/lightcase.js')}}"></script>
        <script src="{{ URL::asset('assets/js/search.js')}}"></script>
        <script src="{{ URL::asset('assets/js/owl.carousel.js')}}"></script>
        <script src="{{ URL::asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/ajaxchimp.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/newsletter.js')}}"></script>
        <script src="{{ URL::asset('assets/js/jquery.form.js')}}"></script>
        <script src="{{ URL::asset('assets/js/jquery.validate.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/searched.js')}}"></script>
        <script src="{{ URL::asset('assets/js/dashbord-mobile-menu.js')}}"></script>
        <script src="{{ URL::asset('assets/js/forms-2.js')}}"></script>
        <script src="{{ URL::asset('assets/js/color-switcher.js')}}"></script>

        <!-- MAIN JS -->
        <script src="{{ URL::asset('assets/js/script.js')}}"></script>
        
        <script>
            $(".header-user-name").on("click", function() {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });

        </script>

    </div>
    <!-- Wrapper / End -->
</body>


<!-- Mirrored from code-theme.com/html/findhouses/my-listings.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jul 2024 06:22:16 GMT -->
</html>
