@extends("Admin.admin_layout.default")
@section("title",'权限列表')
@section("content")

    <form class="layui-form xbs" action="" method="get">
        {{csrf_field()}}
        <div class="layui-form-pane" style="text-align: center;">

            <div class="layui-form-item" style="display: inline-block;">

            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>导航搜索
            </label>
            <div class="layui-input-inline">
                <select name="pid" id="" class="layui-input">

                    <option value="">请选择导航</option>
                     @foreach($navs as $nav)
                    <option value="{{$nav->id}}">{{$nav->name}}</option>
                      @endforeach

                </select>
            </div>

                <div class="layui-input-inline xbs768">
                    <input class="layui-input" name="start" placeholder="开始日" id="LAY_demorange_s">
                </div>
                <div class="layui-input-inline xbs768">
                    <input class="layui-input" name="end" placeholder="截止日" id="LAY_demorange_e">
                </div>
                <div class="layui-input-inline">
                    <input type="text" name="name" placeholder="请输导航名" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-input-inline" style="width:80px">
                    <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i>
                    </button>
                </div>
            </div>
       </div>
    </form>
    <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button>
        <button class="layui-btn" onclicks="member_add('添加用户','/shop/member-add.html','600','500')">
            <a href="{{route('nav.add')}}"><i class="layui-icon">&#xe608;</i>添加</a></button>
        <span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th><input type="checkbox" name="" value=""></th>
            <th>ID</th>
            <th>导航名</th>
            <th>路由</th>
            <th>所属导航</th>
            <th>排序</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($navAll as $na)
            <tr>
                <td><input type="checkbox" value="1" name=""></td>

                <td>{{$na->id}}</td>
                <td>{{$na->name}}</td>
                <td>{{$na->url}}</td>
                <td>{{$na->get->name}}</td>
                <td>{{$na->sort}}</td>


                <td class="td-manage">
                    <a href="#"><i class="layui-icon">&#xe601;</i></a>
                    <a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-edit.html','4','','510')"
                       class="ml-5" style="text-decoration:none">
                        <a href="#"><i class="layui-icon">&#xe642;</i></a>
                    </a>
                    {{--<a style="text-decoration:none"--}}
                       {{--onclick="member_password('修改密码','member-password.html','10001','600','400')"--}}
                       {{--href="javascript:;" title="查看详情"><i class="layui-icon">&#xe643;</i></a>--}}

                    <a title="删除" href="javascript:;" onclick="member_del(this,'1')"
                       style="text-decoration:none">
                        <a href="#"> <i class="layui-icon">&#xe640;</i></a>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

    {{--{{$navAll->links()}}--}}
@endsection