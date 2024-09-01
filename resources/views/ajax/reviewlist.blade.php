<h3 class="mb-5">{{count($datas->getReview)}} Reviews</h3>
<div class="row mb-5">
@foreach($datas->getReview as $data)

                               
                           
<ul class="col-12 commented pl-0">
                                    <li class="comm-inf">
                                        <div class="col-md-2">
                                            <img src="{{URL::asset('assets/images/user.jpg')}}" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-md-10 comments-info">
                                            <div class="conra">
                                                <h5 class="mb-2">{{ucfirst($data->first_name)}} {{ucfirst($data->last_name)}}</h5>
                                                <div class="rating-box">
                                                    <div class="detail-list-rating mr-0">
                                                        @for($i=1; $i<=5; $i++)
                                                        @if($i <= $data->reating)
                                                        <i class="fa fa-star"></i>
                                                        @else
                                                        <i class="fa fa-star-o"></i>
                                                        @endif
                                                        @endfor
                                                        <!-- <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mb-4">{{date('M  d  Y', strtotime($data->created_at))}}</p>
                                            <p>{{$data->review}}</p>
                                            @if(count($data->getReviewMedia) > 0)
                                            <div  class="resti">
                                            @foreach($data->getReviewMedia as $image)
                                            <div class="rest"><img src="{{asset('reviewimages')}}/{{@$image->file_name}}" class="img-fluid" alt=""></div>
                                        @endforeach
                                        </div>
                                        @endif
                                        </div>
                                    </li>

                                </ul>

                               

@endforeach
</div>