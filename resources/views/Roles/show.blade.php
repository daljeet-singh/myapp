@extends('Layouts.default')
@section('content')
    <div class="block-header">
        <h2>{{ $role->name }}</h2>
        <ul class="actions">
            <li>
                <a href="{{ route('roles.create') }}">
                    <i class="md md-add"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="card-header">
            <h2>Users</h2>
        </div>
        
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Last Login</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $users as $user )
                        <tr>
                            <td><a href="{{ route( 'users.show', $user['id'] ) }}" >{{ $user['name'] }}</a></td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['last_login'] }}</td>
                            <td>
                            <?php
                                $allowed = false;
                                if( $user['id'] != Auth::User()->id ) $allowed = true;
                            ?>
                            <?php echo \Neo::setStatus( $user['is_active'], $user['id'], $allowed, 'users' ); ?>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h2>Privileges</h2>
            <ul class="actions">
                <li>
                    <a href="{{ route('roles.privileges.create') }}">
                        <i class="md md-add"></i>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Controller</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $privileges as $privilege )
                        <tr>
                            <td>{{ $privilege['controller'] }}</td>
                            <td>{{ $privilege['action'] }}</td>
                            <td>
                            <?php
                                $allowed = false;
                                if( $role['id'] != Auth::User()->role_id ) $allowed = true;
                            ?>
                            <?php echo \Neo::setStatus( $privilege['is_active'], $privilege['id'], $allowed, 'roles', 'setPrivilegeStatus' ); ?>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop