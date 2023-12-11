<?php

namespace App\Services;

use App\Models\PaymentReference;

class StorePaymentReferenceService
{
    // CREATE
    public function storePaymentReference(int $orderId, string $paymentReference): void{
        PaymentReference::firstOrCreate([
            'order_id'  => $orderId,
            'reference' => $paymentReference
        ]);
    }
}
