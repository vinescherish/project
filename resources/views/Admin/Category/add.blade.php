@extends("Admin.admin_layout.default")
@section("title",'添加商铺分类')
@section("content")
    <form class="layui-form layui-form-pane" action="" method="post" style="width: 100%" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>分类名称
            </label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="name" lay-verify="required" placeholder="" autocomplete="off"
                       class="layui-input " value="" style="width: 180%">
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
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>分类状态
            </label>
            <div class="layui-input-inline">
                <input type="checkbox" name="status" value="1" checked title="是否启用">
            </div>
        </div>

        <button class="btn btn-warning pull-right" lay-submit lay-filter="login" type="submit">添加</button>

    </form>

    {{--{{$shopCategorys ->appends(['search'=>$search])->links()}}--}}
@endsection