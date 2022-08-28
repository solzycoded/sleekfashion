<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = [
        'country', 'phone_code'
    ];
    
    // PARENT TO
    public function users()
    {
        return $this->hasMany('\Models\User');
    }
}
