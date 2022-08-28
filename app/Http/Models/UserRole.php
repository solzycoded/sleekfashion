<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'user_roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role'
    ];

    // PARENT TO
    public function users()
    {
        return $this->hasMany('\Models\User');
    }
}
