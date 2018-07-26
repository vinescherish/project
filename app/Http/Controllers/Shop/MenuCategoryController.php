<?php

namespace App\Http\Controllers\Shop;

use App\Models\MenuCategory;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MenuCategoryController extends BaseController
{
    public function index(Request $request)
    {
        $search = $request->search;
        //超级用户
        if(Auth::user()->id==1){


            $menuCates = MenuCategory::where('name', 'like', "%$search%")->paginate(3);

        }else{
            $shopId=Auth::user()->shop_id;

            $menuCates = MenuCategory::where('name', 'like', "%$search%")->where('shop_id',$shopId)->paginate(3);
        }


        //展示视图，传递参数
        return view('Home.menu_cate.index', compact('menuCates', 'search'));
    }

    /**
     * 改变属性
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function top(Request $request, $id)
    {
         //找到当前用户得到商铺ID

        $menuCate = MenuCategory::findOrFail($id);
        $shopId=$menuCate->shop_id;

     if($menuCate->is_selected==0){
         MenuCategory::where('is_selected',1)->where('shop_id',$shopId)->update(['is_selected'=>0]);
         $menuCate->is_selected=1;
         $menuCate->save();

     }

        return redirect()->route('menu_category.index');
    }

    /**
     * 添加分类
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function add(Request $request)
    {
        //得到所有商家店铺名称
//        $shops=Shop::all();
        //得到当前用户
        $shop=Auth::user();
        //当前用户店铺ID
        //判断是否是POST提交
        if($request->isMethod('post')){
            //一个店铺分类下名称不能重复
            $data=$request->post();
            $data['shop_id']=$shop->shops->id;
            //查询是否有重名
            $num=MenuCategory::where('name',$request->post('name'))->where('shop_id',$shop->shops->id)->count();
          if($num){
              return back()->with('danger','名称重复');
          }
            //如果添加的分类是默认分类吗，则改变同店铺下的其他状态全部为零
            if($request->post('is_selected')){
                MenuCategory::where('is_selected',1)->where('shop_id',$shop->shops->id)->update(['is_selected'=>0]);
            }
            //入库
            if (MenuCategory::create($data)) {
//                跳转
                 return redirect()->route('menu_category.index');

            }

        }


        return  view('Home.menu_cate.add',compact('shop'));
    }

    /**
     * 编辑
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function  edit(Request $request,$id){
        //得到所有商家店铺名称
//        $shops=Shop::all();
        //得到当前用户
//        $shop=Auth::user();

        //得到当前数据
        $menuCate=MenuCategory::findOrFail($id);

        if($request->isMethod('post')){
            if($request->post('is_selected')){
                MenuCategory::where('is_selected',1)->where('shop_id',$menuCate->shop_id)->update(['is_selected'=>0]);
            }
            //入库
            if ($menuCate->update($request->post())) {
                //跳转
                return redirect()->route('menu_category.index');
            }
        }
        //视图
        return view('Home.menu_cate.edit',compact('shop','menuCate'));
    }

    /**
     *分类删除
     */
     public  function  del(Request $request,$id){

         $menuCate=MenuCategory::find($id);

        if ($menuCate->menus->count()) {

         return back()->with('danger','当前分类下有菜品');

         }
         $menuCate->delete();
         //跳转
         return redirect()->route('menu_category.index');
     }
}
