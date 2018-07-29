<?php

namespace App\Http\Controllers\Shop;

use App\Models\MenuCategory;
use App\Models\Menus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MenuController extends BaseController
{
    /**
     * 菜品列表
     */
    public function index(Request $request)
    {
        //1.找到当前用户
        $user = Auth::user();
        $shopId = $user->shop_id;
        //得到用户的所欲商品分类
        $menuCates = MenuCategory::where('shop_id', $shopId)->get();
        //接收搜索条件
        $maxPrice = $request->max_price;
        $minPrice = $request->min_price;
        $cateId = $request->category_id;
        $search = $request->search;

        $query = Menus::orderBy('id');

        if ($minPrice !== null) {
            $query = $query->where('goods_price', '>=', $minPrice);
        }

        if ($maxPrice !== null) {
            $query = $query->where('goods_price', '<=', $maxPrice);
        }

        if ($search !== null) {
            $query = $query->where('goods_name', 'like', "%{$search}%");
        }
        if ($cateId !== null) {
            $query = $query->where('category_id', '=', $cateId);
        }


        //得到数据

        $menus = $query->paginate(2);
//        $menus = Menus::where('goods_name', 'like', "%$search%")->paginate(3);

        return view("Home.menus.index", compact('menus', 'menuCates', 'search', 'maxPrice', 'minPrice', 'cateId'));
    }

    /**
     * 添加菜品
     * @param Request $request
     */
    public function add(Request $request)
    {
        //得到所有当前用户菜品分类
        //1.找到当前用户
        $user = Auth::user();
        $shopId = $user->shop_id;
        //得到用户的所欲商品分类
        $menuCates = MenuCategory::where('shop_id', $shopId)->get();
        //判断是否POST提交
        if ($request->isMethod('post')) {
            //接收值
            //判断同店铺同分类菜名是否有相同
            $num = Menus::where('goods_name', $request->post('goods_name'))->where('shop_id', $shopId)->where('category_id', $request->post('category_id'))->count();
            if ($num) {
                return back()->with('danger', '已有同名菜品');
            }
            $data = $request->post();
            //处理图片
            $fileName=$request->file('goods_img')->store('lunky','oss');
            $data['goods_img'] = env("ALIYUN_OSS_URL") . $fileName;

            $data['shop_id'] = $shopId;
            //入库
            if (Menus::create($data)) {
                //跳转
                return redirect()->route('menus.index');
            }
        }
        return view('Home.menus.add', compact('menuCates'));
    }

    /**
     * 编辑保存
     * @param Request $request
     * @param $id
     */
    public function edit(Request $request, $id)
    {
        //得到所有当前用户菜品分类
        //1.找到当前用户
        $user = Auth::user();
        $shopId = $user->shop_id;
        //得到用户的所欲商品分类
        $menuCates = MenuCategory::where('shop_id', $shopId)->get();
        //找到当前菜品
        $menu=Menus::findOrFail($id);
        //得到图片路径
        $pachImg=$menu->goods_img;
        //判断是否是POST提交
        if($request->isMethod('post')){
            //接受参数
            $data=$request->input();
            //判断是否上传图片
            if($request->file('goods_img')){
                $fileName=$request->file('goods_img')->store('lunky','oss');
                $data['goods_img'] = env("ALIYUN_OSS_URL") . $fileName;
                //删除旧图片
                File::delete("uploads/$pachImg");

            }

            //入库
            $menu->update($data);
//            跳转
            return redirect()->route('menus.index');
        }

        return view('Home.menus.edit', compact('menuCates','menu'));
    }

    public function  del($id){

        //找到当前菜品
        $meun=Menus::findOrFail($id);
        //删除菜品图片
        File::delete("uploads/$meun->goods_img");
        //删除数据
        $meun->delete();
        //跳转
        return redirect()->route('menus.index');
    }

    /**
     * 改变菜品状态
     */
    public  function  top(Request $request,$id){
        //找到当前菜品
        $menu=Menus::findOrFail($id);
        if($menu->status===1){
           $menu->status=0;
        }else{
            $menu->status=1;
        }

        $menu->save();
        //跳转
        return  redirect()->route('menus.index');
    }

}

