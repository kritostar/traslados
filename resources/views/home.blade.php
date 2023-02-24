@extends('layouts.app')

@section('content')
    <h1>Trámites Activos</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID Autorización</th>
                <th>Creado</th>
                <th>Gestión</th>
                <th>Nombre</th>
                <th>Afiliado</th>
                <th>Inst Origen</th>
                <th>Inst Destino</th>
                <th colspan="5">Estado</th>
            </tr>
        </thead>
        <tbody>
            @if(count($tramites) > 0)
                @foreach($tramites as $tramite)
                    <tr>
                        <td class="">{{ $tramite->id }}</td>
                        <td class="">{{ \Carbon\Carbon::parse($tramite->created_at)->format('d/m/Y -- H:i') }}</td>
                        <td class="">
                            @switch($tramite->tipo_gestion)
                                @case(1)
                                    <span class="label label-success">Alta</span>
                                    @break
                                @case(2)
                                    <span class="label label-info">Modificación</span>
                                    @break
                                @default
                                    <span class="label label-danger">¡Algo salió mal!</span>
                            @endswitch
                        </td>
                        <td class="">{{ $tramite->nombre }}</td>
                        <td class="">{{ $tramite->afiliado }}</td>
                        <td class="">{{ $tramite->origen_institucion }}</td>
                        <td class="">{{ $tramite->destino_institucion }}</td>
                        <td class="">
                            @switch($tramite->estado)
                                @case(1)
                                    <span class="label label-primary">Nuevo</span>
                                    @break
                                @case(2)
                                    <span class="label label-info">Medico Cargado</span>
                                    @break
                                @case(3)
                                    <span class="label label-success">Autorizado</span>
                                    @break
                                @case(4)
                                    <span class="label label-danger">Rechazado</span>
                                    @break
                                @default
                                    <span class="label label-info">¡Algo salió mal!</span>
                            @endswitch
                        </td>
                        @if ($tramite->estado == 3)
                            <td><a class="btn btn-default btn-block" href="/tramite/{{ $tramite->id }}/pdf" target="_blank"><span class="glyphicon glyphicon-print"></span></a></td>
                        @else
                            <td>&nbsp;</td>
                        @endif
                        @if ($tramite->estado != 4)
                            <td class="col-xs-1"><a class="btn btn-primary btn-block" href="/tramite/{{ $tramite->id }}/auditar">Auditar</a></td>
                        @else
                            <td class="col-xs-1"><a class="btn btn-disabled btn-block" href="#" disabled>Auditar</a></td>
                        @endif
                        @if ($tramite->estado == 1)
                            <td class="col-xs-1"><a class="btn btn-danger btn-block" href="/tramite/{{ $tramite->id }}/eliminar">Eliminar</a></td>
                        @else
                            <td class="col-xs-1"><a class="btn btn-disabled btn-block" href="#" disabled>Eliminar</a></td>
                        @endif
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <div class="row">
        <div class="col-xs-12 col-sm-2 col-sm-offset-10">
            <a class="btn btn-success btn-block" href="/tramite/alta">Alta de Trámite</a>
        </div>
    </div>

@endsection

@section('sidebar')
    @parent
@endsection