<?php

namespace App\Repositories;

use App\Models\Experience;
use App\Repositories\BaseRepository;

class ExperienceRepo extends BaseRepository
{

    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }
    public function model()
    {
        return Experience::class;
    }
    public function createOrUpdateRepo($entry, $request)
    {

        $formData = json_decode($request->repeatable_exper);
        foreach ($formData as $item) {
  
            $this->model->updateOrCreate(
                [
                    "id" => $item->exper_id ?? "",
                ],
                [
                    // 'id' => $entry->id ?? "",
                    'member_id' => $entry->id ?? "",
                    'title' => $item->title ?? "",
                    'employment_type' => $item->employment_type ?? "",
                    'company_name' => $item->company_name ?? "",
                    'location' => $item->location ?? "",
                    'start_date' => $item->start_date ?? "",
                    'start_end' => $item->start_end ?? "",
                    'description' => $item->description ?? "",
                ]
            );
        }
    }
}
