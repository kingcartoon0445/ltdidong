<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $HovaTen;
    public $token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($HovaTen, $token)
    {
        $this->HovaTen = $HovaTen;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.forgot-password')->with([
            'HovaTen' => $this->HovaTen,
            'Token' => $this->token
        ]);
    }
}
