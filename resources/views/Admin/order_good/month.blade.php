@extends("Admin.admin_layout.default")
@section("title",'首页')
@section("content")

    <form class="layui-form xbs" action="" method="get">
        {{csrf_field()}}
        <div class="layui-form-pane" style="text-align: center;">
            <div class="layui-form-item" style="display: inline-block;">



                    <label for="L_username" class="layui-form-label">
                        <span class="x-red"></span>商家搜索
                    </label>
                    <div class="layui-input-inline">
                        <select name="shop_id" id="" class="layui-input">
                            <option value="">请选择商家</option>
                            @foreach($shops as $shop)
                                <option value="{{$shop->id}}">{{$shop->shop_name}}</option>
                            @endforeach
                        </select>
                    </div>

                <div class="layui-input-inline xbs768">
                    <input class="layui-input" type="date" placeholder="开始日" id="LAY_demorange_s" name="start_time" value="">
                </div>
                <div class="layui-input-inline xbs768">

                    <input class="layui-input" type="date" placeholder="截止日" id="LAY_demorange_e" name="end_time">
                </div>
                <div class="layui-input-inline">
                    <input type="text" name="size"  placeholder="每页显示条数" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-input-inline" style="width:80px">
                    <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                </div>
            </div>
        </div>
    </form>
    <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><button class="layui-btn" onclicks="member_add('添加用户','/shop/member-add.html','600','500')">
            <a href="#"><i class="layui-icon">&#xe608;</i>添加</a></button><span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th><input type="checkbox" name="" value=""></th>
            <th>月份</th>
            <th>商家</th>
            <th>菜品名称</th>
            <th>每月销量</th>

        </tr>
        </thead>
        <tbody>
        @foreach($goods as $good)
            <tr>
                <td><input type="checkbox" value="1" name=""></td>
                <td>{{$good->date}}</td>
                <td>{{$good->shop->shop_id}}</td>
                <td>{{$good->goods_name}}</td>
                <td>{{$good->nums}}</td>

            </tr>
@endforeach
        </tbody>

    </table>
{{--{{$orders->appends(['size'=>$size,'start_time'=>$start,'end_time'=>$end,'shop_id'=>$shopId])->links()}}--}}
@endsection