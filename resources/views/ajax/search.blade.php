@foreach($getPost as $row)

<div class="item col-lg-5 col-md-12 col-xs-12 landscapes sale pr-0 pb-0" style="margin-bottom:20px"> 
                                <div class="project-single mb-0 bb-0" data-aos="fade-up">
                                    <div class="project-inner project-head">
                                        <div class="project-bottom">
                                            <h4><a href="single-property-1.html">View Property</a><span class="category">Real Estate</span></h4>
                                        </div>
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-1.html" class="homes-img">
                                            @if(count($row->getProFeature)>0)
                                                <div class="homes-tag button alt featured">Featured</div>
                                               @endif 
                                                <div class="homes-tag button alt sale">For Sale</div>
                                                <div class="homes-price">Family Home</div>
                                                
                                                <img src="{{asset('images')}}/{{@$row->getMedia[0]->file_name}}" alt="home-1" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-1.html" class="btn"><i class="fa fa-link"></i></a>
                                            <a href="https://www.youtube.com/watch?v=2xHQqYRcrx4" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            <a href="single-property-2.html" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- homes content -->
                            <div class="col-lg-7 col-md-12 homes-content pb-0 mb-44 mt" data-aos="fade-up" style="margin-bottom:20px">
                                <!-- homes address -->
                                <h3><a href="single-property-1.html">{{$row->pro_title}}</a></h3>
                                <p class="homes-address mb-3">
                                    <a href="single-property-1.html">
                                        <i class="fa fa-map-marker"></i><span>{{$row->address}} {{ucwords($row->getCity->city)}} {{ucwords($row->getState->name)}} {{ucwords($row->getCountry->name)}}</span>
                                    </a>
                                </p>
                                <!-- homes List -->
                                <ul class="homes-list clearfix pb-3">
                                    <li class="the-icons">
                                        <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                        <span>6 Bedrooms</span>
                                    </li>
                                    <li class="the-icons">
                                        <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                        <span>3 Bathrooms</span>
                                    </li>
                                    <li class="the-icons">
                                        <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                        <span>720 sq ft</span>
                                    </li>
                                    <li class="the-icons">
                                        <i class="flaticon-car mr-2" aria-hidden="true"></i>
                                        <span>2 Garages</span>
                                    </li>
                                </ul>
                                <!-- Price -->
                                <div class="price-properties">
                                    <h3 class="title mt-3">
                                <a href="single-property-1.html">&#8377; {{$row->price}}</a>
                                </h3>
                                    <div class="compare">
                                        <a href="#" title="Compare">
                                            <i class="fas fa-exchange-alt"></i>
                                        </a>
                                        <a href="#" title="Share">
                                            <i class="fas fa-share-alt"></i>
                                        </a>
                                        <a href="#" title="Favorites">
                                            <i class="fa fa-heart-o"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

<br/><br/>
@endforeach