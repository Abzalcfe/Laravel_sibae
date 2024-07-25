@extends('adminlte::page')

@section('title', 'SIBAE')

@section('content_header')
    <h6>SIBAE: Sistema de Gestión de Balance de Energía</h6>
    <h1>Control de subestaciones</h1>
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

        if (session()->has('message2') && session('message2') == 'ok2') {
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

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="panel1-tab" data-toggle="tab" href="#panel1" role="tab" aria-controls="panel1"
                aria-selected="true">Diagrama unifilar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="panel2-tab" data-toggle="tab" href="#panel2" role="tab" aria-controls="panel2"
                aria-selected="false">Registro de energia</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="panel1" role="tabpanel" aria-labelledby="panel1-tab">
            <h1>No found</h1>
        </div>

        <div class="tab-pane fade" id="panel2" role="tabpanel" aria-labelledby="panel2-tab">
            <x-adminlte-card title="Consumos mensuales de energía" theme="primary" icon="fa fa-bolt" collapsible maximizable>
                <div class="card shadow-lg">
                    <div class="card-body">                      
                            
                            <table id="table5" class="display">
                                <thead style="color: white; background-color: #2C2C2C; width: auto; height: 60px;">
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha</th>
                                        <th>Circuito</th>
                                        <th>Energía</th>
                                        @if ($usuarioActivo->privilegios == 1)
                                            <th>Opciones</th>
                                        @endif
                                    </tr>
                                </thead>
                                @php
                                echo $fechas_consumo;
                                @endphp
                                <tbody>
                                    @foreach ($fechas_consumo as $fcmo)
                                        <tr>
                                            <td>{{ $fcmo->ID }}</td>
                                            <td>{{ $fcmo->Fecha }}</td>
                                            <td>{{ $fcmo->Circuito }}</td>
                                            <td>{{ $fcmo->Energia  }}</td>
                                            <td>{{ number_format($fcmo->Energia, 8, '.', ',') }} KWh</td>
                                            @if ($usuarioActivo->privilegios == 1)
                                                <td>
                                                    <div style="display: flex; align-items: center;">
                                                        <a href="#"
                                                            class="btn btn-xs btn-default text-primary mx-1 shadow editar1"
                                                            title="Edit" data-toggle="modal"
                                                            data-target="#editar1_{{ $fcmo->ID }}"
                                                            data-fcmo-id="{{ $fcmo->ID }}">
                                                            <i class="fa fa-lg fa-fw fa-pen"></i>
                                                        </a>
                                                        <form style="display: inline" method="post" class="formEliminar1"
                                                            action="{{ route('subestaciones.destroy1', $fcmo->ID) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-xs btn-default text-primary mx-1 shadow"
                                                                title="Delete">
                                                                <i class="fa fa-lg fa-fw fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                                @foreach ($fechas_consumo as $fcmo)
                                    <x-adminlte-modal id="editar1_{{ $fcmo->ID }}" title="EDITAR: Consumo mensual"
                                        size="md" theme="primary" icon="fa fa-bolt" v-centered static-backdrop
                                        scrollable>
                                        <div style="height:400px;">
                                            <div class="modal-body">
                                                <form id="frmActualizar1_{{ $fcmo->ID }}"
                                                    action="{{ route('subestaciones.update1', $fcmo->ID) }}" method="get">
                                                    @csrf

                                                    <x-adminlte-input type="text" name="ID" id="id"
                                                        label="ID" label-class="text-primary"
                                                        value="{{ $fcmo->ID }}" readonly>
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-circle text-primary"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>

                                                    <x-adminlte-input type="text" name="Fecha" id="fecha"
                                                        label="Fecha" label-class="text-primary"
                                                        value="{{ $fcmo->Fecha }}" readonly>
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-circle text-primary"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>

                                                    <x-adminlte-input type="text" name="Circuito" id="circuito"
                                                        label="Circuito" label-class="text-primary"
                                                        value="{{ $fcmo->Circuito }}" readonly>
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-circle text-primary"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>

                                                    <x-adminlte-input type="number" name="consumo"
                                                        id="consumo" label="Consumo recibido (KWh)"
                                                        label-class="text-primary" value="{{ $fcmo->Energia }}"
                                                        step="any">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-circle text-primary"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>

                                                    <x-slot name="footerSlot">
                                                        <x-adminlte-button theme="primary" label="Actualizar"
                                                            class="actualizarBtn1" data-fzr-id="{{ $fcmo->ID }}" />
                                                        <x-adminlte-button theme="danger" label="Cancelar"
                                                            data-dismiss="modal" id="cancelar" type="button" />
                                                    </x-slot>
                                                </form>
                                            </div>
                                        </div>
                                    </x-adminlte-modal>
                                @endforeach
                            </table>
                    </div>
                </div>
            </x-adminlte-card>
        </div>

    </div>

@stop

@section('css')
@stop

@section('js')
<script>
        $(document).ready(function() {
            $('.editar1').click(function(e) {
                e.preventDefault();
                var consumoR = $(this).data('fcmo-id');
                $('#editar1_' + consumoR).modal('show');
                console.log(consumoR);
            });
            $('.actualizarBtn1').click(function(e) {
                e.preventDefault();
                var consumoR = $(this).data('fcmo-id');
                $('#frmActualizar1_' + consumoR).submit();
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
    </script>
@stop