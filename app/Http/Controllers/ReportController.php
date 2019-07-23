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
use App\Exports\ReportExportFilter;
use App\Exports\ReportAdmAR;
use App\Exports\ReportAdmDir;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    //variables globales
    public $radicados;
    public $programas;

    public function __construct(){
        $this->radicados = Radicado::orderBy('id', 'DESC')->get();
        $this->programas = Program::get();
        $this->motivos = Motivo::orderBy('name', 'ASC')->get();;
    }

    public function index(Request $request){
        //valores de filtrado
        $name = $request->get('name');
        $last_name = $request->get('last_name');
        $get_programa= $request->get('programa');
        $get_motivo= $request->get('motivo');
        $start= $request->get('start');
        $end= $request->get('end');
        
        $r_by_all = Radicado::orderBy('id', 'DESC')
            ->name($name)
            ->lastname($last_name)
            ->programa($get_programa)
            ->motivo($get_motivo)
            ->Dates($start, $end)
        ->get();
        $r_by_all_dir = Radicado::orderBy('id', 'DESC')->where('fech_send_dir','!=','null')
            ->name($name)
            ->lastname($last_name)
            ->programa($get_programa)
            ->motivo($get_motivo)
            ->Dates($start, $end)
        ->get();
        

        $users= User::get();
        $radicados= Radicado::orderBy('id', 'DESC')->get();
        $programas= Program::get();
        $motivos= Motivo::orderBy('name', 'ASC')->get();

        return view('export.home', compact(
            'r_by_all_dir',
            'r_by_all',
            'radicados',
            'programas',
            'users',
            'motivos'));
    }
    //index de generador de reportes de la seccion de administrador
    public function indexAR(Request $request){
        //valores de filtrado
        $name = $request->get('name');
        $last_name = $request->get('last_name');
        $get_programa= $request->get('programa');
        $get_motivo= $request->get('motivo');
        $start= $request->get('start');
        $end= $request->get('end');
        
        $r_by_all = Radicado::orderBy('id', 'DESC')
            ->name($name)
            ->lastname($last_name)
            ->programa($get_programa)
            ->motivo($get_motivo)
            ->Dates($start, $end)
        ->get();

        $users= User::get();
        $radicados= Radicado::orderBy('id', 'DESC')->get();
        $programas= Program::get();
        $motivos= Motivo::orderBy('name', 'ASC')->get();

        return view('export.homeAR-adm', compact(
            'r_by_all',
            'radicados',
            'programas',
            'users',
            'motivos'));
    }
    public function indexDir(Request $request){
        //valores de filtrado
        $name = $request->get('name');
        $last_name = $request->get('last_name');
        $get_programa= $request->get('programa');
        $get_motivo= $request->get('motivo');
        $start= $request->get('start');
        $end= $request->get('end');
    
        $r_by_all_dir = Radicado::orderBy('id', 'DESC')->where('fech_send_dir','!=','null')
            ->name($name)
            ->lastname($last_name)
            ->programa($get_programa)
            ->motivo($get_motivo)
            ->Dates($start, $end)
        ->get();

        $users= User::get();
        $radicados= $this->radicados;
        $programas= $this->programas;
        $motivos= $this->motivos;

        return view('export.homeDir-adm', compact(
            'r_by_all_dir',
            'radicados',
            'programas',
            'users',
            'motivos'));
    }

    //este es el filtrado completo para realizar los reportes
    public function ExportFilter(Request $request){
        $name = $request->get('name');
        $last_name = $request->get('last_name');
        $get_programa= $request->get('programa');
        $get_motivo= $request->get('motivo');
        $start= $request->get('start');
        $end= $request->get('end');

        $date = date('d:m:Y');
            return Excel::download(new ReportExportFilter(
            $name,
            $last_name,
            $get_programa,
            $get_motivo,
            $start,
            $end
        ), ''.$date.'_reportes_radicados.xlsx');
    }
    //este es el filtrado completo para realizar los reportes Administrador
    public function ExportAdmDir(Request $request){
        $name = $request->get('name');
        $last_name = $request->get('last_name');
        $get_programa= $request->get('programa');
        $get_motivo= $request->get('motivo');
        $start= $request->get('start');
        $end= $request->get('end');

        $date = date('d:m:Y');
            return Excel::download(new ReportAdmDir(
            $name,
            $last_name,
            $get_programa,
            $get_motivo,
            $start,
            $end
        ), ''.$date.'_reportes_radicados.xlsx');
    }
    public function ExportAdmAR(Request $request){
        $name = $request->get('name');
        $last_name = $request->get('last_name');
        $get_programa= $request->get('programa');
        $get_motivo= $request->get('motivo');
        $start= $request->get('start');
        $end= $request->get('end');

        $date = date('d:m:Y');
            return Excel::download(new ReportAdmAR(
            $name,
            $last_name,
            $get_programa,
            $get_motivo,
            $start,
            $end
        ), ''.$date.'_reportes_radicados.xlsx');
    }
    //estos filtrados son por tipo, los cuales puede ser agregador si el cliente desea
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
