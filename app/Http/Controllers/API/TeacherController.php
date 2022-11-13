<?php

namespace App\Http\Controllers\API;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherResource;

class TeacherController extends Controller
{
    public function index()
    {
        $size = request()->size ?? 2;

        $data = Teacher::paginate($size);

        return TeacherResource::collection($data);
    }

    public function store()
    {
        try{

            Teacher::create([
                'name' => request()->name,
                'phone' => request()->phone,
                'email' => request()->email,
            ]);
            return response()->json(['mgs' => 'success', 'status' => 200]);

        }catch(\Exception $exp)
        {
            return $exp->getMessage();
            // return response()->json(['mgs' => 'fail', 'status' => 500]);
        }
    }
    public function update($id)
    {
        $found = Teacher::find($id);

        
        if(!empty($found)){

            try{

                $found->update([
                    'name' => request()->name,
                    'phone' => request()->phone,
                    'email' => request()->email,
                ]);
                return response()->json(['mgs' => 'Data has been update successfully', 'status' => 200]);
    
            }catch(\Exception $exp)
            {
                return $exp->getMessage();
                // return response()->json(['mgs' => 'fail', 'status' => 500]);
            }
        }

    }

    public function destroy($id)
    {

        try{

            $found = Teacher::find($id)->delete();

            return response()->json(['mgs' => 'Data has been Deleted successfully', 'status' => 200]);

        }catch(\Exception $exp)
        {
            return $exp->getMessage();
            // return response()->json(['mgs' => 'fail', 'status' => 500]);
        }

    }

}
