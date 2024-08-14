@extends('layout.back_master')

@section('title', 'Property')

@section('styles')
	
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
                                            <div class="dropdown faq-drop">
                                            <select class="form-control wide" name="pro_type" id="pro_type">
                                                    <option value="">Select Type</option>
                                                    @foreach($getProTypes as $getProType)
                                                    <option value="{{$getProType->code}}">{{ucfirst($getProType->description)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="dropdown faq-drop">
                                            <select class="form-control wide" name="res_com_type" id="res_com_type" onchange="getResComDes(this.value)">
                                                    <option value="">Select Property Type</option>
                                                    @foreach($getResComTypes as $getResComType)
                                                    <option value="{{$getResComType->code}}">{{ucfirst($getResComType->description)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="dropdown faq-drop">
                                            <select class="form-control wide" name="res_com_detail" id="res_com_detail">
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
                                    <input type="file" name="images[]" id="imageupload" style="display:none" multiple>
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
                        <div class="single-add-property">
                            <h3>Extra Information</h3>
                            <div class="property-form-group">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="dropdown faq-drop no-mb">
                                        <div class="col-lg-4 col-md-12">
                                        </div>
                                            <label for="room">Rooms <span>(optional)</span></label>
                                            <input type="number" name="room" placeholder="Room" id="room">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="dropdown faq-drop no-mb last">
                                            <label for="bathroom">Bathrooms <span>(optional)</span></label>
                                            <input type="number" name="bathroom" placeholder="Room" id="bathroom">
                                        </div>
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
                                    </div><br><br>
                                    <div class="col-lg-6 col-md-12">
                                        <p>
                                            <label for="con-phn">Age</label>
                                            <input type="text" placeholder="Enter Your Age" id="age" name="age">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="add-property-button">
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
        </form>
        </section>
        <!-- END SECTION SUBMIT PROPERTY -->
        @endsection

@section('script')
<script>

function openImage(){
   $('#imageupload').click();
}

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
                            $('#successMessage').text(response.message);
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
                    var res_com = '<select class="form-control wide" name="res_com_detail" id="res_com_detail"><option>Select Property Detail</option>';
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
</script>
	
@endsection