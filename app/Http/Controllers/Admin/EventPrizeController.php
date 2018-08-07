<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\EventPrize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventPrizeController extends Controller
{
    /**
     * 奖品列表
     */
    public  function index(){
        //读出所有奖品
        $prizes=EventPrize::all();
        return view('Admin.event_prize.index',compact('prizes'));
    }

    /**
     * 添加
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function add(Request $request){
        //获取所有没有开奖的
        $events=Event::where('is_prize',0)->get();
        if($request->isMethod('post')){
//dd($request->post());
            EventPrize::create($request->post());

            return redirect()->route('event_prize.index')->with('success','添加成功');
        }
        return view('Admin.event_prize.add',compact('events'));
    }

    /**
     * 奖品编辑
     */
    public  function edit(Request $request,$id){
        //获取所有没有开奖的
        $events=Event::where('is_prize',0)->get();

        $prize=EventPrize::findOrFail($id);
        if($prize->user_id){
            return back()->with('success','已开奖');
        }
        if($request->isMethod('post')){
            $prize->update($request->post());
            $request->session()->flash('success','编辑成功');
            return redirect()->route('event_prize.index');
        }
        return view('Admin.event_prize.edit',compact('prize','events'));
    }

    /**
     *删除
     */
    public function  del($id){
        EventPrize::findOrFail($id)->delete();
        return redirect()->route('event_prize.index')->with('success','删除成功');
    }

    /**
     * 查询开奖结果
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request,$id){
        //得到此活动下所有奖品
        $prizes=EventPrize::where('event_id',$id)->get();
        return view('Admin.event.show',compact('prizes'));
    }
}
