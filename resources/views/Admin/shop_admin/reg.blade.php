<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户注册</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/project/css/font.css">
    <link rel="stylesheet" href="/project/css/xadmin.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/Swiper/3.4.2/css/swiper.min.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.bootcss.com/Swiper/3.4.2/js/swiper.jquery.min.js"></script>
    <script src="/project/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/project/js/xproject.js"></script>

</head>
<body>
<div class="login-logo"><h1>欢迎加入</h1></div>
<div class="login-box">
    <form class="layui-form layui-form-pane" action="" method="post">
        {{csrf_field()}}
        <h3>账号注册</h3>
        <div class="layui-form-item">
            <label class="layui-form-label login-form"><i class="iconfont">&#xe6b8;</i></label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="name" lay-verify="required" placeholder="请输入你的帐号" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label login-form"><i class="iconfont">&#xe82b;</i></label>
            <div class="layui-input-inline login-inline">
                <input type="text" id="L_email" name="email" required="" lay-verify="email"
                       placeholder="请输入邮箱地址"         autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label login-form"><i class="iconfont">&#xe82b;</i></label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="password" lay-verify="required" placeholder="请输入你的密码" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="form-actions">
            <button class="btn btn-warning pull-right" lay-submit lay-filter="login"  type="submit">注册</button>
            <div class="forgot"><a href="#" class="forgot">忘记帐号或者密码</a></div>
        </div>
    </form>
</div>
<div class="bg-changer">
    <div class="swiper-container changer-list">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img class="item" src="/project/images/a.jpg" alt=""></div>
            <div class="swiper-slide"><img class="item" src="/project/images/b.jpg" alt=""></div>
            <div class="swiper-slide"><img class="item" src="/project/images/c.jpg" alt=""></div>
            <div class="swiper-slide"><img class="item" src="/project/images/d.jpg" alt=""></div>
            <div class="swiper-slide"><img class="item" src="/project/images/e.jpg" alt=""></div>
            <div class="swiper-slide"><img class="item" src="/project/images/f.jpg" alt=""></div>
            <div class="swiper-slide"><img class="item" src="/project/images/g.jpg" alt=""></div>
            <div class="swiper-slide"><img class="item" src="/project/images/h.jpg" alt=""></div>
            <div class="swiper-slide"><img class="item" src="/project/images/i.jpg" alt=""></div>
            <div class="swiper-slide"><img class="item" src="/project/images/j.jpg" alt=""></div>
            <div class="swiper-slide"><img class="item" src="/project/images/k.jpg" alt=""></div>
            <div class="swiper-slide"><span class="reset">初始化</span></div>
        </div>
    </div>
    <div class="bg-out"></div>
    <div id="changer-set"><i class="iconfont">&#xe696;</i></div>
</div>



</body>
</html>