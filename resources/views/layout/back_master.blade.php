<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from code-theme.com/html/findhouses/single-property-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jul 2024 06:22:02 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <title>Property Details</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('assets/favicon.ico')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/jquery-ui.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:500,600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ URL::asset('assets/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/fontawesome-5-all.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css')}}">
    <!-- LEAFLET MAP -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/leaflet.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/leaflet-gesture-handling.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/leaflet.markercluster.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/leaflet.markercluster.default.css')}}">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/timedropper.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/datedropper.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/lightcase.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/menu.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/styles.css')}}">
    <link rel="stylesheet" id="color" href="{{ URL::asset('assets/css/default.css')}}">
    @yield('style')
</head>

<body class="inner-pages sin-1 homepage-4 hd-white">
    <!-- Wrapper -->
    <div id="wrapper">
        
        @include('comman.back_header')
        @include('comman.notify')
        @yield('content');
        @include('comman.back_footer')



       
        <!-- ARCHIVES JS -->
        <script src="{{URL::asset('assets/js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/jquery-ui.js')}}"></script>
        <script src="{{URL::asset('assets/js/range-slider.js')}}"></script>
        <script src="{{URL::asset('assets/js/tether.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/popper.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/mmenu.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/mmenu.js')}}"></script>
        <script src="{{URL::asset('assets/js/slick.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/slick4.js')}}"></script>
        <script src="{{URL::asset('assets/js/fitvids.js')}}"></script>
        <script src="{{URL::asset('assets/js/smooth-scroll.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/popup.js')}}"></script>
        <script src="{{URL::asset('assets/js/ajaxchimp.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/newsletter.js')}}"></script>
        <script src="{{URL::asset('assets/js/timedropper.js')}}"></script>
        <script src="{{URL::asset('assets/js/datedropper.js')}}"></script>
        <script src="{{URL::asset('assets/js/jqueryadd-count.js')}}"></script>
        <script src="{{URL::asset('assets/js/leaflet.js')}}"></script>
        <script src="{{URL::asset('assets/js/leaflet-gesture-handling.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/leaflet-providers.js')}}"></script>
        <script src="{{URL::asset('assets/js/leaflet.markercluster.js')}}"></script>
        <script src="{{URL::asset('assets/js/map-single.js')}}"></script>
        <script src="{{URL::asset('assets/js/color-switcher.js')}}"></script>
        <script src="{{URL::asset('assets/js/inner.js')}}"></script>

        <!-- Date Dropper Script-->
        <script>
            $('#reservation-date').dateDropper();

        </script>
        <!-- Time Dropper Script-->
        <script>
            this.$('#reservation-time').timeDropper({
                setCurrentTime: false,
                meridians: true,
                primaryColor: "#e8212a",
                borderColor: "#e8212a",
                minutesInterval: '15'
            });

        </script>

        <script>
            $(document).ready(function() {
                $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                    disableOn: 700,
                    type: 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: false,
                    fixedContentPos: false
                });
            });

            function closeAlert(closeId){
                $('#'+closeId).hide();
            }

        </script>

        <script>
            $('.slick-carousel').each(function() {
                var slider = $(this);
                $(this).slick({
                    infinite: true,
                    dots: false,
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0'
                });

                $(this).closest('.slick-slider-area').find('.slick-prev').on("click", function() {
                    slider.slick('slickPrev');
                });
                $(this).closest('.slick-slider-area').find('.slick-next').on("click", function() {
                    slider.slick('slickNext');
                });
            });

        </script>

    </div>
    <!-- Wrapper / End -->
    @yield('script')
</body>


<!-- Mirrored from code-theme.com/html/findhouses/single-property-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jul 2024 06:22:03 GMT -->
</html>
