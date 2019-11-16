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
}
