<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Radicado;
use App\Models\Program;
use App\Models\Motivo;
use App\Models\Role;
use App\User;
use Hash;

class SuperadmController extends Controller
{
    public function __construct(){
        $this->programas = Program::get();
        $this->motivos = Motivo::get();
        $this->roles = Role::get();
    }
    
    public function index()
    {
        $users= User::where('sede',Auth::user()->sede)->get();
        $radicados= Radicado::where('sede',Auth::user()->sede)->orderBy('id', 'DESC')->get();
        $programas= $this->programas;
        $radicados_recibidos = Radicado::where([['sede',Auth::user()->sede],['fech_send_dir','!=',null]])->orderBy('id', 'DESC')->get();
        return view('superAdmin.home', compact('radicados','programas','users','radicados_recibidos'));
    }

    public function showUsers(User $superAdm){
        $users= User::where('sede',Auth::user()->sede)->get();
        $radicados= Radicado::where('sede',Auth::user()->sede)->orderBy('id', 'DESC')->get();
        $programas= Program::where('sede',Auth::user()->sede)->get();
        $roles = $this->roles;
        $radic = $superAdm;

        return view('superAdmin.showusers', compact('radicados','radic','programas','users', 'roles'));

    }
    public function showDir(Request $request, User $superAdm){
        $users= User::where('sede',Auth::user()->sede)->get();
        $radicados= Radicado::where('sede',Auth::user()->sede)->orderBy('id', 'DESC')->get();
        $programas= $this->programas;
        $roles = $this->roles;
        $radic = $superAdm;

        
        // if ($request->ajax()) {
        //     $data = $programas;
        //     return DataTables::of($data)
        //             ->addIndexColumn()
        //             ->addColumn('action', ['admin.actions'])
        //             ->rawColumns(['action'])
        //             ->make(true);
        // }
        // else {
        //     return 'no es ajax';
        // }


        return view('superAdmin.showdir', compact('radicados','radic','programas','users', 'roles'));

    }
    public function showProg(User $superAdm){
        $users= User::where('sede',Auth::user()->sede)->get();
        $radicados= Radicado::where('sede',Auth::user()->sede)->orderBy('id', 'DESC')->get();
        $programas= Program::where('sede',Auth::user()->sede)->get();
        $roles = $this->roles;
        $radic = $superAdm;
        return view('superAdmin.showprogram', compact('radicados','radic','programas','users', 'roles'));

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
      

}