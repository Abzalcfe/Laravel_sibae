<?php

namespace App\Http\Controllers;

use App\Models\E_r_mt;
use App\Models\E_e_mt;
use App\Models\Fechas;
use App\Models\Energia_sub_mt;
use App\Models\Balance_am_mt;
use App\Models\Subestaciones;
use App\Models\Zona_er_mt;
use App\Models\Zona_ee_mt;
use App\Models\Cipes_mt;
use App\Models\Tc;
use App\Models\Tp;
use App\Models\Years;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BalanceMediaController extends Controller
{
    public function create(Request $request)
    {
        $year = $request->input('year', 18);
        $years = Years::all();

        // Consulta para obtener los datos de e_r_mt
        $fechas_zr = E_r_mt::with(['zona', 'fecha'])
            ->join('fechas as f', 'e_r_mt.id_fecha', '=', 'f.id')
            ->join('zona_er_mt as z', 'e_r_mt.id_zona', '=', 'z.id')
            ->where('f.id_year', $year)
            ->select('z.id as Código', 'z.nombre as Fuente', 'f.fecha as Fecha', 'e_r_mt.energia as Energia', 'e_r_mt.id as ID')
            ->get();

        // Consulta para obtener los datos de energia_sub_mt
        $energiaData = Energia_sub_mt::select(
            'energia_sub_mt.id as ID',
            'sub_ermt.id AS ids',
            'cipes_mt.codigo AS cipe',
            'subestaciones.nombre AS subestacion',
            'puntos_intercambio.codigo AS punto',
            'medidores.numero AS medidor',
            'tc.rtc AS rtc',
            'tp.rtp AS rtp',
            'f.fecha AS fecha',
            'energia_sub_mt.energia as energias'
        )
            ->join('fechas as f', 'energia_sub_mt.id_fecha', '=', 'f.id')
            ->join('sub_ermt', 'energia_sub_mt.id_sub_ermt', '=', 'sub_ermt.id')  // Primero se une con sub_ermt
            ->join('cipes_mt', 'sub_ermt.id_cipe', '=', 'cipes_mt.id')
            ->join('subestaciones', 'sub_ermt.id_sub', '=', 'subestaciones.id')
            ->join('puntos_intercambio', 'sub_ermt.id_punto_i', '=', 'puntos_intercambio.id')
            ->join('medidores', 'sub_ermt.id_medidor', '=', 'medidores.id')
            ->join('tc', 'sub_ermt.id_tc', '=', 'tc.id')
            ->join('tp', 'sub_ermt.id_tp', '=', 'tp.id')
            ->where('f.id_year', $year)
            ->orderBy('energia_sub_mt.id', 'asc')
            ->get();


        $fechas_BalanceMedia = Fechas::join('balance_media_tension', 'fechas.id', '=', 'balance_media_tension.id_fecha')
            ->where('fechas.id_year', $year)
            ->get();

        $fechas_yearMovil = Fechas::join('balance_am_mt', 'fechas.id', '=', 'balance_am_mt.id_fecha')
            ->where('fechas.id_year', $year)
            ->get();

        $fechas_ze = E_e_mt::with(['zona', 'fecha'])
            ->join('fechas as f', 'e_e_mt.id_fecha', '=', 'f.id')
            ->join('zona_ee_mt as z', 'e_e_mt.id_zona', '=', 'z.id')
            ->where('f.id_year', $year)
            ->select('z.id as Código', 'z.nombre as Fuente', 'f.fecha as Fecha', 'e_e_mt.energia as Energia', 'e_e_mt.id as ID')
            ->get();

        $er1mt = Cipes_mt::join('puntos_intercambio', 'cipes_mt.id', '=', 'puntos_intercambio.id')
            ->join('medidores', 'puntos_intercambio.id', '=', 'medidores.id')
            ->select('cipes_mt.id as id_cipe', 'cipes_mt.codigo as cipe', 'puntos_intercambio.id as id_punto', 'puntos_intercambio.codigo as punto', 'medidores.id as id_medidor', 'medidores.numero as medidor')
            ->orderBy('medidores.id', 'asc')
            ->get();

        $subestaciones = Subestaciones::all();
        $rtc = Tc::all();
        $rtp = Tp::all();
        $er2mt = Zona_er_mt::all();
        $eemt = Zona_ee_mt::all();

        $usuarioActivo = Auth::user();

        // Unir los resultados de ambas consultas
        // $unionResult = $fechas_zr->unionAll($fechas_subr)->get();
        return view('sistema.balance.mediaTension', compact('fechas_zr', 'energiaData', 'fechas_BalanceMedia', 'fechas_yearMovil', 'fechas_ze', 'er1mt', 'er2mt', 'eemt', 'subestaciones', 'rtc', 'rtp', 'year', 'years', 'usuarioActivo'));
    }
    public function guardar1(Request $request)
    {
        $validacion = $request->validate([
            'cipe' => 'required',
            'Subestación' => 'required',
            'punto' => 'required',
            'medidor' => 'required',
            'rtc' => 'required',
            'rtp' => 'required',
            'Mes' => 'required',
            'energía_recibida' => 'required',
        ]);

        $id_mes = $request->input('Mes');
        $id_year = $request->input('year');
        $idFecha = Fechas::where('id_mes', $id_mes)->where('id_year', $id_year)->first();

        if ($idFecha) {
            $energiaRS = new Energia_sub_mt();
            $energiaRS->id_fecha = $idFecha->id;
            $energiaRS->id_cipe = $request->input('cipe');
            $energiaRS->id_sub = $request->input('Subestación');
            $energiaRS->id_punto_i = $request->input('punto');
            $energiaRS->id_medidor = $request->input('medidor');
            $energiaRS->id_tc = $request->input('rtc');
            $energiaRS->id_tp = $request->input('rtp');
            $energiaRS->energia = $request->input('energía_recibida');
            if ($energiaRS->save()) {
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
            'punto' => 'required',
            'Mes' => 'required',
            'energía_recibida' => 'required',
        ]);

        $id_mes = $request->input('Mes');
        $id_year = $request->input('year');
        $idFecha = Fechas::where('id_mes', $id_mes)->where('id_year', $id_year)->first();

        if ($idFecha) {
            $energiaRP = new E_r_mt();
            $energiaRP->id_fecha = $idFecha->id;
            $energiaRP->id_zona = $request->input('punto');
            $energiaRP->energia = $request->input('energía_recibida');
            if ($energiaRP->save()) {
                return back()->with('message1', 'ok1');
            } else {
                return back()->withErrors(['error1' => 'Error al guardar.']);
            }
        } else {
            return back()->withErrors(['error1' => 'La fecha especificada no existe.']);
        }
    }

    public function guardar3(Request $request)
    {
        $validacion = $request->validate([
            'punto' => 'required',
            'Mes' => 'required',
            'energía_entregada' => 'required',
        ]);

        $id_mes = $request->input('Mes');
        $id_year = $request->input('year');
        $idFecha = Fechas::where('id_mes', $id_mes)->where('id_year', $id_year)->first();

        if ($idFecha) {
            $energiaE = new E_e_mt();
            $energiaE->id_fecha = $idFecha->id;
            $energiaE->id_zona = $request->input('punto');
            $energiaE->energia = $request->input('energía_entregada');
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
            'energía_recibida' => 'required',
        ]);

        $energiaR1 = Energia_sub_mt::find($id);
        $energiaR1->energia = $request->input('energía_recibida');

        if ($energiaR1->save()) {
            return back()->with('message', 'update');
        } else {
            return back()->with(['message' => 'error']);
        }
    }



    
    public function update2(Request $request, string $id)
    {
        $validacion = $request->validate([
            'energía_recibida' => 'required',
        ]);

        $energiaR2 = E_r_mt::find($id);
        $energiaR2->energia = $request->input('energía_recibida');

        if ($energiaR2->save()) {
            return back()->with('message1', 'update1');
        } else {
            return back()->with(['message1' => 'error1']);
        }
    }
    public function update3(Request $request, string $id)
    {
        $validacion = $request->validate([
            'energía_entregada' => 'required',
        ]);

        $energiaE = E_e_mt::find($id);
        $energiaE->energia = $request->input('energía_entregada');

        if ($energiaE->save()) {
            return back()->with('message2', 'update2');
        } else {
            return back()->with(['message2' => 'error2']);
        }
    }
    public function destroy1($id)
    {
        $ERS = Energia_sub_mt::findOrFail($id);
        $ERS->delete();
        return back();
    }
    public function destroy2($id)
    {
        $ERP = E_r_mt::findOrFail($id);
        $ERP->delete();
        return back();
    }
    public function destroy3($id)
    {
        $EEP = E_e_mt::findOrFail($id);
        $EEP->delete();
        return back();
    }
}
