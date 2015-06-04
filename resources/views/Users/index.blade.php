@extends('Layouts.default')
@section('content')
    <div class="block-header">
        <h2>Users</h2>
        <ul class="actions">
            <li>
                <a href="{{ route('users.create') }}">
                    <i class="md md-add"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="card-header">
            <h2>List Of Users</h2>
        </div>
        
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $users as $user )
                        <tr>
                            <td><a href="{{ route( 'users.show', $user['id'] ) }}" >{{ $user['name'] }}</a></td>
                            <td>{{ $roles[$user['role_id']] }}</td>
                            <td>{{ $user['email'] }}</td>
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
@stop