<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function store(Request $request)
    {
        // $data = Purchase::all();
        // dd($data);
        // if(!empty($data))
        // {
        //     foreach($data as $item){
        //         $item->delect();
        //     }
        // }

        Purchase::create([
            'supplier_id' => $request->supplier_id,
            'product_id' => $request->product_id,
            'cost' => $request->cost,
            'price' => $request->price,
            'qty' => $request->qty,
            'status' => $request->status,
            'creator' => '1'
        ]);

        return redirect(URL('admin/purchase'));
    }
}
