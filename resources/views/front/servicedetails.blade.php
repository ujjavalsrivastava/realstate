@extends('layout.master')

@section('title', 'Service Details')

@section('styles')
	
@endsection

@section('content')
<section class="page-title" style="background-image: url({{ URL::asset('assets/images/background/page-title.jpg')}})">
<div class="auto-container">
<div class="title-outer">
<h1 class="title">Service Details</h1>
<ul class="page-breadcrumb">
<li><a href="index.html">Home</a></li>
<li><a href="#">Pages</a></li>
<li>Services</li>
</ul>
</div>
</div>
</section>


<section class="services-details">
<div class="container">
<div class="row">

<div class="col-xl-4 col-lg-4">
<div class="service-sidebar">

<div class="sidebar-widget service-sidebar-single">
<div class="service-sidebar wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1200m">
<div class="service-list">
<ul>
<li><a href="page-service-details.html" class="current"><i class="fas fa-angle-right"></i><span>Digital Marketing</span></a></li>
<li><a href="page-service-details.html"><i class="fas fa-angle-right"></i><span>UI/UX Designing</span></a></li>
<li><a href="page-service-details.html"><i class="fas fa-angle-right"></i><span>Product Development</span></a></li>
<li><a href="page-service-details.html"><i class="fas fa-angle-right"></i><span>Data Analysis</span></a></li>
<li><a href="page-service-details.html"><i class="fas fa-angle-right"></i><span>Security System</span></a></li>
<li><a href="page-service-details.html"><i class="fas fa-angle-right"></i><span>Data Visualization</span></a></li>
</ul>
</div>
</div>
</div>

<div class="sidebar-widget banner-widget">
<div class="widget-content" style="background-image: url(images/resource/contact.jpg);">
<div class="shape" style="background-image: url(images/resource/overlay-shape.png);"></div>
<div class="content-box">
<div class="icon-box">
<i class="lnr lnr-icon-pie-chart"></i>
</div>
<h3>Be healthy & eat only fresh</h3>
<a href="page-contact.html" class="theme-btn btn-style-two bg-light"><span class="btn-title text-black"> Contact us</span></a>
</div>
</div>
</div>

<div class="sidebar-widget service-sidebar-single mt-5">
<div class="service-sidebar-single-btn wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1200m">
<a href="#" class="theme-btn btn-style-one d-grid"><span class="btn-title"><span class="fas fa-file-pdf"></span> download pdf file</span></a>
</div>
</div>

</div>
</div>


<div class="col-xl-8 col-lg-8">
<div class="services-details__content">
<img src="images/resource/service-details.jpg" alt />
<h2 class="mt-4">Service Overview</h2>
<p>{{$details->contents}}</p>
<!-- <p>When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p> -->
<div class="content mt-40">
<div class="text">
<h3>Service Center</h3>
<p>Lorem ipsum is simply free text used by copytyping refreshing. Neque porro est qui dolorem ipsum quia quaed inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
</div>
<div class="feature-list">
<div class="row clearfix">
<div class="col-lg-6 col-md-6 col-sm-12 column">
<div class="single-item">
<div class="icon-box"><i class="fas fa-check-circle"></i></div>
<h6 class="title">Fast home delivery</h6>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 column">
<div class="single-item">
<div class="icon-box"><i class="fas fa-check-circle"></i></div>
<h6 class="title">Secure Payments</h6>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 column">
<div class="single-item">
<div class="icon-box"><i class="fas fa-check-circle"></i></div>
<h6 class="title">Delivering best products</h6>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 column">
<div class="single-item">
<div class="icon-box"><i class="fas fa-check-circle"></i></div>
<h6 class="title">Food Inspections</h6>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 column">
<div class="single-item">
<div class="icon-box"><i class="fas fa-check-circle"></i></div>
<h6 class="title">Generator Systems</h6>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 column">
<div class="single-item">
<div class="icon-box"><i class="fas fa-check-circle"></i></div>
<h6 class="title">Assessments</h6>
</div>
</div>
</div>
</div>
</div>
<div class=" mt-25">
<h3>Frequently Asked Question</h3>
<p>Lorem ipsum is simply free text used by copytyping refreshing. Neque porro est qui dolorem ipsum quia quaed inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
<ul class="accordion-box wow fadeInRight">

<li class="accordion block">
<div class="acc-btn">Is my technology allowed on tech?
<div class="icon fa fa-plus"></div>
</div>
<div class="acc-content">
<div class="content">
<div class="text">There are many variations of passages the majority have suffered alteration in some fo injected humour, or randomised words believable.</div>
</div>
</div>
</li>

<li class="accordion block active-block">
<div class="acc-btn active">How to soft launch your business?
<div class="icon fa fa-plus"></div>
</div>
<div class="acc-content current">
<div class="content">
<div class="text">There are many variations of passages the majority have suffered alteration in some fo injected humour, or randomised words believable.</div>
</div>
</div>
</li>

<li class="accordion block">
<div class="acc-btn">How to turn visitors into contributors
<div class="icon fa fa-plus"></div>
</div>
<div class="acc-content">
<div class="content">
<div class="text">There are many variations of passages the majority have suffered alteration in some fo injected humour, or randomised words believable.</div>
</div>
</div>
</li>

<li class="accordion block">
<div class="acc-btn">How can i find my solutions?
<div class="icon fa fa-plus"></div>
</div>
<div class="acc-content">
<div class="content">
<div class="text">There are many variations of passages the majority have suffered alteration in some fo injected humour, or randomised words believable.</div>
</div>
</div>
</li>
</ul>
</div>
</div>
</div>

</div>
</div>
</section>
@endsection