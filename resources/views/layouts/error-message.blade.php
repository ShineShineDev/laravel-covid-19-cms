<!--display error-->
@if ($errors->any())
    <p class="alert p-2 bg-dark login-box text-warning panel-box animated  bounceOutRight" style="animation-duration: 20s;position: absolute;top: 50px;right: 0;z-index: 9999;">
        @foreach ($errors->all() as $error)
                <i class="material-icons float-left" style="font-size: 20px;">error</i>&nbsp;&nbsp;{{$error}}<br>
        @endforeach
    </p>
@endif