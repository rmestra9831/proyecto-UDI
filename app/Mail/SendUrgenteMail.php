<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendUrgenteMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $sub;
    public $mess;
    public $data;
    public $prog;
    public function __construct($subject, $messaje, $data, $programas)
    {
        $this->sub = $subject;
        $this->mess = $messaje;
        $this->data = $data;
        $this->prog = $programas;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $e_subject = $this->sub;
        $e_messaje = $this->mess;
        $e_data = $this->data;
        $e_programas = $this->prog;

        return $this->view('mail.urgente', compact('e_messaje','e_data','e_programas'))->subject($e_subject);
    }
}
