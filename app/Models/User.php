<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use App\Models\Traits\Method\UserMethod;
use Illuminate\Notifications\Notifiable;
use App\Models\Traits\Attribute\UserAttribute;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use UserMethod,
        Notifiable,
        HasApiTokens,
        UserAttribute;

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
