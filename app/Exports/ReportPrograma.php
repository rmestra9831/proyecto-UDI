<?php

namespace App\Exports;

use App\Models\Radicado;
use App\Models\Program;
use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;

class ReportPrograma implements FromView, ShouldQueue
{
    public $programa;

    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($programa)
    {
        $this->programa = $programa;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $programa = $this->programa;
        return view('export.forProgram', [
            'radicados' => Radicado::orderBy('id', 'DESC')->programa($programa)->get(),
            'programas' => Program::get(),
            'users' => User::all()
        ]);
    }
}
