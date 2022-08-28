<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $table = 'shopping_cart';

    protected $fillable = [
        'collection_id', 'user_id', 'noofitems'
    ];

    // CHILD OF
    public function collection()
    {
        return $this->belongsTo('\Models\Collection');
    }

    public function user()
    {
        return $this->belongsTo('\Models\User');
    }
}
