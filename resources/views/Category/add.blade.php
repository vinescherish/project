@extends("layouts.default")
@section("title",'添加商品')
@section("content")
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}


        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">分类名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="name" style="width: 60%" value="">
            </div>
        </div>




        <div class="form-group">
            <label for="status" class="col-sm-2 control-label">分类状态</label>
            <div class="col-sm-10">
                <label class="checkbox-inline">
                    <input type="radio" value="1" name="status"> 启用
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="status" value="0"> 隐藏
                </label>
            </div>
        </div>



        <div class="form-group">
            <label for="num" class="col-sm-2 control-label">上传图片</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="img"  placeholder="文件上传" style="width: 20%" value="">
            </div>
        </div>


       {{--验证码--}}
        {{--<div class="form-group">--}}
            {{--<label for="content" class="col-sm-2 control-label">验证码</label>--}}
            {{--<div class="col-sm-2">--}}
                {{--<input id="captcha" class="form-control" name="captcha" placeholder="请输入验证码">--}}
                {{--<img class="thumbnail captcha" src="{{ captcha_src('flat') }}"--}}
                     {{--onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-info" >确认提交</button>
            </div>
        </div>
    </form>
@endsection