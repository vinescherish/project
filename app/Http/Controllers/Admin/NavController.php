<?php

namespace App\Http\Controllers\Admin;

use App\Models\Nav;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class NavController extends Controller
{
    /**
     * 导航列表
     */
    public  function index(Request $request){
        //取出所有顶级分类
        $navs=Nav::where('pid',0)->get();
        //接收搜索条件
        $pid=$request->pid;
        $start=$request->start;
        $end=$request->end;
        $name=$request->name;
        //取出所有不属于顶级分类的
        $qurey=Nav::where('pid','<>',0);

        if($pid!==null){
            $qurey=$qurey->where('pid',$pid);
        }
        if($start!==null){
            $qurey=$qurey->where('created_at','>=',$start);
        }
        if($end!==null){
            $qurey=$qurey->where('created_at','<=',$start);
        }
        if($name!==null){
            $qurey=$qurey->where('name','like',"%$name%");
        }

        $navAll=$qurey->get();
        return view('Admin.nav.index',compact('navs','navAll'));
    }


    /**
     * 添加
     */
    public  function  add(Request $request){
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
        $navs=Nav::pluck('url')->toArray();
        //匹配取出没有的权限
        $urls= array_diff($urls,$navs);
        //取出所有顶级分类
        $pids=Nav::where('pid',0)->get();
         //判断是否post提交
        if($request->isMethod('post')){
            $data=$request->post();
            if ($request->post('url')===null){
                //排除这个字段
                    $data=$request->except('url');
            }else{
                    $data=$request->post();
            }
            $nav=Nav::create($data);

            return redirect()->refresh()->with('success','添加'.$nav->name.'成功');
        }

        return view('Admin.nav.add',compact('urls','pids'));
    }
}
