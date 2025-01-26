<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RefundSendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $userRefund;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userRefund)
    {
        //
        $this->userRefund = $userRefund;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->userRefund;
       
        $imagePath = storage_path('app/public/'.$data->image);
      
        return $this->subject('Send Refund Mail')
                    ->view('emails.refundemail',compact('data'))->attach($imagePath, [
                        'as' => $data->image, // Rename the file
                        'mime' => 'image/jpeg',       // MIME type for the image
                    ]);

;
    }
}
