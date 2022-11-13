<?php

namespace App\Repositories;

use App\Models\Image;
use App\Repositories\BaseRepository;


class RelateImageRepo extends BaseRepository
{
    public function getFieldsSearchable(){
        return $this->fieldSearchable; 
    }
    
    public function model(){
        return Image::class;
    }

    public function CreateOrUpdateRepo($entry, $request)
    {
        
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/uploadproduct/',$filename);
        }
        // $imageName = $request->file->getClientOriginalName();
        // $request->file->move(public_path('uploadproduct'), $imageName);
        // return response()->json(['uploaded'=>'/upload/'.$imageName]);
    
        
        $this->model->updateOrCreate(
            [
                "id" => optional($entry->thumbnail_rl)->id ?? null,
            ],
            [
                "product_id" => $entry->id ?? null,
                "image" => $filename ?? "",
                "create" => 1 ?? "",
                "status" => 1 ?? "",
            ]
        );
    }
}