<?php

namespace App\Services;

use App\Models\ShoppingCart;

class AddProductToCartService
{
    // CREATE
    public function addProductToCart($product){
        $shoppingCart = ShoppingCart::firstOrCreate($product);

        return isset($shoppingCart->id); // IF id, isset (return true), ELSE ...
    }
}
