<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Profile  extends  Model {
	
	public  $timestamps=false;
	protected $primaryKey = 'idprofile';
	public $incrementing = false;
	protected $table = "profiless";
}