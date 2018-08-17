<?php

namespace App\Http\Controllers\Shop;

use App\Models\Active;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActiveController extends BaseController
{

    /**
     * 活动分类列表
     */
    public function index(Request $request)
    {
        //接收搜索条件
        $startTime = $request->input('start_time');
        $endTime = $request->input('end_time');
        $search = $request->input('search');
        //得到现在的时间
        $time = date("Y-m-d", time());
        //读取活动数据

        $quest = Active::where('end_time', '>=', $time)->orderBy('id');
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


        return view('Home.active.index', compact('actives'));

    }

    /**
     * 查看
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request,$id)
    {
        $active=Active::findOrFail($id);
        return view('Home.active.show',compact('active'));
    }
}
