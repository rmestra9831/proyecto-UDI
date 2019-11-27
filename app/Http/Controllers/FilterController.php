<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Radicado;
use App\Models\Program;
use App\Models\Motivo;
use App\Models\Role;
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
            $radicados= Radicado::where('sede',Auth::user()->sede)->orderBy('id', 'DESC')->get();
            $query_norm = Radicado::orderBy('id', 'DESC')->whereNull('fech_send_dir')
            ->name($name)
            ->lastname($last_name)
            ->numradic($fechradic_id)
            ->motivo($motivo)
            ->programa($programa)->get();
        //filtrdo de enviados    
            $query_send = Radicado::orderBy('id', 'DESC')->where([
                ['fech_send_dir','!=',' '],
                ['fech_recive_dir',null],['sede',Auth::user()->sede]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de recibidos            
            $query_recive = Radicado::orderBy('id', 'DESC')->where([
                ['fech_recive_dir','!=',' '],
                ['fech_notifi_end',null],
                ['respuesta',null],['sede',Auth::user()->sede]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de respondidos            
            $query_response = Radicado::orderBy('id', 'DESC')->where([
                ['respuesta','!=',' '],
                ['fech_notifi_end',null],
                ['fech_recive_radic',null],
                ['fech_delivered',null],['sede',Auth::user()->sede]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de recibido registro y control            
            $query_reciverg = Radicado::orderBy('id', 'DESC')->where([
                ['fech_recive_radic','!=',' '],
                ['respuesta','!=',' '],  
                ['fech_notifi_end',null],
                ['fech_delivered',null],['sede',Auth::user()->sede]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de entregados           
            $query_entregado = Radicado::orderBy('id', 'DESC')->where([
                // ['fech_notifi_end','!=',' '],
                ['fech_delivered','!=',' '],['sede',Auth::user()->sede]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de pendientes           
            $query_pendiente = Radicado::orderBy('id', 'DESC')->where([
                ['fech_recive_radic','!=',' '],
                ['fech_delivered',null],['sede',Auth::user()->sede]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de importantes           
            $query_important = Radicado::orderBy('id', 'DESC')->where([
                ['atention','=','urgente '],['sede',Auth::user()->sede]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
            
                $roles = Role::get();
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
                    'roles',
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
            $radicados= Radicado::where([['sede',Auth::user()->sede],['delegate_id',Auth::user()->program_id]])->orderBy('id', 'DESC')->get();
            // $radicados= Radicado::orderBy('id', 'DESC')->get();
            $query_norm = Radicado::orderBy('id', 'DESC')->whereNull('fech_send_dir')
            ->name($name)
            ->lastname($last_name)
            ->numradic($fechradic_id)
            ->motivo($motivo)
            ->programa($programa)->get();#->paginate(1)
        //filtrdo de recibidos            
            $query_recive_dir = Radicado::orderBy('id', 'DESC')->where([
                ['delegate_id',Auth::user()->program_id],
                ['fech_notifi_end',null],
                ['respuesta',null]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo para responder          
            $query_responder_dir = Radicado::orderBy('id', 'DESC')->where([
                ['delegate_id',Auth::user()->program_id],
                ['fech_recive_dir',!null],
                ['respuesta',null]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo para revisar        
            $query_revisar_dir = Radicado::orderBy('id', 'DESC')->where([
                ['delegate_id',Auth::user()->program_id],
                ['revisar',true]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de respondidos            
            $query_response_dir = Radicado::orderBy('id', 'DESC')->where([
                ['delegate_id',Auth::user()->program_id],
                ['respuesta','!=',null]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de entregados           
            $query_entregado_dir = Radicado::orderBy('id', 'DESC')->where([
                ['delegate_id',Auth::user()->program_id],
                ['fech_recive_radic','!=',' ']])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de pendientes           
            $query_pendiente_dir = Radicado::orderBy('id', 'DESC')->where([
                ['delegate_id',Auth::user()->program_id],
                ['fech_recive_dir','!=',' '],
                ['fech_recive_radic',null],
                ['aproved',!false]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de importantes           
            $query_important_dir = Radicado::orderBy('id', 'DESC')->where([
                ['delegate_id',Auth::user()->program_id],
                ['atention','=','urgente '],])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
            // dd($query_responder_dir);
                $roles = Role::get();
                return view('filter.search-radic-dir', compact(
                    'query_recive_dir',
                    'query_response_dir',
                    'query_responder_dir',
                    'query_revisar_dir',
                    'query_entregado_dir',
                    'query_pendiente_dir',
                    'query_important_dir',
                    'radicados',
                    'motivos',
                    'programas',
                    'roles',
                    'users'
                ));
       
    }
    public function viewSearchRadicDir_prog(Request $request){      
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
        $radicados= Radicado::where([['sede',Auth::user()->sede],['delegate_id',Auth::user()->program_id]])->orderBy('id', 'DESC')->get();
        // $radicados= Radicado::orderBy('id', 'DESC')->get();
        $query_norm = Radicado::orderBy('id', 'DESC')->whereNull('fech_send_dir')
        ->name($name)
        ->lastname($last_name)
        ->numradic($fechradic_id)
        ->motivo($motivo)
        ->programa($programa)->get();#->paginate(1)
        //filtrdo de recibidos            
        $query_recive_dir = Radicado::orderBy('id', 'DESC')->where([
            ['delegate_id',Auth::user()->program_id],
            ['respuesta',null]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de respondidos            
        $query_response_dir_prog = Radicado::orderBy('id', 'DESC')->where([
            ['delegate_id',Auth::user()->program_id],
            ['respuesta','!=',null]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de entregados           
        $query_entregado_dir = Radicado::orderBy('id', 'DESC')->where([
            ['delegate_id',Auth::user()->program_id],
            ['fech_recive_radic','!=',' ']])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de pendientes           
        $query_pendiente_dir = Radicado::orderBy('id', 'DESC')->where([
            ['delegate_id',Auth::user()->program_id],
            ['revisar','!=',1],
            ['send_temp_admin',null]])->orWhere([
                ['send_temp_admin','!=',null],
                ['delegate_id',Auth::user()->program_id]
            ])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de corregir           
        $query_corregir_dir = Radicado::orderBy('id', 'DESC')->where([
            ['delegate_id',Auth::user()->program_id],
            ['revisar',true],
            //['respuesta',null], 
            ['fech_recive_radic',null]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de importantes           
        $query_important_dir = Radicado::orderBy('id', 'DESC')->where([
            ['delegate_id',Auth::user()->program_id],
            ['atention','=','urgente '],])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de aprovados           
        $query_aprovados_dir = Radicado::orderBy('id', 'DESC')->where([
            ['delegate_id',Auth::user()->program_id],
            ['aproved',true],])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
            $roles = Role::get();
            return view('filter.search-radic-dir-prog', compact(
                'query_recive_dir',
                'query_response_dir_prog',
                'query_entregado_dir',
                'query_pendiente_dir',
                'query_corregir_dir',
                'query_important_dir',
                'query_aprovados_dir',
                'radicados',
                'motivos',
                'programas',
                'roles',
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
            $radicados= Radicado::where('sede',Auth::user()->sede)->orderBy('id', 'DESC')->get();
            // $radicados= Radicado::orderBy('id', 'DESC')->get();
            $query_norm = Radicado::orderBy('id', 'DESC')->whereNull('fech_send_dir')
            ->name($name)
            ->lastname($last_name)
            ->numradic($fechradic_id)
            ->motivo($motivo)
            ->programa($programa)->get();#->paginate(1)
        //filtrdo de corregir           -- PENDIENTE POR CORREGIR 
            $query_corregir_dir = Radicado::orderBy('id', 'DESC')->where([
            ['revisar',true],
            ['fech_recive_radic',null]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de respondidos    l        
            $query_response_dir = Radicado::orderBy('id', 'DESC')->where([
                ['respuesta','!=',null]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de llegados a administrador para recivir          
            $query_recividos_admin = Radicado::orderBy('id', 'DESC')->where([
                ['fech_send_dir','!=',' '],
                ['fech_recive_dir',null]])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de entregados           
            $query_entregado_dir = Radicado::orderBy('id', 'DESC')->where([
                ['fech_recive_radic','!=',' ']])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de pendientes           
            $query_pendiente_dir = Radicado::orderBy('id', 'DESC')->where([
                ['aproved',null],
                ['fech_recive_radic',null],
                ['fech_recive_dir','!=',' '],
                ['send_temp_admin','!=',null]])
                ->orWhere([
                    ['fech_recive_dir','!=',' '],
                    ['delegate_id',null],
                ])
                ->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de importantes          
            $query_important_dir = Radicado::orderBy('id', 'DESC')->where([
                ['atention','=','urgente '],])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de aprovados    -- PENDIENTE POR CORREGIR     
                $query_aprovados_dir = Radicado::orderBy('id', 'DESC')->where([
                ['aproved',true],])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
        //filtrdo de editados     
                $query_editado_dir = Radicado::orderBy('id', 'DESC')->where([
                ['editAdmRequest','!=', null],])->name($name)->lastname($last_name)->numradic($fechradic_id)->motivo($motivo)->programa($programa)->get();
                $roles = Role::get();
                return view('filter.search-radic-adm', compact(
                    'query_recividos_admin',
                    'query_corregir_dir',
                    'query_pendiente_dir',
                    'query_aprovados_dir',
                    'query_editado_dir',
                    'radicados',
                    'motivos',
                    'programas',
                    'roles',
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
        
        if (Auth::user()->type_user == 4) {
            $radicados= Radicado::where('sede',Auth::user()->sede)->where(function ($query) {
                $id_progm_dir = Auth::user()->program_id;
                $query->where('delegate_id', '=', $id_progm_dir);})
            ->orderBy('id', 'DESC')
            ->name($name)
            ->lastname($last_name)
            ->numradic($fechradic_id)
            ->motivo($motivo)
            ->programa($programa)
            ->Dates($start_date, $end_date)
            ->paginate(25);
            $roles = Role::get();
            return view('filter.all-radic', compact(
                'radicados',
                'motivos',
                'programas',
                'roles',
                'users'
            ));

        }else{
            $radicados= Radicado::where('sede',Auth::user()->sede)->orderBy('id', 'DESC')
                ->name($name)
                ->lastname($last_name)
                ->numradic($fechradic_id)
                ->motivo($motivo)
                ->programa($programa)
                ->Dates($start_date, $end_date)
                ->paginate(25);
                $roles = Role::get();
                return view('filter.all-radic', compact(
                    'radicados',
                    'motivos',
                    'programas',
                    'roles',
                    'users'
                ));
        }
    }
}
