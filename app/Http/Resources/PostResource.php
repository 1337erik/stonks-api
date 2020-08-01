<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
    public function toArray( $request )
    {
        // return parent::toArray($request);
        return [

            'id'      => $this->resource->id,
            'slug'    => $this->resource->slug,
            'title'   => $this->resource->title,
            'content' => $this->resource->content
        ];
    }
}