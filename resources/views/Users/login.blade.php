@extends("layouts.default")
@section("title",'用户登录')
@section("content")
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="username" class="col-sm-2 control-label">name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name"  id="username" placeholder="用户名" style="width: 60%" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="username" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password"  id="username" placeholder="password" style="width: 60%" value="">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> 记住密码
                </label>
            </div>
        </div>
    </div>
    {{--<div class="form-group">--}}
        {{--<label for="athor" class="col-sm-2 control-label">作者</label>--}}
        {{--<div class="col-sm-10">--}}
            {{--<select class="form-control" name="user_id" style="width:145px">--}}
                {{--@foreach($users as $user);--}}

                {{--<option value="{{$user->id}}">{{$user->name}}</option>--}}

                {{--@endforeach--}}
            {{--</select>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
        {{--<label for="content" class="col-sm-2 control-label">简介</label>--}}
        {{--<textarea name="content" class="form-control" rows="6" style="width: 300px" ></textarea>--}}
    {{--</div>--}}
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">登录</button>
        </div>
    </div>
</form>
    @endsection