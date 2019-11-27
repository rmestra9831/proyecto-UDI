<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Radicado;
use App\Models\Program;
use App\Models\Motivo;
use App\Models\Role;
use App\User;

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
    public function showDir(Request $request, User $admin){
        $users= User::where('sede',Auth::user()->sede)->get();
        $radicados= Radicado::where('sede',Auth::user()->sede)->orderBy('id', 'DESC')->get();
        $programas= $this->programas;
        $roles = $this->roles;
        $radic = $admin;

        
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
    public function showProg(User $admin){
        $users= User::where('sede',Auth::user()->sede)->get();
        $radicados= Radicado::where('sede',Auth::user()->sede)->orderBy('id', 'DESC')->get();
        $programas= Program::where('sede',Auth::user()->sede)->get();
        $roles = $this->roles;
        $radic = $admin;
        return view('superAdmin.showprogram', compact('radicados','radic','programas','users', 'roles'));

    }
    public function showRadics(User $admin){
        $users= User::where('sede',Auth::user()->sede)->get();
        $radicados= Radicado::where('sede',Auth::user()->sede)->orderBy('id', 'DESC')->get();
        $programas= Program::where('sede',Auth::user()->sede)->get();
        $roles = $this->roles;
        $radic = $admin;
        return view('admin.showradics', compact('radicados','radic','programas','users', 'roles'));

    }

}
