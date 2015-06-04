@extends('Layouts.default')
@section('content')
    <div class="block-header">
        <h2>{{ $user->name}}<small>User since {{ $user->created_at }}</small></h2>
        <ul class="actions">
            <li>
                <a href="{{ route('users.edit', $user->id) }}">
                    <i class="md md-edit"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('users.create') }}">
                    <i class="md md-add"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="card" id="profile-main">
        <div class="pm-overview c-overflow">
            <div class="pmo-block pmo-contact hidden-xs">
                <h2>Contact</h2>
                <ul>
                    <li><i class="md md-email"></i> {{ $user->email }}</li>
                    <li><i class="md md-query-builder"></i> {{ $user->last_login }}</li>
                </ul>
            </div>
        </div>
    </div>
@stop