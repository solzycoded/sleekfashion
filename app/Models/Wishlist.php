<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = "wishlist";

    protected $fillable = [
        'product_id', 'user_id'
    ];

    // CHILD OF
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // SCOPES
    private function search($query, $attributes){
        $query = $query->when($attributes ?? false, fn($query, $wishlist) => 
                $query->where(fn($query) =>
                    $query->where('product_id', $wishlist['product_id'])
                        ->where('user_id', $wishlist['user_id'])
                        ->where('deleted_at', null)
                )
            );

        return $query;
    }

    public function scopeIsSaved($query, array $attributes){
        return $this->search($query, $attributes)->exists();
    }

    public function scopeFindProduct($query, array $attributes){
        $wishlist = $this->search($query, $attributes);

        return $wishlist;
    }
}