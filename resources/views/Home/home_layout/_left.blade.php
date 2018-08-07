<!-- 左侧菜单开始 -->
<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            <li class="list" current>
                <a href="#">
                    <i class="iconfont">&#xe761;</i>
                    欢迎页面
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
            </li>
            <li class="list">
                <a href="javascript:;">
                    <i class="iconfont">&#xe70b;</i>
                    会员管理
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{route('users.lists')}}">
                            <i class="iconfont">&#xe6a7;</i>
                            会员列表
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="iconfont">&#xe6a7;</i>
                            会员删除
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="iconfont">&#xe6a7;</i>
                            等级管理
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="iconfont">&#xe6a7;</i>
                            积分管理
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="iconfont">&#xe6a7;</i>
                            浏览记录
                        </a>
                    </li>
                </ul>
            </li>
            <li class="list" >
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a9;</i>
                    分类管理
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{route('menu_category.index')}}">
                            <i class="iconfont">&#xe6a7;</i>
                            商品分类列表
                        </a>
                    </li>
                </ul>
            </li>
            <li class="list" >
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a2;</i>
                    商品管理
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu" style="display:none">
                    <li>
                        <a href="{{route('menus.index')}}">
                            <i class="iconfont">&#xe6a7;</i>
                           商品列表
                        </a>
                    </li>
                </ul>
            </li>


            <li class="list" >
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a8;</i>
                    活动管理
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu" style="display:none">
                    <li>
                        <a href="{{route('actives.index')}}">
                            <i class="iconfont">&#xe6a7;</i>
                            优惠活动
                        </a>
                    </li>
                    <li>
                        <a href="{{route('events.index')}}">
                            <i class="iconfont">&#xe6a7;</i>
                           抽奖活动
                        </a>
                    </li>
                </ul>
            </li>
            <li class="list" >
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a8;</i>
                    订单管理
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu" style="display:none">
                    <li>
                        <a href="{{route('orders.lists')}}">
                            <i class="iconfont">&#xe6a7;</i>
                            订单列表
                        </a>
                    </li>
                </ul>
            </li>
            <li class="list" >
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a8;</i>
                   订单量统计
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu" style="display:none">
                    <li>
                        <a href="{{route('orders.day')}}">
                            <i class="iconfont">&#xe6a7;</i>
                            每日订单量
                        </a>
                    </li>
                    <li>
                        <a href="{{route('orders.month')}}">
                            <i class="iconfont">&#xe6a7;</i>
                            每月订单量
                        </a>
                    </li>
                    <li>
                        <a href="{{route('orders.index')}}">
                            <i class="iconfont">&#xe6a7;</i>
                            订单计总
                        </a>
                    </li>
                </ul>
            </li>
            <li class="list" >
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a8;</i>
                    菜品销量统计
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu" style="display:none">
                    <li>
                        <a href="{{route('orders_good.day')}}">
                            <i class="iconfont">&#xe6a7;</i>
                            每日销售量
                        </a>
                    </li>
                    <li>
                        <a href="{{route('orders_good.month')}}">
                            <i class="iconfont">&#xe6a7;</i>
                            每月销售量
                        </a>
                    </li>
                    <li>
                        <a href="{{route('orders_good.index')}}">
                            <i class="iconfont">&#xe6a7;</i>
                            销售计总
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- 左侧菜单结束 -->