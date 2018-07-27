<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Mrgoon\AliSms\AliSms;


class AdminController extends BaseController
{
    /**
     * 管理员列表
     */
    public function lists(Request $request){
        $search=$request->search;
//        dd($search);
        //取得所有数据
        $admins=Admin::where('name','like',"%$search%")->paginate(3);
//         $users=User::all();
        return view('shop_admin.lists',compact('admins','search'));
    }

    /**
     * 用户编辑
     * @param Request $request
     * @param $id
     */
    public function edit(Request $request,$id){
        //得到当前用户
        $admin=Admin::find($id);
        $password=$admin->password;
        //判断是否POST提交
        if($request->isMethod('post')){

            $data=$request->post();

            //判断是否修改密码,没有则以前的密码
            if(!$request->post('password')){
                $data['password']=$password;
            }
            $data['password']=bcrypt($request->post('password'));
            //入库
            if ($admin->update($data)) {
//                跳转
                return redirect()->route('admins.lists');
            }
        }

        return view('shop_admin.edit',compact('admin'));
    }

    /**
     * 销毁用户
     */
    public function del(Request $request,$id){
        //找到用户
        $admin=Admin::find($id);
        //删除
        if ($admin->delete()) {
            //跳转
            return redirect()->route('admins.lists');
        }
    }


    /**
     * 注册,添加管理员
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reg(Request $request)
    {

        if($request->isMethod('post')){

            $data=$request->post();
            $data['password']=bcrypt($request->post('password'));

            //入库
            Admin::create($data);

            //跳转
            return redirect()->route('admins.login');
        }

        return view('shop_admin.reg');
    }

    /**
     * 登录
     */
    public function login(Request $request)
    {
        if($request->isMethod('post')){
//         dd($request->post());
            //已验证
            if(Auth::guard('admin')->attempt(['name'=>$request->post('name'),'password'=>$request->post('password')],$request->has('remember'))){

              if(Auth::guard('admin')->user()->status===0){
                  Auth::logout();
                  return redirect()->route('admins.login');
              }

                //跳转
                return redirect()->route('admins.lists');
            }else{
                return redirect()->route('admins.login');
            }
        }
        return view('shop_admin.login');
    }

    /**
     * 是否启用
     */
    public  function top(Request $request,$id){
        //得到当前数据
        $admin=Admin::find($id);
        if($admin->status==1){
            $admin->status=0;
        }else{
            $admin->status=1;
        }

        $admin->save();
        return redirect()->route('admins.lists');
    }

    /**
     * 注销登录
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
       Auth::logout();
        //提示
        $request->session()->flash('success', '注销成功');
        //跳转  intended 如果有来路，就跳来路，如果没有跳默认页
        return redirect()->route('admins.login');
    }

}
