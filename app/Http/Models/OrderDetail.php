<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    protected $fillable = [
        'collection_id', 'order_id', 'noofitems'
    ];

    // CHILD OF
    public function collection()
    {
        return $this->belongsTo('\Models\Collection');
    }

    public function order()
    {
        return $this->belongsTo('\Models\Order');
    }
}
