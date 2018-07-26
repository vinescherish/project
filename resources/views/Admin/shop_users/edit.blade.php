@extends('shop_layout.default')
@section("title",'管理员编辑')
@section("content")

    <form class="layui-form layui-form-pane" action="" method="post">
        {{csrf_field()}}
        {{--<div class="layui-form-item">--}}
            {{--<label for="L_username" class="layui-form-label">--}}
                {{--<span class="x-red"></span>是否管理员--}}
            {{--</label>--}}
            {{--<div class="layui-input-inline">--}}
                {{--<select name="status_admin" id="" class="layui-input" >--}}
                    {{--<option value="1" @if($user->status_usre==1) selected  @endif>是</option>--}}
                    {{--<option value="0" @if($user->status_user==0) selected  @endif>否</option>--}}
                {{--</select>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>用户名
            </label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="name" lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="{{$user->name}}" style="width: 200%">
            </div>
        </div>

        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>邮箱地址
            </label>
            <div class="layui-input-inline login-inline">
                <input type="text" id="L_email" name="email" required="" lay-verify="email"
             value="{{$user->email}}"          placeholder=""         autocomplete="off" class="layui-input" style="width: 200%">
            </div>
        </div>

        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>用户密码
            </label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="password"  placeholder="如果更改请重新输入密码" autocomplete="off" class="layui-input" value="" style="width: 200%">
            </div>
        </div>


        {{--<div class="form-actions">--}}
            <button class="btn btn-warning pull-right" lay-submit lay-filter="login"  type="submit">确认更改</button>
            {{--<div class="forgot"><a href="#" class="forgot">忘记帐号或者密码</a></div>--}}
        {{--</div>--}}
    </form>

@endsection