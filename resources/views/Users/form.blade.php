<div class="form-group fg-line">
    {!! Form::label('name', 'Name' ) !!}
    {!! Form::text('name', null, ['class' => 'form-control input-sm required alphabet', 'placeholder' => "Enter Name" ] ) !!}
</div>
<div class="form-group fg-line">
    {!! Form::label('email', 'Email addres' ) !!}
    {!! Form::email('email', null, ['class' => 'form-control input-sm required', 'placeholder' => "Enter Email addres" ] ) !!}
</div>
<div class="form-group fg-line">
    {!! Form::label('role_id', 'Role' ) !!}
    <div class="form-group">
        <div class="fg-line">
            <div class="select">
                {!! Form::select('role_id', $roles, null, ['class' => 'form-control'] ) !!}
            </div>
        </div>
    </div>
</div>