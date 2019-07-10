<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendDirMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subj;
    public $mess;
    public $data;
    public function __construct($subjectDirN, $messajeDirN, $data)
    {
        $this->subj = $subjectDirN;
        $this->mess = $messajeDirN;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_subject = $this->subj;
        $e_messaje = $this->mess;
        $e_data = $this->data;
        
        return $this->view('mail.dir', compact('e_messaje','e_data'))->subject($e_subject);
    }
}
