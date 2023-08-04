@props(['cart'])

<div class="container-fluid p-0">
    <div class="row pt-2">
        <h4 class="col">Order Details</h4>
        <div class="col" style="text-align: right !important">
            <a href="#!" id="checkout-update-cart" class="btn btn-primary text-white p-2" data-bs-toggle="modal" data-bs-target="#shoppingcartModal" data-bs-dismiss="modal">Update Cart</a>
        </div>
    </div>
    <hr>
    <div class="checkout-order-details pt-2" style="max-height: 200px; overflow-y: auto; overflow-x: hidden">
        <ol class="list-group">
            @foreach ($cart as $item)
                <x-checkout.orderdetails.card :cartItem="$item" />
            @endforeach
        </ol>
    </div>
</div>