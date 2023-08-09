<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $table = "shopping_cart";

    protected $fillable = [
        'product_id', 'user_id', 'quantity'
    ];

    // protected $with = ['product'];

    // CHILD OF
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // SCOPES
    private function search($query, $attributes){
        return $query->when($attributes ?? false, fn($query, $wishlist) =>
            $query->where(fn($query) =>
                $query->where('product_id', $wishlist['product_id'])
                    ->where('user_id', $wishlist['user_id']) 
            )
        );
    }

    public function scopeInCart($query, array $attributes){
        return $this->search($query, $attributes)->exists();
    }

    public function scopeFindProduct($query, array $attributes){
        return $this->search($query, $attributes);
    }

    public function scopeItems($query){
        if(isset(auth()->user()->id)){
            return $query->when(true, fn($query) => 
                $query->where('user_id', auth()->user()->id)
            )->count();
        }

        return 0;
    }
}