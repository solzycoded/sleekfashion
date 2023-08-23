<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Order;

class OrderController extends Controller
{
    // READ
    public function index(){
        $orders = Order::where('user_id', auth()->user()->id);

        return view('dashboard', compact('orders'));
    }
}
