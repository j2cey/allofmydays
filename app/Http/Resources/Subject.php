<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Subject
 * @package App\Http\Resources
 *
 * @property integer $id
 * @property integer $uuid
 *
 * @property integer $title
 * @property integer $code
 * @property integer $description
 */
class Subject extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,

            'title' => $this->title,
            'code' => $this->code,
            'description' => $this->description,

            'edit_url' => route('subjects.edit', $this->uuid),
            'destroy_url' => route('subjects.destroy', $this->uuid),
        ];
    }
}