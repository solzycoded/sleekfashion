@props(['order'])

@php
    $customerOrders = $order->customerOrders;
    $quantity       = $customerOrders->sum('quantity');
    $total          = $customerOrders->sum(function($t){ 
        return $t->price * $t->quantity;
    });

    $delivery     = $order->deliveryDetail;
    $deliveryDate = date('l, d/m/Y', strtotime($delivery->deliver_before));

    $cancelled = !empty($order->deleted_at);
    $pending   = empty($delivery->delivered_on) && !$cancelled;
@endphp

<div class="col-12 col-md-6 mb-5">
    <div class="border-bottom pb-2 border-dark position-relative">
        <div class="pe-18">
            <h5 class="mb-1">Order <b>#SLK{{ $order->order_tag }}</b></h5>
            {{-- depending on the order status --}}
            <h6>
            @if($pending)
                Delivery between <b>{{ date('l, d/m/Y', strtotime($delivery->created_at)) }} <small>and</small> {{ $deliveryDate }}</b>
            @else
                @if($cancelled)
                    Order was <b class="text-danger">Cancelled!</b>
                @else
                    Delivered on <b class="text-success">{{ $deliveryDate }}</b>
                @endif
            @endif
            </h6>

            <small class="mb-1 text-secondary">You ordered for <b class="text-dark">{{ number_format($quantity) }} item(s)</b>.</small>
        </div>
        <div class="position-absolute end-0 top-0 text-right">
            @if($pending)
                <div class="mb-2">
                    <form action="/orders/cancel/{{ $order->id }}" method="POST" class="cancel-order-form">
                        @csrf
                        <button type="submit" class="btn bg-danger p-1 text-white cancel-order">
                            <i class="bi bi-x-circle"></i> Cancel order
                        </button>
                    </form>
                </div>
            @endif
            <div>
                <form action="/orders/add-to-cart/{{ $order->id }}" method="POST" class="add-order-to-cart-form">
                    @csrf
                    <button class="btn btn-dark p-1 text-white add-order-to-cart">
                        <i class="bi bi-cart-plus"></i> Add to cart
                    </button>
                </form>
            </div>
        </div>

        <div class="mt-3">
            <div class="container-fluid p-0" style="max-height: 200px; overflow-y: auto; overflow-x: hidden">
                <div class="row">
                    @foreach ($customerOrders as $order)
                        <x-dashboard.orders.product :product="$order->product" />
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mt-2"><p>Amount Paid: <b>${{ number_format($total) }}</b>.</p></div>
    </div>
</div>