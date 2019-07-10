<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendDirMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public $subjectDirN;
    public $messajeDirN;
    public $data;
    public function __construct($subjectDirN, $messajeDirN, $data)
    {
        $this->subj = $subjectDirN;
        $this->mess = $messajeDirN;
        $this->data = $data;
=======
    public $subject;
    public $messaje;
    public function __construct($subject, $messaje)
    {
        $this->sub = $subject;
        $this->mess = $messaje;
>>>>>>> 2a2c3721d5ed94fb8f31c1e02e8e70713d052573
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
        
        return $this->view('mail.dir', compact('e_messaje'))->subject($e_subject);
    }
}
