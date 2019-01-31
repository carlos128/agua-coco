<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;


class User extends Model implements AuthenticatableContract, AuthorizableContract
{
	use Authenticatable, Authorizable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email',
	];
	public  $timestamps=false;
	protected $primaryKey = 'idUser'; 
	public $incrementing = false;
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
	];
	
	public function  profile(){
		return $this->belongsTo(Profile::class,"fk_id_users_profile","idUser");
	}
}
