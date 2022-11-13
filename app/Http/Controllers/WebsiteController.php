<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\HelperController;


class WebsiteController extends Controller
{

    public function index()
    {
        $products = Product::active()->with(['category', 'subCategory', 'mainCategory', 'color', 'files', 'publication', 'size', 'unit', 'vendor', 'writer'])
                                ->orderBy('id','DESC')->paginate(10);
        return view('vendor.backpack.crud.columns.productList',compact('products'));
    }

    public function latest_product_json(Request $request)
    {
        $collection = Product::with([
                'category',
                'subCategory',
                'mainCategory',
                'color', 
                'files',
                'publication',
                'size', 
                'unit',
                'vendor',
                'writer',
            ])
            ->orderBy('id', 'DESC')->paginate(6);
        return $collection;
    }

    public function search_product_json(Request $request, $limit, $key){
        $collection = Product::active()
            ->where('name', $key)
            ->orWhere('code', $key)
            ->orWhere('price', $key)
            ->orWhere('discount', $key)
            ->orWhere('name', 'LIKE', '%'. $key . '%')->orderBy('id','DESC')->paginate($limit);
        return $collection;
    }

    public function show_product_json(Product $product)
    {
        $product['discount_price'] = HelperController::discount_price($product->price, $product->discount, $product->expiration_date);
        $product['files'] = $product->image()->get();
        $product['category'] = $product->category()->get();
        $product['sub_category'] = $product->sub_category()->get();
        $product['main_category'] = $product->main_category()->get();
        $product['color'] = $product->color()->get();
        $product['publication'] = $product->publication()->get();
        $product['size'] = $product->size()->get();
        $product['unit'] = $product->unit()->get();
        $product['vendor'] = $product->vendor()->get();
        $product['writer'] = $product->writer()->get();

        // echo $product->discount_price;
        return $product;
    }

    public function get_product_related_info_json($product)
    {
        $product = Product::where('id', $product)->select('id', 'price', 'discount', 'expiration_date')->first();
        $product['discount_price'] = HelperController::discount_price($product->price, $product->discount, $product->expiration_date);

        return $product;
    }

}
