<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tag'
    ];

    // PARENT TO
    public function collectiontags()
    {
        return $this->hasMany('\Models\CollectionTag'); 
    }
}
