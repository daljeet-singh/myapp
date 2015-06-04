<?php
Route::group(['middleware' => ['auth', 'before']], function() {
    Route::get( '/', 'DashboardController@index' );
    Route::get( 'dashboard', [ 'as'=> 'dashboard', 'uses' => 'DashboardController@index' ] );
    Route::resource( 'users', 'UsersController' );
    Route::resource( 'roles', 'RolesController' );
    Route::get( 'users/setStatus/{userId}/{status}', 'UsersController@setStatus' );
    Route::get( 'roles/setStatus/{id}/{status}', 'RolesController@setStatus' );
    Route::get( 'roles/setPrivilegeStatus/{id}/{status}', 'RolesController@setPrivilegeStatus' );
    Route::get( 'roles/privileges/create', [ 'as'=> 'roles.privileges.create', 'uses' => 'RolesController@privileges' ] );
    Route::post( 'roles/privileges/store', [ 'as'=> 'roles.privileges.store', 'uses' => 'RolesController@storePrivileges' ] );
    Route::get( 'roles/getPrivileges/{roleId}/', [ 'as'=> 'roles.privileges.get', 'uses' => 'RolesController@getPrivileges' ] );
});

Route::controllers([
    'auth' => 'AuthController',
    'password' => 'Auth\PasswordController',
]);
