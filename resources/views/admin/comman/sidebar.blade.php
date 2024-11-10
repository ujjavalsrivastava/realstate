                    <div class="user-profile-box mb-0">
                         <div class="sidebar-header" style="text-align:center"><img src="{{URL::asset('assets/images/logo.jpeg')}}" alt="header-logo2.png" style="height:76px; width:100px"> </div>
                            <div class="header clearfix">
                                <img src="{{URL::asset('assets/images/user.jpg')}}" alt="avatar" class="img-fluid profile-img">
                            </div>
                            <div class="active-user">
                                <h2>{{ucfirst(Auth::user()->name)}}</h2>
                            </div>
                            <div class="detail clearfix">
                                <ul class="mb-0">
                                    <li>
                                        <a href="{{url('admin/home')}}">
                                            <i class="fa fa-map-marker"></i> Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('admin/payment-list')}}">
                                            <i class="fa fa-user"></i>Payment List
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('admin/favorite-list')}}">
                                            <i class="fa fa-user"></i>Favorite List
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{url('admin/verified')}}">
                                            <i class="fa fa-user"></i>Verified User
                                        </a>
                                    </li>
                                    @if(auth()->user()->type == 'Admin')
                                    <li>
                                        <a href="{{url('admin/sub-plan')}}">
                                            <i class="fa fa-compress"></i>Subscription Plan
                                        </a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{url('admin/logout')}}">
                                            <i class="fa fa-sign-out"></i>Log Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>