@extends("Home.shop_layout_home.default")
@section("title",'首页')
@section("content")

    <form class="layui-form xbs" action="" method="get">
        {{csrf_field()}}
        <div class="layui-form-pane" style="text-align: center;">
            <div class="layui-form-item" style="display: inline-block;">



                    <label for="L_username" class="layui-form-label">
                        <span class="x-red"></span>所属分类
                    </label>
                    <div class="layui-input-inline">
                        <select name="category_id" id="" class="layui-input">
                            <option value="">请选择分类</option>
                            @foreach($menuCates as $menuCate)

                                <option value="{{$menuCate->id}}">{{$menuCate->name}}</option>
                            @endforeach
                        </select>
                    </div>

                <div class="layui-input-inline xbs768">
                    <input class="layui-input" placeholder="最低价" type="text" value=""  name="min_price">
                </div>
                <div class="layui-input-inline xbs768">

                    <input class="layui-input" placeholder="最高价" type="text" value="" name="max_price">
                </div>
                <div class="layui-input-inline">
                    <input type="text" name="search"  placeholder="菜品名称" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-input-inline" style="width:80px">
                    <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                </div>
            </div>
        </div>
    </form>
    <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><button class="layui-btn" onclicks="member_add('添加用户','/shop/member-add.html','600','500')">
            <a href="{{route('menus.add')}}"><i class="layui-icon">&#xe608;</i>添加</a></button><span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th><input type="checkbox" name="" value=""></th>
            <th>ID</th>
            <th>菜品名称</th>
            <th>所属商家</th>
            <th>所属分类</th>
            <th>菜品介绍</th>
            <th>价格</th>
            {{--<th>月销量</th>--}}
            {{--<th>满意度数量</th>--}}
            <th>菜品图片</th>
            <th>菜品状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($menus as $menu)
            <tr>
                <td><input type="checkbox" value="1" name=""></td>

                <td>{{$menu->id}}</td>
                <td>{{$menu->goods_name}}</td>
                <td>{{$menu->shop->shop_name}}</td>
                <td>{{$menu->menu->name}}</td>
                <td>{{$menu->discription}}</td>
                <td>{{$menu->goods_price}}</td>
                {{--<td>{{$menu->month_sales}}</td>--}}
                {{--<td>{{$menu->satisfy_count}}</td>--}}


                @if($menu->goods_img)
                    <td><img src="https://lunyk.oss-cn-shanghai.aliyuncs.com/{{$menu->goods_img}}?x-oss-process=image/resize,w_80,h_80" ></td>
                @else
                    <td><img src="/uploads/menus/1.jpeg" width="80"></td>
                @endif



                @if($menu->status==1)
                    <td class="td-status">
                        <span class="layui-btn layui-btn-normal layui-btn-normal">是</span>
                    </td>
                @else

                    <td class="td-status">
                        <span class="layui-btn layui-btn-normal layui-btn-danger">否</span>
                    </td>
                @endif

                <td class="td-manage">
                    <a href="{{route('menus.top',[$menu])}}"> <i class="layui-icon">&#xe601;</i></a>
                    <a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-edit.html','4','','510')"
                       class="ml-5" style="text-decoration:none">
                        <a href="{{route('menus.edit',[$menu])}}"><i class="layui-icon">&#xe642;</i></a>
                    </a>
                    <a style="text-decoration:none"  onclick="member_password('修改密码','member-password.html','10001','600','400')"
                       href="javascript:;" title="查看详情">
                        <a href=""><i class="layui-icon">&#xf06c;</i></a>
                    </a>
                    <a title="删除" href="javascript:;" onclick="member_del(this,'1')"
                       style="text-decoration:none">
                        <a href="{{route('menus.del',[$menu])}}"> <i class="layui-icon">&#xe640;</i></a>
                    </a>
                </td>
            </tr>
@endforeach
        </tbody>

    </table>

    {{$menus->appends(['search'=>$search,'minPrice'=>$minPrice,'minPrice'=>$minPrice,'cateId'=>$cateId])->links()}}
@endsection