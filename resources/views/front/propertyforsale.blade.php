@extends('layout.postDetatilsMaster')
@section('title', 'Property')
@section('styles')
<style>
   .mt{
   margin-bottom:20px;
   }
</style>
@endsection
@section('content')
<!-- START SECTION PROPERTIES LISTING -->
<section class="properties-right list featured portfolio blog pt-5">
   <div class="container">
   <!-- <section class="headings-2 pt-0 pb-55">
      <div class="pro-wrapper">
          <div class="detail-wrapper-body">
              <div class="listing-title-bar">
                  <div class="text-heading text-left">
                      <p class="pb-2"><a href="index.html">Home </a> &nbsp;/&nbsp; <span>Listings</span></p>
                  </div>
                  <h3>Grid View</h3>
              </div>
          </div>
      </div>
      </section> -->
   <div class="row">
      <div class="col-lg-8 col-md-12 blog-pots">
         <section class="headings-2 pt-0">
            <div class="pro-wrapper">
               <div class="detail-wrapper-body">
                  <div class="listing-title-bar">
                     <div class="text-heading text-left">
                        <p class="font-weight-bold mb-0 mt-3">{{$getPostcount}} Search results</p>
                     </div>
                  </div>
               </div>
               <div class="cod-pad single detail-wrapper mr-2 mt-0 d-flex justify-content-md-end align-items-center grid">
                  <div class="input-group border rounded input-group-lg w-auto mr-4">
                     <label class="input-group-text bg-transparent border-0 text-uppercase letter-spacing-093 pr-1 pl-3" for="inputGroupSelect01"><i class="fas fa-align-left fs-16 pr-2"></i>Sortby:</label>
                     <select onchange="sortFun(this.value)" name="sort" class="form-control border-0 bg-transparent shadow-none p-0 selectpicker sortby" data-style="bg-transparent border-0 font-weight-600 btn-lg pl-0 pr-3" id="inputGroupSelect01" name="sortby">
                        <option value>select option</option>
                        <option value="top_viewed" @if(Request()->sort == 'top_viewed') selected @endif>Most Viewed</option>
                        <option value="asc_price" @if(Request()->sort == 'asc_price') selected @endif>Price(low to high)</option>
                        <option value="desc_price" @if(Request()->sort == 'desc_price') selected @endif>Price(high to low)</option>
                        <option value="asc_sqft" @if(Request()->sort == 'asc_sqft') selected @endif>Sqft(low to high)</option>
                        <option value="desc_sqft" @if(Request()->sort == 'desc_sqft') selected @endif>Sqft(high to low)</option>
                        <option value="resent_sent" @if(Request()->sort == 'resent_sent') selected @endif>Resent</option>
                     </select>
                  </div>
                  <!-- <div class="sorting-options">
                     <a href="#" class="change-view-btn active-view-btn"><i class="fa fa-th-list"></i></a>
                     <a href="properties-grid-4.html" class="change-view-btn lde"><i class="fa fa-th-large"></i></a>
                     </div> -->
               </div>
            </div>
         </section>
         <div class="row featured portfolio-items all-post">
         </div>
      </div>
      <aside class="col-lg-4 col-md-12 car">
         <div class="widget">
            <!-- Search Fields -->
            <div class="widget-boxed main-search-field">
               <div class="widget-boxed-header">
                  <h4>Find Your House</h4>
               </div>
               <!-- Search Form -->
               <div class="trip-search">
                  <form class="form" method="GET" >
                     <!-- Form Location -->
                     <div class="form-group categories ml-22">
                        <select class="nice-select form-control wide select2"name="country" onchange="getstate(this.value)">
                           <option value="">Country</option>
                           @foreach($getCountries as $country)
                           <option value="{{$country->id}}" >{{$country->name}}</option>
                           @endforeach
                        </select>
                     </div>
                     <p>
                     <div class="form-group beds">
                        <select class="nice-select form-control wide select2" name="state" id="state" onchange="getCity(this.value)">
                           <option value="">Select State</option>
                        </select>
                     </div>
                     </p>
                     <p>
                     <div class="form-group beds">
                        <select class="nice-select form-control wide select2" name="city" id="city">
                           <option value="">Select City</option>
                        </select>
                     </div>
                     </p>
                     <!--/ End Form Categories -->
                     <!-- Form Property Status -->
                     <!-- <div class="form-group categories">
                        <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-home"></i>Property Status</span>
                            <ul class="list">
                                <li data-value="1" class="option selected ">For Sale</li>
                                <li data-value="2" class="option">For Rent</li>
                            </ul>
                        </div>
                        </div> -->
                     <!--/ End Form Property Status -->
                     <!-- Form Bedrooms -->
                     <!-- <div class="form-group beds">
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
                        </div> -->
                     <!--/ End Form Bedrooms -->
                     <!-- Form Bathrooms -->
                     <!-- <div class="form-group bath">
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
                        </div> -->
                     <!--/ End Form Bathrooms -->  
               </div>
               <!--/ End Search Form -->
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
               <!-- More Search Options -->
               <a href="#" class="more-search-options-trigger margin-bottom-10 margin-top-30" data-open-title="Advanced Features" data-close-title="Advanced Features"></a>
               <div class="more-search-options relative">
               <!-- Checkboxes -->
               <div class="checkboxes one-in-row margin-bottom-10 ch-1">
               <input type="hidden" name="feature" id="feature" >
               @foreach($featureMaster as $key => $row)
               <input id="check-{{$key}}" class="checkboxall" type="checkbox" value="{{$row->id}}" onclick="fetureFun()">
               <label for="check-{{$key}}">{{ucwords($row->feature_name)}}</label>
               @endforeach
               <!-- Checkboxes / End -->
               </div>
               <!-- More Search Options / End -->
               </div>
               <div class="col-lg-12 no-pds">
               <div class="at-col-default-mar">
               <button class="btn btn-default hvr-bounce-to-right" type="submit">Search</button>
               </div>
               </div>
               </form>
               <div class="widget-boxed mt-5">
                  <div class="widget-boxed-header">
                     <h4>Latest Properties</h4>
                  </div>
                  <div class="widget-boxed-body">
                     <div class="recent-post">
                        @foreach($letistPro as $letist)
                        <div class="recent-main my-4">
                           <div class="recent-img">
                              <a href="{{url('get_property')}}/{{$letist->id}}"><img src="{{asset('images')}}/{{@$letist->getMedia[0]->file_name}}" alt=""></a>
                           </div>
                           <div class="info-img">
                              <a href="{{url('get_property')}}/{{$letist->id}}">
                                 <h6>{{ucfirst($letist->pro_title)}}</h6>
                              </a>
                              <p>&#8377; {{$letist->price}}</p>
                           </div>
                        </div>
                        @endforeach
                        <!-- <div class="recent-main my-4">
                           <div class="recent-img">
                               <a href="blog-details.html"><img src="{{asset('assets/images/feature-properties/fp-2.jpg')}}" alt=""></a>
                           </div>
                           <div class="info-img">
                               <a href="blog-details.html"><h6>Luxury Villa House</h6></a>
                               <p>$120,000</p>
                           </div>
                           </div>
                           <div class="recent-main">
                           <div class="recent-img">
                               <a href="blog-details.html"><img src="{{asset('assets/images/feature-properties/fp-3.jpg')}}" alt=""></a>
                           </div>
                           <div class="info-img">
                               <a href="blog-details.html"><h6>Luxury Family Home</h6></a>
                               <p>$150,000</p>
                           </div> -->
                        <!-- </div> -->
                     </div>
                  </div>
               </div>
               <div class="widget-boxed popular mt-5 mb-0">
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
      </aside>
      </div>
   </div>
