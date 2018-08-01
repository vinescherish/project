<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Menus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * 添加购物车
     * @param Request $request
     * @return array
     */
    public function add(Request $request)
    {
        //清除已有的购物车
        Cart::where('user_id',$request->post('user_id'))->delete();
//        dd($ks);
        //接收参数
        $goods = $request->post('goodsList');
        $counts = $request->post('goodsCount');
//        dd($counts);
//        return $goods;
        //循环取出goods_id
        foreach ($goods as $k => $good) {
            $data = [
                'user_id' => $request->post('user_id'),
                'goods_id' => $good,
                'amount' => $counts[$k],
            ];
            //入库
            Cart::create($data);
        }
        return [
            'status' => "true",
            'message' => "添加成功",
        ];
    }

    /**
     * 取出购物车数据
     */
    public function get()
    {
        //获取参数
        $uerId = \request()->input('user_id');
        //取出购物车数据
        $goods = Cart::where('user_id', $uerId)->get();
        //循环
        $totalCost=0;
        foreach ($goods as $good) {
            //取出商品信息
            $menu = Menus::where('id', $good['goods_id'])->first();

            $good['goods_name'] = $menu['goods_name'];
            $good['goods_img'] = $menu['goods_img'];
            $good["goods_price"] = $menu['goods_price'];
            $totalCost += $good->amount*$menu['goods_price'];

        }
        $data['goods_list']=$goods;
        $data['totalCost']=$totalCost;

        return  $data;


    }

}
