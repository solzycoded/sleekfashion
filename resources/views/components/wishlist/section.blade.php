<!-- Modal -->
<div class="modal fade" id="wishlistModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="wishlistModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">

    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="btn fw-bold" aria-label="Back" data-bs-target="#allProductsModal" data-bs-toggle="modal" data-bs-dismiss="modal" style="font-size: 25px; padding: 0 6px 0 0;">
          <i class="bi bi-arrow-left"></i>
        </button>
        <h4 class="modal-title text-capitalize modal-wishlist-title" id="wishlistModalLabel">Wishlist</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body wishlist-Data">

        <div id="wishlist-data" class="row" >
          @if(!isset(auth()->user()->id))
            <div class="text-center">
              You have to <a href="/login" class="fw-bold btn text-primary p-0 m-0">Log in</a> to see your wishlist.
            </div>
          @else

            @if($wishlist->count())
              @foreach ($wishlist as $item)
                <x-wishlist.item :item="$item" />
              @endforeach
            @endif

            <div class="text-center no-wishlist-item {{ ($wishlist->count() ? 'd-none' : '') }}">
              You currently have no products in your wishlist.<br>You can add a product 
              <button type="button" class="btn fw-bold text-primary" data-bs-target="#allProductsModal" data-bs-toggle="modal" data-bs-dismiss="modal" style="font-size: 16px; padding: 0;">
                  here
              </button>.
            </div>
          @endif
        </div>
        <!-- pagination -->
        <div class="d-flex justify-content-center all-products-links mt-4">
          {{ $wishlist->links() }}
        </div>
        <!-- END pagination -->
        
      </div>

      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary text-left" data-bs-dismiss="modal">Close</button>
      </div> --}}

    </div>
  </div>
</div>

<x-open-modal :target="'wishlist'" />