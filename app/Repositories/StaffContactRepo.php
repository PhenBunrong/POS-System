<?php

namespace App\Repositories;

use App\Models\ContactStaff;
use App\Repositories\BaseRepository;


class StaffContactRepo extends BaseRepository
{
    public function getFieldsSearchable(){
        return $this->fieldSearchable; 
    }
    
    public function model(){
        return ContactStaff::class;
    }

    public function CreateOrUpdateRepo($entry, $request)
    {
        $this->model->updateOrCreate(
            [
                "id" => optional($entry->contact)->id ?? null,
            ],
            [
                "staff_id" => $entry->id ?? null,
                "phone" => $request->phone ?? "",
                "email" => $request->email ?? "",
                "address" => $request->address ?? "",
            ]
        );
    }
}