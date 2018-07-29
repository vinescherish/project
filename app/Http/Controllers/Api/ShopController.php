<?php

namespace App\Http\Controllers\Api;

use App\Models\MenuCategory;
use App\Models\Menus;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    //分类列表
    public function lists(Request $request){
        $qurey=Shop::orderby('id')->where('status',1);
     //接收搜索条件
        $search=$request->input('keyword');
        if ($search!==null) {
            $qurey=$qurey->where('shop_name','like',"%$search%");
        }
        $shops=$qurey->get();
     foreach ($shops as $shop){
         $shop->shop_img="/uploads/".$shop->shop_img;
         $shop->distance=rand(1111,345678);
         $shop->estimate_time=$shop->distance/23;
     }

     return $shops;

    }

    public  function  index(Request $request){
     $id=$request->input('id');
     $shop=Shop::findOrFail($id);
        $shop->shop_img="/uploads/".$shop->shop_img;
        $shop->distance=rand(1111,345678);
        $shop->estimate_time=$shop->distance/23;

        $shop->evaluate=[
        ["user_id"=> 12344,
                "username"=> "w******k",
                "user_img"=> "http=>//www.homework.com/images/slider-pic4.jpeg",
                "time"=> "2017-2-22",
                "evaluate_code"=> 1,
                "send_time"=> 30,
                "evaluate_details"=> "不怎么好吃"],
            ["user_id"=> 12344,
                "username"=> "w******k",
                "user_img"=> "http=>//www.homework.com/images/slider-pic4.jpeg",
                "time"=> "2017-2-22",
                "evaluate_code"=> 4.5,
                "send_time"=> 30,
                "evaluate_details"=> "很好吃"],
            ["user_id"=> 12344,
                "username"=> "w******k",
                "user_img"=> "http=>//www.homework.com/images/slider-pic4.jpeg",
                "time"=> "2017-2-22",
                "evaluate_code"=> 5,
                "send_time"=> 30,
                "evaluate_details"=> "很好吃"]

        ];

        //取出分类
        $cates=MenuCategory::where('shop_id',$id)->get();

        foreach ($cates as $cate){
            //取出所有分类下所有商品
            $goods=Menus::where('category_id',$cate->id)->get();

            $cate->goods_list=$goods;
        }
        $shop->commodity=$cates;

        return $shop;
    }

    //搜索








}
