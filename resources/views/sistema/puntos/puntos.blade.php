@extends('adminlte::page')

@section('title', 'SIBAE')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h6>SIBAE: Sistema de Gestión de Balance de Energía</h6>
            <h1>Puntos de intercambio</h1>
        </div>
        <div class="col-md-6" style="text-align: right;">
            @if ($usuarioActivo->privilegios == 1)
            <x-adminlte-button label="Nuevo punto" data-toggle="modal" data-target="#nuevo1" class="bg-primary text-white"
                style="margin-right: 10px;" />
                @endif
        </div>
    </div>
@stop


@section('content')

    @if (session()->has('message') && session('message') == 'ok')
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

    <div class="row">
        <x-adminlte-modal id="nuevo1" title="Nuevo punto" size="md" theme="primary" icon="fa fa-circle" v-centered
            static-backdrop scrollable>
            <div style="height:400px;">
                <div class="modal-body">
                    <form id="frmRegistro1" action="{{ route('puntos.guardar1') }}" method="get">
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
                            <x-adminlte-button theme="primary" label="Guardar" id="guardarBtn1" type="button"
                                class="bg-primary text-white" />
                            <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" id="cancelar"
                                type="button" />
                        </x-slot>
                    </form>
                </div>
            </div>
        </x-adminlte-modal>
    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">Zona Tula</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                aria-selected="false">Zona Pachuca</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="mensual-tab" data-toggle="tab" href="#mensual" role="tab" aria-controls="mensual"
                aria-selected="false">Zona Valles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                aria-controls="contact" aria-selected="false">Zona San Juan del Río</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card shadow-lg">
                <div class="card-body">
                    @php
                    if ($usuarioActivo->privilegios == 1) {
                            $heads = [
                                'ID',
                                'CIPE',
                                'Nombre',
                                ['label' => 'Opciones', 'no-export' => true, 'width' => 15],
                            ];
                        } else {
                            $heads = ['ID',
                                'CIPE',
                                'Nombre',
                                ['no-export' => true, 'width' => 15],];
                        }
                        $btnEdit = '';
                        $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Delete">
                              <i class="fa fa-lg fa-fw fa-trash"></i>
                          </button>';
                        $config = [
                            'language' => [
                                'url' => 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                            ],
                        ];
                    @endphp

                    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config">
                        @foreach ($puntos1 as $puntos)
                            <tr>
                                <td>{{ $puntos->id }}</td>
                                <td>{{ $puntos->cipe }}</td>
                                <td>{{ $puntos->nombre }}</td>
                                @if ($usuarioActivo->privilegios == 1)
                                <td>
                                    <a href="#" class="btn btn-xs btn-default text-primary mx-1 shadow editar1"
                                        title="Edit" data-toggle="modal" data-target="#editar_{{ $puntos->id }}"
                                        data-puntos-id="{{ $puntos->id }}">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </a>
                                    <form style="display: inline" action="{{ route('puntos.destroy1', $puntos->id) }}"
                                        method="post" class="formEliminar1">
                                        @csrf
                                        @method('DELETE')
                                        {!! $btnDelete !!}
                                    </form>
                                </td>
                                @endif
                                @if ($usuarioActivo->privilegios == 2)
                                    <td></td>
                                @endif
                            </tr>
                        @endforeach
                        @foreach ($puntos1 as $puntos)
                            <x-adminlte-modal id="editar1_{{ $puntos->id }}" title="Editar Puntos" size="md"
                                theme="primary" icon="fa fa-bolt" v-centered static-backdrop scrollable>
                                <div style="height:400px;">
                                    <div class="modal-body">
                                        <form id="frmActualizar1_{{ $puntos->id }}"
                                            action="{{ route('puntos.update1', $puntos->id) }}" method="GET">
                                            @csrf

                                            <input type="hidden" name="id" id="id">
                                            <x-adminlte-input type="text" name="cipe" id="cipe"
                                                label="CIPE" label-class="text-primary" value="{{ $puntos->cipe }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="text" name="nombre" id="nombre"
                                                label="Nombre" label-class="text-primary" value="{{ $puntos->nombre }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-select name="id_entidad" id="id_entidad" label="Entidad"
                                                label-class="text-primary" value="{{ $puntos->id_entidad }}">
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

                                            <x-adminlte-select name="id_zona" id="id_zona" label="Zona"
                                                label-class="text-primary" value="{{ $puntos->id_zona }}">
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
                                                    class="actualizarBtn1" data-puntos-id="{{ $puntos->id }}" />
                                                <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal"
                                                    id="cancelar" type="button" />
                                            </x-slot>
                                        </form>
                                    </div>
                                </div>
                            </x-adminlte-modal>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>


        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card shadow-lg">
                <div class="card-body">
                    <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config">
                        @foreach ($puntos2 as $puntos)
                            <tr>
                                <td>{{ $puntos->id }}</td>
                                <td>{{ $puntos->cipe }}</td>
                                <td>{{ $puntos->nombre }}</td>
                                @if ($usuarioActivo->privilegios == 1)
                                <td>
                                    <a href="#" class="btn btn-xs btn-default text-primary mx-1 shadow editar2"
                                        title="Edit" data-toggle="modal" data-target="#editar_{{ $puntos->id }}"
                                        data-puntos-id="{{ $puntos->id }}">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </a>
                                    <form style="display: inline" action="{{ route('puntos.destroy1', $puntos->id) }}"
                                        method="post" class="formEliminar1">
                                        @csrf
                                        @method('DELETE')
                                        {!! $btnDelete !!}
                                    </form>
                                </td>
                                @endif
                                @if ($usuarioActivo->privilegios == 2)
                                    <td></td>
                                @endif
                            </tr>
                        @endforeach
                        @foreach ($puntos2 as $puntos)
                            <x-adminlte-modal id="editar2_{{ $puntos->id }}" title="Editar Puntos" size="md"
                                theme="primary" icon="fa fa-bolt" v-centered static-backdrop scrollable>
                                <div style="height:400px;">
                                    <div class="modal-body">
                                        <form id="frmActualizar2_{{ $puntos->id }}"
                                            action="{{ route('puntos.update2', $puntos->id) }}" method="GET">
                                            @csrf

                                            <input type="hidden" name="id" id="id">
                                            <x-adminlte-input type="text" name="cipe" id="cipe"
                                                label="CIPE" label-class="text-primary" value="{{ $puntos->cipe }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="text" name="nombre" id="nombre"
                                                label="Nombre" label-class="text-primary" value="{{ $puntos->nombre }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-select name="id_entidad" id="id_entidad" label="Entidad"
                                                label-class="text-primary" value="{{ $puntos->id_entidad }}">
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

                                            <x-adminlte-select name="id_zona" id="id_zona" label="Zona"
                                                label-class="text-primary" value="{{ $puntos->id_zona }}">
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
                                                    class="actualizarBtn2" data-puntos-id="{{ $puntos->id }}" />
                                                <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal"
                                                    id="cancelar" type="button" />
                                            </x-slot>
                                        </form>
                                    </div>
                                </div>
                            </x-adminlte-modal>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>


        <div class="tab-pane fade" id="mensual" role="tabpanel" aria-labelledby="mensual-tab">
            <div class="card shadow-lg">
                <div class="card-body">
                    <x-adminlte-datatable id="table3" :heads="$heads" head-theme="dark" :config="$config">
                        @foreach ($puntos3 as $puntos)
                            <tr>
                                <td>{{ $puntos->id }}</td>
                                <td>{{ $puntos->cipe }}</td>
                                <td>{{ $puntos->nombre }}</td>
                                @if ($usuarioActivo->privilegios == 1)
                                <td>
                                    <a href="#" class="btn btn-xs btn-default text-primary mx-1 shadow editar3"
                                        title="Edit" data-toggle="modal" data-target="#editar_{{ $puntos->id }}"
                                        data-puntos-id="{{ $puntos->id }}">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </a>
                                    <form style="display: inline" action="{{ route('puntos.destroy1', $puntos->id) }}"
                                        method="post" class="formEliminar1">
                                        @csrf
                                        @method('DELETE')
                                        {!! $btnDelete !!}
                                    </form>
                                </td>
                                @endif
                                @if ($usuarioActivo->privilegios == 2)
                                    <td></td>
                                @endif
                            </tr>
                        @endforeach
                        @foreach ($puntos3 as $puntos)
                            <x-adminlte-modal id="editar3_{{ $puntos->id }}" title="Editar Puntos" size="md"
                                theme="primary" icon="fa fa-bolt" v-centered static-backdrop scrollable>
                                <div style="height:400px;">
                                    <div class="modal-body">
                                        <form id="frmActualizar3_{{ $puntos->id }}"
                                            action="{{ route('puntos.update3', $puntos->id) }}" method="GET">
                                            @csrf

                                            <input type="hidden" name="id" id="id">
                                            <x-adminlte-input type="text" name="cipe" id="cipe"
                                                label="CIPE" label-class="text-primary" value="{{ $puntos->cipe }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="text" name="nombre" id="nombre"
                                                label="Nombre" label-class="text-primary" value="{{ $puntos->nombre }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-select name="id_entidad" id="id_entidad" label="Entidad"
                                                label-class="text-primary" value="{{ $puntos->id_entidad }}">
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

                                            <x-adminlte-select name="id_zona" id="id_zona" label="Zona"
                                                label-class="text-primary" value="{{ $puntos->id_zona }}">
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
                                                    class="actualizarBtn3" data-puntos-id="{{ $puntos->id }}" />
                                                <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal"
                                                    id="cancelar" type="button" />
                                            </x-slot>
                                        </form>
                                    </div>
                                </div>
                            </x-adminlte-modal>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>


        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="card shadow-lg">
                <div class="card-body">
                    <x-adminlte-datatable id="table4" :heads="$heads" head-theme="dark" :config="$config">
                        @foreach ($puntos4 as $puntos)
                            <tr>
                                <td>{{ $puntos->id }}</td>
                                <td>{{ $puntos->cipe }}</td>
                                <td>{{ $puntos->nombre }}</td>
                                @if ($usuarioActivo->privilegios == 1)
                                <td>
                                    <a href="#" class="btn btn-xs btn-default text-primary mx-1 shadow editar4"
                                        title="Edit" data-toggle="modal" data-target="#editar_{{ $puntos->id }}"
                                        data-puntos-id="{{ $puntos->id }}">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </a>
                                    <form style="display: inline" action="{{ route('puntos.destroy1', $puntos->id) }}"
                                        method="post" class="formEliminar1">
                                        @csrf
                                        @method('DELETE')
                                        {!! $btnDelete !!}
                                    </form>
                                </td>
                                @endif
                                @if ($usuarioActivo->privilegios == 2)
                                    <td></td>
                                @endif
                            </tr>
                        @endforeach
                        @foreach ($puntos4 as $puntos)
                            <x-adminlte-modal id="editar4_{{ $puntos->id }}" title="Editar Puntos" size="md"
                                theme="primary" icon="fa fa-bolt" v-centered static-backdrop scrollable>
                                <div style="height:400px;">
                                    <div class="modal-body">
                                        <form id="frmActualizar4_{{ $puntos->id }}"
                                            action="{{ route('puntos.update4', $puntos->id) }}" method="GET">
                                            @csrf

                                            <input type="hidden" name="id" id="id">
                                            <x-adminlte-input type="text" name="cipe" id="cipe"
                                                label="CIPE" label-class="text-primary" value="{{ $puntos->cipe }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="text" name="nombre" id="nombre"
                                                label="Nombre" label-class="text-primary" value="{{ $puntos->nombre }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-select name="id_entidad" id="id_entidad" label="Entidad"
                                                label-class="text-primary" value="{{ $puntos->id_entidad }}">
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

                                            <x-adminlte-select name="id_zona" id="id_zona" label="Zona"
                                                label-class="text-primary" value="{{ $puntos->id_zona }}">
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
                                                    class="actualizarBtn4" data-puntos-id="{{ $puntos->id }}" />
                                                <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal"
                                                    id="cancelar" type="button" />
                                            </x-slot>
                                        </form>
                                    </div>
                                </div>
                            </x-adminlte-modal>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>
    </div>
