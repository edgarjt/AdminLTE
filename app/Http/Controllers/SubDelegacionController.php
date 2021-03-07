<?php

namespace App\Http\Controllers;

use App\SubDelegacion;
use Illuminate\Http\Request;

class SubDelegacionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function addSubView() {
        return view('subDelegaciones.add');
    }

    public function addSub(Request $request) {
        $this->validate($request, [
            'sub_nombre' => ['required', 'string', 'max:255'],
            'sub_descripcion' => ['required', 'string', 'max:255'],
            'sub_calle' => ['required', 'string', 'max:255'],
            'fk_mun_id' => ['required', 'string', 'max:255'],
        ]);

        $subdelegacion = new SubDelegacion();

        $subdelegacion->sub_nombre = $request->input('sub_nombre');
        $subdelegacion->sub_descripcion = $request->input('sub_descripcion');
        $subdelegacion->sub_calle = $request->input('sub_calle');
        $subdelegacion->fk_mun_id = $request->input('fk_mun_id');

        $subdelegacion->save();

        if ($subdelegacion) {
            $subdelegaciones = SubDelegacion::all();

            return redirect()->route('getSubDelegaciones', ['subDelegaciones' => $subdelegaciones])->with(
                ['message' => 'La sub delagación '.$subdelegacion->sub_nombre . ' se registro con éxito.']
            );
        }
    }

    public function editSub($id) {

        $data = SubDelegacion::findOrFail($id);

        return view('subDelegaciones.update', compact('data'));
    }

    public function updateSub(Request $request) {
        $this->validate($request, [
            'sub_nombre' => ['required', 'string', 'max:255'],
            'sub_descripcion' => ['required', 'string', 'max:255'],
            'sub_calle' => ['required', 'string', 'max:255'],
            'fk_mun_id' => ['required', 'string', 'max:255'],
        ]);

        $subDelegacion = SubDelegacion::findOrFail($request->sub_id);

        $subDelegacion->sub_nombre = $request->sub_nombre;
        $subDelegacion->sub_descripcion = $request->sub_descripcion;
        $subDelegacion->sub_calle = $request->sub_calle;
        $subDelegacion->fk_mun_id = $request->fk_mun_id;

        $subDelegacion->update();

        $subdelegaciones = SubDelegacion::all();

        return redirect()->route('getSubDelegaciones', ['subDelegaciones' => $subdelegaciones])->with(
            ['message' => 'La sub delagación '.$subDelegacion->sub_nombre . ' se actualizo con éxito.']
        );

    }

    public function deleteSub($id) {
        $subdelegacion = SubDelegacion::findOrFail($id);
        $subdelegacion->delete($subdelegacion);

        $subdelegaciones = SubDelegacion::all();

        return redirect()->route('getSubDelegaciones', ['subDelegaciones' => $subdelegaciones])->with(
            ['message' => 'La sub delagación'.$subdelegacion->sub_nombre . ' se elimino con éxito.']
        );
    }
}
