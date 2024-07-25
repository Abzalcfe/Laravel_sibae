<?php

namespace App\Http\Controllers;

use App\Models\Puntos;
use App\Models\Subestaciones;
use App\Models\Tarifas;
use App\Models\Zona_ee_mt;
use App\Models\Zona_er_mt;
use App\Models\Sub_ermt;
use Illuminate\Http\Request;

class GestionController extends Controller
{
    public function gestion()
    {
        $tarifas = Tarifas::all();
        $puntosAltaRec = Puntos::where('tipo', 1)->get();
        $puntosAltaEnt = Puntos::where('tipo', 2)->get();
        $zonasMediaRec = Zona_er_mt::all();
        $zonasMediaEnt = Zona_ee_mt::all();
        $subestaciones = Sub_ermt::select(
            'sub_ermt.id AS ids',
            'cipes_mt.id AS id_cipe',
            'subestaciones.id AS id_sub',
            'puntos_intercambio.id AS id_punto_i',
            'medidores.id AS id_medidor',
            'tc.id AS id_rtc',
            'tp.id AS id_rtp',
            'cipes_mt.codigo AS cipe',
            'subestaciones.nombre AS subestacion',
            'puntos_intercambio.codigo AS punto',
            'medidores.numero AS medidor',
            'tc.rtc AS rtc',
            'tp.rtp AS rtp'
        )
            ->join('cipes_mt', 'sub_ermt.id_cipe', '=', 'cipes_mt.id')
            ->join('subestaciones', 'sub_ermt.id_sub', '=', 'subestaciones.id')
            ->join('puntos_intercambio', 'sub_ermt.id_punto_i', '=', 'puntos_intercambio.id')
            ->join('medidores', 'sub_ermt.id_medidor', '=', 'medidores.id')
            ->join('tc', 'sub_ermt.id_tc', '=', 'tc.id')
            ->join('tp', 'sub_ermt.id_tp', '=', 'tp.id')
            ->orderBy('sub_ermt.id', 'asc')
            ->get();
        return view('sistema.gestion', compact('tarifas', 'puntosAltaRec', 'puntosAltaEnt', 'zonasMediaRec', 'zonasMediaEnt', 'subestaciones'));
    }





    ///CRUD DE TARIFAS 
    //Guardar TARIFAS
    public function guardar1(Request $request)
    {
        $validacion = $request->validate([
            'codigo' => 'required',
            'descripcion' => 'required',
        ]);

        $tarifa = new Tarifas();
        $tarifa->codigo = $request->input('codigo');
        $tarifa->descripcion = $request->input('descripcion');
        if ($tarifa->save()) {
            return back()->with('message1', 'ok1');
        } else {
            return back()->withErrors(['error' => 'Error al guardar.']);
        }
    }
    //Actualizar TARIFAS
    public function update1(Request $request, string $id)
    {
        $validacion = $request->validate([
            'codigo' => 'required',
            'descripcion' => 'required',
        ]);

        $tarifa = Tarifas::find($id);
        $tarifa->codigo = $request->input('codigo');
        $tarifa->descripcion = $request->input('descripcion');

        if ($tarifa->save()) {
            return back()->with('message1', 'update1');
        } else {
            return back()->with(['message' => 'error']);
        }
    }
    //Eliminar TARIFAS
    public function destroy1($id)
    {
        $tarifa = Tarifas::findOrFail($id);
        $tarifa->delete();
        return back();
    }






