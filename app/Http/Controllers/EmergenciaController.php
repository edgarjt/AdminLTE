<?php

namespace App\Http\Controllers;

use App\Emergencia;
use Illuminate\Http\Request;

class EmergenciaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function addEmeView() {
        return view('emergencias.add');
    }

    public function addEme(Request $request) {
        $this->validate($request, [
            'eme_tipo' => ['required', 'string', 'max:255'],
        ]);

        $emergencia = new Emergencia();

        $emergencia->eme_tipo = $request->input('eme_tipo');

        $emergencia->save();

        if ($emergencia) {
            $emergencias = Emergencia::all();

            return redirect()->route('getEmergencias', ['emergencias' => $emergencias])->with(
                ['message' => 'La emergencia '.$emergencia->eme_tipo . ' se registro con éxito.']
            );
        }
    }

    public function editEme($id) {

        $data = Emergencia::findOrFail($id);

        return view('emergencias.update', compact('data'));
    }

    public function updateEme(Request $request) {
        $this->validate($request, [
            'eme_tipo' => ['required', 'string', 'max:255'],
        ]);

        $emergencia = Emergencia::findOrFail($request->eme_id);

        $emergencia->eme_tipo = $request->eme_tipo;

        $emergencia->update();

        $emergencias = Emergencia::all();

        return redirect()->route('getEmergencias', ['emergencias' => $emergencias])->with(
            ['message' => 'La emergencia '.$emergencia->eme_tipo . ' se actualizo con éxito.']
        );

    }

    public function deleteEme($id) {
        $emergencia = Emergencia::findOrFail($id);
        $emergencia->delete($emergencia);

        $emergencias = Emergencia::all();

        return redirect()->route('getEmergencias', ['emergencias' => $emergencias])->with(
            ['message' => 'La emergencia '.$emergencia->eme_tipo . ' se elimino con éxito.']
        );
    }
}
