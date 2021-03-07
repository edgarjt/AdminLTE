<?php

namespace App\Http\Controllers;

use App\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function addMunView() {
        return view('municipios.add');
    }

    public function addMun(Request $request) {
        $this->validate($request, [
            'mun_clave' => ['required', 'string', 'max:255'],
            'mun_nombre' => ['required', 'string', 'max:255'],
            'mun_siglas' => ['required', 'string', 'max:255']
        ]);

        $municipio = new Municipio();

        $municipio->mun_clave = $request->input('mun_clave');
        $municipio->mun_nombre = $request->input('mun_nombre');
        $municipio->mun_siglas = $request->input('mun_siglas');

        $municipio->save();

        if ($municipio) {

            $municipios = Municipio::all();

            return redirect()->route('getMunicipios', ['municipios' => $municipios])
                ->with(
                    ['message' => 'El municipio '.$municipio->mun_nombre . ' se registro con éxito.']
                );
        }
    }

    public function editMun($id) {

        $data = Municipio::findOrFail($id);

        return view('municipios.update', compact('data'));
    }

    public function updateMun(Request $request) {
        $this->validate($request, [
            'mun_clave' => ['required', 'string', 'max:255'],
            'mun_nombre' => ['required', 'string', 'max:255'],
            'mun_siglas' => ['required']
        ]);

        $municipio = Municipio::findOrFail($request->mun_id);

        $municipio->mun_clave = $request->mun_clave;
        $municipio->mun_nombre = $request->mun_nombre;
        $municipio->mun_siglas = $request->mun_siglas;

        $municipio->update();

        $municipios = Municipio::all();

        return redirect()->route('getMunicipios', ['municipios' => $municipios])->with(
            ['message' => 'El municipio '.$municipio->mun_nombre . ' se actualizo con éxito.']
        );

    }

    public function deleteMun($id) {
        $municipio = Municipio::findOrFail($id);
        $municipio->delete($municipio);

        $municipios = Municipio::all();

        return redirect()->route('getMunicipios', ['municipios' => $municipios])->with(
            ['message' => 'El municipio '.$municipio->mun_nombre . ' se elimino con éxito.']
        );
    }
}
