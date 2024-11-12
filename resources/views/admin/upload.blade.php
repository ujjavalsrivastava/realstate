@extends('admin.layout.master')
@section('content')
  <!-- START SECTION USER PROFILE -->
  <div class="col-lg-9 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2">
                        
                        <div class="single-add-property">
                            <h3>Upload Profile Image</h3>
                            <div class="property-form-group">
                                <form method="POST"  enctype="multipart/form-data" id="upload"> 
                                @csrf
                                   <div class="row">

                                        <div class="col-md-12">
                                        
                                                <input type="file" class="form-control" name="profile" id="profile"  accept="image/*" />
                                          </div>
                                    
                                    
                                    
                                       
                                     <div class="col-md-12" style="padding: 17px 9px 3px 12px;">
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
                $('#upload').on('submit', function(e) {
                    alert('adf');
                        e.preventDefault(); 
                        var formData = new FormData(e.target);



                        $.ajax({
                            type: "POST",
                            url: '{{url('admin/uploadPic')}}',
                            contentType: 'multipart/form-data',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: formData,

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
