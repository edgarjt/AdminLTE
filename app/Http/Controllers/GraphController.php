<?php

namespace App\Http\Controllers;

use App\Enfermedad;
use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function __construct()
    {
        $this->middleware('State');
    }

    public function day() {
        $enfermedades = Enfermedad::all();
        return view('day.day', ['test' => $enfermedades]);
    }
}
