@if(Session::has('status'))
    <p class="alert p-2 bg-dark login-box text-white animated  bounceOutRight" style="animation-duration: 10s;position: absolute;top: 50px;right: 0;z-index: 9999;">
        {{ Session::get('status') }}
    </p>
    @endif