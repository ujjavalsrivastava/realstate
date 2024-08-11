@extends('layout.back_master')

@section('title', 'MIL - Payroll- Bank Master')

@section('styles')
	
@endsection

@section('content')
        <!-- START SECTION USER PROFILE -->
        <section class="user-page section-padding pt-5">

        <form method="post"  id="postform" enctype='multipart/form-data'>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash">
                        <div class="user-profile-box mb-0">
                            <div class="sidebar-header"><img src="{{url('assets/images/logo-blue.svg')}}" alt="header-logo2.png"> </div>
                            <div class="header clearfix">
                                <img src="{{url('assets/images/testimonials/ts-1.jpg')}}" alt="avatar" class="img-fluid profile-img">
                            </div>
                            <div class="active-user">
                                <h2>Mary Smith</h2>
                            </div>
                            <div class="detail clearfix">
                                <ul class="mb-0">
                                    <li>
                                        <a href="dashboard.html">
                                            <i class="fa fa-map-marker"></i> Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="user-profile.html">
                                            <i class="fa fa-user"></i>Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="my-listings.html">
                                            <i class="fa fa-list" aria-hidden="true"></i>My Properties
                                        </a>
                                    </li>
                                    <li>
                                        <a href="favorited-listings.html">
                                            <i class="fa fa-heart" aria-hidden="true"></i>Favorited Properties
                                        </a>
                                    </li>
                                    <li>
                                        <a class="active" href="add-property.html">
                                            <i class="fa fa-list" aria-hidden="true"></i>Add Property
                                        </a>
                                    </li>
                                    <li>
                                        <a href="payment-method.html">
                                            <i class="fas fa-credit-card"></i>Payments
                                        </a>
                                    </li>
                                    <li>
                                        <a href="invoice.html">
                                            <i class="fas fa-paste"></i>Invoices
                                        </a>
                                    </li>
                                    <li>
                                        <a href="change-password.html">
                                            <i class="fa fa-lock"></i>Change Password
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.html">
                                            <i class="fas fa-sign-out-alt"></i>Log Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2">
                        <div class="col-lg-12 mobile-dashbord dashbord">
                            <div class="dashboard_navigationbar dashxl">
                                <div class="dropdown">
                                    <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10 mr-2"></i> Dashboard Navigation</button>
                                    <ul id="myDropdown" class="dropdown-content">
                                        <li>
                                            <a href="dashboard.html">
                                                <i class="fa fa-map-marker mr-3"></i> Dashboard
                                            </a>
                                        </li>
                                        <li>
                                            <a href="user-profile.html">
                                                <i class="fa fa-user mr-3"></i>Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="my-listings.html">
                                                <i class="fa fa-list mr-3" aria-hidden="true"></i>My Properties
                                            </a>
                                        </li>
                                        <li>
                                            <a href="favorited-listings.html">
                                                <i class="fa fa-heart mr-3" aria-hidden="true"></i>Favorited Properties
                                            </a>
                                        </li>
                                        <li>
                                            <a class="active" href="add-property.html">
                                                <i class="fa fa-list mr-3" aria-hidden="true"></i>Add Property
                                            </a>
                                        </li>
                                        <li>
                                            <a href="payment-method.html">
                                                <i class="fas fa-credit-card mr-3"></i>Payments
                                            </a>
                                        </li>
                                        <li>
                                            <a href="invoice.html">
                                                <i class="fas fa-paste mr-3"></i>Invoices
                                            </a>
                                        </li>
                                        <li>
                                            <a href="change-password.html">
                                                <i class="fa fa-lock mr-3"></i>Change Password
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html">
                                                <i class="fas fa-sign-out-alt mr-3"></i>Log Out
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-add-property">
                            <h3>Property description and price</h3>
                            <div class="property-form-group">
                                
                                @csrf()
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
                                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                            <div class="form-group categories">
                                                   <select class="form-control wide" name="pro_type" id="pro_type">
                                                    <option value="">Select Type</option>
                                                    @foreach($getProTypes as $getProType)
                                                    <option value="{{$getProType->code}}">{{ucfirst($getProType->description)}}</option>
                                                    @endforeach
                                                </select>
                                             </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                            <div class="form-group categories">
                                            <select class="form-control wide" name="res_com_type" id="res_com_type" onchange="getResComDes(this.value)">
                                                    <option value="">Select Property Type</option>
                                                    @foreach($getResComTypes as $getResComType)
                                                    <option value="{{$getResComType->code}}">{{ucfirst($getResComType->description)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 faq-drop">
                                            <div class="form-group ">
                                            <select class="form-control wide" name="res_com_detail" id="res_com_detail">
                                                    <option value="">Select Property Detail</option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                      
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb">
                                                <label for="price">Price</label>
                                                <input type="text" name="price" placeholder="INS" id="price">
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb last">
                                                <label for="area">Area</label>
                                                <input type="text" name="area_sq" placeholder="Sqft" id="area">
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb last">
                                                <label for="area">Room</label>
                                                <input type="text" name="room" placeholder="Room" id="room">
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
                                        <form action="https://code-theme.com/file-upload" class="dropzone"></form>
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
                                            <label for="address">Address</label>
                                            <input type="text" name="address" placeholder="Enter Your Address" id="address">
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <p>
                                            <label for="city">City</label>
                                            <input type="text" name="city" placeholder="Enter Your City" id="city">
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <p>
                                            <label for="state">State</label>
                                            <input type="text" name="state" placeholder="Enter Your State" id="state">
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <p>
                                            <label for="country">Country</label>
                                            <input type="text" name="country" placeholder="Enter Your Country" id="country">
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
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
                                </div>
                            </div>
                        </div>
                        <!-- <div class="single-add-property">
                            <h3>Extra Information</h3>
                            <div class="property-form-group">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                        <div class="form-group categories">
                                        <p class="no-mb last">
                                            <label for="longitude">Age</label>
                                            <input type="number" name="age" placeholder="Age" id="age">
                                        </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                        <div class="form-group categories">
                                            <div class="nice-select form-control wide" tabindex="0"><span class="current">Select Rooms</span>
                                                <ul class="list">
                                                    <li data-value="1" class="option">1</li>
                                                    <li data-value="2" class="option">2</li>
                                                    <li data-value="1" class="option">3</li>
                                                    <li data-value="2" class="option">4</li>
                                                    <li data-value="1" class="option">5</li>
                                                    <li data-value="2" class="option">6</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                        <div class="form-group categories">
                                            <div class="nice-select form-control wide" tabindex="0"><span class="current">Select Bathrooms</span>
                                                <ul class="list">
                                                    <li data-value="1" class="option">1</li>
                                                    <li data-value="2" class="option">2</li>
                                                    <li data-value="1" class="option">3</li>
                                                    <li data-value="2" class="option">4</li>
                                                    <li data-value="1" class="option">5</li>
                                                    <li data-value="2" class="option">6</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
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
                                                        <input id="check-a" type="checkbox" name="check" value = "{{$getfeatureMaster->id}}">
                                                        <label for="check-a">{{$getfeatureMaster->feature_name}}</label>
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
                                        <p class="no-mb first">
                                            <label for="con-email">Email</label>
                                            <input type="email" placeholder="Enter Your Email" id="email" name="email">
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <p class="no-mb last">
                                            <label for="con-phn">Phone</label>
                                            <input type="text" placeholder="Enter Your Phone Number" id="phone" name="phone">
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <p class="no-mb last">
                                            <label for="con-phn">Age</label>
                                            <input type="text" placeholder="Enter Your Age" id="age" name="age">
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="add-property-button pt-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="prperty-submit-button">
                                            <button type="submit">Submit Property</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </section>
        <!-- END SECTION USER PROFILE -->
        @endsection

@section('script')
<script>
 $('#postform').on('submit', function(e) {
              e.preventDefault(); 
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
                            $('#successMessage').text(response.success);
                            location.reload().delay(5000);
                        }else{
                            $('#errorNotification').show();
                            $('#errorMessage').text(response.message);
                        }
                        
                    },
                    error: function (response) {
                     
            $('#errorNotification').show();
            $('#errorMessage').text(response.responseJSON.error);
        },
                });
            });

    function getResComDes(id){
        $.ajax({
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                url: '{{url('show_res_com_details')}}/' + id,
                type: 'GET',
                
                success: function(response) {
                    var res_com = '<li data-value="" class="option selected">Select Property Detail</li>';
                     $.each(response.data, function( index, value ) {
                     
                     res_com +=  '<li data-value="" class="option">' + value.property_type + '</li>'
                    });
                    
                    
                    $('#res_com_detail').siblings(".nice-select").eq(0).find('.list').html(res_com);
                    //$('#res_com_detail').html(res_com);
                }
            });
    }
</script>
	
@endsection
       

        