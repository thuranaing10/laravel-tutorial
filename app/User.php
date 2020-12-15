<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Overtrue\LaravelFollow\Traits\CanFollow;
//use Overtrue\LaravelFollow\Traits\CanBeFollowed;
use Overtrue\LaravelFollow\Followable;
use Overtrue\LaravelLike\Traits\Likeable;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use Followable;
    use Likeable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
