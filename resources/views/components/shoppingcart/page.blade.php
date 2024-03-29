@props(['shoppingcart'])

<!-- Modal -->
<div class="modal fade" id="shoppingcartModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="shoppingcartModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
      
          <button type="button" class="btn fw-bold" aria-label="Back" data-bs-target="#allProductsModal" data-bs-toggle="modal" data-bs-dismiss="modal" style="font-size: 25px; padding: 0 6px 0 0;">
            <i class="bi bi-arrow-left"></i>
          </button>
          <h4 class="modal-title text-capitalize modal-shoppingcart-title" id="shoppingcartModalLabel">shopping cart</h4>
          <button type="button" class="btn-close close-cart" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body shoppingcart-Data" style="margin-bottom: 10px !important">
            <div id="shoppingcart-data">
              
              @auth
                @if(count($shoppingcart)==0)
                  <div class="text-center" style="margin-bottom: 13px !important">
                    <i class="bi bi-cart-x-fill text-primary"></i> Your cart is empty. Fill your cart <a role="button" class="text-primary" data-bs-target="#allProductsModal" data-bs-toggle="modal" data-bs-dismiss="modal" >here</a>.
                  </div>
                @endif

                <!-- pagination -->
                  {{-- <div class="d-flex justify-content-center all-products-links">
                    {{ $shoppingcart->links() }}
                  </div> --}}
                <!-- END pagination -->

                <div class="row row-cols-1 row-cols-md-2 g-4">

                  @foreach ($shoppingcart as $product)
                    <x-shoppingcart.item :product="$product" />
                  @endforeach

                </div>

                <!-- pagination -->
                  <div class="d-flex justify-content-center all-products-links mt-4">
                    {{ $shoppingcart->links() }}
                  </div>
                <!-- END pagination -->
              @else
                <div class="text-center">
                  <i class="bi bi-person-exclamation text-primary"></i> You are not Logged in.<br>
                  Kindly <a href="/login" class="text-primary">Login</a> to view your cart.
                </div>
              @endauth

            </div>
        </div>

        @auth
          @if(count($shoppingcart) > 0)
            <div class="modal-footer m-0">
              <button type="button" class="btn text-left border border-primary text-primary" id="update-cart">Save</button>

              <button type="button" class="btn btn-primary text-left text-white" id="checkout-cart">
                Pay ($<span class="checkout-total">{{ number_format(auth()->user()->checkoutTotal()->total) }}</span>) 
                <i class="bi bi-arrow-right-circle-fill"></i>
              </button>
            </div>
          @endif
        @endauth

        <x-open-modal :target="'cart'" />
      </div>
    </div>
</div>

{{-- checkout page --}}
@if(session()->has('allowcheckout'))
  <span id="allow-checkout" allow="true" class="d-none"></span>
  <x-checkout.page />
@endif