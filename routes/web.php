<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/edna', function () {
    return view('staff/attendanceExpositor');
});

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