@extends('layouts.app')

@section('content')
    <h1>Adjuntar al Tramite #{{ $tramite->id }}</h1>

    <a class="btn btn-primary" href="/">Volver</a>
    <hr/>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <ul class="list-group">
                <li class="list-group-item">Fecha: <strong>{{ \Carbon\Carbon::parse($tramite->created_at)->format('d/m/Y -- H:i') }}</strong></li>
                <li class="list-group-item">Tipo de Gestión
                    <strong class="lead">
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
                    </strong>
                </li>
                <li class="list-group-item">Nombre y Apellido <strong>{{ $tramite->nombre }}</strong></li>
                <li class="list-group-item">Número de Afiliado <strong>{{ $tramite->afiliado }}</strong></li>

                <li class="list-group-item">Certificado de Discapacidad
                    <strong>
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
                    </strong>
                </li>
                <li class="list-group-item">Resolución 154/85
                    <strong>
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
                    </strong>
                </li>
                <li class="list-group-item">Situación de Traslado
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
                </li>
                <li class="list-group-item">Institución de Origen <strong>{{ $tramite->origen_institucion }}</strong></li>
                <li class="list-group-item">Dirección de Institución de Origen <strong>{{ $tramite->origen_direccion }}</strong></li>
                <li class="list-group-item">Institución de Destino <strong>{{ $tramite->destino_institucion }}</strong></li>
                <li class="list-group-item">Dirección de Institución de Destino <strong>{{ $tramite->destino_direccion }}</strong></li>
                <li class="list-group-item">Tipo de Traslado
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
                </li>
                <li class="list-group-item">Tipo de Unidad de Traslado
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
                </li>
                <li class="list-group-item">Tipo de Asistencia
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
                </li>
                <li class="list-group-item">Frecuencia Semanal <strong>{{ $tramite->frecuencia_semanal }}</strong></li>
                <li class="list-group-item">Duración del Tratamiento <strong>{{ $tramite->duracion_tratamiento }}</strong></li>
                <li class="list-group-item">Coseguro
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
                </li>
                <li class="list-group-item">¿Requiere espera en destino?
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
                </li>

                <li class="list-group-item">Tipo de Trámite <strong class="text-danger">{{ $tipo_tramites[$tramite->tipo] }}</strong></li>
                <li class="list-group-item">Estado del Trámite
                    <strong>
                        @switch($tramite->estado)
                            @case(1)
                                <span class="text-primary">Nuevo</span>
                                @break
                            @case(2)
                                <span class="text-info">Medico Cargado</span>
                                @break
                            @case(3)
                                <span class="text-success">Autorizado</span>
                                @break
                            @case(4)
                                <span class="text-danger">Rechazado</span>
                                @break
                            @default
                                <span class="text-info">¡Algo salió mal!</span>
                        @endswitch
                    </strong>
                </li>
                <li class="list-group-item">Observaciones <pre>{{ $tramite->obs_alta }}</pre></li>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-6">
            {!! Form::open(['url' => '/tramite/'.$tramite->id.'/ver', 'id' => 'medico_form', 'files' => true]) !!}
                <div class="form-group col-xs-12">
                    {{ Form::label('medico', 'Médico Tratante') }}
                    {{ Form::text('medico', $tramite->medico, ['class' => 'form-control', 'placeholder' => "Roberto Gómez"]) }}
                </div>
                <div class="form-group col-xs-12">
                    {{ Form::label('obs_medico', 'Observaciones') }}
                    {{ Form::textarea('obs_medico', $tramite->obs_medico, ['class' => 'form-control', 'placeholder' => "Indique observaciones"]) }}
                </div>
                <div class="form-group col-xs-12">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <label>Formulario Adjunto</label>
                            <br>
                            @if ($tramite->adjunto_form)
                                <a target="_blank" href="/adjuntos/{{ $tramite->id }}--{{ $tramite->afiliado }}/{{ $tramite->adjunto_form }}"><span class="glyphicon glyphicon-file"></span> {{ $tramite->adjunto_form }}</a>
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="form-group col-xs-12">
                    @if ($tramite->adjunto_otros_1)
                        <a target="_blank" href="/adjuntos/{{ $tramite->id }}--{{ $tramite->afiliado }}/{{ $tramite->adjunto_otros_1 }}"><span class="glyphicon glyphicon-file"></span> {{ $tramite->adjunto_otros_1 }}</a>
                    @endif
                    <br/>
                    {{ Form::label('adjunto_otros_1', 'Otro Adjunto') }}
                    {{ Form::file('adjunto_otros_1') }}
                </div>
                <div class="form-group col-xs-12">
                    @if ($tramite->adjunto_otros_2)
                        <a target="_blank" href="/adjuntos/{{ $tramite->id }}--{{ $tramite->afiliado }}/{{ $tramite->adjunto_otros_2 }}"><span class="glyphicon glyphicon-file"></span> {{ $tramite->adjunto_otros_2 }}</a>
                    @endif
                    <br/>
                    {{ Form::label('adjunto_otros_2', 'Otro Adjunto') }}
                    {{ Form::file('adjunto_otros_2') }}
                </div>

                <div class="col-xs-12 col-sm-4 col-sm-offset-8">
                    {{ Form::submit('Guardar', ['class' => 'btn btn-success btn-block']) }}
                </div>
                <input type="hidden" name="id_tramite" value="{{ $tramite->id }}" />
            {!! Form::close() !!}
        </div>
    </div>

@endsection