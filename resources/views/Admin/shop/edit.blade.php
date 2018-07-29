@extends("Admin.admin_layout.default")
@section("title",'编辑')
@section("content")


    <form class="layui-form " method="post" enctype="multipart/form-data">
      {{csrf_field()}}
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>所属分类
            </label>
            <div class="layui-input-inline">
                <select name="shop_category_id" id="" class="layui-input" >
                    @foreach($shopCate as $shopc)
                    <option value="{{$shopc->id}}" @if($shop->shop_category_id===$shopc->id)selected @endif>{{$shopc->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>商家名称
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_username" name="shop_name" required="" lay-verify="nikename"
              value="{{$shop->shop_name}}"         autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>店铺图片
            </label>
            <div class="layui-input-inline">
                <input type="file" id="L_username" name="shop_img"
               value=""        autocomplete="off" class="layui-input">
                <img src="/uploads/{{"$shop->shop_img"}}" width="80" alt="">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>评分
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_username" name="shop_rating" required="" lay-verify="nikename"
              value="{{$shop->shop_rating}}"         autocomplete="off" class="layui-input" style="width: 140%">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>是否品牌
            </label>
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <input type="radio" name="brand" value="1" checked title="是" @if($shop->brand==1)  checked @endif>
                    <input type="radio" name="brand" value="0" title="否" @if($shop->brand==0)  checked @endif>
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>是否准时送达
            </label>
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <input type="radio" name="on_time" value="1" checked title="是" @if($shop->on_time==1)  checked @endif>
                    <input type="radio" name="on_time" value="0" title="否" @if($shop->on_time==0)  checked @endif>
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>是否蜂鸟配送
            </label>
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <input type="radio" name="niao" value="1" checked title="是" @if($shop->niao==1)  checked @endif>
                    <input type="radio" name="niao" value="0" title="否" @if($shop->niao==0)  checked @endif>
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>是否保标记
            </label>
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <input type="radio" name="bao" value="1" checked title="是" @if($shop->bao==1)  checked @endif>
                    <input type="radio" name="bao" value="0" title="否" @if($shop->bao==0)  checked @endif>
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>是否票标记
            </label>
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <input type="radio" name="piao" value="1" checked title="是" @if($shop->piao==1)  checked @endif>
                    <input type="radio" name="piao" value="0" title="否" @if($shop->piao==0)  checked @endif>
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>是否准标记
            </label>
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <input type="radio" name="zhun" value="1" checked title="是" @if($shop->zhun==1)  checked @endif>
                    <input type="radio" name="zhun" value="0" title="否" @if($shop->zhun==0)  checked @endif>
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>起送金额
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_username" name="start_send" required="" lay-verify="nikename"
            value="{{$shop->start_send}}"           autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>配送费
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_username" name="start_cost" required="" lay-verify="nikename"
                value="{{$shop->start_cost}}"       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label for="L_sign" class="layui-form-label">
                店公告
            </label>
            <div class="layui-input-block">
                        <textarea placeholder="随便写些什么刷下存在感" id="L_sign" name="notice" autocomplete="off"
                                  class="layui-textarea" style="height: 80px;">{{$shop->notice}}</textarea>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label for="L_sign" class="layui-form-label">
                优惠信息
            </label>
            <div class="layui-input-block">
                        <textarea placeholder="随便写些什么刷下存在感" id="L_sign" name="discount" autocomplete="off"
                                  class="layui-textarea" style="height: 80px;">{{$shop->discount}}</textarea>
            </div>
        </div>

        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button  class="layui-btn" lay-filter="add" lay-submit="">
                编辑
            </button>
        </div>
    </form>

@endsection