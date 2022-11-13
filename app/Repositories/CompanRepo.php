<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\BaseRepository;

class CompanRepo extends BaseRepository{
    
    public function getFieldsSearchable(){
        return $this->fieldSearchable; 
    }
    public function model(){
        return Company::class;
    }
    public function createOrUpdateRepo($entry,$request){
        $this->model->updateOrCreate(
            [
                "id" => $request->customers_id ?? "",
            ],
            [
                "customer_id" => $entry->id ?? null,
                "company_name" => $request->company_name ?? "",
                "company_address" => $request->company_address ?? "",
                "company_phone" => $request->company_phone ?? ""
            ]
        );
    }

}

// [
//     "id" => $request->customer_id ?? "",
// ],
// [
//     "id" => $entry->customer_id ?? null,
//     "name" => $request->name ?? "",
//     "email" => $request->email ?? "",
//     "address" => $request->address ?? "",
//     "gender" => $request->gender ?? "",
//     "phone" => $request->phone ?? "",
//     "status" => $request->status ?? "",
// ]