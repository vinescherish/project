@extends("layouts.default")
@section("title",'首页')
@section("content")
    <form class="form-inline" action="" method="get">
        <div class="form-group">
            <input type="text" class="form-control" name="search" placeholder="搜索">
            <button type="submit" class="btn btn-default">搜索</button>
        </div>
    </form>
    <table class="table table-bordered">
        <tr class="info">
            <td>id</td>
            <td>用户名</td>
            <td>是否vip</td>
            <td>用户用户头像</td>
            <td>操作</td>
        </tr>

        @foreach($users  as $user)
            <tr class="active">
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->status==1?'vip会员':'普通会员'}}</td>

                @if($user->logo)
                    <td><img src=" /uploads/{{$user->logo}}" width="80"></td>
                @else
                    <td><img src=" /uploads/users/logo.jpg" width="80"></td>
                @endif

                <td>
                    <a href="{{route('user.edit',[$user])}}" class="btn btn-success">编辑</a>
                    <a href="{{route('user.del',[$user])}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{$users->appends(['search'=>$search])->links()}}
@endsection