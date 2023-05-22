<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Wishlist;

class WishlistController extends Controller
{
    // check if product is saved, remove it... if it's not saved, create it

    // CREATE
    public function create($wishlist){
        $wishlist = Wishlist::firstOrCreate($wishlist);

        return isset($wishlist->id); // IF id, isset (return true), ELSE ...
    }

    // READ

    // UPDATE
    public function update(){
        $attributes = request()->validate([
            'product_id' => 'required|integer|exists:products,id'
        ]);
        $attributes['user_id'] = 1; // we'd replace it later with auth()->user()->id;

        $productIsSaved = Wishlist::isSaved($attributes);
        $updated = false;

        if($productIsSaved){ // delete product
            $updated = $this->destroy($attributes);
        }
        else{ // create product
            $updated = $this->create($attributes);
        }

        return response()->json([
            'success' => ($updated ? true : false)
        ], 200);
    }

    // DELETE
    public function destroy($attributes){
        $wishlist = Wishlist::findProduct($attributes);

        return $wishlist->delete();
    }
}
