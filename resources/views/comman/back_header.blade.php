<header id="header-container">
   <!-- Header -->
   <div id="header">
      <div class="container container-header">
         <!-- Left Side Content -->
         <div class="left-side">
            <!-- Logo -->
            <div id="logo">
               <a href="{{url('/')}}"><img src="{{URL::asset('assets/images/logo.png')}}" alt=""></a>
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
            <nav id="navigation" class="style-1">
               <ul id="responsive">
                  @foreach($menu as $row)
                  <li>
                     <a href="#">{{$row->name}}</a>
                     <ul>
                        @foreach($row->getSubMenu as $row)
                        @if(!empty($row->url))
                        <li><a href="{{url('/')}}{{$row->url}}">{{$row->name}}</a> </li>
                        @else
                        <li><a href="{{url('property-for-sale')}}?type={{$row->name}}">{{$row->name}}</a> </li>
                        @endif
                        @endforeach
                     </ul>
                  </li>
                  @endforeach
               </ul>
            </nav>
            <!-- Main Navigation / End -->
         </div>
         <!-- Left Side Content / End -->
         <!-- Right Side Content / End -->
         <div class="right-side d-none d-none d-lg-none d-xl-flex">
            <!-- Header Widget -->
            <div class="header-widget">
               <a href="{{url('/post-property')}}" class="button border">Add Listing<i class="fas fa-laptop-house ml-2"></i></a>
            </div>
            <!-- Header Widget / End -->
         </div>
         <!-- Right Side Content / End -->
         @if(Auth::check())
         <div class="header-user-menu user-menu add">
            <div class="header-user-name">
               <span><img src="{{URL::asset('assets/images/user.jpg')}}" alt=""></span>{{ucfirst(Auth::user()->name)}} @if(Auth::user()->user_verified)<img src="{{URL::asset('assets/images/bluetick.png')}}"  width="20px" alt="">@endif
            </div>
            <ul>
            <li><a href="{{url('admin/upload-profile')}}"> Edit profile</a></li>
             
               <li><a href="{{url('/admin/payment-list')}}">  Payments</a></li>
               <li><a href="{{url('/admin/get-change-password')}}" > Change Password</a></li>
               <li><a href="{{url('/logout')}}">Log Out</a></li>
            </ul>
         </div>
         <!-- Right Side Content / End -->
         @else
         <div class="right-side d-none d-none d-lg-none d-xl-flex sign ml-0">
            <!-- Header Widget -->
            <div class="header-widget sign-in">
               <div class="show-reg-form modal-open openModal" onclick="openRegisterLoginModel()"><a href="javascript:void(0)">Sign In</a></div>
            </div>
            <!-- Header Widget / End -->
         </div>
         @endif
         <!-- lang-wrap-->
         <!-- lang-wrap end-->
      </div>
   </div>
   <!-- Header / End -->
</header>