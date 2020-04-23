<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get( '/', function () {
    // lol maybe just redirect back to the front-end

    return view( 'welcome' );
})->name( 'homebase' );

Route::post( 'login', 'Auth\LoginController@login' );
Route::post( 'logout', 'Auth\LoginController@logout' );
Route::post( 'password/confirm', 'Auth\ConfirmPasswordController@confirm' );
Route::get( 'password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm' );
Route::post( 'password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail' );
Route::post( 'password/reset', 'Auth\ResetPasswordController@reset' );
Route::get( 'password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm' );
Route::get( 'password/reset/{token}', 'Auth\ResetPasswordController@showResetForm' );
Route::post( 'register', 'Auth\RegisterController@register' );