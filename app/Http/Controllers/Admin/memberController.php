<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class memberController extends Controller
{
    /**
     * 用户列表
     */
    public function index()
    {
        //取出所有用户
        $members = Member::all();
        return view('Admin.member.index', compact('members'));
    }

    /**
     * 添加用户
     */
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            //入库
            $data = $request->post();
            //密码加密
            $data['password'] = bcrypt($request->post('password'));
            Member::create($data);
            $request->session()->flash('success', '添加成功');
            return redirect()->route('member.index');
        }

        return view('Admin.member.add');
    }

    /**
     * 编辑
     */
    public function edit(Request $request, $id)
    {

        $member = Member::findOrFail($id);

        if ($request->isMethod('post')) {
            //入库
            $data = $request->post();
            //密码加密
            if ($request->post('password')) {
                $data['password'] = bcrypt($request->post('password'));
            } else {
                $data['password'] = $member->password;
            }
            $member->update($data);
            $request->session()->flash('success', '编辑成功');
            return redirect()->route('member.index');
        }

        return view('Admin.member.edit', compact('member'));
    }

    /**
     * 充值
     */
    public function recharge(Request $request,$id)
    {
         $member=Member::findOrFail($id);
        if($request->isMethod('post')){
           $data=[];
           $data['money']=$member->money+$request->post('money');
           $data['jifen']=$member->jifen+$request->post('money');
           $member->update($data);
           $request->session()->flash('success','充值成功');
           return redirect()->route('member.index');
        }
    return view('Admin.member.recharge');
    }

    /**
     * 注销用户
     */
     public function del(Request $request,$id){
        Member::findOrFail($id)->delete();
        $request->session()->flash('success','删除成功');
        return redirect()->route('member.index');
     }
}
