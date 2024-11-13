<!-- Header Container
   ================================================== -->
   <div class="dash-content-wrap">
   <header id="header-container" class="db-top-header">
      <!-- Header -->
      <div id="header">
         <div class="container-fluid">
            <!-- Left Side Content -->
            <div class="left-side">
               <!-- Logo -->
               <div id="logo">
                  <a href="index.html"><img src="images/logo.svg" alt=""></a>
               </div>
               <!-- Mobile Navigation -->
               <div class="mmenu-trigger">
                  <button class="hamburger hamburger--collapse" type="button">
                  <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                  </span>
                  </button>
               </div>
               <!-- Main Navigation -->

               <div class="clearfix"></div>
               <!-- Main Navigation / End -->
            </div>
            <!-- Left Side Content / End -->
            <!-- Right Side Content / --> 
            <div class="header-user-menu user-menu">
            <div class="header-user-name">
               <span>
                  @if(Auth::user()->profile)
                  <img src="{{Auth::user()->profile}}" alt="">
                  @else
                  <img src="{{URL::asset('assets/images/user.jpg')}}" alt="">
                  @endif
            
            </span>
            {{ucfirst(output(Auth::user()->name,10))}} @if(Auth::user()->user_verified)<img src="{{URL::asset('assets/images/bluetick.png')}}"  width="20px" alt="">@endif
            </div>
               <ul>
                  <li><a href="user-profile.html"> Edit profile</a></li>
                  
                  <li><a href="{{url('admin/payment-list')}}">  Payments</a></li>
                  <li><a href="{{url('admin/get-change-password')}}"> Change Password</a></li>
                  <li><a href="#">Log Out</a></li>
               </ul>
            </div>
            <!-- Right Side Content / End -->                         
         </div>
      </div>
      <!-- Header / End -->
   </header>
</div>
<div class="clearfix"></div>
<!-- Header Container / End -->