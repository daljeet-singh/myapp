@extends('Layouts.login')

@section('content')
<div class="lc-block toggled" id="l-login">
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
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="input-group m-b-20">
            <span class="input-group-addon"><i class="md md-person"></i></span>
            <div class="fg-line">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
            </div>
        </div>
        <div class="input-group m-b-20">
            <span class="input-group-addon"><i class="md md-accessibility"></i></span>
            <div class="fg-line">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
        </div>
        
        <div class="clearfix"></div>
        
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember" value="">
                <i class="input-helper"></i>
                Keep me signed in
            </label>
        </div>
        <button type="submit" class="btn btn-login btn-danger btn-float"><i class="md md-arrow-forward"></i></button>
        <ul class="login-navigation">
            <li class="bgm-red"><a style="color:white" href="{{ url('/auth/register') }}">Register</a></li>
            <li class="bgm-orange"><a style="color:white" href="{{ url('/password/email') }}">Forgot Your Password?</a></li>
        </ul>
</div>
@endsection
