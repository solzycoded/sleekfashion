<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Contracts\View\View;

class ViewOrderService
{
    // READ
    public function displayOrders($attributes): View{
        $orders = $this->getOrders($attributes);

        return view('dashboard.orders.section', compact('orders'));
    }

    private function getOrders($attributes){
        return Order::filter(['user_id' => auth()->user()->id, 'filter' => $attributes['filter']])->get();
    }
}
