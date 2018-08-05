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
                    <select name="shop_id" id="" class="layui-input">
                        <option value="">请选择商家</option>
                        <option value="-1">已取消订单</option>
                        <option value="3">已完成订单</option>
                    </select>
                </div>


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
            <a href="{{route('role.add')}}"><i class="layui-icon">&#xe608;</i>添加</a></button>
        <span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th><input type="checkbox" name="" value=""></th>
            <th>ID</th>
            <th>商品名称</th>
            <th>商品数量</th>
            <th>商品价格</th>
            <th>商品图片</th>

        </tr>
        </thead>
        <tbody>
        @foreach($orderGoods as $order)
            <tr>
                <td><input type="checkbox" value="1" name=""></td>

                <td>{{$order->id}}</td>
                <td>{{$order->goods_name}}</td>
                <td>{{$order->amount}}</td>
                <td>{{$order->goods_price}}</td>
                <td><img src="{{$order->goods_img}}" alt="" style="width: 80px"></td>





            </tr>
        @endforeach
        </tbody>

    </table>

    {{--{{$pers->appends(['search'=>$search])->links()}}--}}
@endsection