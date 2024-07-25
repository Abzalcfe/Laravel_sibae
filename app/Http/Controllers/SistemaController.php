<?php

namespace App\Http\Controllers;

use App\Models\Balance_am_at;
use Illuminate\Http\Request;

class sistemaController extends Controller
{
    public function historial()
    {
        $historico = Balance_am_at::all();
        return view('sistema.panel.historial', compact('historico'));
    }
    public function reportes()
    {
        return view('sistema.panel.reportes');
    }
    public function index()
    {
    }
}
