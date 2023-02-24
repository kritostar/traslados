<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tramite;
use App\TipoTramite;
use File;
use FPDI;
use DB;

class TramitesController extends Controller
{
    public function home(){
        $tramites = Tramite::all();
        $tipo_tramites = TipoTramite::pluck('nombre', 'id');
        return view('home')->with('tramites', $tramites)->with('tipo_tramites', $tipo_tramites);
    }

    public function ver(Request $request, $id_tramite){
        $tramite = Tramite::find($id_tramite);
        $tipo_tramites = TipoTramite::pluck('nombre', 'id');
        return view('ver')->with('tramite', $tramite)->with('tipo_tramites', $tipo_tramites);
    }

    public function pdf(Request $request, $id_tramite){
        $tramite = Tramite::find($id_tramite);
        $tipo_tramites = TipoTramite::pluck('nombre', 'id');
        $lista_codigos = $tramite->coseguro_detalle != null ? json_decode($tramite->coseguro_detalle, true) : null;
        return view('pdf')->with('tramite', $tramite)->with('tipo_tramites', $tipo_tramites)->with('lista_codigos', $lista_codigos);
    }

    public function alta(){
        $tipo_tramites = TipoTramite::pluck('nombre', 'id');
        return view('tramite-alta')->with('tipo_tramites', $tipo_tramites);
    }

    public function submit(Request $request){
        $this->validate($request, [
            'tipo_gestion' => 'required',
            'nombre' => 'required',
            'afiliado' => 'required',
            'certificado_discapacidad' => 'required',
            'resol_154_85' => 'required',
            'situacion_traslado' => 'required',
            'origen_institucion' => 'required',
            'origen_direccion' => 'required',
            'destino_institucion' => 'required',
            'destino_direccion' => 'required',
            'tipo_traslado' => 'required',
            'kilometros' => 'required',
            'tipo_unidad_traslado' => 'required',
            'tipo_asistencia' => 'required',
            'requiere_espera' => 'required',
            'valido' => 'valido',
        ]);
        if($request->input('situacion_traslado') == 2) {
            $this->validate($request, [
                'frecuencia_semanal' => 'required',
                'duracion_tratamiento' => 'required',
            ]);
        }

        $tramite = new Tramite;
        $tramite->tipo_gestion = $request->input('tipo_gestion');
        $tramite->nombre = $request->input('nombre');
        $tramite->afiliado = $request->input('afiliado');

        $tramite->certificado_discapacidad = $request->input('certificado_discapacidad');
        $tramite->resol_154_85 = $request->input('resol_154_85');
        $tramite->situacion_traslado = $request->input('situacion_traslado');
        $tramite->origen_institucion = $request->input('origen_institucion');
        $tramite->origen_direccion = $request->input('origen_direccion');
        $tramite->destino_institucion = $request->input('destino_institucion');
        $tramite->destino_direccion = $request->input('destino_direccion');
        $tramite->tipo_traslado = $request->input('tipo_traslado');
        $tramite->kilometros = $request->input('kilometros');
        $tramite->tipo_unidad_traslado = $request->input('tipo_unidad_traslado');
        $tramite->tipo_asistencia = $request->input('tipo_asistencia');
        $tramite->frecuencia_semanal = $request->input('frecuencia_semanal');
        $tramite->duracion_tratamiento = $request->input('duracion_tratamiento');
        $tramite->requiere_espera = $request->input('requiere_espera');
        $tramite->numero_autorizacion = @$request->input('numero_autorizacion');
        $tramite->obs_alta = $request->input('obs_alta');
        $tramite->estado = 1;

        if($tramite->save()) {

            if ($request->file('adjunto_form')) {
                $directorio = sprintf(
                    "%s--%s",
                    $tramite->id,
                    $tramite->afiliado
                );
                @File::makeDirectory(public_path().'/'.'adjuntos/'.$directorio,0777,true);
                $adjunto_form = $request->file('adjunto_form');
                $filename = $adjunto_form->getClientOriginalName();
                $success = $adjunto_form->move(public_path().'/adjuntos/'.$directorio, "form-".$filename);
                if ($success) {
                    $tramite->adjunto_form = "form-".$filename;
                }
                $tramite->save();
            }

        }

        return redirect('/')->with('success', 'Guardado con éxito');
    }

