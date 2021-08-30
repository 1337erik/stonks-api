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

        return new UserResource( $request->user() );
    });

    Route::group([ 'middleware' => [ 'roles' ], 'roles' => [ Role::INVESTOR, Role::AFFILIATE ]], function () {

        Route::resource( 'transactions', 'TransactionController' );
        Route::resource( 'accounts', 'AccountController' );
    });

    Route::group([ 'middleware' => [ 'roles' ], 'roles' => [ Role::GOD ]], function () {

        Route::resource( 'farms', 'FarmController' );
    });

});