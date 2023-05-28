<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $with = ['productImages', 'category', 'wishlist'];

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

    public function shoppingCartItems(){
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
    // public function scopeFilter($query, $search){
    //     $query->when($search ?? false, fn($query, $search) => 
    //         $query->where(fn($query) =>
    //             $query->where('title', 'like', $search)
    //             ->orWhere('details', 'like', $search)
    //         )
    //     ); 

    //     // $allProducts = $allProducts
    //     //         ->where(fn($query) => 
    //     //             $query
    //     //                 ->where('title', 'like', $query)
    //     //                 ->where('details', 'like', $query)
    //     //         );
    // }
}
