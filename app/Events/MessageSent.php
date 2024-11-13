<?php
namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use App\Models\User;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $message;
    public $sender;
    public $receiver;

    public function __construct($message, User $sender, User $receiver)
    {
        $this->message = $message;
        $this->sender = $sender;
        $this->receiver = $receiver;
    }

    public function broadcastOn()
    {
        // Broadcast the message to both the sender's and receiver's private channels
        return [
            new PrivateChannel('private-chat.' . $this->sender->id),
            new PrivateChannel('private-chat.' . $this->receiver->id),
        ];
    }

    public function broadcastWith()
    {
        // Specify the data to broadcast
        return [
            'message' => $this->message,
            'sender' => $this->sender->name,
            'sender_id' => $this->sender->id, 
            'receiver' => $this->receiver, 
            'senderDetail' => $this->sender,  // Add sender ID to distinguish between sent and received messages
        ];
    }
}
