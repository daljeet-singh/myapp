<?php namespace App\Http\Controllers;

use Validator;
use App\Model\Privilege;
use App\Model\Role;
use App\Model\User;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller {

    protected $redirectPath = '/dashboard';
    protected $redirectAfterLogout = '/dashboard';
    protected $loginPath = 'auth/login';

    public function __construct() {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getRegister() {
        return view('auth.register');
    }

    public function getLogin() {
        return view('auth.login');
    }

    public function postLogin( Request $request ) {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);

        $credentials = array_add( $request->only('email', 'password'), 'is_active', '1') ;

        if( Auth::attempt( $credentials, $request->has( 'remember' ) ) ) {
            Auth::user()->last_login = Carbon::now();
            Auth::user()->save();
            Session::push( 'role' , Auth::user()->role->toArray() );
            $privs = Role::find(Auth::User()->role_id)->privileges->toArray();
            foreach( $privs as $p ) {
                if( !isset( $privileges[$p['controller']] ) ) $privileges[$p['controller']] = array();
                $privileges[$p['controller']][] = $p['action'];
            }
            Session::push( 'privileges' , $privileges);
            return redirect()->intended($this->redirectPath);
        }

        return redirect($this->loginPath)
            ->withInput($request->only('email', 'remember' ) )
            ->withErrors([
                'email' => Lang::get('custom.login_failed'),
            ]);
    }

    public function getLogout() {
        Session::flush();
        Auth::logout();
        return redirect( $this->redirectAfterLogout );
    }

    public function getChangePassword() {
        return view('auth.change_password');
    }

}
