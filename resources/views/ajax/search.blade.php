@foreach($getPost as $row)
<div class="item col-lg-5 col-md-12 col-xs-12 landscapes sale pr-0 pb-0" style="margin-bottom:20px">
   <div class="project-single mb-0 bb-0" data-aos="fade-up">
      <div class="project-inner project-head">
         <div class="project-bottom">
            <h4><a href="#">View Property</a><span class="category">Real Estate</span></h4>
         </div>
         <div class="homes">
            <!-- homes img -->
            <a href="#" class="homes-img">
               @if(count($row->getProFeature)>0)
               <div class="homes-tag button alt featured">Featured</div>
               @endif 
               <div class="homes-tag button alt sale">For Sale</div>
               <div class="homes-price">Family Home</div>
               <img src="{{asset('images')}}/{{@$row->getMedia[0]->file_name}}" alt="home-1" class="img-responsive">
            </a>
         </div>
         <div class="button-effect">
            <a href="#" class="btn"><i class="fa fa-link"></i></a>
            <a href="https://www.youtube.com/watch?v=2xHQqYRcrx4" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
            <a href="#" class="img-poppu btn"><i class="fa fa-photo"></i></a>
         </div>
      </div>
   </div>
</div>
<!-- homes content -->
<div class="col-lg-7 col-md-12 homes-content pb-0 mb-44 mt" data-aos="fade-up" style="margin-bottom:20px">
   <!-- homes address -->
    @php

    $slug = str_replace(' ','-',strtolower($row->pro_title));

    @endphp
   <h3><a href="{{url('get_property')}}/{{$slug}}?id={{$row->id}}">{{ucfirst($row->pro_title)}}</a></h3>
   <input type="hidden" id="share_{{$row->id}}" value="{{url('get_property')}}/{{$slug}}?id={{$row->id}}">
   <p class="homes-address mb-3">
      <a href="#">
      <i class="fa fa-map-marker"></i><span>{{$row->address}} {{ucwords($row->getCity->city)}} {{ucwords($row->getState->name)}} {{ucwords($row->getCountry->name)}}</span>
      </a>
   </p>
   <!-- homes List -->
   <ul class="homes-list clearfix pb-3">
      <li class="the-icons">
         <i class="flaticon-bed mr-2" aria-hidden="true"></i>
         <span>{{$row->room}} Bedrooms</span>
      </li>
      <li class="the-icons">
         <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
         <span>{{$row->bathroom}} Bathrooms</span>
      </li>
      <li class="the-icons">
         <i class="flaticon-square mr-2" aria-hidden="true"></i>
         <span>&#8377;{{$row->area_sq}} sq ft</span>
      </li>
      <!-- <li class="the-icons">
         <i class="flaticon-car mr-2" aria-hidden="true"></i>
         <span>2 Garages</span>
         </li> -->
   </ul>
   <!-- Price -->
   <div class="price-properties">
      <h3 class="title mt-3">
         <a href="#">&#8377; {{$row->price}}</a>
      </h3>
      <div class="compare">

            @if($row->getUser->user_verified)
              
              <i class="fa fa-check-circle" title="Verified Property" style="color:#5ab2ff;font-size: 25px;margin-right: 20px;" aria-hidden="true"></i>
             
              @endif
         
         <a href="#" title="Share" onclick="openShareModel('{{$row->id}}')">
         <i class="fa fa-share-alt"   aria-hidden="true"></i>
         </a>
         @if(Auth()->check())
         @php
         $fav = @$row->getFavProAuth;
         @endphp       
         <a href="javascript:void(0)" onclick="addFav('{{$row->id}}')" title="Favorites">
         <i @if($fav) style="color:red" @endif id="fav_{{$row->id}}" class="flaticon-heart"></i>
         </a>
         @else
         <a href="javascript:void(0)" onclick="openRegisterLoginModel()" title="Favorites">
         <i class="flaticon-heart"></i></a>
         @endif  
      </div>
   </div>
</div>
<br/><br/>
@endforeach