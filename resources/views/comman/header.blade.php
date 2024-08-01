<header class="main-header header-style-two">

<div class="header-top">
<div class="inner-container">
<div class="top-left">

<ul class="list-style-one">
<li><i class="fa fa-envelope"></i> <a href="https://html.kodesolution.com/cdn-cgi/l/email-protection#b1dfd4d4d5d9d4ddc1f1d2dedcc1d0dfc89fd2dedc"><span class="__cf_email__" data-cfemail="37595252535f525b477754585a4756594e1954585a">[email&#160;protected]</span></a></li>
<li><i class="fa fa-map-marker-alt"></i> 88 Broklyn Golden Street. New York</li>
</ul>
</div>
<div class="top-right" >
<ul class="social-icon-one">
<li><a href="#"><span class="fab fa-twitter"></span></a></li>
<li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
<li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
<li><a href="#"><span class="fab fa-instagram"></span></a></li>
</ul>
</div>

</div>
<div class="outer-box" >
<ul class="useful-links">
<li><a href="#">Login</a></li>
<li><a href="#">Signup</a></li>

</ul>
</div>
</div>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="header-lower">

<div class="main-box">
<div class="logo-box">
<div class="logo"><a href="index.html"><img src="{{ URL::asset('assets/images/logo-2-yellow.png')}}" alt title="Sotech"></a></div>
</div>
<div class="nav-outer">
<nav class="nav main-menu">
<ul class="navigation">
@foreach($menu as $category)
<li class="current @if(!empty($category->getSubctegory)) dropdown @endif"><a href="javascript:void(0)">{{$category->application_cate_desc}}</a>
<ul>
@foreach($category->getSubctegory as $subcategory)
<li><a href="{{url('/')}}/{{$subcategory->cat_url}}/{{$subcategory->sub_cat_url}}">{{$subcategory->application_sub_cate_desc}}</a></li>
@endforeach
</ul>
</li>
@endforeach
</ul>
</nav>
</div>

<div class="sticky-header">
<div class="auto-container">
<div class="inner-container">

<div class="logo">
<a href="index.html" title><img src="{{ URL::asset('assets/images/logo-2-yellow.png')}}" alt title></a>
</div>

<div class="nav-outer">

<nav class="main-menu">
<div class="navbar-collapse show collapse clearfix">
<ul class="navigation clearfix">

</ul>
</div>
</nav>

<div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
</div>
</div>
</div>
</div>


</header>
