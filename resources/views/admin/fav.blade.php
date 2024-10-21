
@extends('admin.layout.master')
@section('content')
<div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">
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
            <a class="active" href="my-listings.html">
              <i class="fa fa-list mr-3" aria-hidden="true"></i>My Properties
            </a>
          </li>
          <li>
            <a href="favorited-listings.html">
              <i class="fa fa-heart mr-3" aria-hidden="true"></i>Favorited Properties
            </a>
          </li>
          <li>
            <a href="add-property.html">
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
  <div class="my-properties">
    <table class="table-responsive">
      <thead>
        <tr>
          <th class="pl-2">My Properties</th>
          <th class="p-0">Addresh</th>
          
        
          <th>Date Added</th>
          <th>Views</th>
          <!-- <th>Actions</th> -->
        </tr>
      </thead>
      <tbody>
        @foreach($getPosts as $getPost)
      <tr>
          <td class="image myelist">
            <a href="single-property-1.html"><img alt="my-properties-3" src="{{asset('images')}}/{{@$getPost->getProperty->getMedia[0]->file_name}}" class="img-fluid" style="height:100px; wight:129px"></a>
          </td>
          <td>
            <div class="inner">
              <a href="single-property-1.html">
                <h2>{{$getPost->getProperty->pro_title}}</h2>
              </a>
              <figure><i class="lni-map-marker"></i> {{strtoupper(@$getPost->getProperty->address)}}</figure>
             </div>
          </td>
          
          
          
          <td>{{date('d.m.Y', strtotime($getPost->getProperty->created_at))}}</td>
          <td>{{ucfirst(@$getPost->getProperty->view)}}</td>
          <!-- <td class="actions">
            <a href="#" class="edit"><i class="lni-pencil"></i>Edit</a>
            <a href="#"><i class="far fa-trash-alt"></i></a>
          </td> -->
        </tr>
       @endforeach
      </tbody>
    </table>
    <!-- <div class="pagination-container">
      <nav>
        <ul class="pagination">
          <li class="page-item"><a class="btn btn-common" href="#"><i class="lni-chevron-left"></i> Previous </a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="btn btn-common" href="#">Next <i class="lni-chevron-right"></i></a></li>
        </ul>
      </nav>
    </div> -->
  </div>
</div>
@endsection