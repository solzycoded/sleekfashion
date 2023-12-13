<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;

class WishlistController extends Controller
{
    // check if product is saved, remove it... if it's not saved, create it

    // CREATE
    public function create($product){
        $wishlist  = $this->updateDeleteStatus($product, false);
        if(isset($wishlist->id)){
            $wishlist = Wishlist::firstOrCreate($product);
        }

        return isset($wishlist->id); // IF id, isset (return true), ELSE ...
    }

    // READ
    public function index(){
        // it should be the wishlist, that's for the logged-in user
        $userId   = isset(auth()->user()->id) ? auth()->user()->id : 0;
        $wishlist = Product::join('wishlist', 'wishlist.product_id', 'products.id')
            ->where('user_id', $userId)
            ->where('deleted_at', null)
            ->select(['products.*'])
            ->paginate(10);

        return $wishlist;
    }

    // UPDATE
    public function update(){
        $attributes     = $this->validateInput();
        $productIsSaved = Wishlist::isSaved($attributes);
        $updated        = $this->updateWishlist($attributes, $productIsSaved);

        // notify the the app, that a product has either been "saved to" or "unsaved from" wishlist
        $this->openWishlist();

        return response()->json([
            'success' => ($updated ? true : false),
            'isSaved' => ($productIsSaved ? false : true)
        ], 200);
    }

    private function updateWishlist($attributes, $productIsSaved){
        $updated = false;

        if($productIsSaved){ // delete product (if it already exists)
            $updated = isset($this->destroy($attributes)->id);
        }
        else{ // create product (if it's not saved)
            $updated = $this->create($attributes);
        }

        return $updated;
    }

    // DELETE
    public function destroy($attributes){ // change "deleted_at" from "null" to the "current date and time"
        return $this->updateDeleteStatus($attributes, true);
    }

    private function findProduct($attributes){
        return Wishlist::findProduct($attributes)->first();
    }

    private function updateDeleteStatus($attributes, $delete){
        $wishlist = $this->findProduct($attributes);

        if(isset($wishlist->id)){
            $wishlist->deleted_at = ($delete ? now() : null);

            $wishlist->save();
        }

        return $wishlist;
    }

    // OTHERS
    private function openWishlist(){
        session()->flash('open-wishlist', true);
    }

    // VALIDATE INPUT
    protected function validateInput(){
        $attributes = request()->validate([
            'product_id' => 'required|integer|exists:products,id'
        ]);
        $attributes['user_id'] = auth()->user()->id;

        return $attributes;
    }
}