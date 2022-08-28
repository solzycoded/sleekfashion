<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'collections';

    protected $fillable = [
        'gender_id', 'category_id', 'product_name', 'price', 'description' 
    ];

    // PARENT TO
    public function collectiontags()
    {
        return $this->hasMany('\Models\CollectionTag');
    }

    public function collectionimages()
    {
        return $this->hasMany('\Models\CollectionImage');
    }

    public function savedcollections()
    {
        return $this->hasMany('\Models\SavedCollection');
    }

    public function shoppingcart()
    {
        return $this->hasMany('\Models\ShoppingCart');
    }

    public function orderdetails()
    {
        return $this->hasMany('\Models\OrderDetail');
    }

    // CHILD OF
    public function gender()
    {
        return $this->belongsTo('\Models\Gender');
    }

    public function category()
    {
        return $this->belongsTo('\Models\Category');
    }
}