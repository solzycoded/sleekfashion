<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Order;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\ViewOrderRequest;

use App\Services\StoreCustomerProfileService;
use App\Services\ViewOrderService;
use App\Services\StoreOrderService;
use App\Services\CancelOrderService;
use App\Services\AddOrderToCartService;

class OrderController extends Controller
{
    private ViewOrderService $viewOrderService;
    private StoreOrderService $storeOrderService;
    private StoreCustomerProfileService $storeCustomerProfileService;
    private CancelOrderService $cancelOrderService;
    private AddOrderToCartService $addOrderToCartService;

    public function __construct() {
        $this->viewOrderService            = new ViewOrderService();
        $this->storeOrderService           = new StoreOrderService();
        $this->storeCustomerProfileService = new StoreCustomerProfileService();
        $this->cancelOrderService          = new CancelOrderService();
        $this->addOrderToCartService       = new AddOrderToCartService();
    }

    // CREATE
    public function store(StoreOrderRequest $attributes){
        // store profile details
        $this->storeCustomerProfileService->createProfile(['first_name' => $attributes['first_name'], 'last_name' => $attributes['last_name']]);

        // store order details
        return $this->storeOrderService->createOrder($attributes);
    }

    // READ
    public function index(ViewOrderRequest $attributes){
        return $this->viewOrderService->displayOrders($attributes);
    }

    // UPDATE
    public function update(Order $order){
        return $this->cancelOrderService->cancelOrder($order);
    }

    // ADD ORDERS TO CART
    public function addToCart(Order $order){
        return $this->addOrderToCartService->addOrderToCart($order);
    }
}
