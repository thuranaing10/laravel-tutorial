<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function stuffs(){
    	return $this->belongsToMany('App\Stuff');
    }
}
