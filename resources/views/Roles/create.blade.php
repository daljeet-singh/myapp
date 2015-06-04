@extends('Layouts.default')
@section('content')
    <div class="block-header">
        <h2>Roles</h2>
    </div>
    <div class="card">
        <div class="card-header">
            <h2>Add new Role</h2>
        </div>
        <div class="card-body card-padding">            
            <div class="row">
                {!! Form::open(['route' => 'roles.store']) !!}
                    <div class="form-group fg-line">
                        {!! Form::label('name', 'Name' ) !!}
                        {!! Form::text('name', null, ['class' => 'form-control input-sm required alphabet', 'placeholder' => "Enter Name" ] ) !!}
                    </div>
                    {!! Form::button('Submit', ['type' => 'submit', 'class' => 'btn bgm-cyan btn-sm m-t-10 waves-effect waves-button waves-float' ]) !!}
                {!! Form::close()!!}
            </div>
        </div>
    </div>
@stop