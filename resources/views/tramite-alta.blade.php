@extends('layouts.app')

@section('content')
    <h1>Alta de Trámite</h1>

    {!! Form::open(['url' => '/tramite/alta', 'id' => 'alta_form', 'files' => true]) !!}
        <div class="row">
            <div class="form-group col-xs-12 col-sm-3">
                {{ Form::label('tipo_gestion', 'Tipo de Gestión') }}
                {{ Form::select('tipo_gestion', [''=> 'Seleccionar', '1' => 'Alta', '2' => 'Modificación'], '', ['class' => 'form-control']) }}
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                {{ Form::label('nombre', 'Nombre y Apellido') }}
                {{ Form::text('nombre', '', ['class' => 'form-control', 'placeholder' => "Roberto Gómez"]) }}
            </div>
            <div class="form-group col-xs-12 col-sm-3">
                <span id="aviso-afiliado" class="pull-right"></span>
                {{ Form::label('afiliado', 'N° Afiliado') }}
                {{ Form::text('afiliado', '', ['class' => 'form-control', 'placeholder' => "1234567890"]) }}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-12 col-sm-3">
                {{ Form::label('certificado_discapacidad', 'Certificado de Discapacidad') }}
                {{ Form::select('certificado_discapacidad', array(''=> 'Seleccionar', '1' => 'Sí', '0' => 'No'), '', ['class' => 'form-control']) }}
            </div>
            <div class="form-group col-xs-12 col-sm-3">
                {{ Form::label('resol_154_85', 'Resolución 154/85') }}
                {{ Form::select('resol_154_85', array(''=> 'Seleccionar', '1' => 'Sí', '0' => 'No'), '', ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="row pre-ocultar acollapse">
            <div class="form-group col-xs-12 col-sm-3">
                {{ Form::label('situacion_traslado', 'Situación de Traslado') }}
                {{ Form::select('situacion_traslado', array(''=> 'Seleccionar', '1' => 'Urgencia/Emergencia', '2' => 'Traslado Programado'), '', ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="row pre-ocultar acollapse">
            <div class="form-group col-xs-12 col-sm-3">
                {{ Form::label('origen_institucion', 'Institución de Origen') }}
                <select class="form-control institucion-buscar" id="institucion_origen_buscar" data-target="origen"></select>
                {{ Form::text('origen_institucion', '', ['class' => 'form-control', 'placeholder' => "Nombre de la Institución", "readonly"]) }}
            </div>
            <div class="form-group col-xs-12 col-sm-3">
                {{ Form::label('origen_direccion', 'Dirección de Origen') }}
                {{ Form::text('origen_direccion', '', ['class' => 'form-control', 'placeholder' => "Dirección de la Institución de Origen", "readonly"]) }}
            </div>
            <div class="form-group col-xs-12 col-sm-3">
                {{ Form::label('destino_institucion', 'Institución de Destino') }}
                <select class="form-control institucion-buscar" id="institucion_destino_buscar" data-target="destino"></select>
                {{ Form::text('destino_institucion', '', ['class' => 'form-control', 'placeholder' => "Nombre de la Institución", "readonly"]) }}
            </div>
            <div class="form-group col-xs-12 col-sm-3">
                {{ Form::label('destino_direccion', 'Dirección de Destino') }}
                {{ Form::text('destino_direccion', '', ['class' => 'form-control', 'placeholder' => "Dirección de la Institución de Destino", "readonly"]) }}
            </div>
        </div>
        <div class="row pre-ocultar acollapse">
            <div class="form-group col-xs-12 col-sm-3">
                {{ Form::label('tipo_traslado', 'Tipo de Traslado') }}
                {{ Form::select('tipo_traslado', array(
                    ''=> 'Seleccionar',
                    '1' => 'Local (Menor a 30km)',
                    '2' => 'Interurbano (Por km excedente desde 31 a 110km)',
                    '3' => 'Larga Distancia (110km en adelante)'),
                    '', ['class' => 'form-control']) }}
            </div>
            <div class="form-group col-xs-12 col-sm-3">
                {{ Form::label('kilometros', 'Distancia') }}
                {{ Form::text('kilometros', '', ['class' => 'form-control', 'placeholder' => "Distancia en Kilómetros"]) }}
            </div>
            <div class="form-group col-xs-12 col-sm-3">
                {{ Form::label('tipo_unidad_traslado', 'Tipo de Unidad de Traslado') }}
                {{ Form::select('tipo_unidad_traslado', array(
                    ''=> 'Seleccionar',
                    '1' => 'Ambulancia de Alta Complejidad',
                    '2' => 'Ambulancia de Baja Complejidad',
                    '3' => 'Móvil Sanitario'),
                    '', ['class' => 'form-control']) }}
            </div>
            <div class="form-group col-xs-12 col-sm-3">
                {{ Form::label('tipo_asistencia', 'Asistencia en Traslado') }}
                {{ Form::select('tipo_asistencia', array(
                    ''=> 'Seleccionar',
                    '1' => 'Con asistencia médica',
                    '2' => 'Sin asistencia médica',
                    '3' => 'Con asistencia profesional no médico',
                    '4' => 'Sin asistencia profesional no médico'),
                    '', ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="row traslados-programados-cronicos collapse">
            <div class="form-group col-xs-12 text-center">
                <h3>Traslados Programados Crónicos</h3>
            </div>
        </div>
        <div class="row traslados-programados-cronicos collapse">
            <div class="form-group col-xs-6 col-sm-3 col-sm-offset-3">
                {{ Form::label('frecuencia_semanal', 'Frecuencia Semanal') }}
                {{ Form::text('frecuencia_semanal', '', ['class' => 'form-control', 'placeholder' => "Ingresar la frecuencia semanal..."]) }}
            </div>
            <div class="form-group col-xs-6 col-sm-3">
                {{ Form::label('duracion_tratamiento', 'Duración del Tratamiento') }}
                {{ Form::text('duracion_tratamiento', '', ['class' => 'form-control', 'placeholder' => "Ingresar la duración del tratamiento..."]) }}
            </div>
        </div>
        <div class="row pre-ocultar acollapse">
            <div class="form-group col-xs-12 col-sm-3">
                {{ Form::label('requiere_espera', '¿Requiere espera en destino?') }}
                {{ Form::select('requiere_espera', array(''=> 'Seleccionar', '1' => 'Sí', '0' => 'No'), '', ['class' => 'form-control']) }}
            </div>
            <div class="form-group col-xs-12 col-sm-3">
                {{ Form::label('numero_autorizacion', 'Número de Autorización de Derivación') }}
                {{ Form::text('numero_autorizacion', '', ['class' => 'form-control', 'placeholder' => "Ingresar el número de autorización..."]) }}
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                {{ Form::label('adjunto_form', 'Formulario Adjunto') }}
                {{ Form::file('adjunto_form') }}
            </div>
        </div>
        <div class="row">
            <!--div id="tipo_tramite_div" class="form-group col-xs-12 acollapse">
                {# Form::label('tipo', 'Trámite') #}
                {# Form::select('tipo', $tipo_tramites, '', ['class' => 'form-control']) #}
            </div-->
            <div id="observaciones_div" class="form-group col-xs-12 acollapse">
                {{ Form::label('obs_alta', 'Observaciones') }}
                {{ Form::textarea('obs_alta', '', ['class' => 'form-control', 'placeholder' => "Indique observaciones"]) }}
            </div>
            <div id="submit_div" class="col-xs-12 col-sm-4 col-sm-offset-8 acollapse">
                {{ Form::submit('Guardar', ['class' => 'btn btn-success btn-block']) }}
            </div>
        </div>
        <input type="hidden" id="valido" value="0" />
    {!! Form::close() !!}

    <script type="text/javascript">
        $(document).ready(function(){
            function validar_afiliado(numero) {
                if (numero % 2 == 0) {
                    $("#valido").val(1);
                    $("#tipo_tramite_div").fadeIn();
                    $("#observaciones_div").fadeIn();
                    $(".pre-ocultar").fadeIn();
                    $("#submit_div").fadeIn();
                    $("#aviso-afiliado").html('<span class="glyphicon glyphicon-ok"></span> Afiliado validado');
                    $("#aviso-afiliado").addClass('text-success');
                    $("#aviso-afiliado").removeClass('text-danger');
                }
                else {
                    $("#valido").val(0);
                    $("#tipo_tramite_div").hide();
                    $("#observaciones_div").hide();
                    $(".pre-ocultar").hide();
                    $("#submit_div").hide();
                    $("#aviso-afiliado").html('<span class="glyphicon glyphicon-remove"></span> El Afiliado no está validado');
                    $("#aviso-afiliado").addClass('text-danger');
                    $("#aviso-afiliado").removeClass('text-success');
                }
            }
            $("#afiliado").keyup(function(e){
                var afiliado = $(this).val();
                validar_afiliado(afiliado);
            })

            $("#situacion_traslado").change(function(){
                var valor = $(this).val();
                console.log(valor);
                if (valor == 2) {
                    $(".traslados-programados-cronicos").fadeIn();
                }
                else {
                    $(".traslados-programados-cronicos").fadeOut();
                }
            })
            $("#situacion_traslado").trigger("change");

            $("#alta_form").submit(function(e){
                var valido = $("#valido").val();
                if (valido == 0) {
                    alert("Lo siento, el Afiliado no pudo ser validado.")
                    e.preventDefault();
                }
                if (($("#situacion_traslado").val() == 1) && $("#numero_autorizacion").val() == "") {
                    alert("El número de autorización es requerido para Urgencias/Emergencias")
                    e.preventDefault();
                }
            })

            $('.institucion-buscar').select2({
                placeholder: 'Buscar Institución',
                ajax: {
                    url: '/select2-autocomplete-ajax',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: item.nombre,
                                    id: item.id,
                                    direccion: item.domicilio
                                }
                            })
                        };
                    },
                    cache: false
                }
            });

            $('.institucion-buscar').change(function(){
                var target = $(this).attr('data-target');
                var data = $(this).select2('data')[0];
                $("#"+target+"_institucion").val($(this).text());
                $("#"+target+"_direccion").val(data.direccion);
            });

            $("#kilometros").keyup(function(){
                valor = parseInt($(this).val());
                if (valor <= 30) { $("#tipo_traslado").val(1); }
                if ((valor >= 31) && (valor <= 110)) { $("#tipo_traslado").val(2); }
                if (valor > 110) { $("#tipo_traslado").val(3); }
            })
        })
    </script>

@endsection

@section('sidebar')
    @parent
@endsection