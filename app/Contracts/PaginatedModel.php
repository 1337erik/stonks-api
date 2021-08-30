<?php

namespace App\Contracts;

interface PaginatedModel
{
    /**
     * Grab the respective model resources for this model so the pagination/export processes can properly return a unified data model to the UI
     *
     * @return array
     */
    public static function getCollectionResource( $collection );

    public static function getResource( $record );
}
