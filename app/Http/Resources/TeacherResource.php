<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-y'),
            'updated_at' => $this->updated_at,
        ];
        // return parent::toArray($request);
    }
}

// 'phone' => optional($this->contact)->phone,
// 'email' => optional($this->contact)->email,