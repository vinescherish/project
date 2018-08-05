@extends("Admin.admin_layout.default")
@section("title",'添加导航')
@section("content")

    <form class="layui-form layui-form-pane" action="" method="post">
        {{csrf_field()}}

        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>菜单名称
            </label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="name" lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="" style="width: 130%">
            </div>
        </div>

        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>路由选择
            </label>
            <div class="layui-input-inline">
                <select name="url" id="" class="layui-select-disabled" multiple="multiple" size="10">
                    <option value="">请选择路由</option>
                    @foreach($urls as $url)
                        <option value="{{$url}}" name="" class="layui-select">{{$url}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>上级菜单
            </label>
            <div class="layui-input-inline">
                <select name="pid" id="" class="layui-select-disabled" multiple="multiple" size="10">
                        <option value="">请选择分类</option>
                        <option value="0">顶级分类</option>
                    @foreach($pids as $pid)
                        <option value="{{$pid->id}}">{{$pid->name}}</option>
                      @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>排序
            </label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="sort" lay-verify="required" placeholder="默认100,值越小越靠前" autocomplete="off"
                       class="layui-input" value="100" style="width: 130%">
            </div>
        </div>




        <button class="btn btn-warning pull-right" lay-submit lay-filter="login" type="submit">添加</button>

    </form>

@endsection