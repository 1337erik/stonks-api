<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [

            'id'                  => $this->id,
            'type'                => $this->type,

            'created_at'          => $this->pivot->created_at,
            'role_id'             => $this->pivot->role_id,
            'status'              => $this->pivot->status,
            'status_duration'     => $this->pivot->status_duration,
            'status_effective_at' => $this->pivot->status_effective_at,
            'updated_at'          => $this->pivot->updated_at,
        ];
    }
}
