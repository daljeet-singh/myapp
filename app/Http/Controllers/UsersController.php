<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use \App\Model\User as User;
use \App\Model\Role as Role;
use Illuminate\Http\Request;


class UsersController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $users = User::all()->toArray();
        $roles = Role::all()->lists( 'name', 'id' );
        return view("Users.index", compact( 'users', 'roles' ) );
    }

    public function show( $id ) {
        $user = User::findOrFail($id);
        return view( 'Users.show', compact( 'user' ) );
    }

    public function create() {
        $roles = Role::all()->lists( 'name', 'id' );
        return view( "Users.create", compact( 'roles' ) );
    }

    public function store(Request $request) {
        $data = $request->all();
        $data['password'] = bcrypt('secret');
        $data['is_active'] = 1;
        User::create($data);
        \Flash::success('User Created.');
        return redirect( 'users/' );
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        $roles = Role::all()->lists( 'name', 'id' );
        return view( 'Users.edit', compact( 'user', 'roles' ) );
    }

     public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->reload = 1;
        $user->update($request->all());
        \Flash::success('User Updated.');
        return redirect( 'users/' );
    }

    public function setStatus( $userId = null, $status = null ) {
        if (\Request::ajax()) {
            $return = ($status+1)%2;
            $user = User::find($userId);
            $user->is_active = $return;
            $user->reload = 1;
            $user->save();
            return $return;
        }
        return $status;
    }

}
