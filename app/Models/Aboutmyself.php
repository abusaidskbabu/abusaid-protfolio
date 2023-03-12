<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class aboutmyself extends Sximo  {
	
	protected $table = 'home_section';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT home_section.* FROM home_section  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE home_section.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
