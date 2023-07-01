@props(['product'])

@php
    $productPrice = $product->price;
    $stockLeft = $product->quantity;
    $maxQuantity = $product->category->max_quantity;
    $quantity = $product->shoppingcart[0]->quantity;
@endphp

<div class="col">
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row g-0" x-data="{counter: {{ $quantity }}}">
        <div class="col-md-4">

          <x-wishlist.icon :product="$product" />

          <img src="{{ $product->productImages[0]->image }}" class="img-fluid rounded-start" alt="shopping cart image" style="height: 100% !important">

        </div>
        
        {{-- quantity --}}
        <div class="col-md-8">
          <div class="card-body p-2">
            <h5 class="card-title">{{ $product->title }}</h5>

            <div class="card-text mt-3">
              {{-- quantity --}}
              <x-shoppingcart.counter :maxQuantity="$maxQuantity" />

              <div class="card-text mb-3 mt-2">
                  {{-- total --}}
                  <p class="card-text m-0">$<span x-text="counter * {{ $productPrice }}"></span></p>
                  {{-- price * quantity --}}
                  <small class="text-muted">
                      <span class="product-price">${{ $productPrice }}</span> x <span class="order-quantity" x-text="counter"></span>
                  </small>
              </div>
              <div class="row">
                  <div class="col-12 col-sm-6 col-lg-6 m-0" style="width: inherit">
                      <button class="btn btn-primary text-white p-2">
                          <i class="bi bi-cart-x-fill"></i> Remove from cart
                      </button>
                  </div>
              </div>
            </div>
            
            <p class="card-text">
              <small class="text-muted">{{ $stockLeft . '/' . $maxQuantity }} left</small>
            </p>
          </div>
        </div>
      </div>
    </div>
</div>