<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PacienteController extends Controller
{

    public function editPac($id) {

        $data = Paciente::findOrFail($id);

        return view('pacientes.update', compact('data'));
    }

    public function editFal($id) {

        $data = Paciente::findOrFail($id);

        return view('fallecidos.update', compact('data'));
    }

    public function updatePac(Request $request) {
        $this->validate($request, [
            'pac_nombre' => ['required'],
            'pac_apellidos' => ['required'],
            'pac_nacimiento' => ['required'],
            'pac_estado' => ['required']
        ]);

        $paciente = Paciente::findOrFail($request->pac_id);

        $paciente->pac_nombre = $request->pac_nombre;
        $paciente->pac_apellidos = $request->pac_apellidos;
        $paciente->pac_nacimiento = $request->pac_nacimiento;
        $paciente->pac_estado = $request->pac_estado;
        $paciente->fk_sub_id = $request->fk_sub_id;
        $paciente->fk_enf_id = $request->fk_enf_id;
        $paciente->fk_eme_id = $request->fk_eme_id;
        $paciente->fk_use_id = Auth::User()->id;

        $paciente->update();

        $pacientes = Paciente::all();

        return redirect()->route('getPacientes', ['pacientes' => $pacientes])->with(
            ['message' => 'El paciente '.$paciente->pac_nombre . ' '.$paciente->pac_apellidos. ' se actualizo con éxito.']
        );

    }

    public function updateFal(Request $request) {
        $this->validate($request, [
            'pac_nombre' => ['required'],
            'pac_apellidos' => ['required'],
            'pac_nacimiento' => ['required'],
            'pac_estado' => ['required']
        ]);

        $paciente = Paciente::findOrFail($request->pac_id);

        $paciente->pac_nombre = $request->pac_nombre;
        $paciente->pac_apellidos = $request->pac_apellidos;
        $paciente->pac_nacimiento = $request->pac_nacimiento;
        $paciente->pac_estado = $request->pac_estado;
        $paciente->fk_sub_id = $request->fk_sub_id;
        $paciente->fk_enf_id = $request->fk_enf_id;
        $paciente->fk_eme_id = $request->fk_eme_id;
        $paciente->fk_use_id = Auth::User()->id;

        $paciente->update();

        $fallecidos = Paciente::all();

        return redirect()->route('getFallecidos', ['fallecidos' => $fallecidos])->with(
            ['message' => 'El paciente '.$paciente->pac_nombre . ' '.$paciente->pac_apellidos. ' se actualizo con éxito.']
        );

    }


    public function deletePac($id) {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete($paciente);

        $pacientes = Paciente::all();

        return redirect()->route('getPacientes', ['pacientes' => $pacientes])->with(
            ['message' => 'El paciente '.$paciente->pac_nombre . ' '.$paciente->pac_apellidos. ' se elimino con éxito.']
        );
    }

    public function deleteFal($id) {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete($paciente);

        $fallecidos = Paciente::all();

        return redirect()->route('getFallecidos', ['fallecidos' => $fallecidos])->with(
            ['message' => 'El paciente '.$paciente->pac_nombre . ' '.$paciente->pac_apellidos. ' se elimino con éxito.']
        );
    }
}
