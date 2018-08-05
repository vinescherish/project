@extends("Admin.admin_layout.default")
@section("title",'添加抽奖')
@section("content")


    <div class="login-box" style="width: 110%;height: 100%;margin-left: 0;align-items: center">
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
            <h1><big>抽奖规则</big></h1>
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
                    <span class="x-red">抽奖标题</span>
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="L_username" name="title" required="" lay-verify="nikename" autocomplete="off"
                           class="layui-input" style="width: 250%" value="">
                </div>
            </div>


            <div class="layui-form-item">
                <label class="layui-form-label xbs768">日期范围</label>
                <div class="layui-input-inline xbs768">
                    <input class="layui-input" placeholder="开始日" id="LAY_demorange_s" name="start_time" required="">
                </div>
                <div class="layui-input-inline xbs768">
                    <input class="layui-input" placeholder="截止日" id="LAY_demorange_e" name="end_time" required="">
                </div>
            </div>


            <div class="layui-form-item">
                <label class="layui-form-label xbs768">开奖日期</label>
                <div class="layui-input-inline xbs768">
                    <input class="layui-input" type="date" placeholder="截止日" id="LAY_demorange_s" name="prize_time" required="">
                </div>
            </div>


            <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">人数限制</span>
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="L_username" name="num" required="" lay-verify="nikename" autocomplete="off"
                           class="layui-input" style="width: 200%" value="">
                </div>
            </div>



            <div class="layui-form-item layui-form-text">
                <label for="L_sign" class="layui-form-label">
                    抽奖内容
                </label>
                <div class="layui-input-block">
                    <script type="text/javascript">
                        var ue = UE.getEditor('container');
                        ue.ready(function () {
                            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                        });
                    </script>

                    <!-- 编辑器容器 -->
                    <script id="container" name="content" type="text/plain"></script>


                </div>
            </div>
            {{--结束--}}


            <button class="btn btn-warning pull-right" lay-submit lay-filter="login" type="submit">确定添加</button>

        </form>


    </div>
@endsection