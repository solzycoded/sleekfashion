<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class AddOrderToCartService extends Service
{
    // CREATE
    public function addOrderToCart($order) : JsonResponse{
        $this->addProductsToCart($order);

        $this->flashMessage('The products in your order were successfully added to cart.');

        return response()->json([
            'success' => true
        ], 200);
    }

    private function addProductsToCart($order) : void{
        $addProductToCartService = new AddProductToCartService();
        $userId                  = auth()->user()->id;

        foreach ($order->customerOrders as $order) {
            $productId = $order->product->id;

            $addProductToCartService->addProductToCart(['product_id' => $productId, 'user_id' => $userId]);
        }
    }
}
