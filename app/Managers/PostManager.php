<?php

namespace App\Managers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostManager
{

    /**
     * @param \Illuminate\Database\Query\Builder
     */
    protected $query;

    /**
     * 
     * @return void
     */
    public function __construct()
    {
        $this->query = $this->baseQuery();
    }

    /**
     * utility function to grab the base sql method for extracting this model
     */
    protected function baseQuery()
    {
        return DB::table( 'posts' );
    }

    /**
     * 
     */
    public function getPaginated( ?Request $request = null )
    {
        $total = $request->perPage; // $this->query->count();
        $results = $this->query->get();

        return [ $total, $results ];
    }

}