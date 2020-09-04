<?php

namespace App\Http\Controllers;

use App\Enfermedad;
use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GraphController extends Controller
{
    public function __construct()
    {
        $this->middleware('State');
    }

    public function day() {
        return view('day.day');
/*        $test = Paciente::whereBetween('created_at', ['2020-06-01 10:05:55', '2020-08-18 10:05:55'])->get();
        return view('day.day', ['test' => $test]);*/
/*        foreach ($test as $item) {
            $fecha = $item->created_at;
            $date = Carbon::parse($fecha);
            echo $date->isoFormat('MMMM') . '<br/>';

        }*/
    }

    public function registerDay() {
/*        $getPacientes = Paciente::all();
        return $getPacientes;*/
        $test = Paciente::whereBetween('created_at', ['2020-06-01 10:05:55', '2020-08-18 10:05:55'])->all();
        return $test->subdelegacion->sub_nombre;
    }
}
