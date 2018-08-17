<?php

namespace App\Http\Controllers\Api;

use App\Models\MenuCategory;
use App\Models\Menus;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class ShopController extends Controller
{
    //分类列表
    public function lists(Request $request)
    {
        //判断redis中有没有缓存
//        $data = Redis::get('shops');
//        if ($data) {
//            return $data;
//        }
        $qurey = "";
        //接收搜索条件
        $search = $request->input('keyword');
        if ($search !== null) {
            $qurey = Shop::search($search)->orderby('id')->where('status', 1);;
        }else{
            $qurey=Shop::orderby('id')->where('status', 1);
        }
        $shops = $qurey->get();
        foreach ($shops as $shop) {

            $shop->distance = rand(1111, 345678);
            $shop->estimate_time = $shop->distance / 23;
        }
        //存入redis中
//        Redis::setex('shops', 60 * 60 * 24 * 7, $shops);

        return $shops;

    }

    public function index(Request $request)
    {
        $id = $request->input('id');
     //判断redis中是否有缓存
        $data=Redis::get('shop:'.$id);
           if($data){
               return $data;
           }
        $shop = Shop::findOrFail($id);
        $shop->distance = rand(1111, 345678);
        $shop->estimate_time = $shop->distance / 23;

        $shop->evaluate = [
            ["user_id" => 12344,
                "username" => "w******k",
                "user_img" => "http=>//www.homework.com/images/slider-pic4.jpeg",
                "time" => "2017-2-22",
                "evaluate_code" => 1,
                "send_time" => 30,
                "evaluate_details" => "不怎么好吃"],
            ["user_id" => 12344,
                "username" => "w******k",
                "user_img" => "http=>//www.homework.com/images/slider-pic4.jpeg",
                "time" => "2017-2-22",
                "evaluate_code" => 4.5,
                "send_time" => 30,
                "evaluate_details" => "很好吃"],
            ["user_id" => 12344,
                "username" => "w******k",
                "user_img" => "http=>//www.homework.com/images/slider-pic4.jpeg",
                "time" => "2017-2-22",
                "evaluate_code" => 5,
                "send_time" => 30,
                "evaluate_details" => "很好吃"]

        ];

        //取出分类
        $cates = MenuCategory::where('shop_id', $id)->get();

        foreach ($cates as $cate) {
            //取出所有分类下所有商品
            $goods = Menus::where('category_id', $cate->id)->get();

            $cate->goods_list = $goods;
        }
        //再把分类数据追加到$shop
        $shop->commodity = $cates;
     //把$shop存入redis
         Redis::setex('shop:'.$id,60*60*24*7,$shop);
        return $shop;
    }

    //搜索


}
