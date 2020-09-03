<?php

namespace App\Http\Controllers;

use App\Enfermedad;
use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class GraphController extends Controller
{
    public function __construct()
    {
        $this->middleware('State');
    }

    public function day() {
        $test = Paciente::whereBetween('created_at', ['2020-06-01 10:05:55', '2020-08-18 10:05:55'])->get();
        //return view('day.day', ['test' => $test]);
        foreach ($test as $item) {
            return $item->count();
        }
    }
}
