<?php

namespace App\Managers;

use App\Http\Resources\PostResource;
use App\Post;
use App\Responses\ErrorResponse;
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
        return DB::table( 'posts' )
            ->where( 'user_id', auth()->user()->id );
    }

    /**
     * 
     */
    public function getPaginated( ?Request $request = null )
    {
        list( $perPage, $sortOrder, $offset ) = mapPagination( $request );
        $total = $this->query->count(); // $this->query->count();
        $results = $this->query
            ->take( $perPage )
            ->offset( $offset )
            ->orderBy( 'created_at', $sortOrder )
            ->get();

        return [ $total, $results ];
    }

    public function getSingle( Post $post )
    {
        if( auth()->user()->posts->contains( $post ) ) return new PostResource( $post );
        return new ErrorResponse( 404, 'Invalid request' );
    }

}