<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
{
    public function toArray($request)
    {
        return [

            'id'                 => $this->resource->id,
            'coin_amount'        => $this->resource->coin_amount,
            'usd_value_override' => $this->resource->usd_value_override,
            'created_at'         => filter_date( $this->resource->created_at, 'm/d/Y' ),

            'coin_id'            => $this->resource->coin_id,
            'coin_name'          => optional( $this->resource->coin )->name,
            'coin_usd_value'     => optional( $this->resource->coin )->usd_value,

            'farm_id'            => $this->resource->farm_id,
            'farm_name'          => optional( $this->resource->farm )->name,
            'farm_current_apr'   => optional( $this->resource->farm )->current_apr,

            'user_id'            => $this->resource->user_id,
            'username'           => optional( $this->resource->user )->username
        ];
    }
}
