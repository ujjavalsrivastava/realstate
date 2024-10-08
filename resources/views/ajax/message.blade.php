
@foreach($messages as $row)
<div id="cm-msg-1" class="chat-msg  {{ $row->sender_id == auth()->id() ? 'self' : 'user' }}" >     
         <span class="msg-avatar">          
                <img src="{{asset('assets/images/user.jpg')}}">       
        </span>        
     <div class="cm-msg-text">{{$row->msg}} </div>   
 </div>

 @endforeach

