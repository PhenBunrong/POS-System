<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Brand;
use App\Models\Member;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardCrudController extends Controller
{
    public function countsuer()
    {
        $user = User::get()->count();
        $product = Product::get()->count();
        $brand = Brand::get()->count();
        $member = Member::get()->count();

        return view('dashboards.dashboard', compact('user','product','brand','member',));

    }
}
