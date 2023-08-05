@props(['cart'])

@php
    $total       = $cart->sum(function($t){ 
        return $t->price * $t->cartQuantity; 
    });

    $deliveryFee = 0.002 * $total; // 2% of total
@endphp

<div class="container-fluid p-0 mt-4">
    <div class="pt-2">
        <h4>Summary</h4>
    </div>
    <hr>
    <div class="checkout-order-details pt-2" style="max-height: 200px; overflow-y: auto; overflow-x: hidden">
        <div class="mb-3">
            <h5>Subtotal: <small class="text-700">${{ number_format($total) }}</small></h5>
            <h5>Delivery fee: <small class="text-700">${{ number_format($deliveryFee) }}</small></h5>
        </div>
        <h5>Total: <small class="text-700" id="checkout-total">${{ number_format(($total + $deliveryFee)) }}</small></h5>
    </div>
</div>