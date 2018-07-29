@extends("Admin.admin_layout.default")
@section("title",'详情信息')
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
                    <input type="text" name="search"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-input-inline" style="width:80px">
                    <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                </div>
            </div>
        </div>
    </form>
    <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><button class="layui-btn" onclicks="member_add('添加用户','/shop/member-add.html','600','500')">
            <a href="{{route('shops.add')}}"><i class="layui-icon">&#xe608;</i>添加</a></button><span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th><input type="checkbox" name="" value=""></th>

            <th>是否保标记</th>
            <th>是否票标记</th>
            <th>是否准标记</th>
            <th>起送金额</th>
            <th>配送费</th>
            <th>店公告</th>
            <th>优惠信息</th>
            <th>状态:</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>

            <tr>
                <td><input type="checkbox" value="1" name=""></td>

                {{--<td>{{$shop->id}}</td>--}}
                {{--<td>{{$shop->shopCate->name}}</td>--}}
                {{--<td>{{$shop->shop_name}}</td>--}}
                {{--@if($shop->shop_img)--}}
                    {{--<td><img src="/uploads/{{$shop->shop_img}}" width="80"></td>--}}
                {{--@else--}}
                    {{--<td><img src="/uploads/shop_shops/1.jpeg" width="80"></td>--}}
                {{--@endif--}}
                {{--<td>{{$shop->shop_rating}}</td>--}}
                {{--<td>{{$shop->brand==1?'是':'否'}}</td>--}}
                {{--<td>{{$shop->on_time==1?'是':'否'}}</td>--}}
                {{--<td>{{$shop->niao==1?'是':'否'}}</td>--}}
                <td>{{$shop->bao==1?'是':'否'}}</td>
                <td>{{$shop->piao==1?'是':'否'}}</td>
                <td>{{$shop->zhun==1?'是':'否'}}</td>
                <td>{{$shop->start_send}}</td>
                <td>{{$shop->start_cost}}</td>
                <td>{{$shop->notice}}</td>
                <td>{{$shop->discount}}</td>


                <td class="td-status">
                  <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span>
                </td>
                <td class="td-manage">
                    <a style="text-decoration:none" onclick="member_stop(this,'10001')" href="javascript:;" title="停用">
                        <i class="layui-icon">&#xe601;</i>
                    </a>
                    <a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-edit.html','4','','510')"
                       class="ml-5" style="text-decoration:none">
                        <a href="{{route('shops.edit',[$shop])}}"><i class="layui-icon">&#xe642;</i></a>
                    </a>
                    <a style="text-decoration:none"  onclick="member_password('修改密码','member-password.html','10001','600','400')"
                       href="javascript:;" title="查看详情">
                        <a href=""><i class="layui-icon">&#xf06c;</i></a>
                    </a>
                    <a title="删除" href="javascript:;" onclick="member_del(this,'1')"
                       style="text-decoration:none">
                        <a href="{{route('shops.del',[$shop])}}"> <i class="layui-icon">&#xe640;</i></a>
                    </a>
                </td>
            </tr>

        </tbody>

    </table>

    {{--{{$shops->appends(['search'=>$search])->links()}}--}}
@endsection