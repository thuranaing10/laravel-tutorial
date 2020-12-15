<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'name','description','category_id'
    ];

	public function category()
    {
        return $this->belongsTo('App\Cat');
    }
    // public function posts(){
   	// 	return $this->belongsTo('App\Cat');
    // }
    
}