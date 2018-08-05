<?php

namespace App\Http\Controllers\Shop;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * 商家订单统计算总
     */
    public function index(Request $request)
    {
        //得到当前登录用户
        $user = Auth::user();
        //得到店铺shop_id
        $shopId = $user->shop_id;

        $start = $request->start_time;
        $end = $request->end_time;
        //定义每页默认显示条数
        $size = 15;
        //构造搜索条件
        if ($size !== null) {
            $size = $request->size;
        }
        //读取订单信息
        $query = Order::Select(DB::raw('shop_id, COUNT(order_code) as code,SUM(order_price) as total '))->where('shop_id', $shopId);


        if ($start !== null) {
            $query = $query->where('created_at', '>', $start);
        }
        if ($end !== null) {
            $query = $query->where('created_at', '<', $end);
        }
        $orders = $query->paginate($size);

        return view('Home.order.index', compact('orders', 'size', 'shopId', 'start', 'end'));
    }

    /**
     * 商家每日订单统计
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function day(Request $request)
    {
        //得到当前登录用户
        $user = Auth::user();
        //得到店铺shop_id
        $shopId = $user->shop_id;

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
        $query = Order::Select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") AS date,shop_id,COUNT(order_code) as code,sum(order_price) AS nums'))->where('shop_id', $shopId)->limit($size);


        if ($start !== null) {
            $query = $query->where('created_at', '>=', $start);
        }
        if ($end !== null) {
            $query = $query->where('created_at', '<', $end);
        }
        $orders = $query->get();

        return view('Home.order.day', compact('orders', 'size', 'shopId', 'start', 'end'));
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
        $query = Order::Select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") AS date,shop_id,COUNT(order_code) as code,sum(order_price) AS nums'))->where('shop_id', $shopId)->limit($size);


        if ($start !== null) {
            $query = $query->where('created_at', '>=', $start);
        }
        if ($end !== null) {
            $query = $query->where('created_at', '<', $end);
        }
        $orders = $query->get();

        return view('Home.order.month', compact('orders', 'size', 'shopId', 'start', 'end'));
    }

    /**
     * 订单详情列表
     */
    public function lists(Request $request)
    {

        //得到当前登录用户
        $user = Auth::user();
        //得到店铺shop_id
        $shopId = $user->shop_id;
        //读出当前用户的订单列表
        $query = Order::where('shop_id', $shopId);
        //接收搜索参数
        $statu = $request->status;
        $start = $request->start;
        $end = $request->end;
        $name = $request->name;

        //判断是否有这个搜索条件
        if ($statu !== null) {
           if($statu==-1){
               $query = $query->where('status',$statu);
           }
            if($statu==3){
                $query = $query->where('status',$statu);
            }
            if($statu==2){
                $query = $query->whereIn('status',[1,2]);
            }
        }
        if ($start !== null) {
            $query = $query->where('created_at', '>=', $start);
        }
        if ($end !== null) {
            $query = $query->where('created_at', '<', $end);
        }
        if ($name !== null) {
            $query = $query->where('name', 'like', "%$name%");
        }

        $orders=$query->paginate(15);
        return view('Home.order.lists', compact('orders'));
    }

    /**
     * 订单详情
     * @param Request $request
     * @param $id
     */
    public function show(Request $request, $id)
    {

        //找到当前订单
        $order = Order::findOrFail($id);

        $orderGoods = $order->goods;
        //展示视图
        return view('Home.order.show', compact('orderGoods'));
    }

    /**
     * 改变状态
     * @param Request $request
     * @param $id
     * @param $tatus
     */
    public function change(Request $request, $id, $tatus)
    {
        //找到当前订单
        Order::findOrFail($id)->update(['status' => $tatus]);
        return redirect()->route('orders.lists');
    }

    /**
     * 取消订单
     */
}
