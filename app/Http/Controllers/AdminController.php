<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Radicado;
use App\Models\Program;
use App\Models\Motivo;
use App\Models\Role;
use App\User;
use DataTables;


class AdminController extends Controller
{
    public function __construct(){
        $this->radicados = Radicado::orderBy('id', 'DESC')->get();
        $this->programas = Program::get();
        $this->motivos = Motivo::get();
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
        $users= $this->users;
        $radicados= $this->radicados;
        $programas= $this->programas;

        return view('admin.home', compact('radicados','programas','users'));
    }
    //registart usuarios
    public function register(Request $request)
    {
        $user = new User();

        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('password'));
        $user->type_user = $request->input('type_user');

        $user->save();


        return redirect()->route('admin.showUsers')->with('status','Usuario creado satisfactoriamente');
    }
    //registart Directores
    public function registerDir(Request $request)
    {
        $programa = new Program();

        $programa->name_dir = $request->input('name_dir');
        if (!$request->input('name')) {
            $programa->name = "N/a";          
        }if (!$request->input('correo_director')) {
            $programa->correo_director = "N/a";          
        }
        $programa->save();

        return redirect()->route('admin.showUsers')->with('status','Usuario creado satisfactoriamente');
    }
    //registart Programas
    public function registerProg(Request $request)
    {
        $programa = new Program();

        if (!$request->input('name_dir')) {
            $programa->name_dir = "N/a";          
        }
        $programa->name = $request->input('name');          
        $programa->correo_director = $request->input('correo_director');          
        
        $programa->save();

        return redirect()->route('admin.showProg')->with('status','Usuario creado satisfactoriamente');
    }

    public function showUsers(User $admin){
        $users= $this->users;
        $radicados= $this->radicados;
        $programas= $this->programas;
        $roles = $this->roles;
        $radic = $admin;

        return view('admin.showusers', compact('radicados','radic','programas','users', 'roles'));

    }
    public function showDir(Request $request, User $admin){
        $users= $this->users;
        $radicados= $this->radicados;
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


        return view('admin.showdir', compact('radicados','radic','programas','users', 'roles'));

    }
    public function showProg(User $admin){
        $users= $this->users;
        $radicados= $this->radicados;
        $programas= $this->programas;
        $roles = $this->roles;
        $radic = $admin;

        return view('admin.showprogram', compact('radicados','radic','programas','users', 'roles'));

    }

    //controler editar usuarios
    public function userEdit_ctrl(Request $request, User $admin){

        $user = $admin;

        $user->fill($request->except(
            'password'
        ));

        $user->save();
        return redirect()->route('admin.userEdit',[$admin])->with('status','Usuario Actualizado');

    }
    //controler editar Directores
    public function dirgEdit_ctrl(Request $request, Program $admin){

        $programa = $admin;
        $programa->name_dir = $request->input('name_dir');
        $programa->save();
        return redirect()->route('admin.dirEdit',[$admin])->with('status','Director Actualizado');

    }
    //controler editar programas
    public function progEdit_ctrl(Request $request, Program $admin){

        $programa = $admin;
        $programa->name= $request->input('name');
        $programa->correo_director= $request->input('correo_director');
        $programa->save();
        return redirect()->route('admin.progEdit',[$admin])->with('status','Programa Actualizado');

    }

    //vista editar usuarios
    public function userEdit(User $admin){


        $users= $admin;
        $radicados= $this->radicados;
        $programas= $this->programas;
        $roles = $this->roles;

        return view('admin.editUser', compact('radicados','programas','users', 'roles'));
    }
    //vista editar Directores
    public function dirEdit(Request $request, Program $admin){
        // dd($admin);

        $programas= $admin;
        $radicados= $this->radicados;
        $roles = $this->roles;
    
        return view('admin.editDir', compact('radicados','programas','roles'));

    }
    //vista editar Programas
    public function progEdit(Program $admin){

        $programas= $admin;
        $radicados= $this->radicados;
        $roles = $this->roles;

        return view('admin.editProg', compact('radicados','programas','roles'));
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
