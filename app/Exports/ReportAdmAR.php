<?php

namespace App\Exports;

use App\Models\Radicado;
use App\Models\Program;
use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;

class ReportAdmAR implements FromView, ShouldQueue
{
    public $name;
    public $last_name;
    public $get_programa;
    public $get_motivo;
    public $start;
    public $end;

    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($name, $last_name, $get_programa, $get_motivo, $start, $end)
    {
        $this->name = $name;
        $this->last_name = $last_name;
        $this->get_programa = $get_programa;
        $this->get_motivo = $get_motivo;
        $this->start = $start;
        $this->end = $end;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $name =$this->name;
        $last_name = $this->last_name;
        $get_programa= $this->get_programa;
        $get_motivo = $this->get_motivo;
        $start = $this->start;
        $end = $this->end;
        
        return view('export.forAdmAR', [
            'radicados' => Radicado::orderBy('id', 'DESC')
            ->name($name)
            ->lastname($last_name)
            ->programa($get_programa)
            ->motivo($get_motivo)
            ->Dates($start, $end)
            ->get(),
            'programas' => Program::get(),
            'users' => User::all()
        ]);
    }
}
