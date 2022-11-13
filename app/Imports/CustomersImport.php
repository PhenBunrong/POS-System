<?php

namespace App\Imports;

use App\Models\Customer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CustomersImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Customer::create([
                'name' => $row[0],
                'email' => $row[1],
                'address' => $row[2],
                'gender' => $row[3],
                'phone' => $row[4],
                // 'email' => $row['1'],
            ]);
        }
    }
}
