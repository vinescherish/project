@extends("shop_layout.default")
@section("title",'用户编辑')
@section("content")

    <form class="layui-form layui-form-pane" action="" method="post">
        {{csrf_field()}}
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>是否管理员
            </label>
            <div class="layui-input-inline">
                <select name="status_user" id="" class="layui-input" >
                    <option value="1">是</option>
                    <option value="0">否</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>用户名
            </label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="name" lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="{{$user->name}}">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>账号状态
            </label>
            <div class="layui-input-inline">
                <select name="status" id="" class="layui-input" >
                    <option value="1">正常</option>
                    <option value="0">禁用</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>邮箱地址
            </label>
            <div class="layui-input-inline login-inline">
                <input type="text" id="L_email" name="email" required="" lay-verify="email"
             value="{{$user->email}}"          placeholder=""         autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>所属商家
            </label>
            <div class="layui-input-inline">
                <select name="shop_id" id="" class="layui-input">
                    <option value="">选择所更改商家</option>
                    @foreach($shops as $shop)
                        <option value="{{$shop->id}}" @if($shop->id==$user->shop_id) selected @endif  >{{$shop->shop_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>用户密码
            </label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="password"  placeholder="如果更改请重新输入密码" autocomplete="off" class="layui-input" value="">
            </div>
        </div>


        {{--<div class="form-actions">--}}
            <button class="btn btn-warning pull-right" lay-submit lay-filter="login"  type="submit">确认编辑</button>
            {{--<div class="forgot"><a href="#" class="forgot">忘记帐号或者密码</a></div>--}}
        {{--</div>--}}
    </form>

@endsection