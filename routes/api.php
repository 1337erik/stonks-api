<?php

use App\Http\Resources\UserResource;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group([ 'middleware' => [ 'auth:sanctum' ]], function () {

    Route::get( '/getme', function ( Request $request ){

        return UserResource::collection( $request->user() );
    });

    Route::group([ 'middleware' => [ 'roles' ], 'roles' => [ Role::USER ]], function () {

        Route::resource( 'information', 'InformationController' );
        Route::resource( 'goals', 'IntentionController' );
    });

    Route::group([ 'middleware' => [ 'roles' ], 'roles' => [ Role::AUTHOR ]], function () {

    });

    Route::group([ 'middleware' => [ 'roles' ], 'roles' => [ Role::ADMIN ]], function () {

        Route::resource( 'category', 'CategoryController' ); // maybe Editors too? Moderators?
    });
});