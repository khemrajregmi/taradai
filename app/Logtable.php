<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logtable extends Model
{
     protected $fillable = [
            'log_id',
            'title',
            'description',
            'date',
            
        ];
    
    protected $table = 'logtable';
}