@extends("Home.home_layout.default")
@section("title",'添加分类')
@section("content")

    <form class="layui-form layui-form-pane" action="" method="post">
        {{csrf_field()}}

        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>分类名称
            </label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="name" lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="{{old("name")}}" style="width: 150%">
            </div>
        </div>


        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>是否默认
            </label>
            <div class="layui-input-inline">
                <select name="is_selected" id="" class="layui-input" >
                        <option value="1">是</option>
                        <option value="0">否</option>
                </select>
            </div>
        </div>

        {{--<div class="layui-form-item">--}}
            {{--<label for="L_username" class="layui-form-label">--}}
                {{--<span class="x-red"></span>菜品编号--}}
            {{--</label>--}}
            {{--<div class="layui-input-inline login-inline">--}}
                {{--<input type="text" name="menu_id" lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="{{old("name")}}" style="width: 150%">--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="layui-form-item">--}}
            {{--<label for="L_username" class="layui-form-label">--}}
                {{--<span class="x-red"></span>店铺名称--}}
            {{--</label>--}}
            {{--<div class="layui-input-inline">--}}
                {{--<select name="shop_id" id="" class="layui-input" >--}}

                    {{--<option value="{{$shop->shops->id}}">{{$shop->shops->shop_name}}</option>--}}

                {{--</select>--}}
            {{--</div>--}}
            {{--<div class="layui-input-inline login-inline">--}}
                {{--<input type="text" name="name" lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="{{old("name")}}" style="width: 150%">--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="layui-form-item layui-form-text">
            <label for="L_sign" class="layui-form-label">
                优惠信息
            </label>
            <div class="layui-input-block">
                        <textarea placeholder="随便写些什么刷下存在感" id="L_sign" name="description" autocomplete="off" lay-verify="required"                         class="layui-textarea" style="height: 80px;"></textarea>
            </div>
        </div>

        {{--<div class="layui-form-item">--}}
            {{--<label for="L_username" class="layui-form-label">--}}
                {{--<span class="x-red"></span>邮箱地址--}}
            {{--</label>--}}
            {{--<div class="layui-input-inline login-inline">--}}
                {{--<input type="text" id="L_email" name="email" required="" lay-verify="email"--}}
             {{--value="{{$user->email}}"          placeholder=""         autocomplete="off" class="layui-input" style="width: 200%">--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="layui-form-item">--}}
            {{--<label for="L_username" class="layui-form-label">--}}
                {{--<span class="x-red"></span>用户密码--}}
            {{--</label>--}}
            {{--<div class="layui-input-inline login-inline">--}}
                {{--<input type="text" name="password"  placeholder="如果更改请重新输入密码" autocomplete="off" class="layui-input" value="" style="width: 200%">--}}
            {{--</div>--}}
        {{--</div>--}}


        {{--<div class="form-actions">--}}
            <button class="btn btn-warning pull-right" lay-submit lay-filter="login"  type="submit">确认编辑</button>
            {{--<div class="forgot"><a href="#" class="forgot">忘记帐号或者密码</a></div>--}}
        {{--</div>--}}
    </form>

@endsection