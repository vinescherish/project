<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台登录-X-admin1.1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="/project/css/font.css">
    <link rel="stylesheet" href="/project/css/xadmin.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/Swiper/3.4.2/css/swiper.min.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.bootcss.com/Swiper/3.4.2/js/swiper.jquery.min.js"></script>
    <script src="/project/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/project/js/xadmin.js"></script>

</head>
<body>
<!-- 顶部开始 -->
@include('Admin.admin_layout._header')
<!-- 顶部结束 -->
<!-- 中部开始 -->
<div class="wrapper">
    <!-- 左侧菜单开始 -->

@include('Admin.admin_layout._left')

<!-- 左侧菜单结束 -->
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">
        {{--引入ueditor编辑器样式--}}
        @include('vendor.ueditor.assets')
        {{--引入提示消息--}}
        @include('Admin.admin_layout._msg')
        {{--引入错误提示信息--}}
        @include('Admin.admin_layout._errors')
        {{--内容嵌入  --}}
        @yield('content')
        <!-- 右侧内容框架，更改从这里结束 -->
        </div>
    </div>
    <!-- 右侧主体结束 -->
</div>
<!-- 中部结束 -->
<!-- 底部开始 -->
@include('Admin.admin_layout._footer')
<!-- 底部结束 -->
<!-- 背景切换开始 -->
@include('Admin.admin_layout._beijing')
<!-- 背景切换结束 -->
{{--<script>--}}
{{--//百度统计可去掉--}}
{{--var _hmt = _hmt || [];--}}
{{--(function() {--}}
{{--var hm = document.createElement("script");--}}
{{--hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";--}}
{{--var s = document.getElementsByTagName("script")[0];--}}
{{--s.parentNode.insertBefore(hm, s);--}}
{{--})();--}}
{{--</script>--}}
</body>
</html>