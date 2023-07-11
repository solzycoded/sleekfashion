<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGender extends Model
{
    use HasFactory;

    protected $with = ['gender'];

    // CHILD OF
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function gender(){
        return $this->belongsTo(Gender::class);
    }
}
