@extends('layout.master')

@section('title', 'About Us')

@section('styles')
	
@endsection

@section('content')

<section class="page-title" style="background-image: url({{ URL::asset('assets/images/background/page-title.jpg')}})">
<div class="auto-container">
<div class="title-outer">
<h1 class="title">About Us</h1>
<ul class="page-breadcrumb">
<li><a href="index.html">Home</a></li>
<li><a href="#">Pages</a></li>
<li>About</li>
</ul>
</div>
</div>
</section>


<section class="about-section">
<div class="auto-container">
<div class="row">
<div class="content-column col-xl-6 col-lg-7 col-md-12 col-sm-12 order-lg-2 wow fadeInRight" data-wow-delay="600ms">
<div class="inner-column">
<div class="sec-title">
<span class="sub-title">WHO WE ARE</span>
<h2>We provide best design Solution in town</h2>
<div class="text">Lorem ipsum dolor sit amet, consectetur notted adipisicing elit sed do eiusmod tempor incididunt ut labore et simply free text dolore magna ediet aliqua lonm andhn tempor facilisis sag</div>
</div>
<ul class="list-style-two">
<li><i class="fa fa-check-circle"></i> Deliver Perfect Solution for business</li>
<li><i class="fa fa-check-circle"></i> Readily Work With Global Brands solutions.</li>
<li><i class="fa fa-check-circle"></i> Residential Business Installation</li>
</ul>
<div class="btn-box">
<div class="founder-info">
<div class="thumb"><img src="{{ URL::asset('assets/images/resource/thumb-2.png')}}" alt></div>
<h5 class="name">Jessica brown</h5>
<span class="designation">Founder of company</span>
</div>
<a href="page-about.html" class="theme-btn btn-style-one"><span class="btn-title">Explore now</span></a>
</div>
</div>
</div>

<div class="image-column col-xl-6 col-lg-5 col-md-12 col-sm-12 pb-3">
<div class="inner-column wow fadeInLeft">
<figure class="image-1 overlay-anim wow fadeInUp"><img src="{{ URL::asset('assets/images/resource/about-1.jpg')}}" alt></figure>
<figure class="image-2 overlay-anim wow fadeInRight"><img src="{{ URL::asset('assets/images/resource/about-2.jpg')}}" alt></figure>
<div class="experience bounce-y">
<div class="inner">
<i class="icon flaticon-business-018-startup"></i>
<div class="text"><strong>30+</strong> Years of <br>experience</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="features-section-two">
<div class="auto-container">
<div class="row row-cols-1 row-cols-sm-3 row-cols-lg-5 justify-content-center">

<div class="feature-block-two col wow fadeInUp">
<div class="inner-box ">
<i class="icon flaticon-business-011-dollar"></i>
<h4 class="title"><a href="page-service-details.html">Global <br>Networking</a></h4>
</div>
</div>

<div class="feature-block-two col wow fadeInUp">
<div class="inner-box ">
<i class="icon flaticon-business-049-presentation"></i>
<h4 class="title"><a href="page-service-details.html">Business <br>Consultation</a></h4>
</div>
</div>

<div class="feature-block-two col wow fadeInUp">
<div class="inner-box ">
<i class="icon flaticon-business-061-meeting"></i>
<h4 class="title"><a href="page-service-details.html">Website <br>Development</a></h4>
</div>
</div>

<div class="feature-block-two col wow fadeInUp">
<div class="inner-box ">
<i class="icon flaticon-business-030-settings"></i>
<h4 class="title"><a href="page-service-details.html">UI/UX Design <br>Services</a></h4>
</div>
</div>

<div class="feature-block-two col wow fadeInUp">
<div class="inner-box ">
<i class="icon flaticon-business-054-graph"></i>
<h4 class="title"><a href="page-service-details.html">Support Management</a></h4>
</div>
</div>
</div>
<div class="bottom-text">IT Technology services built specifically for your business. <a href="page-services.html" class="theme-btn btn-style-one small"><span class="btn-title">Find Your Solution</span></a></div>
</div>
</section>


<section class="project-section alternate pb-0">
<div class="auto-container">
<div class="sec-title">
<div class="row">
<div class="col-lg-7">
<span class="sub-title">recently Completed work</span>
<h2>Improve & Enhance the <br>Tech Projects</h2>
</div>
<div class="col-lg-5">
<div class="text">There are many variations of passages of available but majority have suffered
alteration in some form, by humou or randomised words which don't look even slightly believable.
</div>
</div>
</div>
</div>
<div class="carousel-outer">

<div class="project-carousel owl-carousel owl-theme">

<div class="project-block">
<div class="inner-box">
<div class="image-box">
<figure class="image"><a href="{{ URL::asset('assets/images/resource/project-1.jpg')}}" class="lightbox-image"><img src="{{ URL::asset('assets/images/resource/project-1.jpg')}}" alt></a></figure>
<a href="page-project-details.html" class="icon"><i class="fa fa-long-arrow-alt-right"></i></a>
</div>
<div class="content-box">
<h4 class="title"><a href="page-project-details.html">Tech Solutions</a></h4>
<span class="cat">DESIGN / IDEAS</span>
</div>
</div>
</div>

<div class="project-block">
<div class="inner-box">
<div class="image-box">
<figure class="image"><a href="{{ URL::asset('assets/images/resource/project-2.jpg')}}" class="lightbox-image"><img src="{{ URL::asset('assets/images/resource/project-2.jpg')}}" alt></a></figure>
<a href="page-project-details.html" class="icon"><i class="fa fa-long-arrow-alt-right"></i></a>
</div>
<div class="content-box">
<h4 class="title"><a href="page-project-details.html">Smart Visions</a></h4>
<span class="cat">DESIGN / IDEAS</span>
</div>
</div>
</div>

