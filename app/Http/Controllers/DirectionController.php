<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Radicado;
use App\Models\Program;
use App\User;
use App\Http\Requests\UpdateRespuestaRequest;

class DirectionController extends Controller
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
        $programas= Program::all();

        return view('direction.home', compact('radicados','programas','users'));
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
        $users= User::get();
        $programas= Program::all();
        $radicado = $direction;

        return view('direction.showRadic', compact('radicado','programas','users'));
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
    public function saveRequest (UpdateRespuestaRequest $request, Radicado $direction)
    {
        $radicado = $direction;
        $radicado->fill($request->except(
            'fech_send_dir',
            'time_send_dir',
            'fech_recive_dir',
            'time_recive_dir',
            'fech_notifi_end',
            'time_notifi_end'
        ));
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
