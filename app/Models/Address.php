<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $with = ['userRole'];

    // PARENT TO
    public function orders(){
        return $this->hasMany(Order::class);
    }

    // CHILD OF
    public function city(){
        return $this->belongsTo(City::class);
    }

    public function userRole(){
        return $this->belongsTo(UserRole::class);
    }
}
