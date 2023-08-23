<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $with = ['customerOrders', 'user'];

    // PARENT TO
    public function customerOrders(){
        return $this->hasMany(CustomerOrder::class);
    }

    public function deliveryDetails(){
        return $this->hasMany(DeliveryDetail::class);
    }

    // CHILD OF
    public function user(){
        return $this->belongsTo(User::class);
    }
}
