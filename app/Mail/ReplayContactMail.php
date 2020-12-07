<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplayContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $message;
    protected $replay;

    public function __construct(Message $message,$replay)
    {
        $this->message = $message;
        $this->replay=$replay;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $contactMessage=$this->message;
        $replay=$this->replay;
        return $this->to($this->message->email)
            ->view('back-end.emails.replay-message',compact('replay','contactMessage'));
    }
}
