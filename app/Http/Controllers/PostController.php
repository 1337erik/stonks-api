<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Managers\PostManager;
use App\Post;
use App\Responses\ErrorResponse;
use App\Responses\SuccessResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request, PostManager $mng )
    {
        list( $total, $results ) = $mng->getPaginated( $request );
        return new SuccessResponse( 'You got them lmao', compact( 'total', 'results' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json( 'hey lmao1333' );
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store( PostRequest $request )
    // {
    //     if( $post = Post::create( $request->validated() ) ) return new SuccessResponse( 'You did it again mate', compact( 'post' ) );
    //     return new ErrorResponse( 500, 'Sorry couldn\'t create this right now..' );
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Post  $post
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show( Post $post, PostManager $mng )
    // {
    //     return $mng->getSingle( $post );
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Post  $post
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update( PostRequest $request, Post $post )
    // {
    //     if( $post->update( $request->validated() ) ) return new SuccessResponse( 'You did it again mate' );
    //     return new ErrorResponse( 500, 'Sorry couldn\'t update this right now..' );
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Post  $post
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy( Post $post )
    // {
    //     if( $post->delete() ) return new SuccessResponse( 'You did it again mate' );
    //     return new ErrorResponse( 500, 'Sorry couldn\'t delete this right now..' );
    // }
}
