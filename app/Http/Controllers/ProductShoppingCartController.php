<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use App\Models\Product;

class ProductShoppingCartController extends Controller
{
    // UPDATE
    public function update(){
        $attributes = $this->validateInput();
        $saved = true;

        foreach ($attributes['cart'] as $value) {
            if($saved){
                $saved = $this->updateCart($value);

                // echo auth()->user()->id . ' - ' . $value['product_id'] . ' - quantity: ' . $value['quantity'] . "\r\n";
            }
        }
        
    }

    // OTHERS
    private function updateCart($cart){
        $cart = ShoppingCart::where('user_id', auth()->user()->id)->where('product_id', $cart['product_id'])->first();

        $cart->quantity = $cart['quantity'];

        return $cart->save();
    }

    // validate input
    protected function validateInput(): array{
        return request()->validate([
            'cart.*' => 'bail|required|array:product_id,quantity',
            'cart.*.product_id' => 'bail|exists:products,id'
        ]);
    }
}
