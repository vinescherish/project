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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//商品分类列表
Route::get('shop/lists','Api\ShopController@lists');
Route::get('shop/index','Api\ShopController@index');


Route::any('member/reg','Api\MemberController@reg');
Route::any('member/login','Api\MemberController@login');
Route::any('member/sms','Api\MemberController@sms');
Route::post('member/forget','Api\MemberController@forget');
Route::any('member/change','Api\MemberController@change');
