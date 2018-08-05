@foreach(['danger','warning','success','info'] as $msg)
    @if(session()->has($msg))
        <div class="layui-form-item">
            {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
            <p class="label-danger{{$msg}}">
                {{session()->get($msg)}}
            </p>
        </div>
    @endif
@endforeach