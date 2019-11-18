<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Mail\SendReminder;
use App\Models\Radicado;
use App\Models\Program;
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
        $date = Carbon::now();
        $date_year = $date->format('Y-m-d');
        $program = Program::get();
        $radicados = Radicado::get();
      
        foreach ($radicados as $radicado) {
            if ($radicado->fech_recomendate_delivery == $date_year) {
                foreach ($program as $programa) {
                    if ($radicado->program_id == $programa->id) {
                        $correo = $programa->correo_director;
                        $subject = 'ALERTA de retraso Radicado #'.$radicado->year.'-'.$radicado->fechradic_id;
                        Mail::to($correo)->send(new SendReminder($subject));
                    }
                }
            }
        }


    }
}
