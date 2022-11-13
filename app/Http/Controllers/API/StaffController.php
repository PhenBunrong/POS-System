<?php

namespace App\Http\Controllers\API;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StaffResource;
use App\Models\ContactStaff;
use App\Repositories\StaffContactRepo;

class StaffController extends Controller
{

    protected $staffContactRepo;

    /**
     * Create a new controller instance.
     * 
     * @param StaffContactRepo $staffContactRepo
     * @return void
     */
    
    public function __construct(StaffContactRepo $staffContactRepo)
    {
        $this->staffContactRepo = $staffContactRepo;
    }

    public function index()
    {
        $size = request()->size ?? 2;

        $data = Staff::paginate($size);

        return StaffResource::collection($data);

        // return response()->json($data);
    }

    public function store(Request $request)
    {
        try{

            $create = Staff::create([
                'name' => request()->name,
            ]);

            if ($create) 
            {
                $this->staffContactRepo->CreateOrUpdateRepo($create, $request);
                // dd($create);
                // ContactStaff::create([
                //     'staff_id' => $create->id,
                //     'phone' => request()->phone,
                //     'email' => request()->email,
                //     'address' => request()->address,
                // ]);
            }
            
            return response()->json(['mgs' => 'success', 'status' => 200]);

        }catch(\Exception $exp)
        {
            return $exp->getMessage();
        }
    }

    public function update(Request $request,$id)
    {
        $entry = Staff::find($id);

        try{

            $is_success = $entry->update([
                'name' => request()->name,
            ]);
            // \Log::info($is_success);
            if ($is_success) 
            {
                // $entry->contact()->update([
                //     "staff_id" => $entry->id ?? null,
                //     "phone" => $request->phone ?? "",
                //     "email" => $request->email ?? "",
                //     "address" => $request->address ?? "",
                // ]);
                $this->staffContactRepo->CreateOrUpdateRepo($entry, $request);
            }

            return response()->json(['mgs' => 'Data has been Update', 'status' => 200]);

        }catch(\Exception $exp)
        {
            return $exp->getMessage();
        }
    }

    public function destroy($id)
    {
        $entry = Staff::find($id);

        optional($entry->Contact)->delete();

        $entry->delete();
    }
}
