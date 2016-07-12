<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
			'user_id',
			'username',
			'password',
			'fullname',
			'address',
			'dob',
			'phone',
			'email', 
			'IsSuperAdmin',
			'status',
			'created_at',
			'updated_at',
			
		];
	
	protected $table = 'userinfo';


	 public function employeelist()
    {
    	 
    		$result = DB::table('userinfo')->get()->paginate(4);

    		
    		return $result;
    	}

    public function employeelistandpayroll($take, $offset)
    {
    	 
    		// $result = DB::table('userinfo')->get();

    		
    		// return $result;
    		$result = DB::table('userinfo AS ui')
	    	->join('payroll AS p', 'ui.user_id', '=', 'p.user_id')
	    	->where('ui.status', 'Y')
	    	->select('ui.fullname',
	    				'ui.user_id',
				    	'p.basic_pay',
				    	'p.payroll_status')
    		->orderBy('ui.user_id', 'asc')
	    	->take($take)
	    	->skip($offset)
	    	->get();
	    	return $result;
    	}


     public function getAllemployee()
    {
    	 
    		$result = DB::table('userinfo')->count();

    		
    		return $result;
    	}
}
