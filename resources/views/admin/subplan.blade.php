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
  <div class="my-properties">
    <table class="table-responsive">
      <thead>
        <tr>
          <th class="pl-2">Plan</th>
         <th>Description</th>
          <th>Price</th>
          <th>Created Date</th>
          <th>Updated Date</th>
          <!-- <th>Views</th> -->
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($getPlan as $plan)
      <tr id="record-{{$plan->id}}">
          <!-- <td class="image myelist">
            <a href="single-property-1.html"><img alt="my-properties-3" src="{{asset('images')}}/{{@$getPost->getMedia[0]->file_name}}" class="img-fluid" style="height:100px; wight:129px"></a>
          </td> -->
          <td>
              <h2>{{$plan->plan}}</h2>
          </td>
          <td>{{ucfirst($plan->description)}}</td>
          <td> &#8377;{{$plan->price}}</td>
          <td>{{$plan->created_at}}</td>
          <td>{{$plan->updated_at}}</td>
         
          <td class="actions">
            <a href="{{url('admin/edit-sub-plan')}}/{{$plan->id}}" class="edit"><i class="lni-pencil"></i>Edit</a>
            <a href="#" class="delete-btn" onclick= "deletePlan('{{$plan->id}}')" ><i class="fa fa-trash"></i></a>
            <!-- <input type="hidden" value="{{$plan->id}}" id="id"> -->
          </td>
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
@section('script')
      <script>

              function deletePlan(id){
                  $.ajax({
                    url: '{{url('admin/sub-plan-d')}}/' + id,
                    type: 'Get',
                    data: {
                        _token: '{{ csrf_token() }}' // Include CSRF token
                    },
                    success: function(response) {
                        alert(response);
                        $('#record-' + id).remove(); // Remove the record from the UI
                    },
                    error: function(xhr) {
                        alert(xhr.responseJSON.error);
                    }
                 });
              }
  
      </script>
@endsection