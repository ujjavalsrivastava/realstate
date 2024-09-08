@extends('layout.master')

@section('title', 'MIL - Payroll- Bank Master')

@section('styles')

@endsection

@section('content')
<!-- STAR HEADER SEARCH -->
 <section id="hero-area" class="parallax-searchs home15 overlay thome-6 thome-1" data-stellar-background-ratio="0.5">
            <div class="hero-main">
                <div class="container" data-aos="zoom-in">
                <form method="GET" action="{{url('property-for-sale')}}"> 
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-inner">
                                <!-- Welcome Text -->
                                <div class="welcome-text">
                                    <h1 class="h1">Find Your Dream
                                    <br class="d-md-none">
                                    <span class="typed border-bottom"></span>
                                </h1>
                                    <p class="mt-4">We Have Over Million Properties For You.</p>
                                </div>
                                <!--/ End Welcome Text -->
                                <!-- Search Form -->
                                <div class="col-12">
                                    <div class="banner-search-wrap">
                                        <ul class="nav nav-tabs rld-banner-tab">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#tabs_1">For Sale</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tabs_2">For Rent</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="tabs_1">
                                                <div class="rld-main-search">
                                                    <div class="row">
                                                        <div class="rld-single-select ml-22">
                                                            <select class="select single-select select2"name="country" onchange="getstate(this.value)">
                                                                <option value="">Country</option>
                                                                @foreach($getCountries as $country)
                                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <p>
                                         <div class="dropdown faq-drop">
                                            <select class="form-control wide select2" name="state" id="state" onchange="getCity(this.value)">
                                                    <option value="">Select State</option>
                                                   
                                                </select>
                                            </div>
                                        </p>
                                        <p>
                                        <div class="dropdown faq-drop">
                                            <select class="form-control wide select2" name="city" id="city">
                                                    <option value="">Select City</option>
                                                   
                                                </select>
                                            </div>
                                         </p>
                                                       <div class="dropdown-filter"><span>Advanced Search</span></div>
                                                        <div class="col-xl-2 col-lg-2 col-md-4 pl-0">
                                                           
                                                            <button class="btn btn-yellow" type="submit">Search Now</button>
                                                        </div>
                                                        <div class="explore__form-checkbox-list full-filter">
                                                            <div class="row">
                                                                <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0">
                                                                    <!-- Form Property Status -->
                                                                    <div class="form-group categories">

                                                                    <select class="nice-select form-control wide" name="pro_type" >
                                                                            <option value=""> <i class="fa fa-home"></i> Select Type</option>
                                                                            <option value="S">For Sale</option>
                                                                            <option value="R">For Rent</option>
                                                                            
                                                                    </select>

                                                                    
                                                                       
                                                                    </div>
                                                                    <!--/ End Form Property Status -->
                                                                </div>
                                                                <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0 ">
                                                                    <!-- Form Bedrooms -->
                                                                    <div class="form-group beds">
                                                                    <select class="nice-select form-control wide" name="room" >
                                                                            <option value=""> <i class="fa fa-bed" aria-hidden="true"></i> Select Bedrooms</option>
                                                                            <option value="1" class="option">1</option>
                                                                            <option value="2" class="option">2</option>
                                                                            <option value="3" class="option">3</option>
                                                                            <option value="4" class="option">4</option>
                                                                            
                                                                    </select>

                                                                    
                                                                     
                                                                    </div>
                                                                    <!--/ End Form Bedrooms -->
                                                                </div>
                                                                <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0">
                                                                    <!-- Form Bathrooms -->
                                                                    <div class="form-group bath">
                                                                    <select class="nice-select form-control wide" name="room" >
                                                                            <option value=""> <i class="fa fa-bath" aria-hidden="true"></i> Bathrooms</option>
                                                                            <option value="1" class="option">1</option>
                                                                            <option value="2" class="option">2</option>
                                                                            <option value="3" class="option">3</option>
                                                                            <option value="4" class="option">4</option>
                                                                            
                                                                    </select>
                                                                        
                                                                    </div>
                                                                    <!--/ End Form Bathrooms -->
                                                                </div>
                                                                <div class="col-lg-5 col-md-12 col-sm-12 py-1 pr-30 mr-5 sld d-none d-lg-none d-xl-flex">
                                                                    <!-- Price Fields -->
                                                                    <div class="main-search-field-2">
                                                                        <!-- Area Range -->
                                                                        <div class="range-slider">
                                                                            <label>Area Size</label>
                                                                            <div id="area-range" data-min="0" data-max="13000" data-unit="sq ft"></div>
                                                                            <div class="clearfix"></div>
                                                                        </div>
                                                                        <br>
                                                                        <!-- Price Range -->
                                                                        <div class="range-slider">
                                                                            <label>Price Range</label>
                                                                            <div id="price-range" data-min="0" data-max="6000000" data-unit="₹"></div>
                                                                            <div class="clearfix"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-12 py-1 pr-30 d-none d-lg-none d-xl-flex">
                                                                    <!-- Checkboxes -->
                                                                    <div class="checkboxes one-in-row margin-bottom-10 ch-1">
                                                                        <input type="hidden" name="feature" id="feature" >
                                                                        @foreach($featureMaster as $key => $row)
                                                                        <input id="check-{{$key}}" class="checkboxall" type="checkbox" value="{{$row->id}}" onclick="fetureFun()">
                                                                        <label for="check-{{$key}}">{{ucwords($row->feature_name)}}</label>
                                                                        @endforeach
                                                                        <!-- <input id="check-3" type="checkbox" name="check">
                                                                        <label for="check-3">Swimming Pool</label>
                                                                        <input id="check-4" type="checkbox" name="check">
                                                                        <label for="check-4">Central Heating</label>
                                                                        <input id="check-5" type="checkbox" name="check">
                                                                        <label for="check-5">Laundry Room</label>
                                                                        <input id="check-6" type="checkbox" name="check">
                                                                        <label for="check-6">Gym</label>
                                                                        <input id="check-7" type="checkbox" name="check">
                                                                        <label for="check-7">Alarm</label>
                                                                        <input id="check-8" type="checkbox" name="check">
                                                                        <label for="check-8">Window Covering</label> -->
                                                                    </div>
                                                                    <!-- Checkboxes / End -->
                                                                </div>
                                                                <!-- <div class="col-lg-3 col-md-6 col-sm-12 py-1 pr-30 d-none d-lg-none d-xl-flex">
                                                                    
                                                                    <div class="checkboxes one-in-row margin-bottom-10 ch-2">
                                                                        <input id="check-9" type="checkbox" name="check">
                                                                        <label for="check-9">WiFi</label>
                                                                        <input id="check-10" type="checkbox" name="check">
                                                                        <label for="check-10">TV Cable</label>
                                                                        <input id="check-11" type="checkbox" name="check">
                                                                        <label for="check-11">Dryer</label>
                                                                        <input id="check-12" type="checkbox" name="check">
                                                                        <label for="check-12">Microwave</label>
                                                                        <input id="check-13" type="checkbox" name="check">
                                                                        <label for="check-13">Washer</label>
                                                                        <input id="check-14" type="checkbox" name="check">
                                                                        <label for="check-14">Refrigerator</label>
                                                                        <input id="check-15" type="checkbox" name="check">
                                                                        <label for="check-15">Outdoor Shower</label>
                                                                    </div>
                                                                   
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tabs_2">
                                                <div class="rld-main-search">
                                                    <div class="row">
                                                        <div class="rld-single-input">
                                                            <input type="text" placeholder="Enter Keyword...">
                                                        </div>
                                                        <div class="rld-single-select ml-22">
                                                            <select class="select single-select ">
                                                                <option value="1">Property Type</option>
                                                                <option value="2">Family House</option>
                                                                <option value="3">Apartment</option>
                                                                <option value="3">Condo</option>
                                                            </select>
                                                        </div>
                                                        <div class="rld-single-select">
                                                            <select class="select single-select mr-0">
                                                                <option value="1">Location</option>
                                                                <option value="2">Los Angeles</option>
                                                                <option value="3">Chicago</option>
                                                                <option value="3">Philadelphia</option>
                                                                <option value="3">San Francisco</option>
                                                                <option value="3">Miami</option>
                                                                <option value="3">Houston</option>
                                                            </select>
                                                        </div>
                                                        <div class="dropdown-filter"><span>Advanced Search</span></div>
                                                        <div class="col-xl-2 col-lg-2 col-md-4 pl-0">
                                                            
                                                            <button class="btn btn-yellow" type="submit">Search Now</button>
                                                        </div>
                                                        <div class="explore__form-checkbox-list full-filter">
                                                            <div class="row">
                                                                <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0">
                                                                    <!-- Form Property Status -->
                                                                    <div class="form-group categories">
                                                                        <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-home"></i>Property Status</span>
                                                                            <ul class="list">
                                                                                <li data-value="1" class="option selected ">For Sale</li>
                                                                                <li data-value="2" class="option">For Rent</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <!--/ End Form Property Status -->
                                                                </div>
                                                                <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0 ">
                                                                    <!-- Form Bedrooms -->
                                                                    <div class="form-group beds">
                                                                        <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-bed" aria-hidden="true"></i> Bedrooms</span>
                                                                            <ul class="list">
                                                                                <li data-value="1" class="option selected">1</li>
                                                                                <li data-value="2" class="option">2</li>
                                                                                <li data-value="3" class="option">3</li>
                                                                                <li data-value="3" class="option">4</li>
                                                                                <li data-value="3" class="option">5</li>
                                                                                <li data-value="3" class="option">6</li>
                                                                                <li data-value="3" class="option">7</li>
                                                                                <li data-value="3" class="option">8</li>
                                                                                <li data-value="3" class="option">9</li>
                                                                                <li data-value="3" class="option">10</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <!--/ End Form Bedrooms -->
                                                                </div>
                                                                <div class="col-lg-4 col-md-6 py-1 pl-0 pr-0">
                                                                    <!-- Form Bathrooms -->
                                                                    <div class="form-group bath">
                                                                        <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-bath" aria-hidden="true"></i> Bathrooms</span>
                                                                            <ul class="list">
                                                                                <li data-value="1" class="option selected">1</li>
                                                                                <li data-value="2" class="option">2</li>
                                                                                <li data-value="3" class="option">3</li>
                                                                                <li data-value="3" class="option">4</li>
                                                                                <li data-value="3" class="option">5</li>
                                                                                <li data-value="3" class="option">6</li>
                                                                                <li data-value="3" class="option">7</li>
                                                                                <li data-value="3" class="option">8</li>
                                                                                <li data-value="3" class="option">9</li>
                                                                                <li data-value="3" class="option">10</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <!--/ End Form Bathrooms -->
                                                                </div>
                                                                <div class="col-lg-5 col-md-12 col-sm-12 py-1 pr-30 mr-5 sld">
                                                                    <!-- Price Fields -->
                                                                    <div class="main-search-field-2">
                                                                        <!-- Area Range -->
                                                                        <div class="range-slider">
                                                                            <label>Area Size</label>
                                                                            <div id="area-range-rent" data-min="0" data-max="1300" data-unit="sq ft"></div>
                                                                            <div class="clearfix"></div>
                                                                        </div>
                                                                        <br>
                                                                        <!-- Price Range -->
                                                                        <div class="range-slider">
                                                                            <label>Price Range</label>
                                                                            <div id="price-range-rent" data-min="0" data-max="600000" data-unit="$"></div>
                                                                            <div class="clearfix"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-md-6 col-sm-12 py-1 pr-30">
                                                                    <!-- Checkboxes -->
                                                                    <div class="checkboxes one-in-row margin-bottom-10 ch-1">
                                                                        <input id="check-16" type="checkbox" name="check">
                                                                        <label for="check-16">Air Conditioning</label>
                                                                        <input id="check-17" type="checkbox" name="check">
                                                                        <label for="check-17">Swimming Pool</label>
                                                                        <input id="check-18" type="checkbox" name="check">
                                                                        <label for="check-18">Central Heating</label>
                                                                        <input id="check-19" type="checkbox" name="check">
                                                                        <label for="check-19">Laundry Room</label>
                                                                        <input id="check-20" type="checkbox" name="check">
                                                                        <label for="check-20">Gym</label>
                                                                        <input id="check-21" type="checkbox" name="check">
                                                                        <label for="check-21">Alarm</label>
                                                                        <input id="check-22" type="checkbox" name="check">
                                                                        <label for="check-22">Window Covering</label>
                                                                    </div>
                                                                    <!-- Checkboxes / End -->
                                                                </div>
                                                                <div class="col-lg-3 col-md-6 col-sm-12 py-1 pr-30">
                                                                    <!-- Checkboxes -->
                                                                    <div class="checkboxes one-in-row margin-bottom-10 ch-2">
                                                                        <input id="check-23" type="checkbox" name="check">
                                                                        <label for="check-23">WiFi</label>
                                                                        <input id="check-24" type="checkbox" name="check">
                                                                        <label for="check-24">TV Cable</label>
                                                                        <input id="check-25" type="checkbox" name="check">
                                                                        <label for="check-25">Dryer</label>
                                                                        <input id="check-26" type="checkbox" name="check">
                                                                        <label for="check-26">Microwave</label>
                                                                        <input id="check-27" type="checkbox" name="check">
                                                                        <label for="check-27">Washer</label>
                                                                        <input id="check-28" type="checkbox" name="check">
                                                                        <label for="check-28">Refrigerator</label>
                                                                        <input id="check-29" type="checkbox" name="check">
                                                                        <label for="check-29">Outdoor Shower</label>
                                                                    </div>
                                                                    <!-- Checkboxes / End -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                                <!--/ End Search Form -->
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </section>
        <!-- END HEADER SEARCH -->
        
        <!-- START SECTION POPULAR PLACES -->
        <section class="feature-categories bg-white rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Popular </span>Places</h2>
                    <p>Properties In Most Popular Places.</p>
                </div>
                <div class="row">
                    <!-- Single category -->
                     @php
                     $pic = 5;
                     @endphp
                     @foreach($popularPlace as $row)
                    
                    <div class="col-xl-3 col-lg-6 col-sm-6" data-aos="fade-up" data-aos-delay="150">
                        <div class="small-category-2">
                            <div class="small-category-2-thumb img-1">
                                <a href="{{url('property-for-sale')}}?city={{$row->cityId}}"><img src="{{URL::asset('assets/images/popular-places')}}/{{$pic.'.jpg'}}" alt=""></a>
                            </div>
                            <div class="sc-2-detail">
                                <h4 class="sc-jb-title"><a href="{{url('property-for-sale')}}?city={{$row->cityId}}">{{$row->cityname}}</a></h4>
                                <span>{{$row->cntcount}} Properties</span>
                            </div>
                        </div>
                    </div>
                    @php
                     $pic++;
                     @endphp
                    @endforeach
                    <!-- Single category -->
              
                </div>
                <!-- /row -->
            </div>
        </section>
        <!-- END SECTION POPULAR PLACES -->

        <!-- START SECTION FEATURED PROPERTIES -->
        <section class="featured portfolio bg-white-2 rec-pro full-l">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Featured </span>Properties</h2>
                    <p>These are our featured properties</p>
                </div>
                <div class="row portfolio-items post-append">
                
                </div>
                <div class="bg-all">
                    <a href="javascript:void(0)" id="btnLoadMore" onclick="loadmore()" class="btn btn-outline-light">View More</a>
                </div>

        </section>
        <!-- END SECTION FEATURED PROPERTIES -->
		  <!-- START SECTION WHY CHOOSE US -->
		  <section class="how-it-works bg-white rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Why </span>Choose Us</h2>
                    <p>We provide full service at every step.</p>
                </div>
                <div class="row service-1">
                    <article class="col-lg-3 col-md-6 col-xs-12 serv" data-aos="fade-up" data-aos-delay="150">
                        <div class="serv-flex">
                            <div class="art-1 img-13">
                                <img src="{{URL::asset('assets/images/icons/icon-4.svg')}}" alt="">
                                <h3>Wide Renge Of Properties</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.</p>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-3 col-md-6 col-xs-12 serv" data-aos="fade-up" data-aos-delay="250">
                        <div class="serv-flex">
                            <div class="art-1 img-14">
                                <img src="{{URL::asset('assets/images/icons/icon-5.svg')}}" alt="">
                                <h3>Trusted by thousands</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.</p>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-3 col-md-6 col-xs-12 serv mb-0 pt" data-aos="fade-up" data-aos-delay="350">
                        <div class="serv-flex arrow">
                            <div class="art-1 img-15">
                                <img src="{{URL::asset('assets/images/icons/icon-6.svg')}}" alt="">
                                <h3>Financing made easy</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.</p>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-3 col-md-6 col-xs-12 serv mb-0 pt its-2" data-aos="fade-up" data-aos-delay="450">
                        <div class="serv-flex">
                            <div class="art-1 img-14">
                                <img src="{{URL::asset('assets/images/icons/icon-15.svg')}}" alt="">
                                <h3>We are here near you</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <!-- END SECTION WHY CHOOSE US -->        

        <!-- START SECTION RECENTLY PROPERTIES -->
        <section class="featured portfolio rec-pro disc">
            <div class="container-fluid">
                <div class="sec-title discover">
                    <h2><span>Discover </span>Popular Properties</h2>
                    <p>We provide full service at every step.</p>
                </div>
                 <div class="portfolio col-xl-12">
                
                    <div class="slick-lancers">
                        @foreach($getPost as $post)
                        <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                            <div class="landscapes">
                                <div class="project-single">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-1.html" class="homes-img">
                                            @if(count($post->getProFeature)>0)
                                                <div class="homes-tag button alt featured">Featured</div>
                                            @endif
                                                <div class="homes-tag button alt sale">For @if($post->pro_type == 'R') Rant @else Sale @endif</div>
                                                <img src="{{asset('images')}}/{{@$post->getMedia[0]->file_name}}" alt="home-1" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-1.html" class="btn"><i class="fa fa-link"></i></a>
                                            <a href="https://www.youtube.com/watch?v=14semTlwyUY" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            <a href="single-property-2.html" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="{{url('get_property')}}/{{$post->id}}">{{$post->pro_title}}</a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-1.html">
                                                <i class="fa fa-map-marker"></i><span>{{strtoupper($post->address)}}, {{strtoupper(@$post->getCity->city)}}, {{strtoupper(@$post->getState->name)}}, {{strtoupper(@$post->getCountry->name)}}</span>
                                            </a>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix pb-3">
                                            <li class="the-icons">
                                                <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                                <span>{{$post->room}} Bedrooms</span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                                <span>{{$post->bathroom}} Bathrooms</span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                                <span>&#8377;{{$post->area_sq}} sq ft</span>
                                            </li>
                                            <!-- <li class="the-icons">
                                                <i class="flaticon-car mr-2" aria-hidden="true"></i>
                                                <span>2 Garages</span>
                                            </li> -->
                                        </ul>
                                        <div class="price-properties footer pt-3 pb-0">
                                            <h3 class="title mt-3">
                                                <a href="single-property-1.html">&#8377; {{$post->price}}</a>
                                            </h3>
                                            <div class="compare">
                                                <a href="#" title="Compare">
                                                    <i class="flaticon-compare"></i>
                                                </a>
                                                <a href="#" title="Share">
                                                    <i class="flaticon-share"></i>
                                                </a>
                                                @if(Auth()->check())

