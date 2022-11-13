<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\MainCategory;
use Illuminate\Http\Request;

class MainCategoryController extends Controller
{
    public function get_category_by_main_category($main_category_id)
    {
        $categories = Category::where('main_category_id',$main_category_id)->get();
        $option = "";
        foreach ($categories as $key => $value) {
            $id = $value->id;
            $name = $value->name;
            $option.= "<option".($key==0?' selected ':'')." value='$id' >$name</option>";
        }
        return $option;
    }

    public function get_sub_category_by_category($category_id)
    {
        $sub_categories = SubCategory::where('category_id',$category_id)->get();
        $option = "";
        foreach ($sub_categories as $key => $value) {
            $id = $value->id;
            $name = $value->name;
            $option.= "<option".($key==0?' selected ':'')." value='$id' >$name</option>";
        }
        return $option;
    }

    

    // public function get_main_category_json()
    // {
    //     $collection = MainCategory::where('status',1)->latest()->get();
    //     $options = '';

    //     foreach ($collection as $key => $value) {
    //         $options .= "<option ".($key==0?' selected':'')." value='".$value->id."'>".$value->name."</option>";
    //     }
    //     return $options;
    // }

}
