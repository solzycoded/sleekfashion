@props(['shoppingcart'])

<!-- Modal -->
<div class="modal fade" id="shoppingcartModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="shoppingcartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="btn fw-bold" aria-label="Back" data-bs-target="#allProductsModal" data-bs-toggle="modal" data-bs-dismiss="modal" style="font-size: 25px; padding: 0 6px 0 0;">
            <i class="bi bi-arrow-left"></i>
          </button>
          <h4 class="modal-title text-capitalize modal-shoppingcart-title" id="shoppingcartModalLabel">shopping cart</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body shoppingcart-Data">

            <div id="shoppingcart-data">
                
              <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach ($shoppingcart as $product)
                  <x-shoppingcart.item :product="$product" />
                @endforeach
              </div>

            </div>

        </div>

        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary text-left" data-bs-dismiss="modal">Close</button>
        </div> --}}

      </div>
    </div>
</div>