@extends("shop_layout.default")
@section("title",'商铺查看修改')
@section("content")


    <div class="login-box" style="width: 110%;height: 100%;align-items: center">
        {{--<h1><big>账号信息</big></h1>--}}

        <form class="layui-form layui-form-pane" action="" method="post" style="width: 100%"
              enctype="multipart/form-data">
            {{csrf_field()}}

            {{--<div class="layui-form-item">--}}
            {{--<label for="L_username" class="layui-form-label">--}}
            {{--<span class="x-red"></span>用户名--}}
            {{--</label>--}}
            {{--<div class="layui-input-inline login-inline">--}}
            {{--<input type="text" name="name" lay-verify="required" placeholder="" autocomplete="off" class="layui-input " value="" style="width: 250%">--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--<div class="layui-form-item">--}}
            {{--<label for="L_username" class="layui-form-label">--}}
            {{--<span class="x-red"></span>邮箱地址--}}
            {{--</label>--}}
            {{--<div class="layui-input-inline login-inline">--}}
            {{--<input type="text" id="L_email" name="email" required="" lay-verify="email"--}}
            {{--style="width: 250%"       value=""          placeholder=""         autocomplete="off" class="layui-input">--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--<div class="layui-form-item">--}}
            {{--<label for="L_username" class="layui-form-label">--}}
            {{--<span class="x-red"></span>用户密码--}}
            {{--</label>--}}
            {{--<div class="layui-input-inline login-inline">--}}
            {{--<input type="text" name="password"  placeholder="" autocomplete="off" lay-verify="required" class="layui-input" value="" style="width: 250%" >--}}
            {{--</div>--}}
            {{--</div>--}}
            <h1><big>添加活动</big></h1>
            {{--开始--}}
            {{--<div class="layui-form-item">--}}
            {{--<label for="L_username" class="layui-form-label">--}}
            {{--<span class="x-red">*</span>所属分类--}}
            {{--</label>--}}
            {{--<div class="layui-input-inline">--}}
            {{--<select name="shop_category_id" id="" class="layui-input"  style="width: 200%">--}}
            {{--@foreach($shopCates as $shopc)--}}
            {{--<option  value="{{$shopc->id}}">{{$shopc->name}}</option>--}}
            {{--@endforeach--}}
            {{--</select>--}}
            {{--</div>--}}
            {{--</div>--}}
            <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">*</span>活动标题
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="L_username" name="title" required="" lay-verify="nikename" autocomplete="off"
                           class="layui-input" style="width: 250%" value="{{$active->title}}">
                </div>
            </div>


            <div class="layui-form-item">
                <label class="layui-form-label xbs768">日期范围</label>
                <div class="layui-input-inline xbs768">
                    <input    class="layui-input" placeholder="开始日" id="LAY_demorange_s" name="start_time"
                    value="{{$active->start_time}}">
                </div>
                <div class="layui-input-inline xbs768">
                    <input class="layui-input" placeholder="截止日" id="LAY_demorange_e" name="end_time"
                    value="{{$active->end_time}}">
                </div>
            </div>
            {{--<div class="layui-form-item">--}}
            {{--<label for="L_username" class="layui-form-label">--}}
            {{--<span class="x-red">*</span>店铺图片--}}
            {{--</label>--}}
            {{--<div class="layui-input-inline">--}}
            {{--<input type="file" id="L_username" name="shop_img"  lay-verify="nikename" autocomplete="off" class="layui-input" style="width: 180%">--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="layui-form-item">--}}
            {{--<label for="L_username" class="layui-form-label">--}}
            {{--<span class="x-red">*</span>评分--}}
            {{--</label>--}}
            {{--<div class="layui-input-inline">--}}
            {{--<input type="text" id="L_username" name="shop_rating" required="" lay-verify="nikename"--}}
            {{--value=""    autocomplete="off" class="layui-input">--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--<div class="layui-form-item">--}}

            {{--<div class="layui-input-inline">--}}
            {{--<input type="checkbox" name="brand" value="1" @if($shop->brand==1) checked @endif title="是否品牌" >--}}

            {{--</div>--}}
            {{--<div class="layui-input-inline">--}}
            {{--<input type="checkbox" name="on_time" value="1" @if($shop->on_time==1) checked @endif  title="是否准时送达" >--}}
            {{--</div>--}}
            {{--<div class="layui-input-inline">--}}
            {{--<input type="checkbox" name="niao" value="1" @if($shop->niao==1) checked @endif title="是否准蜂鸟配送" >--}}
            {{--</div>--}}
            {{--<div class="layui-input-inline">--}}
            {{--<input type="checkbox" name="bao" value="1" checked title="是否保标记" >--}}
            {{--</div>--}}
            {{--<div class="layui-input-inline">--}}
            {{--<input type="checkbox" name="piao" value="1" @if($shop->piao==1) checked @endif title="是否票标记" >--}}
            {{--</div>--}}
            {{--<div class="layui-input-inline">--}}
            {{--<input type="checkbox" name="zhun" value="1" @if($shop->zhun==1) checked @endif title="是否准标记" >--}}
            {{--</div>--}}
            {{--</div>--}}




            {{--<div class="layui-form-item">--}}
            {{--<label for="L_username" class="layui-form-label">--}}
            {{--<span class="x-red">*</span>起送金额--}}
            {{--</label>--}}
            {{--<div class="layui-input-inline">--}}
            {{--<input type="text" id="L_username" name="start_send" required="" lay-verify="nikename" value=""       autocomplete="off" class="layui-input">--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="layui-form-item">--}}
            {{--<label for="L_username" class="layui-form-label">--}}
            {{--<span class="x-red">*</span>配送费--}}
            {{--</label>--}}
            {{--<div class="layui-input-inline">--}}
            {{--<input type="text" id="L_username" name="start_cost" required="" lay-verify="nikename"--}}
            {{--value=""           autocomplete="off" class="layui-input">--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="layui-form-item layui-form-text">--}}
            {{--<label for="L_sign" class="layui-form-label">--}}
            {{--店公告--}}
            {{--</label>--}}
            {{--<div class="layui-input-block">--}}
            {{--<textarea placeholder="随便写些什么刷下存在感" id="L_sign" name="notice" autocomplete="off"--}}
            {{--lay-verify="required"              class="layui-textarea" style="height: 80px;"></textarea>--}}
            {{--</div>--}}
            {{--</div>--}}
            <div class="layui-form-item layui-form-text">
                <label for="L_sign" class="layui-form-label">
                    活动内容
                </label>
                <div class="layui-input-block">
                {{--<textarea placeholder="随便写些什么刷下存在感" id="L_sign" name="discount" autocomplete="off"--}}
                {{--lay-verify="required"                         class="layui-textarea" style="height: 80px;"></textarea>--}}
                <!-- 实例化编辑器 -->
                    <script type="text/javascript">
                        var ue = UE.getEditor('container');
                        ue.ready(function () {
                            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                        });
                    </script>

                    <!-- 编辑器容器 -->
                    <script id="container" name="content" type="text/plain">{{$active->content}}</script>


                </div>
            </div>
            {{--结束--}}


            <button class="btn btn-warning pull-right" lay-submit lay-filter="login" type="submit">确定编辑</button>

        </form>


    </div>
@endsection