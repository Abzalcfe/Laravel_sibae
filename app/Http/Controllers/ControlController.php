<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Years;
use App\Models\Tarifas;
use App\Models\Ventas;
use App\Models\Fechas;
use App\Models\Energia_recibida;
use App\Models\Energia_entregada;
use App\Models\Puntos;
use App\Models\E_e_mt;
use App\Models\Zona_ee_mt;
use App\Models\Energia_sub_mt;
use App\Models\Cipes_mt;
use App\Models\E_r_mt;
use App\Models\Zona_er_mt;
use App\Models\Sub_ermt;
use Illuminate\Support\Facades\Auth;

class ControlController extends Controller
{
    public function control()
    {
        $usuarioActivo = Auth::user();
        $years = Years::all();
        $ultimoYear = Years::orderBy('id', 'desc')->first();
        return view('sistema.control', compact('years', 'usuarioActivo', 'ultimoYear'));
    }
    /////////////////////////////////////////////////////////////////////////////
    public function ventas(Request $request, $id_year)
    {
        $meses = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre',
        ];

        $id_mes = $request->input('mes', 1);
        $idFecha = Fechas::where('id_mes', $id_mes)->where('id_year', $id_year)->first();

        if ($idFecha) {
            $existeRegistro = Ventas::where('id_fecha', $idFecha->id)->exists();

            if ($existeRegistro) {
                $tarifaVentas = Ventas::join('tarifas', 'tarifas.id', '=', 'ventas.id_tarifa')
                    ->select('ventas.*', 'tarifas.descripcion')
                    ->where('ventas.id_fecha', $idFecha->id)
                    ->get();

                $nombre_mes = $meses[$id_mes];

                return view('sistema.GestionVentas2', compact('id_year', 'id_mes', 'nombre_mes', 'tarifaVentas', 'idFecha'));
            } else {
                $tarifas = Tarifas::all();

                $nombre_mes = $meses[$id_mes];

                return view('sistema.GestionVentas', compact('id_year', 'id_mes', 'nombre_mes', 'tarifas', 'idFecha'));
            }
        } else {
            return "No se encontró la fecha";
        }
    }
    public function ventasguardar(Request $request)
    {
        $id_year = $request->input('year');
        $mes = $request->input('mes');
        $idTarifas = $request->input('idt');
        $idFechas = $request->input('idfecha');
        $Montos = $request->input('monto');

        if (count($idTarifas) !== count($idFechas) || count($idTarifas) !== count($Montos)) {
            return redirect()->back()->withErrors(['error' => 'Datos incompletos o desalineados']);
        }

        foreach ($idTarifas as $index => $idTarifa) {
            $idFecha = $idFechas[$index];
            $Monto = $Montos[$index];

            if (!empty($Monto)) {
                $venta = new Ventas();
                $venta->id_tarifa = $idTarifa;
                $venta->id_fecha = $idFecha;
                $venta->monto = $Monto;

                if (!$venta->save()) {
                    return view('sistema.GestionVentas2', ['errors' => ['error' => 'Error al guardar']]);
                }
            }
        }
        return redirect()->route('control.ventas', ['id_year' => $id_year, 'mes' => $mes])->with('message', 'ok');
    }
    public function ventasactualizar(Request $request)
    {
        $validacion = $request->validate([
            'monto.*' => 'required|numeric',
        ]);

        $id_year = $request->input('year');
        $mes = $request->input('mes');
        $idVentas = $request->input('id');
        $idFechas = $request->input('idfecha');
        $Montos = $request->input('monto');

        if (count($idVentas) !== count($idFechas) || count($idVentas) !== count($Montos)) {
            return redirect()->back()->withErrors(['error' => 'Datos incompletos o desalineados']);
        }

        foreach ($idVentas as $index => $idVenta) {
            $idFecha = $idFechas[$index];
            $Monto = $Montos[$index];

            if (!empty($Monto)) {
                $venta = Ventas::find($idVenta);
                $venta->monto = $Monto;

                if (!$venta->save()) {
                    return back()->with(['message' => 'error']);
                }
            }
        }
        return redirect()->route('control.ventas', ['id_year' => $id_year, 'mes' => $mes])->with('message', 'update');
    }
    /////////////////////////////////////////////////////////////////////////////
    public function era(Request $request, $id_year)
    {
        $meses = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre',
        ];

        $id_mes = $request->input('mes', 1);
        $idFecha = Fechas::where('id_mes', $id_mes)->where('id_year', $id_year)->first();

        if ($idFecha) {
            $existeRegistro = Energia_recibida::where('id_fecha', $idFecha->id)->exists();

            if ($existeRegistro) {
                $EnergiaRAT = Energia_recibida::join('puntos', 'puntos.id', '=', 'energia_recibida.id_punto')
                    ->select('energia_recibida.*', 'puntos.cipe', 'puntos.nombre')
                    ->where('energia_recibida.id_fecha', $idFecha->id)
                    ->get();

                $nombre_mes = $meses[$id_mes];
                //actualizar
                return view('sistema.GestionERAT2', compact('id_year', 'id_mes', 'nombre_mes', 'EnergiaRAT', 'idFecha'));
            } else {
                $puntos = Puntos::where('tipo', 1)->get();

                $nombre_mes = $meses[$id_mes];
                //insertar
                return view('sistema.GestionERAT', compact('id_year', 'id_mes', 'nombre_mes', 'puntos', 'idFecha'));
            }
        } else {
            return "No se encontró la fecha";
        }
    }
    public function eraguardar(Request $request)
    {

        $id_year = $request->input('year');
        $mes = $request->input('mes');
        $idPuntos = $request->input('idp');
        $idFechas = $request->input('idfecha');
        $Energias = $request->input('energia');

        if (count($idPuntos) !== count($idFechas) || count($idPuntos) !== count($Energias)) {
            return redirect()->back()->withErrors(['error' => 'Datos incompletos o desalineados']);
        }

        foreach ($idPuntos as $index => $idPunto) {
            $idFecha = $idFechas[$index];
            $Energia = $Energias[$index];

            if (!empty($Energia)) {
                $energiaRAT = new Energia_recibida();
                $energiaRAT->id_punto = $idPunto;
                $energiaRAT->id_fecha = $idFecha;
                $energiaRAT->energia = $Energia;

                if (!$energiaRAT->save()) {
                    return view('sistema.GestionERAT2', ['errors' => ['error' => 'Error al guardar']]);
                }
            }
        }
        return redirect()->route('control.era', ['id_year' => $id_year, 'mes' => $mes])->with('message', 'ok');
    }
    public function eraactualizar(Request $request)
    {
        $validacion = $request->validate([
            'monto.*' => 'required|numeric',
        ]);

        $id_year = $request->input('year');
        $mes = $request->input('mes');
        $idEnergias = $request->input('id');
        $idFechas = $request->input('idfecha');
        $Montos = $request->input('monto');

        if (count($idEnergias) !== count($idFechas) || count($idEnergias) !== count($Montos)) {
            return redirect()->back()->withErrors(['error' => 'Datos incompletos o desalineados']);
        }

        foreach ($idEnergias as $index => $idEnergia) {
            $idFecha = $idFechas[$index];
            $Monto = $Montos[$index];

            if (!empty($Monto)) {
                $ERAT = Energia_recibida::find($idEnergia);
                $ERAT->energia = $Monto;

                if (!$ERAT->save()) {
                    return back()->with(['message' => 'error']);
                }
            }
        }
        return redirect()->route('control.era', ['id_year' => $id_year, 'mes' => $mes])->with('message', 'update');
    }
    /////////////////////////////////////////////////////////////////////////////
    public function eea(Request $request, $id_year)
    {
        $meses = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre',
        ];

        $id_mes = $request->input('mes', 1);
        $idFecha = Fechas::where('id_mes', $id_mes)->where('id_year', $id_year)->first();

        if ($idFecha) {
            $existeRegistro = Energia_entregada::where('id_fecha', $idFecha->id)->exists();

            if ($existeRegistro) {
                $EnergiaEAT = Energia_entregada::join('puntos', 'puntos.id', '=', 'energia_entregada.id_punto')
                    ->select('energia_entregada.*', 'puntos.cipe', 'puntos.nombre', 'puntos.id as idp')
                    ->where('energia_entregada.id_fecha', $idFecha->id)
                    ->get();

                $nombre_mes = $meses[$id_mes];

                return view('sistema.GestionEEAT2', compact('id_year', 'id_mes', 'nombre_mes', 'EnergiaEAT', 'idFecha'));
            } else {
                $puntos = Puntos::where('tipo', 2)->get();

                $nombre_mes = $meses[$id_mes];

                return view('sistema.GestionEEAT', compact('id_year', 'id_mes', 'nombre_mes', 'puntos', 'idFecha'));
            }
        } else {
            return "No se encontró la fecha";
        }
    }
    public function eeaguardar(Request $request)
    {

        $id_year = $request->input('year');
        $mes = $request->input('mes');
        $idPuntos = $request->input('idp');
        $idFechas = $request->input('idfecha');
        $Energias = $request->input('energia');

        if (count($idPuntos) !== count($idFechas) || count($idPuntos) !== count($Energias)) {
            return redirect()->back()->withErrors(['error' => 'Datos incompletos o desalineados']);
        }

        foreach ($idPuntos as $index => $idPunto) {
            $idFecha = $idFechas[$index];
            $Energia = $Energias[$index];

            if (!empty($Energia)) {
                $energiaEAT = new Energia_entregada();
                $energiaEAT->id_punto = $idPunto;
                $energiaEAT->id_fecha = $idFecha;
                $energiaEAT->energia = $Energia;

                if (!$energiaEAT->save()) {
                    return view('sistema.GestionEEAT2', ['errors' => ['error' => 'Error al guardar']]);
                }
            }
        }
        return redirect()->route('control.eea', ['id_year' => $id_year, 'mes' => $mes])->with('message', 'ok');
    }
    public function eeaactualizar(Request $request)
    {
        $validacion = $request->validate([
            'monto.*' => 'required|numeric',
        ]);

        $id_year = $request->input('year');
        $mes = $request->input('mes');
        $idEnergias = $request->input('id');
        $idFechas = $request->input('idfecha');
        $Montos = $request->input('monto');

        if (count($idEnergias) !== count($idFechas) || count($idEnergias) !== count($Montos)) {
            return redirect()->back()->withErrors(['error' => 'Datos incompletos o desalineados']);
        }

        foreach ($idEnergias as $index => $idEnergia) {
            $idFecha = $idFechas[$index];
            $Monto = $Montos[$index];

            if (!empty($Monto)) {
                $EEAT = Energia_entregada::find($idEnergia);
                $EEAT->energia = $Monto;

                if (!$EEAT->save()) {
                    return back()->with(['message' => 'error']);
                }
            }
        }
        return redirect()->route('control.eea', ['id_year' => $id_year, 'mes' => $mes])->with('message', 'update');
    }
    /////////////////////////////////////////////////////////////////////////////
    public function erms(Request $request, $id_year)
    {
        $meses = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre',
        ];

        $id_mes = $request->input('mes', 1);
        $idFecha = Fechas::where('id_mes', $id_mes)->where('id_year', $id_year)->first();

        if ($idFecha) {
            $existeRegistro = Energia_sub_mt::where('id_fecha', $idFecha->id)->exists();

            if ($existeRegistro) {

                $energiaData = Energia_sub_mt::select(
                    'energia_sub_mt.id as ide',
                    'sub_ermt.id AS ids',
                    'cipes_mt.codigo AS cipe',
                    'subestaciones.nombre AS subestacion',
                    'puntos_intercambio.codigo AS punto',
                    'medidores.numero AS medidor',
                    'tc.rtc AS rtc',
                    'tp.rtp AS rtp',
                    'energia_sub_mt.energia as energias'
                )
                    ->join('sub_ermt', 'energia_sub_mt.id_sub_ermt', '=', 'sub_ermt.id')  // Primero se une con sub_ermt
                    ->join('cipes_mt', 'sub_ermt.id_cipe', '=', 'cipes_mt.id')
                    ->join('subestaciones', 'sub_ermt.id_sub', '=', 'subestaciones.id')
                    ->join('puntos_intercambio', 'sub_ermt.id_punto_i', '=', 'puntos_intercambio.id')
                    ->join('medidores', 'sub_ermt.id_medidor', '=', 'medidores.id')
                    ->join('tc', 'sub_ermt.id_tc', '=', 'tc.id')
                    ->join('tp', 'sub_ermt.id_tp', '=', 'tp.id')
                    ->where('energia_sub_mt.id_fecha', $idFecha->id)
                    ->orderBy('energia_sub_mt.id', 'asc')
                    ->get();
                $nombre_mes = $meses[$id_mes];

                return view('sistema.GestionERMTS2', compact('id_year', 'id_mes', 'nombre_mes', 'energiaData', 'idFecha'));
            } else {

                $energiaData2 = Sub_ermt::select(
                    'sub_ermt.id AS ids',
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


                $nombre_mes = $meses[$id_mes];

                return view('sistema.GestionERMTS', compact('id_year', 'id_mes', 'nombre_mes', 'energiaData2', 'idFecha'));
            }
        } else {
            return "No se encontró la fecha";
        }
    }
    public function ermsguardar(Request $request)
    {
        $id_year = $request->input('year');
        $mes = $request->input('mes');
        $idFechas = $request->input('idfecha');
        $idZonas = $request->input('ids');
        $Energias = $request->input('energia');

        if (count($idZonas) !== count($idFechas) || count($idZonas) !== count($Energias)) {
            return redirect()->back()->withErrors(['error' => 'Datos incompletos o desalineados']);
        }

        foreach ($idZonas as $index => $idZona) {
            $idFecha = $idFechas[$index];
            $Energia = $Energias[$index];

            if (!empty($Energia)) {
                $energiaRMTS = new Energia_sub_mt();
                $energiaRMTS->id_fecha = $idFecha;
                $energiaRMTS->id_sub_ermt = $idZona;
                $energiaRMTS->energia = $Energia;

                if (!$energiaRMTS->save()) {
                    return view('sistema.GestionERMTS2', ['errors' => ['error' => 'Error al guardar']]);
                }
            }
        }
        return redirect()->route('control.erms', ['id_year' => $id_year, 'mes' => $mes])->with('message', 'ok');
    }
    public function ermsactualizar(Request $request)
    {
        $validacion = $request->validate([
            'monto.*' => 'required|numeric',
            'subestacion.*' => 'required|numeric',
        ]);

        $id_year = $request->input('year');
        $mes = $request->input('mes');
        $idEnergias = $request->input('ide');
        $idFechas = $request->input('idfecha');
        $Subestaciones = $request->input('subestacion');
        $Montos = $request->input('monto');

        if (count($idEnergias) !== count($idFechas) || count($idEnergias) !== count($Montos)) {
            return redirect()->back()->withErrors(['error' => 'Datos incompletos o desalineados']);
        }

        foreach ($idEnergias as $index => $idEnergia) {
            $idFecha = $idFechas[$index];
            $Monto = $Montos[$index];
            $Subestacion = $Subestaciones[$index];

            if (!empty($Monto)) {
                $ERMT2 = Energia_sub_mt::find($idEnergia);
                $ERMT2->energia = $Monto;
                $ERMT2->id_sub_ermt = $Subestacion;

                if (!$ERMT2->save()) {
                    return back()->with(['message' => 'error']);
                }
            }
        }
        return redirect()->route('control.erms', ['id_year' => $id_year, 'mes' => $mes])->with('message', 'update');
    }
    /////////////////////////////////////////////////////////////////////////////
    public function ermp(Request $request, $id_year)
    {
        $meses = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre',
        ];

        $id_mes = $request->input('mes', 1);
        $idFecha = Fechas::where('id_mes', $id_mes)->where('id_year', $id_year)->first();

        if ($idFecha) {
            $existeRegistro = E_r_mt::where('id_fecha', $idFecha->id)->exists();

            if ($existeRegistro) {
                $EnergiaRMTP = E_r_mt::join('zona_er_mt', 'zona_er_mt.id', '=', 'e_r_mt.id_zona')
                    ->select('e_r_mt.*', 'zona_er_mt.id as idz', 'zona_er_mt.nombre')
                    ->where('e_r_mt.id_fecha', $idFecha->id)
                    ->get();

                $nombre_mes = $meses[$id_mes];

                return view('sistema.GestionERMTP2', compact('id_year', 'id_mes', 'nombre_mes', 'EnergiaRMTP', 'idFecha'));
            } else {
                $zonas = Zona_er_mt::all();

                $nombre_mes = $meses[$id_mes];

                return view('sistema.GestionERMTP', compact('id_year', 'id_mes', 'nombre_mes', 'zonas', 'idFecha'));
            }
        } else {
            return "No se encontró la fecha";
        }
    }
    public function ermpguardar(Request $request)
    {
        $id_year = $request->input('year');
        $mes = $request->input('mes');
        $idFechas = $request->input('idfecha');
        $idZonas = $request->input('idz');
        $Energias = $request->input('energia');

        if (count($idZonas) !== count($idFechas) || count($idZonas) !== count($Energias)) {
            return redirect()->back()->withErrors(['error' => 'Datos incompletos o desalineados']);
        }

        foreach ($idZonas as $index => $idZona) {
            $idFecha = $idFechas[$index];
            $Energia = $Energias[$index];

            if (!empty($Energia)) {
                $energiaRMT2 = new E_r_mt();
                $energiaRMT2->id_fecha = $idFecha;
                $energiaRMT2->id_zona = $idZona;
                $energiaRMT2->energia = $Energia;

                if (!$energiaRMT2->save()) {
                    return view('sistema.GestionERMTP2', ['errors' => ['error' => 'Error al guardar']]);
                }
            }
        }
        return redirect()->route('control.ermp', ['id_year' => $id_year, 'mes' => $mes])->with('message', 'ok');
    }
    public function ermpactualizar(Request $request)
    {
        $validacion = $request->validate([
            'monto.*' => 'required|numeric',
        ]);

        $id_year = $request->input('year');
        $mes = $request->input('mes');
        $idEnergias = $request->input('id');
        $idFechas = $request->input('idfecha');
        $Montos = $request->input('monto');

        if (count($idEnergias) !== count($idFechas) || count($idEnergias) !== count($Montos)) {
            return redirect()->back()->withErrors(['error' => 'Datos incompletos o desalineados']);
        }

        foreach ($idEnergias as $index => $idEnergia) {
            $idFecha = $idFechas[$index];
            $Monto = $Montos[$index];

            if (!empty($Monto)) {
                $ERMT1 = E_r_mt::find($idEnergia);
                $ERMT1->energia = $Monto;

                if (!$ERMT1->save()) {
                    return back()->with(['message' => 'error']);
                }
            }
        }
        return redirect()->route('control.ermp', ['id_year' => $id_year, 'mes' => $mes])->with('message', 'update');
    }
    /////////////////////////////////////////////////////////////////////////////
    public function eem(Request $request, $id_year)
    {
        $meses = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre',
        ];

        $id_mes = $request->input('mes', 1);
        $idFecha = Fechas::where('id_mes', $id_mes)->where('id_year', $id_year)->first();

        if ($idFecha) {
            $existeRegistro = E_e_mt::where('id_fecha', $idFecha->id)->exists();

            if ($existeRegistro) {
                $EnergiaEMTP = E_e_mt::join('zona_ee_mt', 'zona_ee_mt.id', '=', 'e_e_mt.id_zona')
                    ->select('e_e_mt.*', 'zona_ee_mt.id as idz', 'zona_ee_mt.nombre')
                    ->where('e_e_mt.id_fecha', $idFecha->id)
                    ->get();

                $nombre_mes = $meses[$id_mes];

                return view('sistema.GestionEEMT2', compact('id_year', 'id_mes', 'nombre_mes', 'EnergiaEMTP', 'idFecha'));
            } else {
                $zonas = Zona_ee_mt::all();

                $nombre_mes = $meses[$id_mes];

                return view('sistema.GestionEEMT', compact('id_year', 'id_mes', 'nombre_mes', 'zonas', 'idFecha'));
            }
        } else {
            return "No se encontró la fecha";
        }
    }
    public function eemguardar(Request $request)
    {
        $id_year = $request->input('year');
        $mes = $request->input('mes');
        $idFechas = $request->input('idfecha');
        $idZonas = $request->input('idz');
        $Energias = $request->input('energia');

        if (count($idZonas) !== count($idFechas) || count($idZonas) !== count($Energias)) {
            return redirect()->back()->withErrors(['error' => 'Datos incompletos o desalineados']);
        }

        foreach ($idZonas as $index => $idZona) {
            $idFecha = $idFechas[$index];
            $Energia = $Energias[$index];

            if (!empty($Energia)) {
                $energiaEMT = new E_e_mt();
                $energiaEMT->id_fecha = $idFecha;
                $energiaEMT->id_zona = $idZona;
                $energiaEMT->energia = $Energia;

                if (!$energiaEMT->save()) {
                    return view('sistema.GestionEEMT2', ['errors' => ['error' => 'Error al guardar']]);
                }
            }
        }
        return redirect()->route('control.eem', ['id_year' => $id_year, 'mes' => $mes])->with('message', 'ok');
    }
    public function eemactualizar(Request $request)
    {
        $validacion = $request->validate([
            'monto.*' => 'required|numeric',
        ]);

        $id_year = $request->input('year');
        $mes = $request->input('mes');
        $idEnergias = $request->input('id');
        $idFechas = $request->input('idfecha');
        $Montos = $request->input('monto');

        if (count($idEnergias) !== count($idFechas) || count($idEnergias) !== count($Montos)) {
            return redirect()->back()->withErrors(['error' => 'Datos incompletos o desalineados']);
        }

        foreach ($idEnergias as $index => $idEnergia) {
            $idFecha = $idFechas[$index];
            $Monto = $Montos[$index];

            if (!empty($Monto)) {
                $EEMT = E_e_mt::find($idEnergia);
                $EEMT->energia = $Monto;

                if (!$EEMT->save()) {
                    return back()->with(['message' => 'error']);
                }
            }
        }
        return redirect()->route('control.eem', ['id_year' => $id_year, 'mes' => $mes])->with('message', 'update');
    }
    public function nuevoyear(Request $request)
    {
        $nuevoYear = $request->input('ultimoyear');
        $id = substr(strval($nuevoYear), -2);

        $year = new Years();
        $year->id = $id;
        $year->year = $nuevoYear;



        if ($year->save()) {
            return back()->with('message', 'ok');
        } else {
            return back()->withErrors(['error' => 'Error']);
        }
    }
}
