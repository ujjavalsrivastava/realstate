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
                                            <a href="{{url('admin/get-change-password')}}">
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
                            <h3>Change Password</h3>
                            <div class="property-form-group">
                                <form method="POST"  id="chngepass"> 
                                @csrf
                                   <div class="row">

                                        <div class="col-md-12">
                                        <label for="title">Old Password</label>
                                                <input type="password" class="form-control" name="old_pass" id="plan" placeholder="Enter your Password">
                                          </div>
                                    
                                    
                                    
                                        <div class="col-md-12"> 
                                        <label for="description">New Password</label>
                                                <input id="password" type="password" class="form-control"  name="new_pass"  placeholder="password">
                                        </div>
                                    
                                

                                    <div class="col-md-12">
                                    <label for="description">Confirm Password</label>
                                                <input id="password" type="password"  name="conf_pass" class="form-control" placeholder="password">
                                     </div>
                                     <div class="col-md-12" style="padding: 17px 9px 3px 12px;>
                                     <label for="description">&nbsp;</label>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @endsection
                    @section('script')
                    <script>
                $('#chngepass').on('submit', function(e) {
                        e.preventDefault(); 
                      //  var Id = $('#editInput').val();
                        $.ajax({
                            type: "POST",
                            url: '{{url('admin/change-password')}}',
                            data: $(this).serialize(),
                            success: function(response) {
                                if(response.status == '200'){
                                    $('#successNotification').show();
                                    $('#successMessage').text(response.success);
                                    $('#chngepass')[0].reset();

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
