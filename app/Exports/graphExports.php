<?php

namespace App\Exports;

use App\Bitacora;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class graphExports implements FromView
{
    protected $dataExcel;

    public function __construct($dataExcel)
    {
        $this->dataExcel = $dataExcel;
    }

    public function view(): View
    {
        // TODO: Implement view() method.

        return view('graph.graphReports', ['data' => $this->dataExcel]);
    }
}
