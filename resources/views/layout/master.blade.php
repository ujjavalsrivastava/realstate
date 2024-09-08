<!DOCTYPE html>
<html lang="zxx">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/jquery-ui.css')}}">
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
    <link rel="stylesheet" href="{{ URL::asset('assets/css/aos.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/aos2.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/lightcase.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/menu.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/maps.css')}}">
    <link rel="stylesheet" id="color" href="{{ URL::asset('assets/css/colors/pink.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
.newst{
    border: 0px;
    background: rgba(255, 255, 255, 0.1);
    color: #fff;
    padding: .8rem;
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
}
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
    @yield('style')
</head>

<body class="homepage-9 hp-6 homepage-1 mh">
<div id="loadingDiv" style="display:none"></div>
<input type="hidden" id="loadmorepage" value="1">
    <!-- Wrapper -->
    <div id="wrapper">
        
   
<!-- <div class="preloader"></div> -->
@include('comman.notify')


@if(Request::segment(1) === 'get_property')
@include('comman.back_header')
    @else
    @include('comman.header') 
@endif

@yield('content');
@include('comman.footer')
<a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->
        <!--register form -->
        <div class="login-and-register-form modal">
            <div class="main-overlay"></div>
            <div class="main-register-holder">
                <div class="main-register fl-wrap">
                    <div class="close-reg" onclick="closeRegisterLoginModel()"><i class="fa fa-times"></i></div>
                    <h3>Welcome to <span>Find<strong>Houses</strong></span></h3>
                    <!-- <div class="soc-log fl-wrap">
                        <p>Login</p>
                        <a href="#" class="facebook-log"><i class="fa fa-facebook-official"></i>Log in with Facebook</a>
                        <a href="#" class="twitter-log"><i class="fa fa-twitter"></i> Log in with Twitter</a>
                    </div>
                    <div class="log-separator fl-wrap"><span>Or</span></div> -->
                    <div id="tabs-container">
                        <ul class="tabs-menu">
                            <li id="showhidelogin" onclick="showLoginModel()"><a href="#tab-1" id="loginbuttoncolor" class="loginbuttoncolor">Login</a></li>
                            <li id="showhideregister" onclick="showRegisterModel()"><a href="#tab-2">Register</a></li>
                        </ul>
                        <div class="tab">
                            <div id="tab-1" class="tab-contents">
                                <div class="custom-form">
                                    <form method="post"  id="loginform">
                                        @csrf()
                                        <label>Username or Email Address * </label>
                                        <input name="email" type="text" onClick="this.select()" value="">
                                        <label>Password * </label>
                                        <input name="password" type="password" onClick="this.select()" value="">
                                        <button type="submit" class="log-submit-btn"><span>Log In</span></button>
                                        <div class="clearfix"></div>
                                        <div class="filter-tags">
                                            <input id="check-a" type="checkbox" name="check">
                                            <label for="check-a">Remember me</label>
                                        </div>
                                    </form>
                                    <div class="lost_password">
                                        <a href="#" onclick="forgetPass()">Lost Your Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab">
                                <div id="tab-2" class="tab-contents">
                                    <div class="custom-form">
                                        <form method="post"  id="registerform" >
                                        @csrf()
                                           <div id="first">
                                        <ul class="tabs-menu">
                                        @foreach($type as $k => $row)
                                        <li class="{{($k == 0)?'current':''}} protype" onclick="selectProtype(this)"><a href="#" id="loginbuttoncolor">{{ucwords($row->description)}}</a></li>
                                         @endforeach
                                       </ul>
                                       <input type="hidden" name="type" id="type" value="Owner">
                                        <label>Full Name * </label>
                                            <input  type="text" name="name">
                                            <label>Mobile No *</labe>
                                            <input name="mobile" type="text" >
                                            <label>Email Address *</label>
                                            <input name="email" id="emailId" type="text" >
                                            <label>Password *</label>
                                            <input name="password" type="password">
                                            <a href="#" onclick="nextFun()"  class="log-submit-btn"><span>Next</span></a>
                                             </div>
                                             <!-- <div id="third" style="display:none">
                                             <label>Property Type * </label>
                                             <select class="form-control">
                                             <option value=>Select Option</option>
                                            @foreach($pro_type as $row)
                                            <option value="{{$row->code}}">{{$row->description}}</option>
                                            @endforeach
                                            </select>
                                            <label>What type of Property is it * </label>
                                             <select class="form-control" onchange="getRelationData(this.value)">
                                             <option value=>Select Option</option>
                                            @foreach($res_com_type as $row)
                                            <option value="{{$row->code}}">{{$row->description}}</option>
                                            @endforeach
                                            </select>
                                            <div id="redioResult">
                                            </div>                                      
                                             <button type="submit" class="log-submit-btn"><span>Register</span></button>
                                             <div>    -->
                                            <div id="second" style="display:none">
                                                <label>OTP* </label>
                                                <input  type="text"  name="otp" id="otp">
                                                <a href="#" onclick="nextPage()"  class="log-submit-btn"><span>Next</span></a>
                                            </div>
                                            <div id="third" style="display:none">
                                             <label>Property Type * </label>
                                             <select class="form-control" name="pro_type">
                                             <option value=>Select Option</option>
                                            @foreach($pro_type as $row)
                                            <option value="{{$row->code}}">{{$row->description}}</option>
                                            @endforeach
                                            </select>
                                            <label> Address *</label>
                                            <input name="address" id="address" type="text" >
                                            <label> Pin Code *</label>
                                            <input name="pin_no" id="pin_no" type="text" >                           
                                             <button type="submit" class="log-submit-btn"><span>Register</span></button>
                                             <div> 
                                             </div>   
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--register form end -->

        <!-- forget password -->
        <div class="forget-form modal">
            <div class="main-overlay"></div>
            <div class="main-register-holder">
                <div class="main-register fl-wrap">
                    <div class="close-reg" onclick="closeRegisterLoginModel()"><i class="fa fa-times"></i></div>
                    <h3>Welcome to <span>Find<strong>Houses</strong></span></h3>
                     <div id="tabs-container">
                     <form method="post"  id="forgetForm">
                        <div class="tab">
                            <div id="tab-1" class="tab-contents">
                                <div id="forgetFirst" class="custom-form">
                                    
                                        @csrf()
                                        <div >
                                        <label>Email Address * </label>
                                        <input name="forgetemail"  id="forgetemail" type="text" >
                                        <button type="button" class="log-submit-btn" onclick="forgetnextFun()"><span>Submit</span></button>
                                        <div class="clearfix"></div>
                                       </div>
                                   
                                </div>  
                            </div>
                            <div class="tab">
                            <div id="forgetSecond" class="custom-form" style="display:none">
                                <label>OTP* </label>
                                     <input  type="text"  name="forgetotp" id="forgetotp">
                                     <button type="button" class="log-submit-btn" onclick="forgetnextPageFun()"><span>Submit</span></button>
                                </div>
                            </div>
                            <div class="tab">
                            <div id="forgetThird"  class="custom-form" style="display:none">
                                <label>Password* </label>
                                     <input  type="password"  name="forgetpasword" id="forgetpassword">
                                     <label>Confirm Password* </label>
                                     <input  type="password"  name="cforgetpasword" id="cforgetpassword">
                                     <button type="submit" class="log-submit-btn" >Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
         <!-- forget password end -->
        <!-- change password -->
        <div class="change-form modal">
            <div class="main-overlay"></div>
            <div class="main-register-holder">
                <div class="main-register fl-wrap">
                    <div class="close-reg" onclick="closeRegisterLoginModel()"><i class="fa fa-times"></i></div>
                    <h3>Welcome to <span>Find<strong>Houses</strong></span></h3>
                     <div id="tabs-container">
                     <form method="post"  id="changeForm">
                            <div class="tab">
                            <div id=""  class="custom-form">
                            <label> Current Password* </label>
                            <input  type="password"  name="currentpass" id="currentpass">
                                <label>New Password* </label>
                                     <input  type="password"  name="newpass" id="newpass">
                                     <label>Confirm Password* </label>
                                     <input  type="password"  name="cpass" id="cpass">
                                     <button type="submit" class="log-submit-btn" >Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
         <!-- change password end -->
        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->
        <!-- ARCHIVES JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ URL::asset('assets/js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/rangeSlider.js')}}"></script>
        <script src="{{ URL::asset('assets/js/tether.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/moment.js')}}"></script>
        <script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/mmenu.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/mmenu.js')}}"></script>
        <script src="{{ URL::asset('assets/js/aos.js')}}"></script>
        <script src="{{ URL::asset('assets/js/aos2.js')}}"></script>
        <script src="{{ URL::asset('assets/js/animate.js')}}"></script>
        <script src="{{ URL::asset('assets/js/slick.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/fitvids.js')}}"></script>
        <script src="{{ URL::asset('assets/js/jquery.waypoints.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/typed.min.js')}}"></script>
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
        <script src="{{ URL::asset('assets/js/forms-2.js')}}"></script>
        <script src="{{ URL::asset('assets/js/map-style2.js')}}"></script>
        <script src="{{ URL::asset('assets/js/range.js')}}"></script>
        <script src="{{ URL::asset('assets/js/color-switcher.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
}); 

