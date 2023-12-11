<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryDetail extends Model
{
    use HasFactory;

    public $fillable = ['order_id', 'deliver_before', 'delivered_on'];

    // CHILD OF
    public function order(){
        return $this->belongsTo(Order::class);
    }
}
