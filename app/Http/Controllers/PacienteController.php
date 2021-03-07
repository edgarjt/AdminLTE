<?php

namespace App\Http\Controllers;

use App\Emergencia;
use App\Enfermedad;
use App\Historial;
use App\Paciente;
use App\Reportes;
use App\SubDelegacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            'fk_sub_id' => ['required', 'string', 'max:255'],
            'fk_enf_id' => ['required', 'string', 'max:255'],
            'fk_eme_id' => ['required', 'string', 'max:255'],
        ]);

        $clave_pac = substr(time(),5).Str::random(5);

        $paciente = new Paciente();

        $paciente->pac_clave = $clave_pac;
        $paciente->pac_nombre = $request->input('pac_nombre');
        $paciente->pac_apellidos = $request->input('pac_apellidos');
        $paciente->pac_estado = 0;
        $paciente->fk_sub_id = $request->input('fk_sub_id');
        $paciente->fk_enf_id = $request->input('fk_enf_id');
        $paciente->fk_eme_id = $request->input('fk_eme_id');
        $paciente->fk_use_id = Auth::User()->id;

        $paciente->save();

        $historial = new Historial();

        $historial->fk_pac_clave = $clave_pac;
        $historial->fk_sub_id = $request->input('fk_sub_id');
        $historial->fk_enf_id = $request->input('fk_enf_id');
        $historial->fk_eme_id = $request->input('fk_eme_id');
        $historial->fk_use_id = Auth::User()->id;

        $historial->save();

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
            'fk_sub_id' => ['required', 'string', 'max:255'],
            'fk_enf_id' => ['required', 'string', 'max:255'],
            'fk_eme_id' => ['required', 'string', 'max:255'],
        ]);

        $paciente = new Paciente();

        $paciente->pac_nombre = $request->input('pac_nombre');
        $paciente->pac_apellidos = $request->input('pac_apellidos');
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
            'pac_estado' => ['required']
        ]);

        $paciente = Paciente::findOrFail($request->pac_id);
        //historial

        $historial = new Historial();

        $historial->fk_pac_clave = $paciente->pac_clave;
        $historial->fk_sub_id = $request->fk_sub_id;
        $historial->fk_enf_id = $request->fk_enf_id;
        $historial->fk_eme_id = $request->fk_enf_id;
        $historial->fk_use_id = Auth::User()->id;

        $historial->save();


        //Actualizar paciente
        $paciente->pac_nombre = $request->pac_nombre;
        $paciente->pac_apellidos = $request->pac_apellidos;
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
            'pac_estado' => ['required']
        ]);

        $paciente = Paciente::findOrFail($request->pac_id);

        $paciente->pac_nombre = $request->pac_nombre;
        $paciente->pac_apellidos = $request->pac_apellidos;
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

    public function reportsData($sub = null, $eme = null, $enf = null, $p2=null) {


        if ($sub && $eme!='null' && $enf && $p2!='p2') {

            $pacientes = Paciente::where([
                'fk_sub_id' => $sub, 'fk_eme_id' => $eme, 'fk_enf_id' => $enf
            ])
                ->select('fk_sub_id', 'fk_enf_id', 'fk_eme_id')
                ->with('subdelegacion:sub_id,sub_nombre')
                ->with('emergencia:eme_id,eme_tipo')
                ->with('enfermedad:enf_id,enf_nombre')
                ->get();
            return $pacientes;

        } elseif($sub && $eme!='null') {
            $pacientes = Paciente::where([
                'fk_sub_id' => $sub, 'fk_eme_id' => $eme
            ])
                ->select('fk_sub_id', 'fk_enf_id', 'fk_eme_id')
                ->with('subdelegacion:sub_id,sub_nombre')
                ->with('emergencia:eme_id,eme_tipo')
                ->with('enfermedad:enf_id,enf_nombre')
                ->get();

           return $pacientes;

        } elseif($sub && $eme=='null' && $enf && $p2=='p2') {
            $pacientes = Paciente::where([
                'fk_sub_id' => $sub, 'fk_enf_id' => $enf
            ])
                ->select('fk_sub_id', 'fk_enf_id', 'fk_eme_id')
                ->with('subdelegacion:sub_id,sub_nombre')
                ->with('emergencia:eme_id,eme_tipo')
                ->with('enfermedad:enf_id,enf_nombre')
                ->get();
            return $pacientes;

        }elseif( $sub && $eme=='null' && $enf=='null' && $p2=='null') {
            $pacientes = Paciente::where([
                'fk_sub_id' => $sub
            ])
                ->select('fk_sub_id', 'fk_enf_id', 'fk_eme_id')
                ->with('subdelegacion:sub_id,sub_nombre')
                ->with('emergencia:eme_id,eme_tipo')
                ->with('enfermedad:enf_id,enf_nombre')
                ->get();

            return $pacientes;

        }

/*        $data = Paciente::select(
            DB::raw('fk_sub_id as sub_delegacion'),
            DB::raw("fk_eme_id as emergencia"),
            DB::raw("fk_enf_id as enfermedad"),
            DB::raw("COUNT(*) as total_emergenci    a")
        )
            ->groupBy('sub_delegacion', 'emergencia')
            ->get();*/
/*        $data = Reportes::all();
        return view('reports.reports', ['reports' => $data]);*/
    }

    public function reports() {
        $sub = SubDelegacion::all();
        $eme = Emergencia::all();
        $enfermedad = Enfermedad::all();

        return view('reports.reports', [
            'sub_delegacion' => $sub,
            'emergencia' => $eme,
            'enfermedad' => $enfermedad
        ]);
    }
}
