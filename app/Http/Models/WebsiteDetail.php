<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteDetail extends Model
{
    protected $table = 'website_details';

    protected $fillable = [
        'aboutus', 'phone' 
    ];
}
