<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 
        'email',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


}
