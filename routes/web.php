<?php

use App\Models\Radicado;
use App\Models\Program;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', function () {
    if (Auth::check()== false) {
        return view('auth.login'); //cuando sin logeo       
    }else {

        if (auth()->user()->type_user == 3) {
            return redirect()->intended('direction');
        }elseif (auth()->user()->type_user == 2) {
            return redirect()->intended('/home/reg-ctrol');
        }elseif(auth()->user()->type_user == 4) {
            return redirect()->intended('dir-programa');
        }else{
            return redirect()->intended('admin');
        }
    
    }
})->name('at_login');


//rutas de registro y control
Route::group(['middleware' => 'auth','userAR'], function () {
    Route::resource('/home/reg-ctrol', 'RegctrolController');
    Route::get('reg-ctrol/{reg_ctrol}/sendMail', 'RegctrolController@sendEmail')->name('reg-ctrol.sendmail');
    Route::post('reg-ctrol/restart', 'RegctrolController@restarFechRadic')->name('reg-ctrol.restarFechRadic');
    Route::put('sme/{reg_ctrol}', 'RegctrolController@updateMailEst')->name('reg-ctrol.sme');
    Route::put('delivered/{reg_ctrol}', 'RegctrolController@updateDelivered')->name('reg-ctrol.updateDelivered');
    Route::put('uploadPDF/{reg_ctrol}', 'RegctrolController@uploadPDF')->name('reg-ctrol.uploadPDF');
});
//rutas de direccion
Route::group(['middleware' => 'auth','userDir'], function () {
    Route::resource('direction', 'DirectionController');
    Route::put('save/{direction}', 'DirectionController@saveRequest')->name('direction.saveRequest');    
});
//rutas de administrador
Route::group(['middleware' => 'auth','userAdm'], function () {   
    Route::resource('admin', 'AdminController');
    Route::get('Export_for_ar', 'ReportController@indexAR')->name('Report.indexAR');
    Route::get('Export_for_dir', 'ReportController@indexDir')->name('Report.indexDir');
    Route::get('show_Users', 'AdminController@showUsers')->name('admin.showUsers');
    Route::get('show_Directores', 'AdminController@showDir')->name('admin.showDir');
    Route::get('show_programas', 'AdminController@showProg')->name('admin.showProg');
    Route::get('show_radicados', 'AdminController@showRadics')->name('admin.showRadics');
    Route::get('admin/{admin}/show_Users', 'AdminController@ShowRadic')->name('admin.ShowRadic');
    Route::get('admin/{admin}/edit_user', 'AdminController@userEdit')->name('admin.userEdit');    
    Route::get('admin/{admin}/edit_dir', 'AdminController@dirEdit')->name('admin.dirEdit');    
    Route::get('admin/{admin}/edit_prog', 'AdminController@progEdit')->name('admin.progEdit');    
    Route::get('admin/{admin}/show_radic', 'AdminController@showradicedit')->name('admin.showradicedit');    
    Route::put('edit_user/{admin}', 'AdminController@userEdit_ctrl')->name('admin.userEdit_ctrl');    
    Route::put('edit_dir/{admin}', 'AdminController@dirgEdit_ctrl')->name('admin.dirgEdit_ctrl');    
    Route::put('edit_prog/{admin}', 'AdminController@progEdit_ctrl')->name('admin.progEdit_ctrl');    
    Route::put('save_request/{admin}', 'AdminController@saveRequest')->name('admin.saveRequest');    
    Route::put('asing_delegate/{admin}', 'AdminController@asingDelegate')->name('admin.asingDelegate');    
    Route::post('show_Users', 'AdminController@register')->name('admin.register');
    Route::post('show_Directores', 'AdminController@registerDir')->name('admin.registerDir');
    Route::post('show_Programs', 'AdminController@registerProg')->name('admin.registerProg');
    //exportaciones
    Route::get('/imprimir/{admin}', 'ReportController@imprimir')->name('admin.print_pdf');
});
//rutas de Director de Programa
Route::group(['middleware' => 'auth','UserDirProg'], function () {
    Route::get('dir-programa','DirprogController@index')->name('dirprog.index');
    Route::get('dir-programa/{dirprog}/info-radic','DirprogController@showinfoRadic')->name('dirprog.showinfoRadic');
    Route::get('save_request/{dirprog}','DirprogController@saveRequest')->name('dirprog.saveRequest');
});
//rutas de superadministrador
Route::group(['middleware' => 'auth'], function () {
    Route::get('superAdm','SuperadmController@index')->name('superAdm.index');    
});
//rutas de estado
Route::resource('status', 'EstadoController')->middleware('auth');
Route::put('open_radicAdm/{status}','EstadoController@openRadicAdm')->middleware('auth')->name('status.openRadicAdm');
Route::put('revisar/{status}','EstadoController@revisar')->middleware('auth')->name('status.revisar');
Route::put('aprovar/{status}','EstadoController@aprovado')->middleware('auth')->name('status.aprovado');

//rutas de filtrado
Route::get('filterStatus', 'FilterController@viewSearchRadic')->middleware('auth')->name('filter.viewSearchRadic');
Route::get('filterStatus_dir', 'FilterController@viewSearchRadicDir')->middleware('auth')->name('filter.viewSearchRadicDir');
Route::get('filterStatus_dir_prog', 'FilterController@viewSearchRadicDir_prog')->middleware('auth')->name('filter.viewSearchRadicDir_prog');
Route::get('filterStatus_adm', 'FilterController@viewSearchRadicAdm')->middleware('auth')->name('filter.viewSearchRadicAdm');
Route::get('filter_all_radic', 'FilterController@viewAllRadic')->middleware('auth')->name('filter.viewAllRadic');

//Generar reportes
Route::get('ExportFilter', 'ReportController@ExportFilter')->middleware('auth')->name('Report.ExportFilter');
Route::get('Exports', 'ReportController@index')->middleware('auth')->name('Report.index');
Route::get('ExportAdmDir', 'ReportController@ExportAdmDir')->middleware('auth')->name('Report.ExportAdmDir');
Route::get('ExportAdmAR', 'ReportController@ExportAdmAR')->middleware('auth')->name('Report.ExportAdmAR');
Route::get('Cont_motivo', 'ReportController@contMotivo')->middleware('auth')->name('Report.contMotivo');
Route::get('Export_all_Radic', 'ReportController@ExportAR')->middleware('auth')->name('Report.ExportAR');
Route::get('Export_for_motivo', 'ReportController@ExportMotivo')->middleware('auth')->name('Report.ExportMotivo');
Route::get('Export_for_programa', 'ReportController@ExportPrograma')->middleware('auth')->name('Report.ExportPrograma');
Route::get('Export_for_fecha', 'ReportController@ExportFecha')->middleware('auth')->name('Report.ExportFecha');
Route::get('Download_archivo', 'ReportController@downloadArchivo')->middleware('auth')->name('Report.downloadArchivo');

Auth::routes();
