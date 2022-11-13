<?php

namespace App\Exports;

use App\Models\Customer;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;


class CustomerExport implements FromView
{
    use Exportable;

    private $fileName = "customers.xlsx";
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Customer::all();
    // }

    public function view(): View
    {
        return view('export.customerExport',[
            'customeres' => Customer::all()
        ]);
    }

}
