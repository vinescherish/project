<?php

namespace App\Http\Controllers\Admin;

use App\Handlers\ImageUploadHandler;
use App\Models\ShopCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ShopCategoryController extends Controller
{
    /**
     * 展示分类列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
         //接收搜索条件
        $search=$request->search;
        $shopCategorys=ShopCategory::where('name','like',"%$search%")->paginate(3);
        return view('Category.index',compact('search','shopCategorys'));
    }
    public  function add(Request $request){
        //判断是否是POST提交
        if($request->isMethod('post')){
            //验证
            $this->validate($request,[
               'name'=>'required|string|max:30',
               'status'=>'required',
            ]);
            //接收表单参数
            $data=$request->post();
            //定义一个变量存储img
            $data['img']="";
            //判断是否上传图片
            if($request->file('img')){
                $data['img']=$request->file('img')->store('shop_category','public_images');
            }
           //入库
            ShopCategory::create($data);
            //提示信息
            $request->session()->flash('success','添加成功');
            //跳转
            return redirect()->route('shop_category.index');
        }

        //展示添加页面
        return view('Category.add');
    }

    /**
     * 编辑保存数据
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public  function edit(Request $request,$id){
        //得到当前数据
        $shopCategory=ShopCategory::find($id);
        //判断是否POST提交
        if($request->isMethod('post')){
            //验证
            $this->validate($request,[
                'name'=>'required|string|max:30',
                'status'=>'required',
            ]);
            //没有上传图片用以前的地址
            $oldImg=$shopCategory->img;
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
            $shopCategory->update($data);
            //提示信息
            $request->session()->flash('success','编辑成功');
            //跳转
            return redirect()->route('shop_category.index');

        }
        //展示页面传递参数
        return view('Category.edit',compact('shopCategory'));
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
        //提示信息
        $request->session()->flash('success','删除成功');
        //跳转
        return redirect()->route('shop_category.index');
    }
}
