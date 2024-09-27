@extends('layout.back_master')
@section('title', 'Property')
@section('styles')
<style>

.chat-window {
    height: 400px;
    border: 1px solid #ccc;
    padding: 10px;
    overflow-y: scroll;
    background-color: #f9f9f9;
    margin-bottom: 20px;
}

.message-input {
    display: flex;
    align-items: center;
    gap: 10px;
}

#message-input {
    flex: 1;
}


    </style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Chat Room</div>

                <div class="card-body">
                    <div id="chat-window" class="chat-window">
                        <!-- Messages will be appended here -->
                    </div>

                    <!-- Message Input -->
                    <div class="message-input">
                        <input type="text" id="message-input" class="form-control" placeholder="Type your message...">
                     
                       <input type="hidden" id="receiver-id" value="9"> <!-- Hidden input with receiver ID -->
                       
                     
                       
                        <button id="send-message" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ mix('js/app.js') }}"></script>
<script>
    // Get the current user ID (authenticated user) from your Blade view or JavaScript
    const currentUserId = {{ auth()->user()->id }};
    
    // Listen to the current user's private channel for messages
    Echo.private(`private-chat.${currentUserId}`)
        .listen('MessageSent', (e) => {
            let chatWindow = document.getElementById('chat-window');

            // Check if the message was sent by the current user (to distinguish sent and received messages)
            if (e.sender_id == currentUserId) {
                chatWindow.innerHTML += `<div class="message sent"><strong>You:</strong> ${e.message}</div>`;
            } else {
                chatWindow.innerHTML += `<div class="message received"><strong>${e.sender}:</strong> ${e.message}</div>`;
            }

            // Scroll chat window to the bottom after new message
            chatWindow.scrollTop = chatWindow.scrollHeight;
        });

    // Function to send a message via Axios
    document.getElementById('send-message').addEventListener('click', function() {
        let message = document.getElementById('message-input').value;
        let receiverId = document.getElementById('receiver-id').value;

        // Send the message using Axios
        axios.post('/send-message', {
            message: message,
            receiver_id: receiverId
        })
        .then(response => {
            console.log('Message sent successfully');
            document.getElementById('message-input').value = ''; // Clear the input field
        })
        .catch(error => {
            console.error('Error sending message:', error);
        });
    });
</script>

@endsection
