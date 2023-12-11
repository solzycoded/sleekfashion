<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['last_name', 'first_name', 'user_id'];

    // CHILD TO
    public function user(){
        return $this->belongsTo(User::class);
    }
}