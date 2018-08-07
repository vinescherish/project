<?php

namespace App\Http\Controllers\Shop;

use App\Models\Event;
use App\Models\EventMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * 抽奖列表
     */
    public function index(){

        //判断是否已报名
//        $eventUsers=EventMember::all()->pluck('user_id')->toArray();
        $userId=Auth::user()->id;
//        $sure=in_array($userId,$eventUsers);
      $events=Event::all();
      return view('Home.event.index',compact('events','userId'));
    }

    /**
     * 报名
     * @param Request $request
     */
    public function join(Request $request,$id){
       //判断是否已报名
        $eventUsers=EventMember::where('event_id',$id)->pluck('user_id')->toArray();
        $userId=Auth::user()->id;

        if(in_array($userId,$eventUsers)){
            return back()->with('success','你已经报名');
        }
        //判断报名人数
        //得到此活动报名人数限制
        $eventNum=Event::findOrFail($id)->num;
       //得到现在报名的人数
        $count=EventMember::where('event_id',$id)->count();
        if($count>=$eventNum){
            return back()->with('success','名额已满');
        }
        //入库
        EventMember::create(['event_id'=>$id,'user_id'=>$userId]);

        return redirect()->route('events.index',compact('sure'))->with('success','报名成功');

    }

}
