<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasFactory;

    public $fillable = ['product_id', 'order_id', 'quantity', 'price'];

    // CHILD OF
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
