<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderContact extends Model
{
    use HasFactory;

    protected $table = "order_contact";

    protected $fillable = ['address', 'phone', 'user_id'];
}
