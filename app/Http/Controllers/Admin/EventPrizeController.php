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
}
