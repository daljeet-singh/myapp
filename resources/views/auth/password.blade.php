@extends('Layouts.login')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="lc-block toggled" id="l-forget-password">
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
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="input-group m-b-20">
            <span class="input-group-addon"><i class="md md-email"></i></span>
            <div class="fg-line">
                <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{ old('email') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-login btn-danger btn-float"><i class="md md-arrow-forward"></i></button>
        
        <ul class="login-navigation">
            <li data-block="#l-login" class="bgm-green"><a style="color:white" href="{{ url('/auth/login') }}">Login</a></li>
            <li data-block="#l-register" class="bgm-red"><a style="color:white" href="{{ url('/auth/register') }}">Register</a></li>
        </ul>
      </form>
</div>
@stop
