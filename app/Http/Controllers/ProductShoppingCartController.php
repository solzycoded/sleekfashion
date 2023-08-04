<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;

class ProductShoppingCartController extends Controller
{
    // UPDATE
    public function update(){
        $attributes = $this->validateInput();
        $saved = true;

        foreach ($attributes['cart'] as $value) {
            if($saved){
                $saved = $this->updateCart($value);
            }
        }

        return response()->json([
            'success' => ($saved ? true : false)
        ], 200);
    }

    // OTHERS
    private function updateCart($cart){
        $shoppingCart = ShoppingCart::find($cart['cart_id']);

        $shoppingCart->quantity = $cart['quantity'];

        return $shoppingCart->save();
    }

    // validate input
    protected function validateInput(): array{
        return request()->validate([
            'cart.*' => 'bail|required|array:cart_id,quantity',
            'cart.*.cart_id' => 'bail|exists:shopping_cart,id'
        ]);
    }

    public function openCheckout(){
        session()->flash('allowcheckout', true);

        return response()->json([
            'success' => session('allowcheckout')
        ], 200);
    }
}
