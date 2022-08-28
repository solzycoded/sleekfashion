<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id', 'order_number'
    ];

    // PARENT TO
    public function orderdetails()
    {
        return $this->hasMany('\Models\OrderDetail'); 
    }

    // CHILD OF
    public function user()
    {
        return $this->belongsTo('\Models\User');
    }
}