    public function submit_medico(Request $request){
        $this->validate($request, [
            'medico' => 'required',
            'obs_medico' => 'required',
        ]);
        $file = $request->file('adjunto_form');
        $id_tramite = $request->input('id_tramite');
        $tramite = Tramite::find($id_tramite);

        $tramite->medico = $request->input('medico');
        $tramite->obs_medico = $request->input('obs_medico');

        $directorio = sprintf(
            "%s--%s",
            $id_tramite,
            $tramite->afiliado
        );
        @File::makeDirectory(public_path().'/'.'adjuntos/'.$directorio,0777,true);
        $adjunto_form = $request->file('adjunto_otros_1');
        $filename = $adjunto_form->getClientOriginalName();
        $success = $adjunto_form->move(public_path().'/adjuntos/'.$directorio, "otros-1".$filename);
        if ($success) {
            @$tramite->adjunto_otros_1 = "otros-1".$filename;
        }
        @File::makeDirectory(public_path().'/'.'adjuntos/'.$directorio,0777,true);
        $adjunto_form = $request->file('adjunto_otros_2');
        $filename = $adjunto_form->getClientOriginalName();
        $success = $adjunto_form->move(public_path().'/adjuntos/'.$directorio, "otros-2".$filename);
        if ($success) {
            @$tramite->adjunto_otros_2 = "otros-2".$filename;
        }

        $tramite->estado = 2;

        $tramite->save();

        return redirect('/tramite/'.$id_tramite.'/ver')->with('success', 'Guardado con éxito');
    }

    public function auditar(Request $request, $id_tramite){
        $tramite = Tramite::find($id_tramite);
        $tipo_tramites = TipoTramite::pluck('nombre', 'id');
        $lista_codigos = $tramite->coseguro_detalle != null ? json_decode($tramite->coseguro_detalle, true) : null;
        return view('auditar')->with('tramite', $tramite)->with('tipo_tramites', $tipo_tramites)->with('lista_codigos', $lista_codigos);
    }

    public function submit_auditor(Request $request){
        $this->validate($request, [
            'estado' => 'required',
            'coseguro' => 'required',
        ]);

        $id_tramite = $request->input('id_tramite');
        $tramite = Tramite::find($id_tramite);
        $tramite->estado = $request->input('estado');
        $tramite->obs_audit = $request->input('obs_audit');
        $tramite->coseguro = $request->input('coseguro');
        $tramite->coseguro_detalle = $request->input('coseguro_detalle');
        $tramite->valor_coseguro = floatval($request->input('valor_coseguro'));
        $tramite->porcentaje_coseguro = floatval($request->input('porcentaje_coseguro'));
        $tramite->valor_coseguro_ajustado = floatval($request->input('valor_coseguro_ajustado'));

        $tramite->save();

        return redirect('/')->with('success', 'Estado guardado con éxito');
    }

    public function eliminar(Request $request, $id_tramite){
        $tramite = Tramite::find($id_tramite);
        $tipo_tramites = TipoTramite::pluck('nombre', 'id');
        $lista_codigos = $tramite->coseguro_detalle != null ? json_decode($tramite->coseguro_detalle, true) : null;
        return view('eliminar')->with('tramite', $tramite)->with('tipo_tramites', $tipo_tramites)->with('lista_codigos', $lista_codigos);
    }

    public function submit_eliminar(Request $request){

        $id_tramite = $request->input('id_tramite');
        $tramite = Tramite::find($id_tramite);
        $tramite->delete();

        return redirect('/')->with('success', 'Eliminado con éxito');
    }

    public function dataAjax(Request $request) {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("instituciones")
                ->select("id", "nombre", "domicilio")
                ->where('nombre','LIKE',"%$search%")
                ->get();
        }

        return response()->json($data);
    }

}
