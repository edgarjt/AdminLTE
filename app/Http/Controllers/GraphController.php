<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GraphController extends Controller
{

    public function viewconcentrated() {
        return view('graph.graficaConcentrado');
    }

    public function registerAll($data) {

        $register = Paciente::select(
            DB::raw("DATE_FORMAT(created_at,'%m %Y') AS Mes"),
            DB::raw("COUNT(*) AS Total")
        )
            ->groupBy('Mes')
            ->orderBy('Mes', 'ASC')
            ->where([
                ['created_at', 'like', $data.'%'],
                ['pac_estado', '=', 0]
            ])
            ->get();
        return $register;
    }

    public function tipServicio(Request $request) {
        $day = Bitacora::select(
            DB::raw("DATE_FORMAT(created_at,'%d') AS Dias"),
            DB::raw("COUNT(*) AS Total")
        )
            ->groupBy('tip_servicio')
            ->whereDate('created_at', '2021-04-19')
            ->get();;
        return $day;
    }

    public function registerAllDead($data) {

        $register = Paciente::select(
            DB::raw("DATE_FORMAT(created_at,'%m %Y') AS Mes"),
            DB::raw("COUNT(*) AS Total")
        )
            ->groupBy('Mes')
            ->orderBy('Mes', 'ASC')
            ->where([
                ['created_at', 'like', $data.'%'],
                ['pac_estado', '=', 1]
            ])
            ->get();
        return $register;
    }

    public function registerDay($sub_id, $date_1, $date_2)
    {
        $day = Paciente::select(
            DB::raw("DATE_FORMAT(created_at,'%D %M %Y') AS Dias"),
            DB::raw("COUNT(*) AS Total")
        )
            ->groupBy('Dias')
            ->where([
                ['fk_sub_id', '=', $sub_id],
                ['pac_estado', '=', 0]
            ])
            ->whereBetween('created_at', [$date_1, $date_2])
            ->get();;
        return $day;

    }

    public function registerDayDeced($sub_id, $date_1, $date_2) {
        $day = Paciente::select(
            DB::raw("DATE_FORMAT(created_at,'%D %M %Y') AS Dias"),
            DB::raw("COUNT(*) AS Total")
        )
            ->groupBy('Dias')
            ->where([
                ['fk_sub_id', '=', $sub_id],
                ['pac_estado', '=', 1]
            ])
            ->whereBetween('created_at', [$date_1, $date_2])
            ->get();
        ;
        return $day;
    }

    public function registerMonth($sub_id) {
        $month = Paciente::select(
            DB::raw("DATE_FORMAT(created_at,'%m-%Y') as Meses"),
            DB::raw('COUNT(*) AS Total')
        )
            ->groupBy('Meses')
            ->orderBy('Meses', 'ASC')
            ->where([
                ['fk_sub_id', '=', $sub_id],
                ['pac_estado', '=', 0]
            ])
            ->get();

        return $month;
    }

    public function registerMonthDeced($sub_id) {
        $month = Paciente::select(
            DB::raw("DATE_FORMAT(created_at,'%m %Y') as Meses"),
            DB::raw('COUNT(*) AS Total')
        )
            ->groupBy('Meses')
            ->orderBy('Meses', 'ASC')
            ->where([
                ['fk_sub_id', '=', $sub_id],
                ['pac_estado', '=', 1]
            ])
            ->get();

        return $month;
    }

    public function registerYear($sub_id) {
        $year = Paciente::select(
            DB::raw("DATE_FORMAT(created_at,'%Y') as Year"),
            DB::raw('COUNT(*) AS Total')
        )
            ->groupBy('Year')
            ->where([
                ['fk_sub_id', '=', $sub_id],
                ['pac_estado', '=', 0]
            ])
            ->get();
        return $year;
    }

    public function registerYearDeced($sub_id) {
        $year = Paciente::select(
            DB::raw("DATE_FORMAT(created_at,'%Y') as Year"),
            DB::raw('COUNT(*) AS Total')
        )
            ->groupBy('Year')
            ->where([
                ['fk_sub_id', '=', $sub_id],
                ['pac_estado', '=', 1]
            ])
            ->get();
        return $year;
    }
}
