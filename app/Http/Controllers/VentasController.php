<?php

namespace App\Http\Controllers;

use App\Models\Fechas;
use App\Models\Tarifas;
use Illuminate\Http\Request;
use App\Models\Ventas;
use App\Models\Ventas_totales;
use App\Models\Years;
use Illuminate\Support\Facades\Auth;


class VentasController extends Controller
{
    public function create(Request $request)
    {
        $year = $request->input('year', 18);

        $years = Years::all();

        $ventasTabla = Ventas::join('fechas', 'ventas.id_fecha', '=', 'fechas.id')
            ->join('tarifas', 'ventas.id_tarifa', '=', 'tarifas.id')
            ->select('ventas.id_tarifa as codigo', 'tarifas.descripcion as descripcion', 'fechas.fecha as fecha', 'ventas.monto as monto', 'ventas.id as ID')
            ->where('fechas.id_year', $year)
            ->get();

        $ventas = Ventas::join('fechas', 'ventas.id_fecha', '=', 'fechas.id')
            ->join('tarifas', 'ventas.id_tarifa', '=', 'tarifas.id')
            ->select('ventas.*', 'tarifas.*', 'fechas.*')
            ->where('fechas.id_year', $year)
            ->get();

        $ventas_agrupadas = $ventas->groupBy('id_fecha');

        $ventas_totales = Fechas::join('ventas_totales', 'fechas.id', '=', 'ventas_totales.id_fecha')
            ->where('fechas.id_year', $year)
            ->get();

        $listaTarifas = Tarifas::all();

        $usuarioActivo = Auth::user(); // Obtén el usuario autenticado

        return view('sistema.panel.ventas', compact('ventas', 'ventasTabla', 'ventas_totales', 'ventas_agrupadas', 'listaTarifas', 'years', 'year', 'usuarioActivo'));
    }

    public function guardar(Request $request)
    {
        $validacion = $request->validate([
            'Tarifa' => 'required',
            'Mes' => 'required',
            'Monto' => 'required',
        ]);

        $id_mes = $request->input('Mes');
        $id_year = $request->input('year');
        $idFecha = Fechas::where('id_mes', $id_mes)->where('id_year', $id_year)->first();

        if ($idFecha) {
            $venta = new Ventas();
            $venta->id_tarifa = $request->input('Tarifa');
            $venta->id_fecha = $idFecha->id;
            $venta->monto = $request->input('Monto');
            if ($venta->save()) {
                return back()->with('message', 'ok');
            } else {
                return back()->withErrors(['error' => 'Error al guardar.']);
            }
        } else {
            return back()->withErrors(['error' => 'La fecha especificada no existe.']);
        }
    }
    public function update1(Request $request, string $id)
    {
        $validacion = $request->validate([
            'Monto' => 'required',
        ]);

        $venta = Ventas::find($id);
        $venta->monto = $request->input('Monto');

        if ($venta->save()) {
            return back()->with('message', 'update');
        } else {
            return back()->with(['message' => 'error']);
        }
    }
    public function update2(Request $request, string $id)
    {
        $validacion = $request->validate([
            'Usos_propios' => 'required',
        ]);

        $ventaT = Ventas_totales::find($id);
        $ventaT->usos_propios = $request->input('Usos_propios');

        if ($ventaT->save()) {
            return back()->with('message1', 'update1');
        } else {
            return back()->with('message1', 'error1');
        }
    }
    public function destroy($id)
    {
        $venta = Ventas::findOrFail($id);
        $venta->delete();
        return back();
    }
}
