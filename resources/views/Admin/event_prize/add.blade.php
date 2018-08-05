@extends("Admin.admin_layout.default")
@section("title",'添加奖品')
@section("content")


    <div class="login-box" style="width: 100%;height: 100%;margin-left: 0;align-items: center">
        {{--<h1><big>账号信息</big></h1>--}}

        <form class="layui-form layui-form-pane" action="" method="post" style="width: 100%"
              enctype="multipart/form-data">
            {{csrf_field()}}


            <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    <span class="x-red"></span>所属活动
                </label>
                <div class="layui-input-inline">
                    <select name="event_id" id="" class="layui-input" style="width: 200%">
                        @foreach($events as $event)
                            <option value="{{$event->id}}">{{$event->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">奖品名称</span>
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="L_username" name="name" required="" lay-verify="nikename" autocomplete="off"
                           class="layui-input" style="width: 250%" value="">
                </div>
            </div>


            {{--<div class="layui-form-item">--}}
                {{--<label class="layui-form-label xbs768">日期范围</label>--}}
                {{--<div class="layui-input-inline xbs768">--}}
                    {{--<input class="layui-input" placeholder="开始日" id="LAY_demorange_s" name="start_time" required="">--}}
                {{--</div>--}}
                {{--<div class="layui-input-inline xbs768">--}}
                    {{--<input class="layui-input" placeholder="截止日" id="LAY_demorange_e" name="end_time" required="">--}}
                {{--</div>--}}
            {{--</div>--}}


            {{--<div class="layui-form-item">--}}
                {{--<label class="layui-form-label xbs768">开奖日期</label>--}}
                {{--<div class="layui-input-inline xbs768">--}}
                    {{--<input class="layui-input" type="date" placeholder="截止日" id="LAY_demorange_s" name="prize_time"--}}
                           {{--required="">--}}
                {{--</div>--}}
            {{--</div>--}}


            <div class="layui-form-item layui-form-text">
                <label for="L_sign" class="layui-form-label">
                    奖品详情
                </label>
                <div class="layui-input-block">
                        <textarea placeholder="随便写些什么刷下存在感" id="L_sign" name="description" autocomplete="off"
                                  class="layui-textarea" style="height: 80px;"></textarea>
                </div>
            </div>


            {{--<div class="layui-form-item layui-form-text">--}}
                {{--<label for="L_sign" class="layui-form-label">--}}
                    {{--抽奖内容--}}
                {{--</label>--}}
                {{--<div class="layui-input-block">--}}
                    {{--<script type="text/javascript">--}}
                        {{--var ue = UE.getEditor('container');--}}
                        {{--ue.ready(function () {--}}
                            {{--ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.--}}
                        {{--});--}}
                    {{--</script>--}}

                    {{--<!-- 编辑器容器 -->--}}
                    {{--<script id="container" name="content" type="text/plain"></script>--}}


                {{--</div>--}}
            {{--</div>--}}
            {{--结束--}}


            <button class="btn btn-warning pull-right" lay-submit lay-filter="login" type="submit">确定添加</button>

        </form>

    </div>
@endsection