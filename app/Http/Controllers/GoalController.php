<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoalRequest;
use App\Goal;
use App\Managers\GoalManager;
use App\Responses\ErrorResponse;
use App\Responses\SuccessResponse;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( GoalManager $mng )
    {
        return $mng->getGoalsForUser( auth()->user()->id );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( GoalRequest $request )
    {
        $request->title = strtolower( $request->title );
        if( !$goal = Goal::create( array_merge( $request->validated(), [ 'user_id' => auth()->user()->id ] ) ) ) return new ErrorResponse( 403, 'Unable to create goal! Please try again.' );

        return new SuccessResponse( 'Successfully created goal!', $goal );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function show( Goal $goal )
    {
        if( auth()->user()->id != $goal->user_id ) return new ErrorResponse( 403, 'You are not allowed to view this.' ); // replace with policy

        return $goal;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function update( GoalRequest $request, Goal $goal )
    {
        if( auth()->user()->id != $goal->user_id ) return new ErrorResponse( 403, 'You are not allowed to update this.' ); // replace with policy
        if( !$goal->update( $request->validated() ) ) return new ErrorResponse( 500, 'Unable to update goal' );

        return new SuccessResponse( 'Successfully updated goal', $goal->refresh() );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function destroy( Goal $goal )
    {
        if( auth()->user()->id != $goal->user_id ) return new ErrorResponse( 403, 'You are not allowed to delete this.' ); // replace with policy
        if( !$goal->delete() ) return new ErrorResponse( 403, 'Unable to delete goal' );

        return new SuccessResponse( 'Successfully deleted goal' );
    }
}
