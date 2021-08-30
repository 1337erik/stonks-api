<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    public function toArray($request)
    {
        return [

            'id'             => $this->resource->id,
            'amount'         => $this->resource->amount,
            'type'           => $this->resource->type,
            'usd_value'      => $this->resource->usd_value,
            'apr'            => $this->resource->apr,
            'effective_date' => filter_date( $this->resource->effective_date, 'm/d/Y' ),
            'created_at'     => filter_date( $this->resource->created_at, 'm/d/Y' ),

            'coin_id'        => $this->resource->coin_id,
            'coinname'       => optional( $this->resource->coin )->name,

            'farm_id'        => $this->resource->farm_id,
            'farmname'       => optional( $this->resource->farm )->name,

            'user_id'        => $this->resource->user_id,
            'username'       => optional( $this->resource->user )->username
        ];
    }
}
