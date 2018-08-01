<?php

namespace App\Http\Controllers\Api;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    /**
     * 地址列表
     */
    public function index(Request $request)
    {
        //接收用户ID
        $id = \request()->input('user_id');
        //取出当前用户所有的收货地址
        $addresses = Address::where('user_id', $id)->get();
        //循环
       return $addresses;

    }

    /**
     * 添加
     * @param Request $request
     * @return array
     */
    public function add(Request $request)
    {
        //接收参数
        $data = $request->post();
        //创建一个验证规则
        $validate = Validator::make($data, [
            'tel' => ['regex:/^0?(13|14|15|17|18|19)[0-9]{9}$/',
                'unique:Addresses'],
            'name' => 'required|min:2',
            'provence' => 'required',
            'city' => 'required',
            'area' => 'required',
            'detail_address' => 'required',
        ]);
        //返回错误
        if ($validate->failed()) {
            return [
                'status' => "false",
                "message" => $validate->errors()->first()
            ];
        }
        //入库
        if (Address::create($data)) {
            //改变当前用户下的默认分类
            $address = Address::where('user_id', $data['user_id'])->where('is_default', 1)->first()->update(["is_default" => 0]);

            return [
                "status" => "true",
                "message" => "添加成功"
            ];
        }

    }

    /**
     * 修改
     * @param Request $request
     * @return array
     */
    public function edit(Request $request){

        //接收参数
        $data = $request->post();
        //创建一个验证规则
        $validate = Validator::make($data, [
            'tel' => ['regex:/^0?(13|14|15|17|18|19)[0-9]{9}$/',
                'unique:Addresses'],
            'name' => 'required|min:2',
            'provence' => 'required',
            'city' => 'required',
            'area' => 'required',
            'detail_address' => 'required',
        ]);
        //返回错误
        if ($validate->failed()) {
            return [
                'status' => "false",
                "message" => $validate->errors()->first()
            ];
        }
        //找到当前地址
        $address=Address::findOrFail($request->post('id'));
        //入库
        if ($address->update($request->post())) {
            return [
                "status" => "true",
                "message" => "修改成功"
            ];
        }
    }

    /**
     * 指定地址信息
     */
    public  function  one(){
        $id=\request()->input('id');
        return Address::findOrFail($id);
    }
}
