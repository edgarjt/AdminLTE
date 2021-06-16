<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function addPaciente(Request $request)
    {
        $paciente = new Paciente();
        $paciente->pac_nombre = $request->pac_nombre;
        $paciente->pac_apellidos = $request->pac_apellidos;
        $paciente->pac_edad = $request->pac_edad;
        $paciente->pac_sexo = $request->pac_sexo;
        $paciente->pac_fallecido = $request->fallecidoCheck;
        $paciente->hos_fk_id = $request->hos_fk_id;
        $paciente->save();

        return response()->json(['status' => true, 'data' => $paciente]);
    }
}
