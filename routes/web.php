<?php

use App\Models\Radicado;
use App\Models\Program;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
$radicados= Radicado::all();
$programas= Program::all();

Route::get('/', function () {
    //return view('auth.login');        
    //variables
    $radicados= Radicado::all();
$programas= Program::all();

    if (Auth::check()== false) {
        return view('auth.login'); //cuando sin logeo       
    }else {

        if (auth()->user()->type_user == 3) {
            return view('direction.home',compact('radicados','programas')); //entra a direccion

        }elseif (auth()->user()->type_user == 2) {
            return view('regctrol.home',compact('radicados','programas')); //Entra a registro y control
        
        }return view('admin.home',compact('radicados','programas')); //cuando este en administrador
    
    }
})->name('at_login');

Auth::routes();
//rutas de registro y control
Route::resource('reg-ctrol', 'RegctrolController',compact('radicados'))->middleware('auth');
Route::get('reg-ctrol/sendMail/{reg_ctrol}', 'RegctrolController@sendEmail',compact('radicados'))->middleware('auth')->name('reg-ctrol.sendmail');
Route::post('reg-ctrol/restart', 'RegctrolController@restarFechRadic')->middleware('auth')->name('reg-ctrol.restarFechRadic');
Route::put('sme/{reg_ctrol}', 'RegctrolController@updateMailEst')->middleware('auth')->name('reg-ctrol.sme');


//rutas de direccion
Route::resource('direction', 'DirectionController',compact('radicados'))->middleware('auth');
Route::put('save/{direction}', 'DirectionController@saveRequest',compact('radicados'))->middleware('auth')->name('direction.saveRequest');

//rutas de estado
Route::resource('status', 'EstadoController',compact('radicados'))->middleware('auth');

