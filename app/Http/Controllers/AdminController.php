<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Radicado;
use App\Models\Program;
use App\Models\Motivo;
use App\User;

class AdminController extends Controller
{
    public function __construct(){
        $this->radicados = Radicado::orderBy('id', 'DESC')->get();
        $this->programas = Program::get();
        $this->motivos = Motivo::get();
        $this->users = User::get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= $this->users;
        $radicados= $this->radicados;
        $programas= $this->programas;

        return view('admin.home', compact('radicados','programas','users'));
    }

    public function showUsers(){
        $users= $this->users;
        $radicados= $this->radicados;
        $programas= $this->programas;

        return view('admin.showusers', compact('radicados','programas','users'));

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
