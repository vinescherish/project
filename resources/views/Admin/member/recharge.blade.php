@extends("Admin.admin_layout.default")
@section("title",'用户充值')
@section("content")
    <form class="layui-form layui-form-pane" action="" method="post" style="width: 100%" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>充值金额
            </label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="money" lay-verify="required" placeholder="请输入充值金额" autocomplete="off"
                       class="layui-input " value="" style="width: 180%">
            </div>
        </div>

        {{--<div class="layui-form-item">--}}
            {{--<label for="L_username" class="layui-form-label">--}}
                {{--<span class="x-red"></span>用户密码--}}
            {{--</label>--}}
            {{--<div class="layui-input-inline login-inline">--}}
                {{--<input type="password" name="password" lay-verify="required" placeholder="请输入密码" autocomplete="off"--}}
                       {{--class="layui-input " value="" style="width: 180%">--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="layui-form-item">--}}
            {{--<label for="L_username" class="layui-form-label">--}}
                {{--<span class="x-red"></span>用户电话--}}
            {{--</label>--}}
            {{--<div class="layui-input-inline login-inline">--}}
                {{--<input type="text" name="tel" lay-verify="required" placeholder="请输入电话" autocomplete="off"--}}
                       {{--class="layui-input " value="" style="width: 180%">--}}
            {{--</div>--}}
        {{--</div>--}}


        {{--开始--}}

        {{--<div class="layui-form-item">--}}
            {{--<label for="L_username" class="layui-form-label">--}}
                {{--<span class="x-red">*</span>分类图片--}}
            {{--</label>--}}
            {{--<div class="layui-input-inline">--}}
                {{--<input type="file" id="L_username" name="img" required="" lay-verify="nikename"--}}
                       {{--autocomplete="off" class="layui-input" style="width: 180%">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="layui-form-item">--}}
            {{--<label for="L_username" class="layui-form-label">--}}
                {{--<span class="x-red">*</span>分类状态--}}
            {{--</label>--}}
            {{--<div class="layui-input-inline">--}}
                {{--<input type="checkbox" name="status" value="1" checked title="是否启用">--}}
            {{--</div>--}}
        {{--</div>--}}

        <button class="btn btn-warning pull-right" lay-submit lay-filter="login" type="submit">确认充值</button>

    </form>

    {{--{{$shopCategorys ->appends(['search'=>$search])->links()}}--}}
@endsection