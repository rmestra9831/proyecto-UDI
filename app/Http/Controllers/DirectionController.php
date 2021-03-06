<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Radicado;
use App\Models\Role;
use App\Models\Program;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateRespuestaRequest;

class DirectionController extends Controller
{
    public function __construct(){
        $this->programas = Program::get();
        $this->users = User::get();
        $this->roles = Role::get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $radicados = Radicado::where([['sede',Auth::user()->sede]])->orderBy('id', 'DESC')->get();;
        $users = $this->users;
        $programas = $this->programas;
        $roles = $this->roles;
        return view('direction.home', compact('radicados','programas','users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'enviar correo';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Radicado $direction)
    {
        $users = $this->users;
        $programas = $this->programas;
        $radicado = $direction;
        $roles = $this->roles;
        return view('direction.showRadic', compact('radicado','programas','users','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Radicado $direction)
    {
        $radicado = $direction;

        $radicado->fill($request->except(
            'fech_send_dir',
            'time_send_dir',
            'fech_recive_dir',
            'time_recive_dir',
            'fech_notifi_end',
            'time_notifi_end',
            'respon_id'
        ));
        $radicado->save();
        return redirect()->route('direction.edit',[$direction])->with('status','Radicado Enviado exitosamente');
    }
    //Aqui se guarda la respuesta hecha del radicado
    //donde si no esta validado, si esta vacia no deja marcar como recivido
    public function saveRequest (Radicado $direction)
    {
        $radicado = $direction;
        $radicado->send_temp_admin = 1;
        $radicado->revisar = null;
        $radicado->save();
        return redirect()->route('direction.edit',[$direction])->with('status','Respuesta guardada');
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
