<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $table = "gender";

    public $timestamps = false;

    // PARENT TO
    public function productGenders(){
        return $this->hasMany(ProductGender::class);
    }
}
