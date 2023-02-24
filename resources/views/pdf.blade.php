<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IPROSS - Gestión de Traslados</title>
    <link rel="stylesheet" href="/css/app.css">
    <style>
        body {
            font-size:11px!important;
        }
        div {
            /* padding:5px!important; */
        }
        hr {
            margin-bottom:10px;
            margin-top:10px;
        }
    </style>
</head>
<body id="pdf">
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <p class="lead">
                    Traslado
                </p>
            </div>
            <div class="col-xs-8 text-center">
                <p class="lead">
                    No establecida
                </p>
                <p>
                    <strong>Fecha Impresión:</strong> {{ date("d/m/Y")}}
                    <br>
                    <strong>Usuario:</strong> nombredeusuario
                </p>
            </div>
            <div class="col-xs-2 text-right">
                <img src="/images/iprossmovil.png" width="100%">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Información del Presupuesto</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-2">
                                <label>ID del Reporte</label><br>
                                {{ $tramite->id }}
                            </div>
                            <div class="col-xs-2">
                                <label>Fecha solicitud</label><br>
                                {{ $tramite->created_at->format('d/m/Y') }}
                            </div>
                            <div class="col-xs-4">
                                <label>Usuario solicita</label><br>
                                <strong>nombredeusuario</strong>
                            </div>
                            <div class="col-xs-4">
                                <label>Tipo de Trámite</label><br>
                                @switch($tramite->tipo_gestion)
                                    @case(1)
                                        <span class="text-success">Alta</span>
                                        @break
                                    @case(2)
                                        <span class="text-info">Modificación</span>
                                        @break
                                    @default
                                        <span class="text-danger">¡Algo salió mal!</span>
                                @endswitch
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Observaciones</label><br>
                                {{ $tramite->obs_alta }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-2">
                                <label>Afiliado</label><br>
                                {{ $tramite->afiliado }}
                            </div>
                            <div class="col-xs-4">
                                <label>Apellido y nombre</label><br>
                                {{ $tramite->nombre }}
                            </div>
                            <div class="col-xs-2">
                                <label>Importe solicitado</label><br>
                                @if ($tramite->valor_coseguro > 0)
                                    $ {{ $tramite->valor_coseguro }}
                                @else
                                    N / A
                                @endif
                            </div>
                            <div class="col-xs-2">
                                <label>Cert. Discapacidad</label><br>
                                @switch($tramite->certificado_discapacidad)
                                    @case(0)
                                        <span class="text-danger">No</span>
                                        @break
                                    @case(1)
                                        <span class="text-success">Sí</span>
                                        @break
                                    @default
                                        <span class="text-info">¡Algo salió mal!</span>
                                @endswitch
                            </div>
                            <div class="col-xs-2">
                                <label>Resolución 154/85</label><br>
                                @switch($tramite->resol_154_85)
                                    @case(0)
                                        <span class="text-danger">No</span>
                                        @break
                                    @case(1)
                                        <span class="text-success">Sí</span>
                                        @break
                                    @default
                                        <span class="text-info">¡Algo salió mal!</span>
                                @endswitch
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <div class="panel panel-info">
                    <div class="panel-heading">Detalle de Auditoría</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3"><label>Estado del Trámite</label> <br>
                                <h4>
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
                                </h4>
                            </div>
                            <div class="col-xs-12 col-sm-3"><label>Situación de Traslado</label> <br>
                                <strong>
                                    @switch($tramite->situacion_traslado)
                                        @case(1)
                                            <span class="text-primary">Urgencia/Emergencia</span>
                                            @break
                                        @case(2)
                                            <span class="text-primary">Traslado Programado</span>
                                            @break
                                        @default
                                            <span class="text-info">¡Algo salió mal!</span>
                                    @endswitch
                                </strong>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-12 col-sm-3"><label>Institución de Origen</label> <br>{{ $tramite->origen_institucion }}</div>
                            <div class="col-xs-12 col-sm-3"><label>Dirección de Institución de Origen</label> <br>{{ $tramite->origen_direccion }}</div>
                            <div class="col-xs-12 col-sm-3"><label>Institución de Destino</label> <br>{{ $tramite->destino_institucion }}</div>
                            <div class="col-xs-12 col-sm-3"><label>Dirección de Institución de Destino</label> <br>{{ $tramite->destino_direccion }}</div>
                        </div>
                        <hr>
                                                <div class="row">
                            <div class="col-xs-12 col-sm-2"><label>Tipo de Traslado</label> <br>
                                <strong>
                                    @switch($tramite->tipo_traslado)
                                        @case(1)
                                            <span class="text-primary">Local (Menor a 30km)</span>
                                            @break
                                        @case(2)
                                            <span class="text-primary">Interurbano (Por km excedente desde 31 a 110km)</span>
                                            @break
                                        @case(3)
                                            <span class="text-primary">Larga Distancia (110km en adelante)</span>
                                            @break
                                        @default
                                            <span class="text-info">¡Algo salió mal!</span>
                                    @endswitch
                                </strong>
                            </div>
                            <div class="col-xs-12 col-sm-2"><label>Distancia en Kilómetros</label> <br>{{ $tramite->kilometros }}</div>
                            <div class="col-xs-12 col-sm-4"><label>Tipo de Unidad de Traslado</label> <br>
                                <strong>
                                    @switch($tramite->tipo_unidad_traslado)
                                        @case(1)
                                            <span class="text-primary">Ambulancia de Alta Complejidad</span>
                                            @break
                                        @case(2)
                                            <span class="text-primary">Ambulancia de Baja Complejidad</span>
                                            @break
                                        @case(3)
                                            <span class="text-primary">Móvil Sanitario</span>
                                            @break
                                        @default
                                            <span class="text-info">¡Algo salió mal!</span>
                                    @endswitch
                                </strong>
                            </div>
                            <div class="col-xs-12 col-sm-4"><label>Tipo de Asistencia</label> <br>
                                <strong>
                                    @switch($tramite->tipo_asistencia)
                                        @case(1)
                                            <span class="text-primary">Con asistencia médica</span>
                                            @break
                                        @case(2)
                                            <span class="text-primary">Sin asistencia médica</span>
                                            @break
                                        @case(3)
                                            <span class="text-primary">Con asistencia profesional no médico</span>
                                            @break
                                        @case(4)
                                            <span class="text-primary">Sin asistencia profesional no médico</span>
                                            @break
                                        @default
                                            <span class="text-info">¡Algo salió mal!</span>
                                    @endswitch
                                </strong>
                            </div>
                        </div>
                        <hr>
                        @if ($tramite->situacion_traslado == 2)
                            <div class="row">
                                <div class="col-xs-12 col-sm-3"><label>Frecuencia Semanal</label> <br>{{ $tramite->frecuencia_semanal }}</div>
                                <div class="col-xs-12 col-sm-3"><label>Duración del Tratamiento</label> <br>{{ $tramite->duracion_tratamiento }}</div>
                            </div>
                            <hr>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-2"><label>Coseguro</label>
                                <h4>
                                    <strong>
                                        @switch($tramite->coseguro)
                                            @case(0)
                                                <span class="text-danger">No</span>
                                                @break
                                            @case(1)
                                                <span class="text-success">Sí</span>
                                                @break
                                            @default
                                                <span class="text-info">¡Algo salió mal!</span>
                                        @endswitch
                                    </strong>
                                </h4>
                            </div>
                            <div class="col-xs-12 col-sm-2"><label>¿Espera en destino?</label>
                                <h4>
                                    <strong>
                                        @switch($tramite->requiere_espera)
                                            @case(0)
                                                <span class="text-danger">No</span>
                                                @break
                                            @case(1)
                                                <span class="text-success">Sí</span>
                                                @break
                                            @default
                                                <span class="text-info">¡Algo salió mal!</span>
                                        @endswitch
                                    </strong>
                                </h4>
                            </div>
                            @if ($tramite->coseguro == 1)
                                <div class="col-xs-12 col-sm-4">
                                    <label>Detalle del Coseguro</label>
                                    <ul id="lista-codigos">
                                        @if (isset($lista_codigos['lista']))
                                            @foreach ($lista_codigos['lista'] as $codigo)
                                                <li>{{ $codigo['codigo'] }} - {{ $codigo['tipo_traslado'] }} - ${{ $codigo['valor'] }}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                    @if ($tramite->valor_coseguro > 0)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                Total: <br>
                                                <h4>
                                                    $ {{ $tramite->valor_coseguro }}
                                                </h4>        
                                            </div>
                                            <div class="col-sm-4">
                                                Porcentaje: <br>
                                                <h4>
                                                    {{ $tramite->porcentaje_coseguro }} %
                                                </h4>       
                                            </div>
                                            <div class="col-sm-4">
                                                A pagar: <br>
                                                <h4>
                                                    $ {{ $tramite->valor_coseguro_ajustado }}
                                                </h4>        
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endif
                            <div class="col-xs-12 col-sm-4">
                                <label>Observaciones</label>
                                <br>
                                {{ $tramite->obs_audit }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>