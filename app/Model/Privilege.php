<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model {

    protected $table = 'privileges';

    protected $fillable = ['role_id', 'controller', 'action', 'is_active'];

}
