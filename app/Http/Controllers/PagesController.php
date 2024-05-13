<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function inicio()
    {
        return view('inicio');
    }

    public function reporte_atenciones()
    {
        return view('reportes.reporte_atenciones');
    }
}
