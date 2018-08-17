<?php

namespace App\Http\Controllers\Api;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Member;
use App\Models\Menus;
use App\Models\Order;
use App\Models\OrderGood;
use EasyWeChat\Foundation\Application;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Mrgoon\AliSms\AliSms;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

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
        $data['status'] = 0;

        //开启事务
        DB::beginTransaction();
        //创建订单
        try {
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
            DB::commit();
        } catch (QueryException $exception) {
            //回滚
            DB::rollBack();
            //返回数据
            return [
                "status" => "false",
                "message" => $exception->getMessage(),
            ];
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
        $data['order_status'] = $order->order_status;
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
            $order->status = 1;
            $order->save();

            $config = [
                'access_key' => 'LTAIMYe4lnH8HRNf',
                'access_secret' => 'aiBVKCQPBQehzqzpABAXqeQSuZ8Zwy',
                'sign_name' => '唐伟',
            ];

            $aliSms = new  AliSms();
            $response = $aliSms->sendSms($member->tel, 'SMS_141617340', ['name' => $member->username, 'order' => $order->order_code], $config);
            if ($response->Message === "OK") {
                return [
                    "status" => "true",
                    "message" => "支付成功,已通知商家处理",
                ];
            } else {


                return [
                    "status" => "false",
                    "message" => $response->Message,
                ];
            }

        }
    }

    /**
     * 订单列表
     */
    public function lists(Request $request)
    {
        //获取user_id
        $id = $request->user_id;
        //读取该用户所有的订单信息
        $orders = Order::where('user_id', $id)->get();
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
        $datas = [];
        foreach ($orders as $order) {
            $data['id'] = $order->id;
            $data['order_code'] = $order->order_code;
            $data['order_status'] = $order->order_status;
            $data['shop_id'] = $order->shop_id;
            $data['shop_name'] = $order->shop->shop_name;
            $data['shop_img'] = $order->shop->shop_img;
            $data['order_birth_time'] = (string)$order->created_at;
            $data['order_price'] = $order->order_price;
            $data['order_address'] = $order->province . $order->city . $order->county . $order->order_address;


            //赋值订单商品信息
            $data['goods_list'] = $order->goods;

            $datas[] = $data;
        }


        return $datas;
    }

    /*
     * 订单状态
     */
    public function status(Request $request)
    {
        return ['status' => Order::find($request->input('id'))->status];

    }

    //微信支付
    public function wxPay(Request $request)
    {
        //找到订单
        $order = Order::find($request->input('id'));

        //1.创建操作微信的对象
        $app = new Application(config('wechat'));
        //2.得到支付对象
        $payment = $app->payment;

        $attributes = [
            'trade_type' => 'NATIVE', // JSAPI，NATIVE，APP...
            'body' => '云端若梦',
            'detail' => '云端若梦',
            'out_trade_no' => $order->order_code,
            'total_fee' => 1, // 单位：分
            'notify_url' => 'http://www.ele.com/api/order/ok', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            //'openid'           => '当前用户的 openid', // trade_type=JSAPI，此参数必传，用户在商户appid下的唯一标识，
            // ...
        ];
        //微信订单生产
        $wxOrder = new \EasyWeChat\Payment\Order($attributes);
        //统一下单
        $result = $payment->prepare($wxOrder);
//        dd($result);
        if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS') {
            //取出预支付链接
            $prepayId = $result->code_url;
            //生成二维码
            // Create a basic QR code
            $qrCode = new QrCode($prepayId);//地址
            $qrCode->setSize(300);//大小

// Set advanced options
            $qrCode->setWriterByName('png');
            $qrCode->setMargin(10);
            $qrCode->setEncoding('UTF-8');
            $qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH);//容错级别
            $qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
            $qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
            $qrCode->setLabel('微信扫码支付', 18, public_path() . '/assets/noto_sans.otf', LabelAlignment::CENTER);
            $qrCode->setLogoPath(public_path() . '/logo/1.jpeg');
            $qrCode->setLogoWidth(80);//logo大小
//            $qrCode->setRoundBlockSize(true);
//            $qrCode->setValidateResult(false);

////直接输出QR码
            header('Content-Type: ' . $qrCode->getContentType());
            echo $qrCode->writeString();
            exit;
// 将其保存到文件
//            $qrCode->writeFile(__DIR__.'/qrcode.png');

//创建响应对象
//            $response = new QrCodeResponse($qrCode);

        }
    }

    /**
     * 监听微信通知
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \EasyWeChat\Core\Exceptions\FaultException
     */
    public function ok()
    {
        //1.创建操作微信的对象
        $app = new Application(config('wechat'));
        $response = $app->payment->handleNotify(function ($notify, $successful) {
            // 使用通知里的 "微信支付订单号" 或者 "商户订单号" 去自己的数据库找到订单
            $order = Order::where('order_code', $notify->out_trade_no)->first();

            if (!$order) { // 如果订单不存在
                return 'Order not exist.'; // 告诉微信，我已经处理完了，订单没找到，别再通知我了
            }

            // 如果订单存在
            // 检查订单是否已经更新过支付状态
            if ($order->status !== 0) { // 假设订单字段“支付时间”不为空代表已经支付
                return true; // 已经支付成功了就不再更新了
            }

            // 用户是否支付成功
            if ($successful) {
                // 不是已经支付状态则修改为已经支付状态
                $order->paid_at = time(); // 更新支付时间为当前时间
                $order->status =1;
           }
          // else { // 用户支付失败
//                $order->status = 'paid_fail';
//            }

            $order->save(); // 保存订单

            return true; // 返回处理完成
        });

        return $response;
    }
}
