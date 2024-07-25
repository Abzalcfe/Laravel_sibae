<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puntos;
use Illuminate\Support\Facades\Auth;


class PuntosController extends Controller
{
    public function puntos()
    {
        //
        $puntos = Puntos::all();
        $puntos1 = Puntos::where('id_zona', 1)->get();
        $puntos2 = Puntos::where('id_zona', 2)->get();
        $puntos3 = Puntos::where('id_zona', 3)->get();
        $puntos4 = Puntos::where('id_zona', 4)->get();
        $usuarioActivo = Auth::user();

        return view('sistema.puntos.puntos', compact('puntos1', 'puntos2', 'puntos3', 'puntos4', 'usuarioActivo'));
    }

    public function guardar1(Request $request)
    {
        $validacion = $request->validate([
            'cipe' => 'required',
            'nombre' => 'required',
            'id_entidad' => 'required',
            'id_zona' => 'required',
        ]);

        $puntos = new Puntos();
        $puntos->cipe = $request->input('cipe');
        $puntos->nombre = $request->input('nombre');
        $puntos->id_entidad = $request->input('id_entidad');
        $puntos->id_zona = $request->input('id_zona');
        if ($puntos->save()) {
            return back()->with('message', 'ok');
        } else {
            return back()->withErrors(['error' => 'Error al guardar.']);
        }
    }


    public function update1(Request $request, string $id)
    {
        $validacion = $request->validate([
            'cipe' => 'required',
            'nombre' => 'required',
            'id_entidad' => 'required',
            'id_zona' => 'required',
        ]);

        $puntos = Puntos::find($id);
        $puntos->cipe = $request->input('cipe');
        $puntos->nombre = $request->input('nombre');
        $puntos->id_entidad = $request->input('id_entidad');
        $puntos->id_zona = $request->input('id_zona');

        if ($puntos->save()) {
            return back()->with('message1', 'update1');
        } else {
            return back()->with(['message' => 'error']);
        }
    }


    public function update2(Request $request, string $id)
    {
        $validacion = $request->validate([
            'cipe' => 'required',
            'nombre' => 'required',
            'id_entidad' => 'required',
            'id_zona' => 'required',
        ]);

        $puntos = Puntos::find($id);
        $puntos->cipe = $request->input('cipe');
        $puntos->nombre = $request->input('nombre');
        $puntos->id_entidad = $request->input('id_entidad');
        $puntos->id_zona = $request->input('id_zona');

        if ($puntos->save()) {
            return back()->with('message2', 'update2');
        } else {
            return back()->with(['message' => 'error']);
        }
    }


    public function update3(Request $request, string $id)
    {
        $validacion = $request->validate([
            'cipe' => 'required',
            'nombre' => 'required',
            'id_entidad' => 'required',
            'id_zona' => 'required',
        ]);

        $puntos = Puntos::find($id);
        $puntos->cipe = $request->input('cipe');
        $puntos->nombre = $request->input('nombre');
        $puntos->id_entidad = $request->input('id_entidad');
        $puntos->id_zona = $request->input('id_zona');

        if ($puntos->save()) {
            return back()->with('message3', 'update3');
        } else {
            return back()->with(['message' => 'error']);
        }
    }


    public function update4(Request $request, string $id)
    {
        $validacion = $request->validate([
            'cipe' => 'required',
            'nombre' => 'required',
            'id_entidad' => 'required',
            'id_zona' => 'required',
        ]);

        $puntos = Puntos::find($id);
        $puntos->cipe = $request->input('cipe');
        $puntos->nombre = $request->input('nombre');
        $puntos->id_entidad = $request->input('id_entidad');
        $puntos->id_zona = $request->input('id_zona');

        if ($puntos->save()) {
            return back()->with('message4', 'update4');
        } else {
            return back()->with(['message' => 'error']);
        }
    }


    public function destroy1($id)
    {
        $puntos = Puntos::findOrFail($id);
        $puntos->delete();
        return back();
    }
}
