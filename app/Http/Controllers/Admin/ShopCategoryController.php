<?php

namespace App\Http\Controllers\Admin;

use App\Handlers\ImageUploadHandler;
use App\Models\ShopCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ShopCategoryController extends BaseController
{
    /**
     * 展示分类列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
         //接收搜索条件
        $search=$request->search;
        $shopCate=ShopCategory::where('name','like',"%$search%")->paginate(3);

        return view('Category.index',compact('search','shopCate'));
    }

    /**
     * 添加分类
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public  function add(Request $request){
        //判断是否是POST提交
        if($request->isMethod('post')){


            //接收表单参数
            $data=$request->post();

            //定义一个变量存储img
            $data['img']="";
            //判断是否启用
            $data['status']=0;
            if($request->post('status')){
                $data['status']=1;
            }
            //判断是否上传图片
            if($request->file('img')){
                $data['img']=$request->file('img')->store('shop_category','public_images');
            }
           //入库

            ShopCategory::create($data);
//            //提示信息
            $request->session()->flash('success','添加成功');
            //跳转
            return redirect()->route('shop_category.index');
        }

        //展示添加页面
        return view('Category.add');
    }

    /**
     * 是否启用
     */
    public  function top(Request $request,$id){
        //得到当前数据
        $shopCate=ShopCategory::find($id);
           if($shopCate->status==1){
               $shopCate->status=0;
           }else{
               $shopCate->status=1;
           }

        $shopCate->save();
        return redirect()->route('shop_category.index');
    }
    /**
     * 编辑保存数据
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public  function edit(Request $request,$id){
        //得到当前数据
        $shopCate=ShopCategory::find($id);
        //判断是否POST提交
        if($request->isMethod('post')){

            //没有上传图片用以前的地址
            $oldImg=$shopCate->img;
            //取值
            $data=$request->post();
            //判断是否上传
            if($request->file('img')){
                $data['img']=$request->file('img')->store('shop_category','public_images');
                //删除原文件
                File::delete("uploads/$oldImg");
            }
//dd($data);
            //入库
            $shopCate->update($data);

            //跳转
            return redirect()->route('shop_category.index');

        }
        //展示页面传递参数
        return view('Category.edit',compact('shopCate'));
    }

    /**
     * 删除
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public  function del(Request  $request,$id){
        //找到当前对象
        $shopCategory=ShopCategory::find($id);
        //删除图片和数据
        File::delete("uploads/$shopCategory->img");
        $shopCategory->delete();

        //跳转
        return redirect()->route('shop_category.index');
    }
}
