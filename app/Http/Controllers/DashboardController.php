<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use \App\Model\User as User;
use \App\Model\Role as Role;

use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function index() {
        return view("Dashboard.index");
    }

}
