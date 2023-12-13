<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $with = ['productImages', 'category', 'wishlist', 'shoppingcart', 'productGenders'];

    // PARENT TO
    public function productGenders(){
        return $this->hasMany(ProductGender::class);
    } 
      
    public function productCollections(){
        return $this->hasMany(ProductCollection::class);
    }

    public function productImages(){
        return $this->hasMany(ProductImage::class);
    }

    public function shoppingcart(){
        return $this->hasMany(ShoppingCart::class);
    }

    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }

    public function discounts(){
        return $this->hasMany(Discount::class);
    }

    public function customerOrders(){
        return $this->hasMany(CustomerOrder::class);
    }

    // CHILD OF
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // SCOPES
    public function scopeInCart($query, int $userId){
        return $this->filterQuery($query, 'shoppingcart', $userId, 'user_id')->exists();
    }

    public function scopeIsSaved($query, int $userId){
        return $query->when($userId ?? false, 
            fn($query, $filter) => 
                $query->whereHas('wishlist', 
                    fn($query) => $query->where('user_id', $filter)
                        ->where('product_id', $this->id)
                        ->where('deleted_at', null)
            )
        )->exists();
    }

    protected function filterQuery($query, $table, $filter, $column){
        return $query->when($filter ?? false, 
            fn($query, $filter) => 
                $query->whereHas($table, 
                    fn($query) => $query->where($column, $filter)
                        ->where('product_id', $this->id)
            )
        );
    }
}