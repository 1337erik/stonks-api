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
            'name'              => $this->resource->name,
            'email'             => $this->resource->email,
            'email_verified_at' => $this->resource->email_verified_at,
            'password'          => $this->resource->password,
            'timezone'          => $this->resource->timezone,
            'remember_token'    => $this->resource->remember_token,
            'created_at'        => $this->resource->created_at,
            'updated_at'        => $this->resource->updated_at,
            'deleted_at'        => $this->resource->deleted_at,
        ];
    }
}