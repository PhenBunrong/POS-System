<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;

class SelectOptionAjaxController extends Controller
{
    public function brandOptions(Request $request) {

        $term = $request->input('term');
        $options = Brand::where('name', 'like', '%'.$term.'%')->pluck('name', 'id');
        return $options;
      }
}
