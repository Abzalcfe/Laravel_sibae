@extends('adminlte::page')

@section('title', 'SIBAE')

@section('content_header')
    <div class="row">
        @if ($usuarioActivo->privilegios == 1)
            <div class="col-md-6">
                <h6>SIBAE: Sistema de Gestión de Balance de Energía</h6>
                <h1>Administración y Configuración del Sistema</h1>
            </div>
        @endif
        @if ($usuarioActivo->privilegios == 1)
            <div class="col-md-6" style="text-align: right;">
                <x-adminlte-button label="Nuevo año" data-toggle="modal" data-target="#nuevo" class="bg-primary text-white"
                    style="margin-right: 10px;" />
                <br>
                <br>
                <br>
                <a href="{{ route('control.gestion') }}">
                    <button type="button" class="btn btn-secondary custom-btn">Gestión total <i
                            class="fa fa-arrow-circle-right"></i></button>
                </a>
                <a href="{{ route('usuarios.create') }}">
                    <button type="button" class="btn btn-secondary custom-btn">Usuarios <i
                            class="fa fa-arrow-circle-right"></i></button>
                </a>
            </div>
        @endif
    </div>
    <x-adminlte-modal id="nuevo" title="Nuevo año" size="md" theme="primary" icon="fa fa-circle" v-centered
        static-backdrop scrollable>
        <div style="height:200px;">
            <div class="modal-body">
                <form id="frmRegistro" action="{{ route('control.nuevoyear') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <p>El último año registrado en la base de datos corresponde a {{ $ultimoYear->year }}</p>
                    <p>El año inmediato siguiente es:</p>
                    <center>
                        <input type="text" name="ultimoyear" id="" value="{{ $ultimoYear->year + 1 }}" readonly>
                    </center>
                    <br>
                    <p>¿Desea crear un nuevo registro?</p>
                    <x-slot name="footerSlot">
                        <x-adminlte-button theme="primary" label="Confirmar" id="guardarBtn" type="button"
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
    @endphp
    <div class="card shadow-lg">
        <div class="card-body">
            <BR></BR>
            <ul>
                <li>
                    <b>Usuario:</b> {{ $usuarioActivo->name }} <br>
                </li>
                <li>
                    <b>Correo electrónico:</b> {{ $usuarioActivo->email }} <br>
                </li>
                <li>
                    <b>Área:</b> {{ $usuarioActivo->area }} <br>
                </li>
            </ul>
            <BR></BR>
            @if ($usuarioActivo->privilegios == 1)
                @php
                    $btnGestion1 = '<button>Gestión</button>';
                    $btnGestion2 = '<button>Gestión</button>';
                    $btnGestion3 = '<button>Gestión</button>';
                    $btnGestion4 = '<button>Gestión</button>';
                    $btnGestion5 = '<button>Gestión</button>';
                    $btnGestion6 = '<button>Gestión</button>';
                @endphp
                <table id="table4" class="display">
                    <thead style="color: white; background-color: #2C2C2C; width: auto; height: 60px;">
                        <tr>
                            <th rowspan="3">AÑO</th>
                            <th rowspan="3">Ventas</th>
                            <th colspan="2">Alta tensión</th>
                            <th colspan="3">Media tensión</th>
                            <!-- <th rowspan="3">Acceso administrador</th> -->
                        </tr>
                        <tr>
                            <th rowspan="2">Energías recibidas</th>
                            <th rowspan="2">Energías entregadas</th>
                            <th colspan="2">Energías recibidas</th>
                            <th rowspan="2">Energías entregadas</th>
                        </tr>
                        <tr>
                            <th>Subestaciones</th>
                            <th>Puntos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($years as $year)
                            <tr>
                                <td>20{{ $year->id }}</td>
                                <td><a href="{{ route('control.ventas', $year->id) }}">{!! $btnGestion1 !!}</a></td>
                                <td><a href="{{ route('control.era', $year->id) }}">{!! $btnGestion2 !!}</a></td>
                                <td><a href="{{ route('control.eea', $year->id) }}">{!! $btnGestion3 !!}</a></td>
                                <td><a href="{{ route('control.erms', $year->id) }}">{!! $btnGestion4 !!}</a></td>
                                <td><a href="{{ route('control.ermp', $year->id) }}">{!! $btnGestion5 !!}</a></td>
                                <td><a href="{{ route('control.eem', $year->id) }}">{!! $btnGestion6 !!}</a></td>
                                <!--  <td> {//!! $btnAcceder !!} </td> -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            @if ($usuarioActivo->privilegios == 2)
                <BR></BR>
                <div class="row">
                    <div class="col-md-6">
                        <h1>SIBAE</h1>
                        <h2>Sistema de Gestión de Balance de Energía</h2>
                        <p>Acceso: Usuario sin privilegios administrativos</p>
                        <p>Permisos admitidos:</p>
                        <ul>
                            <li>
                                <p>Descarga de reportes</p>
                            </li>
                            <li>
                                <p>Lectura de información</p>
                            </li>
                            <li>
                                <p>Consulta de datos</p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-5" style="text-align: right;">
                        <div class="container">
                            <img src="{{ asset('vendor/adminlte/dist/img/AdminLTELogo.png') }}" class="responsive-img main-img">
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop

@section('js')
    <script>
        document.getElementById('guardarBtn').addEventListener('click', function() {
            document.getElementById('frmRegistro').submit();
        });
    </script>
    <script>
        $(document).ready(function() {
            var config1 = {
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                },
                lengthMenu: [
                    [6, 25, 50, -1],
                    [6, 25, 50, 'All']
                ],
                pageLength: 6,
                responsive: true,
                autoWidth: false,
            };
            $('#table4').DataTable(config1);
        });
    </script>
@stop

@section('css')
    <style>
        .container {
            text-align: center;
            padding: 20px;
        }

        .responsive-img {
            max-width: 100%;
            height: auto;
        }

        .logo {
            width: 100px;
        }

        .main-img {
            width: 310px;
        }
    </style>
    <style>
        .custom-btn:hover {
            background-color: #046e45;
            border-color: #095e3b;
        }
    </style>

    <style>
        #table4 {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid white;
            overflow-x: auto;
        }

        #table4 th,
        #table4 td {
            text-align: left;
            padding: 8px;
            border: 1px solid white;
        }

        #table4 thead {
            border: 1px solid white;
        }

        @media only screen and (max-width: 600px) {

            #table4 th,
            #table4 td {
                width: auto;
                display: block;
                white-space: nowrap;
            }

            #table4 th:nth-of-type(1),
            #table4 td:nth-of-type(1) {
                display: none;
            }
        }
    </style>
@stop
