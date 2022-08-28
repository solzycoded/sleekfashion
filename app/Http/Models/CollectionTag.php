<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class CollectionTag extends Model
{
    protected $table = 'collection_tags';

    protected $fillable = [
        'collection_id', 'tag_id' 
    ];

    // CHILD OF
    public function collection()
    {
        return $this->belongsTo('\Models\Collection'); 
    }

    public function tag()
    {
        return $this->belongsTo('\Models\Tag');
    }
}
