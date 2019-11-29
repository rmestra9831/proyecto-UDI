<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendDirProgMail;
use App\Models\Radicado;
use App\Models\Program;
use App\Models\Motivo;
use App\Models\Sede;
use App\Models\Role;
use App\User;
use Storage;
use DataTables;


class AdminController extends Controller
{
    public function __construct(){
        $this->programas = Program::get();
        $this->motivos = Motivo::get();
        $this->roles = Role::get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users= User::where('sede',Auth::user()->sede)->get();
        $radicados= Radicado::where('sede',Auth::user()->sede)->orderBy('id', 'DESC')->get();
        $roles = $this->roles;
        $programas= $this->programas;
        $radicados_recibidos = Radicado::where([['sede',Auth::user()->sede],['fech_send_dir','!=',null]])->orderBy('id', 'DESC')->get();

        return view('admin.home', compact('radicados','programas','users','radicados_recibidos','roles'));
    }
    //registart Directores
    public function registerDir(Request $request)
    {
        $programa = new Program();

        $programa->name_dir = $request->input('name_dir');
        if (!$request->input('name')) {
            $programa->name = "N/a";          
        }if (!$request->input('correo_director')) {
            $programa->correo_director = "N/a";          
        }
        $programa->save();

        return redirect()->route('admin.showUsers')->with('status','Usuario creado satisfactoriamente');
    }
    //redireccionar a la pagina de mostrar radicado

    //controler editar Directores
    public function dirgEdit_ctrl(Request $request, Program $admin){

        $programa = $admin;
        $programa->name_dir = $request->input('name_dir');
        $programa->save();
        return redirect()->route('admin.dirEdit',[$admin])->with('status','Director Actualizado');

    }
    //controler editar programas
    public function progEdit_ctrl(Request $request, Program $admin){

        $programa = $admin;
        $programa->name= $request->input('name');
        $programa->correo_director= $request->input('correo_director');
        $programa->save();
        return redirect()->route('admin.progEdit',[$admin])->with('status','Programa Actualizado');

    }
    //vista editar Directores
    public function dirEdit(Request $request, Program $admin){

        $programas= $admin;
        $radicados= Radicado::where('sede',Auth::user()->sede)->orderBy('id', 'DESC')->get();
        $roles = $this->roles;
    
        return view('admin.editDir', compact('radicados','programas','roles'));

    }
    //vista editar Programas
    public function progEdit(Program $admin){

        $programas= $admin;
        $radicados= Radicado::where('sede',Auth::user()->sede)->orderBy('id', 'DESC')->get();
        $roles = $this->roles;

        return view('admin.editProg', compact('radicados','programas','roles'));
    }

    public function ShowRadic(Radicado $admin){
        $users= User::where('sede',Auth::user()->sede)->get();
        $programas= $this->programas;
        $radicado = $admin;

        return view('admin.showRadic', compact('radicado','programas','users'));
    }
    //salvar la respuesta del administrador
    public function saveRequest (Request $request, Radicado $admin)
    {
        $radicado = $admin;
        $radicado->fill($request->except(
            'fech_send_dir',
            'time_send_dir',
            'fech_recive_dir',
            'time_recive_dir',
            'fech_notifi_end',
            'time_notifi_end',
            'respond_id'
        ));
        $radicado->save();
        return redirect()->route('admin.ShowRadic',[$admin])->with('status','Respuesta guardada');
    }
    public function showRadics(User $admin){
        $users= User::where('sede',Auth::user()->sede)->get();
        $radicados= Radicado::where('sede',Auth::user()->sede)->orderBy('id', 'DESC')->get();
        $programas= Program::where('sede',Auth::user()->sede)->get();
        $roles = $this->roles;
        $radic = $admin;
        return view('admin.showradics', compact('radicados','radic','programas','users', 'roles'));
    }

    //delegar quien responde el radicado
    public function asingDelegate(Request $request, Radicado $admin){
        // dd($request->input('delegate_id'));
        $radicado = $admin;
        $radicado->delegate_id = $request->input('delegate_id');
        $radicado->save();
        // enviando correo
        $programas =Program::all();
        $users =User::all();
        $sedes =Sede::all();
        if ($radicado->atention == 'urgente') {
            foreach ($programas as $programa) {
                if ($programa->id == $radicado->delegate_id) {                
                    $mailDirProg= $programa->correo_director;
                    $subjectDirProg= 'Atención Inmediata R#'.$radicado->fechradic_id.'-'.$radicado->year;
                    $messajeDirProg= 'mensaje de prueba';
                    foreach ($users as $key => $user) {
                        if ($user->program_id == $radicado->delegate_id) {
                            foreach ($sedes as $sede) {
                                if ($radicado->sede == $sede->id) {
                                    $sede_dir = $sede->name;
                                }
                            }
                            $name_dir = $user->name;
                        }
                    }
                    Mail::to($mailDirProg)->send(new SendDirProgMail($subjectDirProg, $radicado, $name_dir, $sede_dir));                
                }
            }
        }else{
            foreach ($programas as $programa) {
                if ($programa->id == $radicado->delegate_id) {
                    $mailDirProg= $programa->correo_director;
                    $subjectDirProg= 'Nuevo Radicado R#'.$radicado->fechradic_id.'-'.$radicado->year;
                    $messajeDirProg= 'mensaje de prueba';
                    foreach ($users as $key => $user) {
                        if ($user->program_id == $radicado->delegate_id) {
                            foreach ($sedes as $sede) {
                                if ($radicado->sede == $sede->id) {
                                    $sede_dir = $sede->name;
                                }
                            }
                            $name_dir = $user->name;
                        }
                    }
                    Mail::to($mailDirProg)->send(new SendDirProgMail($subjectDirProg, $radicado, $name_dir, $sede_dir));                
                }
            }
        }   
        return redirect()->route('admin.ShowRadic',[$admin])->with('status','La solicitud de respuesta a sido emitida');
    }
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
}