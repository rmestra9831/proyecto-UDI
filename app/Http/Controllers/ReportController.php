<?php

namespace App\Http\Controllers;

use App\Models\Radicado;
use App\Models\Program;
use App\Models\Motivo;
use App\User;
use Illuminate\Http\Request;
use App\Exports\ReportExport;
use App\Exports\ReportMotivo;
use App\Exports\ReportPrograma;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index(){

        $users= User::get();
        $radicados= Radicado::orderBy('id', 'DESC')->get();
        $programas= Program::get();
        $motivos= Motivo::get();

        return view('export.home', compact(
            'radicados',
            'programas',
            'users',
            'motivos'));
    }

    public function ExportAR(){
        return Excel::download(new ReportExport, 'radicados.xlsx');
    }

    public function ExportMotivo(Request $request){
        //variables
        $motivo= $request->get('motivo');

        return Excel::download(new ReportMotivo($motivo), 'radicados_por_Motivo.xlsx');
    }

    public function ExportPrograma(Request $request){
        //variables
        $programa= $request->get('programa');

        return Excel::download(new ReportPrograma($programa), 'radicados_por_Programa.xlsx');
    }


}
