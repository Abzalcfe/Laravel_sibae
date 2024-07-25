@extends('adminlte::page')

@section('title', 'SIBAE')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h6>SIBAE: Sistema de Gestión de Balance de Energía</h6>
            <h1>Administración y Configuración del Sistema</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('control.control') }}">
                <button type="button" class="btn btn-primary custom-btn"><i class="fa fa-arrow-circle-left"></i>
                    Control
                </button>
            </a>
        </div>
    </div>
@stop



@section('content')
    @if (session()->has('message1') && session('message1') == 'ok1')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "Registro exitoso",
                icon: "success",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    @endif

    @if (session()->has('message2') && session('message2') == 'ok2')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "Registro exitoso",
                icon: "success",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    @endif

    @if (session()->has('message3') && session('message3') == 'ok3')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "Registro exitoso",
                icon: "success",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    @endif

    @if (session()->has('message4') && session('message4') == 'ok4')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "Registro exitoso",
                icon: "success",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    @endif

    @if (session()->has('message5') && session('message5') == 'ok5')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "Registro exitoso",
                icon: "success",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    @endif

    @if (session()->has('message6') && session('message6') == 'ok6')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "Registro exitoso",
                icon: "success",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    @endif

    @if ($errors->any())
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "{{ $errors->first() }}",
                icon: "warning",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    @endif

    @if (session()->has('message1') && session('message1') == 'update1')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "Registros actualizados",
                icon: "success",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    @endif

    @if (session()->has('message2') && session('message2') == 'update2')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "Registros actualizados",
                icon: "success",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    @endif

    @if (session()->has('message3') && session('message3') == 'update3')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "Registros actualizados",
                icon: "success",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    @endif

    @if (session()->has('message4') && session('message4') == 'update4')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "Registros actualizados",
                icon: "success",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    @endif

    @if (session()->has('message5') && session('message5') == 'update5')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "Registros actualizados",
                icon: "success",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    @endif

    @if (session()->has('message6') && session('message6') == 'update6')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "Registros actualizados",
                icon: "success",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    @endif

    @if (session()->has('message') && session('message') == 'error')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "Campos incompletos",
                icon: "error",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    @endif

    @php
        echo '<h1>Gestión de secciones</h1>';
    @endphp

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">Ventas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                aria-selected="false">Balance de Alta Tensión</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="mensual-tab" data-toggle="tab" href="#mensual" role="tab" aria-controls="mensual"
                aria-selected="false">Balance de Media Tensión</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card shadow-lg">
                <div class="card-body">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 style="color: rgb(7, 102, 24);">Tarifas mensuales</h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <x-adminlte-button label="Nuevo registro" data-toggle="modal" data-target="#nuevo1"
                                class="bg-primary text-white" style="margin-right: 10px;" />
                        </div>
                        <x-adminlte-modal id="nuevo1" title="Nueva tarifa" size="md" theme="primary"
                            icon="fa fa-circle" v-centered static-backdrop scrollable>
                            <div style="height:400px;">
                                <div class="modal-body">
                                    <form id="frmRegistro1" action="{{ route('gestion.guardar1') }}" method="get">
                                        @csrf

                                        <input type="hidden" name="id" id="id">

                                        <x-adminlte-input type="text" name="codigo" id="codigo" label="Código"
                                            label-class="text-primary">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-circle text-primary"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>

                                        <x-adminlte-input type="text" name="descripcion" id="descripcion"
                                            label="Descripción" label-class="text-primary">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-circle text-primary"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>

                                        <x-slot name="footerSlot">
                                            <x-adminlte-button theme="primary" label="Guardar" id="guardarBtn1"
                                                type="button" class="bg-primary text-white" />
                                            <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal"
                                                id="cancelar" type="button" />
                                        </x-slot>
                                    </form>
                                </div>
                            </div>
                        </x-adminlte-modal>
                    </div>
                    @php
                        $heads = [['no-export' => true, 'width' => 1], 'ID', 'Código', 'Descripción', 'Opciones'];
                        $btnEdit = '';
                        $btnDelete1 = '<button type="submit" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Delete">
                          <i class="fa fa-lg fa-fw fa-trash"></i>
                      </button>';
                        $config = [
                            'language' => [
                                'url' => 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                            ],
                        ];
                    @endphp
                    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config">
                        @foreach ($tarifas as $tarifa)
                            <tr>
                                <td></td>
                                <td>{{ $tarifa->id }}</td>
                                <td>{{ $tarifa->codigo }}</td>
                                <td>{{ $tarifa->descripcion }}</td>
                                <td>
                                    <a href="#" class="btn btn-xs btn-default text-primary mx-1 shadow editar1"
                                        title="Edit" data-tarifa-id="{{ $tarifa->id }}">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </a>
                                    <form style="display: inline" action="{{ route('gestion.destroy1', $tarifa->id) }}"
                                        method="post" class="formEliminar1">
                                        @csrf
                                        @method('DELETE')
                                        {!! $btnDelete1 !!}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @foreach ($tarifas as $tarifa)
                            <x-adminlte-modal id="editar1_{{ $tarifa->id }}" title="EDITAR: Tarifas" size="md"
                                theme="primary" icon="fa fa-bolt" v-centered static-backdrop scrollable>
                                <div style="height:400px;">
                                    <div class="modal-body">
                                        <form id="frmActualizar1_{{ $tarifa->id }}"
                                            action="{{ route('gestion.update1', $tarifa->id) }}" method="GET">
                                            @csrf

                                            <x-adminlte-input type="text" name="codigo" id="codigo"
                                                label="Código" label-class="text-primary" value="{{ $tarifa->codigo }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="text" name="descripcion" id="descripcion"
                                                label="Descripción" label-class="text-primary"
                                                value="{{ $tarifa->descripcion }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-slot name="footerSlot">
                                                <x-adminlte-button theme="primary" label="Actualizar"
                                                    class="actualizarBtn1" data-tarifa-id="{{ $tarifa->id }}" />
                                                <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal"
                                                    id="cancelar" type="button" />
                                            </x-slot>
                                        </form>
                                    </div>
                                </div>
                            </x-adminlte-modal>
                        @endforeach
                    </x-adminlte-datatable>
                    <BR></BR>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card shadow-lg">
                <div class="card-body">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 style="color: rgb(7, 102, 24);">Energías recibidas: PUNTOS</h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <x-adminlte-button label="Nuevo registro" data-toggle="modal" data-target="#nuevo2"
                                class="bg-primary text-white" style="margin-right: 10px;" />
                        </div>
                        <x-adminlte-modal id="nuevo2" title="Nueva Zona" size="md" theme="primary"
                            icon="fa fa-circle" v-centered static-backdrop scrollable>
                            <div style="height:400px;">
                                <div class="modal-body">
                                    <form id="frmRegistro2" action="{{ route('gestion.guardar2') }}" method="get">
                                        @csrf
                                        <input type="hidden" name="id" id="id">
                                        <x-adminlte-input type="text" name="cipe" id="cipe" label="CIPE"
                                            label-class="text-primary">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-circle text-primary"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>

                                        <x-adminlte-input type="text" name="nombre" id="nombre" label="Nombre"
                                            label-class="text-primary">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-circle text-primary"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>

                                        <x-adminlte-select name="id_entidad" id="id_entidad" label="Entidad" label-class="text-primary">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-circle text-primary"></i>
                                                </div>
                                            </x-slot>
                                            <option value="1">A.T.T.C</option>
                                            <option value="2">G.R.P.C</option>
                                            <option value="3">DIV.GOLF.C</option>
                                            <option value="4">Z.SJR</option>
                                            <option value="5">PEMEX</option>
                                            <option value="6">PORTEO</option>
                                        </x-adminlte-select>

                                        <x-adminlte-select name="tipo" id="tipo" label="Tipo" label-class="text-primary">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-circle text-primary"></i>
                                                </div>
                                            </x-slot>
                                            <option value="1">Energía recibida</option>
                                            <option value="2">Energía entregada</option>
                                        </x-adminlte-select>

                                        <x-adminlte-select name="id_zona" id="id_zona" label="Zona" label-class="text-primary">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-circle text-primary"></i>
                                                </div>
                                            </x-slot>
                                            <option value="1">Zona Tula</option>
                                            <option value="2">Zona Pachuca</option>
                                            <option value="3">Zona Valles</option>
                                            <option value="4">Zona San Juan del Río</option>
                                        </x-adminlte-select>

                                        <x-slot name="footerSlot">
                                            <x-adminlte-button theme="primary" label="Guardar" id="guardarBtn2"
                                                type="button" class="bg-primary text-white" />
                                            <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal"
                                                id="cancelar" type="button" />
                                        </x-slot>
                                    </form>
                                </div>
                            </div>
                        </x-adminlte-modal>
                    </div>
                    @php
                        $heads = [['no-export' => true, 'width' => 1], 'ID', 'CIPE', 'Nombre', 'Opciones'];
                        $btnEdit = '';
                        $btnDelete2 = '<button type="submit" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Delete">
                      <i class="fa fa-lg fa-fw fa-trash"></i>
                  </button>';
                        $config = [
                            'language' => [
                                'url' => 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                            ],
                        ];
                    @endphp
                    <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config">
                        @foreach ($puntosAltaRec as $PAR)
                            <tr>
                                <td></td>
                                <td>{{ $PAR->id }}</td>
                                <td>{{ $PAR->cipe }}</td>
                                <td>{{ $PAR->nombre }}</td>
                                <td>
                                    <a href="#" class="btn btn-xs btn-default text-primary mx-1 shadow editar2"
                                        title="Edit" data-PAR-id="{{ $PAR->id }}">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </a>
                                    <form style="display: inline" action="{{ route('gestion.destroy2', $PAR->id) }}"
                                        method="post" class="formEliminar2">
                                        @csrf
                                        @method('DELETE')
                                        {!! $btnDelete2 !!}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @foreach ($puntosAltaRec as $PAR)
                            <x-adminlte-modal id="editar2_{{ $PAR->id }}" title="EDITAR: Puntos" size="md"
                                theme="primary" icon="fa fa-bolt" v-centered static-backdrop scrollable>
                                <div style="height:400px;">
                                    <div class="modal-body">
                                        <form id="frmActualizar2_{{ $PAR->id }}"
                                            action="{{ route('gestion.update2', $PAR->id) }}" method="GET">
                                            @csrf

                                            <x-adminlte-input type="text" name="cipe" id="cipe" label="CIPE"
                                                label-class="text-primary" value="{{ $PAR->cipe }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="text" name="nombre" id="nombre" label="Nombre"
                                                label-class="text-primary" value="{{ $PAR->nombre }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-select name="id_entidad" id="id_entidad" label="Entidad" 
                                            label-class="text-primary" value="{{ $PAR->id_entidad }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                <option value="1">A.T.T.C</option>
                                                <option value="2">G.R.P.C</option>
                                                <option value="3">DIV.GOLF.C</option>
                                                <option value="4">Z.SJR</option>
                                                <option value="5">PEMEX</option>
                                                <option value="6">PORTEO</option>
                                            </x-adminlte-select>

                                            <x-adminlte-select name="tipo" id="tipo" label="Tipo" label-class="text-primary"
                                            value="{{ $PAR->tipo }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                <option value="1">Energía recibida</option>
                                                <option value="2">Energía entregada</option>
                                            </x-adminlte-select>

                                            <x-adminlte-select name="id_zona" id="id_zona" label="Zona" 
                                            label-class="text-primary" value="{{ $PAR->id_zona }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                <option value="1">Zona Tula</option>
                                                <option value="2">Zona Pachuca</option>
                                                <option value="3">Zona Valles</option>
                                                <option value="4">Zona San Juan del Río</option>
                                            </x-adminlte-select>

                                            <x-slot name="footerSlot">
                                                <x-adminlte-button theme="primary" label="Actualizar"
                                                    class="actualizarBtn2" data-PAR-id="{{ $PAR->id }}" />
                                                <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal"
                                                    id="cancelar" type="button" />
                                            </x-slot>
                                        </form>
                                    </div>
                                </div>
                            </x-adminlte-modal>
                        @endforeach
                    </x-adminlte-datatable>

                    <BR></BR>

                    <div class="row">
                        <div class="col-md-6">
                            <h5 style="color: rgb(7, 102, 24);">Energías entregadas: PUNTOS</h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <x-adminlte-button label="Nuevo registro" data-toggle="modal" data-target="#nuevo3"
                                class="bg-primary text-white" style="margin-right: 10px;" />
                        </div>
                        <x-adminlte-modal id="nuevo3" title="Nueva Zona" size="md" theme="primary"
                            icon="fa fa-circle" v-centered static-backdrop scrollable>
                            <div style="height:400px;">
                                <div class="modal-body">
                                <form id="frmRegistro3" action="{{ route('gestion.guardar3') }}" method="get">
                                        @csrf
                                        <input type="hidden" name="id" id="id">
                                        <x-adminlte-input type="text" name="cipe" id="cipe" label="CIPE"
                                            label-class="text-primary">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-circle text-primary"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>

                                        <x-adminlte-input type="text" name="nombre" id="nombre" label="Nombre"
                                            label-class="text-primary">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-circle text-primary"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>

                                        <x-adminlte-select name="id_entidad" id="id_entidad" label="Entidad" label-class="text-primary">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-circle text-primary"></i>
                                                </div>
                                            </x-slot>
                                            <option value="1">A.T.T.C</option>
                                            <option value="2">G.R.P.C</option>
                                            <option value="3">DIV.GOLF.C</option>
                                            <option value="4">Z.SJR</option>
                                            <option value="5">PEMEX</option>
                                            <option value="6">PORTEO</option>
                                        </x-adminlte-select>

                                        <x-adminlte-select name="tipo" id="tipo" label="Tipo" label-class="text-primary">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-circle text-primary"></i>
                                                </div>
                                            </x-slot>
                                            <option value="2">Energía entregada</option>
                                            <option value="1">Energía recibida</option>
                                        </x-adminlte-select>

                                        <x-adminlte-select name="id_zona" id="id_zona" label="Zona" label-class="text-primary">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-circle text-primary"></i>
                                                </div>
                                            </x-slot>
                                            <option value="1">Zona Tula</option>
                                            <option value="2">Zona Pachuca</option>
                                            <option value="3">Zona Valles</option>
                                            <option value="4">Zona San Juan del Río</option>
                                        </x-adminlte-select>

                                        <x-slot name="footerSlot">
                                            <x-adminlte-button theme="primary" label="Guardar" id="guardarBtn3"
                                                type="button" class="bg-primary text-white" />
                                            <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal"
                                                id="cancelar" type="button" />
                                        </x-slot>
                                    </form>
                                </div>
                            </div>
                        </x-adminlte-modal>
                    </div>
                    @php
                        $heads = [['no-export' => true, 'width' => 1], 'ID', 'CIPE', 'Nombre', 'Opciones'];
                        $btnEdit = '';
                        $btnDelete3 = '<button type="submit" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Delete">
                      <i class="fa fa-lg fa-fw fa-trash"></i>
                  </button>';
                        $config = [
                            'language' => [
                                'url' => 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                            ],
                        ];
                    @endphp
                    <x-adminlte-datatable id="table3" :heads="$heads" head-theme="dark" :config="$config">
                        @foreach ($puntosAltaEnt as $PAE)
                            <tr>
                                <td></td>
                                <td>{{ $PAE->id }}</td>
                                <td>{{ $PAE->cipe }}</td>
                                <td>{{ $PAE->nombre }}</td>
                                <td>
                                    <a href="#" class="btn btn-xs btn-default text-primary mx-1 shadow editar3"
                                        title="Edit" data-PAE-id="{{ $PAE->id }}">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </a>
                                    <form style="display: inline" action="{{ route('gestion.destroy3', $PAE->id) }}"
                                        method="post" class="formEliminar3">
                                        @csrf
                                        @method('DELETE')
                                        {!! $btnDelete3 !!}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @foreach ($puntosAltaEnt as $PAE)
                            <x-adminlte-modal id="editar3_{{ $PAE->id }}" title="EDITAR: Puntos" size="md"
                                theme="primary" icon="fa fa-bolt" v-centered static-backdrop scrollable>
                                <div style="height:400px;">
                                    <div class="modal-body">
                                        <form id="frmActualizar3_{{ $PAE->id }}"
                                            action="{{ route('gestion.update3', $PAE->id) }}" method="GET">
                                            @csrf

                                            <input type="hidden" name="id" id="id">
                                            <x-adminlte-input type="text" name="cipe" id="cipe" label="CIPE"
                                                label-class="text-primary" value="{{ $PAE->cipe }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="text" name="nombre" id="nombre" label="Nombre"
                                                label-class="text-primary" value="{{ $PAE->nombre }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-select name="id_entidad" id="id_entidad" label="Entidad" label-class="text-primary"
                                            value="{{ $PAE->id_entidad }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                <option value="1">A.T.T.C</option>
                                                <option value="2">G.R.P.C</option>
                                                <option value="3">DIV.GOLF.C</option>
                                                <option value="4">Z.SJR</option>
                                                <option value="5">PEMEX</option>
                                                <option value="6">PORTEO</option>
                                            </x-adminlte-select>

                                            <x-adminlte-select name="tipo" id="tipo" label="Tipo" label-class="text-primary"
                                            value="{{ $PAE->tipo }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                <option value="2">Energía entregada</option>
                                                <option value="1">Energía recibida</option>
                                            </x-adminlte-select>

                                            <x-adminlte-select name="id_zona" id="id_zona" label="Zona" label-class="text-primary"
                                            value="{{ $PAE->id_zona }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                <option value="1">Zona Tula</option>
                                                <option value="2">Zona Pachuca</option>
                                                <option value="3">Zona Valles</option>
                                                <option value="4">Zona San Juan del Río</option>
                                            </x-adminlte-select>

                                            <x-slot name="footerSlot">
                                                <x-adminlte-button theme="primary" label="Actualizar"
                                                    class="actualizarBtn3" data-pae-id="{{ $PAE->id }}" />
                                                <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal"
                                                    id="cancelar" type="button" />
                                            </x-slot>
                                        </form>
                                    </div>
                                </div>
                            </x-adminlte-modal>
                        @endforeach
                    </x-adminlte-datatable>

                    <BR></BR>

                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="mensual" role="tabpanel" aria-labelledby="mensual-tab">
            <div class="card shadow-lg">
                <div class="card-body">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 style="color: rgb(7, 102, 24);">Energías recibidas: ZONAS</h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <x-adminlte-button label="Nuevo registro" data-toggle="modal" data-target="#nuevo4"
                                class="bg-primary text-white" style="margin-right: 10px;" />
                        </div>
                        <x-adminlte-modal id="nuevo4" title="Nueva Zona" size="md" theme="primary"
                            icon="fa fa-circle" v-centered static-backdrop scrollable>
                            <div style="height:400px;">
                                <div class="modal-body">
                                <form id="frmRegistro4" action="{{ route('gestion.guardar4') }}" method="get">
                                        @csrf
                                        <input type="hidden" name="id" id="id">
                                        <x-adminlte-input type="text" name="nombre" id="nombre" label="Nombre"
                                            label-class="text-primary">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-circle text-primary"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>

                                        <x-slot name="footerSlot">
                                            <x-adminlte-button theme="primary" label="Guardar" id="guardarBtn4" type="button"
                                                class="bg-primary text-white" />
                                            <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" id="cancelar"
                                                type="button" />
                                        </x-slot>
                                </form>
                                </div>
                            </div>
                        </x-adminlte-modal>
                    </div>
                    @php
                        $heads = [['no-export' => true, 'width' => 1], 'ID', 'Nombre', 'Opciones'];
                        $btnEdit = '';
                        $btnDelete4 = '<button type="submit" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Delete">
                          <i class="fa fa-lg fa-fw fa-trash"></i>
                      </button>';
                        $config = [
                            'language' => [
                                'url' => 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                            ],
                        ];
                    @endphp
                    <x-adminlte-datatable id="table4" :heads="$heads" head-theme="dark" :config="$config">
                        @foreach ($zonasMediaRec as $ZMR)
                            <tr>
                                <td></td>
                                <td>{{ $ZMR->id }}</td>
                                <td>{{ $ZMR->nombre }}</td>
                                <td>
                                    <a href="#" class="btn btn-xs btn-default text-primary mx-1 shadow editar4"
                                        title="Edit" data-ZMR-id="{{ $ZMR->id }}">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </a>
                                    <form style="display: inline" action="{{ route('gestion.destroy4', $ZMR->id) }}"
                                        method="post" class="formEliminar4">
                                        @csrf
                                        @method('DELETE')
                                        {!! $btnDelete4 !!}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @foreach ($zonasMediaRec as $ZMR)
                            <x-adminlte-modal id="editar4_{{ $ZMR->id }}" title="EDITAR: Zonas" size="md"
                                theme="primary" icon="fa fa-bolt" v-centered static-backdrop scrollable>
                                <div style="height:400px;">
                                    <div class="modal-body">
                                        <form id="frmActualizar4_{{ $ZMR->id }}"
                                            action="{{ route('gestion.update4', $ZMR->id) }}" method="GET">
                                            @csrf
                                            <x-adminlte-input type="text" name="nombre" id="nombre"
                                                label="Nombre" label-class="text-primary" value="{{ $ZMR->nombre }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-slot name="footerSlot">
                                                <x-adminlte-button theme="primary" label="Actualizar"
                                                    class="actualizarBtn4" data-ZMR-id="{{ $ZMR->id }}" />
                                                <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal"
                                                    id="cancelar" type="button" />
                                            </x-slot>
                                        </form>
                                    </div>
                                </div>
                            </x-adminlte-modal>
                        @endforeach
                    </x-adminlte-datatable>

                    <BR></BR>

                    <div class="row">
                        <div class="col-md-6">
                            <h5 style="color: rgb(7, 102, 24);">Energías recibidas: SUBESTACIONES</h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <x-adminlte-button label="Nuevo registro" data-toggle="modal" data-target="#nuevo5"
                                class="bg-primary text-white" style="margin-right: 10px;" />
                        </div>
                        <x-adminlte-modal id="nuevo5" title="Nueva Subestación" size="md" theme="primary"
                            icon="fa fa-circle" v-centered static-backdrop scrollable>
                            <div style="height:400px;">
                                <div class="modal-body">
                                    <form id="frmRegistro5" action="{{ route('gestion.guardar5') }}" method="get">
                                        @csrf
                                        <input type="hidden" name="id" id="id">
                                        <x-adminlte-select name="id_cipe" id="id_cipe" label="ID CIPE" label-class="text-primary">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                @foreach($subestaciones as $sub)
                                                    <option value="{{ $sub->id_cipe }}">{{ $sub->cipe }}</option>
                                                @endforeach
                                        </x-adminlte-select>

                                        <x-adminlte-select name="id_sub" id="id_sub" label="ID SUB" label-class="text-primary">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                @foreach($subestaciones as $sub)
                                                    <option value="{{ $sub->id_sub }}">{{ $sub->subestacion }}</option>
                                                @endforeach
                                        </x-adminlte-select>

                                        <x-adminlte-select name="id_punto_i" id="id_punto_i" label="ID PUNTO_I" label-class="text-primary">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                @foreach($subestaciones as $sub)
                                                    <option value="{{ $sub->id_punto_i}}">{{ $sub->punto }}</option>
                                                @endforeach
                                        </x-adminlte-select>


                                        <x-adminlte-select name="id_medidor" id="id_medidor" label="ID MEDIDOR" label-class="text-primary">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                @foreach($subestaciones as $sub)
                                                    <option value="{{ $sub->id_medidor}}">{{ $sub->medidor }}</option>
                                                @endforeach
                                        </x-adminlte-select>

                                        <x-adminlte-select name="id_tc" id="id_tc" label="ID TC" label-class="text-primary">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                @foreach($subestaciones as $sub)
                                                    <option value="{{ $sub->id_rtc}}">{{ $sub->rtc }}</option>
                                                @endforeach
                                        </x-adminlte-select>

                                        <x-adminlte-select name="id_tp" id="id_tp" label="ID TP" label-class="text-primary">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                @foreach($subestaciones as $sub)
                                                    <option value="{{ $sub->id_rtp}}">{{ $sub->rtp }}</option>
                                                @endforeach
                                        </x-adminlte-select>

                                        <x-slot name="footerSlot">
                                            <x-adminlte-button theme="primary" label="Guardar" id="guardarBtn5" type="button"
                                                class="bg-primary text-white" />
                                            <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" id="cancelar"
                                                type="button" />
                                        </x-slot>
                                     </form>
                                </div>
                            </div>
                        </x-adminlte-modal>
                    </div>
                    @php
                        $heads = [
                            ['no-export' => true, 'width' => 1],
                            'CIPE',
                            'Subestación',
                            'Punto',
                            'Medidor',
                            'RTC',
                            'RTP',
                            'Opciones',
                        ];
                        $btnEdit = '';
                        $btnDelete5 = '<button type="submit" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Delete">
                          <i class="fa fa-lg fa-fw fa-trash"></i>
                      </button>';
                        $config = [
                            'language' => [
                                'url' => 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                            ],
                        ];
                    @endphp
                    <x-adminlte-datatable id="table5" :heads="$heads" head-theme="dark" :config="$config">
                        @foreach ($subestaciones as $sub)
                            <tr>
                                <td></td>
                                <td>{{ $sub->cipe }}</td>
                                <td>{{ $sub->subestacion }}</td>
                                <td>{{ $sub->punto }}</td>
                                <td>{{ $sub->medidor }}</td>
                                <td>{{ $sub->rtc }}</td>
                                <td>{{ $sub->rtp }}</td>
                                <td>
                                    <a href="#" class="btn btn-xs btn-default text-primary mx-1 shadow editar5"
                                        title="Edit" data-sub-ids="{{ $sub->ids }}">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </a>
                                    <form style="display: inline"
                                        action="{{ route('gestion.destroy5', $sub->ids) }}" method="post"
                                        class="formEliminar5">
                                        @csrf
                                        @method('DELETE')
                                        {!! $btnDelete5 !!}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @foreach ($subestaciones as $sub)
                            <x-adminlte-modal id="editar5_{{ $sub->ids }}" title="EDITAR: Subestaciones" size="md"
                                theme="primary" icon="fa fa-bolt" v-centered static-backdrop scrollable>
                                <div style="height:400px;">
                                    <div class="modal-body">
                                        <form id="frmActualizar5_{{ $sub->ids }}"
                                            action="{{ route('gestion.update5', $sub->ids) }}" method="GET">
                                            @csrf

                                            <x-adminlte-select name="id_cipe" id="id_cipe" label="ID CIPE" label-class="text-primary"
                                            value="{{ $sub->id_cipe }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                @foreach($subestaciones as $sub)
                                                    <option value="{{ $sub->id_cipe }}">{{ $sub->id_cipe }}</option>
                                                @endforeach
                                        </x-adminlte-select>

                                        <x-adminlte-select name="id_sub" id="id_sub" label="ID SUB" label-class="text-primary"
                                        value="{{ $sub->id_sub }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                @foreach($subestaciones as $sub)
                                                    <option value="{{ $sub->id_sub }}">{{ $sub->subestacion }}</option>
                                                @endforeach
                                        </x-adminlte-select>

                                        <x-adminlte-select name="id_punto_i" id="id_punto_i" label="ID PUNTO_I" label-class="text-primary"
                                        value="{{ $sub->id_punto_i }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                @foreach($subestaciones as $sub)
                                                    <option value="{{ $sub->id_punto_i}}">{{ $sub->punto }}</option>
                                                @endforeach
                                        </x-adminlte-select>


                                        <x-adminlte-select name="id_medidor" id="id_medidor" label="ID MEDIDOR" label-class="text-primary"
                                        value="{{ $sub->id_medidor }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                @foreach($subestaciones as $sub)
                                                    <option value="{{ $sub->id_medidor}}">{{ $sub->medidor }}</option>
                                                @endforeach
                                        </x-adminlte-select>

                                        <x-adminlte-select name="id_tc" id="id_tc" label="ID TC" label-class="text-primary"
                                        value="{{ $sub->id_tc }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                @foreach($subestaciones as $sub)
                                                    <option value="{{ $sub->id_rtc}}">{{ $sub->rtc }}</option>
                                                @endforeach
                                        </x-adminlte-select>

                                        <x-adminlte-select name="id_tp" id="id_tp" label="ID TP" label-class="text-primary"
                                        value="{{ $sub->id_tp }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                @foreach($subestaciones as $sub)
                                                    <option value="{{ $sub->id_rtp}}">{{ $sub->rtp }}</option>
                                                @endforeach
                                        </x-adminlte-select>

                                            <x-slot name="footerSlot">
                                                <x-adminlte-button theme="primary" label="Actualizar"
                                                    class="actualizarBtn5" data-sub-ids="{{ $sub->ids }}" />
                                                <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal"
                                                    id="cancelar" type="button" />
                                            </x-slot>
                                        </form>
                                    </div>
                                </div>
                            </x-adminlte-modal>
                        @endforeach
                    </x-adminlte-datatable>
                    
                    <BR></BR>

                    <div class="row">
                        <div class="col-md-6">
                            <h5 style="color: rgb(7, 102, 24);">Energías entregadas: ZONAS</h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <x-adminlte-button label="Nuevo registro" data-toggle="modal" data-target="#nuevo6"
                                class="bg-primary text-white" style="margin-right: 10px;" />
                        </div>
                        <x-adminlte-modal id="nuevo6" title="Nueva Zona" size="md" theme="primary"
                            icon="fa fa-circle" v-centered static-backdrop scrollable>
                            <div style="height:400px;">
                                <div class="modal-body">
                                <form id="frmRegistro6" action="{{ route('gestion.guardar6') }}" method="get">
                                        @csrf
                                        <input type="hidden" name="id" id="id">
                                        <x-adminlte-input type="text" name="nombre" id="nombre" label="Nombre"
                                            label-class="text-primary">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-circle text-primary"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>

                                        <x-slot name="footerSlot">
                                            <x-adminlte-button theme="primary" label="Guardar" id="guardarBtn6" type="button"
                                                class="bg-primary text-white" />
                                            <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" id="cancelar"
                                                type="button" />
                                        </x-slot>
                                </form>
                                </div>
                            </div>
                        </x-adminlte-modal>
                    </div>
                    @php
                        $heads = [['no-export' => true, 'width' => 1], 'ID', 'Nombre', 'Opciones'];
                        $btnEdit = '';
                        $btnDelete6 = '<button type="submit" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Delete">
                          <i class="fa fa-lg fa-fw fa-trash"></i>
                      </button>';
                        $config = [
                            'language' => [
                                'url' => 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                            ],
                        ];
                    @endphp
                    <x-adminlte-datatable id="table6" :heads="$heads" head-theme="dark" :config="$config">
                        @foreach ($zonasMediaEnt as $ZME)
                            <tr>
                                <td></td>
                                <td>{{ $ZME->id }}</td>
                                <td>{{ $ZME->nombre }}</td>
                                <td>
                                    <a href="#" class="btn btn-xs btn-default text-primary mx-1 shadow editar6"
                                        title="Edit" data-ZME-id="{{ $ZME->id }}">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </a>
                                    <form style="display: inline" action="{{ route('gestion.destroy6', $ZME->id) }}"
                                        method="post" class="formEliminar6">
                                        @csrf
                                        @method('DELETE')
                                        {!! $btnDelete6 !!}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @foreach ($zonasMediaEnt as $ZME)
                            <x-adminlte-modal id="editar6_{{ $ZME->id }}" title="EDITAR: Zonas" size="md"
                                theme="primary" icon="fa fa-bolt" v-centered static-backdrop scrollable>
                                <div style="height:400px;">
                                    <div class="modal-body">
                                        <form id="frmActualizar6_{{ $ZME->id }}"
                                            action="{{ route('gestion.update6', $ZME->id) }}" method="GET">
                                            @csrf

                                            <x-adminlte-input type="text" name="nombre" id="nombre"
                                                label="Nombre" label-class="text-primary" value="{{ $ZME->nombre }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-slot name="footerSlot">
                                                <x-adminlte-button theme="primary" label="Actualizar"
                                                    class="actualizarBtn6" data-ZME-id="{{ $ZME->id }}" />
                                                <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal"
                                                    id="cancelar" type="button" />
                                            </x-slot>
                                        </form>
                                    </div>
                                </div>
                            </x-adminlte-modal>
                        @endforeach
                    </x-adminlte-datatable>
                    <BR></BR>
                </div>
            </div>
        </div>
    </div>


