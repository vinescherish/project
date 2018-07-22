@extends("shop_layout.default")
@section("title",'管理员首页')
@section("content")

    <form class="layui-form xbs" action="" method="get">
        {{csrf_field()}}
        <div class="layui-form-pane" style="text-align: center;">
            <div class="layui-form-item" style="display: inline-block;">
                <label class="layui-form-label xbs768">日期范围</label>
                <div class="layui-input-inline xbs768">
                    <input class="layui-input" placeholder="开始日" id="LAY_demorange_s">
                </div>
                <div class="layui-input-inline xbs768">
                    <input class="layui-input" placeholder="截止日" id="LAY_demorange_e">
                </div>
                <div class="layui-input-inline">
                    <input type="text" name="search" placeholder="请输入用户名" autocomplete="off" class="layui-input">
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
            <a href="{{route('admins.reg')}}"><i class="layui-icon">&#xe608;</i>添加</a></button>
        <span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th><input type="checkbox" name="" value=""></th>
            <th>ID</th>
            <th>用户名</th>
            {{--<th>所属商家</th>--}}
            <th>邮箱地址</th>
            <th>是否管理员</th>
            <th>账户状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($admins as $admin)
            <tr>
                <td><input type="checkbox" value="1" name=""></td>
                <td>{{$admin->id}}</td>
                <td>{{$admin->name}}</td>
                <td>{{$admin->email}}</td>
               {{--<td>{{$admin->status==1?'是':'否'}}</td>--}}
                {{--<td>{{$admin->status}}</td>--}}

                @if($admin->status_admin==1)
                    <td class="td-status">
                        <span class="layui-btn layui-btn-normal layui-btn-normal">是</span>
                    </td>
                @else
                    <td class="td-status">
                        <span class="layui-btn layui-btn-normal layui-btn-danger">否</span>
                    </td>
                @endif

                @if($admin->status==1)
                    <td class="td-status">
                        <span class="layui-btn layui-btn-normal layui-btn-normal">启用</span>
                    </td>
                @else
                    <td class="td-status">
                        <span class="layui-btn layui-btn-normal layui-btn-danger">禁用</span>
                    </td>
                @endif

                <td class="td-status">
                    <a href="{{route('admins.top',[$admin])}}"> <i class="layui-icon">&#xe601;</i></a>


                    <a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-edit.html','4','','510')"
                       class="ml-5" style="text-decoration:none">
                        <a href="{{route('admins.edit',[$admin])}}"><i class="layui-icon">&#xe642;</i></a>
                    </a>
                    <a style="text-decoration:none"
                       onclick="member_password('修改密码','member-password.html','10001','600','400')"
                       href="javascript:;" title="查看详情">
                        <a href=""><i class="layui-icon">&#xf06c;</i></a>
                    </a>
                    <a title="删除" href="javascript:;" onclick="member_del(this,'1')"
                       style="text-decoration:none">
                        <a href="{{route('admins.del',[$admin])}}"> <i class="layui-icon">&#xe640;</i></a>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

    {{$admins->appends(['search'=>$search])->links()}}
@endsection