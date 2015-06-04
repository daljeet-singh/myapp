@extends('Layouts.login')

@section('content')
<div class="lc-block toggled" id="l-register">
    @if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="input-group m-b-20">
            <span class="input-group-addon"><i class="md md-person"></i></span>
            <div class="fg-line">
                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
            </div>
        </div>
        
        <div class="input-group m-b-20">
            <span class="input-group-addon"><i class="md md-mail"></i></span>
            <div class="fg-line">
                <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{ old('email') }}">
            </div>
        </div>
        
        <div class="input-group m-b-20">
            <span class="input-group-addon"><i class="md md-accessibility"></i></span>
            <div class="fg-line">
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
        </div>

        <div class="input-group m-b-20">
            <span class="input-group-addon"><i class="md md-accessibility"></i></span>
            <div class="fg-line">
                <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
            </div>
        </div>
        
        <div class="clearfix"></div>
        <button type="submit" class="btn btn-login btn-danger btn-float"><i class="md md-arrow-forward"></i></button>
        <ul class="login-navigation">
            <li data-block="#l-login" class="bgm-green"><a style="color:white" href="{{ url('/auth/login') }}">Login</a></li>
            <li data-block="#l-forget-password" class="bgm-orange"><a style="color:white" href="{{ url('/password/email') }}">Forgot Your Password?</a></li>
        </ul>
    </form>
</div>
@endsection
