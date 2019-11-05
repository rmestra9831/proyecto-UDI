<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\SendReminder;
use Illuminate\Support\Facades\Mail;

class SendMailDirection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'enviando correo de información';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $subject = 'esto es la prueba del correo';
        Mail::to('pruebasudi2019@gmail.comgmail.com')->send(new SendReminder($subject));
    }
}
