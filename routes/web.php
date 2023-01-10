<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpositorController;
use App\Http\Controllers\ExpositorQRController;
use App\Http\Controllers\TeacherCreatesExpositorController;
use App\Http\Controllers\AttendanceCompanyController;
use App\Http\Controllers\StaffCompanyController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\GuestsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\StaffExpositorController;
use App\Http\Controllers\StaffEventController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\LoginController;

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
    return view('welcome');
}); 


//Acceso todos inicio sesion
Route::resource('/inicioSesion', LoginController::class, [
    //1. Vista inicio sesion
    'index' => 'inicioSesion.index',
    //2. Enviar request
    'store' => 'inicioSesion.store'
]);

Route::group(['middleware' => 'isAdmin'], function () {

    // Acceso SOLO ADMIN
    Route::resource('adminInicio', AdminHomeController::class ,[
        'index' => 'adminInicio.index' 
    ]);

    Route::resource('adminRegistroEmpresas', CompaniesController::class ,[
        'index' => 'adminRegistroEmpresas.index' 
    ]);
    
    Route::resource('adminRegistroEventos', EventsController::class ,[
        'index' => 'adminRegistroEventos.index' 
    ]);
    
    Route::resource('adminRegistroInvitados', GuestsController::class ,[
        'index' => 'adminRegistroInvitados.index' 
    ]);
    
    Route::resource('adminRegistroMaestros', TeachersController::class ,[
        'index' => 'adminRegistroMaestros.index' 
    ]);

});


Route::group(['middleware' => 'isStaffOrAdmin'], function () {

    //Acceso staff y admin
    
    //EMPRESAS
    Route::resource('staffEmpresa', StaffCompanyController::class, [
            //1. Mostrar en staff las empresas
        'index' => 'staffEmpresa.index',
            //2. Mostrar en staff 1 empresa
        'show' => 'staffEmpresa.show'
    ]);

    //EXPOSITOR
    Route::resource('staffExpositor', StaffExpositorController::class, [
        //1. Mostrar para leer el qr
        'index' => 'staffExpositor.index',
    ]);
    
    //EVENTO
    Route::resource('staffEvento', StaffEventController::class, [
        //1. Mostrar en staff los eventos
        'index' => 'staffEvento.index',
        //2. Mostrar en staff 1 evento
        'show' => 'staffEvento.show'
    ]);

});

Route::group(['middleware' => 'isTeacherOrAdmin'], function () {
    
    //Acceso solo maestros y admin
    Route::resource('teacherRegistroExpositor', TeacherCreatesExpositorController::class, [
        'index' => 'teacherRegistroExpositor.index'
    ]);

});


Route::group(['middleware' => 'isExpositorOrAdmin'], function () {

    //Acceso solo expositores y admin
    Route::resource('expositorQR', ExpositorQRController::class, [
        'index' => 'expositorQR.index'
    ]);
});



