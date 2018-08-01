<?php

namespace App\Http\Controllers\Api;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Member;
use App\Models\Menus;
use App\Models\Order;
use App\Models\OrderGood;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * 添加订单
     */
    public function add(Request $request)
    {
        //查出收货地址
        $address = Address::findOrFail(\request()->input('address_id'));
//        dd( $address);
        //判断地址是否存在
        if ($address == null) {
            return [
                'status' => "false",
                'message' => "地址不存在",
            ];
        }
        //分别赋值
        //1.赋值user_id
        $data['user_id'] = $request->post('user_id');
        //用user_id从cart购物车得到goods_id
        $carts = Cart::where('user_id', $request->post('user_id'))->get();

        //取出一条购物信息通过goods_id找到shop_id
        $shopId = Menus::find($carts[0]->goods_id)->shop_id;
        //2.赋值shop_id
        $data['shop_id'] = $shopId;
        //3.生成订单编号
        $data['order_code'] = date("ymdHis") . rand(1000, 9999);
        //4.分别赋值地址参数
        $data['province'] = $address->provence;
        $data['city'] = $address->city;
        $data['county'] = $address->area;
        $data['order_address'] = $address->detail_address;
        $data['tel'] = $address->tel;
        $data['name'] = $address->name;
        //计算订单总价
        $orderPrice = 0;
        //1.循环$carts
        foreach ($carts as $k => $v) {
            $menu = Menus::where('id', $v->goods_id)->first();

            $orderPrice += $menu->goods_price * $v->amount;

        }
        //赋值订单总金额
        $data['order_price'] = $orderPrice;
        //订单状态待支付
        $data['order_status'] = 0;
        //创建订单
        $order = Order::create($data);

        //赋值订单商品表order_goods;
        //1.订单ID
        $datas['order_id'] = $order->id;
        //循环赋值商品信息
        foreach ($carts as $k => $cart) {
            $menus = Menus::where('id', $cart->goods_id)->first();
            $datas['goods_id'] = $cart->goods_id;
            $datas['amount'] = $cart->amount;
            $datas['goods_name'] = $menus->goods_name;
            $datas['goods_img'] = $menus->goods_img;
            $datas['goods_price'] = $menus->goods_price;

            //入库
            OrderGood::create($datas);
        }
        return [
            "status" => "true",
            "message" => "添加订单成功",
            "order_id" => $order->id
        ];

    }

    /**
     * 取出订单数据
     */
    public function get(Request $request)
    {
//        "id": "1",
//        "order_code": "0000001",
//        "order_birth_time": "2017-02-17 18:36",
//        "order_status": "代付款",
//        "shop_id": "1",
//        "shop_name": "上沙麦当劳",
//        "shop_img": "http://www.homework.com/images/shop-logo.png",
//        "order_price": 120,
//        "order_address": "北京市朝阳区霄云路50号 距离市中心约7378米北京市朝阳区霄云路50号 距离市中心约7378米"
//        "goods_list": [{
//        "goods_id": "1",
//            "goods_name": "汉堡",
//            "goods_img": "http://www.homework.com/images/slider-pic2.jpeg",
//            "amount": 6,
//            "goods_price": 10
//        }]
        //获取当前订单信息
        $order = Order::find($request->post('id'));
        //获取当前店铺信息并赋值
        $data['id'] = $order->id;
        $data['order_code'] = $order->order_code;
        $data['order_status'] = "代付款" ;
        $data['order_birth_time'] = (string)$order->created_at;
        $data['shop_id'] = $order->shop_id;
        $data['shop_name'] = $order->shop->shop_name;
        $data['shop_img'] = $order->shop->shop_img;
        $data['order_price'] = $order->order_price;
        $data['order_address'] = $order->province . $order->city . $order->county . $order->order_address;

        //赋值订单商品信息
        $data['goods_list'] = $order->goods;

        return $data;
    }

    /**
     * 支付
     * @param Request $request
     * @return array
     */
    public function pay(Request $request)
    {
        //接收订单ID
        $id = $request->post('id');
        //读取当前订单数据
        $order = Order::find($id);
        //找到当前用户
        $member = Member::find($order->user_id);
//        dd($member);
        //判断余额是充足
        if ($order->order_price > $member->money) {
            return [
                "status" => "false",
                "message" => "余额不足"
            ];
        }
        //扣除当前用户相应金额
        $member->money = $member->money - $order->order_price;
        $member->jifen = $member->jifen + $order->order_price;
        if ($member->save()) {
            $order->order_status=1;
            $order->save();

            return [
                "status" => "true",
                "message" => "支付成功"
            ];
        }
    }

    /**
     * 订单列表
     */
    public  function  lists(Request $request){
        //获取user_id
        $id=$request->user_id;
        //读取该用户所有的订单信息
        $orders=Order::where('user_id',$id)->get();
//        dd($orders);
        //定义一个空数组
         //循环
//        [{
//            "id": "1",
//        "order_code": "0000001",
//        "order_birth_time": "2017-02-17 18:36",
//        "order_status": "已完成",
//        "shop_id": "1",
//        "shop_name": "上沙麦当劳",
//        "shop_img": "http://www.homework.com/images/shop-logo.png",
//        "goods_list": [{
        foreach ($orders as $order) {
            $data['id'] = $order->id;
            $data['order_code'] = $order->order_code;
            $data['order_status'] = "待发货";
            $data['shop_id'] = $order->shop_id;
            $data['shop_name'] = $order->shop->shop_name;
            $data['shop_img'] = $order->shop->shop_img;
            $data['order_birth_time'] =(string)$order->created_at;
            $data['order_price'] =$order->order_price;
            $data['order_address'] =$order->province. $order->city . $order->county . $order->order_address;


            //赋值订单商品信息
            $data['goods_list'] = $order->goods;

            $datas[]=$data;
        }


        return $datas;
    }

}
