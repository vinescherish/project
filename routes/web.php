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

//Route::get('/', function () {
//    return view('welcome');
//});
//测试邮件
Route::get('/mail', function () {
    $order =\App\Models\Order::find(26);

    return new \App\Mail\OrderShipped($order);
});
//平台
Route::domain('admin.ele.com')->namespace('Admin')->group(function () {

    //店铺分类
    Route::get('shop_category/index',"ShopCategoryController@index")->name('shop_category.index');
    Route::any('shop_category/add',"ShopCategoryController@add")->name('shop_category.add');
    Route::any('shop_category/edit/{id}',"ShopCategoryController@edit")->name('shop_category.edit');
    Route::any('shop_category/del/{id}',"ShopCategoryController@del")->name('shop_category.del');
    //切换状态
    Route::any('shop_category/top/{id}',"ShopCategoryController@top")->name('shop_category.top');


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

    //订单数据管理
    Route::get('order/index',"OrderController@index")->name('order.index');
    Route::get('order/day',"OrderController@day")->name('order.day');
    Route::get('order/month',"OrderController@month")->name('order.month');

    //菜品销量管理
    Route::get('order_good/day',"OrderGoodController@day")->name('order_good.day');
    Route::get('order_good/month',"OrderGoodController@month")->name('order_good.month');
    Route::get('order_good/index',"OrderGoodController@index")->name('order_good.index');


    //权限管理
    Route::get('per/index',"PermissionController@index")->name('per.index');
    Route::any('per/add',"PermissionController@add")->name('per.add');
    Route::any('per/edit/{id}',"PermissionController@edit")->name('per.edit');
    Route::get('per/del/{id}',"PermissionController@del")->name('per.del');

   //角色分组管理
    Route::get('role/index',"RoleController@index")->name('role.index');
    Route::any('role/add',"RoleController@add")->name('role.add');
    Route::any('role/edit/{id}',"RoleController@edit")->name('role.edit');
    Route::get('role/del/{id}',"RoleController@del")->name('role.del');

   //导航菜单管理
    Route::get('nav/index',"NavController@index")->name('nav.index');
    Route::any('nav/add',"NavController@add")->name('nav.add');

    //member管理
    Route::get('member/index',"MemberController@index")->name('member.index');
    Route::any('member/add',"MemberController@add")->name('member.add');
    Route::any('member/edit/{id}',"MemberController@edit")->name('member.edit');
    Route::get('member/del/{id}',"MemberController@del")->name('member.del');
    Route::any('member/recharge/{id}',"MemberController@recharge")->name('member.recharge');

    //抽奖管理
    Route::get('event/index',"EventController@index")->name('event.index');
    Route::any('event/add',"EventController@add")->name('event.add');
    Route::any('event/edit/{id}',"EventController@edit")->name('event.edit');
    Route::get('event/del/{id}',"EventController@del")->name('event.del');
    Route::get('event/begin/{id}',"EventController@begin")->name('event.begin');
    Route::get('event/show/{id}',"EventPrizeController@show")->name('event.show');



    //奖品管理
    Route::get('event_prize/index',"EventPrizeController@index")->name('event_prize.index');
    Route::any('event_prize/add',"EventPrizeController@add")->name('event_prize.add');
    Route::any('event_prize/edit/{id}',"EventPrizeController@edit")->name('event_prize.edit');
    Route::get('event_prize/del/{id}',"EventPrizeController@del")->name('event_prize.del');
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

    //抽奖活动
    Route::get('events/index',"EventController@index")->name('events.index');
    Route::get('events/join/{id}',"EventController@join")->name('events.join');
    Route::get('events/show/{id}',"EventPrizeController@show")->name('events.show');


    //订单统计管理
    Route::get('orders/index',"OrderController@index")->name('orders.index');
    Route::get('orders/day',"OrderController@day")->name('orders.day');
    Route::get('orders/month',"OrderController@month")->name('orders.month');

    //订单管理
    Route::get('orders/lists',"OrderController@lists")->name('orders.lists');
    Route::get('orders/show/{id}',"OrderController@show")->name('orders.show');
    Route::get('orders/change/{id}/{status}',"OrderController@change")->name('orders.change');
    Route::get('orders/false/{id}',"OrderController@false")->name('orders.false');




    //菜品销量统计管理
    Route::get('orders_good/day',"OrderGoodController@day")->name('orders_good.day');
    Route::get('orders_good/month',"OrderGoodController@month")->name('orders_good.month');
    Route::get('orders_good/index',"OrderGoodController@index")->name('orders_good.index');
});




