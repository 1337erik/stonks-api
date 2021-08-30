<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AccountCollectionResource extends ResourceCollection
{
    /**
     * @param  Request  $request
     * @return array|Collection
     */
    public function toArray( $request )
    {
        return $this->collection->map( function ( $transaction ) {

            return ( new AccountResource( $transaction ));
        });
    }
}
