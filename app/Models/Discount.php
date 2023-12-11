<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    // CHILD OF
    public function product(){
        return $this->belongsTo(Product::class);
    }

    // SCOPES
    public function scopeFilter($query, $filter){
        return $this->filterResults($query, $filter);
    }

    public function scopeCalculateDiscount($query, $filter){
        $discount = $this->filterResult($query, $filter)->first();

        if(isset($discount->id)){
            return $filter['price'] - (($discount->discount / 100) * $filter['price']);
        }

        return $filter['price'];
    }

    private function filterResult($query, $filter){
        return $query->when($filter ?? false, fn($query, $filter) => 
            $query->where('product_id', $filter['product_id'])->whereDate('to', '<=', $filter['to'])
        );
    }
}
