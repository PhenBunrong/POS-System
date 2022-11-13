<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   public function store(Request $request)
   {
        $orders = new Order();
        $orders->product_id = $request->id;
        $orders->name = $request->name;
        $orders->qty = $request->qty;
        $orders->price = $request->price;
        $orders->save();
        return response()->json($orders);
   }
}
