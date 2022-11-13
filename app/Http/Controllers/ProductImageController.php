<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function __construct()
    {
        $this->middleware(backpack_middleware());
    }
    
    public function fileinputImage(){
        return view('vendor.backpack.crud.fields.fileinput.file_input_image');
    }


    public function posVue()
    {
        return view('learn-vue-pos');
    }

    public function store(Request $request){
        $imageName = $request->file->getClientOriginalName();
        $request->file->move(public_path('uploadproduct'), $imageName);
        return response()->json(['uploaded'=>'/uploadproduct/'.$imageName]);
    }

    public function cardlist()
    {
        return view('vendor.backpack.crud.columns.cardlist');
    }

    // public function store(Request $request)
    // {
    //     // $this->validate($request, [
    //     //     'name' => 'required',
    //     // ]);
        
    //     // if($request->hasFile('image'))
    //     // {
    //     //     $file = $request->file('image');
    //     //     $imageName = $request->file->getClientOriginalName();
    //     //     $file->file->move(public_path('upload'), $imageName);
    //     //     return response()->json(['uploaded'=>'/uploadproduct/'.$imageName]);
    //     // }

    //     // if($request->hasFile('image'))
    //     // {
    //     //     $file = $request->file('image');
    //     //     $ext = $file->getClientOriginalExtension();
    //     //     $filename = time().'.'.$ext;
    //     //     $file->move('uploads/productImage/',$filename);
    //     // }

    //     // $image = Image::create([
    //     //     'image' => $filename,
    //     //     'creator' => 1,
    //     //     'slug' => $filename,
    //     //     'status' => 1,
    //     // ]);

    //     // if (!$image) {
    //     //     return redirect()->back()->with('error', 'Sorry, there a problem while creating brand.');
    //     // }
    //     // return redirect()->route('brand.index')->with('success', 'Success, you brand have been create.');
    // }
    
}
