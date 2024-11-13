@foreach($chatUser as $row)
            
            <div class="side-box" onclick="findUser('{{$row->id}}','{{$row->name}}')">
                <div class="pro-img">
                    @if($row->profile)
                    <img src="{{$row->profile}}" alt="">
                    @else
                    <img src="{{URL::asset('assets/images/user.jpg')}}" alt="">

                    @endif
                </div>
                <div class="pro-name" style="width:48%">
               @php

               $count = UserUnseenMsg($row->id);

               @endphp
                    <div class="emp-name">
                        <div class="" style="display: inline-block;float: left;">
                            <span>{{ucfirst($row->name)}}</span>
                        </div>
                        <div class="" style="display: inline-block;float: right;">
                            <span class="msgCount">{{$count}}</span>
                        </div>
                    </div>
                    <div class="bottom-text" style="position: relative;top: 17px;right: 26px;"><span>{{ucfirst($row->type)}}</span></div>
                </div>
            </div>
            @endforeach