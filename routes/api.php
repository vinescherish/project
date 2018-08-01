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
Route::namespace('Api')->group(function () {
    //店铺及店铺信息列表
    Route::get('shop/lists', 'ShopController@lists');
    Route::get('shop/index', 'ShopController@index');

    //用户登录注册以及密码修改
    Route::any('member/reg', 'MemberController@reg');
    Route::any('member/login', 'MemberController@login');
    Route::any('member/sms', 'MemberController@sms');
    Route::post('member/forget', 'MemberController@forget');
    Route::any('member/change', 'MemberController@change');
    Route::any('member/detail', 'MemberController@detail');


    //用户收货地址
    Route::get('address/index', 'AddressController@index');
    Route::any('address/add', 'AddressController@add');
    Route::any('address/edit', 'AddressController@edit');
    Route::get('address/one', 'AddressController@one');



    //添加购物车
    Route::any('cart/add', 'CartController@add');
    Route::any('cart/get', 'CartController@get');

    //订单管理
    Route::any('order/add', 'OrderController@add');
    Route::get('order/get', 'OrderController@get');
    Route::post('order/pay', 'OrderController@pay');
    Route::get('order/lists', 'OrderController@lists');
});