<?php

namespace App\Http\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    // PARENT TO
    public function savedcollections()
    {
        return $this->hasMany('\Models\SavedCollection');
    }

    public function shoppingcart()
    {
        return $this->hasMany('\Models\ShoppingCart');
    }

    public function orders()
    {
        return $this->hasMany('\Models\Order');
    }

    // CHILD OF
    public function userroles()
    {
        return $this->belongsTo('\Models\UserRoles');
    }
}
