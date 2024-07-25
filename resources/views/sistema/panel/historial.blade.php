@extends('adminlte::page')

@section('title', 'SIBAE')

@section('content_header')
    <h6>SIBAE: Sistema de Gestión de Balance de Energía</h6>
    <h1>Registros históricos</h1>
@stop

@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="panel1-tab" data-toggle="tab" href="#panel1" role="tab" aria-controls="panel1"
                aria-selected="true">Datos anuales</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="panel2-tab" data-toggle="tab" href="#panel2" role="tab" aria-controls="panel2"
                aria-selected="false">Gráficos anuales</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="panel3-tab" data-toggle="tab" href="#panel3" role="tab" aria-controls="panel3"
                aria-selected="false">Gráficos totales</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="panel1" role="tabpanel" aria-labelledby="panel1-tab">
            <div class="card shadow-lg">
                <div class="card-body">
                    @php
                        $heads = [
                            ['no-export' => true, 'width' => 1],
                            'AÑO',
                            'Energía anual recibida',
                            'Energía anual entregada',
                            'Energía anual perdida',
                            'Energía porcentual perdida',
                        ];
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
                                    'title' => 'Reporte Anual',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'csv',
                                    'title' => 'Reporte Anual',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'excel',
                                    'title' => 'Reporte Anual',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'pdf',
                                    'title' => 'Reporte Anual',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'print',
                                    'title' => 'Reporte Anual',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                            ],
                        ];
                    @endphp
                    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config">
                        @foreach ($historico as $his)
                            <tr>
                                <td></td>
                                <td>20{{ $his->id_year }}</td>
                                <td>{{ number_format($his->energia_anual_recibida, 12, '.', ',') }} KWh</td>
                                <td>{{ number_format($his->energia_anual_entregada, 12, '.', ',') }} KWh</td>
                                <td>{{ number_format($his->energia_anual_perdida, 12, '.', ',') }} KWh</td>
                                <td>{{ $his->porcentaje }} % </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="panel2" role="tabpanel" aria-labelledby="panel2-tab">
            <center>
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="canvas-container">
                            @foreach ($historico as $index => $his2)
                                <canvas id="grafic{{ $index }}" width="270" height="250"></canvas>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        var chrt{{ $index }} = document.getElementById('grafic{{ $index }}').getContext('2d');
                                        var chart{{ $index }} = new Chart(chrt{{ $index }}, {
                                            type: 'doughnut',
                                            data: {
                                                labels: ['Energía recibida', 'Energía entregada', 'Energía perdida'],
                                                datasets: [{
                                                    label: 'KWh',
                                                    data: [
                                                        {{ $his2->energia_anual_recibida }},
                                                        {{ $his2->energia_anual_entregada }},
                                                        {{ $his2->energia_anual_perdida }}
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
                                                        text: 'Energía anual 20{{ $his2->id_year }}'
                                                    }
                                                }
                                            },
                                        });
                                    });
                                </script>
                            @endforeach
                        </div>
                    </div>
                </div>
            </center>
        </div>

        <div class="tab-pane fade" id="panel3" role="tabpanel" aria-labelledby="panel3-tab">

            <div class="card shadow-lg">
                <div class="card-body">
                    <canvas id="grafica1">
                    </canvas>
                </div>
            </div>

            <div class="card shadow-lg">
                <div class="card-body">
                    <canvas id="grafica2">
                    </canvas>
                </div>
            </div>

            <div class="card shadow-lg">
                <div class="card-body">
                    <canvas id="grafica3">
                    </canvas>
                </div>
            </div>

            @php
                $e_perdida = $historico;
            @endphp
        </div>

    </div>

@stop

@section('css')
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
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx1 = document.querySelector('#grafica1').getContext('2d');
            const labels1 = {!! json_encode(
                $e_perdida->pluck('id_year')->map(function ($year) {
                    return '20' . (int) $year;
                }),
            ) !!};
            const data1 = {!! json_encode($e_perdida->pluck('energia_anual_perdida')) !!};
            const barChartHorizontal = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: labels1,
                    datasets: [{
                        label: 'KWh',
                        data: data1,
                        backgroundColor: '#F51010',
                        borderColor: '#F51010',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Energía anual perdida',
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
            const labels2 = {!! json_encode(
                $e_perdida->pluck('id_year')->map(function ($year) {
                    return '20' . (int) $year;
                }),
            ) !!};
            const data2 = {!! json_encode($e_perdida->pluck('energia_anual_recibida')) !!};
            const data3 = {!! json_encode($e_perdida->pluck('energia_anual_entregada')) !!};
            const data4 = {!! json_encode($e_perdida->pluck('energia_anual_perdida')) !!};
            const barChartHorizontal = new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: labels2,
                    datasets: [{
                            label: 'Energía anual recibida (KWh)',
                            data: data2,
                            backgroundColor: '#0C4009',
                            borderColor: '#0C4009',
                            borderWidth: 3
                        },
                        {
                            label: 'Energía anual entregada (KWh)',
                            data: data3,
                            backgroundColor: '#5AB354',
                            borderColor: '#5AB354',
                            borderWidth: 3
                        },
                        {
                            label: 'Energía anual perdida (KWh)',
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
                            text: 'Balance histórico de energía anual',
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
            const labelsA = {!! json_encode(
                $e_perdida->pluck('id_year')->map(function ($year) {
                    return '20' . (int) $year;
                }),
            ) !!};
            const dataA = {!! json_encode($e_perdida->pluck('energia_anual_recibida')) !!};
            const dataB = {!! json_encode($e_perdida->pluck('energia_anual_entregada')) !!};
            const dataC = {!! json_encode($e_perdida->pluck('energia_anual_perdida')) !!};
            const barChartHorizontal = new Chart(ctxA, {
                type: 'bar',
                data: {
                    labels: labelsA,
                    datasets: [{
                            label: 'Energía anual recibida (KWh)',
                            data: dataA,
                            backgroundColor: '#0C4009',
                            borderColor: '#0C4009',
                            borderWidth: 1
                        },
                        {
                            label: 'Energía anual entregada (KWh)',
                            data: dataB,
                            backgroundColor: '#5AB354',
                            borderColor: '#5AB354',
                            borderWidth: 1
                        },
                        {
                            label: 'Energía anual perdida (KWh)',
                            data: dataC,
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
                            text: 'Balance histórico de energía anual',
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
@stop
