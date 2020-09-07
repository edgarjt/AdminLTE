<?php

namespace App\Http\Controllers;

use App\Enfermedad;
use Illuminate\Http\Request;

class EnfermedadController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function editEnf($id) {

        $data = Enfermedad::findOrFail($id);

        return view('enfermedades.update', compact('data'));
    }

    public function updateEnf(Request $request) {
        $this->validate($request, [
            'enf_nombre' => ['required', 'string', 'max:255'],
        ]);

        $enfermedad = Enfermedad::findOrFail($request->enf_id);

        $enfermedad->enf_nombre = $request->enf_nombre;

        $enfermedad->update();

        $enfermedades = Enfermedad::all();

        return redirect()->route('getEnfermedades', ['enfermedades' => $enfermedades])->with(
            ['message' => 'La enfermedad '.$enfermedad->enf_nombre . ' se actualizo con éxito.']
        );

    }

    public function deleteEnf($id) {
        $enfermedad = Enfermedad::findOrFail($id);
        $enfermedad->delete($enfermedad);

        $enfermedades = Enfermedad::all();

        return redirect()->route('getEnfermedades', ['enfermedades' => $enfermedades])->with(
            ['message' => 'La enfermedad '.$enfermedad->enf_nombre . ' se elimino con éxito.']
        );
    }
}
