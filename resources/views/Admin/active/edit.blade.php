@extends("Admin.admin_layout.default")
@section("title",'商铺查看修改')
@section("content")


    <div class="login-box" style="width: 110%;height: 100%;align-items: center">
        {{--<h1><big>账号信息</big></h1>--}}

        <form class="layui-form layui-form-pane" action="" method="post" style="width: 100%"
              enctype="multipart/form-data">
            {{csrf_field()}}


            <h1><big>添加活动</big></h1>
            {{--开始--}}

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
                    <script id="container" name="content" type="text/plain">{!! $active->content !!}</script>


                </div>
            </div>
            {{--结束--}}


            <button class="btn btn-warning pull-right" lay-submit lay-filter="login" type="submit">确定编辑</button>

        </form>

    </div>
@endsection