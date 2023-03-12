<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class mydesignation extends Sximo  {
	
	protected $table = 'my_designation';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT my_designation.* FROM my_designation  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE my_designation.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