    ///CRUD DE PUNTOS RECIBIDOS
    //Guardar Puntos recibidos
    public function guardar2(Request $request)
    {
        $validacion = $request->validate([
            'cipe' => 'required',
            'nombre' => 'required',
            'id_entidad' => 'required',
            'tipo' => 'required',
            'id_zona' => 'required',
        ]);

        $puntosAltaRec = new Puntos();
        $puntosAltaRec->cipe = $request->input('cipe');
        $puntosAltaRec->nombre = $request->input('nombre');
        $puntosAltaRec->id_entidad = $request->input('id_entidad');
        $puntosAltaRec->tipo = $request->input('tipo');
        $puntosAltaRec->id_zona = $request->input('id_zona');
        if ($puntosAltaRec->save()) {
            return back()->with('message2', 'ok2');
        } else {
            return back()->withErrors(['error' => 'Error al guardar.']);
        }
    }
    //Actualizar Puntos recibidos
    public function update2(Request $request, string $id)
    {
        $validacion = $request->validate([
            'cipe' => 'required',
            'nombre' => 'required',
            'id_entidad' => 'required',
            'tipo' => 'required',
            'id_zona' => 'required',
        ]);

        $puntosAltaRec = Puntos::find($id);
        $puntosAltaRec->cipe = $request->input('cipe');
        $puntosAltaRec->nombre = $request->input('nombre');
        $puntosAltaRec->id_entidad = $request->input('id_entidad');
        $puntosAltaRec->tipo = $request->input('tipo');
        $puntosAltaRec->id_zona = $request->input('id_zona');
        if ($puntosAltaRec->save()) {
            return back()->with('message2', 'update2');
        } else {
            return back()->withErrors(['error' => 'Error al guardar.']);
        }
    }
    //Eliminar Puntos recibidos
    public function destroy2($id)
    {
        $puntosAltaRec = Puntos::findOrFail($id);
        $puntosAltaRec->delete();
        return back();
    }






    ///CRUD DE PUNTOS ENTREGADOS
    //Guardar Puntos entregados
    public function guardar3(Request $request)
    {
        $validacion = $request->validate([
            'cipe' => 'required',
            'nombre' => 'required',
            'id_entidad' => 'required',
            'tipo' => 'required',
            'id_zona' => 'required',
        ]);

        $puntosAltaEnt = new Puntos();
        $puntosAltaEnt->cipe = $request->input('cipe');
        $puntosAltaEnt->nombre = $request->input('nombre');
        $puntosAltaEnt->id_entidad = $request->input('id_entidad');
        $puntosAltaEnt->tipo = $request->input('tipo');
        $puntosAltaEnt->id_zona = $request->input('id_zona');
        if ($puntosAltaEnt->save()) {
            return back()->with('message3', 'ok3');
        } else {
            return back()->withErrors(['error' => 'Error al guardar.']);
        }
    }
    //Actualizar Puntos entregados
    public function update3(Request $request, string $id)
    {
        $validacion = $request->validate([
            'cipe' => 'required',
            'nombre' => 'required',
            'id_entidad' => 'required',
            'tipo' => 'required',
            'id_zona' => 'required',
        ]);

        $puntosAltaEnt = new Puntos();
        $puntosAltaEnt->cipe = $request->input('cipe');
        $puntosAltaEnt->nombre = $request->input('nombre');
        $puntosAltaEnt->id_entidad = $request->input('id_entidad');
        $puntosAltaEnt->tipo = $request->input('tipo');
        $puntosAltaEnt->id_zona = $request->input('id_zona');
        if ($puntosAltaEnt->save()) {
            return back()->with('message3', 'update3');
        } else {
            return back()->withErrors(['error' => 'Error al guardar.']);
        }
    }
    //Eliminar Puntos entregados
    public function destroy3($id)
    {
        $puntosAltaEnt = Puntos::findOrFail($id);
        $puntosAltaEnt->delete();
        return back();
    }






