<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class SavedCollection extends Model
{
    protected $table = 'saved_collection';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'collection_id', 'user_id'
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
