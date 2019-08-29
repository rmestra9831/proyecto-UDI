<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRadicadoRequest;
use App\Models\Radicado;
use App\Models\Program;
use App\Models\Motivo;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\FechRadic;
use App\Mail\SendUrgenteMail;
use App\Mail\SendEstudMail;
use App\Mail\SendDirMail;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegctrolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $users= User::get();
        $radicados= Radicado::orderBy('id', 'DESC')->get();
        $programas= Program::get();

        return view('regctrol.home', compact('radicados','programas','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $radicado= Radicado::all();
        $programas= Program::all();
        $motivos= Motivo::orderBy('name', 'ASC')->get();
        $id = DB::table('fech_radics')->select('id_radicado')->latest()->take(1)->value('id_radicado');
        $num_more= str_pad($id, 4, "0", STR_PAD_LEFT);
        $year= date('d/m/Y');
        
        return view('regctrol.createRadic', compact('radicado','programas','motivos','num_more','year'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRadicadoRequest $request)
    {
        //variables
        $year = date("d/m/Y");
        $fech_start_radic = date("Y/m/d");
        $time_start_radic = date('h:i:s A');
        $radicado =new Radicado();
        $motivos = Motivo::all();
        $programas =Program::all();
        $id = DB::table('fech_radics')->select('id_radicado')->latest()->take(1)->value('id_radicado');
        
        $cont_id_string = str_pad($id, 4, "0", STR_PAD_LEFT);       
        $radicado->fechradic_id = $cont_id_string;

        $id_rad = $id + 1;
        FechRadic::create([
            'id_radicado'=> $id_rad
        ]);
    //otras variables
        $radicado->atention = $request->input('atention');
        $radicado->name = $request->input('name');
        $radicado->last_name = $request->input('last_name');
        $radicado->year = $year;
        $radicado->program_id = $request->input('program_id');
        $radicado->sendTo_id = $request->input('sendTo_id');
        $radicado->user_id = auth()->user()->id;
        $radicado->motivo_id = $request->input('motivo_id');
    /* ------llenar el campo con la variable del motivo------ */
        if ($request->input('asunto') == '') {
            foreach ($motivos as $motivo) {
                if ($request->input('motivo_id') == $motivo->id) {
                    $radicado->asunto = $motivo->name;
                }
            }
        }else {
            $radicado->asunto = $request->input('asunto');
        };
    /* ------------------ */
        $radicado->origen_cel = $request->input('origen_cel');
        $radicado->origen_correo = $request->input('origen_correo');
    /* ------auto llenar campo observaciones----- */
        if ($request->input('observaciones') == '') {
            $radicado->observaciones = 'N/a';
        }else {
            $radicado->observaciones = $request->input('observaciones');
        };
    /* ------------------ */
        $radicado->fech_start_radic = $fech_start_radic;
        $radicado->time_start_radic = $time_start_radic;
        $radicado->slug = date("Ymd").$request->input('name').date('h_i_s').$request->input('last_name');
        $radicado->save();
    //validar tipo de atencion para enviar correo
        if ($radicado->atention == "urgente") {

            $mail= 'direccion@maxmail.in';
            $subject= 'Atención Inmediata R#'.$radicado->fechradic_id.'-'.$radicado->year;
            $messaje= 'mensaje de prueba';
            Mail::to($mail)->send(new SendUrgenteMail($subject, $messaje, $radicado, $programas));
    //enviado correo director programa
            foreach ($programas as $programa) {
                if ($programa->id == $radicado->sendTo_id) {
                    if ($radicado->sendTo_id == 1) {
                        
                    }else {
                        $mailDir= $programa->correo_director;
                        $subjectDir= 'Atención Inmediata R#'.$radicado->fechradic_id.'-'.$radicado->year;
                        $messajeDir= 'mensaje de prueba';

                        Mail::to($mailDir)->send(new SendDirMail($subjectDir, $messajeDir, $radicado));
                    }
                }
            }
            
        }else{
            foreach ($programas as $programa) {
                if ($programa->id == $radicado->sendTo_id) {
                    $mailDirN= $programa->correo_director;
                }
            }
            
            $subjectDirN= 'Nuevo Radicado #'.$radicado->fechradic_id.'-'.$radicado->year;
            $messajeDirN= 'mensaje de prueba';
            
            Mail::to($mailDirN)->send(new SendDirMail($subjectDirN, $messajeDirN,$radicado));
        }

        return redirect()->route('reg-ctrol.index')->with('status','Radicado '.$radicado->fechradic_id.'-'.$radicado->year.' Creado exitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Radicado $reg_ctrol)
    {
        $users= User::get();
        $radicados= Radicado::orderBy('id', 'DESC')->get();
        $programas= Program::all();
        
        $radicado = $reg_ctrol;
        
        return view('regctrol.showRadic', compact('radicado','programas','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // UPDATES     
    public function update(Request $request, Radicado $reg_ctrol)
    {
        $radicado = $reg_ctrol;

        $radicado->fill($request->except(
            'fech_recive_radic',
            'time_recive_radic',
            'fech_recive_dir',
            'time_recive_dir',
            'fech_notifi_end',
            'time_notifi_end',
            'fech_delivered',
            'time_delivered'
        ));
        $radicado->save();
        return redirect()->route('reg-ctrol.edit',[$reg_ctrol])->with('status','Radicado #'.$radicado->fechradic_id.'-'.$radicado->year.' enviado exitosamente');
        //return 'Actualizado';
    }

    public function updateMailEst(Request $request, Radicado $reg_ctrol){
        $radicado = $reg_ctrol;

        $radicado->fill($request->except(
            'fech_send_dir',
            'time_send_dir',
            'fech_recive_dir',
            'time_recive_dir',
            'fech_recive_radic',
            'time_recive_radic',
            'fech_delivered',
            'time_delivered'
        ));
        $radicado->save();

        $mail= $radicado->origen_correo;        
        
        $subject= 'Rta Radicado #'.$radicado->fechradic_id.'-'.$radicado->year; 
        Mail::to($mail)->send(new SendEstudMail($subject, $radicado));

        return redirect()->route('reg-ctrol.edit',[$reg_ctrol])->with('status','Radicado '.$radicado->fechradic_id.'-'.$radicado->year.' recivido correctamente ');

    }
    public function updateDelivered(Request $request, Radicado $reg_ctrol)
    {
        $radicado = $reg_ctrol;

        $radicado->fill($request->except(
            'fech_recive_radic',
            'time_recive_radic',
            'fech_recive_dir',
            'time_recive_dir',
            'fech_notifi_end',
            'time_notifi_end'
        ));
        $radicado->save();
        return redirect()->route('reg-ctrol.index',[$reg_ctrol])->with('status','Radicado #'.$radicado->fechradic_id.'-'.$radicado->year.' entregado exitosamente');
        //return 'Actualizado';
    }
    // ELIMINAR
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //personalizado
    public function sendEmail(Radicado $reg_ctrol){
        $programas = Program::all();
        $radicado = $reg_ctrol;
        
        return view('regctrol.sendMailEst', compact('radicado','programas'));
    }
    public function restarFechRadic(){
        FechRadic::create([
            'id_radicado'=> 0
        ]);

        return redirect()->route('reg-ctrol.index')->with('Se ah resetado exitosamente el contador de radicados');
    }
    
    
}
