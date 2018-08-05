<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class PermissionController extends BaseController
{
    //权限列表
    public  function index(){
//        $routes=Route::getRoutes();
//////
//////        dd($routes);
        $search=\request()->input('search');
        $pers=Permission::where('name','like',"%$search%")->paginate(5);
        return view('Admin.per.index',compact('pers','search'));
    }

    //添加权限
    public function add(Request $request)
    {
        //得到所有路由
        $routes=Route::getRoutes();
//定义数组
        $urls=[];
        foreach ($routes as $k=>$value) {

            //dd($value->action);
            if ($value->action['namespace'] === "App\Http\Controllers\Admin") {
                if(isset($value->action['as'])){
                    $urls[] = $value->action['as'];
                }
            }
        }

        //获得现有的权限
        $pers=Permission::pluck('name')->toArray();

        //匹配取出没有的权限
      $urls= array_diff($urls,$pers);

        //判断是否是post 提交
        if ($request->isMethod('post')) {

            Permission::create($request->post());

            $request->session()->flash('success','添加成功');
            return redirect()->route('per.index');
            //入库
        }
        return view('Admin.per.add',compact('urls'));
    }


    //编辑权限
    public  function  edit(Request $request,$id){
        //找到当前权限
        $per=Permission::findOrFail($id);
//        判断是否post提交
        if ($request->isMethod('post')) {
            $per->update($request->post());
            $request->session()->flash('success','修改成功');
            return redirect()->route('per.index');
        }
        return view('Admin.per.edit',compact('per'));
    }

    public function  del(Request $request,$id){
         Permission::findOrFail($id)->delete();
         $request->session()->flash('success','删除成功');
         return redirect()->route('per.index');

    }
}
