@extends("Admin.admin_layout.default")
@section("title",'添加')
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
                    <option value="{{$shopc->id}}">{{$shopc->name}}</option>
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
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>店铺图片
            </label>
            <div class="layui-input-inline">
                <input type="file" id="L_username" name="shop_img" required="" lay-verify="nikename"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>评分
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_username" name="shop_rating" required="" lay-verify="nikename"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>是否品牌
            </label>
            <div class="layui-input-inline">
                <select name="brand" id="" class="layui-input" >
                    <option value="1">是</option>
                    <option value="0">否</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>是否准时送达
            </label>
            <div class="layui-input-inline">
                <select name="on_time" id="" class="layui-input" >
                    <option value="1">是</option>
                    <option value="0">否</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>是否蜂鸟配送
            </label>
            <div class="layui-input-inline">
                <select name="niao" id="" class="layui-input" >
                    <option value="1">是</option>
                    <option value="0">否</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>是否保标记
            </label>
            <div class="layui-input-inline">
                <select name="bao" id="" class="layui-input" >
                    <option value="1">是</option>
                    <option value="0">否</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>是否票标记
            </label>
            <div class="layui-input-inline">
                <select name="piao" id="" class="layui-input" >
                    <option value="1">是</option>
                    <option value="0">否</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>是否准标记
            </label>
            <div class="layui-input-inline">
                <select name="zhun" id="" class="layui-input" >
                    <option value="1">是</option>
                    <option value="0">否</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>起送金额
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_username" name="start_send" required="" lay-verify="nikename"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>配送费
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_username" name="start_cost" required="" lay-verify="nikename"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label for="L_sign" class="layui-form-label">
                店公告
            </label>
            <div class="layui-input-block">
                        <textarea placeholder="随便写些什么刷下存在感" id="L_sign" name="notice" autocomplete="off"
                                  class="layui-textarea" style="height: 80px;"></textarea>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label for="L_sign" class="layui-form-label">
                优惠信息
            </label>
            <div class="layui-input-block">
                        <textarea placeholder="随便写些什么刷下存在感" id="L_sign" name="discount" autocomplete="off"
                                  class="layui-textarea" style="height: 80px;"></textarea>
            </div>
        </div>

        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button  class="layui-btn" lay-filter="add" lay-submit="">
                增加
            </button>
        </div>
    </form>

@endsection