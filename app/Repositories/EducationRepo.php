<?php

namespace App\Repositories;

use App\Models\Education;
use App\Repositories\BaseRepository;

class EducationRepo extends BaseRepository
{

    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }
    public function model()
    {
        return Education::class;
    }
    public function createOrUpdateRepo($entry, $request)
    {

        $formData = json_decode($request->repeatable_educat);
        foreach ($formData as $item) {
  
            $this->model->updateOrCreate(
                [
                    "id" => $item->educa_id ?? "",
                ],
                [
                    // 'id' => $entry->id ?? "",
                    'member_id' => $entry->id ?? "",
                    'school' => $item->school ?? "",
                    'degree' => $item->degree ?? "",
                    'grade' => $item->grade ?? "",
                    'studend' => $item->studend ?? "",
                    'start_date' => $item->start_date ?? "",
                    'start_end' => $item->start_end ?? "",
                    'description' => $item->description ?? "",
                ]

            );
        }
    }
}
