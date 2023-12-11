<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentReference extends Model
{
    use HasFactory;

    public $fillable = ['order_id', 'reference'];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
