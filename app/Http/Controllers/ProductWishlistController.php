<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductWishlistController extends Controller
{
    // CREATE

    // READ
    public function index(){
        // it should be the wishlist, that's for the logged-in user
        $wishlist = Product::join('wishlist', 'wishlist.product_id', 'products.id')
            ->where('wishlist.user_id', auth()->user()->id)
            ->select(['products.*'])->get();

        return response()->json([
            'success' => count($wishlist) > 0,
            'wishlist' => $wishlist
        ], 200);
    }

    // UPDATE
    
    // DELETE
}
