<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\Exports\graphExports;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class GraphController extends Controller
{

    public function viewconcentrated() {
        return view('graph.graficaConcentrado');
    }

/*$q->whereDay('created_at', '=', date('d'));
$q->whereMonth('created_at', '=', date('m'));
$q->whereYear('created_at', '=', date('Y'));*/
    public function tipServicio(Request $request)
    {
        switch ($request->action) {
            case "day":
                $day = Bitacora::select(
                    DB::raw("DATE_FORMAT(created_at,'%d-%m-%y') AS dia"),
                    DB::raw("COUNT(*) AS total"),
                    DB::raw("tip_servicio")
                )
                    ->with('servicio:id,emergencia')
                    ->groupBy('tip_servicio')
                    ->whereDate('created_at', $request->date)
                    ->get();

                if ($request->report == "1") {
                    return $this->concentrated($day);
                }
                return response()->json(['type' => 'Servicios por día', 'data' => $day]);

            case "month":
                $dateMonth = Carbon::createFromDate($request->date)->month;
                $dateYear = Carbon::createFromDate($request->date)->year;
                $month = Bitacora::select(
                    DB::raw("DATE_FORMAT(created_at,'%d-%m-%y') AS mes"),
                    DB::raw("COUNT(*) AS total"),
                    DB::raw("tip_servicio")
                )
                    ->with('servicio:id,emergencia')
                    ->groupBy('tip_servicio')
                    ->whereMonth('created_at', $dateMonth)
                    ->whereYear('created_at', $dateYear)
                    ->get();
                if ($request->report == "1") {
                    return $this->concentrated($month);
                }
                return response()->json(['type' => 'Servicios por mes', 'data' => $month]);

            case "twoMonth":
                $twoMonthDate = Carbon::createFromDate($request->date)->addMonth(2);
                $twoMonth = Bitacora::select(
                    DB::raw("DATE_FORMAT(created_at,'%d-%m-%y') AS mes"),
                    DB::raw("COUNT(*) AS total"),
                    DB::raw("tip_servicio")
                )
                    ->with('servicio:id,emergencia')
                    ->groupBy('tip_servicio')
                    //->whereDate('created_at', $request->date)
                    ->whereBetween('created_at', [$request->date, $twoMonthDate])
                    ->get();
                if ($request->report == "1") {
                    return $this->concentrated($twoMonth);
                }
                return response()->json(['type' => 'Servicios por bimestre', 'data' => $twoMonth]);

            case "year":
                $year = Bitacora::select(
                    DB::raw("DATE_FORMAT(created_at,'%d-%m-%y') AS year"),
                    DB::raw("COUNT(*) AS total"),
                    DB::raw("tip_servicio")
                )
                    ->with('servicio:id,emergencia')
                    ->groupBy('tip_servicio')
                    ->whereYear('created_at', $request->date)
                    ->get();

                if ($request->report == "1") {
                    return $this->concentrated($year);
                }

                return response()->json(['type' => 'Servicios por año', 'data' => $year]);
        }
    }

    public function tipServicioDelegacion(Request $request)
    {
        switch ($request->action) {
            case "day":
                $day = Bitacora::select(
                    DB::raw("DATE_FORMAT(created_at,'%d-%m-%y') AS dia"),
                    DB::raw("COUNT(*) AS total"),
                    DB::raw("tip_servicio")
                )
                    ->with('servicio:id,emergencia')
                    ->groupBy('tip_servicio')
                    ->where('delegacion', $request->delegacion)
                    ->whereDate('created_at', $request->date)
                    ->get();

                if ($request->report == "1") {
                    return $this->concentrated($day);
                }
                return response()->json(['type' => 'Servicios por día', 'data' => $day]);

            case "month":
                $dateMonth = Carbon::createFromDate($request->date)->month;
                $dateYear = Carbon::createFromDate($request->date)->year;
                $month = Bitacora::select(
                    DB::raw("DATE_FORMAT(created_at,'%d-%m-%y') AS mes"),
                    DB::raw("COUNT(*) AS total"),
                    DB::raw("tip_servicio")
                )
                    ->with('servicio:id,emergencia')
                    ->groupBy('tip_servicio')
                    ->where('delegacion', $request->delegacion)
                    ->whereMonth('created_at', $dateMonth)
                    ->whereYear('created_at', $dateYear)
                    ->get();

                if ($request->report == "1") {
                    return $this->concentrated($month);
                }

                return response()->json(['type' => 'Servicios por mes', 'data' => $month]);

            case "twoMonth":
                $twoMonthDate = Carbon::createFromDate($request->date)->addMonth(2);
                $twoMonth = Bitacora::select(
                    DB::raw("DATE_FORMAT(created_at,'%d-%m-%y') AS mes"),
                    DB::raw("COUNT(*) AS total"),
                    DB::raw("tip_servicio")
                )
                    ->with('servicio:id,emergencia')
                    ->groupBy('tip_servicio')
                    ->where('delegacion', $request->delegacion)
                    //->whereDate('created_at', $request->date)
                    ->whereBetween('created_at', [$request->date, $twoMonthDate])
                    ->get();

                if ($request->report == "1") {
                    return $this->concentrated($twoMonth);
                }

                return response()->json(['type' => 'Servicios por bimestre', 'data' => $twoMonth]);

            case "year":
                $year = Bitacora::select(
                    DB::raw("DATE_FORMAT(created_at,'%d-%m-%y') AS year"),
                    DB::raw("COUNT(*) AS total"),
                    DB::raw("tip_servicio")
                )
                    ->with('servicio:id,emergencia')
                    ->groupBy('tip_servicio')
                    ->where('delegacion', $request->delegacion)
                    ->whereYear('created_at', $request->date)
                    ->get();

                if ($request->report == "1") {
                    return $this->concentrated($year);
                }

                return response()->json(['type' => 'Servicios por año', 'data' => $year]);
        }
    }

    public function concentrated($data) {
        $reports = Excel::download(new graphExports($data), 'graphExports.xls');
        return $reports;

    }
}
