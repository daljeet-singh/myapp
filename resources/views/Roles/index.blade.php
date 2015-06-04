@extends('Layouts.default')
@section('content')
    <div class="block-header">
        <h2>Roles</h2>
        <ul class="actions">
            <li>
                <a href="{{route('roles.create')}}">
                    <i class="md md-add"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="card-header">
            <h2>List Of Roles</h2>
        </div>
        
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $roles as $role )
                        <tr>
                            <td><a href="{{route( 'roles.show', $role['id'] )}}">{{ $role['name'] }}</a></td>
                            <td>
                            <?php
                                $allowed = false;
                                if( $role['id'] != Auth::User()->role_id ) $allowed = true;
                            ?>
                            <?php echo \Neo::setStatus( $role['is_active'], $role['id'], $allowed, 'roles' ); ?>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop