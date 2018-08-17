<?php

namespace App\Http\Controllers\Admin;

use App\Mail\OrderShipped;
use App\Models\Event;
use App\Models\EventMember;
use App\Models\EventPrize;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    /**
     * 抽奖列表
     */
    public function index()
    {
        $events = Event::all();
        return view('Admin.event.index', compact('events'));
    }

    /**
     * 抽奖活动添加
     * @param Request $request
     */
    public function add(Request $request)
    {
        //判断是否是post提交
        if ($request->isMethod('post')) {
            //入库
//            dd($request->post());
            Event::create($request->post());
            return redirect()->route('event.index')->with('success', '添加成功');
        }
        return view('Admin.event.add');
    }

    /*
     * 编辑
     */
    public function edit(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        //判断
        if ($request->isMethod('post')) {

            $event->update($request->post());

            return redirect()->route('event.index')->with('success', '编辑成功');
        }

        return view('Admin.event.edit', compact('event'));
    }

    /**
     * 开奖
     */
    public function begin(Request $request, $id)
    {
        //获取当前抽奖活动
        $event = Event::findOrFail($id);
        //读取所有参赛商家
        $users = EventMember::where('event_id', $id)->pluck('user_id')->toArray();
        shuffle($users);
        //读出所有属于此活动的奖品信息
        $prizes = $event->prizes;

        $prizeId=$prizes->pluck('id')->toArray();
        shuffle($prizeId);

//        dd($prizes->count()>count($users));
        if ($prizes->count()<count($users)){
            foreach ($prizes as $k => $prize) {
                //循环赋值
                if(count($users)===$k){
                    break;
                }
                $prize->user_id = $users[$k];
                $prize->save();
                //发送邮件
                //1.得到用户
                $user=User::findOrFail($users[$k]);
                //通知
                Mail::to($user)->send(new  OrderShipped($prize));

            }
        }else{
            foreach ($users as $k => $userId) {

                //循环赋值
              $prize= EventPrize::findOrFail($prizeId[$k]);
                $prize->user_id =$userId;
                $prize->save();
                //发送邮件
                //1.得到用户
                $user=User::findOrFail($userId);

                //通知
                Mail::to($user)->send(new  OrderShipped($prize));
            }
        }
        $event->is_prize = 1;
        $event->save();
        return redirect()->route('event.index')->with('success', '开奖成功');
    }

    /**
     * 删除
     */
    public function del($id)
    {
        Event::findOrFail($id)->delete();

        return redirect()->route('event.index')->with('success', '删除成功');
    }

}
