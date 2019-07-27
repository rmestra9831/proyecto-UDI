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

    public function ShowRadic(Radicado $admin){
        $users= $this->users;
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
