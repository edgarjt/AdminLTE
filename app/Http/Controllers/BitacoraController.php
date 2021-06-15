<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\Exports\BitacoraExports;
use App\Paciente;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BitacoraController extends Controller
{
    private $log;

    public function records() {
        return view('bitacora.bitacora');
    }

    public function formRecords() {
        return view('bitacora.add');
    }

    public function contrated() {
        $reports = Excel::download(new BitacoraExports, 'test.xls');
        return $reports;

    }

    public function addRecords(Request $request) {

        try {
            $paciente = Paciente::where('pac_id', $request->pac_fk_id)->first();
            $paciente->hos_fk_id = $request->hos_fk_id;
            $paciente->update();

            if (is_null($paciente))
                return response()->json(['status' => false, 'message' => 'No se pudo actualizar el paciente']);


            $bitacora = new Bitacora();
            $bitacora->bit_hora_llamada = $request->bit_hora_llamada;
            $bitacora->bit_hora_salida = $request->bit_hora_salida;
            $bitacora->bit_hora_llegada = $request->bit_hora_llegada;
            $bitacora->bit_num_ambulancia = $request->bit_num_ambulancia;
            $bitacora->bit_hora_traslado = $request->bit_hora_traslado;
            $bitacora->bit_llegada_hospital = $request->bit_llegada_hospital;
            $bitacora->bit_llegada_base = $request->bit_llegada_base;

            $bitacora->bit_nombre_operador = $request->bit_nombre_operador;
            $bitacora->bit_nombre_paramedico = $request->bit_nombre_paramedico;
            $bitacora->bit_dir_servicio = $request->bit_dir_servicio;
            $bitacora->bit_km_salida_base = $request->bit_km_salida_base;
            $bitacora->bit_km_llegada_base = $request->bit_km_llegada_base;
            $bitacora->bit_folio_frap = $request->bit_folio_frap;
            $bitacora->bit_folio_c4 = $request->bit_folio_c4;
            $bitacora->bit_tel_reporte = $request->bit_tel_reporte;
            $bitacora->bit_situacion_traslado = $request->bit_situacion_traslado;
            $bitacora->tip_servicio_fk_id = $request->tip_servicio_fk_id;
            $bitacora->delegacion_fk_id = $request->delegacion_fk_id;
            $bitacora->pac_fk_id = $request->pac_fk_id;
            $bitacora->save();

            if (!is_null($bitacora)) {
                return response()->json(['status' => true, 'message' => 'Bitacora guardado']);
            }

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
