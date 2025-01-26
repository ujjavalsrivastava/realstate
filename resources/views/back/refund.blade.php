@extends('layout.back_master')
@section('title', 'Refund Form')
@section('styles')
@endsection
@section('content')
<section class="headings" style="height:100%">
   <div class="text-heading text-center">
      <div class="container">
         <h1>Refund</h1>
         <h2><a href="{{url('/')}}">Home </a> &nbsp;/&nbsp; Refund</h2>
      </div>
   </div>
</section>
<!-- END SECTION HEADINGS -->
<!-- START SECTION CONTACT US -->
<section class="contact-us">
   <div class="container">
      <!-- <div class="property-location mb-5">
         <h3>Our Location</h3>
         <div class="divider-fade"></div>
         <div id="map-contact" class="contact-map"></div>
      </div> -->
      <div class="row">
         <div class="col-lg-8 col-md-12">
            <h3 class="mb-4">Refund Request Form</h3>
            <form id="refundform" class="contact-form" enctype="multipart/form-data">
               @csrf
               <div id="success" class="successform">
                  <p class="alert alert-success font-weight-bold" role="alert">Your message was sent successfully!</p>
               </div>
               <div id="error" class="errorform">
                  <p>Something went wrong, try refreshing and submitting the form again.</p>
               </div>
               <div class="form-group">
                  <input type="text" class="form-control input-custom input-full" name="first_name" placeholder="First Name">
               </div>
               <div class="form-group">
                  <input type="text" class="form-control input-custom input-full" name="last_name" placeholder="Last Name">
               </div>
               <div class="form-group">
                  <input type="text" class="form-control input-custom input-full" name="email" placeholder="Registered Email">
               </div>
               <div class="form-group">
                  <input type="file" class="form-control textarea-custom input-full" id="image" name="image" rows="8" >
               </div>
               <button type="submit" id="submit-refund" class="btn btn-primary btn-lg">Submit</button>
            </form>
         </div>
         <div class="col-lg-4 col-md-12 bgc">
            <div class="call-info">
               <h3>Contact Details</h3>
               <p class="mb-5">Please find below contact details and contact us today!</p>
               <ul>
                  <li>
                     <div class="info">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p class="in-p">Dandupur, Ring Road, Christ nagar near  Gautam Upavan lawn, Varanasi, Uttar Pradesh 
                        Pin Code-221003</p>
                     </div>
                  </li>
                  <li>
                     <div class="info">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <p class="in-p">+91 79918 92358</p>
                     </div>
                  </li>
                  <li>
                     <div class="info">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <p class="in-p ti">alphaland553@gmail.com</p>
                     </div>
                  </li>
                  <li>
                     <div class="info cll">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <p class="in-p ti">8:00 a.m - 9:00 p.m</p>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- END SECTION CONTACT US -->
@endsection
@section('script')
<script>

   $('#refundform').on('submit', function(e) {
              e.preventDefault(); 
              $('#submit-refund').text('Proccessing...');
              $('#submit-refund').prop('disabled', true);
              let formData = new FormData(this);
              console.log(formData);
              $.ajax({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  type: "POST",
                  url: "{{url('save-refund')}}",
                  data: formData,
                  processData: false, // FormData ke saath false rakhna zaroori hai
                  contentType: false,
                  success: function(response) {
                     $('#submit-refund').text('Submit');
                     $('#submit-refund').prop('disabled', false);
                      if(response.status == '200'){
                          $('#successNotification').show();
                          window.scrollTo({ top: 0, behavior: 'smooth' });
                          $('#successMessage').text(response.success);
                          $('#refundform')[0].reset(); 
                      }else{
                          $('#errorNotification').show();
                          window.scrollTo({ top: 0, behavior: 'smooth' });
                          $('#errorMessage').text(response.message);
                      }   
                  },
                  error: function (response) {
                     $('#submit-refund').text('Submit');
                     $('#submit-refund').prop('disabled', false);
                      $('#errorNotification').show();
                      window.scrollTo({ top: 0, behavior: 'smooth' });
                      $('#errorMessage').text(response.responseJSON.error);
                  },
              });
          });
</script>
@endsection