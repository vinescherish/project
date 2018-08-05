<?php

namespace App\Http\Controllers\Shop;

use App\Models\Order;
use App\Models\OrderGood;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderGoodController extends Controller
{
    /**
     * 菜品销量计总
     */
    public function index(Request $request)
    {
        //得到当前登录用户
        $user = Auth::user();
        //得到店铺shop_id
        $shopId = $user->shop_id;

        //得到所有属于当前店铺的订单ID
        $orderIds = Order::Select(DB::raw('id'))->where('shop_id', $shopId = $user->shop_id)->get()->toArray();

        //接收搜索条件
        $start = $request->start_time;
        $end = $request->end_time;
        //定义每页默认显示条数
        $size = 15;
        //构造搜索条件
        if ($size !== null) {
            $size = $request->size;
        }
        //读取菜品信息
        $query = OrderGood::Select(DB::raw('goods_id,goods_name,sum(amount) as nums'))->whereIn('order_id',$orderIds)->groupBy('goods_id');


        if ($start !== null) {
            $query = $query->where('created_at', '>', $start);
        }
        if ($end !== null) {
            $query = $query->where('created_at', '<', $end);
        }
        $goods = $query->paginate($size);

        return view('Home.order_good.index', compact('goods', 'size', 'shopId', 'start', 'end'));
    }

    /**
     * 菜品销售每日统计
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function day(Request $request)
    {
        //得到当前登录用户
        $user = Auth::user();
        //得到店铺shop_id
        $shopId = $user->shop_id;
        //得到所有属于当前店铺的订单ID
        $orderIds = Order::Select(DB::raw('id'))->where('shop_id', $shopId = $user->shop_id)->get()->toArray();
        //接收搜索条件
        $start = $request->start_time;
        $end = $request->end_time;
        //定义每页默认显示条数
        $size = 15;
        //构造搜索条件
        if ($size !== null) {
            $size = $request->size;
        }
        //读取订单信息
        $query = OrderGood::Select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") AS date,goods_id,goods_name,sum(amount) as nums'))->whereIn('order_id',$orderIds)->groupBy(['goods_id','date'])->limit($size);


        if ($start !== null) {
            $query = $query->where('created_at', '>=', $start);
        }
        if ($end !== null) {
            $query = $query->where('created_at', '<', $end);
        }
        $goods = $query->get();

        return view('Home.order_good.day', compact('goods', 'orders', 'size', 'shopId', 'start', 'end', 'shops'));
    }

    /**
     *商铺每月订单统计
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function month(Request $request)
    {
        //得到当前登录用户
        $user = Auth::user();
        //得到店铺shop_id
        $shopId = $user->shop_id;
        //得到所有属于当前店铺的订单ID
        $orderIds = Order::Select(DB::raw('id'))->where('shop_id', $shopId = $user->shop_id)->get()->toArray();
        //接收搜索条件
        $start = $request->start_time;
        $end = $request->end_time;
        //定义每页默认显示条数
        $size = 15;

        //构造搜索条件
        if ($size !== null) {
            $size = $request->size;
        }
        //读取订单信息
        $query = $query = OrderGood::Select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") AS date,goods_id,goods_name,sum(amount) as nums'))->whereIn('order_id',$orderIds)->groupBy(['goods_id','date'])->limit($size);


        if ($start !== null) {
            $query = $query->where('created_at', '>=', $start);
        }
        if ($end !== null) {
            $query = $query->where('created_at', '<', $end);
        }
        $goods = $query->get();

        return view('Home.order_good.month', compact('goods', 'size', 'shopId', 'start', 'end'));
    }
}
