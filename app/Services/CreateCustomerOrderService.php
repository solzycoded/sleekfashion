<?php

namespace App\Services;

use App\Models\CustomerOrder;
use App\Models\ShoppingCart;

class CreateCustomerOrderService
{
    // STORE
    public function createOrder(int $orderId): void{
        $this->createCustomerOrder($orderId);
    }

    private function createCustomerOrder(int $orderId): void{
        // get order items
        $shoppingCart = ShoppingCart::filter(['user_id' => auth()->user()->id]);
        $cartList     = $shoppingCart->get();

        foreach ($cartList as $cartItem) {
            $product = $cartItem->product;
            $price   = $this->calculateDiscount($product);

            CustomerOrder::firstOrCreate([
                'order_id'   => $orderId,
                'product_id' => $product->id,
                'quantity'   => $cartItem->quantity,
                'price'      => $price
            ]);
        }

        $shoppingCart->delete();
    }

    private function calculateDiscount($product): float{
        $discount = $product->discounts()->calculateDiscount([
            'product_id' => $product->id, 
            'to'         => now(), 
            'price'      => $product->price
        ]);

        return $discount;
    }
}
