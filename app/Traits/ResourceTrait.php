<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ResourceTrait
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        if( !$request->has( 'export' ) && !$request->wantsJson() ) return abort( 404 ); // currently only an API endpoint

        if( $request->has( 'export' ) ){
            // should probably start handling exports as an async process that emails the result to you.. perhaps.. think about this..
            // to handle the original way I would have to create non-api endpoints for this and make redirects..

            // $request->timezone = auth()->user()->role->defaultBusiness->timezone;

            // return $this->model::export($request);
            return response()->json([ 'hey' => 'shouldnt be getting here for exporting...' ]);
        }

        list( $aggregates, $results ) = $this->model::getPaginated( $request );

        return response()->json( compact( 'aggregates', 'results' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    // public function show(Transaction $transaction)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    // public function edit(Transaction $transaction)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Transaction $transaction)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Transaction $transaction)
    // {
    //     //
    // }
}