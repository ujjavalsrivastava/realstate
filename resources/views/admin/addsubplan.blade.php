@extends('admin.layout.master')
@section('content')
  <!-- START SECTION USER PROFILE -->
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
                            <h3>Add Plan</h3>
                            <div class="property-form-group">
                                <form action="{{url('admin/add-sub-plan')}}/{{$data->id}}" method="POST" id="editPlanId"> 
                                @csrf
                                <input type="hidden" value="{{$data->id}}" id="editInput">
                                    <div class="row">
                                    <label for="title">Plan</label>
                                        <div class="col-md-12">
                                               
                                                <input type="text" name="plan" id="plan" value="{{$data->plan}}"p laceholder="Enter your Plan">
                                          </div>
                                    </div><br>
                                    <div class="row">
                                    <label for="description">Description</label>
                                        <div class="col-md-12">
                                                
                                                <input id="description" type="text" name="description" value="{{$data->description}}" placeholder="Describe about your property">
                                        </div>
                                    </div><br>
                                    <div class="row">
                                    <label for="description">Price</label>
                                    <div class="col-md-12">
                                               
                                                <input id="price" name="price" value="{{$data->price}}" placeholder="Price">
                                         </div><br><br>
                                        <div>
                                            <button type="submit" class="log-submit-btn">Submit</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @endsection
                    @section('script')
                    <script>
                $('#editPlanId').on('submit', function(e) {
                        e.preventDefault(); 
                        var Id = $('#editInput').val();
                        $.ajax({
                            type: "POST",
                            url: '{{url('admin/update-sub-plan')}}/' + Id,
                            data: $(this).serialize(),
                            success: function(response) {
                                if(response.status == '200'){
                                    $('#successNotification').show();
                                    $('#successMessage').text(response.success);
                                    // location.reload().delay(5000);
                                }else{
                                    $('#errorNotification').show();
                                    $('#errorMessage').text(response.error);
                                }
                            },
                            error: function (response) {
                                    $('#errorNotification').show();
                                    $('#errorMessage').text(response.responseJSON.error);
                            },
                        });
                    });
            
                    </script>
                    @endsection
