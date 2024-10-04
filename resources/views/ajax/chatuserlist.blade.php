@foreach($chatUser as $row)
            
            <div class="side-box" onclick="findUser('{{$row->id}}','{{$row->name}}')">
                <div class="pro-img">
                    <img src="{{URL::asset('assets/images/user.jpg')}}" alt="">
                </div>
                <div class="pro-name">
               
                    <div class="emp-name">
                        <span>{{ucfirst($row->name)}}</span>    <span class="msgCount">{{UserUnseenMsg($row->id)??0}}</span>
                    </div>
                    <div class="bottom-text"><span>{{ucfirst($row->type)}}</span></div>
                </div>
            </div>
            @endforeach