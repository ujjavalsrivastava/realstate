@extends('layout.back_master')
@section('title', 'Property')
@section('styles')
<style>
.select2-container--bootstrap4{
   border:1px solid !important;
}
   </style>
@endsection
@section('content')
<!-- START SECTION SUBMIT PROPERTY -->
<section class="royal-add-property-area section_100">
   <form method="post"  id="postform" enctype='multipart/form-data'>
      @csrf
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="single-add-property">
                  <h3>Property description and price</h3>
                  <div class="property-form-group">
                     <div class="row">
                        <div class="col-md-12">
                           <p>
                              <label for="title">Property Title</label>
                              <input type="text" name="pro_title" id="title" placeholder="Enter your property title">
                           </p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <p>
                              <label for="description">Property Description</label>
                              <textarea id="description" name="pro_description" placeholder="Describe about your property"></textarea>
                           </p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-4 col-md-12">
                        <label for="description">Property Type</label>
                           <div class="dropdown faq-drop">
                              <select class="form-control wide" name="pro_type" id="pro_type" style="height:42px">
                                 <option value="">Select Type</option>
                                 @foreach($getProTypes as $getProType)
                                 <option value="{{$getProType->code}}">{{ucfirst($getProType->description)}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                        <label for="description"> Property Type  </label>
                           <div class="dropdown faq-drop">
                              <select class="form-control wide" name="res_com_type" id="res_com_type" onchange="getResComDes(this.value)" style="height:42px">
                                 <option value="">Select Property Type</option>
                                 @foreach($getResComTypes as $getResComType)
                                 <option value="{{$getResComType->code}}">{{ucfirst($getResComType->description)}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                        <label for="description"> Property Detail  </label>
                           <div class="dropdown faq-drop">
                              <select class="form-control wide" name="res_com_detail" id="res_com_detail" style="height:42px">
                                 <option value="">Select Property Detail</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-6 col-md-12">
                           <p class="no-mb">
                              <label for="price">Price</label>
                              <input type="text" name="price" placeholder="INS" id="price">
                           </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                           <p class="no-mb last">
                              <label for="area">Area</label>
                              <input type="text" name="area_sq" placeholder="Sqft" id="area">
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="single-add-property">
                  <h3>property Media</h3>
                  <div class="property-form-group">
                     <div class="row">
                        <div class="col-md-12">
                           <img onclick="openImage()" src="{{asset('assets/images/fileimage.png')}}" class="responsive">
                           <input type="file" name="images[]" accept="image/*" id="imageupload" style="display:none" multiple>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="single-add-property">
                  <h3>property Video</h3>
                  <div class="property-form-group">
                     <div class="row">
                        <div class="col-md-12">
                        <img onclick="openVideo()" src="{{asset('assets/images/fileimage.png')}}" class="responsive">
                           <input type="file" name="video" id="video" style="display:none" accept="video/*">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="single-add-property">
                  <h3>property Location</h3>
                  <div class="property-form-group">
                     <div class="row">
                        <div class="col-lg-6 col-md-12">
                           <p>
                              <!-- <label for="country">Country</label>
                                 <input type="text" name="country" placeholder="Enter Your Country" id="country"> -->
                           <div class="dropdown faq-drop">
                              <select class="form-control wide select2" name="country" onchange="getstate(this.value)">
                                 <option value="">Select Country</option>
                                 @foreach($countries as $country)
                                 <option value="{{$country->id}}">{{ucfirst($country->name)}}</option>
                                 @endforeach
                              </select>
                           </div>
                           </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                           <p>
                           <div class="dropdown faq-drop">
                              <select class="form-control wide select2" name="state" id="state" onchange="getCity(this.value)">
                                 <option value="">Select State</option>
                              </select>
                           </div>
                           </p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-6 col-md-12">
                           <p>
                           <div class="dropdown faq-drop">
                              <select class="form-control wide select2" name="city" id="city">
                                 <option value="">Select City</option>
                              </select>
                           </div>
                           </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                           <p>
                              <label for="address">Address</label>
                              <input type="text" name="address" placeholder="Enter Your Address" id="address">
                           </p>
                        </div>
                     </div>
                     <!-- <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <p class="no-mb first">
                                <label for="latitude">Google Maps latitude</label>
                                <input type="text" name="google_map_lat" placeholder="Google Maps latitude" id="latitude">
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <p class="no-mb last">
                                <label for="longitude">Google Maps longitude</label>
                                <input type="text" name="google_map_log" placeholder="Google Maps longitude" id="longitude">
                            </p>
                        </div>
                        </div> -->
                  </div>
               </div>
               <div class="single-add-property">
                  <h3>Extra Information</h3>
                  <div class="property-form-group">
                     <div class="row">
                     <div class="col-lg-6 col-md-12">
                           <p>
                              <label for="con-name">Rooms</label>
                              <input type="number" placeholder="Enter Your Name" id="room" name="room">
                           </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                           <p>
                              <label for="con-user">Bathrooms</label>
                              <input type="number" placeholder="Enter Your Username" id="bathroom" name="bathroom">
                           </p>
                        </div>
                        
                     </div>
                  </div>
               </div>
               <div class="single-add-property">
                  <h3>Property Features</h3>
                  <div class="property-form-group">
                     <div class="row">
                        <div class="col-md-12">
                           <ul class="pro-feature-add pl-0">
                              @foreach($getfeatureMasters as $getfeatureMaster)
                              <li class="fl-wrap filter-tags clearfix">
                                 <div class="checkboxes float-left">
                                    <div class="filter-tags-wrap">
                                       <input id="check-a{{$getfeatureMaster->id}}" type="checkbox" name="feature_id[]" value = "{{$getfeatureMaster->id}}">
                                       <label for="check-a{{$getfeatureMaster->id}}">{{$getfeatureMaster->feature_name}}</label>
                                    </div>
                                 </div>
                              </li>
                              @endforeach
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="single-add-property">
                  <h3>Contact Information</h3>
                  <div class="property-form-group">
                     <div class="row">
                        <div class="col-lg-6 col-md-12">
                           <p>
                              <label for="con-name">Name</label>
                              <input type="text" placeholder="Enter Your Name" id="name" name="name">
                           </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                           <p>
                              <label for="con-user">Username</label>
                              <input type="text" placeholder="Enter Your Username" id="username" name="username">
                           </p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-6 col-md-12">
                           <p>
                              <label for="con-email">Email</label>
                              <input type="email" placeholder="Enter Your Email" id="email" name="email">
                           </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                           <p>
                              <label for="con-phn">Phone</label>
                              <input type="text" placeholder="Enter Your Phone Number" id="phone" name="phone">
                           </p>
                        </div>
                        <br><br>
                        <div class="col-lg-6 col-md-12">
                           <p>
                              <label for="con-phn">Age</label>
                              <input type="text" placeholder="Enter Your Age" id="age" name="age">
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
          


               <div class="single-add-property">
                  <h3>Plans</h3>
                  <div class="property-form-group">
                     <div class="row">
                        <div class="col-md-12">
                           <ul class="pro-feature-add pl-0">
                              @foreach($plan as $k => $row)
                              <li class="fl-wrap filter-tags clearfix">
                                 <div class="checkboxes float-left">
                                    <div class="filter-tags-wrap">
                                       <input id="check-a{{$row->id}}" class="findcheckbox" data-name="{{$row->plan}}" onclick="getPlan('{{$row->price}}')" @if($k == 0) checked @endif type="radio" name="plan" value = "{{$row->price}}"><span>{{$row->plan}}</span><span style="float:right">₹ {{$row->price}}</span>
                                       <p> <strong>Feature </strong>: {{$row->description}}</p>

                                    </div>
                                 </div>
                              </li>
                              @endforeach
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>


               <div class="add-property-button">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="prperty-submit-button">
                           <button type="submit" id="btnsubmit" style="display:none">Submit Property</button>
                           <input type="hidden" name="payPrice" value="{{@$plan[0]->price}}" id="payPrice">
                           <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                           <input type="hidden" name="razorpay_signature" id="razorpay_signature">
                           <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
                           <button type="button" onclick="orderGenrate(this)" >Pay Now</button>
                        </div>
                     </div>
                  </div>
               </div>

            </div>
         </div>
      </div>
   </form>
</section>
<!-- END SECTION SUBMIT PROPERTY -->
@endsection
@section('script')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

   function getPlan(price){
      $('#payPrice').val(price);
   }
   @if(!Auth::check())
      $('.openModal').click();
    @endif
   
   function PaymentNow(apiKey){
   var options = {
   "key":apiKey,
   "amount": $('#payPrice').val(),
   "currency": "INR",
   "name": "Alpha Land",
   "description": "Alpha land India's most innovative real estate advertising platform for homeowners, landlords, developers, and real estate brokers. The company offers listings for new homes, resale homes, rentals,",
   "image": "https://alphaland.in/assets/images/logo.png",
   "order_id": $('#razorpay_order_id').val(),
   "handler": function(response) {
    console.log('response '+ JSON.stringify(response) );
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    $('#btnsubmit').show();
   },
   "theme": {
    "color": "#F37254"
   }
   };
   
   var rzp1 = new Razorpay(options);
   rzp1.on('payment.failed', function(response) {
   alert(response.error.code);
   alert(response.error.description);
   alert(response.error.source);
   alert(response.error.step);
   alert(response.error.reason);
   alert(response.error.metadata.order_id);
   alert(response.error.metadata.payment_id);
   });
   rzp1.open();
   }
</script>
<script>
   function orderGenrate(thisval){
       var price =  $('#payPrice').val();
       $(thisval).text('Proccessing...');
                   $.ajax({
                       headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   type: "POST",
                   url: "{{url('/orderGenerate')}}",
                   data: {price:price},
                   success: function(response) {
                       $(thisval).hide();
                       
                       console.log(response);
                       
                      
                          $('#razorpay_order_id').val(response.order_id);
                          PaymentNow(response.key);
                      
                   },
                   error: function (response) {
        
           $('#errorNotification').show();
           $('#errorMessage').text(response.responseJSON.error);
       },
               });
   }
   
   function openImage(){
   $('#imageupload').click();
   }
   function openVideo(){
      $('input[type="radio"]').each(function() {
      if ($(this).prop('checked')) {
        console.log($(this).data('name') + ' is checked');
        if($(this).data('name') === 'Gold'){
            $('#video').click();
            return false;
        }else{
         $('#errorNotification').show();
                           $('#errorMessage').text('Not Upload Video this plan');
                           window.scrollTo({ top: 0, behavior: 'smooth' });
                           return false;
      }
      } 
    });
    
  
   }
   
   
   $('#postform').on('submit', function(e) {
             e.preventDefault(); 
             $('#btnsubmit').text('Processing....')
             var form = $('#postform')[0];
   var formData = new FormData(form);
            // var formData = new FormData(this);
               $.ajax({
                   type: "POST",
                   url: "{{url('/pro_post_des')}}",
                   data: formData,
                   processData: false,
                   contentType: false,
                   success: function(response) {
                       if(response.status == '200'){
                           $('#successNotification').show();
                           $('#successMessage').text(response.message);
                           window.scrollTo({ top: 0, behavior: 'smooth' });
                           setTimeout(function () {
                              location.reload();
               // window.location.href = "https://example.com"; // Replace with your desired URL
                                }, 5000);
                           
                       }else{
                           $('#errorNotification').show();
                           $('#errorMessage').text(response.message);
                           window.scrollTo({ top: 0, behavior: 'smooth' });
                           $('#btnsubmit').text('Submit Property');
                       }
                       
                   },
                   error: function (response) {
                    
           $('#errorNotification').show();
           $('#errorMessage').text(response.responseJSON.error);
           $('#btnsubmit').text('Submit Property')
           window.scrollTo({ top: 0, behavior: 'smooth' });
       },
               });
   });
   
   //for letter caps
   function capitalizeFirstLetter(string) {
   if (typeof string !== 'string' || !string.length) {
       return '';
   }
   return string.charAt(0).toUpperCase() + string.slice(1);
   }
   
   function getResComDes(id){
       $.ajax({
           headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
               url: '{{url('show_res_com_details')}}/' + id,
               type: 'GET',
               success: function(response) {
                   var res_com = '<select class="form-control wide" name="res_com_detail" id="res_com_detail"><option value="" >Select Property Detail</option>';
                   $.each(response.data, function( index, value ) {
                       var propertytype = capitalizeFirstLetter(value.property_type);
                       res_com +=  '<option value="' + value.property_type + '">' + propertytype + '</option>'
                   });
                   res_com += '</select>'
                  $('#res_com_detail').html(res_com);
                   console.log(res_com);
               }
           });
   }
   function getstate(id){
       $.ajax({
           headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
               url: '{{url('show_state')}}/' + id,
               type: 'GET',
               success: function(response) {
                   var state = '<option value="" >Select State</option>';
                   $.each(response.data, function( index, value ) {
                       console.log(value);
                       state +=  '<option value="' + value.id + '">' + value.name + '</option>'
                   });
                   // state += '</select>';
                  $('#state').html(state);
                   console.log(state);
               }
           });
   }
   
   function getCity(id){
       $.ajax({
           headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
               url: '{{url('show_city')}}/' + id,
               type: 'GET',
               success: function(response) {
                   var city = '<select class="form-control wide select2" name="city" id="city"><option value="" >Select City</option>';
                   $.each(response.data, function( index, value ) {
                       console.log(value);
                       city +=  '<option value="' + value.id + '">' + value.city + '</option>'
                   });
                   city += '</select>';
                  $('#city').html(city);
                   console.log(city);
               }
           });
   }
</script>
@endsection