    ///CRUD ENERGIA RECIBIDA ZONAS 'Zona_er_mt'
    //Guardar 'Zona_er_mt'
    public function guardar4(Request $request)
    {
        $validacion = $request->validate([
            'nombre' => 'required',
        ]);

        $zonasMediaRec = new Zona_er_mt();
        $zonasMediaRec->nombre = $request->input('nombre');
        if ($zonasMediaRec->save()) {
            return back()->with('message4', 'ok4');
        } else {
            return back()->withErrors(['error' => 'Error al guardar.']);
        }
    }
    //Actualizar 'Zona_er_mt'
    public function update4(Request $request, string $id)
    {
        $validacion = $request->validate([
            'nombre' => 'required',
        ]);

        $zonasMediaRec = Zona_er_mt::find($id);
        $zonasMediaRec->nombre = $request->input('nombre');
        if ($zonasMediaRec->save()) {
            return back()->with('message4', 'update4');
        } else {
            return back()->with(['message' => 'error']);
        }
    }
    //Eliminar 'Zona_er_mt'
    public function destroy4($id)
    {
        $zonasMediaRec = Zona_er_mt::findOrFail($id);
        $zonasMediaRec->delete();
        return back();
    }


    


    ///CRUD SUBESTACIONES
    //Guardar Subestaciones
    public function guardar5(Request $request)
    {
        $validacion = $request->validate([
            'id_cipe' => 'required',
            'id_sub' => 'required',
            'id_punto_i' => 'required',
            'id_medidor' => 'required',
            'id_tc' => 'required',
            'id_tp' => 'required',
        ]);

        $subestaciones = new Sub_ermt();
        $subestaciones->id_cipe = $request->input('id_cipe');
        $subestaciones->id_sub = $request->input('id_sub');
        $subestaciones->id_punto_i = $request->input('id_punto_i');
        $subestaciones->id_medidor = $request->input('id_medidor');
        $subestaciones->id_tc = $request->input('id_tc');
        $subestaciones->id_tp = $request->input('id_tp');
        if ($subestaciones->save()) {
            return back()->with('message5', 'ok5');
        } else {
            return back()->withErrors(['error' => 'Error al guardar.']);
        }
    }
    //Actualizar Subestaciones 
    public function update5(Request $request, string $id)
    {
        $validacion = $request->validate([
            'id_cipe' => 'required',
            'id_sub' => 'required',
            'id_punto_i' => 'required',
            'id_medidor' => 'required',
            'id_tc' => 'required',
            'id_tp' => 'required',
        ]);

        $subestaciones = Sub_ermt::find($id);
        $subestaciones->id_cipe = $request->input('id_cipe');
        $subestaciones->id_sub = $request->input('id_sub');
        $subestaciones->id_punto_i = $request->input('id_punto_i');
        $subestaciones->id_medidor = $request->input('id_medidor');
        $subestaciones->id_tc = $request->input('id_tc');
        $subestaciones->id_tp = $request->input('id_tp');
        if ($subestaciones->save()) {
            return back()->with('message5', 'update5');
        } else {
            return back()->withErrors(['error' => 'Error al guardar.']);
        }
    }
    //Eliminar Subestaciones
    public function destroy5($id)
    {
        $subestaciones = Sub_ermt::findOrFail($id);
        $subestaciones->delete();
        return back();
    }






    ///CRUD ENERGIA ENTREGADA ZONAS 'Zona_ee_mt'
    //Guardar 'zona_ee_mt'
    public function guardar6(Request $request)
    {
        $validacion = $request->validate([
            'nombre' => 'required',
        ]);

        $zonasMediaEnt = new Zona_ee_mt();
        $zonasMediaEnt->nombre = $request->input('nombre');
        if ($zonasMediaEnt->save()) {
            return back()->with('message6', 'ok6');
        } else {
            return back()->withErrors(['error' => 'Error al guardar.']);
        }
    }
    //Actualizar 'Zona_ee_mt'
    public function update6(Request $request, string $id)
    {
        $validacion = $request->validate([
            'nombre' => 'required',
        ]);

        $zonasMediaEnt = Zona_ee_mt::find($id);
        $zonasMediaEnt->nombre = $request->input('nombre');

        if ($zonasMediaEnt->save()) {
            return back()->with('message6', 'update6');
        } else {
            return back()->with(['message' => 'error']);
        }
    }
    //Eliminar 'Zona_ee_mt'
    public function destroy6($id)
    {
        $zonasMediaEnt = Zona_ee_mt::findOrFail($id);
        $zonasMediaEnt->delete();
        return back();
    }
}
