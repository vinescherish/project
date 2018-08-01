@extends("Admin.admin_layout.default")
@section("title",'编辑商铺分类')
@section("content")
    <form class="layui-form layui-form-pane" action="" method="post" style="width: 100%" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>分类名称
            </label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="name" lay-verify="required" placeholder="" autocomplete="off"  class="layui-input " value="{{$shopCate->name}}" style="width: 180%">
            </div>
        </div>


        {{--开始--}}

        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>分类图片
            </label>
            <div class="layui-input-inline">
                <input type="file" id="L_username" name="img" required="" lay-verify="nikename"
                       autocomplete="off" class="layui-input" style="width: 180%">
            </div>
        </div>


        <button class="btn btn-warning pull-right" lay-submit lay-filter="login" type="submit">确定</button>

    </form>


@endsection