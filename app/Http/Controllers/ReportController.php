<?php

namespace App\Http\Controllers;

use App\Radicado;
use Illuminate\Http\Request;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function ExportAR(){
        return Excel::download(new ReportExport, 'radicados.xlsx');
    }
}
