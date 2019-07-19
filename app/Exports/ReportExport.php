<?php

namespace App\Exports;

use App\Models\Radicado;
use App\Models\Program;
use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReportExport implements FromView, ShouldQueue
{   

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('export.allRadic', [
            'radicados' => Radicado::orderBy('id', 'DESC')->get(),
            'programas' => Program::all(),
            'users' => User::all()
        ]);
    }
    
}
