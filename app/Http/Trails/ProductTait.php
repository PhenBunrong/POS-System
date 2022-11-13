<?php 

namespace App\Http;

use App\Models\Product;


// trait ProductTrait
// {
//     public function index(){
//         $collection = Product::active()->with(['category', 'sub_category', 'main_category', 'color', 'image', 'publication', 'size', 'unit', 'vendor', 'writer'])
//                                 ->orderBy('id','DESC')->paginate(10);
//         dd($collection);
//         return view('admin.product.index',compact('collection'));
//     }
// }