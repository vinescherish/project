<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * 抽奖列表
     */
    public function index(){
      $events=Event::all();
      return view('Admin.event.index',compact('events'));
    }

    /**
     * 抽奖活动添加
     * @param Request $request
     */
    public function add(Request $request){
          //判断是否是post提交
        if($request->isMethod('post')){
            //入库
            dd($request->post());
            Event::create($request->post());
             return redirect()->route('event.index')->with('success','添加成功');
        }
        return view('Admin.event.add');
    }
    /*
     * 编辑
     */
    public  function  edit(Request $request,$id){
        $event=Event::findOrFail($id);
        //判断
        if($request->isMethod('post')){

            $event->update($request->post());

            return redirect()->route('event.index')->with('success','编辑成功');
        }

        return view('Admin.event.edit',compact('event'));
    }

    /**
     * 删除
     */
    public function del($id){
      Event::findOrFail($id)->delete();

      return redirect()->route('event.index')->with('success','删除成功');
    }
}
