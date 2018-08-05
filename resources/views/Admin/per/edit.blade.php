@extends("Admin.admin_layout.default")
@section("title",'添加权限')
@section("content")

    <form class="layui-form layui-form-pane" action="" method="post">
        {{csrf_field()}}
        {{--<div class="layui-form-item">--}}
            {{--<label for="L_username" class="layui-form-label">--}}
                {{--<span class="x-red"></span>是否管理员--}}
            {{--</label>--}}
            {{--<div class="layui-input-inline">--}}
                {{--<select name="status_admin" id="" class="layui-input" >--}}
                    {{--<option value="1" @if($admin->status_admin==1) selected  @endif>是</option>--}}
                    {{--<option value="0" @if($admin->status_admin==0) selected  @endif>否</option>--}}
                {{--</select>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>权限名称
            </label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="name" lay-verify="required" placeholder="请输入相应路由名名称" autocomplete="off" class="layui-input" value="{{$per->name}}" style="width: 200%">
            </div>
        </div>

        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>权限管家
            </label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="guard_name" lay-verify="required" placeholder="所属管家" autocomplete="off" class="layui-input" value="{{$per->guard_name}}" style="width: 200%">
            </div>
        </div>







            <button class="btn btn-warning pull-right" lay-submit lay-filter="login"  type="submit">添加</button>

    </form>

@endsection