@extends("Admin.admin_layout.default")
@section("title",'角色添加')
@section("content")

    <form class="layui-form layui-form-pane" action="" method="post">
        {{csrf_field()}}




        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>角色名称
            </label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="name" lay-verify="required" placeholder="请输入相应路由名名称" autocomplete="off" class="layui-input" value="" style="width: 200%">
            </div>
        </div>

        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>管家
            </label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="guard_name" lay-verify="required" placeholder="所属管家" autocomplete="off" class="layui-input" value="" style="width: 200%">
            </div>
        </div>

        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>权限选择
            </label>
            @foreach($pers as $per)
            <div class="layui-input-inline">
                <input type="checkbox" name="per[]" value="{{$per->name}}" title="{{$per->name}}" >
            </div>
            @endforeach
        </div>





            <button class="btn btn-warning pull-right" lay-submit lay-filter="login"  type="submit">添加</button>

    </form>

@endsection