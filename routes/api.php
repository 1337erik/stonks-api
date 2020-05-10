<?php

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

    Route::get( '/user', function ( Request $request ){
        // should this be a user controller thing? not sure.. not sure I care either really

        return $request->user();
    });

    Route::group([ 'middleware' => [ 'roles' ], 'roles' => [ Role::USER ]], function () {

        Route::resource( 'information', 'InformationController' );
        Route::resource( 'intentions', 'IntentionController' );
    });

    Route::group([ 'middleware' => [ 'roles' ], 'roles' => [ Role::AUTHOR ]], function () {

    });

    Route::group([ 'middleware' => [ 'roles' ], 'roles' => [ Role::ADMIN ]], function () {

        Route::resource( 'category', 'CategoryController' ); // maybe Editors too? Moderators?
    });
});