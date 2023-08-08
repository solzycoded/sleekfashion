@props(['products', 'allCategories', 'allCollections', 'allGenders'])

<!-- Modal -->
<div class="modal fade" id="allProductsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="allProductsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-capitalize" id="allProductsModalLabel">All Products</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="container-fluid">
          <!-- filter -->

          @php

            $filterParts = [
              'allCategories' => $allCategories, 
              'allCollections' => $allCollections, 
              'allGenders' => $allGenders
            ];

          @endphp

          <x-products-filter :filterParts="$filterParts" />
          <!-- END filter -->
          
          <!-- pagination -->
          <div class="d-flex justify-content-center all-products-links"> 
            {{ $products->links() }}
          </div>
          <!-- END pagination -->

          <div class="row">
            <!-- <div class="col-md-4 ms-auto">.col-md-4 .ms-auto</div> -->

            @foreach($products as $product)
              
              <x-all-product-card :product="$product" />

            @endforeach

          </div>

          <!-- pagination -->
          <div class="d-flex justify-content-center all-products-links">
            {{ $products->links() }}
          </div>
          <!-- END pagination -->

        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary text-left" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
      </div>

      <!-- other stuff -->

      @if(session()->has('target'))

        @php
          $target = session('target');
          session()->forget('target');
        @endphp

        <span id="trigger-show-all" class="d-none">{{ $target }}</span>
      @endif
      
    </div>
  </div>
</div>