@php
$fav = @$post->getFavProAuth;
@endphp       

<a href="javascript:void(0)" onclick="addFav('{{$post->id}}')" title="Favorites">
<i @if($fav) style="color:red" @endif id="fav_{{$post->id}}" class="flaticon-heart"></i>
</a>
@else
<a href="javascript:void(0)" onclick="openRegisterLoginModel()" title="Favorites">
    <i class="flaticon-heart"></i></a>
@endif  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    
                </div>
                
            </div>
        </section>
        <!-- END SECTION RECENTLY PROPERTIES -->

        <!-- START SECTION AGENTS -->
        <section class="team bg-white rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Meet Our </span>Agents</h2>
                    <p>Our Agents are here to help you</p>
                </div>
                <div class="row team-all">
                    <!--Team Block-->
                    <div class="team-block col-sm-6 col-md-4 col-lg-4 col-xl-2" data-aos="fade-up" data-aos-delay="150">
                        <div class="inner-box team-details">
                            <div class="image team-head">
                                <a href="agents-listing-grid.html"><img src="{{URL::asset('assets/images/team/t-5.jpg')}}" alt="" /></a>
                                <div class="team-hover">
                                    <ul class="team-social">
                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h3><a href="agents-listing-grid.html">Carls Jhons</a></h3>
                                <div class="designation">Real Estate Agent</div>
                            </div>
                        </div>
                    </div>
                    <!--Team Block-->
                    <div class="team-block col-sm-6 col-md-4 col-lg-4 col-xl-2" data-aos="fade-up" data-aos-delay="250">
                        <div class="inner-box team-details">
                            <div class="image team-head">
                                <a href="agents-listing-grid.html"><img src="{{URL::asset('assets/images/team/t-6.jpg')}}" alt="" /></a>
                                <div class="team-hover">
                                    <ul class="team-social">
                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h3><a href="agents-listing-grid.html">Arling Tracy</a></h3>
                                <div class="designation">Real Estate Agent</div>
                            </div>
                        </div>
                    </div>
                    <!--Team Block-->
                    <div class="team-block col-sm-6 col-md-4 col-lg-4 col-xl-2" data-aos="fade-up" data-aos-delay="350">
                        <div class="inner-box team-details">
                            <div class="image team-head">
                                <a href="agents-listing-grid.html"><img src="{{URL::asset('assets/images/team/t-7.jpg')}}" alt="" /></a>
                                <div class="team-hover">
                                    <ul class="team-social">
                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h3><a href="agents-listing-grid.html">Mark Web</a></h3>
                                <div class="designation">Real Estate Agent</div>
                            </div>
                        </div>
                    </div>
                    <!--Team Block-->
                    <div class="team-block col-sm-6 col-md-4 col-lg-4 col-xl-2 pb-none" data-aos="fade-up" data-aos-delay="450">
                        <div class="inner-box team-details">
                            <div class="image team-head">
                                <a href="agents-listing-grid.html"><img src="{{URL::asset('assets/images/team/t-8.jpg')}}" alt="" /></a>
                                <div class="team-hover">
                                    <ul class="team-social">
                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h3><a href="agents-listing-grid.html">Katy Grace</a></h3>
                                <div class="designation">Real Estate Agent</div>
                            </div>
                        </div>
                    </div>
                    <div class="team-block col-sm-6 col-md-4 col-lg-4 col-xl-2 pb-none" data-aos="fade-up" data-aos-delay="550">
                        <div class="inner-box team-details">
                            <div class="image team-head">
                                <a href="agents-listing-grid.html"><img src="{{URL::asset('assets/images/team/team-image-2.jpg')}}" alt="" /></a>
                                <div class="team-hover">
                                    <ul class="team-social">
                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h3><a href="agents-listing-grid.html">Chris Melo</a></h3>
                                <div class="designation">Real Estate Agent</div>
                            </div>
                        </div>
                    </div>
                    <div class="team-block col-sm-6 col-md-4 col-lg-4 col-xl-2 pb-none" data-aos="fade-up" data-aos-delay="650">
                        <div class="inner-box team-details">
                            <div class="image team-head">
                                <a href="agents-listing-grid.html"><img src="{{URL::asset('assets/images/team/team-image-7.jpg')}}" alt="" /></a>
                                <div class="team-hover">
                                    <ul class="team-social">
                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h3><a href="agents-listing-grid.html">Nina Thomas</a></h3>
                                <div class="designation">Real Estate Agent</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION AGENTS -->

        <!-- START SECTION TESTIMONIALS -->
        <section class="testimonials bg-white-2 rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Clients </span>Testimonials</h2>
                    <p>We collect reviews from our customers.</p>
                </div>
                <div class="owl-carousel job_clientSlide">
                    <div class="singleJobClinet" data-aos="zoom-in" data-aos-delay="150">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna a. Ut enim ad minim veniam,
                        </p>
                        <div class="detailJC">
                            <span><img src="{{URL::asset('assets/images/testimonials/ts-1.jpg')}}" alt=""/></span>
                            <h5>Lisa Smith</h5>
                            <p>New York</p>
                        </div>
                    </div>
                    <div class="singleJobClinet" data-aos="zoom-in" data-aos-delay="250">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna a. Ut enim ad minim veniam,
                        </p>
                        <div class="detailJC">
                            <span><img src="{{URL::asset('assets/images/testimonials/ts-2.jpg')}}" alt=""/></span>
                            <h5>Jhon Morris</h5>
                            <p>Los Angeles</p>
                        </div>
                    </div>
                    <div class="singleJobClinet" data-aos="zoom-in" data-aos-delay="350">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna a. Ut enim ad minim veniam,
                        </p>
                        <div class="detailJC">
                            <span><img src="{{URL::asset('assets/images/testimonials/ts-3.jpg')}}" alt=""/></span>
                            <h5>Mary Deshaw</h5>
                            <p>Chicago</p>
                        </div>
                    </div>
                    <div class="singleJobClinet">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna a. Ut enim ad minim veniam,
                        </p>
                        <div class="detailJC">
                            <span><img src="{{URL::asset('assets/images/testimonials/ts-4.jpg')}}" alt=""/></span>
                            <h5>Gary Steven</h5>
                            <p>Philadelphia</p>
                        </div>
                    </div>
                    <div class="singleJobClinet">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna a. Ut enim ad minim veniam,
                        </p>
                        <div class="detailJC">
                            <span><img src="{{URL::asset('assets/images/testimonials/ts-5.jpg')}}" alt=""/></span>
                            <h5>Cristy Mayer</h5>
                            <p>San Francisco</p>
                        </div>
                    </div>
                    <div class="singleJobClinet">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna a. Ut enim ad minim veniam,
                        </p>
                        <div class="detailJC">
                            <span><img src="{{URL::asset('assets/images/testimonials/ts-6.jpg')}}" alt=""/></span>
                            <h5>Ichiro Tasaka</h5>
                            <p>Houston</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION TESTIMONIALS -->

        <!-- STAR SECTION PARTNERS -->
        <div class="partners bg-white rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Our </span>Partners</h2>
                    <p>The Companies That Represent Us.</p>
                </div>
                <div class="owl-carousel style2">
                    <div class="owl-item" data-aos="fade-up"><img src="{{URL::asset('assets/images/partners/11.jpg')}}" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="{{URL::asset('assets/images/partners/12.jpg')}}" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="{{URL::asset('assets/images/partners/13.jpg')}}" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="{{URL::asset('assets/images/partners/14.jpg')}}" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="{{URL::asset('assets/images/partners/15.jpg')}}" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="{{URL::asset('assets/images/partners/16.jpg')}}" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="{{URL::asset('assets/images/partners/17.jpg')}}" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="{{URL::asset('assets/images/partners/11.jpg')}}" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="{{URL::asset('assets/images/partners/12.jpg')}}" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="{{URL::asset('assets/images/partners/13.jpg')}}" alt=""></div>
                </div>
            </div>
        </div>
        <!-- END SECTION PARTNERS -->

        <!-- share Modal -->
  <div class="modal fade" id="shereModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="btn btn-default close" data-dismiss="modal">&times;</button> -->
         </div>
        <div class="modal-body">
          <p style="text-align:center;">
          <img src="{{url('shareimage/whatsapp.png')}}" alt="" style="height: 60px;">&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <img src="{{url('shareimage/emailshear.png')}}" alt="" style="height: 60px;">&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <img src="{{url('shareimage/facebook.png')}}" alt="" style="height: 60px;">&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <img src="{{url('shareimage/twiter.png')}}" alt="" style="height: 60px;">&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <!-- <input type="text" clase="form-control"> -->
        </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  

@endsection

@section('script')

<script type="text/javascript">

    function openShareModel(){
        $('#shereModal').modal('show');
    }
    function fetureFun(){
        var arr = [];
        $('.checkboxall').each(function(i, obj) {
            if ($(obj).is(':checked')){
               var id = $(obj).val();
               arr.push(id);
            }
      });
      console.log(arr);
    $('#feature').val(arr.join());
    }
        var page = 1;

        loadMoreData(1);

        function loadmore(){
            var page = $('#loadmorepage').val();
            page++;
            $('#loadmorepage').val(page);
            loadMoreData(page);
        }

        function loadMoreData(page) {
            $.ajax({
                url: "{{ url('fatch_post') }}?page=" + page,
                type: "get",
                beforeSend: function() {
                    $('#loadingDiv').show();
                }
            })
            .done(function(data) {
                if (data.length == 0) {
                    $('#loadingDiv').hide(); 
                    $('#btnLoadMore').hide();
                    return;
                }
                $('#loadingDiv').hide();
                $(".post-append").append(data);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                alert('Server not responding...');
            });
        } 
    </script>

	
@endsection
