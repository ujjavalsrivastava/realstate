@foreach($getPost as $post)
<div class="item col-xl-6 col-lg-12 col-md-12 col-xs-12 landscapes sale">
                        <div class="project-single" >
                            <div class="project-inner project-head">
                                <div class="homes">
                                    <!-- homes img -->
                                   <a href="#" class="homes-img">
                                    @if(count($post->getProFeature)>0)
                                        <div class="homes-tag button alt featured">Featured</div>
                                    @endif
                                        <div class="homes-tag button alt sale">For @if($post->pro_type == 'R') Rant @else Sale @endif</div>
                                        <img src="{{asset('images')}}/{{@$post->getMedia[0]->file_name}}" alt="home-1" class="img-responsive">
                                    </a>
                                </div>
                                <div class="button-effect">
                                    <a href="#" class="btn"><i class="fa fa-link"></i></a>
                                    <a href="https://www.youtube.com/watch?v=14semTlwyUY" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                    <a href="#" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                </div>
                            </div>
                            <!-- homes content -->
                            <div class="homes-content">
                                <!-- homes address -->
                                <h3><a href="{{url('get_property')}}/{{$post->id}}">{{ucfirst($post->pro_title)}}</a></h3>
                                <p class="homes-address mb-3">
                                    <a href="#">
                                        <i class="fa fa-map-marker"></i><span style="font-size:12px">{{strtoupper($post->address)}}, {{strtoupper(@$post->getCity->city)}}, {{strtoupper(@$post->getState->name)}}, {{strtoupper(@$post->getCountry->name)}}</span>
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
                                </ul>
                                <div class="price-properties footer pt-3 pb-0">
                                    <h3 class="title mt-3">
                                     <a href="#">&#8377; {{$post->price}}</a>
                                    </h3>
                                    <div class="compare">
                                        <a href="#" title="Compare">
                                            <i class="flaticon-compare"></i>
                                        </a>
                                        <a href="#" title="Share" onclick="openShareModel()">
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
 @endforeach