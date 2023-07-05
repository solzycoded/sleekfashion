<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'user_role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // PARENT TO
    public function userDetails(){
        return $this->hasMany(UserDetail::class);
    }

    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function shoppingCart(){
        return $this->hasMany(ShoppingCart::class);
    }

    // CHILD OF
    public function userRole(){
        return $this->belongsTo(UserRole::class);
    }

    // SCOPES
    public function scopeCheckoutTotal($query){
        return $query->join('shopping_cart', 'shopping_cart.user_id', 'users.id')
            ->join('products', 'products.id', 'shopping_cart.product_id')
            ->select(DB::raw('SUM(price * shopping_cart.quantity) as total'), 'email')
            ->groupBy('email', 'users.id')
            ->distinct()
            ->first();
    }
}