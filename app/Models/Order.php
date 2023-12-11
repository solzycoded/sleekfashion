<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
 
class Order extends Model
{
    use HasFactory;
    // SoftDeletes, 
    public $fillable = ['order_tag', 'user_id', 'customer_contact_id', 'customer_address_id'];

    protected $with  = ['customerOrders', 'user', 'deliveryDetail'];

    // PARENT TO
    public function customerOrders(){
        return $this->hasMany(CustomerOrder::class);
    }

    public function deliveryDetail(){
        return $this->hasOne(DeliveryDetail::class);
    }

    public function paymentReference(){
        return $this->hasOne(PaymentReference::class);
    }

    // CHILD OF
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function customerContact(){
        return $this->belongsTo(CustomerContact::class);
    }

    public function customerAddress(){
        return $this->belongsTo(CustomerAddress::class);
    }

    // SCOPES
    public function scopeFilter($query, $filter){
        $query->when($filter['user_id'] ?? false, 
            fn($query, $userId) => 
                $query->where('user_id', $userId)
        );

        if(isset($filter['filter']) && !empty($filter['filter'])){
            $query->when($filter['filter']=='pending', 
                fn($query) => 
                    $query->whereHas('deliveryDetail', fn($query) => 
                        $query->where('delivered_on', null)
                    )->where('deleted_at', null)
            );

            $query->when($filter['filter']=='cancelled', 
                fn($query) => 
                    $query->where('deleted_at', '!=', null)
            );

            $query->when($filter['filter']=='delivered', 
                fn($query) => 
                    $query->whereHas('deliveryDetail', fn($query) => 
                        $query->whereNot('delivered_on', null)
                    )->where('deleted_at', null)
            );
        }
    }
}
