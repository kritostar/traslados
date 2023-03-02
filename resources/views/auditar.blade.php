@extends('layouts.app')

@section('content')
    <h1>Auditar Tramite #{{ $tramite->id }}</h1>

    <a href="/tramites" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Atras</a>
    <hr/>

    <div class="row">
        <div class="col-xs-12 col-sm-4">
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
                <li class="list-group-item">Distancia en Kilómetros <strong>{{ $tramite->kilometros }}</strong></li>
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

                {{-- <li class="list-group-item">Tipo de Trámite <strong class="text-danger">{{ $tipo_tramites[$tramite->tipo] }}</strong></li> --}}
                {{-- <li class="list-group-item">Estado del Trámite
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
                </li> --}}
                <li class="list-group-item">Observaciones <pre>{{ $tramite->obs_alta }}</pre></li>
            </ul>
            <ul class="list-group">
                <li class="list-group-item">
                    @if ($tramite->adjunto_form)
                        <a target="_blank" href="/adjuntos/{{ $tramite->id }}--{{ $tramite->afiliado }}/{{ $tramite->adjunto_form }}"><span class="glyphicon glyphicon-file"></span> {{ $tramite->adjunto_form }}</a>
                    @endif
                </li>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-8">
            <ul class="list-group">
                {!! Form::open(['url' => '/tramite/'.$tramite->id.'/auditar', 'id' => 'alta_form']) !!}
                    <li class="list-group-item">
                        {{ Form::label('estado', 'Auditoría') }}
                        {{ Form::select('estado', ['1' => 'Nuevo', '3' => 'Autorizado', '4' => 'Rechazado'], $tramite->estado, ['class' => 'form-control']) }}
                    </li>
                    <li class="list-group-item">
                        {{ Form::label('coseguro', '¿Coseguro?') }}
                        {{ Form::select('coseguro', array(''=> 'Seleccionar', '0' => 'No', '1' => 'Sí'), $tramite->coseguro, ['class' => 'form-control']) }}
                    </li>
                    <li class="list-group-item valor_coseguro_div" @if (!$tramite->coseguro) style="display:none" @endif>
                        <label>Lista de Códigos</label>
                        <div id="ayuda-codigos">En color <span style="background-color:#ff6; border:1px solid #000; padding:4px; ">amarillo</span> el código sugerido.</div>
                        <div style="height:400px; overflow-y:scroll; ">
                            <table id="repositorio-codigos" class="table" style="font-size:0.8em">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Tipo de Traslado</th>
                                        <th>Tipo de Móvil</th>
                                        <th>Asistencia</th>
                                        <th>Nivel de servicio</th>
                                        <th>Equiv. KM</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td><button type="button" class="btn btn-xs btn-success agregar-codigo codigo-1322" data-codigo="950101" data-descripcion="Local (menor a 30 km)" data-valor="419.76">+</button> 950101</td><td>Local (&lt; 30 km)</td><td>Movil sanitario</td><td>sin asistencia</td><td>Programado</td><td>8.83</td><td>419.76</td></tr>
                                    <tr><td><button type="button" class="btn btn-xs btn-success agregar-codigo codigo-1312" data-codigo="950102" data-descripcion="Local (menor a 30 km)" data-valor="615.17">+</button> 950102</td><td>Local (&lt; 30 km)</td><td>Movil sanitario</td><td>con asistencia</td><td>Programado</td><td>12.94</td><td>615.17</td></tr>
                                    <tr><td><button type="button" class="btn btn-xs btn-success agregar-codigo codigo-1311" data-codigo="950103" data-descripcion="Local (menor a 30 km)" data-valor="738.20">+</button> 950103</td><td>Local (&lt; 30 km)</td><td>Movil sanitario</td><td>con asistencia</td><td>Emergencia y Urgencia</td><td>15.53</td><td>738.20</td></tr>
                                    <tr><td><button type="button" class="btn btn-xs btn-success agregar-codigo codigo-1111 codigo-1112" data-codigo="950104" data-descripcion="Local (menor a 30 km)" data-valor="4613.19">+</button> 950104</td><td>Local (&lt; 30 km)</td><td>ALTA</td><td>con asistencia</td><td>Todos</td><td>97.04</td><td>4613.19</td></tr>
                                    <tr><td><button type="button" class="btn btn-xs btn-success agregar-codigo codigo-1221 codigo-1222" data-codigo="950105" data-descripcion="Local (menor a 30 km)" data-valor="1419.35">+</button> 950105</td><td>Local (&lt; 30 km)</td><td>BAJA</td><td>sin asistencia</td><td>Todos</td><td>29.86</td><td>1419.35</td></tr>
                                    <tr><td><button type="button" class="btn btn-xs btn-success agregar-codigo codigo-1211 codigo-1212" data-codigo="950106" data-descripcion="Local (menor a 30 km)" data-valor="3193.83">+</button> 950106</td><td>Local (&lt; 30 km)</td><td>BAJA</td><td>con asistencia</td><td>Todos</td><td>67.18</td><td>3193.83</td></tr>
                                    <tr><td><button type="button" class="btn btn-xs btn-success agregar-codigo codigo-2321 codigo-2322" data-codigo="950201" data-descripcion="Interurbano (por km excedente desde el 31 al 110 km)" data-valor="13.98">+</button> 950201</td><td>Interurbano (km exc. 31-110 KM)</td><td>Movil sanitario</td><td>sin asistencia</td><td>Todos</td><td>0.29</td><td>13.98</td></tr>
                                    <tr><td><button type="button" class="btn btn-xs btn-success agregar-codigo codigo-2311 codigo-2312" data-codigo="950202" data-descripcion="Interurbano (por km excedente desde el 31 al 110 km)" data-valor="28.52">+</button> 950202</td><td>Interurbano (km exc. 31-110 KM)</td><td>Movil sanitario</td><td>con asistencia</td><td>Todos</td><td>0.60</td><td>28.52</td></tr>
                                    <tr><td><button type="button" class="btn btn-xs btn-success agregar-codigo codigo-2111 codigo-2112" data-codigo="950203" data-descripcion="Interurbano (por km excedente desde el 31 al 110 km)" data-valor="57.90">+</button> 950203</td><td>Interurbano (km exc. 31-110 KM)</td><td>ALTA</td><td>con asistencia</td><td>Todos</td><td>1.22</td><td>57.90</td></tr>
                                    <tr><td><button type="button" class="btn btn-xs btn-success agregar-codigo codigo-2221 codigo-2222" data-codigo="950204" data-descripcion="Interurbano (por km excedente desde el 31 al 110 km)" data-valor="31.61">+</button> 950204</td><td>Interurbano (km exc. 31-110 KM)</td><td>BAJA</td><td>sin asistencia</td><td>Todos</td><td>0.67</td><td>31.61</td></tr>
                                    <tr><td><button type="button" class="btn btn-xs btn-success agregar-codigo codigo-2211 codigo-2212" data-codigo="950205" data-descripcion="Interurbano (por km excedente desde el 31 al 110 km)" data-valor="70.83">+</button> 950205</td><td>Interurbano (km exc. 31-110 KM)</td><td>BAJA</td><td>con asistencia</td><td>Todos</td><td>1.49</td><td>70.83</td></tr>
                                    <tr><td><button type="button" class="btn btn-xs btn-success agregar-codigo codigo-3321 codigo-3322" data-codigo="950301" data-descripcion="Larga distancia (por km excedente desde el 110 km en adelante)" data-valor="23.29">+</button> 950301</td><td>Larga distancia (km exc. 110+ KM)</td><td>Movil sanitario</td><td>sin asistencia</td><td>Todos</td><td>0.49</td><td>23.29</td></tr>
                                    <tr><td><button type="button" class="btn btn-xs btn-success agregar-codigo codigo-3311 codigo-3312" data-codigo="950302" data-descripcion="Larga distancia (por km excedente desde el 110 km en adelante)" data-valor="47.54">+</button> 950302</td><td>Larga distancia (km exc. 110+ KM)</td><td>Movil sanitario</td><td>con asistencia</td><td>Todos</td><td>1.00</td><td>47.54</td></tr>
                                    <tr><td><button type="button" class="btn btn-xs btn-success agregar-codigo codigo-3111 codigo-3112" data-codigo="950303" data-descripcion="Larga distancia (por km excedente desde el 110 km en adelante)" data-valor="82.72">+</button> 950303</td><td>Larga distancia (km exc. 110+ KM)</td><td>ALTA</td><td>con asistencia</td><td>Todos</td><td>1.74</td><td>82.72</td></tr>
                                    <tr><td><button type="button" class="btn btn-xs btn-success agregar-codigo codigo-3221 codigo-3222" data-codigo="950304" data-descripcion="Larga distancia (por km excedente desde el 110 km en adelante)" data-valor="45.16">+</button> 950304</td><td>Larga distancia (km exc. 110+ KM)</td><td>BAJA</td><td>sin asistencia</td><td>Todos</td><td>0.95</td><td>45.16</td></tr>
                                    <tr><td><button type="button" class="btn btn-xs btn-success agregar-codigo codigo-3211 codigo-3212" data-codigo="950305" data-descripcion="Larga distancia (por km excedente desde el 110 km en adelante)" data-valor="70.83">+</button> 950305</td><td>Larga distancia (km exc. 110+ KM)</td><td>BAJA</td><td>con asistencia</td><td>Todos</td><td>1.49</td><td>70.83</td></tr>
                                    <tr><td><button type="button" class="btn btn-xs btn-success agregar-codigo" data-codigo="950401" data-descripcion="Hora de espera" data-valor="390.30">+</button> 950401</td><td>Hora de espera</td><td>Movil sanitario</td><td>sin asistencia</td><td>Todos</td><td>8.21</td><td>390.30</td></tr>
                                    <tr><td><button type="button" class="btn btn-xs btn-success agregar-codigo" data-codigo="950402" data-descripcion="Hora de espera" data-valor="768.72">+</button> 950402</td><td>Hora de espera</td><td>Movil sanitario</td><td>con asistencia</td><td>Todos</td><td>16.17</td><td>768.72</td></tr>
                                    <tr><td><button type="button" class="btn btn-xs btn-success agregar-codigo" data-codigo="950403" data-descripcion="Hora de espera" data-valor="2956.99">+</button> 950403</td><td>Hora de espera</td><td>ALTA</td><td>con asistencia</td><td>Todos</td><td>62.20</td><td>2956.99</td></tr>
                                    <tr><td><button type="button" class="btn btn-xs btn-success agregar-codigo" data-codigo="950404" data-descripcion="Hora de espera" data-valor="946.52">+</button> 950404</td><td>Hora de espera</td><td>BAJA</td><td>sin asistencia</td><td>Todos</td><td>19.91</td><td>946.52</td></tr>
                                    <tr><td><button type="button" class="btn btn-xs btn-success agregar-codigo" data-codigo="950405" data-descripcion="Hora de espera" data-valor="2365.59">+</button> 950405</td><td>Hora de espera</td><td>BAJA</td><td>con asistencia</td><td>Todos</td><td>49.76</td><td>2365.59</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </li>
                    <li class="list-group-item valor_coseguro_div" @if (!$tramite->coseguro) style="display:none" @endif>
                        <label>Detalle del Coseguro</label>
                        <ul id="lista-codigos">
                            @if (isset($lista_codigos['lista']))
                                @foreach ($lista_codigos['lista'] as $codigo)
                        <li>{{ $codigo['codigo'] }} - {{ $codigo['tipo_traslado'] }} - ${{ $codigo['valor'] }} <button type="button" class="btn btn-xs btn-danger eliminar-codigo" data-descripcion="{{ $codigo['tipo_traslado'] }}" data-codigo="{{ $codigo['codigo'] }}" data-valor="{{ $codigo['valor'] }}">-</button></li>
                                @endforeach
                            @endif
                        </ul>
                        {{ Form::textarea('coseguro_detalle', $tramite->coseguro_detalle, ['id' => 'coseguro_detalle', 'class' => 'collapse']) }} 
                    </li>
                    <li class="list-group-item valor_coseguro_div" @if (!$tramite->coseguro) style="display:none" @endif>
                        {{ Form::label('valor_coseguro', 'Valor del Coseguro') }}
                        {{ Form::text('valor_coseguro', $tramite->valor_coseguro, ['class' => 'form-control', 'placeholder' => "Monto calculado", "readonly"]) }}
                    </li>
                    <li class="list-group-item valor_coseguro_div" @if (!$tramite->coseguro) style="display:none" @endif>
                        {{ Form::label('porcentaje_coseguro', 'Porcentaje') }}
                        {{ Form::text('porcentaje_coseguro', $tramite->porcentaje_coseguro, ['class' => 'form-control', 'placeholder' => "Porcentaje a reconocer"]) }}
                    </li>
                    <li class="list-group-item valor_coseguro_div" @if (!$tramite->coseguro) style="display:none" @endif>
                        {{ Form::label('valor_coseguro_ajustado', 'Valor del Coseguro') }}
                        {{ Form::text('valor_coseguro_ajustado', $tramite->valor_coseguro_ajustado, ['class' => 'form-control', 'placeholder' => "Monto re-calculado", "readonly"]) }}
                    </li>
                    <li class="list-group-item">
                        {{ Form::label('obs_audit', 'Observaciones') }}
                        {{ Form::textarea('obs_audit', $tramite->obs_audit, ['class' => 'form-control', 'placeholder' => "Indique observaciones"]) }} 
                    </li>
                    <li class="list-group-item">
                        {{ Form::submit('Guardar', ['class' => 'btn btn-success btn-block']) }}
                    </li>
                    <input type="hidden" name="id_tramite" value="{{ $tramite->id }}" />
                {!! Form::close() !!}
            </ul>
        </div>
    </div>

        <script type="text/javascript">
        $(document).ready(function(){

            @if ($tramite->coseguro_detalle)
                var detalle_json = '{!! $tramite->coseguro_detalle !!}';
            @else
                var detalle_json = '{}';
            @endif
            detalle_json_object = JSON.parse(detalle_json);

            var precargados = 0;
            var pre_cargando = 0;

            $("#coseguro").change(function(){
                var valor = $(this).val();
                if (valor == 1) {
                    /* if (precargados == 0) {
                        pre_cargar_codigos();
                        precargados = 1;
                    } */
                    @if ($tramite->tipo_asistencia <= 2)
                        var asistencia = "{{ $tramite->tipo_asistencia }}" ;
                    @else
                        var asistencia = "{{ $tramite->tipo_asistencia - 2 }}";
                    @endif
                    var codecode = "{{ $tramite->tipo_traslado }}{{ $tramite->tipo_unidad_traslado }}"+asistencia+"{{ $tramite->situacion_traslado }}";
                    $(".codigo-"+codecode).parent().parent().css('background', '#ff6');
                    $(".valor_coseguro_div").fadeIn();
                }
                else {
                    $(".valor_coseguro_div").fadeOut();
                }
            })

            function pre_cargar_codigos() {
                console.log('pre-cargar');
                pre_cargando = 1;
                $(".codigo-12345").trigger("click");
                pre_cargando = 0;
            }

            function calcular_coseguro() {
                var valor = 0;
                detalle_json_object = new Object();
                detalle_json_object.lista = [];
                $(".eliminar-codigo").each(function(){
                    temp_object = new Object();
                    val = $(this).attr("data-valor");
                    codigo = $(this).attr("data-codigo");
                    descripcion = $(this).attr("data-descripcion");
                    valor = Number(valor) + Number(val);
                    temp_object.codigo = codigo;
                    temp_object.tipo_traslado = descripcion;
                    temp_object.valor = val;
                    detalle_json_object.lista.push(temp_object);
                })
                $("#valor_coseguro").val(valor.toFixed(2));
                $("#coseguro_detalle").text(JSON.stringify(detalle_json_object));
            }

            function ajustar_porcentaje() {
                var porcentaje = parseFloat($("#porcentaje_coseguro").val());
                var coseguro = parseFloat($("#valor_coseguro").val());
                var ajustado = 0;
                if ((!Number.isNaN(porcentaje)) && (!Number.isNaN(coseguro))) {
                    ajustado = parseFloat(porcentaje * coseguro / 100);
                    $("#valor_coseguro_ajustado").val(ajustado);
                }
            }

            function refresh_dom() {
                $(".eliminar-codigo").click(function() {
                    $(this).parent().remove();
                    calcular_coseguro();
                })
            }

            refresh_dom();
            calcular_coseguro();
            ajustar_porcentaje();

            $("#porcentaje_coseguro").keyup(function(){
                ajustar_porcentaje();
            })

            $(".agregar-codigo").click(function() {
                if (!pre_cargando) {
                    var cuantos = parseInt(prompt("¿Cuántos desea agregar?", "1"));
                }
                else {
                    cuantos = 1;
                }
                var codigo = $(this).attr("data-codigo");
                var valor = $(this).attr("data-valor");
                var descripcion = $(this).attr("data-descripcion");
                var x;
                for (x=1; x<=cuantos; x++) {
                    $("#lista-codigos").append('<li>'+codigo+' - '+descripcion+' - $'+valor+' <button type="button" class="btn btn-xs btn-danger eliminar-codigo" data-valor="'+valor+'" data-descripcion="'+descripcion+'" data-codigo="'+codigo+'">-</button></li>')
                }
                calcular_coseguro();
                ajustar_porcentaje();
                refresh_dom();
            })

        })
    </script>

@endsection