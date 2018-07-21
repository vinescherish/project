@extends("layouts.default")
@section("title",'首页')
@section("content")
    <form class="form-inline" action="" method="get">
        <div class="form-group ">
            <input type="text" class="form-control" name="search" placeholder="搜索">
            <button type="submit" class="btn btn-default ">搜索</button>
        </div>
        <div class="form-group " >
            <a href="{{route('shop_category.add')}}" class="btn btn-success ">添加分类</a>
        </div>
    </form>
    <table class="table table-bordered">
        <tr class="info">
            <td>id</td>
            <td>分类名称</td>
            <td>分类状态</td>
            <td>分类图片</td>
            <td>操作</td>
        </tr>

            @foreach($shopCategorys  as $shopCategory)
            <tr class="active">
                <td>{{$shopCategory->id}}</td>
                <td>{{$shopCategory->name}}</td>
                <td>{{$shopCategory->status==1?'启用中':'已隐藏'}}</td>

                @if($shopCategory->img)
                    <td><img src="/uploads/{{$shopCategory->img}}" width="80"></td>
                @else
                    <td><img src="/uploads/shop_category/img.jpeg " width="80"></td>
                @endif

                <td>
                    <a href="{{route('shop_category.edit',[$shopCategory])}}" class="btn btn-success">编辑</a>
                    <a href="{{route('shop_category.del',[$shopCategory])}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{$shopCategorys ->appends(['search'=>$search])->links()}}
@endsection