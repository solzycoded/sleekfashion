<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCollection extends Model
{
    use HasFactory;
    
    protected $with = ['product', 'collection'];

    // CHILD OF
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function collection(){
        return $this->belongsTo(Collection::class);
    }

    // SCOPES
    public function scopeSearchCollection($query, array $search){
        return $query->when($search ?? false, 
            fn($query, $search) => $query->whereHas('collection', 
                fn($query) => $query->where($search['column'], 'like', '%' . $search['value'])
            )
        );
    }
}
