<?php

namespace App\Services;

class CancelOrderService extends Service
{
    // DELETE
    public function cancelOrder($order){
        $order->deleted_at = now();

        $saved = $order->save();

        $this->flashMessage('Your order has been cancelled, successfully.');

        return response()->json([
            'success' => $saved ? true : false
        ], 200);
    }
}
