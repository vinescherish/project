<?php

namespace App\Http\Controllers\Admin;

use App\Models\OrderGood;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderGoodController extends BaseController
{
    /**
     * 菜品销量计总
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
        $query = OrderGood::Select(DB::raw('goods_id,goods_name,sum(amount) as nums'))->groupBy('goods_id');
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
        $goods= $query->paginate($size);

        return view('Admin.order_good.index', compact('shops', 'goods','size','shopId','start','end'));
    }

    /**
     * 菜品销售每日统计
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

        //构造搜索条件
        if ($size !== null) {
            $size = $request->size;
        }
        //读取订单信息
        $query = OrderGood::Select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") AS date,goods_id,goods_name,sum(amount) as nums'))->groupBy(['date','goods_id'])->limit($size);

        if ($shopId !== null) {
            $query=$query->where('shop_id',$shopId);
        }
        if ( $start !== null) {
            $query=$query->where('created_at','>=',$start);
        }
        if (  $end !== null) {
            $query=$query->where('created_at','<',$end);
        }
        $goods= $query->get();

        return view('Admin.order_good.day', compact('goods', 'orders','size','shopId','start','end','shops'));
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
        $start =$request->start_time;
        $end = $request->end_time;
        //定义每页默认显示条数
        $size = 15;
        //读出所有店铺信息
        $shops = Shop::all();
        //构造搜索条件
        if ($size !== null) {
            $size = $request->size;
        }
        //读取订单信息
        $query = $query = OrderGood::Select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") AS date,goods_id,goods_name,sum(amount) as nums'))->groupBy(['date','goods_id'])->limit($size);


        if ($shopId !== null) {
            $query=$query->where('shop_id',$shopId);
        }
        if ( $start !== null) {
            $query=$query->where('created_at','>=',$start);
        }
        if (  $end !== null) {
            $query=$query->where('created_at','<',$end);
        }
        $goods= $query->get();

        return view('Admin.order_good.month', compact('shops', 'goods','size','shopId','start','end'));
    }
}
