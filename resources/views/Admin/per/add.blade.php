@extends("Admin.admin_layout.default")
@section("title",'添加权限')
@section("content")

    <form class="layui-form layui-form-pane" action="" method="post">
        {{csrf_field()}}
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>权限选择
            </label>
            <div class="layui-input-inline">
                <select name="name" id="" class="layui-select-disabled" multiple="multiple" size="10">
                    @foreach($urls as $url)
                        <option value="{{$url}}" name="" class="layui-select">{{$url}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        {{--<div class="layui-form-item">--}}
            {{--<label for="L_username" class="layui-form-label">--}}
                {{--<span class="x-red"></span>权限名称--}}
            {{--</label>--}}
            {{--<div class="layui-input-inline login-inline">--}}
                {{--<input type="text" name="name" lay-verify="required" placeholder="请输入相应路由名名称" autocomplete="off"--}}
                       {{--class="layui-input" value="" style="width: 200%">--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>权限管家
            </label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="guard_name" lay-verify="required" placeholder="所属管家admin" autocomplete="off"
                       class="layui-input" value="" style="width: 200%">
            </div>
        </div>


        <button class="btn btn-warning pull-right" lay-submit lay-filter="login" type="submit">添加</button>

    </form>

@endsection