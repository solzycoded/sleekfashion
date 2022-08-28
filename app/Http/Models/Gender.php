<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'genders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gender'
    ];

    // PARENT TO
    public function collections()
    {
        return $this->hasMany('\Models\Collection');
    }
}