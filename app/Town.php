<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    public function blogs(){
    	return $this->hasManyThrough('App\Blog','App\People','town_id','people_id');
    }
}
