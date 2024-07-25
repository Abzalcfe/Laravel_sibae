<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\SubestacionesController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\BalanceAltaController;
use App\Http\Controllers\BalanceMediaController;
use App\Http\Controllers\ControlController;
use App\Http\Controllers\PuntosController;
use App\Http\Controllers\SistemaController;
use App\Http\Controllers\GestionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::resource('usuarios', ClienteController::class)->names('usuarios');



//Diagrama 
Route::resource('subestaciones', SubestacionesController::class)->names('subestaciones');
Route::get('/subestaciones/update1/{id}', [SubestacionesController::class, 'update1'])->name('subestaciones.update1');
Route::delete('/subestaciones/destroy1/{id}', [SubestacionesController::class, 'destroy1'])->name('subestaciones.destroy1');

//Route::get('/subestaciones', [SubestacionesController::class, 'create'])->name('subestaciones.create');

//Route::get('/subestaciones', [SubestacionesController::class, 'index'])->name('subestaciones.index');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
///////////////////////////////////////////
//Ventas
Route::get('/ventas', [VentasController::class, 'create'])->name('ventas.create');
Route::get('/ventas/guardar', [VentasController::class, 'guardar'])->name('ventas.guardar');
Route::get('/ventas/update1/{id}', [VentasController::class, 'update1'])->name('ventas.update1');
Route::get('/ventas/update2/{id}', [VentasController::class, 'update2'])->name('ventas.update2');
Route::delete('/ventas/{id}', [VentasController::class, 'destroy'])->name('ventas.destroy');
//Balance de Alta Tensión
Route::get('/balance_alta', [BalanceAltaController::class, 'create'])->name('balance_alta.create');
Route::get('/balance_alta/guardar1', [BalanceAltaController::class, 'guardar1'])->name('balance_alta.guardar1');
Route::get('/balance_alta/guardar2', [BalanceAltaController::class, 'guardar2'])->name('balance_alta.guardar2');
Route::get('/balance_alta/update1/{id}', [BalanceAltaController::class, 'update1'])->name('balance_alta.update1');
Route::get('/balance_alta/update2/{id}', [BalanceAltaController::class, 'update2'])->name('balance_alta.update2');
Route::get('/balance_alta/update3/{id}', [BalanceAltaController::class, 'update3'])->name('balance_alta.update3');
Route::delete('/balance_alta/destroy1/{id}', [BalanceAltaController::class, 'destroy1'])->name('balance_alta.destroy1');
Route::delete('/balance_alta/destroy2/{id}', [BalanceAltaController::class, 'destroy2'])->name('balance_alta.destroy2');


//Balance de Media Tensión
Route::get('/balance_media', [BalanceMediaController::class, 'create'])->name('balance_media.create');
Route::get('/balance_media/guardar1', [BalanceMediaController::class, 'guardar1'])->name('balance_media.guardar1');
Route::get('/balance_media/guardar2', [BalanceMediaController::class, 'guardar2'])->name('balance_media.guardar2');
Route::get('/balance_media/guardar3', [BalanceMediaController::class, 'guardar3'])->name('balance_media.guardar3');
Route::get('/balance_media/update1/{id}', [BalanceMediaController::class, 'update1'])->name('balance_media.update1');
Route::get('/balance_media/update2/{id}', [BalanceMediaController::class, 'update2'])->name('balance_media.update2');
Route::get('/balance_media/update3/{id}', [BalanceMediaController::class, 'update3'])->name('balance_media.update3');
Route::delete('/balance_media/destroy1/{id}', [BalanceMediaController::class, 'destroy1'])->name('balance_media.destroy1');
Route::delete('/balance_media/destroy2/{id}', [BalanceMediaController::class, 'destroy2'])->name('balance_media.destroy2');
Route::delete('/balance_media/destroy3/{id}', [BalanceMediaController::class, 'destroy3'])->name('balance_media.destroy3');
//Control
Route::get('/control', [ControlController::class, 'control'])->name('control.control');
//Control - Panel
Route::get('/control/ventas/{id_year}', [ControlController::class, 'ventas'])->name('control.ventas');
Route::get('/control/energia/recibida/alta/{id_year}', [ControlController::class, 'era'])->name('control.era');
Route::get('/control/energia/entregada/alta/{id_year}', [ControlController::class, 'eea'])->name('control.eea');
Route::get('/control/energia/recibida/media/subestaciones/{id_year}', [ControlController::class, 'erms'])->name('control.erms');
Route::get('/control/energia/recibida/media/puntos/{id_year}', [ControlController::class, 'ermp'])->name('control.ermp');
Route::get('/control/energia/entregada/media/{id_year}', [ControlController::class, 'eem'])->name('control.eem');



