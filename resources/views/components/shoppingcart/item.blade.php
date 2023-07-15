@props(['product'])

@php
  $productPrice = $product->price;
  $stockLeft = $product->quantity;
  $maxQuantity = $product->category->max_quantity;
  $quantity = $product->shoppingcart[0]->quantity;
@endphp

<div class="col cart-item">
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row g-0" x-data="{counter: {{ $quantity }}}">

        <div class="col-md-4">
          <x-wishlist.icon :product="$product" />

          <div class="view-product"
            data-bs-toggle="modal"
            data-bs-target="#productModal"
            data-bs-dismiss="modal" 
            product-id="{{ $product->id }}"
            style="cursor: pointer; height: 100% !important; width: 100% !important">

            <img src="{{ $product->productImages[0]->image }}" 
              class="img-fluid rounded-start" 
              alt="shopping cart image" 
              style="height: inherit !important; width: inherit !important">

          </div>
        </div>
        
        {{-- quantity --}}
        <div class="col-md-8">
          <div class="card-body p-2">
            <h5 class="card-title text-capitalize view-product" 
              style="cursor: pointer"
              data-bs-toggle="modal"
              data-bs-target="#productModal"
              data-bs-dismiss="modal" 
              product-id="{{ $product->id }}">{{ $product->title }}</h5>

            <div class="card-text mt-3">
              {{-- quantity --}}
              <x-shoppingcart.counter :maxQuantity="$maxQuantity" />

              <div class="card-text mb-3 mt-2">
                  {{-- total --}}
                  <p class="card-text m-0">$<span class="cart-item-total" x-text="(counter * {{ $productPrice }}).toLocaleString()"></span></p>
                  {{-- price * quantity --}}
                  <small class="text-muted">
                      <span class="product-price">${{ number_format($productPrice) }}</span> x <span class="order-quantity" x-text="counter"></span>
                  </small>
              </div>
              <div class="row">
                  <div class="col-12 col-sm-6 col-lg-6 m-0" style="width: inherit">
                      <button class="btn btn-primary text-white p-2 remove-from-cart"
                        cart-id="{{ $product->cart_id }}"
                        product-id="{{ $product->id }}"
                        onclick="cart(this)">
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