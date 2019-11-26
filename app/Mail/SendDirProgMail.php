<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Sede;
use App\Models\Program;
use App\Models\User;

class SendDirProgMail extends Mailable implements ShouldQueue
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
        $e_sedes = Sede::all();
        $e_programas = Program::where('sede',Auth::user()->sede)->get();
        $e_users = User::where('sede',$e_data->sede)->get();
        
        return $this->view('mail.dirProg', compact('e_messaje','e_data','e_sedes','e_programas','e_users'))->subject($e_subject);
    }
}