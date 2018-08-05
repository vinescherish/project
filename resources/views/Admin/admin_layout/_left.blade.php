<!-- 左侧菜单开始 -->
<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            <li class="list" current>
                <a href="#">
                    <i class="iconfont">&#xe6a9;</i>
                    欢迎页面
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
            </li>

            @foreach(\App\Models\Nav::where('pid',0)->orderBy('sort')->get() as $k1=>$v1)

                <li class="list">
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6a9;</i>
                        {{$v1->name}}
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>

                    <ul class="sub-menu">
                        @foreach(\App\Models\Nav::where("pid",$v1->id)->get() as $k2=>$v2)
                            <li class="list">
                                <a href="{{route($v2->url)}}">
                                    <i class="iconfont">&#xe6a7;</i>
                                    {{$v2->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
            {{--<li class="list" >--}}
            {{--<a href="javascript:;">--}}
            {{--<i class="iconfont">&#xe6a9;</i>--}}
            {{--菜品销量统计--}}
            {{--<i class="iconfont nav_right">&#xe697;</i>--}}
            {{--</a>--}}
            {{--<ul class="sub-menu">--}}
            {{--<li class="list">--}}
            {{--<a href="{{route('order_good.index')}}">--}}
            {{--<i class="iconfont">&#xe6a7;</i>--}}
            {{--总计--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="{{route('order_good.day')}}">--}}
            {{--<i class="iconfont">&#xe6a7;</i>--}}
            {{--每日销售量--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="{{route('order_good.month')}}">--}}
            {{--<i class="iconfont">&#xe6a7;</i>--}}
            {{--每月销售量--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}

            {{--<li class="list">--}}
            {{--<a href="javascript:;">--}}
            {{--<i class="iconfont">&#xe70b;</i>--}}
            {{--会员管理--}}
            {{--<i class="iconfont nav_right">&#xe697;</i>--}}
            {{--</a>--}}
            {{--<ul class="sub-menu">--}}
            {{--<li>--}}
            {{--<a href="{{route('user.lists')}}">--}}
            {{--<i class="iconfont">&#xe6a7;</i>--}}
            {{--会员列表--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="#">--}}
            {{--<i class="iconfont">&#xe6a7;</i>--}}
            {{--会员删除--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="#">--}}
            {{--<i class="iconfont">&#xe6a7;</i>--}}
            {{--等级管理--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="#">--}}
            {{--<i class="iconfont">&#xe6a7;</i>--}}
            {{--积分管理--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="#">--}}
            {{--<i class="iconfont">&#xe6a7;</i>--}}
            {{--浏览记录--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="list" >--}}
            {{--<a href="javascript:;">--}}
            {{--<i class="iconfont">&#xe6a9;</i>--}}
            {{--分类管理--}}
            {{--<i class="iconfont nav_right">&#xe697;</i>--}}
            {{--</a>--}}
            {{--<ul class="sub-menu">--}}
            {{--<li>--}}
            {{--<a href="{{route('shop_category.index')}}">--}}
            {{--<i class="iconfont">&#xe6a7;</i>--}}
            {{--店铺分类--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="list" >--}}
            {{--<a href="javascript:;">--}}
            {{--<i class="iconfont">&#xe6a2;</i>--}}
            {{--商铺管理--}}
            {{--<i class="iconfont nav_right">&#xe697;</i>--}}
            {{--</a>--}}
            {{--<ul class="sub-menu" style="display:none">--}}
            {{--<li>--}}
            {{--<a href="{{route('shops.index')}}">--}}
            {{--<i class="iconfont">&#xe6a7;</i>--}}
            {{--商铺列表--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="list" >--}}
            {{--<a href="javascript:;">--}}
            {{--<i class="iconfont">&#xe6a8;</i>--}}
            {{--管理员管理--}}
            {{--<i class="iconfont nav_right">&#xe697;</i>--}}
            {{--</a>--}}
            {{--<ul class="sub-menu" style="display:none">--}}
            {{--<li>--}}
            {{--<a href="{{route('admins.lists')}}">--}}
            {{--<i class="iconfont">&#xe6a7;</i>--}}
            {{--管理员列表--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="list" >--}}
            {{--<a href="javascript:;">--}}
            {{--<i class="iconfont">&#xe6a8;</i>--}}
            {{--审核管理--}}
            {{--<i class="iconfont nav_right">&#xe697;</i>--}}
            {{--</a>--}}
            {{--<ul class="sub-menu" style="display:none">--}}
            {{--<li>--}}
            {{--<a href="{{route('shops.audlists')}}">--}}
            {{--<i class="iconfont">&#xe6a7;</i>--}}
            {{--待审核列表--}}
            {{--</a>--}}
            {{--</li>--}}


            {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="list" >--}}
            {{--<a href="javascript:;">--}}
            {{--<i class="iconfont">&#xe6a8;</i>--}}
            {{--活动管理--}}
            {{--<i class="iconfont nav_right">&#xe697;</i>--}}
            {{--</a>--}}
            {{--<ul class="sub-menu" style="display:none">--}}
            {{--<li>--}}
            {{--<a href="{{route('active.index')}}">--}}
            {{--<i class="iconfont">&#xe6a7;</i>--}}
            {{--活动列表--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}

            {{--<li class="list" >--}}
            {{--<a href="javascript:;">--}}
            {{--<i class="iconfont">&#xe6a8;</i>--}}
            {{--权限管理--}}
            {{--<i class="iconfont nav_right">&#xe697;</i>--}}
            {{--</a>--}}
            {{--<ul class="sub-menu" style="display:none">--}}
            {{--<li>--}}
            {{--<a href="{{route('per.index')}}">--}}
            {{--<i class="iconfont">&#xe6a7;</i>--}}
            {{--权限列表--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="{{route('role.index')}}">--}}
            {{--<i class="iconfont">&#xe6a7;</i>--}}
            {{--角色列表--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}

            {{--<li class="list" >--}}
            {{--<a href="javascript:;">--}}
            {{--<i class="iconfont">&#xe6a8;</i>--}}
            {{--导航菜单管理--}}
            {{--<i class="iconfont nav_right">&#xe697;</i>--}}
            {{--</a>--}}
            {{--<ul class="sub-menu" style="display:none">--}}
            {{--<li>--}}
            {{--<a href="{{route('nav.index')}}">--}}
            {{--<i class="iconfont">&#xe6a7;</i>--}}
            {{--导航列表--}}
            {{--</a>--}}
            {{--</li>--}}

            {{--</ul>--}}
            {{--</li>--}}
        </ul>
    </div>
</div>
<!-- 左侧菜单结束 -->