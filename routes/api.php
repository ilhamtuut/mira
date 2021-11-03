<?php

use Illuminate\Http\Request;

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


Route::post('/send/stack', ['as' => 'stack', 'uses' => 'EarnController@stackPost']);
Route::get('/stack/earn', ['as' => 'earn', 'uses' => 'EarnController@totalEarn']);
Route::get('/stack/limit', ['as' => 'limitStake', 'uses' => 'EarnController@limitStake']);