@stop




@section('css')
    <style>
        .modal-header .close {
            color: white;
            font-size: 34px;
        }
    </style>
@stop

@section('js')

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
        $(document).ready(function() {

            $('.editar1').click(function(e) {
                e.preventDefault();
                var puntosId = $(this).data('puntos-id');
                $('#editar1_' + puntosId).modal('show');
                console.log(tarifaID);
            });
            $('.actualizarBtn1').click(function(e) {
                e.preventDefault();
                var puntosId = $(this).data('puntos-id');
                $('#frmActualizar1_' + puntosId).submit();
            });

        });
    </script>

    <script>
        $(document).ready(function() {

            $('.editar2').click(function(e) {
                e.preventDefault();
                var puntosId = $(this).data('puntos-id');
                $('#editar2_' + puntosId).modal('show');
                console.log(tarifaID);
            });
            $('.actualizarBtn2').click(function(e) {
                e.preventDefault();
                var puntosId = $(this).data('puntos-id');
                $('#frmActualizar2_' + puntosId).submit();
            });

        });
    </script>

    <script>
        $(document).ready(function() {

            $('.editar3').click(function(e) {
                e.preventDefault();
                var puntosId = $(this).data('puntos-id');
                $('#editar3_' + puntosId).modal('show');
                console.log(tarifaID);
            });
            $('.actualizarBtn3').click(function(e) {
                e.preventDefault();
                var puntosId = $(this).data('puntos-id');
                $('#frmActualizar3_' + puntosId).submit();
            });

        });
    </script>

    <script>
        $(document).ready(function() {

            $('.editar4').click(function(e) {
                e.preventDefault();
                var puntosId = $(this).data('puntos-id');
                $('#editar4_' + puntosId).modal('show');
                console.log(tarifaID);
            });
            $('.actualizarBtn4').click(function(e) {
                e.preventDefault();
                var puntosId = $(this).data('puntos-id');
                $('#frmActualizar4_' + puntosId).submit();
            });

        });
    </script>





    <script>
        document.getElementById('guardarBtn1').addEventListener('click', function() {
            document.getElementById('frmRegistro1').submit();
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
    </script>
@stop
