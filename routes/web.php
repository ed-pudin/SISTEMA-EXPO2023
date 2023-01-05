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
    return view('expositor/index');
});

Route::get('/home', function () {
    return view('welcome');
});
//Acceso solo maestros y admin
Route::resource('registroExpositor', TeacherCreatesExpositorController::class, [
    'index' => 'registroExpositor.index'
]);

//Acceso solo expositores y admin
Route::resource('expositorQR', ExpositorQRController::class, [
    'index' => 'expositorQR.index'
]);


//Acceso staff y admin
//EMPRESAS
Route::resource('staffEmpresa', StaffCompanyController::class, [
        //1. Mostrar en staff las empresas
    'index' => 'staffEmpresa.index',
        //2. Mostrar en staff 1 empresa
    'show/:id' => 'staffEmpresa.show'
]);

//EXPOSITOR

//EVENTO

// Acceso SOLO ADMIN
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