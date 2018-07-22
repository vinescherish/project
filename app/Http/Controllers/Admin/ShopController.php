<?php

namespace App\Http\Controllers\Admin;

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
        //判断是否POST提交
        if ($request->isMethod('post')) {

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




            //跳转
            return redirect()->route('shops.index');
        }
        return view('shop.edit', compact('shop','shopCate'));
    }

    /**
     * 删除
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

//    public  function  del(Request $request,$id){
//        $shop=Shop::find($id);
//        $shopInfo=ShopInfo::find($id);
//        //删除图片和数据
//        File::delete("uploads/$shop->shop_img");
//        $shop->delete();
//
//        //提示信息
//        $request->session()->flash('success','删除成功');
//        //跳转
//        return redirect()->route('shops.index');
//    }


    /**
     * 商铺是否启用
     */
    public  function top(Request $request,$id){
        //得到当前数据
        $shop=Shop::find($id);
        if($shop->status==1){
            $shop->status=0;
        }else{
            $shop->status=1;
        }

        $shop->save();
        return redirect()->route('shops.index');
    }

    /**
     * 审核列表
     * @param Request $request
     */
    public  function audlists(Request $request){
        //得到所有待审核用户
//       $users=User::where('status_user','=',0)->get();
        //接收搜索条件
        $search = $request->search;

        //得到数据
        $users = User::where('status_user','=',0)->paginate(2);
       return view('shop.aud',compact('users','search'));
    }

    /**
     * 用户审核
     */
    public  function aud(Request $request,$id){
        //得到当前数据
        $user=User::find($id);
        if($user->status_user==1){
            $user->status_user=0;
        }else{
            $user->status_user=1;
        }

        $user->save();
        return redirect()->route('shops.audlists');
    }


}
