<?php

namespace App\Exports;

use App\Bitacora;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BitacoraExports implements FromView
{
    public function view(): View
    {
        // TODO: Implement view() method.

        $data = Bitacora::with('subdelegacion')->with('servicio')->get();

        return view('bitacora.reports', ['data' => $data]);
    }
}
