@extends('adminlte::page')

@section('title', 'SIBAE')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h6>SIBAE: Sistema de Gestión de Balance de Energía</h6>
            <h1>Administración y Configuración del Sistema</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('control.control') }} ">
                <button type="button" class="btn btn-primary custom-btn"><i class="fa fa-arrow-circle-left"></i>
                    Control</button>
            </a>
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
    @endphp
    @php
        echo '<h1>Administración de usuarios</h1>';
    @endphp
    <x-adminlte-button label="Nuevo usuario" data-toggle="modal" data-target="#nuevo" class="bg-primary text-white" />
    <BR></BR>
    <div class="card shadow-lg">
        <div class="card-body">
            @php
                $heads = [
                    'Nombre',
                    'Correo electrónico',
                    'Departamento',
                    'Permisos',
                    ['label' => 'Opciones', 'no-export' => true, 'width' => 15],
                ];
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
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->name }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->area }}</td>
                        <td>
                            @php
                                if ($cliente->privilegios == 1) {
                                    echo 'Administrador';
                                } else {
                                    echo 'Usuario';
                                }
                            @endphp
                        <td>
                            <a href="#" class="btn btn-xs btn-default text-primary mx-1 shadow editar" title="Edit"
                                data-cliente-id="{{ $cliente->id }}">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            <form style="display: inline" action="{{ route('usuarios.destroy', $cliente) }}" method="post"
                                class="formEliminar">
                                @csrf
                                @method('delete')
                                {!! $btnDelete !!}
                            </form>
                        </td>
                    </tr>
                @endforeach
                @foreach ($clientes as $cliente)
                    <x-adminlte-modal id="editar_{{ $cliente->id }}" title="Editar usuario" size="md" theme="primary"
                        icon="fas fa-user" v-centered static-backdrop scrollable>
                        <div style="height:400px;">
                            <div class="modal-body">
                                <form id="frmActualizar_{{ $cliente->id }}"
                                    action="{{ route('usuarios.update', $cliente) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <x-adminlte-input type="text" name="Nombre" id="nombre" label="Nombre"
                                        label-class="text-primary" value="{{ $cliente->name }}">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-user text-primary"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>

                                    <x-adminlte-input type="email" name="Correo" id="correo"
                                        label="Correo electrónico" label-class="text-primary"
                                        value="{{ $cliente->email }}">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-envelope text-primary"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                    <x-adminlte-select-bs id="area" name="Área" label="Área"
                                        label-class="text-primary">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-tag text-primary"></i>
                                            </div>
                                        </x-slot>
                                        <option value="{{ $cliente->area }}">{{ $cliente->area }}</option>
                                        <option value="">Seleccione el departamento</option>
                                        <option value="Medición">Medición</option>
                                        <option value="Planeacón">Planeacón</option>
                                        <option value="Construcción">Construcción</option>
                                    </x-adminlte-select-bs>
                                    <x-adminlte-select-bs id="permisos" name="Permisos" label="Privilegios"
                                        label-class="text-primary">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-users text-primary"></i>
                                            </div>
                                        </x-slot>
                                        <option value="{{ $cliente->privilegios }}">
                                            @php
                                                if ($cliente->privilegios == 1) {
                                                    echo 'Administrador';
                                                } else {
                                                    echo 'Usuario';
                                                }
                                            @endphp</option>
                                        <option value="">Seleccione los permisos</option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Usuario</option>
                                    </x-adminlte-select-bs>
                                    <x-slot name="footerSlot">
                                        <x-adminlte-button theme="primary" label="Actualizar" class="actualizarBtn"
                                            data-cliente-id="{{ $cliente->id }}" />
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



    <x-adminlte-modal id="nuevo" title="Nuevo usuario" size="md" theme="primary" icon="fas fa-user" v-centered
        static-backdrop scrollable>
        <div style="height:400px;">
            <div class="modal-body">
                <form id="frmRegistro" action="{{ route('usuarios.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <x-adminlte-input type="text" name="nombre" id="nombre" label="Nombre"
                        placeholder="Nombre del usuario" label-class="text-primary" value="{{ old('nombre') }}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-user text-primary"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    <x-adminlte-input type="email" name="correo" id="correo" label="Correo electrónico"
                        placeholder="Correo electrónico del usuario" label-class="text-primary"
                        value="{{ old('correo') }}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-envelope text-primary"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                    <x-adminlte-select-bs id="area" name="área" label="Área" label-class="text-primary"
                        value="{{ old('optionsArea') }}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-tag text-primary"></i>
                            </div>
                        </x-slot>
                        <option value="">Seleccione el área</option>
                        <option value="Medición">Medición</option>
                        <option value="Planeacón">Planeacón</option>
                        <option value="Construcción">Construcción</option>
                    </x-adminlte-select-bs>
                    <x-adminlte-select-bs id="permisos" name="permisos" label="Privilegios" label-class="text-primary"
                        value="{{ old('optionsPermisos') }}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-users text-primary"></i>
                            </div>
                        </x-slot>
                        <option value="">Seleccione los permisos</option>
                        <option value="1">Administrador</option>
                        <option value="2">Usuario</option>
                    </x-adminlte-select-bs>
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
        $(document).ready(function() {
            $('.editar').click(function(e) {
                e.preventDefault();
                var clienteId = $(this).data('cliente-id');
                $('#editar_' + clienteId).modal('show');
            });


            $('.actualizarBtn').click(function(e) {
                e.preventDefault();
                var clienteId = $(this).data('cliente-id');
                $('#frmActualizar_' + clienteId).submit();
            });
        });
    </script>


    <script>
        document.getElementById('guardarBtn').addEventListener('click', function() {
            document.getElementById('frmRegistro').submit();
        });
        document.getElementById('actualizarBtn').addEventListener('click', function() {
            document.getElementById('frmActualizar').submit();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.formEliminar').submit(function(e) {
                e.preventDefault();
                var form = this;
                Swal.fire({
                    text: "¿Desea eliminar el usuario?",
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
