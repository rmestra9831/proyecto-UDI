<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEstudMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $sub;
    public $data;
    public function __construct($subject,$radicado)
    {
        $this->sub = $subject;
        $this->data = $radicado;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_subject = $this->sub;
        $e_data = $this->data;

        return $this->view('mail.form_est', compact('e_data'))->subject($e_subject);
    }
}
