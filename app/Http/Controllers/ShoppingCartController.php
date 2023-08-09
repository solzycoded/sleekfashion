<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use App\Models\Product;

class ShoppingCartController extends Controller
{
    // CREATE
    public function create($ShoppingCart){
        $ShoppingCart = ShoppingCart::firstOrCreate($ShoppingCart);

        return isset($ShoppingCart->id); // IF id, isset (return true), ELSE ...
    }

    // READ
    public function index(){
        // it should be the ShoppingCart, that's for the logged-in user
        $userId = isset(auth()->user()->id) ? auth()->user()->id : 0;
        $ShoppingCart = Product::join('shopping_cart', 'shopping_cart.product_id', 'products.id')->where('user_id', $userId)->select(['products.*', 'shopping_cart.id as cart_id', 'shopping_cart.quantity as cartQuantity'])->paginate(10);

        return $ShoppingCart;
    }

    // UPDATE
    public function update(){
        $attributes = $this->validateInput();

        $updated = false;

        $productInCart = ShoppingCart::inCart($attributes);
        if($productInCart){ // delete product (if it already exists)
            $updated = $this->destroy($attributes);
        }
        else{ // create product (if it's not saved)
            $updated = $this->create($attributes);
        }

        // to make sure the cart opens up, if the user clicks on the cart icon
        $this->openCart();

        return response()->json([
            'success'     => ($updated ? true : false),
            'addedToCart' => ($productInCart ? false : true)
        ], 200);
    }

    // DELETE
    public function destroy($attributes){
        $deleted = ShoppingCart::findProduct($attributes)->delete();
        if($deleted){
            $this->cartIsEmpty(); // cart is empty
        }

        return $deleted;
    }

    // OTHERS
    protected function validateInput(){
        $attributes = request()->validate([
            'product_id' => 'required|integer|exists:products,id'
        ]);
        $attributes['user_id'] = auth()->user()->id;

        return $attributes;
    }

    private function cartIsEmpty(){
        $cartIsEmpty = !(ShoppingCart::where('user_id', auth()->user()->id)->exists());

        if($cartIsEmpty){
            $this->openCart();
        }
    }

    private function openCart(){
        session()->flash('open-cart', true);
    }
}