@extends('layout.back_master')

@section('title', 'Property')

@section('styles')
	
@endsection

@section('content')
 <!-- START SECTION PROPERTIES LISTING -->
 <section class="single-proper blog details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 blog-pots">
                        <div class="row">
                            <div class="col-md-12">
                                <section class="headings-2 pt-0">
                                    <div class="pro-wrapper">
                                        <div class="detail-wrapper-body">
                                            <div class="listing-title-bar">
                                                <h3>{{$pro->pro_title}} <span class="mrg-l-5 category-tag">For @if($pro->pro_type == 'R') Rant @else Sale @endif</span></h3>
                                                <div class="mt-0">
                                                    <a href="#listing-location" class="listing-address">
                                                        <i class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i>{{strtoupper($pro->address)}}, {{strtoupper($pro->getCity->city)}}, {{strtoupper($pro->getState->name)}}, {{strtoupper($pro->getCountry->name)}}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single detail-wrapper mr-2">
                                            <div class="detail-wrapper-body">
                                                <div class="listing-title-bar">
                                                    <h4>&#8377;{{$pro->price}}</h4>
                                                    <div class="mt-0">
                                                        <a href="#listing-location" class="listing-address">
                                                            <p>&#8377; {{$pro->area_sq}}/ sq ft</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- main slider carousel items -->         
                                @if(count($images)>0)
                                <div id="listingDetailsSlider" class="carousel listing-details-sliders slide mb-30">
                                    <h5 class="mb-4">Gallery</h5>
                                    <div class="carousel-inner">
                                        <div class="active item carousel-item" data-slide-number="0">
                                            <img src="{{asset('images')}}/{{@$pro->getMedia[0]->file_name}}" class="img-fluid" alt="slider-listing">
                                        </div>
                                        @foreach($images as $image)
                                            <div class="item carousel-item" data-slide-number="1">
                                                <img src="{{asset('images')}}/{{@$image->file_name}}" class="img-fluid" alt="slider-listing">
                                            </div>
                                        @endforeach
                                        <a class="carousel-control left" href="#listingDetailsSlider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                                        <a class="carousel-control right" href="#listingDetailsSlider" data-slide="next"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                    <!-- main slider carousel nav controls -->
                                    <ul class="carousel-indicators smail-listing list-inline">
                                    @foreach($images as $image)
                                        <li class="list-inline-item active">
                                            <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#listingDetailsSlider">
                                               <img src="{{asset('images')}}/{{@$image->file_name}}" class="img-fluid" alt="listing-small">
                                            </a>
                                        </li>
                                    @endforeach
                                    </ul>
                                    <!-- main slider carousel items -->
                                </div>
                                @endif
                                <div class="blog-info details mb-30">
                                    <h5 class="mb-4">Description</h5>
                                    <p class="mb-3">{{$pro->pro_description}}</p>
                                  </div>
                            </div>
                        </div>
                        <div class="single homes-content details mb-30">
                            <!-- title -->
                            <h5 class="mb-4">Property Details</h5>
                            <ul class="homes-list clearfix">
                                <li>
                                    <span class="font-weight-bold mr-1">Property ID:</span>
                                    <span class="det">{{$pro->id}}</span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Property Type:</span>
                                    <span class="det">{{ucfirst($pro->res_com_detail)}}</span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Property status:</span>
                                    <span class="det">For @if($pro->pro_type == 'R') Rant @else Sale @endif</span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Property Price:</span>
                                    <span class="det">&#8377; {{$pro->price}}</span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Rooms:</span>
                                    <span class="det">{{$pro->room}}</span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Bath:</span>
                                    <span class="det">{{$pro->bathroom}}</span>
                                </li>
                            </ul>
                            <!-- title -->
                            <h5 class="mt-5">Amenities</h5>
                            <!-- cars List -->
                            <ul class="homes-list clearfix">
                                @foreach($features as $feature)
                                <li>
                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                    <span>{{ucfirst($feature->getProFeatureMaster->feature_name)}}</span>
                                </li>
                               @endforeach
                            </ul>
                        </div>
                        <div class="floor-plan property wprt-image-video w50 pro">
                            <h5>Floor Plans</h5>
                            <img alt="image" src="{{URL::asset('assets/images/bg/floor-plan-1.png')}}">
                        </div>
                        <div class="floor-plan property wprt-image-video w50 pro">
                            <h5>What's Nearby</h5>
                            <div class="property-nearby">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="nearby-info mb-4">
                                            <span class="nearby-title mb-3 d-block text-info">
                                               <i class="fas fa-graduation-cap mr-2"></i><b class="title">Education</b>
                                            </span>
                                            <div class="nearby-list">
                                                <ul class="property-list list-unstyled mb-0">
                                                    <li class="d-flex">
                                                        <h6 class="mb-3 mr-2">Education Mandarin</h6>
                                                        <span>(15.61 miles)</span>
                                                        <ul class="list-unstyled list-inline ml-auto">
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star-half fa-xs"></i></li>
                                                        </ul>
                                                    </li>
                                                    <li class="d-flex">
                                                        <h6 class="mb-3 mr-2">Marry's Education</h6>
                                                        <span>(15.23 miles)</span>
                                                        <ul class="list-unstyled list-inline ml-auto">
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star-half fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="far fa-star fa-xs"></i></li>
                                                        </ul>
                                                    </li>
                                                    <li class="d-flex">
                                                        <h6 class="mb-3 mr-2">The Kaplan</h6>
                                                        <span>(15.16 miles)</span>
                                                        <ul class="list-unstyled list-inline ml-auto">
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star-half fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="far fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="far fa-star fa-xs"></i></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="nearby-info mb-4">
                                            <span class="nearby-title mb-3 d-block text-success">
                                              <i class="fas fa-user-md mr-2"></i><b class="title">Health & Medical</b>
                                            </span>
                                            <div class="nearby-list">
                                                <ul class="property-list list-unstyled mb-0">
                                                    <li class="d-flex">
                                                        <h6 class="mb-3 mr-2">Natural Market</h6>
                                                        <span>(13.20 miles)</span>
                                                        <ul class="list-unstyled list-inline ml-auto">
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star-half fa-xs"></i></li>
                                                        </ul>
                                                    </li>
                                                    <li class="d-flex">
                                                        <h6 class="mb-3 mr-2">Food For Health</h6>
                                                        <span>(13.22 miles)</span>
                                                        <ul class="list-unstyled list-inline ml-auto">
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star-half fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="far fa-star fa-xs"></i></li>
                                                        </ul>
                                                    </li>
                                                    <li class="d-flex">
                                                        <h6 class="mb-3 mr-2">A Matter of Health</h6>
                                                        <span>(13.34 miles)</span>
                                                        <ul class="list-unstyled list-inline ml-auto">
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star-half fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="far fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="far fa-star fa-xs"></i></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="nearby-info">
                                            <span class="nearby-title mb-3 d-block text-danger">
                                                <i class="fas fa-car mr-2"></i><b class="title">Transportation</b>
                                            </span>
                                            <div class="nearby-list">
                                                <ul class="property-list list-unstyled mb-0">
                                                    <li class="d-flex">
                                                        <h6 class="mb-3 mr-2">Airport Transportation</h6>
                                                        <span>(11.36 miles)</span>
                                                        <ul class="list-unstyled list-inline ml-auto">
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star-half fa-xs"></i></li>
                                                        </ul>
                                                    </li>
                                                    <li class="d-flex">
                                                        <h6 class="mb-3 mr-2">NYC Executive Limo</h6>
                                                        <span>(11.87 miles)</span>
                                                        <ul class="list-unstyled list-inline ml-auto">
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star-half fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="far fa-star fa-xs"></i></li>
                                                        </ul>
                                                    </li>
                                                    <li class="d-flex">
                                                        <h6 class="mb-3 mr-2">Empire Limousine</h6>
                                                        <span>(11.52 miles)</span>
                                                        <ul class="list-unstyled list-inline ml-auto">
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="fas fa-star-half fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="far fa-star fa-xs"></i></li>
                                                            <li class="list-inline-item m-0 text-warning"><i class="far fa-star fa-xs"></i></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(!empty($pro->video))
                        <div class="property wprt-image-video w50 pro">
                            <h5>Property Video</h5>
                            <video controls style="width: 684px;">
                            <source src="{{$pro->video}}" type="video/mp4" center>
                            Your browser does not support the video tag.
                            </video>
                            <!-- <a class="icon-wrap popup-video popup-youtube" href="{{$pro->video}}"> -->
                                <!-- <i class="fa fa-play"></i> -->
                            <!-- </a> -->
                        </div>
                        @endif
                        <div class="property-location map">
                            <h5>Location</h5>
                            <div class="divider-fade"></div>
                            <div id="map-contact" class="contact-map"></div>
                        </div>
                        <!-- Star Reviews -->
                        <section class="reviews comments list">

                        </section>
                        <!-- End Reviews -->
                        <!-- Star Add Review -->
                        <section class="single reviews leve-comments details">
                        <form id="addForm"  method="post" enctype='multipart/form-data'>
                            @csrf
                            <input type="hidden" name="pro_des_id" id="pro_des_id" value="{{$pro->id}}" class="form-control" >
                            <div id="add-review" class="add-review-box">
                                <!-- Add Review -->
                                <h3 class="listing-desc-headline margin-bottom-20 mb-4">Add Review</h3>
                                <span class="leave-rating-title">Your rating for this listing</span>
                                <!-- Rating / Upload Button -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <!-- Leave Rating -->
                                        <div class="clearfix"></div>
                                        <div class="leave-rating margin-bottom-30">
                                            <input type="radio" name="reating" id="rating-1" value="5" />
                                            <label for="rating-1" class="fa fa-star"></label>
                                            <input type="radio" name="reating" id="rating-2" value="4" />
                                            <label for="rating-2" class="fa fa-star"></label>
                                            <input type="radio" name="reating" id="rating-3" value="3" />
                                            <label for="rating-3" class="fa fa-star"></label>
                                            <input type="radio" name="reating" id="rating-4" value="2" />
                                            <label for="rating-4" class="fa fa-star"></label>
                                            <input type="radio" name="reating" id="rating-5" value="1" />
                                            <label for="rating-5" class="fa fa-star"></label>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Uplaod Photos -->
                                        <div class="add-review-photos margin-bottom-30">
                                            <div class="photoUpload">
                                                <span><i class="sl sl-icon-arrow-up-circle"></i> Upload Photos</span>
                                                <input type="file" name="images[]" class="upload" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 data">
                                        <form action="#">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" >
                                                </div>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <textarea class="form-control" id="exampleTextarea" name="review" id="review" rows="8" placeholder="Review" ></textarea>
                                            </div>
                                            <button type="submit" id="review-sub" class="btn btn-primary btn-lg mt-2">Submit Review</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </section>
                        <!-- End Add Review -->
                    </div>
                    <aside class="col-lg-4 col-md-12 car">
                        <div class="single widget">
                            <!-- Start: Schedule a Tour -->
                            <div class="schedule widget-boxed mt-33 mt-0">
                                <div class="widget-boxed-header">
                                    <h4><i class="fa fa-calendar pr-3 padd-r-10"></i>Schedule a Tour</h4>
                                </div>
                                <div class="widget-boxed-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 book">
                                            <input type="text" id="reservation-date" data-lang="en" data-large-mode="true" data-min-year="2017" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="">
                                        </div>
                                        <div class="col-lg-6 col-md-12 book2">
                                            <input type="text" id="reservation-time" class="form-control" readonly="">
                                        </div>
                                    </div>
                                    <div class="row mrg-top-15 mb-3">
                                        <div class="col-lg-6 col-md-12 mt-4">
                                            <label class="mb-4">Adult</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
										 <button type="button" class="btn counter-btn theme-cl btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
											 <i class="fa fa-minus"></i>
										 </button>
									        </span>
                                                <input type="text" name="quant[1]" class="border-0 text-center form-control input-number" data-min="0" data-max="10" value="0">
                                                <span class="input-group-btn">
											 <button type="button" class="btn counter-btn theme-cl btn-number" data-type="plus" data-field="quant[1]">
											  <i class="fa fa-plus"></i>
											 </button>
									        </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 mt-4">
                                            <label class="mb-4">Children</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
										 <button type="button" class="btn counter-btn theme-cl btn-number" disabled="disabled" data-type="minus" data-field="quant[2]">
											 <i class="fa fa-minus"></i>
										 </button>
									        </span>
                                                <input type="text" name="quant[2]" class="border-0 text-center form-control input-number" data-min="0" data-max="10" value="0">
                                                <span class="input-group-btn">
											 <button type="button" class="btn counter-btn theme-cl btn-number" data-type="plus" data-field="quant[2]">
											  <i class="fa fa-plus"></i>
											 </button>
									        </span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="payment-method.html" class="btn reservation btn-radius theme-btn full-width mrg-top-10">Submit Request</a>
                                </div>
                            </div>
                            <!-- End: Schedule a Tour -->
                            <!-- end author-verified-badge -->
                            <div class="sidebar">
                                <div class="widget-boxed mt-33 mt-5">
                                    <div class="widget-boxed-header">
                                        <h4>Agent Information</h4>
                                    </div>

                                    <div class="widget-boxed-body">
                                        <div class="sidebar-widget author-widget2">
                                            <div class="author-box clearfix">
                                                <img src="{{URL::asset('assets/images/user.jpg')}}" alt="author-image" class="author__img">
                                                <h4 class="author__title">{{ucfirst($pro->name)}}</h4>
                                                <p class="author__meta">Agent of Property</p>
                                            </div>
                                            <ul class="author__contact">
                                                <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="#">{{$pro->phone}}</a></li>
                                                <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="#">{{$pro->email}}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-search-field-2">
                                    <div class="widget-boxed mt-5">
                                        <div class="widget-boxed-header">
                                            <h4>Latest Properties</h4>
                                        </div>
                                        <div class="widget-boxed-body">
                                            <div class="recent-post">
                                                @foreach($letistPro as $latist)
                                                <div class="recent-main my-4">
                                                    <div class="recent-img">
                                                        <a href="{{url('get_property')}}/{{$latist->id}}"><img src="{{asset('images')}}/{{@$latist->getMedia[0]->file_name}}" alt=""></a>
                                                    </div>
                                                    <div class="info-img">
                                                        <a href="{{url('get_property')}}/{{$latist->id}}"><h6>{{ucfirst($latist->pro_title)}}</h6></a>
                                                        <p>&#8377; {{$latist->price}}</p>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-boxed mt-5">
                                        <div class="widget-boxed-header mb-5">
                                            <h4>Feature Properties</h4>
                                        </div>
                                        
                                        <div class="widget-boxed-body">
                                            <div class="slick-lancers">
                                            @foreach($saidFeatures as $saidFeature)
                                                <div class="agents-grid mr-0">
                                                    <div class="listing-item compact">
                                                        <a href="properties-details.html" class="listing-img-container">
                                                            <div class="listing-badges">
                                                                <span class="featured">&#8377; {{@$saidFeature->price}}</span>
                                                                <span>For @if($saidFeature->pro_type == 'R') Rent @else Sale @endif</span>
                                                            </div>
                                                            <div class="listing-img-content">
                                                                <span class="listing-compact-title">{{ucfirst(@$saidFeature->pro_title)}} <i>{{@$saidFeature->getCountry->name}}</i></span>
                                                                <ul class="listing-hidden-content">
                                                                    <li>Area <span>&#8377; {{@$saidFeature->area_sq}} sq ft</span></li>
                                                                    @if(!empty($saidFeature->room))
                                                                    <li>Rooms <span>{{$saidFeature->room}}</span></li>
                                                                    @endif
                                                                    <!-- <li>Beds <span>2</span></li> -->
                                                                     @if(!empty($saidFeature->bathroom))
                                                                    <li>Baths <span>{{@$saidFeature->bathroom}}</span></li>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                            <img src="{{asset('images')}}/{{@$saidFeature->getMedia[0]->file_name}}" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Start: Specials offer -->
                                    <div class="widget-boxed popular mt-5">
                                        <div class="widget-boxed-header">
                                            <h4>Specials of the day</h4>
                                        </div>
                                        <div class="widget-boxed-body">
                                            <div class="banner"><img src="{{URL::asset('assets/images/single-property/banner.jpg')}}" alt=""></div>
                                        </div>
                                    </div>
                                    <!-- End: Specials offer -->
                                    <div class="widget-boxed popular mt-5">
                                        <div class="widget-boxed-header">
                                            <h4>Popular Tags</h4>
                                        </div>
                                        <div class="widget-boxed-body">
                                            <div class="recent-post">
                                                <div class="tags">
                                                    <span><a href="#" class="btn btn-outline-primary">Houses</a></span>
                                                    <span><a href="#" class="btn btn-outline-primary">Real Home</a></span>
                                                </div>
                                                <div class="tags">
                                                    <span><a href="#" class="btn btn-outline-primary">Baths</a></span>
                                                    <span><a href="#" class="btn btn-outline-primary">Beds</a></span>
                                                </div>
                                                <div class="tags">
                                                    <span><a href="#" class="btn btn-outline-primary">Garages</a></span>
                                                    <span><a href="#" class="btn btn-outline-primary">Family</a></span>
                                                </div>
                                                <div class="tags">
                                                    <span><a href="#" class="btn btn-outline-primary">Real Estates</a></span>
                                                    <span><a href="#" class="btn btn-outline-primary">Properties</a></span>
                                                </div>
                                                <div class="tags no-mb">
                                                    <span><a href="#" class="btn btn-outline-primary">Location</a></span>
                                                    <span><a href="#" class="btn btn-outline-primary">Price</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <!-- START SIMILAR PROPERTIES -->
                <section class="similar-property featured portfolio p-0 bg-white-inner">
                    <div class="container">
                        <h5>Similar Properties</h5>
                        <div class="row portfolio-items">
                            @foreach($similarPro as $similar)
                                <div class="item col-lg-4 col-md-6 col-xs-12 landscapes">
                                    <div class="project-single">
                                        <div class="project-inner project-head">
                                            <div class="homes">
                                                <!-- homes img -->
                                                <a href="single-property-1.html" class="homes-img">
                                                @if(count($similar->getProFeature)>0)
                                                    <div class="homes-tag button alt featured">Featured</div>
                                                @endif
                                                    <div class="homes-tag button alt sale">For @if($similar->pro_type == 'R') Rant @else Sale @endif</div>
                                                    <div class="homes-price">&#8377; {{$similar->price}}</div>
                                                    <img src="{{asset('images')}}/{{@$similar->getMedia[0]->file_name}}" alt="home-1" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="button-effect">
                                                <a href="{{url('get_property')}}/{{$similar->id}}" class="btn"><i class="fa fa-link"></i></a>
                                                <a href="https://www.youtube.com/watch?v=14semTlwyUY" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                                <a href="single-property-2.html" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                            </div>
                                        </div>
                                        <!-- homes content -->
                                        <div class="homes-content">
                                            <!-- homes address -->
                                            <h3><a href="{{url('get_property')}}/{{$similar->id}}">{{ucfirst($similar->pro_title)}}</a></h3>
                                            <p class="homes-address mb-3">
                                                <a href="{{url('get_property')}}/{{$similar->id}}">
                                                    <i class="fa fa-map-marker"></i><span>{{strtoupper($similar->address)}}, {{strtoupper(@$similar->getCity->city)}}, {{strtoupper(@$similar->getState->name)}}, {{strtoupper(@$similar->getCountry->name)}}</span>
                                                </a>
                                            </p>
                                            <!-- homes List -->
                                            <ul class="homes-list clearfix pb-3">
                                                <li class="the-icons">
                                                    <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                                    <span>{{$similar->room}} Bedrooms</span>
                                                </li>
                                                <li class="the-icons">
                                                    <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                                    <span>{{$similar->bathroom}} Bathrooms</span>
                                                </li>
                                                <li class="the-icons">
                                                    <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                                    <span>&#8377;{{$similar->area_sq}} sq ft</span>
                                                </li>
                                                <!-- <li class="the-icons">
                                                    <i class="flaticon-car mr-2" aria-hidden="true"></i>
                                                    <span>2 Garages</span>
                                                </li> -->
                                            </ul>
                                            <div class="footer">
                                                <a href="agent-details.html">
                                                    <img src="{{URL::asset('assets/images/user.jpg')}}" alt="" class="mr-2">{{ucfirst(@$similar->getUser[0]->name)}}
                                                </a>
                                                <span>{{timeDifference(@$similar->created_at) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                <!-- END SIMILAR PROPERTIES -->
            </div>
</section>
        <!-- END SECTION PROPERTIES LISTING -->

        @endsection

@section('script')
<script>
 $(document).ready(function() {
       $('#addForm').on('submit', function(event) {
        event.preventDefault(); 
              $('#review-sub').text('Processing....')
              var reviewform = $('#addForm')[0];
                var formData = new FormData(reviewform);
           $.ajax({
               url: "{{ url('/post-review') }}",
               method: "POST",
               data: formData,
               processData: false,
               contentType: false,
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               success: function(response) {
                $('#successNotification').show();
                $('#successMessage').text(response.success);
                window.scrollTo({ top: 0, behavior: 'smooth' });
                   List('{{$pro->id}}');
                   $('#addForm')[0].reset();       
               },
               error: function (response) {
                $('#errorNotification').show();
                $('#errorMessage').text(response.responseJSON.errors);
                window.scrollTo({ top: 0, behavior: 'smooth' });
            },
           });
       });
   });

   function List(id){
            $.ajax({
                url: "/show-review-list/"+id,
                type: 'Get',
                success: function(response) {
                   $('.list').html(response)
                },
                error: function(response) {
                    alert('An error occurred while deleting the item.');
                }
            });
        }
        List('{{$pro->id}}');
</script>
	
@endsection
