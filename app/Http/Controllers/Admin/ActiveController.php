<?php

namespace App\Http\Controllers\Admin;

use App\Models\Active;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActiveController extends BaseController
{
    /**
     * 活动分类列表
     */
    public function index(Request $request){


        //接收搜索条件
        $startTime = $request->input('start_time');
        $endTime = $request->input('end_time');
        $search = $request->input('search');
        //得到现在的时间
        $time = date("Y-m-d", time());
        //读取活动数据

        $quest = Active::orderby('id');
        if ($startTime !== null) {
            $quest = $quest->where('start_time', '>=', $startTime);
        }

        if ($endTime !== null) {
            $quest = $quest->where('end_time', '<=', $endTime);
        }

        if ($search !== null) {
            $quest = $quest->where('title', 'like', "%{$search}%");
        }

        $actives = $quest->paginate(3);


        //读取活动数据
//        $actives=Active::all();

        return view('Admin.active.index',compact('actives'));

    }

    /**
     * 活动添加
     * @param Request $request
     */
    public function  add(Request $request){
           if($request->isMethod('post')){

//               dd($request->post());
               if (Active::create($request->post())) {
                   return redirect()->route('active.index');
               }
           }

        return view('Admin.active.add');
    }

    /**
     * 编辑保存
     */
    public  function  edit(Request $request,$id){

       $active=Active::findOrFail($id);
       if($request->isMethod('post')){
           if ($active->update($request->post())) {
//                跳转
               return redirect()->route('active.index');
           }

       }
        return view('Admin.active.edit',compact('active'));
    }

    /**
     * 删除
     * @param Request $request
     * @param $id
     */
    public  function  del(Request $request,$id){
        $active=Active::findOrFail($id);
        $active->delete();
        //跳转
        return redirect()->route('active.index');
    }

    /**
     * 查看
     * @param Request $request
     * @param $id
     */
    public function  show(Request $request,$id){
        $active=Active::findOrFail($id);
        return view('Admin.active.show',compact('active'));
    }
}
