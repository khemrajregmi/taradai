<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
     protected $fillable = [
            'payroll_id',
            'user_id',
            'basic_pay',
            'payroll_status',
            
        ];
    
    protected $table = 'payroll';
}