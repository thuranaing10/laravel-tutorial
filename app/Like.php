<?php

namespace App;

use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Overtrue\LaravelFollow\Traits\CanLike;
use Overtrue\LaravelLike\Traits\Likeable;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use Likeable;

    protected $fillable = ['title'];
}
