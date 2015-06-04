<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Route;
use Auth;
use \App\Model\Role as Role;
use \App\Model\User as User;
use \App\Model\Privilege as Previlege;
use Illuminate\Http\Request;


class RolesController extends Controller {

    public function index() {
        $roles = Role::all()->toArray();
        return view("Roles.index", compact( 'roles' ) );
    }

    public function create() {
        return view( "Roles.create" );
    }

    public function store(Request $request) {
        $data = $request->all();
        $data['is_active'] = 0;
        Role::create($data);
        \Flash::success('Role Created.');
        return redirect( 'roles/' );
    }

    public function show($id) {
        $role =  Role::find($id);
        $users = $role->users;
        $privileges = $role->allPrivileges;
        return view( 'Roles.show', compact( 'users', 'role', 'privileges' ) );
    }

    public function privileges() {
        $controllers = $this->getControllers();
        $roles = Role::all()->lists( 'name', 'id' );
        $privileges = $this->getPrivileges(array_keys($roles)[0]);
        return view( 'Roles.privileges', compact( 'roles', 'controllers', 'privileges' ) );
    }

    public function getControllers() {
        $ignore = array( 'Auth', 'Password', 'OpenHandler', 'Asset', 'Base', 'Welcome' );
        $loader = require base_path('vendor/autoload.php');
        foreach($loader->getClassMap() as $class => $file) {
            if ( preg_match('/[a-z]+Controller$/', $class) ) {
                $temp = explode( '\\', $class);
                $cont = explode( 'Controller', last($temp) )[0];
                if( !in_array( $cont, $ignore ) ) {
                    $controllers[$cont] = array_diff(get_class_methods($class), get_class_methods('App\Http\Controllers\AuthController'));
                }
            }
        }
        return $controllers;
    }

    public function getPrivileges( $roleId ) {
        $privileges = Previlege::where('role_id', $roleId )->where('is_active', 1 )->get()->toArray();
        $return = array();
        foreach( $privileges as $priv ) {
            $return[$priv['controller']][] = $priv['action'];
        }
        $privileges = $return;
        if (\Request::ajax()) {
            $controllers = $this->getControllers();
            return view( 'Roles.createPrivileges', compact( 'controllers', 'privileges' ) );
        }
        return $privileges;
    }

    public function storePrivileges(Request $request) {
        $data = $request->all();
        $privileges = $this->detachPrivileges( $data['privileges'] );
        foreach( $privileges as $controller => $array ) {
            Previlege::where('role_id', $data['role_id'] )->where('controller', $controller )->delete();
            foreach( $array as $values ) {
                Previlege::insert([ 'role_id' => $data['role_id'], 'controller' => $controller, 'action' => $values['action'], 'is_active' => $values['is_active'] ]);
            }
        }
        User::where('role_id', '=', $data['role_id'])->update(['reload' => 1]);
        \Flash::success('Privileges Updated.');
        return redirect( 'roles/' . $data['role_id'] );
    }

    public function detachPrivileges( $master ) {
        $controller = array();
        $vals = array();
        foreach( $master as $main => $value ) {
            $temp = explode( '-', $main );
            $controller[$temp[0]][] = array( 'action' => $temp[1], 'is_active' => $value );
            if( !isset( $vals[$temp[0]] ) ) $vals[$temp[0]] = array( 0, 0 );
            $vals[$temp[0]][$value] += 1;
        }
        foreach( $vals as $cont => $value ) {
            if( $value[0] == 0 ) $controller[$cont] = array( array( 'action' => 'allactions', 'is_active' => 1 ) );
            if( $value[1] == 0 ) $controller[$cont] = array( array( 'action' => 'allactions', 'is_active' => 0 ) );
        }
        return $controller;
    }

    public function setStatus( $id = null, $status = null ) {
        if (\Request::ajax()) {
            $return = ($status+1)%2;
            $role = Role::find($id);
            $role->is_active = $return;
            $role->save();
            User::where('role_id', '=', $id)->update(['reload' => 1]);
            return $return;
        }
        return $status;
    }

    public function setPrivilegeStatus( $id = null, $status = null ) {
        if (\Request::ajax()) {
            $return = ($status+1)%2;
            $privilege = Previlege::find($id);
            $privilege->is_active = $return;
            $privilege->save();
            User::where( 'role_id', '=', $privilege->role_id )->update(['reload' => 1]);
            return $return;
        }
        return $status;
    }

}
