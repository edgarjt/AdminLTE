<?php

namespace App\Http\Controllers;

use App\Bitacora;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class BitacoraController extends Controller
{
    private $log;

    public function records() {
        return view('bitacora.bitacora');
    }

    public function formRecords() {
        return view('bitacora.add');
    }

    public function addRecords(Request $request) {

        try {
            $this->validate($request, [
                'hora_llamada'          =>   ['required'],
                'hora_salida'           =>   ['required'],
                'hora_llegada'          =>   ['required'],
                'num_ambulancia'        =>   ['required'],
                'tip_servicio'          =>   ['required'],
                'nombre_operador'       =>   ['required'],
                'nombre_paramedico'     =>   ['required'],
                'dir_servicio'          =>   ['required'],
                'km_salida_base'        =>   ['required'],
                'km_llegada_base'       =>   ['required'],
                'folio_frap'            =>   ['required'],
                'folio_c4'              =>   ['required'],
                'tel_reporte'           =>   ['required'],
                'situacion_traslado'    =>   ['required']
            ]);

            $bitacora = new Bitacora();
            $bitacora->hora_llamada         =  $request->hora_llamada;
            $bitacora->hora_salida          =  $request->hora_salida;
            $bitacora->hora_llegada         =  $request->hora_llegada;
            $bitacora->num_ambulancia       =  $request->num_ambulancia;
            $bitacora->tip_servicio         =  $request->tip_servicio;
            $bitacora->nombre_paciente      =  $request->nombre_paciente;
            $bitacora->apellidos_paciente   =  $request->apellidos_paciente;
            $bitacora->edad_paciente        =  $request->edad_paciente;
            $bitacora->sexo_paciente        =  $request->sexo_paciente;
            $bitacora->hora_traslado        =  $request->hora_traslado;
            $bitacora->hospital_traslado    =  $request->hospital_traslado;
            $bitacora->llegada_hospital     =  $request->llegada_hospital;
            $bitacora->llegada_base         =  $request->llegada_base;
            $bitacora->nombre_operador      =  $request->nombre_operador;
            $bitacora->nombre_paramedico    =  $request->nombre_paramedico;
            $bitacora->dir_servicio         =  $request->dir_servicio;
            $bitacora->km_salida_base       =  $request->km_salida_base;
            $bitacora->km_llegada_base      =  $request->km_llegada_base;
            $bitacora->folio_frap           =  $request->folio_frap;
            $bitacora->folio_c4             =  $request->folio_c4;
            $bitacora->tel_reporte          =  $request->tel_reporte;
            $bitacora->situacion_traslado   =  $request->situacion_traslado;
            $bitacora->veces_atendido       =  1;
            $bitacora->save();

            if (is_null($bitacora)) {
                return redirect()->route('records')->with(
                    ['messajeError' => 'Ocurrio un errora al registrar al paciente']
                );
            }

            return redirect()->route('records')->with(
                ['message' => 'Paciente agregado a la bitacora']
            );

        }catch (\Exception $e) {
            logger('Exception: ' . $e->getMessage());
            return redirect()->route('records')->with(
                ['messageError' => 'Interval server error 505']
            );
        }
    }

    public function searchRecords(Request $request) {
        try {
            $search_paciente = Bitacora::where([
                ['nombre_paciente', '=', $request->name_paciente],
                ['apellidos_paciente', '=', $request->apellidos_paciente]
            ])->first();

            if (!is_null($search_paciente)) {
                return response()->json(['status' => true, 'message' => 'El usuario ya está registrado con los datos', 'data' => $search_paciente], 200);
            }

            return response()->json(['status' => false, 'message' => 'Usuario nuevo'], 200);
        }catch (\Exception $e) {
            logger('Exception: ' . $e->getMessage());
            return redirect()->route('records')->with(
                ['messageError' => 'Interval server error 505']
            );
        }
    }

    public function deleteRecords(Request $request) {
        try {
            $bitacora = Bitacora::where('id', $request->id)->first();
            if (is_null($bitacora))
                return response()->json(['status' => false, 'message' => 'Ocurrio un error interno, no se encontro el registro']);

            $bitacora->delete();
            return response()->json(['status' => true, 'message' => 'El registro se borro correctamente']);


        } catch (\Exception $e) {
            logger('Exception: ' . $e->getMessage());
            return redirect()->route('records')->with(
                ['messageError' => 'Interval server error 505']
            );
        }
    }
}