</section>

<div class="modal fade" id="shereModal" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <!-- <button type="button" class="btn btn-default close" data-dismiss="modal">&times;</button> -->
         </div>
        
         <div class="modal-body">
         <input type="hidden" id="shareLink">
            <p style="text-align:center;">
             <a href="javascript:void(0)" onclick="shareOnWhatsApp()">  <img src="{{url('shareimage/whatsapp.png')}}" alt="" style="height: 60px;">&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>
             <a href="javascript:void(0)" onclick="sendEmail()">    <img src="{{url('shareimage/emailshear.png')}}"  style="height: 60px;">&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
             <a href="javascript:void(0)" onclick="shareOnFacebook()">   <img src="{{url('shareimage/facebook.png')}}" alt="" style="height: 60px;">&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
             <a href="javascript:void(0)" onclick="shareOnTwitter()">   <img src="{{url('shareimage/twiter.png')}}" alt="" style="height: 60px;">&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
               <!-- <input type="text" clase="form-control"> -->
            </p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>

<!-- END SECTION PROPERTIES LISTING -->
@endsection
@section('script')
<script>


        function sendEmail() {
         var link = $('#shareLink').val();
            window.location.href = `mailto:?subject=Share Link&body=${link}`;
        }
    
        function shareOnWhatsApp() {
         var link = $('#shareLink').val();
    var url = `https://api.whatsapp.com/send?text=${link}`;
    window.open(url, '_blank');
}
function shareOnFacebook() {
   var link = $('#shareLink').val();
    var url = `https://www.facebook.com/sharer/sharer.php?u=${link}`;
    window.open(url, '_blank');
}

function shareOnTwitter() {
   var link = $('#shareLink').val();

    var url = `https://twitter.com/intent/tweet?text=${link}`;
    window.open(url, '_blank');
}




function openShareModel(id){
   var link = $('#share_'+id).val();
   console.log(link);
   $('#shareLink').val(link);
       $('#shereModal').modal('show');
   }

   function sortFun(sort){
        var url = window.location.href;
        hashes = url.split("?")[1]
        var  result = removeUrlParameter(url,'sort')
       window.location.href = result+"&sort=" + sort;
   }
   
   
   function removeUrlParameter(url, parameter) {
   var urlParts = url.split('?');
   
   if (urlParts.length >= 2) {
   // Get first part, and remove from array
   var urlBase = urlParts.shift();
   
   // Join it back up
   var queryString = urlParts.join('?');
   
   var prefix = encodeURIComponent(parameter) + '=';
   var parts = queryString.split(/[&;]/g);
   
   // Reverse iteration as may be destructive
   for (var i = parts.length; i-- > 0; ) {
     // Idiom for string.startsWith
     if (parts[i].lastIndexOf(prefix, 0) !== -1) {
       parts.splice(i, 1);
     }
   }
   
   url = urlBase + '?' + parts.join('&');
   }
   
   return url;
   }
   
   
   var url = window.location.href;
   hashes = url.split("?")[1]
   
   
   var page = 1;
   loadMoreData(1)
   $(window).scroll(function() {
   //$(window).scrollTop() + $(window).height();
   var scroll_position_for_post_load = $(window).height() + $(window).scrollTop() + 300;
   
   if ( scroll_position_for_post_load >= $(document).height()) {
       page++;
      
       loadMoreData(page);
   }
   });
   function loadMoreData(page) {
   $.ajax({
       url: "{{ url('search-property') }}?"+hashes+"&page=" + page,
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
       $(".all-post").append(data);
   })
   .fail(function(jqXHR, ajaxOptions, thrownError) {
       alert('Server not responding...');
   });
   }
   
   
</script>
@endsection