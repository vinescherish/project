<!-- 顶部开始 -->
<div class="container">
    <div class="logo"><a href="#">X-ADMIN V1.1</a></div>
    <div class="open-nav"><i class="iconfont">&#xe699;</i></div>
    <ul class="layui-nav right" lay-filter="">
        @auth('admin')
        <li class="layui-nav-item">
            <a href="javascript:;">{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->name}}</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
                <dd><a href="">个人信息</a></dd>
                <dd><a href="">切换帐号</a></dd>
                <dd><a href="{{route('admins.logout')}}">退出</a></dd>
            </dl>
        </li>
        @endauth
            @guest('admin')
                <li class="layui-nav-item"><a href="{{route('admins.login')}}">登录</a></li>
            @endguest
            <li class="layui-nav-item"><a href="{{route('admins.reg')}}">注册</a></li>
            <li class="layui-nav-item"><a href="#">前台首页</a></li>
    </ul>
</div>

<!-- 顶部结束 -->