<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * 会员列表
     */
    public function lists(Request $request){
        $search=$request->search;
//        dd($search);
    //取得所有数据
        $users=User::where('name','like',"%$search%")->paginate(3);
//         $users=User::all();
        return view('shop_user.lists',compact('users','search'));
    }

    /**
     * 用户编辑
     * @param Request $request
     * @param $id
     */
    public function edit(Request $request,$id){
       //得到所有商家
        $shops=Shop::all();
        //得到当前用户
        $user=User::find($id);
        $password=$user->password;
        //判断是否POST提交
        if($request->isMethod('post')){
            //验证
            $this->validate($request,[
                'name'=>'required',
                'email'=>'required',
                'status'=>'required',
                'status_user'=>'required',
                'shop_id'=>'required',
            ]);
            $data=$request->post();

            //判断是否修改密码,没有则以前的密码
            if(!$request->post('password')){
                $data['password']=$password;
            }
            //入库
            if ($user->update($data)) {
//                跳转
                return redirect()->route('users.lists');
            }
        }

        return view('shop_user.edit',compact('shops','user'));
    }

    /**
     * 销毁用户
     */
    public function del(Request $request,$id){
    //找到用户
        $user=User::find($id);
        //删除
        if ($user->delete()) {
          //跳转
            return redirect()->route('users.lists');
        }
    }


    /**
     * 注册
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reg(Request $request)
    {
        $shops = Shop::all();

        if($request->isMethod('post')){
            //验证
            $this->validate($request,[
                'name'=>'required',
                'password'=>'required',
                'email'=>'required',
            ]);
            $data=$request->post();
            $data['password']=bcrypt($request->post('password'));

            //入库
            User::create($data);
            //提示
            $request->session()->flash('success', '注册成功');
            //跳转
            return redirect()->route('users.login');
        }

        return view('shop_user.reg', compact('shops'));
    }

    /**
     * 登录
     */
    public function login(Request $request)
    {
     if($request->isMethod('post')){
//         dd($request->post());
         //已验证
         if(Auth::attempt(['name'=>$request->post('name'),'password'=>$request->post('password')],$request->has('remember'))){

             //跳转
             return redirect()->route('users.lists');
         }else{
             return redirect()->route('users.login');
         }
     }
        return view('shop_user.login');
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
        return redirect()->route('users.login');
    }

}
