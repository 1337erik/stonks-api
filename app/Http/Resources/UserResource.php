<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Indicates if the resource's collection keys should be preserved.
     *
     * @var bool
     */
    public $preserveKeys = false;

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

            // Relationships
            'roles'             => RoleResource::collection( $this->resource->roles ),
            'permissions'       => PermissionResource::collection( $this->resource->permissions ),

            // Meta
            'id'                => $this->resource->id,
            'username'          => $this->resource->username,
            'email'             => $this->resource->email,
            'timezone'          => $this->resource->timezone,
            'created_at'        => $this->resource->created_at,
            'updated_at'        => $this->resource->updated_at,
            'deleted_at'        => $this->resource->deleted_at,
        ];
    }
}