<div class="project-block">
<div class="inner-box">
<div class="image-box">
<figure class="image"><a href="{{ URL::asset('assets/images/resource/project-3.jpg')}}" class="lightbox-image"><img src="{{ URL::asset('assets/images/resource/project-3.jpg')}}" alt></a></figure>
<a href="page-project-details.html" class="icon"><i class="fa fa-long-arrow-alt-right"></i></a>
</div>
<div class="content-box">
<h4 class="title"><a href="page-project-details.html">Platform Integration</a></h4>
<span class="cat">DESIGN / IDEAS</span>
</div>
</div>
</div>

<div class="project-block">
<div class="inner-box">
<div class="image-box">
<figure class="image"><a href="{{ URL::asset('assets/images/resource/project-4.jpg')}}" class="lightbox-image"><img src="{{ URL::asset('assets/images/resource/project-4.jpg')}}" alt></a></figure>
<a href="page-project-details.html" class="icon"><i class="fa fa-long-arrow-alt-right"></i></a>
</div>
<div class="content-box">
<h4 class="title"><a href="page-project-details.html">Web Development</a></h4>
<span class="cat">DESIGN / IDEAS</span>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="team-section-two">
<div class="auto-container">
<div class="sec-title text-center">
<span class="sub-title">Our team expert</span>
<h2>Meet Professionals</h2>
</div>
<div class="row">

<div class="team-block-two col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
<div class="inner-box">
<div class="info-box">
<h5 class="name"><a href="page-team-details.html">Adman Michel</a></h5>
<span class="designation">Web Developer</span>
<span class="share-icon fa fa-share-alt"></span>
<div class="social-links">
<a href="#"><i class="fab fa-twitter"></i></a>
<a href="#"><i class="fab fa-facebook-f"></i></a>
<a href="#"><i class="fab fa-pinterest-p"></i></a>
<a href="#"><i class="fab fa-instagram"></i></a>
</div>
</div>
<div class="image-box">
<figure class="image"><a href="page-team-details.html"><img src="{{ URL::asset('assets/images/resource/team-4.jpg')}}" alt></a></figure>
</div>
</div>
</div>

<div class="team-block-two col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
<div class="inner-box">
<div class="info-box">
<h5 class="name"><a href="page-team-details.html">Jessica Brown</a></h5>
<span class="designation">Web Developer</span>
<span class="share-icon fa fa-share-alt"></span>
<div class="social-links">
<a href="#"><i class="fab fa-twitter"></i></a>
<a href="#"><i class="fab fa-facebook-f"></i></a>
<a href="#"><i class="fab fa-pinterest-p"></i></a>
<a href="#"><i class="fab fa-instagram"></i></a>
</div>
</div>
<div class="image-box">
<figure class="image"><a href="page-team-details.html"><img src="{{ URL::asset('assets/images/resource/team-5.jpg')}}" alt></a></figure>
</div>
</div>
</div>

<div class="team-block-two col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
<div class="inner-box">
<div class="info-box">
<h5 class="name"><a href="page-team-details.html">Richerd William</a></h5>
<span class="designation">Web Developer</span>
<span class="share-icon fa fa-share-alt"></span>
<div class="social-links">
<a href="#"><i class="fab fa-twitter"></i></a>
<a href="#"><i class="fab fa-facebook-f"></i></a>
<a href="#"><i class="fab fa-pinterest-p"></i></a>
<a href="#"><i class="fab fa-instagram"></i></a>
</div>
</div>
<div class="image-box">
<figure class="image"><a href="page-team-details.html"><img src="{{ URL::asset('assets/images/resource/team-6.jpg')}}" alt></a></figure>
</div>
</div>
</div>

<div class="team-block-two col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="1200ms">
<div class="inner-box">
<div class="info-box">
<h5 class="name"><a href="page-team-details.html">Sara Albert</a></h5>
<span class="designation">Web Developer</span>
<span class="share-icon fa fa-share-alt"></span>
<div class="social-links">
<a href="#"><i class="fab fa-twitter"></i></a>
<a href="#"><i class="fab fa-facebook-f"></i></a>
<a href="#"><i class="fab fa-pinterest-p"></i></a>
<a href="#"><i class="fab fa-instagram"></i></a>
</div>
</div>
<div class="image-box">
<figure class="image"><a href="page-team-details.html"><img src="{{ URL::asset('assets/images/resource/team-7.jpg')}}" alt></a></figure>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="clients-section border-top">
<div class="auto-container">

<div class="sponsors-outer">

<ul class="clients-carousel owl-carousel owl-theme">
<li class="slide-item"> <a href="#"><img src="{{ URL::asset('assets/images/resource/client-1.png')}}" alt></a> </li>
<li class="slide-item"> <a href="#"><img src="{{ URL::asset('assets/images/resource/client-2.png')}}" alt></a> </li>
<li class="slide-item"> <a href="#"><img src="{{ URL::asset('assets/images/resource/client-3.png')}}" alt></a> </li>
<li class="slide-item"> <a href="#"><img src="{{ URL::asset('assets/images/resource/client-4.png')}}" alt></a> </li>
<li class="slide-item"> <a href="#"><img src="{{ URL::asset('assets/images/resource/client-5.png')}}" alt></a> </li>
</ul>
</div>
</div>
</section>

@endsection