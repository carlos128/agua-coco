<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SalesCheck  extends  Model {
	
    public  $timestamps=false;
    protected $primaryKey = 'idsalescheck'; 
    public $incrementing = false;
}