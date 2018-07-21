@extends("layouts.default")
@section("title",'分类编辑')
@section("content")
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}


        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">分类名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="name" style="width: 60%" value="{{$shopCategory->name}}">
            </div>
        </div>



        <div class="form-group">
            <label for="status" class="col-sm-2 control-label">分类状态</label>
            <div class="col-sm-10">
                <label class="checkbox-inline">
                    <input type="radio" value="1" @if($shopCategory->status===1) checked @endif name="status"> 启用
                </label>

                <label class="checkbox-inline">
                    <input type="radio" @if($shopCategory->status===0) checked @endif name="status" value="0"> 隐藏
                </label>
            </div>
        </div>



        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">图片上传</label>
            @if($shopCategory->img)
                <div class="col-sm-1">
                    <img src=" /uploads/{{$shopCategory->img}}" width="80">
                </div>
            @else
                <div class="col-sm-1">
                    <img src=" /uploads/shop_category/img.jpeg" width="80">
                </div>
            @endif
            <div class="col-sm-4">
                <input type="file" class="form-control" name="img" placeholder="文件上传" style="width: 60%" value="">
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