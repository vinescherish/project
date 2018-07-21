<?php

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

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/Users/index',"Userscontroller@index" );
//Route::any('/Users/add',"Userscontroller@add" );
//Route::any('/Users/edit/{id}',"Userscontroller@edit" );
//Route::get('/Users/del/{id}',"Userscontroller@del" );
//Route::get('/Users/help',function (){
//    return view("/Users/help");
//} )->name('help');
//Route::get('/Users/about',function (){
//    return view("Users/about");
//} )->name('abouts');
//平台
Route::domain('admin.ele.com')->namespace('Admin')->group(function () {
    //店铺分类
    Route::get('shop_category/index',"ShopCategoryController@index")->name('shop_category.index');
    Route::any('shop_category/add',"ShopCategoryController@add")->name('shop_category.add');
    Route::any('shop_category/edit/{id}',"ShopCategoryController@edit")->name('shop_category.edit');
    Route::any('shop_category/del/{id}',"ShopCategoryController@del")->name('shop_category.del');

});

//商户信息
Route::domain('shop.ele.com')->namespace('Shop')->group(function () {

    Route::get('shops/index',"ShopController@index")->name('shops.index');
    Route::any('shops/add',"ShopController@add")->name('shops.add');
    Route::any('shops/edit/{id}',"ShopController@edit")->name('shops.edit');
    Route::get('shops/del/{id}',"ShopController@del")->name('shops.del');
    Route::get('shops/show/{id}',"ShopController@show")->name('shops.show');

    Route::any('users/reg',"UserController@reg")->name('users.reg');
    Route::get('users/lists',"UserController@lists")->name('users.lists');
    Route::any('users/edit/{id}',"UserController@edit")->name('users.edit');
    Route::get('users/del/{id}',"UserController@del")->name('users.del');
    Route::get('users/logout',"UserController@logout")->name('users.logout');

    Route::any('users/login',"UserController@login")->name('users.login');







});

//商户
Route::domain('www.ele.com')->namespace('User')->group(function () {
    Route::get('user/index',"UserController@index");
    Route::get('user/reg',"UserController@reg");


});


