<?php

namespace App\Http\Controllers;

use App\Models\Balance_mensual;
use App\Models\Fechas;
use Illuminate\Http\Request;
use App\Models\Energia_recibida;
use App\Models\Energia_entregada;
use App\Models\Years;
use App\Models\Puntos;
use Illuminate\Support\Facades\Auth;

class BalanceAltaController extends Controller
{
    public function create(Request $request)
    {
        $year = $request->input('year', 18);

        $years = Years::all();

        $fechas_EnergiaRecibida = Energia_recibida::join('fechas', 'energia_recibida.id_fecha', '=', 'fechas.id')
            ->join('puntos', 'energia_recibida.id_punto', '=', 'puntos.id')
            ->select('energia_recibida.id as idr', 'energia_recibida.energia as energia', 'fechas.fecha', 'puntos.*')
            ->where('fechas.id_year', $year)
            ->get();

        $fechas_EnergiaEntregada = Energia_entregada::join('fechas', 'energia_entregada.id_fecha', '=', 'fechas.id')
            ->join('puntos', 'energia_entregada.id_punto', '=', 'puntos.id')
            ->select('energia_entregada.id as ide', 'energia_entregada.energia as energia', 'fechas.fecha', 'puntos.*')
            ->where('fechas.id_year', $year)
            ->get();

        $fechas_BalanceMensual = Fechas::join('balance_mensual', 'fechas.id', '=', 'balance_mensual.id_fecha')
            ->where('fechas.id_year', $year)
            ->get();

        $puntosER = Puntos::whereBetween('id', [1, 21])->get();
        $puntosEE = Puntos::whereBetween('id', [22, 70])->get();
        $usuarioActivo = Auth::user();
        return view('sistema.balance.altaTension', compact('fechas_EnergiaRecibida', 'fechas_EnergiaEntregada', 'fechas_BalanceMensual', 'puntosER', 'puntosEE', 'year', 'years', 'usuarioActivo'));
    }
    public function guardar1(Request $request)
    {
        $validacion = $request->validate([
            'Punto' => 'required',
            'Mes' => 'required',
            'Energía_recibida' => 'required',
        ]);

        $id_mes = $request->input('Mes');
        $id_year = $request->input('year');
        $idFecha = Fechas::where('id_mes', $id_mes)->where('id_year', $id_year)->first();

        if ($idFecha) {
            $energiaR = new Energia_recibida();
            $energiaR->id_punto = $request->input('Punto');
            $energiaR->id_fecha = $idFecha->id;
            $energiaR->energia = $request->input('Energía_recibida');
            if ($energiaR->save()) {
                return back()->with('message', 'ok');
            } else {
                return back()->withErrors(['error' => 'Error al guardar.']);
            }
        } else {
            return back()->withErrors(['error' => 'La fecha especificada no existe.']);
        }
    }
    public function guardar2(Request $request)
    {
        $validacion = $request->validate([
            'Punto' => 'required',
            'Mes' => 'required',
            'Energía_entregada' => 'required',
        ]);

        $id_mes = $request->input('Mes');
        $id_year = $request->input('year');
        $idFecha = Fechas::where('id_mes', $id_mes)->where('id_year', $id_year)->first();

        if ($idFecha) {
            $energiaE = new Energia_entregada();
            $energiaE->id_punto = $request->input('Punto');
            $energiaE->id_fecha = $idFecha->id;
            $energiaE->energia = $request->input('Energía_entregada');
            if ($energiaE->save()) {
                return back()->with('message1', 'ok1');
            } else {
                return back()->withErrors(['error1' => 'Error al guardar.']);
            }
        } else {
            return back()->withErrors(['error1' => 'La fecha especificada no existe.']);
        }
    }
    public function update1(Request $request, string $id)
    {
        $validacion = $request->validate([
            'Energía_recibida' => 'required',
        ]);

        $energiaR = Energia_recibida::find($id);
        $energiaR->energia = $request->input('Energía_recibida');

        if ($energiaR->save()) {
            return back()->with('message', 'update');
        } else {
            return back()->with(['message' => 'error']);
        }
    }
    public function update2(Request $request, string $id)
    {
        $validacion = $request->validate([
            'Energía_entregada' => 'required',
        ]);

        $energiaE = Energia_entregada::find($id);
        $energiaE->energia = $request->input('Energía_entregada');

        if ($energiaE->save()) {
            return back()->with('message1', 'update1');
        } else {
            return back()->with(['message1' => 'error1']);
        }
    }
    public function update3(Request $request, string $id)
    {
        $validacion = $request->validate([
            'sino' => 'required',
        ]);

        $sino = Balance_mensual::find($id);
        $sino->sino = $request->input('sino');

        if ($sino->save()) {
            return back()->with('message2', 'update2');
        } else {
            return back()->with(['message2' => 'error2']);
        }
    }
    public function destroy1($id)
    {
        $regR = Energia_recibida::findOrFail($id);
        $regR->delete();
        return back();
    }
    public function destroy2($id)
    {
        $regE = Energia_entregada::findOrFail($id);
        $regE->delete();
        return back();
    }
}
