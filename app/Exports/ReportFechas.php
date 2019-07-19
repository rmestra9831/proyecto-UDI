<?php

namespace App\Exports;

use App\Models\Radicado;
use App\Models\Program;
use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;

class ReportFechas implements FromView, ShouldQueue
{
    public $start;
    public $end;

    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $start = $this->start;
        $end = $this->end;
        return view('export.forProgram', [
            'radicados' => Radicado::orderBy('id', 'DESC')->Dates($start, $end)->get(),
            'programas' => Program::get(),
            'users' => User::all()
        ]);
    }
}
