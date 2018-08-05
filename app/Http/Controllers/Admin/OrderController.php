<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends BaseController
{
    /**
     * 商家订单统计算总
     */
    public function index(Request $request)
    {
        //接收搜索条件
        $shopId = $request->shop_id;
        $start = $request->start_time;
        $end = $request->end_time;
        //定义每页默认显示条数
        $size = 15;
        //读出所有店铺信息
        $shops = Shop::all();
        //读取订单信息
        $query = Order::Select(DB::raw('shop_id, COUNT(order_code) as code,SUM(order_price) as total '))->groupBy('shop_id');
        //构造搜索条件
        if ($size !== null) {
            $size = $request->size;
        }
        if ($shopId !== null) {
           $query=$query->where('shop_id',$shopId);
        }
        if ( $start !== null) {
           $query=$query->where('created_at','>',$start);
        }
        if (  $end !== null) {
            $query=$query->where('created_at','<',$end);
        }
     $orders= $query->paginate($size);

        return view('Admin.order.index', compact('shops', 'orders','size','shopId','start','end'));
    }

    /**
     * 商家每日订单统计
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function day(Request $request)
{
    //接收搜索条件
    $shopId = $request->shop_id;
    $start = $request->start_time;
    $end = $request->end_time;
    //定义每页默认显示条数
    $size = 15;
    //读出所有店铺信息
    $shops = Shop::all();
    //读取订单信息
    $query = Order::Select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") AS date,shop_id,COUNT(order_code) as code,sum(order_price) AS nums'))->groupBy(['date','shop_id']);

    //构造搜索条件
    if ($size !== null) {
        $size = $request->size;
    }
    if ($shopId !== null) {
        $query=$query->where('shop_id',$shopId);
    }
    if ( $start !== null) {
        $query=$query->where('created_at','>=',$start);
    }
    if (  $end !== null) {
        $query=$query->where('created_at','<',$end);
    }
    $orders= $query->get();

    return view('Admin.order.day', compact('shops', 'orders','size','shopId','start','end'));
}

    /**
     *商铺每月订单统计
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function month(Request $request)
    {
        //接收搜索条件
        $shopId = $request->shop_id;
        $start = $request->start_time;
        $end = $request->end_time;
        //定义每页默认显示条数
        $size = 15;
        //读出所有店铺信息
        $shops = Shop::all();
        //读取订单信息
        $query = Order::Select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") AS date,shop_id,COUNT(order_code) as code,sum(order_price) AS nums'))->groupBy(['date','shop_id']);

        //构造搜索条件
        if ($size !== null) {
            $size = $request->size;
        }
        if ($shopId !== null) {
            $query=$query->where('shop_id',$shopId);
        }
        if ( $start !== null) {
            $query=$query->where('created_at','>=',$start);
        }
        if (  $end !== null) {
            $query=$query->where('created_at','<',$end);
        }
        $orders= $query->get();

        return view('Admin.order.month', compact('shops', 'orders','size','shopId','start','end'));
    }
}
