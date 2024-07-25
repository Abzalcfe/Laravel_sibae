@extends('adminlte::page')

@section('title', 'SIBAE')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h6>SIBAE: Sistema de Gestión de Balance de Energía</h6>
            <h1>Media tensión</h1>
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
    <br>
    <form id="yearForm" method="GET" action="{{ route('balance_media.create') }}">
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
        echo "<h1>Balance energético anual de media tensión: 20$year</h1>";
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
            <a class="nav-link" id="panel5-tab" data-toggle="tab" href="#panel5" role="tab" aria-controls="panel5"
                aria-selected="false">Pérdidas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="panel3-tab" data-toggle="tab" href="#panel3" role="tab" aria-controls="panel3"
                aria-selected="false">Balance</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="panel4-tab" data-toggle="tab" href="#panel4" role="tab" aria-controls="panel4"
                aria-selected="false">Gráficos totales</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="panel6-tab" data-toggle="tab" href="#panel6" role="tab" aria-controls="panel6"
                aria-selected="false">Año móvil</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="panel1" role="tabpanel" aria-labelledby="panel1-tab">

            <x-adminlte-card title="Energía de subestaciones" theme="primary" icon="fa fa-bolt" collapsible maximizable>
                <div class="card shadow-lg">
                    <div class="card-body">
                        @if ($usuarioActivo->privilegios == 1)
                            <div class="col-md-13" style="text-align: right;">
                                <x-adminlte-button label="Nuevo registro" data-toggle="modal" data-target="#nuevo"
                                    class="bg-primary text-white" />
                            </div>
                        @endif
                        <x-adminlte-modal id="nuevo" title="MEDIA TENSIÓN: Energías recibidas (Subestaciones)"
                            size="md" theme="primary" icon="fa fa-bolt" v-centered static-backdrop scrollable>
                            <div style="height:400px;">
                                <div class="modal-body">
                                    <form id="frmRegistro1" action="{{ route('balance_media.guardar1') }}" method="get">
                                        @csrf

                                        <input type="hidden" name="id" id="id">
                                        <input type="hidden" name="year" id="year" value="{{ $year }}">

                                        <x-adminlte-select-bs id="cipe" name="cipe" label="CIPE"
                                            label-class="text-primary">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-circle text-primary"></i>
                                                </div>
                                            </x-slot>
                                            <option value="">Seleccione el cipe</option>
                                            @foreach ($er1mt as $e1)
                                                <option value="{{ $e1->id_cipe }}">{{ $e1->cipe }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>

                                        <x-adminlte-select-bs id="sub" name="Subestación" label="Subestación"
                                            label-class="text-primary">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-circle text-primary"></i>
                                                </div>
                                            </x-slot>
                                            <option value="">Seleccione la subestación</option>
                                            @foreach ($subestaciones as $sub)
                                                <option value="{{ $sub->id }}">{{ $sub->nombre }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>

                                        <x-adminlte-select-bs id="punto" name="punto" label="Punto"
                                            label-class="text-primary">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-circle text-primary"></i>
                                                </div>
                                            </x-slot>
                                            <option value="">Seleccione el punto</option>
                                            @foreach ($er1mt as $e1)
                                                <option value="{{ $e1->id_punto }}">{{ $e1->punto }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>

                                        <x-adminlte-select-bs id="medidor" name="medidor" label="Medidor"
                                            label-class="text-primary">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-circle text-primary"></i>
                                                </div>
                                            </x-slot>
                                            <option value="">Seleccione el medidor</option>
                                            @foreach ($er1mt as $e1)
                                                <option value="{{ $e1->id_medidor }}">{{ $e1->medidor }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>

                                        <x-adminlte-select-bs id="rtc" name="rtc" label="RTC"
                                            label-class="text-primary">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-circle text-primary"></i>
                                                </div>
                                            </x-slot>
                                            <option value="">RTC</option>
                                            @foreach ($rtc as $tc)
                                                <option value="{{ $tc->id }}">{{ $tc->rtc }}
                                                    {{ $tc->marca }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>

                                        <x-adminlte-select-bs id="rtp" name="rtp" label="RTP"
                                            label-class="text-primary">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-circle text-primary"></i>
                                                </div>
                                            </x-slot>
                                            <option value="">RTP</option>
                                            @foreach ($rtp as $tp)
                                                <option value="{{ $tp->id }}">{{ $tp->rtp }}
                                                    {{ $tp->marca }}</option>
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

                                        <x-adminlte-input type="number" name="energía_recibida" id="energía_recibida1"
                                            label="Energía recibida (KWh)" label-class="text-primary" step="any">
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

                        <div class="table-responsive">
                            <table id="table4" class="display">
                                <thead style="color: white; background-color: #2C2C2C; width: auto; height: 60px;">
                                    <tr>
                                        <th>CIPE </th>
                                        <th>Subestación</th>
                                        <th>Punto</th>
                                        <th>Medidor</th>
                                        <th>RTC</th>
                                        <th>RTP</th>
                                        <th>Fecha</th>
                                        <th>Energía recibida</th>
                                        @if ($usuarioActivo->privilegios == 1)
                                            <th>Opciones</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($energiaData as $ermts)
                                        <tr>
                                            <td>{{ $ermts->cipe }}</td>
                                            <td>{{ $ermts->subestacion }}</td>
                                            <td>{{ $ermts->punto }}</td>
                                            <td>{{ $ermts->medidor }}</td>
                                            <td>{{ $ermts->rtc }}</td>
                                            <td>{{ $ermts->rtp }}</td>
                                            <td>{{ $ermts->fecha }}</td>
                                            <td>{{ number_format($ermts->energias, 8, '.', ',') }} KWh</td>
                                            @if ($usuarioActivo->privilegios == 1)
                                                <td>
                                                    <div style="display: flex; align-items: center;">
                                                        <a href="#"
                                                            class="btn btn-xs btn-default text-primary mx-1 shadow editar3"
                                                            title="Edit" data-toggle="modal"
                                                            data-target="#editar3_{{ $ermts->ID }}"
                                                            data-ermts-id="{{ $ermts->ID }}">
                                                            <i class="fa fa-lg fa-fw fa-pen"></i>
                                                        </a>
                                                        <form style="display: inline" method="post"
                                                            class="formEliminar2"
                                                            action="{{ route('balance_media.destroy1', $ermts->ID) }}">
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
                                @foreach ($energiaData as $ermts)
                                    <x-adminlte-modal id="editar3_{{ $ermts->ID }}" title="EDITAR: Energía recibida"
                                        size="md" theme="primary" icon="fa fa-bolt" v-centered static-backdrop
                                        scrollable>
                                        <div style="height:400px;">
                                            <div class="modal-body">
                                                <form id="frmActualizar3_{{ $ermts->ID }}"
                                                    action="{{ route('balance_media.update1', $ermts->ID) }}"
                                                    method="get">
                                                    @csrf
                                                    <x-adminlte-input type="text" name="Codigo" id="codigo"
                                                        label="CIPE" label-class="text-primary"
                                                        value="{{ $ermts->cipe }}" readonly>
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-circle text-primary"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>

                                                    <x-adminlte-input type="text" name="Sub" id="sub"
                                                        label="Subestación" label-class="text-primary"
                                                        value="{{ $ermts->subestacion }}" readonly>
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-circle text-primary"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>

                                                    <x-adminlte-input type="text" name="Mes" id="mes"
                                                        label="Mes" label-class="text-primary"
                                                        value="{{ $ermts->fecha }}" readonly>
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-circle text-primary"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>

                                                    <x-adminlte-input type="number" name="energía_recibida"
                                                        id="energia_r" label="Energía recibida (KWh)"
                                                        label-class="text-primary" value="{{ $ermts->energias }}"
                                                        step="any">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-circle text-primary"></i>
                                                            </div>
                                                        </x-slot>
                                                    </x-adminlte-input>
                                                    <x-slot name="footerSlot">
                                                        <x-adminlte-button theme="primary" label="Actualizar"
                                                            class="actualizarBtn3" data-ermts-id="{{ $ermts->ID }}" />
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
                </div>
            </x-adminlte-card>




            <x-adminlte-card title="Energía recibida de puntos" theme="primary" icon="fa fa-bolt" collapsible
                maximizable>
                <div class="card shadow-lg">
                    <div class="card-body">
                        @if ($usuarioActivo->privilegios == 1)
                            <div class="col-md-13" style="text-align: right;">
                                <x-adminlte-button label="Nuevo registro" data-toggle="modal" data-target="#nuevo2"
                                    class="bg-primary text-white" />
                            </div>
                        @endif
                        <x-adminlte-modal id="nuevo2" title="MEDIA TENSIÓN: Energías recibidas (Puntos)"
                            size="md" theme="primary" icon="fa fa-bolt" v-centered static-backdrop scrollable>
                            <div style="height:285px;">
                                <div class="modal-body">
                                    <form id="frmRegistro2" action="{{ route('balance_media.guardar2') }}"
                                        method="get">
                                        @csrf

                                        <input type="hidden" name="id" id="id">
                                        <input type="hidden" name="year" id="year"
                                            value="{{ $year }}">

                                        <x-adminlte-select-bs id="punto" name="punto" label="Punto"
                                            label-class="text-primary">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-circle text-primary"></i>
                                                </div>
                                            </x-slot>
                                            <option value="">Seleccione el punto</option>
                                            @foreach ($er2mt as $e2)
                                                <option value="{{ $e2->id }}">{{ $e2->nombre }}</option>
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

                                        <x-adminlte-input type="number" name="energía_recibida" id="energía_recibida2"
                                            label="Energía recibida (KWh)" label-class="text-primary" step="any">
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

                        <table id="table5" class="display">
                            <thead style="color: white; background-color: #2C2C2C; width: auto; height: 60px;">
                                <tr>
                                    <th>CIPE</th>
                                    <th>Subestación</th>
                                    <th>Fecha</th>
                                    <th>Energía recibida</th>
                                    @if ($usuarioActivo->privilegios == 1)
                                        <th>Opciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fechas_zr as $fzr)
                                    <tr>
                                        <td>{{ $fzr->Código }}</td>
                                        <td>{{ $fzr->Fuente }}</td>
                                        <td>{{ $fzr->Fecha }}</td>
                                        <td>{{ number_format($fzr->Energia, 8, '.', ',') }} KWh</td>
                                        @if ($usuarioActivo->privilegios == 1)
                                            <td>
                                                <div style="display: flex; align-items: center;">
                                                    <a href="#"
                                                        class="btn btn-xs btn-default text-primary mx-1 shadow editar4"
                                                        title="Edit" data-toggle="modal"
                                                        data-target="#editar4_{{ $fzr->ID }}"
                                                        data-fzr-id="{{ $fzr->ID }}">
                                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                                    </a>
                                                    <form style="display: inline" method="post" class="formEliminar3"
                                                        action="{{ route('balance_media.destroy2', $fzr->ID) }}">
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
                            @foreach ($fechas_zr as $fzr)
                                <x-adminlte-modal id="editar4_{{ $fzr->ID }}" title="EDITAR: Energía recibida"
                                    size="md" theme="primary" icon="fa fa-bolt" v-centered static-backdrop
                                    scrollable>
                                    <div style="height:400px;">
                                        <div class="modal-body">
                                            <form id="frmActualizar4_{{ $fzr->ID }}"
                                                action="{{ route('balance_media.update2', $fzr->ID) }}" method="get">
                                                @csrf

                                                <x-adminlte-input type="text" name="Codigo" id="codigo"
                                                    label="Código" label-class="text-primary"
                                                    value="{{ $fzr->Código }}" readonly>
                                                    <x-slot name="prependSlot">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-circle text-primary"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input>

                                                <x-adminlte-input type="text" name="Sub" id="sub"
                                                    label="Punto" label-class="text-primary"
                                                    value="{{ $fzr->Fuente }}" readonly>
                                                    <x-slot name="prependSlot">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-circle text-primary"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input>

                                                <x-adminlte-input type="text" name="Fecha" id="fecha"
                                                    label="Fecha" label-class="text-primary"
                                                    value="{{ $fzr->Fecha }}" readonly>
                                                    <x-slot name="prependSlot">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-circle text-primary"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input>

                                                <x-adminlte-input type="number" name="energía_recibida"
                                                    id="energía_recibida2" label="Energía recibida (KWh)"
                                                    label-class="text-primary" value="{{ $fzr->Energia }}"
                                                    step="any">
                                                    <x-slot name="prependSlot">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-circle text-primary"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input>

                                                <x-slot name="footerSlot">
                                                    <x-adminlte-button theme="primary" label="Actualizar"
                                                        class="actualizarBtn4" data-fzr-id="{{ $fzr->ID }}" />
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



        
        <div class="tab-pane fade" id="panel2" role="tabpanel" aria-labelledby="panel2-tab">
            <div class="card shadow-lg">
                <div class="card-body">
                    @if ($usuarioActivo->privilegios == 1)
                        <div class="col-md-13" style="text-align: right;">
                            <x-adminlte-button label="Nuevo registro" data-toggle="modal" data-target="#nuevo3"
                                class="bg-primary text-white" />
                        </div>
                    @endif
                    <x-adminlte-modal id="nuevo3" title="MEDIA TENSIÓN: Energías entregadas" size="md"
                        theme="primary" icon="fa fa-bolt" v-centered static-backdrop scrollable>
                        <div style="height:285px;">
                            <div class="modal-body">
                                <form id="frmRegistro3" action="{{ route('balance_media.guardar3') }}" method="get">
                                    @csrf

                                    <input type="hidden" name="id" id="id">
                                    <input type="hidden" name="year" id="year" value="{{ $year }}">

                                    <x-adminlte-select-bs id="punto" name="punto" label="Punto"
                                        label-class="text-primary">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-circle text-primary"></i>
                                            </div>
                                        </x-slot>
                                        <option value="">Seleccione el punto</option>
                                        @foreach ($eemt as $em)
                                            <option value="{{ $em->id }}">{{ $em->nombre }}</option>
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

                                    <x-adminlte-input type="number" name="energía_entregada" id="energía_entregada"
                                        label="Energía entregada (KWh)" label-class="text-primary" step="any">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-circle text-primary"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>

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
                    @php
                        if ($usuarioActivo->privilegios == 1) {
                            $heads = [
                                'Código',
                                'Fuente',
                                'Fecha',
                                'Energía mensual entregada',
                                ['label' => 'Opciones', 'no-export' => true, 'width' => 15],
                            ];
                        } else {
                            $heads = [
                                'Código',
                                'Fuente',
                                'Fecha',
                                'Energía mensual entregada',
                                ['no-export' => true, 'width' => 1],
                            ];
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
                                    'title' => 'Reporte de Energías Entregadas: MEDIA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:last-child)'],
                                ],
                                [
                                    'extend' => 'csv',
                                    'title' => 'Reporte de Energías Entregadas: MEDIA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:last-child)'],
                                ],
                                [
                                    'extend' => 'excel',
                                    'title' => 'Reporte de Energías Entregadas: MEDIA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:last-child)'],
                                ],
                                [
                                    'extend' => 'pdf',
                                    'title' => 'Reporte de Energías Entregadas: MEDIA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:last-child)'],
                                ],
                                [
                                    'extend' => 'print',
                                    'title' => 'Reporte de Energías Entregadas: MEDIA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:last-child)'],
                                ],
                            ],
                        ];
                    @endphp
                    <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config">
                        @foreach ($fechas_ze as $ze)
                            <tr>
                                <td>{{ $ze->Código }}</td>
                                <td>{{ $ze->Fuente }}</td>
                                <td>{{ $ze->Fecha }}</td>
                                <td>{{ number_format($ze->Energia, 8, '.', ',') }} KWh</td>
                                @if ($usuarioActivo->privilegios == 1)
                                    <td>
                                        <div style="display: flex; align-items: center;">
                                            <a href="#"
                                                class="btn btn-xs btn-default text-primary mx-1 shadow editar5"
                                                title="Edit" data-toggle="modal"
                                                data-target="#editar5_{{ $ze->ID }}"
                                                data-ze-id="{{ $ze->ID }}">
                                                <i class="fa fa-lg fa-fw fa-pen"></i>
                                            </a>
                                            <form style="display: inline" method="post" class="formEliminar4"
                                                action="{{ route('balance_media.destroy3', $ze->ID) }}">
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
                        @foreach ($fechas_ze as $ze)
                            <x-adminlte-modal id="editar5_{{ $ze->ID }}" title="EDITAR: Energía entregada"
                                size="md" theme="primary" icon="fa fa-bolt" v-centered static-backdrop scrollable>
                                <div style="height:400px;">
                                    <div class="modal-body">
                                        <form id="frmActualizar5_{{ $ze->ID }}"
                                            action="{{ route('balance_media.update3', $ze->ID) }}" method="get">
                                            @csrf

                                            <x-adminlte-input type="text" name="Codigo" id="codigo"
                                                label="Código" label-class="text-primary" value="{{ $ze->Código }}"
                                                readonly>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="text" name="Sub" id="sub"
                                                label="Punto" label-class="text-primary" value="{{ $ze->Fuente }}"
                                                readonly>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="text" name="Fecha" id="fecha"
                                                label="Fecha" label-class="text-primary" value="{{ $ze->Fecha }}"
                                                readonly>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-adminlte-input type="number" name="energía_entregada"
                                                id="energía_entregada" label="Energía entregada (KWh)"
                                                label-class="text-primary" value="{{ $ze->Energia }}" step="any">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-circle text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>

                                            <x-slot name="footerSlot">
                                                <x-adminlte-button theme="primary" label="Actualizar"
                                                    class="actualizarBtn5" data-ze-id="{{ $ze->ID }}" />
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

        <div class="tab-pane fade" id="panel5" role="tabpanel" aria-labelledby="panel5-tab">
            <div class="card shadow-lg">
                <div class="card-body">
                    @php
                        $heads = [
                            ['no-export' => true, 'width' => 1],
                            'Fecha',
                            'Energía mensual perdida',
                            'Energía porcentual perdida',
                        ];
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
                                    'title' => 'Reporte de Energía Perdida: MEDIA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'csv',
                                    'title' => 'Reporte de Energía Perdida: MEDIA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'excel',
                                    'title' => 'Reporte de Energía Perdida: MEDIA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'pdf',
                                    'title' => 'Reporte de Energía Perdida: MEDIA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'print',
                                    'title' => 'Reporte de Energía Perdida: MEDIA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                            ],
                        ];
                    @endphp
                    <x-adminlte-datatable id="tableA" :heads="$heads" head-theme="dark" :config="$config">
                        @foreach ($fechas_BalanceMedia as $bmt1)
                            <tr>
                                <td></td>
                                <td style="width: 150px">{{ $bmt1->fecha }}</td>
                                <td>{{ number_format($bmt1->energia_mensual_perdida, 8, '.', ',') }} KWh</td>
                                <td>{{ $bmt1->porcentaje }} %</td>
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
                            'Energía mensual perdida',
                            'Energía porcentual perdida',
                        ];
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
                                    'title' => 'Reporte de Balance Energético: MEDIA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'csv',
                                    'title' => 'Reporte de Balance Energético: MEDIA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'excel',
                                    'title' => 'Reporte de Balance Energético: MEDIA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'pdf',
                                    'title' => 'Reporte de Balance Energético: MEDIA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'print',
                                    'title' => 'Reporte de Balance Energético: MEDIA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                            ],
                        ];
                    @endphp
                    <x-adminlte-datatable id="table3" :heads="$heads" head-theme="dark" :config="$config">
                        @foreach ($fechas_BalanceMedia as $bmt)
                            <tr>
                                <td></td>
                                <td style="width: 150px">{{ $bmt->fecha }}</td>
                                <td>{{ number_format($bmt->energia_mensual_recibida, 8, '.', ',') }} KWh</td>
                                <td>{{ number_format($bmt->energia_mensual_entregada, 8, '.', ',') }} KWh</td>
                                <td>{{ number_format($bmt->energia_mensual_perdida, 8, '.', ',') }} KWh</td>
                                <td>{{ $bmt->porcentaje }} %</td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
            @php
                $e_perdida = $fechas_BalanceMedia;
            @endphp
        </div>

        <div class="tab-pane fade" id="panel4" role="tabpanel" aria-labelledby="panel4-tab">
            @php
                $enero = $fechas_BalanceMedia[0];
                $febrero = $fechas_BalanceMedia[1];
                $marzo = $fechas_BalanceMedia[2];
                $abril = $fechas_BalanceMedia[3];
                $mayo = $fechas_BalanceMedia[4];
                $junio = $fechas_BalanceMedia[5];
                $julio = $fechas_BalanceMedia[6];
                $agosto = $fechas_BalanceMedia[7];
                $septiembre = $fechas_BalanceMedia[8];
                $octubre = $fechas_BalanceMedia[9];
                $noviembre = $fechas_BalanceMedia[10];
                $diciembre = $fechas_BalanceMedia[11];
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
            </center>
        </div>

        <div class="tab-pane fade" id="panel6" role="tabpanel" aria-labelledby="panel6-tab">
            <div class="card shadow-lg">
                <div class="card-body">
                    @php
                        $heads = [
                            ['no-export' => true, 'width' => 1],
                            'Fecha',
                            'Energía anual recibida',
                            'Energía anual entregada',
                            'Energía anual perdida',
                            'Energía porcentual perdida',
                        ];
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
                                    'title' => 'Reporte de Año Móvil: MEDIA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'csv',
                                    'title' => 'Reporte de Año Móvil: MEDIA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'excel',
                                    'title' => 'Reporte de Año Móvil: MEDIA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'pdf',
                                    'title' => 'Reporte de Año Móvil: MEDIA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                                [
                                    'extend' => 'print',
                                    'title' => 'Reporte de Año Móvil: MEDIA TENSIÓN',
                                    'exportOptions' => ['columns' => ':not(:first-child)'],
                                ],
                            ],
                        ];
                    @endphp
                    <x-adminlte-datatable id="tableX" :heads="$heads" head-theme="dark" :config="$config">
                        @foreach ($fechas_yearMovil as $bam)
                            <tr>
                                <td></td>
                                <td style="width: 150px">{{ $bam->fecha }}</td>
                                <td>{{ number_format($bam->energia_anual_recibida, 8, '.', ',') }} KWh</td>
                                <td>{{ number_format($bam->energia_anual_entregada, 8, '.', ',') }} KWh</td>
                                <td>{{ number_format($bam->energia_anual_perdida, 8, '.', ',') }} KWh</td>
                                <td>{{ $bam->porcentaje }} %</td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
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
                    <canvas id="grafica4">
                    </canvas>
                </div>
            </div>

            @php
                $e_perdida2 = $fechas_yearMovil;
            @endphp
        </div>

    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            var config1 = {
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                },
                lengthMenu: [
                    [12, 25, 50, -1],
                    [12, 25, 50, 'All']
                ],
                pageLength: 12,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copy',
                        title: 'Reporte de Energías Recibidas: MEDIA TENSIÓN (Subestaciones)',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        },
                    },
                    {
                        extend: 'csv',
                        title: 'Reporte de Energías Recibidas: MEDIA TENSIÓN (Subestaciones)',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        },
                    },
                    {
                        extend: 'excel',
                        title: 'Reporte de Energías Recibidas: MEDIA TENSIÓN (Subestaciones)',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        },
                    },
                    {
                        extend: 'pdf',
                        title: 'Reporte de Energías Recibidas: MEDIA TENSIÓN (Subestaciones)',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        },
                    },
                    {
                        extend: 'print',
                        title: 'Reporte de Energías Recibidas: MEDIA TENSIÓN (Subestaciones)',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        },
                    },
                ],
            };
            $('#table4').DataTable(config1);
        });
    </script>
    <script>
        $(document).ready(function() {
            var config2 = {
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                },
                lengthMenu: [
                    [12, 25, 50, -1],
                    [12, 25, 50, 'All']
                ],
                pageLength: 12,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copy',
                        title: 'Reporte de Energías Recibidas: MEDIA TENSIÓN (Puntos)',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }, // Cambiamos '=>' por ':' para definir correctamente el objeto
                    },
                    {
                        extend: 'csv',
                        title: 'Reporte de Energías Recibidas: MEDIA TENSIÓN (Puntos)',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        },
                    },
                    {
                        extend: 'excel',
                        title: 'Reporte de Energías Recibidas: MEDIA TENSIÓN (Puntos)',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        },
                    },
                    {
                        extend: 'pdf',
                        title: 'Reporte de Energías Recibidas: MEDIA TENSIÓN (Puntos)',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        },
                    },
                    {
                        extend: 'print',
                        title: 'Reporte de Energías Recibidas: MEDIA TENSIÓN (Puntos)',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        },
                    },
                ],
            };
            $('#table5').DataTable(config2);
        });
    </script>


    <script>
        $(document).ready(function() {
            $('.editar3').click(function(e) {
                e.preventDefault();
                var energiaR1Id = $(this).data('ermts-id');
                $('#editar3_' + energiaR1Id).modal('show');
                console.log(energiaR1Id);
            });
            $('.actualizarBtn3').click(function(e) {
                e.preventDefault();
                var energiaR1Id = $(this).data('ermts-id');
                $('#frmActualizar3_' + energiaR1Id).submit();
            });

            $('.editar4').click(function(e) {
                e.preventDefault();
                var energiaR2Id = $(this).data('fzr-id');
                $('#editar4_' + energiaR2Id).modal('show');
                console.log(energiaR2Id);
            });
            $('.actualizarBtn4').click(function(e) {
                e.preventDefault();
                var energiaR2Id = $(this).data('fzr-id');
                $('#frmActualizar4_' + energiaR2Id).submit();
            });

            $('.editar5').click(function(e) {
                e.preventDefault();
                var energiaEId = $(this).data('ze-id');
                $('#editar5_' + energiaEId).modal('show');
                console.log(energiaEId);
            });
            $('.actualizarBtn5').click(function(e) {
                e.preventDefault();
                var energiaEId = $(this).data('ze-id');
                $('#frmActualizar5_' + energiaEId).submit();
            });
        });
    </script>

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
        document.getElementById('guardarBtn1').addEventListener('click', function() {
            document.getElementById('frmRegistro1').submit();
        });
        document.getElementById('guardarBtn2').addEventListener('click', function() {
            document.getElementById('frmRegistro2').submit();
        });
        document.getElementById('guardarBtn3').addEventListener('click', function() {
            document.getElementById('frmRegistro3').submit();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtén el contexto del lienzo
            const ctx1 = document.querySelector('#grafica1').getContext('2d');

            // Datos del gráfico
            const labels1 = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                'Octubre', 'Noviembre', 'Diciembre'
            ];
            const data1 = {!! json_encode($e_perdida->pluck('energia_mensual_perdida')) !!};

            // Crear el gráfico
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
            // Obtén el contexto del lienzo
            const ctx2 = document.querySelector('#grafica2').getContext('2d');

            // Datos del gráfico
            const labels2 = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                'Octubre', 'Noviembre', 'Diciembre'
            ];
            const data2 = {!! json_encode($e_perdida->pluck('energia_mensual_recibida')) !!};
            const data3 = {!! json_encode($e_perdida->pluck('energia_mensual_entregada')) !!};

            // Crear el gráfico
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
                        }
                    ]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Balance energético mensual de media tensión',
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtén el contexto del lienzo
            const ctX3 = document.querySelector('#grafica3').getContext('2d');

            // Datos del gráfico
            const labelS3 = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                'Octubre', 'Noviembre', 'Diciembre'
            ];
            const datA3 = {!! json_encode($e_perdida2->pluck('energia_anual_perdida')) !!};

            // Crear el gráfico
            const barChartHorizontal = new Chart(ctX3, {
                type: 'bar',
                data: {
                    labels: labelS3,
                    datasets: [{
                        label: 'KWh',
                        data: datA3,
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
            // Obtén el contexto del lienzo
            const ctX4 = document.querySelector('#grafica4').getContext('2d');

            // Datos del gráfico
            const labelS4 = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                'Octubre', 'Noviembre', 'Diciembre'
            ];
            const datA5 = {!! json_encode($e_perdida2->pluck('energia_anual_recibida')) !!};
            const datA6 = {!! json_encode($e_perdida2->pluck('energia_anual_entregada')) !!};

            // Crear el gráfico
            const barChartHorizontal = new Chart(ctX4, {
                type: 'line',
                data: {
                    labels: labelS4,
                    datasets: [{
                            label: 'Energía anual recibida (KWh)',
                            data: datA5,
                            backgroundColor: '#0C4009',
                            borderColor: '#0C4009',
                            borderWidth: 3
                        },
                        {
                            label: 'Energía anual entregada (KWh)',
                            data: datA6,
                            backgroundColor: '#5AB354',
                            borderColor: '#5AB354',
                            borderWidth: 3
                        }
                    ]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Balance energético anual de media tensión',
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

@section('css')
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
        }

        #table4 th,
        #table4 td {
            text-align: left;
            padding: 8px;
        }

        @media only screen and (max-width: 600px) {

            #table4 th,
            #table4 td {
                width: 100%;
                display: block;
            }

            #table4 th:nth-of-type(1),
            #table4 td:nth-of-type(1) {
                display: none;
            }
        }

        #table5 {
            width: 100%;
            border-collapse: collapse;
        }

        #table5 th,
        #table5 td {
            text-align: left;
            padding: 8px;
        }

        @media only screen and (max-width: 600px) {

            #table5 th,
            #table5 td {
                width: 100%;
                display: block;
            }

            #table5 th:nth-of-type(1),
            #table5 td:nth-of-type(1) {
                display: none;
            }
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
