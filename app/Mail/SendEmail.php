<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Carbon;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $sub;
    public $mes;
    public $non;

    public function __construct($subject, $message, $nonti_data)
    {
        $this->sub = $subject;
        $this->mes = $message;
        $this->non = $nonti_data;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_subject = $this->sub;
        $e_message = $this->mes;
        $e_nonti_data = $this->non;

        return $this->view('mail.sendemail', compact("e_message", "e_nonti_data"))->subject($e_subject);
    }
}
