<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAttendance extends Model
{
     protected $fillable = [
			'attendance_id',
			'user_id',
			'password',
			'login_time',
			'logout_time',
			'IPaddress',
			'attendance_status',
			'todaydate',
			'created_at',
			'updated_at',
			
		];
	
	protected $table = 'userattendance';
}
