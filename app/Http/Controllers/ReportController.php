<?php

namespace App\Http\Controllers;

use App\Models\Radicado;
use App\Models\Program;
use App\Models\Motivo;
use App\User;
use Illuminate\Http\Request;
use App\Exports\ReportExport;
use App\Exports\ReportFechas;
use App\Exports\ReportMotivo;
use App\Exports\ReportPrograma;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    //variables globales
    public $radicados;
    public $programas;

    public function __construct(){
        $this->radicados = Radicado::orderBy('id', 'DESC')->get();
        $this->programas = Program::get();
        $this->motivos = Motivo::get();
    }

    public function index(Request $request){
        //valores de filtrado
        $moti = $request->motivo;
        $programa = $request->programa;
        $start= $request->get('start');
        $end= $request->get('end');
        
        $r_by_motivo = Radicado::orderBy('id', 'DESC')->motivo($moti)->get();
        $r_by_programa = Radicado::orderBy('id', 'DESC')->programa($programa)->get();
        $r_by_fecha = Radicado::orderBy('id', 'DESC')->Dates($start, $end)->get();
        

        $users= User::get();
        $radicados= Radicado::orderBy('id', 'DESC')->get();
        $programas= Program::get();
        $motivos= Motivo::orderBy('name', 'ASC')->get();

        return view('export.home', compact(
            'r_by_motivo',
            'r_by_programa',
            'r_by_fecha',
            'radicados',
            'programas',
            'users',
            'motivos'));
    }

    public function ExportAR(){
        $date = date('d:m:Y');
        return Excel::download(new ReportExport, ''.$date.'_reportes_radicados.xlsx');
    }

    public function ExportMotivo(Request $request){
        //variables
        $moti = $this->motivos;
        $get_motivo= $request->get('motivo');
        if (!$get_motivo) {
            return redirect()->route('Report.index')->with('error','Por favor seleccione un campo MOTIVO para generar el reporte');
        }else{
            foreach ($moti as $motivo) {
                if ($get_motivo == $motivo->id) {
                    $s_show = $motivo->name;
                }
            }
            $date = date('d:m:Y');
            return Excel::download(new ReportMotivo($get_motivo), ''.$date.'_radicados_por_Motivo('.$s_show.').xlsx');    
        }
    }

    public function ExportPrograma(Request $request){
        //variables
        $programas = $this->programas;
        $get_programa= $request->get('programa');
        if (!$get_programa) {
            return redirect()->route('Report.index')->with('error','Por favor seleccione un campo PROGRAMA para generar el reporte');
        }else{
            foreach ($programas as $program) {
                if ($get_programa == $program->id) {
                    $s_show = $program->name;
                }
            }
            $date = date('d:m:Y');
            return Excel::download(new ReportPrograma($get_programa), ''.$date.'_radicados_por_Programa('.$s_show.').xlsx');    
        }
    }

    public function ExportFecha(Request $request){
        //variables
        $start= $request->get('start');
        $end= $request->get('end');

        return Excel::download(new ReportFechas($start, $end), 'radicados_entre_'.$start.'_'.$end.'.xlsx');
    }


}
