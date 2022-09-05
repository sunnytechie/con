<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class prayerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $compose;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $message, $email, $username)
    {
        $this->compose = [
            'subject' => $subject,
            'message' => $message,
            'email' => $email,
            'username' => $username,
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.prayer-mail')
        ->subject($this->compose['subject']);
    }
}
