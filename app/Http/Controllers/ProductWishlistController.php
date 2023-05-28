<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductWishlistController extends Controller
{
    // CREATE

    // READ
    public function index(){
        // it should be the wishlist, that's for the logged-in user
        $wishlist = Product::join('wishlist', 'wishlist.product_id', 'products.id')->select(['products.*'])->get();

        return response()->json([
            'wishlist' => $wishlist
        ], 200);
    }

    // UPDATE
    
    // DELETE
}
