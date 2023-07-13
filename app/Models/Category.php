<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    // PARENT TO
    public function products(){
        return $this->hasMany(Product::class);
    }

    // SCOPES
    public function scopeFindProductsByGender($query, $sex){
        $result = $query->join('products', 'products.category_id', 'categories.id')
            ->join('product_genders', 'product_genders.product_id', 'products.id')
            ->join('gender', 'gender.id', 'product_genders.gender_id')
            ->where('sex', 'like', '%' . $sex)
            ->where('categories.name', $this->name)
            ->select(['products.*'])
            ->groupBy('products.id')
            ->distinct()
            ->get()
            ->take(4);

        return $result;
    }
}
