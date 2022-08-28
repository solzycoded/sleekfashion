<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class CollectionImage extends Model
{
    protected $table = 'collection_images';

    protected $fillable = [
        'collection_id', 'image' 
    ];

    // CHILD OF
    public function collection()
    {
        return $this->belongsTo('\Models\Collection'); 
    }
}
