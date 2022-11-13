<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryOptionAjax extends Controller
{
    public function categoryOptions(Request $request) {
        $term = $request->input('term');
        $options = Category::where('name', 'like', '%'.$term.'%')->pluck('name', 'id');
        return $options;
      }
    public function brandOptions(Request $request) {
        $term = $request->input('term');
        $options = Brand::where('name', 'like', '%'.$term.'%')->pluck('name', 'id');
        return $options;
      }
}
