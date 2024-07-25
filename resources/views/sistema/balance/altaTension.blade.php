@extends('adminlte::page')

@section('title', 'SIBAE')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h6>SIBAE: Sistema de Gestión de Balance de Energía</h6>
            <h1>Alta tensión</h1>
        </div>
    </div>
@stop

@section('content')
    @php
        if (session()->has('message') && session('message') == 'ok') {
            echo '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "Registro exitoso",
                icon: "success",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    ';
        }

        if ($errors->any()) {
            echo '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "'.$errors->first().'",
                icon: "warning",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    ';
        }

        if (session()->has('message1') && session('message1') == 'ok1') {
            echo '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "Registro exitoso",
                icon: "success",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    ';
        }

        if ($errors->any()) {
            echo '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "'.$errors->first().'",
                icon: "warning",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    ';
        }

        if (session()->has('message') && session('message') == 'update') {
            echo '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "Registro actualizado",
                icon: "success",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    ';
        }
        if (session()->has('message') && session('message') == 'error') {
            echo '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "Campos incompletos",
                icon: "error",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    ';
        }

        if (session()->has('message1') && session('message1') == 'update1') {
            echo '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "Registro actualizado",
                icon: "success",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    ';
        }
        if (session()->has('message1') && session('message1') == 'error1') {
            echo '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "Campos incompletos",
                icon: "error",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    ';
        }

        if (session()->has('message2') && session('message2') == 'update2') {
            echo '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "Registro actualizado",
                icon: "success",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    ';
        }
        if (session()->has('message2') && session('message2') == 'error2') {
            echo '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                text: "Campos incompletos",
                icon: "error",
                confirmButtonColor: "#00532C",
                showConfirmButton: true
            });
        </script>
    ';
        }
    @endphp
    <br>
    <form id="yearForm" method="GET" action="{{ route('balance_alta.create') }}">
        <div class="styled-select">
            <select id="selectYear" name="year">
                <option>Seleccionar año</option>
                @foreach ($years as $year1)
                    <option value="{{ $year1->id }}">20{{ $year1->id }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Consultar</button>
    </form>
    @php
        echo "<h1>Balance energético anual de alta tensión: 20$year</h1>";
    @endphp
    <br>


    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="panel1-tab" data-toggle="tab" href="#panel1" role="tab"
                aria-controls="panel1" aria-selected="true">Energías recibidas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="panel2-tab" data-toggle="tab" href="#panel2" role="tab" aria-controls="panel2"
                aria-selected="false">Energías entregadas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="panel6-tab" data-toggle="tab" href="#panel6" role="tab" aria-controls="panel6"
                aria-selected="false">Pérdidas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="panel3-tab" data-toggle="tab" href="#panel3" role="tab" aria-controls="panel3"
                aria-selected="false">Balance</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="panel4-tab" data-toggle="tab" href="#panel4" role="tab" aria-controls="panel4"
                aria-selected="false">Datos mensuales</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="panel5-tab" data-toggle="tab" href="#panel5" role="tab" aria-controls="panel5"
                aria-selected="false">Datos anuales</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="panel1" role="tabpanel" aria-labelledby="panel1-tab">
            <div class="card shadow-lg">
                <div class="card-body">
                    @if ($usuarioActivo->privilegios == 1)
                        <div class="col-md-13" style="text-align: right;">
                            <x-adminlte-button label="Nuevo registro" data-toggle="modal" data-target="#nuevo"
                                class="bg-primary text-white" />
                        </div>
                    @endif
                    <x-adminlte-modal id="nuevo" title="ALTA TENSIÓN: Energías recibidas" size="md" theme="primary"
                        icon="fa fa-bolt" v-centered static-backdrop scrollable>
                        <div style="height:285px;">
                            <div class="modal-body">
                                <form id="frmRegistro" action="{{ route('balance_alta.guardar1') }}" method="get">
                                    @csrf

                                    <input type="hidden" name="id" id="id">
                                    <input type="hidden" name="year" id="year" value="{{ $year }}">

                                    <x-adminlte-select-bs id="punto" name="Punto" label="Punto"
                                        label-class="text-primary">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-circle text-primary"></i>
                                            </div>
                                        </x-slot>
                                        <option value="">Seleccione el punto</option>
                                        @foreach ($puntosER as $PER)
                                            <option value="{{ $PER->id }}">{{ $PER->cipe }} {{ $PER->nombre }}
                                            </option>
                                        @endforeach
                                    </x-adminlte-select-bs>


                                    <x-adminlte-select-bs id="mes" name="Mes" label="Mes"
                                        label-class="text-primary">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-circle text-primary"></i>
                                            </div>
                                        </x-slot>
                                        <option value="">Seleccione el mes</option>
                                        <option value="1">Enero</option>
                                        <option value="2">Febrero</option>
                                        <option value="3">Marzo</option>
                                        <option value="4">Abril</option>
                                        <option value="5">Mayo</option>
                                        <option value="6">Junio</option>
                                        <option value="7">Julio</option>
                                        <option value="8">Agosto</option>
                                        <option value="9">Septiembre</option>
                                        <option value="10">Octubre</option>
                                        <option value="11">Noviembre</option>
                                        <option value="12">Diciembre</option>
                                    </x-adminlte-select-bs>

                                    <x-adminlte-input type="number" name="Energía_recibida" id="energia1"
                                        label="Energía recibida (KWh)" label-class="text-primary" step="any">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-circle text-primary"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>

                                    <x-slot name="footerSlot">
                                        <x-adminlte-button theme="primary" label="Guardar" id="guardarBtn"
                                            type="button" class="bg-primary text-white" />
                                        <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal"
                                            id="cancelar" type="button" />
                                    </x-slot>
                                </form>
                            </div>
                        </div>
                    </x-adminlte-modal>
                    @php

                        if ($usuarioActivo->privilegios == 1) {
                            $heads = [
                                'CIPE',
                                'Punto',
                                'Fecha',
                                'Energía mensual recibida',
                                ['label' => 'Opciones', 'no-export' => true, 'width' => 15],
                            ];
                        } else {
                            $heads = [
                                'CIPE',
                                'Punto',
                                'Fecha',
                                'Energía mensual recibida',
                                ['no-export' => true, 'width' => 1],
                            ];
                        }
                        $btnEdit = '';
                        $btnDelete =
                            '<button type="submit" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Delete"><i class="fa fa-lg fa-fw fa-trash"></i></button>';
                        $config = [
                            'language' => [
                                'url' => 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                            ],
                            'lengthMenu' => [[12, 25, 50, -1], [12, 25, 50, 'All']],
                            'pageLength' => 12,
                            'dom' => 'Bfrtip',
                            'buttons' => [
                                [
                                    'extend' => 'copy',
                                    'title' => 'Reporte de Energías Recibidas: ALTA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:last-child)'],
                                ],
                                [
                                    'extend' => 'csv',
                                    'title' => 'Reporte de Energías Recibidas: ALTA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:last-child)'],
                                ],
                                [
                                    'extend' => 'excel',
                                    'title' => 'Reporte de Energías Recibidas: ALTA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:last-child)'],
                                ],
                                [
                                    'extend' => 'pdf',
                                    'title' => 'Reporte de Energías Recibidas: ALTA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:last-child)'],
                                ],
                                [
                                    'extend' => 'print',
                                    'title' => 'Reporte de Energías Recibidas: ALTA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:last-child)'],
                                ],
                            ],
                        ];
                    @endphp
                    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config">
                        @foreach ($fechas_EnergiaRecibida as $er)
                            <tr>
                                <td>{{ $er->cipe }}</td>
                                <td>{{ $er->nombre }}</td>
                                <td>{{ $er->fecha }}</td>
                                <td>{{ number_format($er->energia, 8, '.', ',') }} KWh</td>
                                @if ($usuarioActivo->privilegios == 1)
                                    <td>
                                        <div style="display: flex; align-items: center;">
                                            <a href="#"
                                                class="btn btn-xs btn-default text-primary mx-1 shadow editar"
                                                title="Edit" data-toggle="modal"
                                                data-target="#editar_{{ $er->idr }}"
                                                data-er-id="{{ $er->idr }}">
                                                <i class="fa fa-lg fa-fw fa-pen"></i>
                                            </a>
                                            <form style="display: inline"
                                                action="{{ route('balance_alta.destroy1', $er->idr) }}" method="POST"
                                                class="formEliminar">
                                                @csrf
                                                @method('DELETE')
                                                {!! $btnDelete !!}
                                            </form>
                                        </div>
                                    </td>
                                @endif
                                @if ($usuarioActivo->privilegios == 2)
                                    <td></td>
                                @endif
                            </tr>
                        @endforeach
                        @foreach ($fechas_EnergiaRecibida as $er)
                            <x-adminlte-modal id="editar_{{ $er->idr }}" title="EDITAR: Energía recibida"
                                size="md" theme="primary" icon="fa fa-bolt" v-centered static-backdrop scrollable>
                                <div style="height:400px;">
                                    <div class="modal-body">
                                        <form id="frmActualizar_{{ $er->idr }}"
                                            action="{{ route('balance_alta.update1', $er->idr) }}" method="GET">
                                            @csrf
                                            <x-adminlte-input type="text" name="Cipe" id="cipe"
                                                label="CIPE" label-class="text-primary" value="{{ $er->cipe }}"
                                                readonly>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="text" name="Punto" id="punto"
                                                label="Punto" label-class="text-primary" value="{{ $er->nombre }}"
                                                readonly>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="text" name="Mes" id="mes"
                                                label="Mes" label-class="text-primary" value="{{ $er->fecha }}"
                                                readonly>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="number" name="Energía_recibida" id="energia_r"
                                                label="Energía recibida (KWh)" label-class="text-primary"
                                                value="{{ $er->energia }}" step="any">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                            <x-slot name="footerSlot">
                                                <x-adminlte-button theme="primary" label="Actualizar"
                                                    class="actualizarBtn" data-er-id="{{ $er->idr }}" />
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
        <div class="tab-pane fade" id="panel2" role="tabpanel" aria-labelledby="panel2-tab">
            <div class="card shadow-lg">
                <div class="card-body">
                    @if ($usuarioActivo->privilegios == 1)
                        <div class="col-md-13" style="text-align: right;">
                            <x-adminlte-button label="Nuevo registro" data-toggle="modal" data-target="#nuevo2"
                                class="bg-primary text-white" />
                        </div>
                    @endif
                    <x-adminlte-modal id="nuevo2" title="ALTA TENSIÓN: Energías entregadas" size="md"
                        theme="primary" icon="fa fa-bolt" v-centered static-backdrop scrollable>
                        <div style="height:285px;">
                            <div class="modal-body">
                                <form id="frmRegistro2" action="{{ route('balance_alta.guardar2') }}" method="get">
                                    @csrf

                                    <input type="hidden" name="id" id="id">
                                    <input type="hidden" name="year" id="year" value="{{ $year }}">

                                    <x-adminlte-select-bs id="punto" name="Punto" label="Punto"
                                        label-class="text-primary">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-circle text-primary"></i>
                                            </div>
                                        </x-slot>
                                        <option value="">Seleccione el punto</option>
                                        @foreach ($puntosEE as $PEE)
                                            <option value="{{ $PEE->id }}">{{ $PEE->cipe }} {{ $PEE->nombre }}
                                            </option>
                                        @endforeach
                                    </x-adminlte-select-bs>


                                    <x-adminlte-select-bs id="mes" name="Mes" label="Mes"
                                        label-class="text-primary">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-circle text-primary"></i>
                                            </div>
                                        </x-slot>
                                        <option value="">Seleccione el mes</option>
                                        <option value="1">Enero</option>
                                        <option value="2">Febrero</option>
                                        <option value="3">Marzo</option>
                                        <option value="4">Abril</option>
                                        <option value="5">Mayo</option>
                                        <option value="6">Junio</option>
                                        <option value="7">Julio</option>
                                        <option value="8">Agosto</option>
                                        <option value="9">Septiembre</option>
                                        <option value="10">Octubre</option>
                                        <option value="11">Noviembre</option>
                                        <option value="12">Diciembre</option>
                                    </x-adminlte-select-bs>

                                    <x-adminlte-input type="number" name="Energía_entregada" id="energia2"
                                        label="Energía entregada (KWh)" label-class="text-primary" step="any">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-circle text-primary"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>

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
                    @php
                        if ($usuarioActivo->privilegios == 1) {
                            $heads = [
                                'CIPE',
                                'Punto',
                                'Fecha',
                                'Energía mensual entregada',
                                ['label' => 'Opciones', 'no-export' => true, 'width' => 15],
                            ];
                        } else {
                            $heads = [
                                'CIPE',
                                'Punto',
                                'Fecha',
                                'Energía mensual entregada',
                                ['no-export' => true, 'width' => 1],
                            ];
                        }
                        $btnEdit = '';
                        $btnDelete1 = '<button type="submit" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Delete">
                              <i class="fa fa-lg fa-fw fa-trash"></i>
                          </button>';
                        $config = [
                            'language' => [
                                'url' => 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                            ],
                            'lengthMenu' => [[12, 25, 50, -1], [12, 25, 50, 'All']],
                            'pageLength' => 12,
                            'dom' => 'Bfrtip',
                            'buttons' => [
                                [
                                    'extend' => 'copy',
                                    'title' => 'Reporte de Energías Entregadas: ALTA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:last-child)'],
                                ],
                                [
                                    'extend' => 'csv',
                                    'title' => 'Reporte de Energías Entregadas: ALTA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:last-child)'],
                                ],
                                [
                                    'extend' => 'excel',
                                    'title' => 'Reporte de Energías Entregadas: ALTA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:last-child)'],
                                ],
                                [
                                    'extend' => 'pdf',
                                    'title' => 'Reporte de Energías Entregadas: ALTA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:last-child)'],
                                ],
                                [
                                    'extend' => 'print',
                                    'title' => 'Reporte de Energías Entregadas: ALTA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:last-child)'],
                                ],
                            ],
                        ];
                    @endphp
                    <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config">
                        @foreach ($fechas_EnergiaEntregada as $ee)
                            <tr>
                                <td>{{ $ee->cipe }}</td>
                                <td>{{ $ee->nombre }}</td>
                                <td>{{ $ee->fecha }}</td>
                                <td>{{ number_format($ee->energia, 8, '.', ',') }} KWh</td>
                                @if ($usuarioActivo->privilegios == 1)
                                    <td>
                                        <div style="display: flex; align-items: center;">
                                            <a href="#"
                                                class="btn btn-xs btn-default text-primary mx-1 shadow editar1"
                                                title="Edit" data-toggle="modal"
                                                data-target="#editar1_{{ $ee->ide }}"
                                                data-ee-id="{{ $ee->ide }}">
                                                <i class="fa fa-lg fa-fw fa-pen"></i>
                                            </a>
                                            <form style="display: inline"
                                                action="{{ route('balance_alta.destroy2', $ee->ide) }}" method="POST"
                                                class="formEliminar1">
                                                @csrf
                                                @method('DELETE')
                                                {!! $btnDelete1 !!}
                                            </form>
                                        </div>
                                    </td>
                                @endif
                                @if ($usuarioActivo->privilegios == 2)
                                    <td></td>
                                @endif
                            </tr>
                        @endforeach
                        @foreach ($fechas_EnergiaEntregada as $ee)
                            <x-adminlte-modal id="editar1_{{ $ee->ide }}" title="EDITAR: Energía entregada"
                                size="md" theme="primary" icon="fa fa-bolt" v-centered static-backdrop scrollable>
                                <div style="height:400px;">
                                    <div class="modal-body">
                                        <form id="frmActualizar1_{{ $ee->ide }}"
                                            action="{{ route('balance_alta.update2', $ee->ide) }}" method="GET">
                                            @csrf
                                            <x-adminlte-input type="text" name="Cipe" id="cipe"
                                                label="CIPE" label-class="text-primary" value="{{ $ee->cipe }}"
                                                readonly>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="text" name="Punto" id="punto"
                                                label="Punto" label-class="text-primary" value="{{ $ee->nombre }}"
                                                readonly>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="text" name="Mes" id="mes"
                                                label="Mes" label-class="text-primary" value="{{ $ee->fecha }}"
                                                readonly>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="number" name="Energía_entregada" id="energia_e"
                                                label="Energía entregada (KWh)" label-class="text-primary"
                                                value="{{ $ee->energia }}" step="any">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-slot name="footerSlot">
                                                <x-adminlte-button theme="primary" label="Actualizar"
                                                    class="actualizarBtn1" data-ee-id="{{ $ee->ide }}" />
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
        <div class="tab-pane fade" id="panel6" role="tabpanel" aria-labelledby="panel6-tab">
            <div class="card shadow-lg">
                <div class="card-body">
                    @php
                        $heads = [
                            ['no-export' => true, 'width' => 1],
                            'Fecha',
                            'Energía mensual perdida',
                            'Energía porcentual perdida',
                        ];
                        $btnEdit = '';
                        $config = [
                            'language' => [
                                'url' => 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                            ],
                            'lengthMenu' => [[12, 25, 50, -1], [12, 25, 50, 'All']],
                            'pageLength' => 12,
                            'dom' => 'Bfrtip',
                            'buttons' => [
                                [
                                    'extend' => 'copy',
                                    'title' => 'Reporte de Energía Perdida: ALTA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'csv',
                                    'title' => 'Reporte de Energía Perdida: ALTA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'excel',
                                    'title' => 'Reporte de Energía Perdida: ALTA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'pdf',
                                    'title' => 'Reporte de Energía Perdida: ALTA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'print',
                                    'title' => 'Reporte de Energía Perdida: ALTA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                            ],
                        ];
                    @endphp
                    <x-adminlte-datatable id="tableA" :heads="$heads" head-theme="dark" :config="$config">
                        @foreach ($fechas_BalanceMensual as $bm1)
                            <tr>
                                <td> </td>
                                <td style="width: 150px">{{ $bm1->fecha }}</td>
                                <td>{{ number_format($bm1->energia_mensual_perdida, 8, '.', ',') }} KWh</td>
                                <td>{{ $bm1->porcentaje }} %</td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="panel3" role="tabpanel" aria-labelledby="panel3-tab">
            <div class="card shadow-lg">
                <div class="card-body">
                    @php
                        $heads = [
                            ['no-export' => true, 'width' => 1],
                            'Fecha',
                            'Energía mensual recibida',
                            'Energía mensual entregada',
                            'SINO',
                            'Energía mensual perdida',
                            'Energía porcentual perdida',
                        ];
                        if ($usuarioActivo->privilegios == 1) {
                            $heads[] = ['label' => 'Editar', 'no-export' => true, 'width' => 15];
                        }
                        $config = [
                            'language' => [
                                'url' => 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                            ],
                            'lengthMenu' => [[12, 25, 50, -1], [12, 25, 50, 'All']],
                            'pageLength' => 12,
                            'dom' => 'Bfrtip',
                            'buttons' => [
                                [
                                    'extend' => 'copy',
                                    'title' => 'Reporte de Balance Energético: ALTA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'csv',
                                    'title' => 'Reporte de Balance Energético: ALTA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'excel',
                                    'title' => 'Reporte de Balance Energético: ALTA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'pdf',
                                    'title' => 'Reporte de Balance Energético: ALTA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'print',
                                    'title' => 'Reporte de Balance Energético: ALTA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                            ],
                        ];
                    @endphp
                    <x-adminlte-datatable id="table3" :heads="$heads" head-theme="dark" :config="$config">
                        @foreach ($fechas_BalanceMensual as $bm)
                            <tr>
                                <td></td>
                                <td style="width: 150px">{{ $bm->fecha }}</td>
                                <td>{{ number_format($bm->energia_mensual_recibida, 8, '.', ',') }} KWh</td>
                                <td>{{ number_format($bm->energia_mensual_entregada, 8, '.', ',') }} KWh</td>
                                <td>{{ $bm->sino }} KWh</td>
                                <td>{{ number_format($bm->energia_mensual_perdida, 8, '.', ',') }} KWh</td>
                                <td>{{ $bm->porcentaje }} %</td>
                                @if ($usuarioActivo->privilegios == 1)
                                    <td>
                                        <a href="#" class="btn btn-xs btn-default text-primary mx-1 shadow editar2"
                                            title="Edit" data-toggle="modal"
                                            data-target="#editar2_{{ $bm->id }}" data-bm-id="{{ $bm->id }}">
                                            <i class="fa fa-lg fa-fw fa-pen"></i>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        @foreach ($fechas_BalanceMensual as $bm)
                            <x-adminlte-modal id="editar2_{{ $bm->id }}" title="EDITAR: Balance mensual"
                                size="md" theme="primary" icon="fa fa-bolt" v-centered static-backdrop scrollable>

                                <div style="height:400px;">
                                    <div class="modal-body">
                                        <form id="frmActualizar2_{{ $bm->id }}"
                                            action="{{ route('balance_alta.update3', $bm->id) }}" method="GET">
                                            @csrf
                                            <x-adminlte-input type="text" name="Fecha" id="fecha"
                                                label="Fecha" label-class="text-primary" value="{{ $bm->fecha }}"
                                                readonly>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="number" name="Energia_r" id="energia_r"
                                                label="Energía recibida (KWh)" label-class="text-primary"
                                                value="{{ $bm->energia_mensual_recibida }}" readonly>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="number" name="Energia_e" id="energia_e"
                                                label="Energía entregada (KWh)" label-class="text-primary"
                                                value="{{ $bm->energia_mensual_entregada }}" readonly>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="number" name="sino" id="sino"
                                                label="SINO" label-class="text-primary" value="{{ $bm->sino }}"
                                                step="any">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-slot name="footerSlot">
                                                <x-adminlte-button theme="primary" label="Actualizar"
                                                    class="actualizarBtn2" data-bm-id="{{ $bm->id }}" />
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
            @php
                $e_perdida = $fechas_BalanceMensual;
            @endphp
        </div>
        <div class="tab-pane fade" id="panel4" role="tabpanel" aria-labelledby="panel4-tab">
            @php
                $enero = $fechas_BalanceMensual[0];
                $febrero = $fechas_BalanceMensual[1];
                $marzo = $fechas_BalanceMensual[2];
                $abril = $fechas_BalanceMensual[3];
                $mayo = $fechas_BalanceMensual[4];
                $junio = $fechas_BalanceMensual[5];
                $julio = $fechas_BalanceMensual[6];
                $agosto = $fechas_BalanceMensual[7];
                $septiembre = $fechas_BalanceMensual[8];
                $octubre = $fechas_BalanceMensual[9];
                $noviembre = $fechas_BalanceMensual[10];
                $diciembre = $fechas_BalanceMensual[11];
            @endphp
            <center>
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="canvas-container">
                            <canvas id="can1" width="270" height="250"></canvas>
                            <canvas id="can2" width="270" height="250"></canvas>
                            <canvas id="can3" width="270" height="250"></canvas>
                            <canvas id="can4" width="270" height="250"></canvas>
                            <canvas id="can5" width="270" height="250"></canvas>
                            <canvas id="can6" width="270" height="250"></canvas>
                            <canvas id="can7" width="270" height="250"></canvas>
                            <canvas id="can8" width="270" height="250"></canvas>
                            <canvas id="can9" width="270" height="250"></canvas>
                            <canvas id="can10" width="270" height="250"></canvas>
                            <canvas id="can11" width="270" height="250"></canvas>
                            <canvas id="can12" width="270" height="250"></canvas>
                        </div>
                    </div>
                </div>
            </center>
        </div>
        <div class="tab-pane fade" id="panel5" role="tabpanel" aria-labelledby="panel5-tab">
            <div class="card shadow-lg">
                <div class="card-body">
                    <canvas id="grafica1">
                    </canvas>
                </div>
            </div>
            <div class="card shadow-lg">
                <div class="card-body">
                    <canvas id="grafica3">
                    </canvas>
                </div>
            </div>
            <div class="card shadow-lg">
                <div class="card-body">
                    <canvas id="grafica2">
                    </canvas>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')

    <script>
        document.getElementById('guardarBtn').addEventListener('click', function() {
            document.getElementById('frmRegistro').submit();
        });

        document.getElementById('guardarBtn2').addEventListener('click', function() {
            document.getElementById('frmRegistro2').submit();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.editar').click(function(e) {
                e.preventDefault();
                var energiaRId = $(this).data('er-id');
                $('#editar_' + energiaRId).modal('show');
                console.log(energiaRId);
            });
            $('.actualizarBtn').click(function(e) {
                e.preventDefault();
                var energiaRId = $(this).data('er-id');
                $('#frmActualizar_' + energiaRId).submit();
            });


            $('.editar1').click(function(e) {
                e.preventDefault();
                var energiaEId = $(this).data('ee-id');
                $('#editar1_' + energiaEId).modal('show');
                console.log(energiaEId);
            });
            $('.actualizarBtn1').click(function(e) {
                e.preventDefault();
                var energiaEId = $(this).data('ee-id');
                $('#frmActualizar1_' + energiaEId).submit();
            });


            $('.editar2').click(function(e) {
                e.preventDefault();
                var energiaBMId = $(this).data('bm-id');
                $('#editar2_' + energiaBMId).modal('show');
                console.log(energiaBMId);
            });
            $('.actualizarBtn2').click(function(e) {
                e.preventDefault();
                var energiaBMId = $(this).data('bm-id');
                $('#frmActualizar2_' + energiaBMId).submit();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.formEliminar').submit(function(e) {
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx1 = document.querySelector('#grafica1').getContext('2d');
            const labels1 = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                'Octubre', 'Noviembre', 'Diciembre'
            ];
            const data1 = {!! json_encode($e_perdida->pluck('energia_mensual_perdida')) !!};
            const data5 = {!! json_encode($e_perdida->pluck('energia_mensual_recibida')) !!};
            const data6 = {!! json_encode($e_perdida->pluck('energia_mensual_entregada')) !!};
            const barChartHorizontal = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: labels1,
                    datasets: [{
                            label: 'Energía mensual recibida (KWh)',
                            data: data5,
                            backgroundColor: '#0C4009',
                            borderColor: '#0C4009',
                            borderWidth: 1
                        },
                        {
                            label: 'Energía mensual entregada (KWh)',
                            data: data6,
                            backgroundColor: '#5AB354',
                            borderColor: '#5AB354',
                            borderWidth: 1
                        },
                        {
                            label: 'Energía mensual perdida (KWh)',
                            data: data1,
                            backgroundColor: '#F51010',
                            borderColor: '#F51010',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Energía mensual perdida',
                            position: 'top'
                        }
                    },
                    scales: {
                        x: {
                            stacked: true
                        },
                        y: {
                            stacked: true
                        }
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx2 = document.querySelector('#grafica2').getContext('2d');
            const labels2 = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                'Octubre', 'Noviembre', 'Diciembre'
            ];
            const data2 = {!! json_encode($e_perdida->pluck('energia_mensual_recibida')) !!};
            const data3 = {!! json_encode($e_perdida->pluck('energia_mensual_entregada')) !!};
            const data4 = {!! json_encode($e_perdida->pluck('energia_mensual_perdida')) !!};
            const barChartHorizontal = new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: labels2,
                    datasets: [{
                            label: 'Energía mensual recibida (KWh)',
                            data: data2,
                            backgroundColor: '#0C4009',
                            borderColor: '#0C4009',
                            borderWidth: 3
                        },
                        {
                            label: 'Energía mensual entregada (KWh)',
                            data: data3,
                            backgroundColor: '#5AB354',
                            borderColor: '#5AB354',
                            borderWidth: 3
                        },
                        {
                            label: 'Energía mensual perdida (KWh)',
                            data: data4,
                            backgroundColor: '#F51010',
                            borderColor: '#F51010',
                            borderWidth: 3
                        }
                    ]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Energía mensual perdida',
                            position: 'top'
                        }
                    },
                    scales: {
                        xAxes: [{
                            stacked: true
                        }],
                        yAxes: [{
                            stacked: true
                        }]
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctxA = document.querySelector('#grafica3').getContext('2d');
            const labelsA = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                'Octubre', 'Noviembre', 'Diciembre'
            ];
            const dataA = {!! json_encode($e_perdida->pluck('energia_mensual_perdida')) !!};
            const dataB = {!! json_encode($e_perdida->pluck('energia_mensual_recibida')) !!};
            const dataC = {!! json_encode($e_perdida->pluck('energia_mensual_entregada')) !!};
            const barChart = new Chart(ctxA, {
                type: 'bar',
                data: {
                    labels: labelsA,
                    datasets: [{
                            label: 'Energía mensual recibida (KWh)',
                            data: dataB,
                            backgroundColor: '#0C4009',
                            borderColor: '#0C4009',
                            borderWidth: 1
                        },
                        {
                            label: 'Energía mensual entregada (KWh)',
                            data: dataC,
                            backgroundColor: '#5AB354',
                            borderColor: '#5AB354',
                            borderWidth: 1
                        },
                        {
                            label: 'Energía mensual perdida (KWh)',
                            data: dataA,
                            backgroundColor: '#F51010',
                            borderColor: '#F51010',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Energía mensual perdida',
                            position: 'top'
                        }
                    },
                    scales: {
                        x: {
                            stacked: false
                        },
                        y: {
                            stacked: false
                        }
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var chrt1 = document.getElementById('can1').getContext('2d');
            var chart1 = new Chart(chrt1, {
                type: 'doughnut',
                data: {
                    labels: ['Energía recibida', 'Energía entregada', 'Energía perdida'],
                    datasets: [{
                        label: 'KWh',
                        data: [
                            {{ $enero->energia_mensual_recibida }},
                            {{ $enero->energia_mensual_entregada }},
                            {{ $enero->energia_mensual_perdida }}
                        ],
                        backgroundColor: ['#0C4009', '#5AB354', '#F51010'],
                        hoverOffset: 5
                    }],
                },
                options: {
                    responsive: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Energía mensual de Enero'
                        }
                    }
                },
            });

            var chrt2 = document.getElementById('can2').getContext('2d');
            var chart2 = new Chart(chrt2, {
                type: 'doughnut',
                data: {
                    labels: ['Energía recibida', 'Energía entregada', 'Energía perdida'],
                    datasets: [{
                        label: 'KWh',
                        data: [
                            {{ $febrero->energia_mensual_recibida }},
                            {{ $febrero->energia_mensual_entregada }},
                            {{ $febrero->energia_mensual_perdida }}
                        ],
                        backgroundColor: ['#0C4009', '#5AB354', '#F51010'],
                        hoverOffset: 5
                    }],
                },
                options: {
                    responsive: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Energía mensual de Febrero'
                        }
                    }
                },
            });

            var chrt3 = document.getElementById('can3').getContext('2d');
            var chart3 = new Chart(chrt3, {
                type: 'doughnut',
                data: {
                    labels: ['Energía recibida', 'Energía entregada', 'Energía perdida'],
                    datasets: [{
                        label: 'KWh',
                        data: [
                            {{ $marzo->energia_mensual_recibida }},
                            {{ $marzo->energia_mensual_entregada }},
                            {{ $marzo->energia_mensual_perdida }}
                        ],
                        backgroundColor: ['#0C4009', '#5AB354', '#F51010'],
                        hoverOffset: 5
                    }],
                },
                options: {
                    responsive: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Energía mensual de Marzo'
                        }
                    }
                },
            });

            var chrt4 = document.getElementById('can4').getContext('2d');
            var chart4 = new Chart(chrt4, {
                type: 'doughnut',
                data: {
                    labels: ['Energía recibida', 'Energía entregada', 'Energía perdida'],
                    datasets: [{
                        label: 'KWh',
                        data: [
                            {{ $abril->energia_mensual_recibida }},
                            {{ $abril->energia_mensual_entregada }},
                            {{ $abril->energia_mensual_perdida }}
                        ],
                        backgroundColor: ['#0C4009', '#5AB354', '#F51010'],
                        hoverOffset: 5
                    }],
                },
                options: {
                    responsive: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Energía mensual de Abril'
                        }
                    }
                },
            });

            var chrt5 = document.getElementById('can5').getContext('2d');
            var chart5 = new Chart(chrt5, {
                type: 'doughnut',
                data: {
                    labels: ['Energía recibida', 'Energía entregada', 'Energía perdida'],
                    datasets: [{
                        label: 'KWh',
                        data: [
                            {{ $mayo->energia_mensual_recibida }},
                            {{ $mayo->energia_mensual_entregada }},
                            {{ $mayo->energia_mensual_perdida }}
                        ],
                        backgroundColor: ['#0C4009', '#5AB354', '#F51010'],
                        hoverOffset: 5
                    }],
                },
                options: {
                    responsive: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Energía mensual de Mayo'
                        }
                    }
                },
            });

            var chrt6 = document.getElementById('can6').getContext('2d');
            var chart6 = new Chart(chrt6, {
                type: 'doughnut',
                data: {
                    labels: ['Energía recibida', 'Energía entregada', 'Energía perdida'],
                    datasets: [{
                        label: 'KWh',
                        data: [
                            {{ $junio->energia_mensual_recibida }},
                            {{ $junio->energia_mensual_entregada }},
                            {{ $junio->energia_mensual_perdida }}
                        ],
                        backgroundColor: ['#0C4009', '#5AB354', '#F51010'],
                        hoverOffset: 5
                    }],
                },
                options: {
                    responsive: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Energía mensual de Junio'
                        }
                    }
                },
            });

            var chrt7 = document.getElementById('can7').getContext('2d');
            var chart7 = new Chart(chrt7, {
                type: 'doughnut',
                data: {
                    labels: ['Energía recibida', 'Energía entregada', 'Energía perdida'],
                    datasets: [{
                        label: 'KWh',
                        data: [
                            {{ $julio->energia_mensual_recibida }},
                            {{ $julio->energia_mensual_entregada }},
                            {{ $julio->energia_mensual_perdida }}
                        ],
                        backgroundColor: ['#0C4009', '#5AB354', '#F51010'],
                        hoverOffset: 5
                    }],
                },
                options: {
                    responsive: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Energía mensual de Julio'
                        }
                    }
                },
            });

            var chrt8 = document.getElementById('can8').getContext('2d');
            var chart8 = new Chart(chrt8, {
                type: 'doughnut',
                data: {
                    labels: ['Energía recibida', 'Energía entregada', 'Energía perdida'],
                    datasets: [{
                        label: 'KWh',
                        data: [
                            {{ $agosto->energia_mensual_recibida }},
                            {{ $agosto->energia_mensual_entregada }},
                            {{ $agosto->energia_mensual_perdida }}
                        ],
                        backgroundColor: ['#0C4009', '#5AB354', '#F51010'],
                        hoverOffset: 5
                    }],
                },
                options: {
                    responsive: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Energía mensual de Agosto'
                        }
                    }
                },
            });

            var chrt9 = document.getElementById('can9').getContext('2d');
            var chart9 = new Chart(chrt9, {
                type: 'doughnut',
                data: {
                    labels: ['Energía recibida', 'Energía entregada', 'Energía perdida'],
                    datasets: [{
                        label: 'KWh',
                        data: [
                            {{ $septiembre->energia_mensual_recibida }},
                            {{ $septiembre->energia_mensual_entregada }},
                            {{ $septiembre->energia_mensual_perdida }}
                        ],
                        backgroundColor: ['#0C4009', '#5AB354', '#F51010'],
                        hoverOffset: 5
                    }],
                },
                options: {
                    responsive: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Energía mensual de Septiembre'
                        }
                    }
                },
            });

            var chrt10 = document.getElementById('can10').getContext('2d');
            var chart10 = new Chart(chrt10, {
                type: 'doughnut',
                data: {
                    labels: ['Energía recibida', 'Energía entregada', 'Energía perdida'],
                    datasets: [{
                        label: 'KWh',
                        data: [
                            {{ $octubre->energia_mensual_recibida }},
                            {{ $octubre->energia_mensual_entregada }},
                            {{ $octubre->energia_mensual_perdida }}
                        ],
                        backgroundColor: ['#0C4009', '#5AB354', '#F51010'],
                        hoverOffset: 5
                    }],
                },
                options: {
                    responsive: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Energía mensual de Octubre'
                        }
                    }
                },
            });

            var chrt11 = document.getElementById('can11').getContext('2d');
            var chart11 = new Chart(chrt11, {
                type: 'doughnut',
                data: {
                    labels: ['Energía recibida', 'Energía entregada', 'Energía perdida'],
                    datasets: [{
                        label: 'KWh',
                        data: [
                            {{ $noviembre->energia_mensual_recibida }},
                            {{ $noviembre->energia_mensual_entregada }},
                            {{ $noviembre->energia_mensual_perdida }}
                        ],
                        backgroundColor: ['#0C4009', '#5AB354', '#F51010'],
                        hoverOffset: 5
                    }],
                },
                options: {
                    responsive: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Energía mensual de Noviembre'
                        }
                    }
                },
            });

            var chrt12 = document.getElementById('can12').getContext('2d');
            var chart12 = new Chart(chrt12, {
                type: 'doughnut',
                data: {
                    labels: ['Energía recibida', 'Energía entregada', 'Energía perdida'],
                    datasets: [{
                        label: 'KWh',
                        data: [
                            {{ $diciembre->energia_mensual_recibida }},
                            {{ $diciembre->energia_mensual_entregada }},
                            {{ $diciembre->energia_mensual_perdida }}
                        ],
                        backgroundColor: ['#0C4009', '#5AB354', '#F51010'],
                        hoverOffset: 5
                    }],
                },
                options: {
                    responsive: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Energía mensual de Diciembre'
                        }
                    }
                },
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
    <style>
        .canvas-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        canvas {
            margin: 10px;
        }
    </style>
    <style>
        .styled-select {
            display: inline-block;
            position: relative;
            margin-right: 10px;
        }

        .styled-select select {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            background-color: #fff;
            font-size: 14px;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        .styled-select select:focus {
            outline: none;
        }

        .styled-select select::-ms-expand {
            display: none;
        }

        .styled-select button {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            background-color: #1e8449;
            color: #fff;
            font-size: 14px;
            cursor: pointer;
        }

        .styled-select button:hover {
            background-color: #186534;
        }
    </style>
@stop
