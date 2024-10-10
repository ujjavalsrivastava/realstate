@foreach($chatUser as $row)
            
            <div class="side-box" onclick="findUser('{{$row->id}}','{{$row->name}}')">
                <div class="pro-img">
                    <img src="{{URL::asset('assets/images/user.jpg')}}" alt="">
                </div>
                <div class="pro-name">
               @php

               $count = UserUnseenMsg($row->id);

               @endphp
                    <div class="emp-name">
                        <span>{{ucfirst($row->name)}}</span>  @if( $count > 0)  <span class="msgCount">{{$count}}</span>@endif
                    </div>
                    <div class="bottom-text"><span>{{ucfirst($row->type)}}</span></div>
                </div>
            </div>
            @endforeach