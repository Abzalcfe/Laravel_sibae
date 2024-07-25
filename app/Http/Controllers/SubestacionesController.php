<?php

namespace App\Http\Controllers;
use App\Models\Years;
use App\Models\Fechas;
use App\Models\Consumos;
use App\Models\Circuitos;
use App\Models\Subestaciones;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class SubestacionesController extends Controller
{
    public function create(Request $request)
    {
        $year = $request->input('year', 18);
        $years = Years::all();

        //Obtener datos de los consumos 
        $fechas_consumo = Consumos::with(['fecha', 'circuito'])
            ->join('fechas as f', 'consumo.id_fecha', '=', 'f.id')
            ->join('circuito as cto', 'consumo.id_circuito', '=', 'cto.id_circuito')
            //->join('consumo as cmo', 'consumo.id_circuito', '=', 'cmo.id')
            ->where('f.id_year', $year)
            ->select('cto.id_circuito as ID', 'f.fecha as Fecha', 'cto.nombre as Circuito', 'consumo.energia as Energia')
            ->get();
        
        
        $usuarioActivo = Auth::user();
        return view('sistema.subestaciones.subestaciones', compact ('fechas_consumo', 'usuarioActivo'));
    }

    public function update1(Request $request, string $id)
    {
        $validacion = $request->validate([
            'consumo' => 'required',
        ]);

        $consumoR = Consumo::find($id);
        $consumoR->energia = $request->input('consumo');

        if ($consumoR->save()) {
            return back()->with('message', 'update');
        } else {
            return back()->with(['message' => 'error']);
        }
    }

    public function destroy1($id)
    {
        $ERS = Consumo::findOrFail($id);
        $ERS->delete();
        return back();
    }
}