@stop

@section('js')
    <script>
        document.getElementById('guardarBtn1').addEventListener('click', function() {
            document.getElementById('frmRegistro1').submit();
        });
    </script>

    <script>
        document.getElementById('guardarBtn2').addEventListener('click', function() {
            document.getElementById('frmRegistro2').submit();
        });
    </script>

    <script>
        document.getElementById('guardarBtn3').addEventListener('click', function() {
            document.getElementById('frmRegistro3').submit();
        });
    </script>

    <script>
        document.getElementById('guardarBtn4').addEventListener('click', function() {
            document.getElementById('frmRegistro4').submit();
        });
    </script>

    <script>
        document.getElementById('guardarBtn5').addEventListener('click', function() {
            document.getElementById('frmRegistro5').submit();
        });
    </script>

    <script>
        document.getElementById('guardarBtn6').addEventListener('click', function() {
            document.getElementById('frmRegistro6').submit();
        });
    </script>











    <script>
        document.getElementById('actualizarBtn1').addEventListener('click', function() {
            document.getElementById('frmActualizar1').submit();
        });
    </script>

    <script>
        document.getElementById('actualizarBtn2').addEventListener('click', function() {
            document.getElementById('frmActualizar2').submit();
        });
    </script>

    <script>
        document.getElementById('actualizarBtn3').addEventListener('click', function() {
            document.getElementById('frmActualizar3').submit();
        });
    </script>

    <script>
        document.getElementById('actualizarBtn4').addEventListener('click', function() {
            document.getElementById('frmActualizar4').submit();
        });
    </script>

    <script>
        document.getElementById('actualizarBtn5').addEventListener('click', function() {
            document.getElementById('frmActualizar5').submit();
        });
    </script>

    <script>
        document.getElementById('actualizarBtn6').addEventListener('click', function() {
            document.getElementById('frmActualizar6').submit();
        });
    </script>








    <script>
        $(document).ready(function() {

            $('.editar1').click(function(e) {
                e.preventDefault();
                var tarifaID = $(this).data('tarifa-id');
                $('#editar1_' + tarifaID).modal('show');
                console.log(tarifaID);
            });
            $('.actualizarBtn1').click(function(e) {
                e.preventDefault();
                var tarifaID = $(this).data('tarifa-id');
                $('#frmActualizar1_' + tarifaID).submit();
            });

        });
    </script>

    <script>
        $(document).ready(function() {

            $('.editar2').click(function(e) {
                e.preventDefault();
                var parID = $(this).data('par-id');
                $('#editar2_' + parID).modal('show');
                console.log(parID);
            });
            $('.actualizarBtn2').click(function(e) {
                e.preventDefault();
                var parID = $(this).data('par-id');
                $('#frmActualizar2_' + parID).submit();
            });

        });
    </script>

    <script>
        $(document).ready(function() {

            $('.editar3').click(function(e) {
                e.preventDefault();
                var paeID = $(this).data('pae-id');
                $('#editar3_' + paeID).modal('show');
                console.log(paeID);
            });
            $('.actualizarBtn3').click(function(e) {
                e.preventDefault();
                var paeID = $(this).data('pae-id');
                $('#frmActualizar3_' + paeID).submit();
            });

        });
    </script>

    <script>
        $(document).ready(function() {

            $('.editar4').click(function(e) {
                e.preventDefault();
                var zmrid = $(this).data('zmr-id');
                $('#editar4_' + zmrid).modal('show');
                console.log(zmrid);
            });
            $('.actualizarBtn4').click(function(e) {
                e.preventDefault();
                var zmrid = $(this).data('zmr-id');
                $('#frmActualizar4_' + zmrid).submit();
            });

        });
    </script>

    <script>
        $(document).ready(function() {

            $('.editar5').click(function(e) {
                e.preventDefault();
                var subID = $(this).data('sub-ids');
                $('#editar5_' + subID).modal('show');
                console.log(subID);
            });
            $('.actualizarBtn5').click(function(e) {
                e.preventDefault();
                var subID = $(this).data('sub-ids');
                $('#frmActualizar5_' + subID).submit();
            });

        });
    </script>

    <script>
        $(document).ready(function() {

            $('.editar6').click(function(e) {
                e.preventDefault();
                var zmeID = $(this).data('zme-id');
                $('#editar6_' + zmeID).modal('show');
                console.log(zmeID);
            });
            $('.actualizarBtn6').click(function(e) {
                e.preventDefault();
                var zmeID = $(this).data('zme-id');
                $('#frmActualizar6_' + zmeID).submit();
            });

        });
    </script>










    <script>
        $(document).ready(function() {
            $('.formEliminar1').submit(function(e) {
                e.preventDefault();
                var form = this;
                Swal.fire({
                    text: "¿Desea eliminar el registro?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#00532C",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Eliminar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            text: "Registro eliminado",
                            icon: "success",
                            confirmButtonColor: "#00532C",
                            showConfirmButton: true
                        }).then(() => {
                            form.submit();
                        });
                    }
                });
            });
        });
    </script>ç

    <script>
        $(document).ready(function() {
            $('.formEliminar2').submit(function(e) {
                e.preventDefault();
                var form = this;
                Swal.fire({
                    text: "¿Desea eliminar el registro?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#00532C",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Eliminar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            text: "Registro eliminado",
                            icon: "success",
                            confirmButtonColor: "#00532C",
                            showConfirmButton: true
                        }).then(() => {
                            form.submit();
                        });
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.formEliminar3').submit(function(e) {
                e.preventDefault();
                var form = this;
                Swal.fire({
                    text: "¿Desea eliminar el registro?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#00532C",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Eliminar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            text: "Registro eliminado",
                            icon: "success",
                            confirmButtonColor: "#00532C",
                            showConfirmButton: true
                        }).then(() => {
                            form.submit();
                        });
                    }
                });
            });
        });
    </script>

