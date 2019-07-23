<?php

use App\Models\Radicado;
use App\Models\Program;
use App\User;

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
    $users= User::get();

    if (Auth::check()== false) {
        return view('auth.login'); //cuando sin logeo       
    }else {

        if (auth()->user()->type_user == 3) {
            return view('direction.home',compact('radicados','programas','users')); //Entra a registro y control
        }elseif (auth()->user()->type_user == 2) {
            return view('regctrol.home',compact('radicados','programas','users')); //Entra a registro y control
        }else {
            return view('admin.home',compact('radicados','programas','users')); //cuando este en administrador
        }
    
    }
})->name('at_login');

Auth::routes();

//rutas de registro y control
Route::group(['middleware' => 'userAR'], function () {
    $radicados= Radicado::all();
    $programas= Program::all();
    
    Route::resource('reg-ctrol', 'RegctrolController',compact('radicados'))->middleware('auth');
    Route::get('reg-ctrol/sendMail/{reg_ctrol}', 'RegctrolController@sendEmail',compact('radicados'))->middleware('auth')->name('reg-ctrol.sendmail');
    Route::post('reg-ctrol/restart', 'RegctrolController@restarFechRadic')->middleware('auth')->name('reg-ctrol.restarFechRadic');
    Route::put('sme/{reg_ctrol}', 'RegctrolController@updateMailEst')->middleware('auth')->name('reg-ctrol.sme');
    Route::put('delivered/{reg_ctrol}', 'RegctrolController@updateDelivered')->middleware('auth')->name('reg-ctrol.updateDelivered');

});

//rutas de direccion
Route::group(['middleware' => 'userDir'], function () {
    $radicados= Radicado::all();
    $programas= Program::all();
    Route::resource('direction', 'DirectionController',compact('radicados'))->middleware('auth');
    Route::put('save/{direction}', 'DirectionController@saveRequest',compact('radicados'))->middleware('auth')->name('direction.saveRequest');    
});

//rutas de administrador
Route::group(['middleware' => 'userAdm'], function () {
    $radicados= Radicado::all();
    
    Route::resource('admin', 'AdminController',compact('radicados'))->middleware('auth');
    //controladores para generar los reportes
    Route::get('Export_for_ar', 'ReportController@indexAR',compact('radicados'))->middleware('auth')->name('Report.indexAR');
    Route::get('Export_for_dir', 'ReportController@indexDir',compact('radicados'))->middleware('auth')->name('Report.indexDir');
    Route::get('show_Users', 'AdminController@showUsers',compact('radicados'))->middleware('auth')->name('admin.showUsers');
});

//rutas de estado
Route::resource('status', 'EstadoController',compact('radicados'))->middleware('auth');

//rutas de filtrado
Route::get('filterStatus', 'FilterController@viewSearchRadic',compact('radicados'))->middleware('auth')->name('filter.viewSearchRadic');
Route::get('filterStatus_dir', 'FilterController@viewSearchRadicDir',compact('radicados'))->middleware('auth')->name('filter.viewSearchRadicDir');
Route::get('filter_all_radic', 'FilterController@viewAllRadic',compact('radicados'))->middleware('auth')->name('filter.viewAllRadic');

//Generar reportes
Route::get('Exports', 'ReportController@index',compact('radicados'))->middleware('auth')->name('Report.index');
Route::get('ExportFilter', 'ReportController@ExportFilter',compact('radicados'))->middleware('auth')->name('Report.ExportFilter');
Route::get('ExportAdmDir', 'ReportController@ExportAdmDir',compact('radicados'))->middleware('auth')->name('Report.ExportAdmDir');
Route::get('ExportAdmAR', 'ReportController@ExportAdmAR',compact('radicados'))->middleware('auth')->name('Report.ExportAdmAR');
Route::get('Cont_motivo', 'ReportController@contMotivo',compact('radicados'))->middleware('auth')->name('Report.contMotivo');
Route::get('Export_all_Radic', 'ReportController@ExportAR',compact('radicados'))->middleware('auth')->name('Report.ExportAR');
Route::get('Export_for_motivo', 'ReportController@ExportMotivo',compact('radicados'))->middleware('auth')->name('Report.ExportMotivo');
Route::get('Export_for_programa', 'ReportController@ExportPrograma',compact('radicados'))->middleware('auth')->name('Report.ExportPrograma');
Route::get('Export_for_fecha', 'ReportController@ExportFecha',compact('radicados'))->middleware('auth')->name('Report.ExportFecha');