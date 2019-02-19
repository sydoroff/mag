<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const roleAdmin=1;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token', 'password'
    ];

    /**
     * @return bool TRUE if user is administrator
     */
    function isAdmin(){
        return $this->role === self::roleAdmin;
    }

    function getRole()
    {
        if ($this->role === self::roleAdmin) return 'Администратор';
        return 'Пользователь';
    }

    function getOrders(){
        return $this->hasMany('App\Orders');
    }
}
