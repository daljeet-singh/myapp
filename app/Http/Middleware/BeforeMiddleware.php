<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use App\Model\Privilege;
use App\Model\Role;
use App\Model\User;
use Auth;


class BeforeMiddleware implements Middleware {

    public function handle($request, Closure $next) {
        $this->__checkReload();
        $currentAction = $request->route()->getActionName();
        list($controller, $action) = explode('Controller@', $currentAction);
        $controller = preg_replace('/.*\\\/', '', $controller);
        $privileges = Session::get( 'privileges' )[0];
        if( isset( $privileges[$controller] ) && ( in_array( $action, $privileges[$controller] ) || in_array( 'allactions', $privileges[$controller] ) ) ) {
            return $next($request);
        } else {
            \Flash::error('Sorry! Action not allowed.');
            return redirect()->guest('/dashboard');
        }
    }

    protected function __checkReload() {
        if( Auth::user()->reload ) {
            Auth::user()->reload = 0;
            Auth::user()->save();
            Auth::loginUsingId(Auth::user()->id);
            Session::forget('role');
            Session::forget('privileges');
            Session::push( 'role' , Auth::user()->role->toArray() );
            $privs = Role::find(Auth::User()->role_id)->privileges->toArray();
            foreach( $privs as $p ) {
                if( !isset( $privileges[$p['controller']] ) ) $privileges[$p['controller']] = array();
                $privileges[$p['controller']][] = $p['action'];
            }
            Session::push( 'privileges' , $privileges);
        }
    }

}