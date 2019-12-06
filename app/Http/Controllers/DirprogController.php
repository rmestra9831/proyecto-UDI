<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Radicado;
use App\Models\Program;
use App\Models\Motivo;
use App\User;
use App\Models\FechRadic;


class DirprogController extends Controller
{
    public function __construct(){
        $this->programas = Program::get();
        $this->users = User::get();
    }

    public function index(){
        $radicados = Radicado::where('sede',Auth::user()->sede)
        ->where(function ($query) {
            $id_progm_dir = Auth::user()->program_id;
            $query->where('delegate_id', '=', $id_progm_dir);})
            ->orderBy('id', 'DESC')->get();
        $users = $this->users;
        $programas = $this->programas;

        return view('dir_prog.home', compact('radicados','programas','users'));
    }

    public function showinfoRadic(Radicado $dirprog){
        // dd($dirprog);
        $users = $this->users;
        $programas = $this->programas;
        $radicado = $dirprog;
        return view('dir_prog.showRadic', compact('radicado','programas','users'));
    }

    public function saveRequest (UpdateRespuestaRequest $request, Radicado $direction){
        
        return redirect()->route('direction.edit',[$direction])->with('status','Respuesta guardada');
    }

}