function addFav(postid){

    $('#loadingDiv').show();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('fav-pro')}}", // The route that handles the request
                    type: 'POST',
                    data:{'pro_des_id':postid,'fav_pro':'Y'},
                    success: function(response) {
                        $('#loadingDiv').hide();
                        if(response.flag=='N'){
                            $('#fav_'+postid).removeAttr( 'style' );

                        }else{
                            $('#fav_'+postid).css("color", "red");
                        }
                      
                    },
                    error: function (response) {
                        $('#loadingDiv').hide();
                                $('#errorNotification').show();
                                $('#errorMessage').text(response.responseJSON.error);
                            },
                });

}


$('#forgetForm').on('submit', function(e) {
                e.preventDefault(); 
                $.ajax({
                    type: "POST",
                    url: "{{url('/changePassword')}}",
                    data: $(this).serialize(),
                    success: function(response) {
                        if(response.status == '200'){
                            $('#successNotification').show();
                            $('#successMessage').text(response.message);
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

function changePass(){
                // $('.change-form').css("display", "block");
                $('.change-form').modal('show');
            }
            $('#changeForm').on('submit', function(e) {
                e.preventDefault(); 
                $.ajax({
                    type: "POST",
                    url: "{{url('/password-change')}}",
                    data: $(this).serialize(),
                    success: function(response) {
                        if(response.status == '200'){
                            $('#successNotification').show();
                            $('#successMessage').text(response.message);
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

            function forgetnextPageFun(){
                var email = $('#forgetemail').val();
                var otp = $('#forgetotp').val();
                if(otp == ''){
                    $('#errorNotification').show();
                    $('#errorMessage').text('OTP is required');
                    return false;
                }


                $('#loadingDiv').show();
                $.ajax({
                    url: "{{url('verifyOtp')}}", // The route that handles the request
                    type: 'POST',
                    data:{'email':email,'otp':otp},
                    success: function(response) {
                        $('#loadingDiv').hide();
                        if(response.status == '200'){
                            $('#forgetFirst').hide();
                            $('#forgetSecond').hide();
                            $('#forgetThird').show();
                            $('#successNotification').show();
                            $('#successMessage').text(response.message);
                           
                        }else{
                            $('#errorNotification').show();
                            $('#errorMessage').text(response.message);
                        }
                    },
                    error: function (response) {
                        $('#loadingDiv').hide();
                                $('#errorNotification').show();
                                $('#errorMessage').text(response.responseJSON.error);
                            },
                });
                
            }

            function forgetnextFun(){
                var email = $('#forgetemail').val();
                if(email == ''){
                    $('#errorNotification').show();
                    $('#errorMessage').text('Email is required');
                    return false;
                }


                $('#loadingDiv').show();
                $.ajax({
                    url: "{{url('forget')}}?type=forget", // The route that handles the request
                    type: 'POST',
                    data:{'email':email},
                    success: function(response) {
                        $('#loadingDiv').hide();
                        if(response.status == '200'){
                            $('#forgetFirst').hide();
                            $('#forgetSecond').show();
                            $('#forgetThird').hide();
                            $('#successNotification').show();
                            $('#successMessage').text(response.message);
                           
                        }else{
                            $('#errorNotification').show();
                            $('#errorMessage').text(response.message);
                        }
                    },
                    error: function (response) {
                        $('#loadingDiv').hide();
                                $('#errorNotification').show();
                                $('#errorMessage').text(response.responseJSON.error);
                            },
                });

            }

            $(document).ready(function() {
            $('.select2').select2({
                theme: 'bootstrap4', // Use the Bootstrap theme for better compatibility
                width: '100%' // Ensure it takes full width
            });
            });
            $(window).on('scroll load', function() {
                $("#header.cloned #logo img").attr("src", $('#header #logo img').attr('data-sticky-logo'));
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

              function forgetnextPage(){
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
                            $('#forgetFirst').hide();
                            $('#forgetSecond').hide();
                            $('#forgetThird').show();
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


            $('#forget').on('submit', function(e) {
                e.preventDefault(); 
                $.ajax({
                    type: "POST",
                    url: "{{url('/forget')}}",
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
           
            function forgetPass(){
                $('.forget-form').css("display", "block");
            }


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


        function getstate(id){
        $.ajax({
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                url: '{{url('show_state')}}/' + id,
                type: 'GET',
                success: function(response) {
                    var state = '<option value="" >Select State</option>';
                    $.each(response.data, function( index, value ) {
                        console.log(value);
                        state +=  '<option value="' + value.id + '">' + value.name + '</option>'
                    });
                    // state += '</select>';
                   $('#state').html(state);
                    console.log(state);
                }
            });
    }

    function getCity(id){
        $.ajax({
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                url: '{{url('show_city')}}/' + id,
                type: 'GET',
                success: function(response) {
                    var city = '<select class="form-control wide select2" name="city" id="city"><option value="" >Select City</option>';
                    $.each(response.data, function( index, value ) {
                        console.log(value);
                        city +=  '<option value="' + value.id + '">' + value.city + '</option>'
                    });
                    city += '</select>';
                   $('#city').html(city);
                    console.log(city);
                }
            });
    }

    $('#newsletterForm').on('submit', function(e) {
                e.preventDefault(); 
                $.ajax({
                    type: "POST",
                    url: "{{url('/news-subscription')}}",
                    data: $(this).serialize(),
                    success: function(response) {
                        if(response.status == '200'){
                            $('#successNotification').show();
                            window.scrollTo({ top: 0, behavior: 'smooth' });
                            $('#successMessage').text(response.success);
                            $('#newsletterForm')[0].reset(); 
                        }else{
                            $('#errorNotification').show();
                            window.scrollTo({ top: 0, behavior: 'smooth' });
                            $('#errorMessage').text(response.message);
                        }   
                    },
                    error: function (response) {
                     
            $('#errorNotification').show();
            window.scrollTo({ top: 0, behavior: 'smooth' });
            $('#errorMessage').text(response.responseJSON.error);
        },
                });
            });


        </script>

        <script>
            $(".dropdown-filter").on('click', function() {

                $(".explore__form-checkbox-list").toggleClass("filter-block");

            });

        </script>

        <!-- MAIN JS -->
        <script src="{{ URL::asset('assets/js/script.js')}}"></script>

        


    </div>
    
    @yield('script')
    <!-- Wrapper / End -->
</body>


</html>

