<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\Reportes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    public function addPacView() {
        return view('pacientes.add');
    }

    public function addFalView() {
        return view('fallecidos.add');
    }

    public function addPac(Request $request) {
        $this->validate($request, [
            'pac_nombre' => ['required', 'string', 'max:255'],
            'pac_apellidos' => ['required', 'string', 'max:255'],
            'pac_nacimiento' => ['required', 'string', 'max:255'],
            'fk_sub_id' => ['required', 'string', 'max:255'],
            'fk_enf_id' => ['required', 'string', 'max:255'],
            'fk_eme_id' => ['required', 'string', 'max:255'],
        ]);

        $paciente = new Paciente();

        $paciente->pac_nombre = $request->input('pac_nombre');
        $paciente->pac_apellidos = $request->input('pac_apellidos');
        $paciente->pac_nacimiento = $request->input('pac_nacimiento');
        $paciente->pac_estado = 0;
        $paciente->fk_sub_id = $request->input('fk_sub_id');
        $paciente->fk_enf_id = $request->input('fk_enf_id');
        $paciente->fk_eme_id = $request->input('fk_eme_id');
        $paciente->fk_use_id = Auth::User()->id;

        $paciente->save();

        if ($paciente) {
            $pacientes = Paciente::all();

            return redirect()->route('getPacientes', ['pacientes' => $pacientes])->with(
                ['message' => 'El paciente '.$paciente->pac_nombre . ' '.$paciente->pac_apellidos. ' se registro con éxito.']
            );
        }
    }

    public function addFal(Request $request) {
        $this->validate($request, [
            'pac_nombre' => ['required', 'string', 'max:255'],
            'pac_apellidos' => ['required', 'string', 'max:255'],
            'pac_nacimiento' => ['required', 'string', 'max:255'],
            'fk_sub_id' => ['required', 'string', 'max:255'],
            'fk_enf_id' => ['required', 'string', 'max:255'],
            'fk_eme_id' => ['required', 'string', 'max:255'],
        ]);

        $paciente = new Paciente();

        $paciente->pac_nombre = $request->input('pac_nombre');
        $paciente->pac_apellidos = $request->input('pac_apellidos');
        $paciente->pac_nacimiento = $request->input('pac_nacimiento');
        $paciente->pac_estado = 1;
        $paciente->fk_sub_id = $request->input('fk_sub_id');
        $paciente->fk_enf_id = $request->input('fk_enf_id');
        $paciente->fk_eme_id = $request->input('fk_eme_id');
        $paciente->fk_use_id = Auth::User()->id;

        $paciente->save();

        if ($paciente) {
            $fallecidos = Paciente::all();

            return redirect()->route('getFallecidos', ['fallecidos' => $fallecidos])->with(
                ['message' => 'El fallecido '.$paciente->pac_nombre . ' '.$paciente->pac_apellidos. ' se registro con éxito.']
            );
        }
    }


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

    public function reports() {
        $data = Reportes::all();
        return view('reports.reports', ['reportes' => $data]);
    }
}
