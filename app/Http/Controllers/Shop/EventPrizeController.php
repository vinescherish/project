<?php

namespace App\Http\Controllers\Shop;

use App\Models\EventPrize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventPrizeController extends Controller
{
    public function show(Request $request,$id){
        //得到此活动下所有奖品
        $prizes=EventPrize::where('event_id',$id)->get();
        return view('Home.event.show',compact('prizes'));
    }
}
