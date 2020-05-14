<?php

namespace App\Http\Controllers;

use App\Http\Requests\IntentionRequest;
use App\Intention;
use App\Managers\IntentionManager;
use App\Responses\ErrorResponse;
use App\Responses\SuccessResponse;

class IntentionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( IntentionManager $mng )
    {
        return $mng->getIntentionsForUser( auth()->user()->id );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( IntentionRequest $request )
    {
        if( !$intention = Intention::create( array_merge( $request->validated(), [ 'user_id' => auth()->user()->id ] ) ) ) return new ErrorResponse( 403, 'Unable to create intention! Please try again.' );

        return new SuccessResponse( 'Successfully created intention!', $intention );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Intention  $intention
     * @return \Illuminate\Http\Response
     */
    public function show( Intention $intention )
    {
        if( auth()->user()->id != $intention->user_id ) return new ErrorResponse( 403, 'You are not allowed to view this.' ); // replace with policy

        return $intention;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Intention  $intention
     * @return \Illuminate\Http\Response
     */
    public function update( IntentionRequest $request, Intention $intention )
    {
        if( auth()->user()->id != $intention->user_id ) return new ErrorResponse( 403, 'You are not allowed to update this.' ); // replace with policy
        if( !$intention->update( $request->validated() ) ) return new ErrorResponse( 500, 'Unable to update intention' );

        return new SuccessResponse( 'Successfully updated intention', $intention->refresh() );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Intention  $intention
     * @return \Illuminate\Http\Response
     */
    public function destroy( Intention $intention )
    {
        if( auth()->user()->id != $intention->user_id ) return new ErrorResponse( 403, 'You are not allowed to delete this.' ); // replace with policy
        if( !$intention->delete() ) return new ErrorResponse( 403, 'Unable to delete intention' );

        return new SuccessResponse( 'Successfully deleted intention' );
    }
}
