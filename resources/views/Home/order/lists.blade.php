@extends("Home.home_layout.default")
@section("title",'订单列表')
@section("content")

    <form class="layui-form xbs" action="" method="get">
        {{csrf_field()}}
        <div class="layui-form-pane" style="text-align: center;">
            <div class="layui-form-item" style="display: inline-block;">

                <label for="L_username" class="layui-form-label">
                    <span class="x-red"></span>订单搜索
                </label>
                <div class="layui-input-inline">
                    <select name="status" id="" class="layui-input">
                        <option value="">请选择</option>
                        <option value="-1">已取消订单</option>
                        <option value="3">已完成订单</option>
                        <option value="2">待处理订单</option>

                    </select>
                </div>


                <div class="layui-input-inline xbs768">
                    <input class="layui-input" type="date" name="start" placeholder="开始日" id="LAY_demorange_s">
                </div>
                <div class="layui-input-inline xbs768">
                    <input class="layui-input" type="date" name="end" placeholder="截止日" id="LAY_demorange_e">
                </div>
                <div class="layui-input-inline">
                    <input type="text" name="name" placeholder="请输入用户名" autocomplete="off" class="layui-input">
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
            <a href="#"><i class="layui-icon">&#xe608;</i>添加</a></button>
        <span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th><input type="checkbox" name="" value=""></th>
            <th>ID</th>
            <th>收货人姓名</th>
            <th>订单编号</th>
            <th>联系电话</th>
            <th>收货地址</th>
            <th>订单金额</th>
            <th>订单状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td><input type="checkbox" value="1" name=""></td>

                <td>{{$order->id}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->order_code}}</td>
                <td>{{$order->tel}}</td>
                <td>{{$order->order_address}}</td>
                <td>{{$order->order_price}}</td>


                @if($order->status==1)
                    <td class="td-status">
                        <span class="layui-btn layui-btn-normal layui-btn-small">待发货</span>
                    </td>
                @elseif($order->status==0)

                    <td class="td-status">
                        <span class="layui-btn layui-btn-normal layui-btn-small">待付款</span>
                    </td>
                @elseif($order->status==-1)
                    <td class="td-status">
                        <span class="layui-btn layui-btn-normal layui-btn-small">已取消</span>
                    </td>
                @elseif($order->status==2)
                    <td class="td-status">
                        <span class="layui-btn layui-btn-normal layui-btn-small">待确认</span>
                    </td>
                @elseif($order->status==3)
                    <td class="td-status">
                        <span class="layui-btn layui-btn-normal layui-btn-small">已完成</span>
                    </td>
                @endif


                <td class="td-manage">

                    <a href="{{route('orders.show',[$order])}}"><span class="layui-btn layui-btn-normal layui-btn-mini">查看</span></a>

                  @if($order->status==0)
                    <a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-edit.html','4','','510')" class="ml-5" style="text-decoration:none">

                        <a href="{{route('orders.change',[$order,1])}}"><span class="layui-btn layui-btn-normal layui-btn-mini">发货</span></a>
                    </a>
                 @endif

                    @if($order->status==1)
                    <a style="text-decoration:none" onclick="member_password('修改密码','member-password.html','10001','600','400')" href="javascript:;" title="查看详情"><a href="{{route('orders.change',[$order,2])}}"><span class="layui-btn layui-btn-normal layui-btn-mini">确认</span></a>
                    </a>
                    @endif
                    @if($order->status==2)
                        <a title="删除" href="javascript:;" onclick="member_del(this,'1')" style="text-decoration:none">
                            <a href="{{route('orders.change',[$order,3])}}"><span class="layui-btn layui-btn-normal layui-btn-mini">完成</span></a>
                        </a>
                    @endif
                    @if($order->status!==3&&$order->status!==-1)
                    <a title="删除" href="javascript:;" onclick="member_del(this,'1')" style="text-decoration:none">
                        <a href="{{route('orders.change',[$order,-1])}}"><span class="layui-btn layui-btn-normal layui-btn-mini">取消</span></a>
                    </a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

    {{--{{$pers->appends(['search'=>$search])->links()}}--}}
@endsection