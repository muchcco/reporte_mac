<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

Route::get('/' , [PagesController::class, 'inicio'])->name('inicio');
Route::get('reportes/reporte_atenciones' , [PagesController::class, 'reporte_atenciones'])->name('reportes.reporte_atenciones');
Route::get('reportes/reporte_atenciones_estado' , [PagesController::class, 'reporte_atenciones_estado'])->name('reportes.reporte_atenciones_estado');

// TABLAS CONSULTAS

Route::get('reportes/tablas/tb_atenciones' , [PagesController::class, 'tb_atenciones'])->name('reportes.tablas.tb_atenciones');
Route::get('reportes/tablas/tb_ate_estado' , [PagesController::class, 'tb_ate_estado'])->name('reportes.tablas.tb_ate_estado');

// REPORTE EXCEL

Route::get('reportes/excel/estado_excel' , [PagesController::class, 'estado_excel'])->name('reportes.excel.estado_excel');
Route::get('reportes/excel/atencion_excel' , [PagesController::class, 'atencion_excel'])->name('reportes.excel.atencion_excel');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
