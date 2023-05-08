<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCollection extends Model
{
    use HasFactory;
    
    // CHILD OF
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function collection(){
        return $this->belongsTo(Collection::class);
    }
}
