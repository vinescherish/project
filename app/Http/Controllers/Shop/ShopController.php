<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop;
use App\Models\ShopCategory;
use App\Models\ShopInfo;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ShopController extends Controller
{
    /**
     * 展示首页列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\
     */
    public function index(Request $request)
    {
        //接收搜索条件
        $search = $request->search;

        //得到数据
        $shops = Shop::where('shop_name', 'like', "%$search%")->paginate(4);

        return view("shop.index", compact('shops', 'search'));
    }

    /**
     * 添加保存数据
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function add(Request $request)
    {
        //得到所有分类
        $shopCate = ShopCategory::all();
        if ($request->isMethod('post')) {
            //验证
            $this->validate($request, [
                'brand' => 'required',
                'on_time' => 'required',
                'niao' => 'required',
                'bao' => 'required',
                'piao' => 'required',
                'zhun' => 'required',
            ]);
            //接收参数
            $data = $request->post();

            $data['shop_img'] = "";
            //上传图片
            if ($request->file('shop_img')) {
                $data['shop_img'] = $request->file('shop_img')->store('shop_shops', 'public_images');
            }
            //入库
           $shop= Shop::create($data);
            $data['id']=$shop->id;
            ShopInfo::create($data);
            //提示
            $request->session()->flash('success', '添加成功');
            //跳转
            return redirect()->route('shops.index');
        }
        //展示视图
        return view('shop.add', compact('shopCate'));
    }

    /**
     * 编辑
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {

        //得到所有分类
        $shopCate = ShopCategory::all();
        //得到当前数据
        $shop = Shop::find($id);
        //得到详情
        $shopInfo=ShopInfo::find($id);
        //判断是否POST提交
        if ($request->isMethod('post')) {
            //验证
            $this->validate($request, [
                'brand' => 'required',
                'on_time' => 'required',
                'niao' => 'required',
                'bao' => 'required',
                'piao' => 'required',
                'zhun' => 'required',
            ]);
            //没有上传图片用以前的地址
            $oldImg = $shop->shop_img;
            //取值
            $data = $request->post();
            //判断是否上传
            if ($request->file('shop_img')) {
                $data['shop_img'] = $request->file('shop_img')->store('shop_shops', 'public_images');
                //删除原文件
               File::delete("uploads/$oldImg");
            }

            //入库
            $shop->update($data);

            $shopInfo->update($data);

            //提示信息
            $request->session()->flash('success', '编辑成功');
            //跳转
            return redirect()->route('shops.index');
        }
        return view('shop.edit', compact('shopCate','shop'));
    }

    /**
     * 查看
     * @param Request $request
     * @param $id
     */
            public  function show(Request $request,$id){
              //找到当前数据
               $shop=ShopInfo::find($id);



                return view('shop.show',compact('shop'));
    }

    /**
     * 删除
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public  function  del(Request $request,$id){
        $shop=Shop::find($id);
        $shopInfo=ShopInfo::find($id);
        //删除图片和数据
        File::delete("uploads/$shop->shop_img");
        $shop->delete();
        $shopInfo->delete();
        //提示信息
        $request->session()->flash('success','删除成功');
        //跳转
        return redirect()->route('shops.index');
    }

}