<script>
        $(document).ready(function() {
            $('.formEliminar4').submit(function(e) {
                e.preventDefault();
                var form = this;
                Swal.fire({
                    text: "¿Desea eliminar el registro?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#00532C",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Eliminar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            text: "Registro eliminado",
                            icon: "success",
                            confirmButtonColor: "#00532C",
                            showConfirmButton: true
                        }).then(() => {
                            form.submit();
                        });
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.formEliminar5').submit(function(e) {
                e.preventDefault();
                var form = this;
                Swal.fire({
                    text: "¿Desea eliminar el registro?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#00532C",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Eliminar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            text: "Registro eliminado",
                            icon: "success",
                            confirmButtonColor: "#00532C",
                            showConfirmButton: true
                        }).then(() => {
                            form.submit();
                        });
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.formEliminar6').submit(function(e) {
                e.preventDefault();
                var form = this;
                Swal.fire({
                    text: "¿Desea eliminar el registro?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#00532C",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Eliminar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            text: "Registro eliminado",
                            icon: "success",
                            confirmButtonColor: "#00532C",
                            showConfirmButton: true
                        }).then(() => {
                            form.submit();
                        });
                    }
                });
            });
        });
    </script>
@stop

@section('css')
    <style>
        .custom-btn:hover {
            background-color: #046e45;
            border-color: #095e3b;
        }
    </style>
@stop
