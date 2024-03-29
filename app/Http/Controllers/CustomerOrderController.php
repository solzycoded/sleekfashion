<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Support\Facades\DB;

class CustomerOrderController extends Controller
{
    // READ
    public function bestSellers(){
        $products = Product::join('customer_orders', 'customer_orders.product_id', 'products.id')
            ->select(['products.*', DB::raw('SUM(customer_orders.price) as orderTotal')])
            ->orderBy('orderTotal', 'desc')
            ->groupBy('products.id')
            ->distinct()->get()->take(16);

        return $products;
    }
}
