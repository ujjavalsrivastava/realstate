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
      <title>@yield('title')</title>
      <!-- FAVICON -->
      <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('assets/images/favicon.ico')}}">
  
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
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      @yield('style')
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
         /* chat box */
         html, body {
         background: #efefef;      
         height:100%;  
         }
         #center-text {          
         display: flex;
         flex: 1;
         flex-direction:column; 
         justify-content: center;
         align-items: center;  
         height:100%;
         }
         #chat-circle {
         z-index: 999999;
         position: fixed;
         bottom: 50px;
         right: 50px;
         /* background: #5A5EB9; */
         width: 80px;
         height: 80px;  
         border-radius: 50%;
         color: white;
         padding: 28px;
         cursor: pointer;
         box-shadow: 0px 3px 16px 0px rgba(0, 0, 0, 0.6), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
         }
         .btn#my-btn {
         background: white;
         padding-top: 13px;
         padding-bottom: 12px;
         border-radius: 45px;
         padding-right: 40px;
         padding-left: 40px;
         color: #5865C3;
         }
         #chat-overlay {
         background: rgba(255,255,255,0.1);
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         border-radius: 50%;
         display: none;
         }
         .chat-box {
         z-index: 99999;
         display:none;
         background: #efefef;
         position:fixed;
         right:30px;
         bottom:50px;  
         width:350px;
         max-width: 85vw;
         max-height:100vh;
         border-radius:5px;  
         /*   box-shadow: 0px 5px 35px 9px #464a92; */
         box-shadow: 0px 0px 17px 1px #ccc;
         }
         .chat-box-toggle {
         float:right;
         margin-right:15px;
         cursor:pointer;
         }
         .chat-box-header {
         background: #FF385C;
         height:70px;
         border-top-left-radius:5px;
         border-top-right-radius:5px; 
         color:white;
         text-align:center;
         font-size:20px;
         padding-top:17px;
         }
         .chat-box-body {
         position: relative;  
         height:370px;  
         height:auto;
         border:1px solid #ccc;  
         overflow: hidden;
         }
         .chat-box-body:after {
         content: "";
         background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTAgOCkiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PGNpcmNsZSBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIgY3g9IjE3NiIgY3k9IjEyIiByPSI0Ii8+PHBhdGggZD0iTTIwLjUuNWwyMyAxMW0tMjkgODRsLTMuNzkgMTAuMzc3TTI3LjAzNyAxMzEuNGw1Ljg5OCAyLjIwMy0zLjQ2IDUuOTQ3IDYuMDcyIDIuMzkyLTMuOTMzIDUuNzU4bTEyOC43MzMgMzUuMzdsLjY5My05LjMxNiAxMC4yOTIuMDUyLjQxNi05LjIyMiA5LjI3NC4zMzJNLjUgNDguNXM2LjEzMSA2LjQxMyA2Ljg0NyAxNC44MDVjLjcxNSA4LjM5My0yLjUyIDE0LjgwNi0yLjUyIDE0LjgwNk0xMjQuNTU1IDkwcy03LjQ0NCAwLTEzLjY3IDYuMTkyYy02LjIyNyA2LjE5Mi00LjgzOCAxMi4wMTItNC44MzggMTIuMDEybTIuMjQgNjguNjI2cy00LjAyNi05LjAyNS0xOC4xNDUtOS4wMjUtMTguMTQ1IDUuNy0xOC4xNDUgNS43IiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIi8+PHBhdGggZD0iTTg1LjcxNiAzNi4xNDZsNS4yNDMtOS41MjFoMTEuMDkzbDUuNDE2IDkuNTIxLTUuNDEgOS4xODVIOTAuOTUzbC01LjIzNy05LjE4NXptNjMuOTA5IDE1LjQ3OWgxMC43NXYxMC43NWgtMTAuNzV6IiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIvPjxjaXJjbGUgZmlsbD0iIzAwMCIgY3g9IjcxLjUiIGN5PSI3LjUiIHI9IjEuNSIvPjxjaXJjbGUgZmlsbD0iIzAwMCIgY3g9IjE3MC41IiBjeT0iOTUuNSIgcj0iMS41Ii8+PGNpcmNsZSBmaWxsPSIjMDAwIiBjeD0iODEuNSIgY3k9IjEzNC41IiByPSIxLjUiLz48Y2lyY2xlIGZpbGw9IiMwMDAiIGN4PSIxMy41IiBjeT0iMjMuNSIgcj0iMS41Ii8+PHBhdGggZmlsbD0iIzAwMCIgZD0iTTkzIDcxaDN2M2gtM3ptMzMgODRoM3YzaC0zem0tODUgMThoM3YzaC0zeiIvPjxwYXRoIGQ9Ik0zOS4zODQgNTEuMTIybDUuNzU4LTQuNDU0IDYuNDUzIDQuMjA1LTIuMjk0IDcuMzYzaC03Ljc5bC0yLjEyNy03LjExNHpNMTMwLjE5NSA0LjAzbDEzLjgzIDUuMDYyLTEwLjA5IDcuMDQ4LTMuNzQtMTIuMTF6bS04MyA5NWwxNC44MyA1LjQyOS0xMC44MiA3LjU1Ny00LjAxLTEyLjk4N3pNNS4yMTMgMTYxLjQ5NWwxMS4zMjggMjAuODk3TDIuMjY1IDE4MGwyLjk0OC0xOC41MDV6IiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIvPjxwYXRoIGQ9Ik0xNDkuMDUgMTI3LjQ2OHMtLjUxIDIuMTgzLjk5NSAzLjM2NmMxLjU2IDEuMjI2IDguNjQyLTEuODk1IDMuOTY3LTcuNzg1LTIuMzY3LTIuNDc3LTYuNS0zLjIyNi05LjMzIDAtNS4yMDggNS45MzYgMCAxNy41MSAxMS42MSAxMy43MyAxMi40NTgtNi4yNTcgNS42MzMtMjEuNjU2LTUuMDczLTIyLjY1NC02LjYwMi0uNjA2LTE0LjA0MyAxLjc1Ni0xNi4xNTcgMTAuMjY4LTEuNzE4IDYuOTIgMS41ODQgMTcuMzg3IDEyLjQ1IDIwLjQ3NiAxMC44NjYgMy4wOSAxOS4zMzEtNC4zMSAxOS4zMzEtNC4zMSIgc3Ryb2tlPSIjMDAwIiBzdHJva2Utd2lkdGg9IjEuMjUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIvPjwvZz48L3N2Zz4=');
         opacity: 0.1;
         top: 0;
         left: 0;
         bottom: 0;
         right: 0;
         height:100%;
         position: absolute;
         z-index: -1;   
         }
         #chat-input {
         background: #f4f7f9;
         width:100%; 
         position:relative;
         height:47px;  
         padding-top:10px;
         padding-right:50px;
         padding-bottom:10px;
         padding-left:15px;
         border:none;
         resize:none;
         outline:none;
         border:1px solid #ccc;
         color:#888;
         border-top:none;
         border-bottom-right-radius:5px;
         border-bottom-left-radius:5px;
         overflow:hidden;  
         }
         .chat-input > form {
         margin-bottom: 0;
         }
         #chat-input::-webkit-input-placeholder { /* Chrome/Opera/Safari */
         color: #ccc;
         }
         #chat-input::-moz-placeholder { /* Firefox 19+ */
         color: #ccc;
         }
         #chat-input:-ms-input-placeholder { /* IE 10+ */
         color: #ccc;
         }
         #chat-input:-moz-placeholder { /* Firefox 18- */
         color: #ccc;
         }
         .chat-submit {  
         position:absolute;
         bottom:3px;
         right:10px;
         background: transparent;
         box-shadow:none;
         border:none;
         border-radius:50%;
         color: #FF385C;
         width:35px;
         height:35px;  
         }
         .chat-logs {
         padding:15px; 
         height:370px;
         overflow-y:scroll;
         }
         .chat-logs::-webkit-scrollbar-track
         {
         -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
         background-color: #F5F5F5;
         }
         .chat-logs::-webkit-scrollbar
         {
         width: 5px;  
         background-color: #F5F5F5;
         }
         .chat-logs::-webkit-scrollbar-thumb
         {
         background-color: white;
         }
         @media only screen and (max-width: 500px) {
         .chat-logs {
         height:40vh;
         }
         }
         .chat-msg.user > .msg-avatar img {
         width:45px;
         height:45px;
         border-radius:50%;
         float:left;
         width:15%;
         }
         .chat-msg.self > .msg-avatar img {
         width:45px;
         height:45px;
         border-radius:50%;
         float:right;
         width:15%;
         }
         .cm-msg-text {
         background:white;
         padding:10px 15px 10px 15px;  
         color:#666;
         max-width:75%;
         float:left;
         margin-left:10px; 
         position:relative;
         margin-bottom:20px;
         border-radius:30px;
         }
         .chat-msg {
         clear:both;    
         }
         .chat-msg.self > .cm-msg-text {  
         float:right;
         margin-right:10px;
         background: #FF385C;
         color:white;
         }
         .cm-msg-button>ul>li {
         list-style:none;
         float:left;
         width:50%;
         }
         .cm-msg-button {
         clear: both;
         margin-bottom: 70px;
         }
         /* chat box end */
      </style>
   </head>
   <body class="inner-pages sin-1 homepage-4 hd-white">
      <!-- chat box -->
   
      <!-- chat box end -->
      <div id="loadingDiv" style="display:none"></div>
      <input type="hidden" id="loadmorepage" value="1">
      <!-- Wrapper -->
      <div id="wrapper">
         @include('comman.back_header')
         @include('comman.notify')
         @yield('content');
         @include('comman.back_footer')
         <div class="login-and-register-form modal">
            <div class="main-overlay"></div>
            <div class="main-register-holder">
               <div class="main-register fl-wrap">
                  <!-- <div class="close-reg" onclick="closeRegisterLoginModel()"><i class="fa fa-times"></i></div> -->
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
                                 <a href="#" onclick="changePass()">Lost Your Password?</a>
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
            <!-- change password -->
            <!-- <div class="change-form modal">
               <div class="main-overlay"></div>
               <div class="main-register-holder">
                  <div class="main-register fl-wrap">
                     <div class="close-reg" onclick="closeRegisterLoginModel()"><i class="fa fa-times"></i></div>
                     <h3>Welcome to <span>Find<strong>Houses</strong></span></h3>
                     <div id="tabs-container">
                        <form method="post"  id="changeForm">
                           <div class="tab">
                              <div id="forgetThird"  class="custom-form" style="display:none">
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
            </div> -->
         </div>
         <!-- change password end -->
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
         <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
         <!-- Date Dropper Script-->
         <script>
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
               
            $('#reservation-date').dateDropper();
                $(document).ready(function() {
                    $('.select2').select2({
                        theme: 'bootstrap4', // Use the Bootstrap theme for better compatibility
                        width: '100%' // Ensure it takes full width
                    });
                });
            
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
         <script>
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
                       $('#redioResult').html(response);
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
             //  chat box
            $(function() {
            var INDEX = 0; 
            $("#chat-submit").click(function(e) {
            e.preventDefault();
            var msg = $("#chat-input").val(); 
            if(msg.trim() == ''){
            return false;
            }
            generate_message(msg, 'self');
            var buttons = [
            {
            name: 'Existing User',
            value: 'existing'
            },
            {
            name: 'New User',
            value: 'new'
            }
            ];
            setTimeout(function() {      
            generate_message(msg, 'user');  
            }, 1000)
            
            })
            
            
            $(document).delegate(".chat-btn", "click", function() {
            var value = $(this).attr("chat-value");
            var name = $(this).html();
            $("#chat-input").attr("disabled", false);
            generate_message(name, 'self');
            })
            
            $("#chat-circle").click(function() {    
            $("#chat-circle").toggle('scale');
            $(".chat-box").toggle('scale');
            })
            
            $(".chat-box-toggle").click(function() {
            $("#chat-circle").toggle('scale');
            $(".chat-box").toggle('scale');
            })
            
            })
            
            //   chat box end
            
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
            function changePass(){
                //alert('test');
                // $('.change-form').css("display", "block");
               $('.login-and-register-form').modal('hide');
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
      </div>
      <!-- Wrapper / End -->
      @yield('script')
   </body>
   <!-- Mirrored from code-theme.com/html/findhouses/single-property-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jul 2024 06:22:03 GMT -->
</html>