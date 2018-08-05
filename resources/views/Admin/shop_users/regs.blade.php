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
    <script type="text/javascript" src="/project/js/xadmin.js"></script>

</head>
<body>


<div class="login-box"  style="width: 60%;height: 100%;align-items: center" >
    <h1><big>账号信息</big></h1>

    <form class="layui-form layui-form-pane" action="" method="post" style="width: 100%" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>用户名
            </label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="name" lay-verify="required" placeholder="" autocomplete="off" class="layui-input " value="" style="width: 250%">
            </div>
        </div>

        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>邮箱地址
            </label>
            <div class="layui-input-inline login-inline">
                <input type="text" id="L_email" name="email" required="" lay-verify="email"
                       style="width: 250%"       value=""          placeholder=""         autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red"></span>用户密码
            </label>
            <div class="layui-input-inline login-inline">
                <input type="text" name="password"  placeholder="" autocomplete="off" lay-verify="required" class="layui-input" value="" style="width: 250%" >
            </div>
        </div>
        <h1><big>商铺信息</big></h1>
        {{--开始--}}
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>所属分类
            </label>
            <div class="layui-input-inline">
                <select name="shop_category_id" id="" class="layui-input"  style="width: 200%">
                    @foreach($shopCates as $shopCate)
                        <option  value="{{$shopCate->id}}">{{$shopCate->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>商家名称
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_username" name="shop_name" required="" lay-verify="nikename" autocomplete="off" class="layui-input" style="width: 250%">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>店铺图片
            </label>
            <div class="layui-input-inline">
                <input type="file" id="L_username" name="shop_img" required="" lay-verify="nikename"
                       autocomplete="off" class="layui-input" style="width: 180%">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>评分
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_username" name="shop_rating" required="" lay-verify="nikename"
                       autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">

                <div class="layui-input-inline">
                    <input type="checkbox" name="brand" value="1" checked title="是否品牌" >

                </div>
                <div class="layui-input-inline">
                    <input type="checkbox" name="on_time" value="1" checked title="是否准时送达" >
                </div>
            <div class="layui-input-inline">
                <input type="checkbox" name="niao" value="1" checked title="是否准蜂鸟配送" >
            </div>
            <div class="layui-input-inline">
                <input type="checkbox" name="bao" value="1" checked title="是否保标记" >
            </div>
            <div class="layui-input-inline">
                <input type="checkbox" name="piao" value="1" checked title="是否票标记" >
            </div>
            <div class="layui-input-inline">
                <input type="checkbox" name="zhun" value="1" checked title="是否准标记" >
            </div>
        </div>




        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>起送金额
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_username" name="start_send" required="" lay-verify="nikename"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>配送费
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_username" name="start_cost" required="" lay-verify="nikename"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label for="L_sign" class="layui-form-label">
                店公告
            </label>
            <div class="layui-input-block">
                        <textarea placeholder="随便写些什么刷下存在感" id="L_sign" name="notice" autocomplete="off"
                                  lay-verify="required"              class="layui-textarea" style="height: 80px;"></textarea>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label for="L_sign" class="layui-form-label">
                优惠信息
            </label>
            <div class="layui-input-block">
                        <textarea placeholder="随便写些什么刷下存在感" id="L_sign" name="discount" autocomplete="off"
                                  lay-verify="required"                         class="layui-textarea" style="height: 80px;"></textarea>
            </div>
        </div>
{{--结束--}}




        <button class="btn btn-warning pull-right" lay-submit lay-filter="login"  type="submit">注册</button>

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
{{--<script>--}}
    {{--$(function  () {--}}
        {{--layui.use('form', function(){--}}
            {{--var form = layui.form();--}}
            {{--//监听提交--}}
            {{--form.on('submit(login)', function(data){--}}
                {{--layer.msg(JSON.stringify(data.field),function(){--}}
                    {{--location.href='index.html'--}}
                {{--});--}}
                {{--return false;--}}
            {{--});--}}
        {{--});--}}
    {{--})--}}

{{--</script>--}}


</body>
</html>