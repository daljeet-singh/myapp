@extends('Layouts.default')
@section('content')
    <div class="block-header">
        <h2>Users</h2>
    </div>
    <div class="card">
        <div class="card-header">
            <h2>Add a User</h2>
        </div>
        <div class="card-body card-padding">            
            <div class="row">
                {!! Form::open(['route' => 'users.store']) !!}
                    @include('Users.form')
                    {!! Form::button('Submit', ['type' => 'submit', 'class' => 'btn bgm-cyan btn-sm m-t-10 waves-effect waves-button waves-float' ]) !!}
                {!! Form::close()!!}
            </div>
        </div>
    </div>
@stop