//Control - INSERT
Route::post('/control/ventas/nuevo', [ControlController::class, 'ventasguardar'])->name('control.ventasguardar');
Route::post('/control/energia/recibida/alta/nuevo', [ControlController::class, 'eraguardar'])->name('control.eraguardar');
Route::post('/control/energia/entregada/alta/nuevo', [ControlController::class, 'eeaguardar'])->name('control.eeaguardar');
Route::post('/control/energia/recibida/media/subestaciones/nuevo', [ControlController::class, 'ermsguardar'])->name('control.ermsguardar');
Route::post('/control/energia/recibida/media/puntos/nuevo', [ControlController::class, 'ermpguardar'])->name('control.ermpguardar');
Route::post('/control/energia/entregada/media/nuevo', [ControlController::class, 'eemguardar'])->name('control.eemguardar');
Route::post('/control/year/nuevo', [ControlController::class, 'nuevoyear'])->name('control.nuevoyear');
//Control - UPDATE
Route::post('/control/ventas/actualizar', [ControlController::class, 'ventasactualizar'])->name('control.ventasactualizar');
Route::post('/control/energia/recibida/alta/actualizar', [ControlController::class, 'eraactualizar'])->name('control.eraactualizar');
Route::post('/control/energia/entregada/alta/actualizar', [ControlController::class, 'eeaactualizar'])->name('control.eeaactualizar');
Route::post('/control/energia/recibida/media/subestaciones/actualizar', [ControlController::class, 'ermsactualizar'])->name('control.ermsactualizar');
Route::post('/control/energia/recibida/media/puntos/actualizar', [ControlController::class, 'ermpactualizar'])->name('control.ermpactualizar');
Route::post('/control/energia/entregada/media/actualizar', [ControlController::class, 'eemactualizar'])->name('control.eemactualizar');


//Puntos de intercambio
Route::get('/puntos', [PuntosController::class, 'puntos'])->name('puntos.puntos');
//Puntos - DELETE
Route::delete('/puntos/destroy1/{id}', [PuntosController::class, 'destroy1'])->name('puntos.destroy1');
//Puntos - INSERT
Route::get('/puntos/guardar1', [PuntosController::class, 'guardar1'])->name('puntos.guardar1');
//Puntos - UPDATE
Route::get('/puntos/update1/{id}', [PuntosController::class, 'update1'])->name('puntos.update1');
Route::get('/puntos/update2/{id}', [PuntosController::class, 'update2'])->name('puntos.update2');
Route::get('/puntos/update3/{id}', [PuntosController::class, 'update3'])->name('puntos.update3');
Route::get('/puntos/update4/{id}', [PuntosController::class, 'update4'])->name('puntos.update4');
//Sistema
Route::get('/panel/historial', [SistemaController::class, 'historial'])->name('panel.historial');
Route::get('/panel/reportes', [SistemaController::class, 'reportes'])->name('panel.reportes');




//Gestion
Route::get('/gestion', [GestionController::class, 'gestion'])->name('control.gestion');
Route::get('/gestion/guardar1', [GestionController::class, 'guardar1'])->name('gestion.guardar1');
Route::get('/gestion/guardar2', [GestionController::class, 'guardar2'])->name('gestion.guardar2');
Route::get('/gestion/guardar3', [GestionController::class, 'guardar3'])->name('gestion.guardar3');
Route::get('/gestion/guardar4', [GestionController::class, 'guardar4'])->name('gestion.guardar4');
Route::get('/gestion/guardar5', [GestionController::class, 'guardar5'])->name('gestion.guardar5');
Route::get('/gestion/guardar6', [GestionController::class, 'guardar6'])->name('gestion.guardar6');



Route::get('/gestion/update1/{id}', [GestionController::class, 'update1'])->name('gestion.update1');
Route::get('/gestion/update2/{id}', [GestionController::class, 'update2'])->name('gestion.update2');
Route::get('/gestion/update3/{id}', [GestionController::class, 'update3'])->name('gestion.update3');
Route::get('/gestion/update4/{id}', [GestionController::class, 'update4'])->name('gestion.update4');
Route::get('/gestion/update5/{id}', [GestionController::class, 'update5'])->name('gestion.update5');
Route::get('/gestion/update6/{id}', [GestionController::class, 'update6'])->name('gestion.update6');



Route::delete('/gestion/destroy1/{id}', [GestionController::class, 'destroy1'])->name('gestion.destroy1');
Route::delete('/gestion/destroy2/{id}', [GestionController::class, 'destroy2'])->name('gestion.destroy2');
Route::delete('/gestion/destroy3/{id}', [GestionController::class, 'destroy3'])->name('gestion.destroy3');
Route::delete('/gestion/destroy4/{id}', [GestionController::class, 'destroy4'])->name('gestion.destroy4');
Route::delete('/gestion/destroy5/{id}', [GestionController::class, 'destroy5'])->name('gestion.destroy5');
Route::delete('/gestion/destroy6/{id}', [GestionController::class, 'destroy6'])->name('gestion.destroy6');