<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $with = ['country', 'addresses'];

    // PARENT TO
    public function addresses(){
        return $this->hasMany(Address::class);
    }

    // CHILD OF
    public function country(){
        return $this->belongsTo(Country::class);
    }

    // SCOPES
    public function scopeFilter($query, $userRole){
        $userRoleId = UserRole::firstWhere('name', $userRole)->id;

        return $query->when($userRoleId ?? false, 
            fn($query, $userRoleId) => 
                $query->whereHas('addresses', 
                    fn($query) => $query->where('user_role_id', $userRoleId)
            )
        );
    }
}
