<?php

namespace App\Exports;

use App\Models\Radicado;
use App\Models\Program;
use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;

class ReportMotivo implements FromView, ShouldQueue
{
    public $motivo;

    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($motivo)
    {
        $this->motivo = $motivo;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $motivo = $this->motivo;
        return view('export.forMotivo', [
            'radicados' => Radicado::orderBy('id', 'DESC')->motivo($motivo)->get(),
            'programas' => Program::get(),
            'users' => User::all()
        ]);
    }
}
