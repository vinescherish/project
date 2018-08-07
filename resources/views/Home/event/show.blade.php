@extends("Home.home_layout.default")
@section("title",'结果查看')
@section("content")

    <form class="layui-form xbs" action="" method="get">
        {{csrf_field()}}
        <div class="layui-form-pane" style="text-align: center;">
            <div class="layui-form-item" style="display: inline-block;">
                <label class="layui-form-label xbs768">日期范围</label>
                <div class="layui-input-inline xbs768">
                    <input class="layui-input" placeholder="开始日" id="LAY_demorange_s" name="start_time" value="">
                </div>
                <div class="layui-input-inline xbs768">
                    <input class="layui-input" placeholder="截止日" id="LAY_demorange_e" name="end_time">
                </div>
                <div class="layui-input-inline">
                    <input type="text" name="search" placeholder="请输入搜索条件" autocomplete="off" class="layui-input">
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
            <a href="{{route('event_prize.add')}}"><i class="layui-icon">&#xe608;</i>添加</a></button>
        <span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th><input type="checkbox" name="" value=""></th>
            <th>ID</th>
            <th>奖品名称</th>
            <th>奖品详情</th>
            <th>获奖用户</th>

            {{--<th>操作</th>--}}
        </tr>
        </thead>
        <tbody>
        @foreach($prizes as $prize)
            <tr>
                <td><input type="checkbox" value="1" name=""></td>
                <td>{{$prize->id}}</td>
                <td>{{$prize->name}}</td>
                <td>{{$prize->description }}</td>
                @if($prize->user_id)
                    <td>{{$prize->user->name}}</td>
                @else
                    <td>未开奖</td>
                @endif

                {{--@if($event->is_prize==1)--}}
                    {{--<td class="td-status">--}}
                        {{--<span class="layui-btn layui-btn-normal layui-btn-normal">已开奖</span>--}}
                    {{--</td>--}}
                {{--@else--}}
                    {{--<td class="td-status">--}}
                        {{--<span class="layui-btn layui-btn-normal layui-btn-danger">未开奖</span>--}}
                    {{--</td>--}}
                {{--@endif--}}

                {{--<td class="td-status">--}}

                    {{--@if($prize->user_id)--}}
                    {{--<a href="#"> <span class="layui-btn layui-btn-normal layui-btn-mini">已开奖</span></a>--}}
                    {{--@else--}}
                    {{--<a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-edit.html','4','','510')"--}}
                       {{--class="ml-5" style="text-decoration:none">--}}
                        {{--<a href="{{route('event_prize.edit',[ $prize])}}"><i class="layui-icon">&#xe642;</i></a>--}}
                    {{--</a>--}}
                    {{--<a style="text-decoration:none"--}}
                    {{--onclick="member_password('修改密码','member-password.html','10001','600','400')"--}}
                    {{--href="javascript:;" title="查看详情">--}}
                    {{--<a href="#"><i class="layui-icon">&#xe648;</i></a>--}}
                    {{--</a>--}}
                    {{--<a title="删除" href="javascript:;" onclick="member_del(this,'1')"--}}
                       {{--style="text-decoration:none">--}}
                        {{--<a href="{{route('event_prize.del',[ $prize])}}"> <i class="layui-icon">&#xe640;</i></a>--}}
                    {{--</a>--}}
                        {{--@endif--}}
                {{--</td>--}}
            </tr>
        @endforeach
        </tbody>

    </table>

    {{--{{$events->links()}}--}}
@endsection