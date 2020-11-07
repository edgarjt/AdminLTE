<?php

namespace App\Http\Controllers;

use App\Historial;
use App\Paciente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade as PDF;

class ReportsController extends Controller
{
    public function getReports() {
        //return view('reportsMedico.reportsMedico');
        $pacientes = Paciente::all();

        if (isset($pacientes)) {
            return view('reportsMedico.reportsMedico', ['pacientes' => $pacientes]);
        }

        return response()->json(['response' => false], 400);
    }

    public function reportsPaciente($pac_clave, $pac_nombre, $pac_apellidos) {
        $data = Historial::where('fk_pac_clave', $pac_clave)->get();

        $date = Carbon::now();
        $fecha = $date->format('d-m-y');

        $pdf = PDF::loadView('reportsMedico.reportsDocument', ['data'=>$data, 'fecha'=>$fecha, 'nombre'=>$pac_nombre, 'apellidos'=>$pac_apellidos]);

        return $pdf->stream('test.pdf');

        //return view('reportsMedico.reportsDocument', ['reports' => $data, 'fecha'=>$fecha, 'nombre'=>$pac_nombre, 'apellidos'=>$pac_apellidos]);
    }
}
