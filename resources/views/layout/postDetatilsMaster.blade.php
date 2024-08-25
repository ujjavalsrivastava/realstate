<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from code-theme.com/html/findhouses/properties-full-list-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jul 2024 06:21:47 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>List View</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('assets/favicon.ico')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ URL::asset('assets/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/fontawesome-5-all.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css')}}">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/search.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/lightcase.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/menu.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/styles.css')}}">
    <link rel="stylesheet" id="color" href="{{ URL::asset('assets/css/default.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @yield('style')
    <style>

#loadingDiv{
				position:fixed;
				top:0px;
				right:0px;
				width:100%;
				height:100%;
				background-color:#666;
				background-image:url("{{url('assets/images/ajax-loader.gif')}}");
				background-repeat:no-repeat;
				background-position:center;
				z-index:10000000;
				opacity: 0.4;
				filter: alpha(opacity=40); /* For IE8 and earlier */
				}
        .loginbuttoncolor{
            background:#FF385C !important;
            color:white !important;
        }
        .alert {
    z-index: 9999999;
    top: 3px;
    position: absolute;
    right: 3px;
    width: 31%;
}
    </style>
</head>

<body class="inner-pages homepage-4 agents list hp-6 full hd-white">
<div id="loadingDiv" style="display:none"></div>
<input type="hidden" id="loadmorepage" value="1">
    <!-- Wrapper -->
    <div id="wrapper">

    @include('comman.back_header')
        @include('comman.notify')
        @yield('content');
        @include('comman.back_footer')


         <!-- ARCHIVES JS -->
         <script src="{{URL::asset('assets/js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/rangeSlider.js')}}"></script>
        <script src="{{URL::asset('assets/js/tether.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/popper.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/mmenu.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/mmenu.js')}}"></script>
        <script src="{{URL::asset('assets/js/aos.js')}}"></script>
        <script src="{{URL::asset('assets/js/aos2.js')}}"></script>
        <script src="{{URL::asset('assets/js/slick.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/slick4.js')}}"></script>
        <script src="{{URL::asset('assets/js/smooth-scroll.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/lightcase.js')}}"></script>
        <script src="{{URL::asset('assets/js/search.js')}}"></script>
        <script src="{{URL::asset('assets/js/light.js')}}"></script>
        <script src="{{URL::asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/popup.js')}}"></script>
        <script src="{{URL::asset('assets/js/searched.js')}}"></script>
        <script src="{{URL::asset('assets/js/ajaxchimp.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/newsletter.js')}}"></script>
        <script src="{{URL::asset('assets/js/inner.js')}}"></script>
        <script src="{{URL::asset('assets/js/color-switcher.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(window).on('scroll load', function() {
                $("#header.cloned #logo img").attr("src", $('#header #logo img').attr('data-sticky-logo'));
            });

            $(document).ready(function() {
            $('.select2').select2({
                theme: 'bootstrap4', // Use the Bootstrap theme for better compatibility
                width: '100%' // Ensure it takes full width
            });
            });

            function selectProtype(thisval){
                jQuery('.protype').each(function(index, currentElement) {
                    $(this).removeClass("current");
                 });
                let val = $(thisval).find('a').text();
                 $(thisval).addClass('current');
                 $('#type').val(val);
            }

            function getRelationData(code){
                $.ajax({
                    type: "GET",
                    url: "{{url('/getReletiondata')}}/"+code,
                    
                    success: function(response) {
                       $('#redioResult').html(response)
                    },
                    error: function (response) {
         
            $('#errorNotification').show();
            $('#errorMessage').text('some think went to worng');
        },
                });
            }

            $('#loginform').on('submit', function(e) {
                e.preventDefault(); 
                $.ajax({
                    type: "POST",
                    url: "{{url('/loginPost')}}",
                    data: $(this).serialize(),
                    success: function(response) {
                        if(response.status == '200'){
                            $('#successNotification').show();
                            $('#successMessage').text(response.success);
                            location.reload().delay(5000);
                        }else{
                            $('#errorNotification').show();
                            $('#errorMessage').text(response.error);
                        }
                    },
                    error: function (response) {
         
            $('#errorNotification').show();
            $('#errorMessage').text(response.responseJSON.error);
        },
                });
            });

             function closeAlert(closeId){
                $('#'+closeId).hide();
             }
            

        </script>

        <!-- Slider Revolution scripts -->
        <script src="revolution/{{ URL::asset('assets/js/jquery.themepunch.tools.min.js')}}"></script>
        <script src="revolution/{{ URL::asset('assets/js/jquery.themepunch.revolution.min.js')}}"></script>

        <script>
            var typed = new Typed('.typed', {
                strings: ["House ^2000", "Apartment ^2000", "Plaza ^4000"],
                smartBackspace: false,
                loop: true,
                showCursor: true,
                cursorChar: "|",
                typeSpeed: 50,
                backSpeed: 30,
                startDelay: 800
            });

        </script>
        <script>
            
            function nextFun(){
                var email = $('#emailId').val();
                if(email == ''){
                    $('#errorNotification').show();
                    $('#errorMessage').text('Email is required');
                    return false;
                }
                $('#loadingDiv').show();
                $.ajax({
                    url: "{{url('send_mail')}}?email="+email, // The route that handles the request
                    type: 'GET',
                    success: function(response) {
                        $('#loadingDiv').hide();
                        if(response.status == '200'){
                            $('#first').hide();
                            $('#second').show();
                            $('#third').hide();
                            $('#successNotification').show();
                            $('#successMessage').text(response.message);
                           
                        }else{
                            $('#errorNotification').show();
                            $('#errorMessage').text(response.message);
                        }
                    },
                    error: function (response) {
         
                                $('#errorNotification').show();
                                $('#errorMessage').text(response.responseJSON.error);
                            },
                });
                
                
              }
              
              function nextPage(){
                var email = $('#emailId').val();
                var otp = $('#otp').val();
                if(email == ''){
                    $('#errorNotification').show();
                    $('#errorMessage').text('Email is required');
                    return false;
                }
               
                if(otp == ''){
                    $('#errorNotification').show();
                    $('#errorMessage').text('OTP is required');
                    return false;
                }
               
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('verifyOtp')}}", // The route that handles the request
                    type: 'POST',
                    data: {'email':email,'otp':otp},
                    success: function(response) {
                        if(response.status == '200'){

                            $('#first').hide();
                            $('#second').hide();
                            $('#third').show();
                            $('#successNotification').show();
                            $('#successMessage').text(response.message);
                           
                          
                        }else{
                            $('#errorNotification').show();
                            $('#errorMessage').text(response.message);
                        }
                    },
                    error: function (response) {
                            
                                $('#errorNotification').show();
                                $('#errorMessage').text(response.responseJSON.error);
                            },
                });
              }


              $('#registerform').on('submit', function(e) {
                e.preventDefault(); 
                $.ajax({
                    type: "POST",
                    url: "{{url('/register')}}",
                    data: $(this).serialize(),
                    success: function(response) {
                        if(response.status == '200'){
                            $('#successNotification').show();
                            $('#successMessage').text(response.success);
                            location.reload().delay(5000);
                        }else{
                            $('#errorNotification').show();
                            $('#errorMessage').text(response.message);
                        }
                        
                    },
                    error: function (response) {
                     
            $('#errorNotification').show();
            $('#errorMessage').text(response.responseJSON.error);
        },
                });
            });

            function openRegisterLoginModel(){
                $('.login-and-register-form').css("display", "block");
            }

            function closeRegisterLoginModel(){
                $('.login-and-register-form').css("display", "none");
            }

            function showRegisterModel(){
                
                $('#tab-2').css("display", "block");
                $('#tab-1').css("display", "none");
                $('#showhideregister').addClass("current");
                $('#showhidelogin').removeClass("current");
                $('#loginbuttoncolor').removeClass("loginbuttoncolor");
            }

            function showLoginModel(){
                
                $('#tab-2').css("display", "none");
                $('#tab-1').css("display", "block");
                $('#showhidelogin').addClass("current");
                $('#showhideregister').removeClass("current");
            }
        </script>

        <script>
            $('.slick-lancers').slick({
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: true,
                arrows: false,
                adaptiveHeight: true,
                responsive: [{
                    breakpoint: 1292,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 993,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        arrows: false
                    }
                }]
            });

        </script>

        <script>
            $('.job_clientSlide').owlCarousel({
                items: 2,
                loop: true,
                margin: 30,
                autoplay: false,
                nav: true,
                smartSpeed: 1000,
                slideSpeed: 1000,
                navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    991: {
                        items: 3
                    }
                }
            });

        </script>

        <script>
            $('.style2').owlCarousel({
                loop: true,
                margin: 0,
                dots: false,
                autoWidth: false,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                    0: {
                        items: 2,
                        margin: 20
                    },
                    400: {
                        items: 2,
                        margin: 20
                    },
                    500: {
                        items: 3,
                        margin: 20
                    },
                    768: {
                        items: 4,
                        margin: 20
                    },
                    992: {
                        items: 5,
                        margin: 20
                    },
                    1000: {
                        items: 7,
                        margin: 20
                    }
                }
            });

        </script>

        <script>
            $(".dropdown-filter").on('click', function() {

                $(".explore__form-checkbox-list").toggleClass("filter-block");

            });

        </script>

        @yield('script')
    </div>
    <!-- Wrapper / End -->
</body>


<!-- Mirrored from code-theme.com/html/findhouses/properties-list-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jul 2024 06:21:47 GMT -->
</html>