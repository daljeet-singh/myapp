<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    protected $table = 'roles';

    protected $fillable = ['name', 'is_active'];

    public function privileges() {
        return $this->hasMany('App\Model\Privilege')->where('is_active','=', 1);
    }

    public function allPrivileges() {
        return $this->hasMany('App\Model\Privilege');
    }

    public function users() {
        return $this->hasMany('App\Model\User');
    }

}
