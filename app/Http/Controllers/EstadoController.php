<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Radicado;

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
            'time_notifi_end'
        ));
        $radicado->save();
        return redirect()->route('direction.edit',[$status])->with('status','Radicado '.$radicado->fechradic_id.'-'.$radicado->year.' recivido correctamente ');

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
