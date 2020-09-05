<?php

namespace App\Http\Controllers;

use App\Enfermedad;
use App\Paciente;
use App\SubDelegacion;
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
        $subDelegaciones = SubDelegacion::all();
        return view('day.day', ['subdelegaciones' => $subDelegaciones]);
/*        $test = Paciente::whereBetween('created_at', ['2020-06-01 10:05:55', '2020-08-18 10:05:55'])->get();
        return view('day.day', ['test' => $test]);*/
/*        foreach ($test as $item) {
            $fecha = $item->created_at;
            $date = Carbon::parse($fecha);
            echo $date->isoFormat('MMMM') . '<br/>';

        }*/
    }

    public function month() {
        $subDelegacion = SubDelegacion::all();
        return view('month.month', ['subdelegaciones' => $subDelegacion]);
    }

    public function registerDay($id) {
        $month = Paciente::select(
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as Mes"),
            DB::raw('COUNT(*) AS Total')
        )
            ->groupBy('Mes')
            ->where('fk_sub_id', $id)
            ->get();
        return $month;
    }
}
