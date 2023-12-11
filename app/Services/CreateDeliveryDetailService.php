<?php

namespace App\Services;

use App\Models\DeliveryDetail;

class CreateDeliveryDetailService
{
    // CREATE
    public function storeOrderDeliveryDate($orderId): void{
        DeliveryDetail::firstOrCreate([
            'order_id'      => $orderId,
            'deliver_before' => date('Y-m-d', strtotime('+7 days'))
        ]);
    }
}
