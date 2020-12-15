<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $fillable = [
    	'id','name','price','qty','date'
    ];
}
