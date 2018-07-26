<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shop;
use App\Models\ShopCategory;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UserController extends BaseController
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
        return view('Admin.shop_users.lists',compact('users','search'));
    }

    /**
     * 用户信息编辑
     * @param Request $request
     * @param $id
     */
    public function edit(Request $request,$id){
        //得到所有商家

        //得到当前用户
        $user=User::find($id);
        $password=$user->password;
        //判断是否POST提交
        if($request->isMethod('post')){
            //验证
            $this->validate($request,[
                'name'=>'required',
                'email'=>'required',
            ]);
            $data=$request->post();

            //判断是否修改密码,没有则以前的密码
            if(!$request->post('password')){
                $data['password']=$password;
            }
            $data['password']=bcrypt($request->post('password'));
            //入库
            if ($user->update($data)) {
//                跳转
                return redirect()->route('user.lists');
            }
        }

        return view('Admin.shop_users.edit',compact('user'));
    }




    /**
     * 销毁用户
     */
    public function del(Request $request,$id){
        //找到用户
        $user=User::find($id);
        //找到当前用户旗下商铺
        $shop=$user->shops;
        //删除

        if ($user->delete()) {
            //跳转
            if($shop->delete()){
               return redirect()->route('user.lists');
            }
        }
    }


    /**
     * 注册
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Request $request)
    {

        //得到商家分类
        $shopCates=ShopCategory::all();
        //判断还是否POST提交

        if($request->isMethod('post')){

            DB::transaction(function () use($request) {
                //接收值

                $data=$request->post();

                //设置图片默认为空
                $data['shop_img']="";
                //上传图片
                if($request->file('shop_img')){
                    $data['shop_img']=$request->file('shop_img')->store('shop_shops','public_images');
                }
                $data["password"]=bcrypt($data["password"]);
                //入用户旗下的商铺信息库shops
               $shop= Shop::create($data);

                //得到店铺ID
                 $data['shop_id']=$shop->id;

                 $data['status_user']=1;

                //入userk库
                $user=User::create($data);


            });
            //跳转
            return redirect()->route('user.lists');
        }



        return view('Admin.shop_users.reg', compact('shopCates'));
    }

    /**
     * 登录
     */
//    public function login(Request $request)
//    {
//        if($request->isMethod('post')){
////         dd($request->post());
//            //已验证
//            if(Auth::attempt(['name'=>$request->post('name'),'password'=>$request->post('password')],$request->has('remember'))){
//
//                if(Auth::user()->status_user===-1){
//                    Auth::logout();
//                    return redirect()->route('users.login');
//                }
//                if(Auth::user()->status_user===0){
//                    Auth::logout();
//                    return redirect()->route('users.login');
//                }
//
//                //跳转
//                return redirect()->route('users.lists');
//            }else{
//                return redirect()->route('users.login');
//            }
//        }
//        return view('Admin.shop_users.login');
//    }


    /**
     * 注销登录
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
//    public function logout(Request $request)
//    {
//        Auth::logout();
//        //提示
//        $request->session()->flash('success', '注销成功');
//        //跳转  intended 如果有来路，就跳来路，如果没有跳默认页
//        return redirect()->route('users.login');
//    }


    /**
     * 查看用户商铺信息及编辑商铺信息
     */
    public  function  show(Request $request,$id){
       //得到商铺信息
        //找到用户
        $user=User::find($id);
        $shop=$user->shops;
        //得到先前图片路劲
        $oldFach=$shop->shop_img;
       if($request->isMethod('post')){
         //接收数据
           $data=$request->post();
           //判断是否有上传新图片
           $data['shop_img']=$oldFach;
           if($request->file('shop_img')){
               $data['shop_img']=$request->file("shop_img")->store("shop_shops","public_images");
               //删除以前的图片
//               dd($data['shop_img']);
              File::delete("uploads/$oldFach");
           }

           //入库
           if ($shop->update($data)) {
               return redirect()->route('user.lists');
           }
       }
        //视图传参数
        return view('Admin.shop_users.show',compact('shop'));
    }
}
