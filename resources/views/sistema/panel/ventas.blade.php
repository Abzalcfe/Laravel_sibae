@extends('adminlte::page')

@section('title', 'SIBAE')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h6>SIBAE: Sistema de Gestión de Balance de Energía</h6>
            <h1>Adminstración de tarifas de venta</h1>
        </div>
        @if ($usuarioActivo->privilegios == 1)
            <div class="col-md-6" style="text-align: right;">
                <x-adminlte-button label="Nuevo registro" data-toggle="modal" data-target="#nuevo"
                    class="bg-primary text-white" />
            </div>
        @endif
    </div>

    <x-adminlte-modal id="nuevo" title="VENTAS: Nuevo registro" size="md" theme="primary" icon="fa fa-bolt"
        v-centered static-backdrop scrollable>

        <div style="height:285px;">
            <div class="modal-body">
                <form id="frmRegistro" action="{{ route('ventas.guardar') }}" method="get">
                    @csrf

                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="year" id="year" value="{{ $year }}">

                    <x-adminlte-select-bs id="tarifa" name="Tarifa" label="Tarifa" label-class="text-primary">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-circle text-primary"></i>
                            </div>
                        </x-slot>
                        <option value="">Seleccione la tarifa</option>
                        @foreach ($listaTarifas as $listaTarifa)
                            <option value="{{ $listaTarifa->id }}">{{ $listaTarifa->codigo }}
                                {{ $listaTarifa->descripcion }}</option>
                        @endforeach
                    </x-adminlte-select-bs>

                    <x-adminlte-select-bs id="mes" name="Mes" label="Mes" label-class="text-primary">
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

                    <x-adminlte-input type="number" name="Monto" id="energia_v" label="Monto (KWh)"
                        label-class="text-primary" step="any">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-circle text-primary"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    <x-slot name="footerSlot">
                        <x-adminlte-button theme="primary" label="Guardar" id="guardarBtn" type="button"
                            class="bg-primary text-white" />
                        <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" id="cancelar"
                            type="button" />
                    </x-slot>
                </form>
            </div>
        </div>
    </x-adminlte-modal>
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
    @endphp
    <br>
    <form id="yearForm" method="GET" action="{{ route('ventas.create') }}">
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
        echo "<h1>Gestión de ventas anuales: 20$year</h1>";
    @endphp
    <br>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">Tarifas de venta</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                aria-selected="false">Ventas mensuales</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="mensual-tab" data-toggle="tab" href="#mensual" role="tab"
                aria-controls="mensual" aria-selected="false">Gráficas mensuales</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                aria-controls="contact" aria-selected="false">Gráficas totales</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card shadow-lg">
                <div class="card-body">
                    @php
                        if ($usuarioActivo->privilegios == 1) {
                            $heads = [
                                'Código',
                                'Tarifa',
                                'Fecha',
                                'Monto',
                                ['label' => 'Opciones', 'no-export' => true, 'width' => 15],
                            ];
                        } else {
                            $heads = ['Código', 'Tarifa', 'Fecha', 'Monto', ['no-export' => true, 'width' => 1]];
                        }
                        $btnEdit = '';
                        $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Delete">
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
                                    'title' => 'Reporte de Tarifas',
                                    'exportOptions' => ['columns' => ':not(:last-child)'],
                                ],
                                [
                                    'extend' => 'csv',
                                    'title' => 'Reporte de Tarifas',
                                    'exportOptions' => ['columns' => ':not(:last-child)'],
                                ],
                                [
                                    'extend' => 'excel',
                                    'title' => 'Reporte de Tarifas',
                                    'exportOptions' => ['columns' => ':not(:last-child)'],
                                ],
                                [
                                    'extend' => 'pdf',
                                    'title' => 'Reporte de Tarifas',
                                    'exportOptions' => ['columns' => ':not(:last-child)'],
                                ],
                                [
                                    'extend' => 'print',
                                    'title' => 'Reporte de Tarifas',
                                    'exportOptions' => ['columns' => ':not(:last-child)'],
                                ],
                            ],
                        ];
                    @endphp
                    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config">
                        @foreach ($ventasTabla as $ventaT)
                            <tr>
                                <td>{{ $ventaT->codigo }}</td>
                                <td>{{ $ventaT->descripcion }}</td>
                                <td>{{ $ventaT->fecha }}</td>
                                <td>{{ number_format($ventaT->monto, 8, '.', ',') }} KWh</td>
                                @if ($usuarioActivo->privilegios == 1)
                                    <td>
                                        <div style="display: flex; align-items: center;">
                                            <a href="#"
                                                class="btn btn-xs btn-default text-primary mx-1 shadow editar"
                                                title="Edit" data-toggle="modal"
                                                data-target="#editar_{{ $ventaT->ID }}"
                                                data-ventat-id="{{ $ventaT->ID }}">
                                                <i class="fa fa-lg fa-fw fa-pen"></i>
                                            </a>
                                            <form style="display: inline"
                                                action="{{ route('ventas.destroy', $ventaT->ID) }}" method="POST"
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
                        @foreach ($ventasTabla as $ventaT)
                            <x-adminlte-modal id="editar_{{ $ventaT->ID }}" title="EDITAR: Energía vendida"
                                size="md" theme="primary" icon="fa fa-bolt" v-centered static-backdrop scrollable>
                                <div style="height:400px;">
                                    <div class="modal-body">
                                        <form id="frmActualizar_{{ $ventaT->ID }}"
                                            action="{{ route('ventas.update1', $ventaT->ID) }}" method="GET">
                                            @csrf
                                            <x-adminlte-input type="text" name="codigo" id="codigo"
                                                label="Código" label-class="text-primary" value="{{ $ventaT->codigo }}"
                                                readonly>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="text" name="Tarifa" id="tarifa"
                                                label="Tarifa" label-class="text-primary"
                                                value="{{ $ventaT->descripcion }}" readonly>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="text" name="Fecha" id="fecha"
                                                label="Fecha" label-class="text-primary" value="{{ $ventaT->fecha }}"
                                                readonly>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="number" name="Monto" id="energia_v"
                                                label="Monto (KWh)" label-class="text-primary"
                                                value="{{ $ventaT->monto }}" step="any">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-slot name="footerSlot">
                                                <x-adminlte-button theme="primary" label="Actualizar"
                                                    class="actualizarBtn" data-ventat-id="{{ $ventaT->ID }}" />
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
                    @php
                        $heads = [
                            ['no-export' => true, 'width' => 1],
                            'Fecha',
                            'Total mensual',
                            'Usos propios',
                            'Total de venta',
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
                                    'title' => 'Reporte de Ventas Mnesuales',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'csv',
                                    'title' => 'Reporte de Ventas Mnesuales',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'excel',
                                    'title' => 'Reporte de Ventas Mnesuales',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'pdf',
                                    'title' => 'Reporte de Ventas Mnesuales',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'print',
                                    'title' => 'Reporte de Ventas Mnesuales',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                            ],
                        ];
                    @endphp
                    <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config">
                        @foreach ($ventas_totales as $ventas_t)
                            <tr>
                                <td></td>
                                <td>{{ $ventas_t->fecha }}</td>
                                <td>{{ number_format($ventas_t->total_mensual, 8, '.', ',') }} KWh </td>
                                <td>{{ number_format($ventas_t->usos_propios, 8, '.', ',') }} KWh </td>
                                <td>{{ number_format($ventas_t->total_ventas, 8, '.', ',') }} KWh </td>
                                @if ($usuarioActivo->privilegios == 1)
                                    <td>
                                        <a href="#" class="btn btn-xs btn-default text-primary mx-1 shadow editar1"
                                            title="Edit" data-toggle="modal"
                                            data-target="#editar1_{{ $ventas_t->id }}"
                                            data-ventas-id="{{ $ventas_t->id }}">
                                            <i class="fa fa-lg fa-fw fa-pen"></i>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        @foreach ($ventas_totales as $ventas_t)
                            <x-adminlte-modal id="editar1_{{ $ventas_t->id }}" title="EDITAR: Ventas totales"
                                size="md" theme="primary" icon="fa fa-bolt" v-centered static-backdrop scrollable>

                                <div style="height:400px;">
                                    <div class="modal-body">
                                        <form id="frmActualizar1_{{ $ventas_t->id }}"
                                            action="{{ route('ventas.update2', $ventas_t) }}" method="GET">
                                            @csrf
                                            <x-adminlte-input type="text" name="Fecha" id="fecha"
                                                label="Fecha" label-class="text-primary" value="{{ $ventas_t->fecha }}"
                                                readonly>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="number" name="total_m" id="total_m"
                                                label="Total mensual (KWh)" label-class="text-primary"
                                                value="{{ $ventas_t->total_mensual }}" readonly>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="number" name="Usos_propios" id="usos_p"
                                                label="Usos propios (KWh)" label-class="text-primary"
                                                value="{{ $ventas_t->usos_propios }}" step="any">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-slot name="footerSlot">
                                                <x-adminlte-button theme="primary" label="Actualizar"
                                                    class="actualizarBtn1" data-ventas-id="{{ $ventas_t->id }}" />
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
            @php
                $enero = $febrero = $marzo = $abril = $mayo = $junio = $julio = $agosto = $septiembre = $octubre = $noviembre = $diciembre = 0;
                if (count($ventas_agrupadas) > 0) {
                    $meses = [];
                    foreach ($ventas_agrupadas as $venta_a) {
                        $meses[] = $venta_a;
                    }
                    $enero = $meses[0] ?? 0;
                    $febrero = $meses[1] ?? 0;
                    $marzo = $meses[2] ?? 0;
                    $abril = $meses[3] ?? 0;
                    $mayo = $meses[4] ?? 0;
                    $junio = $meses[5] ?? 0;
                    $julio = $meses[6] ?? 0;
                    $agosto = $meses[7] ?? 0;
                    $septiembre = $meses[8] ?? 0;
                    $octubre = $meses[9] ?? 0;
                    $noviembre = $meses[10] ?? 0;
                    $diciembre = $meses[11] ?? 0;
                }
            @endphp

            <center>
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="canvas-container">
                            <canvas id="can1" width="50"></canvas>
                            <canvas id="can2" width="50"></canvas>
                            <canvas id="can3" width="50"></canvas>
                            <canvas id="can4" width="50"></canvas>
                            <canvas id="can5" width="50"></canvas>
                            <canvas id="can6" width="50"></canvas>
                            <canvas id="can7" width="50"></canvas>
                            <canvas id="can8" width="50"></canvas>
                            <canvas id="can9" width="50"></canvas>
                            <canvas id="can10" width="50"></canvas>
                            <canvas id="can11" width="50"></canvas>
                            <canvas id="can12" width="50"></canvas>
                        </div>
                    </div>
                </div>
            </center>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            @php
                $ventas1 = $ventas;
                $ventas2 = $ventas_totales;
            @endphp

            <div class="card shadow-lg">
                <div class="card-body">
                    <canvas id="graficos2">
                    </canvas>
                </div>
            </div>

            <div class="card shadow-lg">
                <div class="card-body">
                    <canvas id="graficos3">
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

        document.getElementById('actualizarBtn').addEventListener('click', function() {
            document.getElementById('frmActualizar').submit();
        });

        document.getElementById('actualizarBtn1').addEventListener('click', function() {
            document.getElementById('frmActualizar1').submit();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.editar').click(function(e) {
                e.preventDefault();
                var energiaVId = $(this).data('ventat-id');
                $('#editar_' + energiaVId).modal('show');
                console.log(energiaVId);
            });
            $('.actualizarBtn').click(function(e) {
                e.preventDefault();
                var energiaVId = $(this).data('ventat-id');
                $('#frmActualizar_' + energiaVId).submit();
            });



            $('.editar1').click(function(e) {
                e.preventDefault();
                var energiaTId = $(this).data('ventas-id');
                $('#editar1_' + energiaTId).modal('show');
                console.log(energiaTId);
            });
            $('.actualizarBtn1').click(function(e) {
                e.preventDefault();
                var energiaTId = $(this).data('ventas-id');
                $('#frmActualizar1_' + energiaTId).submit();
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
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx2 = document.querySelector('#graficos2').getContext('2d');
            const labels1 = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                'Octubre', 'Noviembre', 'Diciembre'
            ];
            const data2 = {!! json_encode($ventas2->pluck('total_ventas')) !!};
            const barChart = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: labels1,
                    datasets: [{
                        label: 'KWh',
                        data: data2,
                        backgroundColor: '#12B554',
                        borderColor: '#226905',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Ventas mensuales',
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
            const ctx3 = document.querySelector('#graficos3').getContext('2d');
            const labels2 = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                'Octubre', 'Noviembre', 'Diciembre'
            ];
            const data3 = {!! json_encode($ventas2->pluck('total_ventas')) !!};
            const barChart = new Chart(ctx3, {
                type: 'line',
                data: {
                    labels: labels2,
                    datasets: [{
                        label: 'KWh',
                        data: data3,
                        backgroundColor: '#226905',
                        borderColor: '#226905',
                        borderWidth: 3
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Energía vendida',
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
            const ct1 = document.querySelector('#can1').getContext('2d');
            const datos = {!! json_encode($enero) !!};

            const barChart = new Chart(ct1, {
                type: 'bar',
                data: {
                    labels: datos.map(item => item.codigo),
                    datasets: [{
                        label: 'KWh',
                        data: datos.map(item => item.monto),
                        backgroundColor: '#12B554',
                        borderColor: '#226905',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Tarifas totales: Enero',
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    var label = datos[context.dataIndex].codigo + ' ' + datos[context
                                        .dataIndex].descripcion;
                                    label += ' : ' + context.formattedValue + ' ' + 'KWh';
                                    return label;
                                }
                            }
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
            const ct2 = document.querySelector('#can2').getContext('2d');
            const datos2 = {!! json_encode($febrero) !!};

            const barChart = new Chart(ct2, {
                type: 'bar',
                data: {
                    labels: datos2.map(item => item.codigo),
                    datasets: [{
                        label: 'KWh',
                        data: datos2.map(item => item.monto),
                        backgroundColor: '#12B554',
                        borderColor: '#226905',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Tarifas totales: Febrero',
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    var label = datos2[context.dataIndex].codigo + ' ' + datos2[context
                                        .dataIndex].descripcion;
                                    label += ' : ' + context.formattedValue + ' ' + 'KWh';
                                    return label;
                                }
                            }
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
            const ct3 = document.querySelector('#can3').getContext('2d');
            const datos3 = {!! json_encode($marzo) !!};

            const barChart = new Chart(ct3, {
                type: 'bar',
                data: {
                    labels: datos3.map(item => item.codigo),
                    datasets: [{
                        label: 'KWh',
                        data: datos3.map(item => item.monto),
                        backgroundColor: '#12B554',
                        borderColor: '#226905',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Tarifas totales: Marzo',
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    var label = datos3[context.dataIndex].codigo + ' ' + datos3[context
                                        .dataIndex].descripcion;
                                    label += ' : ' + context.formattedValue + ' ' + 'KWh';
                                    return label;
                                }
                            }
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
            const ct4 = document.querySelector('#can4').getContext('2d');
            const datos4 = {!! json_encode($abril) !!};

            const barChart = new Chart(ct4, {
                type: 'bar',
                data: {
                    labels: datos4.map(item => item.codigo),
                    datasets: [{
                        label: 'KWh',
                        data: datos4.map(item => item.monto),
                        backgroundColor: '#12B554',
                        borderColor: '#226905',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Tarifas totales: Abril',
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    var label = datos4[context.dataIndex].codigo + ' ' + datos4[context
                                        .dataIndex].descripcion;
                                    label += ' : ' + context.formattedValue + ' ' + 'KWh';
                                    return label;
                                }
                            }
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
            const ct5 = document.querySelector('#can5').getContext('2d');
            const datos5 = {!! json_encode($mayo) !!};

            const barChart = new Chart(ct5, {
                type: 'bar',
                data: {
                    labels: datos5.map(item => item.codigo),
                    datasets: [{
                        label: 'KWh',
                        data: datos5.map(item => item.monto),
                        backgroundColor: '#12B554',
                        borderColor: '#226905',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Tarifas totales: Mayo',
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    var label = datos5[context.dataIndex].codigo + ' ' + datos5[context
                                        .dataIndex].descripcion;
                                    label += ' : ' + context.formattedValue + ' ' + 'KWh';
                                    return label;
                                }
                            }
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
            const ct6 = document.querySelector('#can6').getContext('2d');
            const datos6 = {!! json_encode($junio) !!};

            const barChart = new Chart(ct6, {
                type: 'bar',
                data: {
                    labels: datos6.map(item => item.codigo),
                    datasets: [{
                        label: 'KWh',
                        data: datos6.map(item => item.monto),
                        backgroundColor: '#12B554',
                        borderColor: '#226905',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Tarifas totales: Junio',
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    var label = datos6[context.dataIndex].codigo + ' ' + datos6[context
                                        .dataIndex].descripcion;
                                    label += ' : ' + context.formattedValue + ' ' + 'KWh';
                                    return label;
                                }
                            }
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
            const ct7 = document.querySelector('#can7').getContext('2d');
            const datos7 = {!! json_encode($julio) !!};

            const barChart = new Chart(ct7, {
                type: 'bar',
                data: {
                    labels: datos7.map(item => item.codigo),
                    datasets: [{
                        label: 'KWh',
                        data: datos7.map(item => item.monto),
                        backgroundColor: '#12B554',
                        borderColor: '#226905',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Tarifas totales: Julio',
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    var label = datos7[context.dataIndex].codigo + ' ' + datos7[context
                                        .dataIndex].descripcion;
                                    label += ' : ' + context.formattedValue + ' ' + 'KWh';
                                    return label;
                                }
                            }
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
            const ct8 = document.querySelector('#can8').getContext('2d');
            const datos8 = {!! json_encode($agosto) !!};

            const barChart = new Chart(ct8, {
                type: 'bar',
                data: {
                    labels: datos8.map(item => item.codigo),
                    datasets: [{
                        label: 'KWh',
                        data: datos8.map(item => item.monto),
                        backgroundColor: '#12B554',
                        borderColor: '#226905',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Tarifas totales: Agosto',
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    var label = datos8[context.dataIndex].codigo + ' ' + datos8[context
                                        .dataIndex].descripcion;
                                    label += ' : ' + context.formattedValue + ' ' + 'KWh';
                                    return label;
                                }
                            }
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
            const ct9 = document.querySelector('#can9').getContext('2d');
            const datos9 = {!! json_encode($septiembre) !!};

            const barChart = new Chart(ct9, {
                type: 'bar',
                data: {
                    labels: datos9.map(item => item.codigo),
                    datasets: [{
                        label: 'KWh',
                        data: datos9.map(item => item.monto),
                        backgroundColor: '#12B554',
                        borderColor: '#226905',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Tarifas totales: Septiembre',
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    var label = datos9[context.dataIndex].codigo + ' ' + datos9[context
                                        .dataIndex].descripcion;
                                    label += ' : ' + context.formattedValue + ' ' + 'KWh';
                                    return label;
                                }
                            }
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
            const ct10 = document.querySelector('#can10').getContext('2d');
            const datos10 = {!! json_encode($octubre) !!};

            const barChart = new Chart(ct10, {
                type: 'bar',
                data: {
                    labels: datos10.map(item => item.codigo),
                    datasets: [{
                        label: 'KWh',
                        data: datos10.map(item => item.monto),
                        backgroundColor: '#12B554',
                        borderColor: '#226905',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Tarifas totales: Octubre',
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    var label = datos10[context.dataIndex].codigo + ' ' + datos10[
                                        context.dataIndex].descripcion;
                                    label += ' : ' + context.formattedValue + ' ' + 'KWh';
                                    return label;
                                }
                            }
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
            const ct11 = document.querySelector('#can11').getContext('2d');
            const datos11 = {!! json_encode($noviembre) !!};

            const barChart = new Chart(ct11, {
                type: 'bar',
                data: {
                    labels: datos11.map(item => item.codigo),
                    datasets: [{
                        label: 'KWh',
                        data: datos11.map(item => item.monto),
                        backgroundColor: '#12B554',
                        borderColor: '#226905',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Tarifas totales: Noviembre',
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    var label = datos11[context.dataIndex].codigo + ' ' + datos11[
                                        context.dataIndex].descripcion;
                                    label += ' : ' + context.formattedValue + ' ' + 'KWh';
                                    return label;
                                }
                            }
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
            const ct12 = document.querySelector('#can12').getContext('2d');
            const datos12 = {!! json_encode($diciembre) !!};

            const barChart = new Chart(ct12, {
                type: 'bar',
                data: {
                    labels: datos12.map(item => item.codigo),
                    datasets: [{
                        label: 'KWh',
                        data: datos12.map(item => item.monto),
                        backgroundColor: '#12B554',
                        borderColor: '#226905',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Tarifas totales: Diciembre',
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    var label = datos12[context.dataIndex].codigo + ' ' + datos12[
                                        context.dataIndex].descripcion;
                                    label += ' : ' + context.formattedValue + ' ' + 'KWh';
                                    return label;
                                }
                            }
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
