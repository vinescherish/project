<?php

namespace App\Http\Controllers\Api;


use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Mrgoon\AliSms\AliSms;

class MemberController extends Controller
{
    /*
     * 短信验证
     */
    public function sms()
    {
        //接收手机号
        $tel = \request()->input('tel');
        //接收验证码

        //生产验证码
        $code = rand(1000, 9999);
        //把验证码存redis
        Redis::setex("tel_" . $tel, 300, $code);

        //测试
        return [
            "status" => "true",
            "message" => "获取短信验证码成功" . $code,

        ];

        $config = [
            'access_key' => 'LTAIMYe4lnH8HRNf',
            'access_secret' => 'aiBVKCQPBQehzqzpABAXqeQSuZ8Zwy',
            'sign_name' => '唐伟',
        ];

        $aliSms = new AliSms();
        //调用接口发送短信
        $response = $aliSms->sendSms($tel, 'SMS_140680124', ['code' => $code], $config);

        if ($response->Message === "OK") {
            return [
                "status" => "true",
                "message" => "获取短信验证码成功",

            ];
        } else {
            return [
                "status" => "false",
                "message" => $response->Message,

            ];
        }
    }

    /**
     * 注册
     */
    public function reg(Request $request)
    {
        //接收参数
        $data = \request()->all();
        //取出验证码
        $code = Redis::get("tel_" . $data['tel']);
        //创建一个验证规则
        $validata = Validator::make($data, [
            'username' => 'required|unique:members',
            'sms' => 'required|integer|min:1000|max:9999',
            'tel' => ['regex:/^0?(13|14|15|17|18|19)[0-9]{9}$/',
                'unique:members'],
            'password' => 'required|min:6'
        ]);
        if ($validata->failed()) {
            return [
                'status' => "false",
                "message" => $validata->errors()->first()
            ];
        }

        //验证验证码
        if ($data['sms'] !== $code) {
            return [
                'status' => "false",
                "message" => "验证码错误",
            ];
        }

        //密码加密
        $data['password'] = bcrypt($data['password']);
        //入库
        if (Member::create($data)) {
            return [
                'status' => "true",
                "message" => "注册成功",
            ];
        }
    }

    /**
     * 登录
     */
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            //接收参数

            //验证账号存不存在
            $member = Member::where('username', $request->post('name'))->first();


            //验证密码
            if ($member && Hash::check($request->post('password'), $member->password)) {

                return [
                    'status' => "true",
                    "message" => "登录成功",
                    'user_id' => $member->id,
                    'username' => $member->username,
                ];
            }

            return [
                'status' => "false",
                "message" => "账号或密码错误",
            ];

        }
    }

    /**
     * 忘记密码
     */
    public function forget()
    {
        //接收参数
        $data = \request()->input();
        //取出验证码
        $code = Redis::get("tel_" . $data['tel']);
        //创建一个验证规则
        $validata = Validator::make($data, [
            'sms' => 'required|integer|min:1000|max:9999',
            'tel' => ['regex:/^0?(13|14|15|17|18|19)[0-9]{9}$/',
                'unique:members'],
            'password' => 'required|min:6'
        ]);
        //返回错误
        if ($validata->failed()) {
            return [
                'status' => "false",
                "message" => $validata->errors()->first()
            ];
        }
        //验证验证码
        if ($data['sms'] !== $code) {
            return [
                'status' => "false",
                "message" => "验证码错误",
            ];
        }
        //验证手机号码
        $member = Member::where('tel', $data['tel'])->first();
        if ($member) {
            //加密密码
            $data['password'] = bcrypt($data['password']);
            //入库
            $member->password = $data['password'];
            $member->save();
            return [
                'status' => "true",
                "message" => "恭喜您找回密码",
            ];
        }
        return [
            'status' => "false",
            "message" => "预留手机号有误",
        ];
    }

    public function change(Request $request)
    {
        //接收参数
        $data = $request->post();
        //找到当前用户
        $member = Member::findOrFail($data['id']);
        //验证密码是否与原密码一致

        if (Hash::check($request->post('oldPassword'), $member->password)) {
            //密码加密
            $member->password = bcrypt($data['newPassword']);
            $member->save();
            return [
                "status" => "true",
                "message" => "修改成功"];

        }
        return [
            "status" => "false",
            "message" => "原密码不一致"
        ];
    }
}
