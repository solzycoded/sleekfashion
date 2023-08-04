@props(['cartItem'])

<li class="list-group-item mb-2 border-0">
    <div class="row">
        <div class="col-3 col-sm-3">
            <img src="{{ $cartItem->productImages[0]->image }}" alt="checkout product image" style="height: 100% !important" width="80">
        </div>
        <div class="col-9 col-sm-9">
            <h5>{{ $cartItem->title }}</h5>
            <p class="p-0 m-0">${{ number_format($cartItem->price) }}</p>
            <small><b>Quantity:</b> {{ number_format($cartItem->cartQuantity) }}</small>
        </div>
    </div>
</li>