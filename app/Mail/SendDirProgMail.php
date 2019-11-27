<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Storage;

class SendDirProgMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subj;
    public $data;
    public $user;
    public $sede;
    public function __construct($subj, $data, $user, $sede)
    {
        $this->subj = $subj;
        $this->data = $data;
        $this->user = $user;
        $this->sede = $sede;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.dirProg')->subject($this->subj);
    }
}
