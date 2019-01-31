<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Discount  extends  Model {
	
	public  $timestamps=false;
	protected $primaryKey = 'idDiscount'; 
	public $incrementing = false;
}