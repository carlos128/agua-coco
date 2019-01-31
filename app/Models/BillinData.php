<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BillinData  extends  Model {
	
    public  $timestamps=false;
    protected $primaryKey = 'idbillinData'; 
    public $incrementing = false;
    protected $table = "billinData";
}