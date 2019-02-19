<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
	public $table = 'users';
    public $fillable = [
    	'id',
    	'name',
    	'password',
    ];
    public $timestamps = false;
}
