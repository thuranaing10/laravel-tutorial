<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    public function role(){
    	return $this->belongsToMany('App\Role');
    }
}
