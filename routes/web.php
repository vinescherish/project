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
    //切换状态
    Route::any('shop_category/top/{id}',"ShopCategoryController@top")->name('shop_category.top');


////商家信息

    Route::get('shops/index',"ShopController@index")->name('shops.index');
    Route::any('shops/add',"ShopController@add")->name('shops.add');
    Route::any('shops/edit/{id}',"ShopController@edit")->name('shops.edit');
    Route::get('shops/del/{id}',"ShopController@del")->name('shops.del');
    Route::get('shops/show/{id}',"ShopController@show")->name('shops.show');


//平台管理员
    Route::any('admins/reg',"AdminController@reg")->name('admins.reg');
    Route::get('admins/lists',"AdminController@lists")->name('admins.lists');
    Route::any('admins/edit/{id}',"AdminController@edit")->name('admins.edit');
    Route::get('admins/del/{id}',"AdminController@del")->name('admins.del');
    Route::get('admins/logout',"AdminController@logout")->name('admins.logout');
    //切换状态
    Route::any('admins/top/{id}',"AdminController@top")->name('admins.top');
    Route::any('admins/login',"AdminController@login")->name('admins.login');


//商铺
    Route::get('shops/index',"ShopController@index")->name('shops.index');
    Route::any('shops/add',"ShopController@add")->name('shops.add');
    Route::any('shops/edit/{id}',"ShopController@edit")->name('shops.edit');
    Route::get('shops/del/{id}',"ShopController@del")->name('shops.del');
    Route::get('shops/top/{id}',"ShopController@top")->name('shops.top');
    //待审核列表
    Route::get('shops/audlists',"ShopController@audlists")->name('shops.audlists');
    //用户审核
    Route::get('shops/aud/{id}',"ShopController@aud")->name('shops.aud');

//用户信息

    Route::get('user/lists',"UserController@lists")->name('user.lists');
    Route::any('user/edit/{id}',"UserController@edit")->name('user.edit');
    Route::get('user/del/{id}',"UserController@del")->name('user.del');
    Route::any('user/show/{id}',"UserController@show")->name('user.show');
    Route::any('user/add',"UserController@add")->name('user.add');


    //活动管理
    Route::get('active/index',"ActiveController@index")->name('active.index');
    Route::any('active/edit/{id}',"ActiveController@edit")->name('active.edit');
    Route::get('active/del/{id}',"ActiveController@del")->name('active.del');
//    Route::any('active/show/{id}',"ActiveController@show")->name('active.show');
    Route::any('active/add',"ActiveController@add")->name('active.add');
    Route::any('active/show/{id}',"ActiveController@show")->name('active.show');

});

//商户平台
Route::domain('shop.ele.com')->namespace('Shop')->group(function () {


    //会员管理

    Route::get('users/lists',"UserController@lists")->name('users.lists');
    Route::any('users/edit/{id}',"UserController@edit")->name('users.edit');
    Route::get('users/del/{id}',"UserController@del")->name('users.del');
    Route::any('users/show/{id}',"UserController@show")->name('users.show');


    Route::get('users/logout',"UserController@logout")->name('users.logout');
    Route::any('users/login',"UserController@login")->name('users.login');
    Route::any('users/reg',"UserController@reg")->name('users.reg');

//菜品分类管理
    Route::get('menu_category/index',"MenuCategoryController@index")->name('menu_category.index');
    Route::any('menu_category/edit/{id}',"MenuCategoryController@edit")->name('menu_category.edit');
    Route::get('menu_category/del/{id}',"MenuCategoryController@del")->name('menu_category.del');
    Route::get('menu_category/top/{id}',"MenuCategoryController@top")->name('menu_category.top');

    Route::any('menu_category/add',"MenuCategoryController@add")->name('menu_category.add');

//菜品管理
    Route::get('menus/index',"MenuController@index")->name('menus.index');
    Route::any('menus/edit/{id}',"MenuController@edit")->name('menus.edit');
    Route::get('menus/del/{id}',"MenuController@del")->name('menus.del');
    Route::any('menus/add',"MenuController@add")->name('menus.add');
    Route::get('menus/top/{id}',"MenuController@top")->name('menus.top');


//活动管理
    Route::get('actives/index',"ActiveController@index")->name('actives.index');
    Route::any('actives/show/{id}',"ActiveController@show")->name('actives.show');

});

//商户
Route::domain('www.ele.com')->namespace('User')->group(function () {



});


