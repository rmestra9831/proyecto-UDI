<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Radicado;
use App\Models\Program;
use App\Models\Motivo;
use App\User;

class FilterController extends Controller
{
    public function viewSearchRadic(Request $request){   
            //variables de busqueda
            $name= $request->get('name');
            $last_name= $request->get('last_name');
            $fechradic_id= $request->get('fechradic_id');
            $motivo= $request->get('motivo');
            $programa= $request->get('programa');
            $start_date= $request->get('start');
            $end_date= $request->get('end');

            $users= User::get();
            $motivos= Motivo::orderBy('name', 'ASC')->get();
            $programas= Program::get();
            $radicados= Radicado::orderBy('id', 'DESC')->get();
            $query_norm = Radicado::orderBy('id', 'DESC')->whereNull('fech_send_dir')
            ->name($name)
            ->lastname($last_name)
            ->numradic($fechradic_id)
            ->motivo($motivo)
            ->programa($programa)->get();
        //filtrdo de enviados    
            $query_send = Radicado::orderBy('id', 'DESC')->where([
                ['fech_send_dir','!=',' '],
                ['fech_recive_dir',null]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de recibidos            
            $query_recive = Radicado::orderBy('id', 'DESC')->where([
                ['fech_recive_dir','!=',' '],
                ['fech_notifi_end',null],
                ['respuesta',null]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de respondidos            
            $query_response = Radicado::orderBy('id', 'DESC')->where([
                ['respuesta','!=',' '],
                ['fech_notifi_end',null],
                ['fech_recive_radic',null],
                ['fech_delivered',null]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de recibido registro y control            
            $query_reciverg = Radicado::orderBy('id', 'DESC')->where([
                ['fech_recive_radic','!=',' '],
                ['respuesta','!=',' '],  
                ['fech_notifi_end',null],
                ['fech_delivered',null]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de entregados           
            $query_entregado = Radicado::orderBy('id', 'DESC')->where([
                ['fech_notifi_end','!=',' '],
                ['fech_delivered','!=',' ']])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de pendientes           
            $query_pendiente = Radicado::orderBy('id', 'DESC')->where([
                ['fech_recive_radic','!=',' '],
                ['fech_delivered',null]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de importantes           
            $query_important = Radicado::orderBy('id', 'DESC')->where([
                ['atention','=','urgente '],])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
            
          
                return view('filter.search-radic', compact(
                    'query_norm',
                    'query_send',
                    'query_recive',
                    'query_response',
                    'query_reciverg',
                    'query_entregado',
                    'query_pendiente',
                    'query_important',
                    'radicados',
                    'motivos',
                    'programas',
                    'users'
                ));
       
    }
    public function viewSearchRadicDir(Request $request){   
            //variables de busqueda
            $name= $request->get('name');
            $last_name= $request->get('last_name');
            $fechradic_id= $request->get('fechradic_id');
            $motivo= $request->get('motivo');
            $programa= $request->get('programa');
            $start_date= $request->get('start');
            $end_date= $request->get('end');

            $users= User::get();
            $motivos= Motivo::orderBy('name', 'ASC')->get();
            $programas= Program::get();
            $radicados= Radicado::orderBy('id', 'DESC')->get();
            $query_norm = Radicado::orderBy('id', 'DESC')->whereNull('fech_send_dir')
            ->name($name)
            ->lastname($last_name)
            ->numradic($fechradic_id)
            ->motivo($motivo)
            ->programa($programa)->get();#->paginate(1)
        //filtrdo de recibidos            
            $query_recive_dir = Radicado::orderBy('id', 'DESC')->where([
                ['fech_recive_dir',null],
                ['fech_notifi_end',null],
                ['respuesta',null]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de respondidos            
            $query_response_dir = Radicado::orderBy('id', 'DESC')->where([
                ['respuesta','!=',null]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de entregados           
            $query_entregado_dir = Radicado::orderBy('id', 'DESC')->where([
                ['fech_recive_radic','!=',' ']])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de pendientes           
            $query_pendiente_dir = Radicado::orderBy('id', 'DESC')->where([
                ['fech_recive_dir','!=',' '],
                //['respuesta',null], 
                ['fech_recive_radic',null]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de importantes           
            $query_important_dir = Radicado::orderBy('id', 'DESC')->where([
                ['atention','=','urgente '],])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
            
          
                return view('filter.search-radic-dir', compact(
                    'query_recive_dir',
                    'query_response_dir',
                    'query_entregado_dir',
                    'query_pendiente_dir',
                    'query_important_dir',
                    'radicados',
                    'motivos',
                    'programas',
                    'users'
                ));
       
    }
    public function viewSearchRadicAdm(Request $request){   
            //variables de busqueda
            $name= $request->get('name');
            $last_name= $request->get('last_name');
            $fechradic_id= $request->get('fechradic_id');
            $motivo= $request->get('motivo');
            $programa= $request->get('programa');
            $start_date= $request->get('start');
            $end_date= $request->get('end');

            $users= User::get();
            $motivos= Motivo::orderBy('name', 'ASC')->get();
            $programas= Program::get();
            $radicados= Radicado::orderBy('id', 'DESC')->get();
            $query_norm = Radicado::orderBy('id', 'DESC')->whereNull('fech_send_dir')
            ->name($name)
            ->lastname($last_name)
            ->numradic($fechradic_id)
            ->motivo($motivo)
            ->programa($programa)->get();#->paginate(1)
        //filtrdo de recibidos            
            $query_recive_dir = Radicado::orderBy('id', 'DESC')->where([
                ['fech_recive_dir',null],
                ['fech_notifi_end',null],
                ['respuesta',null]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de respondidos            
            $query_response_dir = Radicado::orderBy('id', 'DESC')->where([
                ['respuesta','!=',null]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de entregados           
            $query_entregado_dir = Radicado::orderBy('id', 'DESC')->where([
                ['fech_recive_radic','!=',' ']])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de pendientes           
            $query_pendiente_dir = Radicado::orderBy('id', 'DESC')->where([
                ['fech_recive_dir','!=',' '],
                //['respuesta',null], 
                ['fech_recive_radic',null]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de importantes           
            $query_important_dir = Radicado::orderBy('id', 'DESC')->where([
                ['atention','=','urgente '],])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
            
          
                return view('filter.search-radic-adm', compact(
                    'query_recive_dir',
                    'query_response_dir',
                    'query_entregado_dir',
                    'query_pendiente_dir',
                    'query_important_dir',
                    'radicados',
                    'motivos',
                    'programas',
                    'users'
                ));
       
    }
    public function viewAllRadic(Request $request){

        $name= $request->get('name');
        $last_name= $request->get('last_name');
        $fechradic_id= $request->get('fechradic_id');
        $motivo= $request->get('motivo');
        $programa= $request->get('programa');
        $start_date= $request->get('start');
        $end_date= $request->get('end');

        $users= User::get();
        $programas= Program::get();
        $motivos= Motivo::orderBy('name', 'ASC')->get();
        $radicados= Radicado::orderBy('id', 'DESC')
            ->name($name)
            ->lastname($last_name)
            ->numradic($fechradic_id)
            ->motivo($motivo)
            ->programa($programa)
            ->Dates($start_date, $end_date)
            ->paginate(25);

            return view('filter.all-radic', compact(
                'radicados',
                'motivos',
                'programas',
                'users'
            ));
    }
}
