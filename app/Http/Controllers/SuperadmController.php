<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Radicado;
use App\Models\Program;
use App\Models\Motivo;
use App\Models\Role;
use App\Models\Sede;
use App\User;
use Hash;

class SuperadmController extends Controller
{
    public function __construct(){
        $this->programas = Program::get();
        $this->motivos = Motivo::get();
        $this->roles = Role::get();
        $this->sedes = Sede::get();
    }
    
    public function index()
    {
        $users= User::where('sede',Auth::user()->sede)->get();
        $dirProg= User::where('program_id','!=',null)->get();
        $radicados= Radicado::where('sede',Auth::user()->sede)->orderBy('id', 'DESC')->get();
        $programas= $this->programas;
        $radicados_recibidos = Radicado::where([['sede',Auth::user()->sede],['fech_send_dir','!=',null]])->orderBy('id', 'DESC')->get();
        return view('superAdmin.home', compact('radicados','programas','users','radicados_recibidos','dirProg'));
    }

    public function showUsers(User $superAdm){
        $users= User::get();
        $radicados= Radicado::where('sede',Auth::user()->sede)->orderBy('id', 'DESC')->get();
        $programas= Program::where('sede',Auth::user()->sede)->get();
        $roles = $this->roles;
        $radic = $superAdm;
        $sedes = $this->sedes;
        return view('superAdmin.showusers', compact('radicados','radic','programas','users', 'roles','sedes'));

    }
    //controler editar usuarios
    public function userEdit_ctrl(Request $request, User $superAdm){
        
        $user = $superAdm;
        $user->fill($request->except(
            'password'
        ));
        $user->save();
        return redirect()->route('superAdmin.shoeusers',[$superAdm])->with('status','Usuario Actualizado');

    }
    public function showDir(Request $request, User $superAdm){
        $users= User::where('program_id','!=',null)->get();
        $radicados= Radicado::where('sede',Auth::user()->sede)->orderBy('id', 'DESC')->get();
        $programas= $this->programas;
        $roles = $this->roles;
        $radic = $superAdm;
        $sedes = $this->sedes;
        return view('superAdmin.showdir', compact('radicados','radic','programas','users', 'roles','sedes'));

    }
    public function showProg(User $superAdm){
        $users= User::where('sede',Auth::user()->sede)->get();
        $radicados= Radicado::where('sede',Auth::user()->sede)->orderBy('id', 'DESC')->get();
        $programas= Program::get();
        $roles = $this->roles;
        $radic = $superAdm;
        $sedes = $this->sedes;
        return view('superAdmin.showprogram', compact('radicados','radic','programas','users', 'roles', 'sedes'));

    }
    public function showRadics(User $superAdm){
        $users= User::where('sede',Auth::user()->sede)->get();
        $radicados= Radicado::where('sede',Auth::user()->sede)->orderBy('id', 'DESC')->get();
        $programas= Program::where('sede',Auth::user()->sede)->get();
        $roles = $this->roles;
        $radic = $superAdm;
        return view('superAdmin.showradics', compact('radicados','radic','programas','users', 'roles'));
    }
     public function ShowRadic(Radicado $superAdm){
        $users= User::where('sede',Auth::user()->sede)->get();
        $programas= $this->programas;
        $radicado = $superAdm;

        return view('superAdmin.showRadic', compact('radicado','programas','users'));
    }
    //registart usuarios
    public function register(Request $request)
    {
        $user = new User();

        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('password'));
        if ($request->input('type_user') == 4 && !$request->program_id) {
            $user->type_user = $request->input('type_user');
            $user->program_id = $request->input('program_id');
            return redirect()->route('superAdm.showUsers')->with('error','Por favor seleccióne un programa para el "Director de programa"');
        }
        $user->type_user = $request->input('type_user');
        $user->program_id = null;
        $user->sede = Auth::user()->sede;

        $user->save();

        return redirect()->route('superAdm.showUsers')->with('status','Usuario creado satisfactoriamente');

    }
    //registart Programas
    public function registerProg(Request $request)
    {
        $programa = new Program();
        $programa->name = ucfirst($request->input('name'));          
        $programa->correo_director = $request->input('correo_director');          
        $programa->sede = $request->input('sede');         
        $programa->save();

        return redirect()->route('superAdm.showProg')->with('status','Usuario creado satisfactoriamente');
    }
    // eliminar programas
    public function deleteProg(Request $request, Program $superAdm){
        $programa = $superAdm->name;
        Program::where('id',$superAdm->id)->delete();
        return redirect()->route('superAdm.showProg')->with('status','Programa '.$programa.' Borrado Satisfactoriamente');
    }
    //resetear contadores
    public function showResetRadic(Sede $superAdm){
        $radicados= Radicado::where('sede',Auth::user()->sede)->orderBy('id', 'DESC')->get();
        $programas= $this->programas;
        $sedes = $this->sedes;

        return view('superAdmin.showResetRadic', compact('radicados','sedes'));
    }
    public function resetRadic(Sede $superAdm){
        $sedes = $this->sedes;
        $sede_id = Sede::find($superAdm->id);        
        $sede_id->cont_radic = 0;
        $sede_id->save();
        $delete_radic = Radicado::all();
        foreach ($delete_radic as $delete) {
            $delete->delete();
        }
        return view('superAdmin.showResetRadic', compact('sedes'))->with('status','Los registros han sido eliminados');
    }

}