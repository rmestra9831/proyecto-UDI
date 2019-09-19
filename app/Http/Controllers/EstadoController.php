<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Radicado;
use Carbon\Carbon;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Radicado $status)
    {
        $radicado = $status;

        $radicado->fill($request->except(
            'fech_send_dir',
            'time_send_dir',
            'fech_recive_radic',
            'time_recive_radic',
            'fech_notifi_end',
            'time_notifi_end',
            'revisar',
            'aproved',
            'openAdm'
        ));
        $radicado->save();
        return redirect()->route('admin.ShowRadic',[$status])->with('status','Radicado '.$radicado->fechradic_id.'-'.$radicado->year.' recivido correctamente ');

    }
    public function openRadicAdm(Request $request, Radicado $status){
        $radicado = $status;
        
        $radicado->fill($request->except(
            'fech_send_dir',
            'time_send_dir',
            'fech_recive_radic',
            'time_recive_radic',
            'fech_notifi_end',
            'time_notifi_end',
            'time_recive_dir',
            'fech_recive_dir',
            'revisar',
            'aproved'
        ));
        $radicado->save();
        return redirect()->route('admin.ShowRadic',[$status])->with('status','Radicado '.$radicado->fechradic_id.'-'.$radicado->year.' Abierto correctamente ');
    }
    // Mandar la solicitud de revisar la respuesta del radicado
    public function revisar(Request $request, Radicado $status){
        $radicado = $status;
        
        $radicado->fill($request->except(
            'fech_send_dir',
            'time_send_dir',
            'fech_recive_radic',
            'time_recive_radic',
            'fech_notifi_end',
            'time_notifi_end',
            'time_recive_dir',
            'fech_recive_dir',
            'aproved'
        ));
        $radicado->save();
        return redirect()->route('admin.ShowRadic',[$status])->with('status','Radicado '.$radicado->fechradic_id.'-'.$radicado->year.' en Revisión ');

    }
    // Mandar la solicitud de revisar la respuesta del radicado
    public function aprovado(Request $request, Radicado $status){
        $radicado = $status;
        $fech_save_aproved = Carbon::now();

        $radicado->fech_aprovado = $fech_save_aproved->isoFormat('MMMM DD [del] YYYY [a las] h:mm:ss a');
        $radicado->fill($request->except(
            'fech_send_dir',
            'time_send_dir',
            'fech_recive_radic',
            'time_recive_radic',
            'fech_notifi_end',
            'time_notifi_end',
            'time_recive_dir',
            'fech_recive_dir',
            'revisar'
        ));
        $radicado->save();
        return redirect()->route('admin.ShowRadic',[$status])->with('status','Radicado '.$radicado->fechradic_id.'-'.$radicado->year.' Aprovado correctamente ');

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
