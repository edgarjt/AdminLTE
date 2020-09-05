<?php

namespace App\Http\Controllers;

use App\Enfermedad;
use App\Fallecido;
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
    }

    public function month() {
        $subDelegacion = SubDelegacion::all();
        return view('month.month', ['subdelegaciones' => $subDelegacion]);
    }

    public function year() {
        $subDelegacion = SubDelegacion::all();
        return view('year.year', ['subdelegaciones' => $subDelegacion]);
    }

    public function deceased() {
        $subDelegacion = SubDelegacion::all();
        return view('deceased.deceased', ['subdelegaciones' => $subDelegacion]);
    }

    public function registerDay($sub_id, $date_1, $date_2) {
        $day = Paciente::select(
            DB::raw("DATE_FORMAT(created_at,'%D %M %Y') AS Dias"),
            DB::raw("COUNT(*) AS Total")
        )
            ->groupBy('Dias')
/*            ->where([
                ['fk_sub_id', '=', $sub_id],
                ['created_at', '=', '2020-11-25']
        ])*/
            ->where('fk_sub_id', $sub_id)
            ->whereBetween('created_at', [$date_1, $date_2])
            ->get();
        ;
        return $day;

    }

    public function registerMonth($sub_id) {
        $month = Paciente::select(
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as Meses"),
            DB::raw('COUNT(*) AS Total')
        )
            ->groupBy('Meses')
            ->where('fk_sub_id', $sub_id)
            ->get();

        return $month;
    }

    public function registerYear($sub_id) {
        $year = Paciente::select(
            DB::raw("DATE_FORMAT(created_at,'%Y') as Year"),
            DB::raw('COUNT(*) AS Total')
        )
            ->groupBy('Year')
            ->where('fk_sub_id', $sub_id)
            ->get();
        return $year;
    }
}
