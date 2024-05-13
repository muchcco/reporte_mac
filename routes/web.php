<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

Route::get('/' , [PagesController::class, 'inicio'])->name('inicio');
Route::get('reportes/reporte_atenciones' , [PagesController::class, 'reporte_atenciones'])->name('reportes.reporte_atenciones');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
