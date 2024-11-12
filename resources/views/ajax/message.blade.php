
@foreach($messages as $row)


@if($row->sender_id == auth()->id())
<div id="cm-msg-1" class="chat-msg self sender" >     
         <span class="msg-avatar">   
                 @if($row->sender->profile)
                  <img src="{{$row->sender->profile}}" alt="">
                  @else
                  <img src="{{URL::asset('assets/images/user.jpg')}}" alt="">
                  @endif       
                
        </span>        
     <div class="cm-msg-text">{{$row->msg}} </div>   
 </div>

 @else

 

<div id="cm-msg-1" class="chat-msg user reciver" >     
         <span class="msg-avatar">   
                 @if($recieveDetails->profile)
                  <img src="{{$recieveDetails->profile}}" alt="">
                  @else
                  <img src="{{URL::asset('assets/images/user.jpg')}}" alt="">
                  @endif       
                
        </span>        
     <div class="cm-msg-text">{{$row->msg}} </div>   
 </div>
@endif
 @endforeach

