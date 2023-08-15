
<!-- Modal -->
<div class="modal fade" id="productModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
      
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn fw-bold d-none back-to-allproducts" aria-label="Back" data-bs-target="#allProductsModal" data-bs-toggle="modal" data-bs-dismiss="modal" style="font-size: 25px; padding: 0 6px 0 0;">
          <i class="bi bi-arrow-left"></i>
        </button>
        <h4 class="modal-title text-capitalize modal-product-title" id="productModalLabel">Product Title</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- product image -->
        <div>
          <img src="/assets/img/gallery/sunglasses.png" class="img-fluid modal-product-image" alt="Product Image" style="width: 100%; max-height: 180px;">
        </div>
        <!-- END product image -->

        <!-- product details -->
        <!-- price, quantity -->
        <div class="product-details">
          <!-- category, sex -->
          <div class="row" style="margin-top: 20px">
            <div class="col-6 col-sm-6">
              <h5 class="fw-bold"><i class="bi bi-tag-fill"></i> <span class="modal-product-price">$60,000</span></h5>
            </div>

            <div class="col-6 col-sm-6">
              <h5 class="fw-bold"><i class="bi bi-list-check"></i> <span class="modal-product-stockLeft" style="margin-right: 3px !important">60</span><small class="fw-normal">products left</small></h5>
            </div>
          </div>
          <!-- END price, quantity -->

          <!-- category, sex -->
          <div class="row" style="margin-top: 20px">
            <div class="col-6 col-sm-6">
              <h5 class="fw-bold"><i class="bi bi-arrow-up-right-circle-fill"></i> <a class="text-primary modal-product-category" href="/categories/category">category</a></h5>

            </div>

            <div class="col-6 col-sm-6">
              <h5 class="fw-bold"><i class="bi bi-person-fill"></i> <a class="text-primary modal-product-sex" href="/gender/men">For women / men</a></h5>
            </div>
          </div>
          <!-- END category, sex -->

          <!-- description -->
          <div class="product-details-description" style="margin-top: 20px">
            <hr>
            <p class="modal-product-details">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <!-- END description -->

        </div>
        <!-- END product details -->
      </div>
      <div class="modal-footer">

        {{-- wishlist icon --}}
        <div x-data="{saved: false}" id="icon-wishlist-container">
          <button class="product-icon-wishlist add-to-wishlist btn btn-dark p-1 mr-2" 
            @click="saved = !saved" 
            product-id="1"
            onclick="toggleWishlist(this)">
            <i class="bi" 
              :class="saved ? 'bi-heart-fill saved-to-wishlist' : 'bi-heart removed-from-wishlist'"></i>
          </button>
        </div>

        {{-- shopping cart icon --}}
        <div id="shopping-cart-container" class="p-0 shoppingcart-icon-overlay text-center" x-data="{added: false}">
          <button class="product-in-cart d-none" @click="added = true"></button>
          <button class="product-not-in-cart d-none" @click="added = false"></button>
          <button type="button"
            role="button"
            class="product-cart-icon btn add-to-cart border border-2 border-primary rounded p-1"
            style="width: 100% !important; font-size: 1.2em"
            @click="added = !added"
            :class="added ? 'bg-secondary text-white' : 'text-primary'"
            product-id="1"
            onclick="cart(this)">

            <i class="bi" :class="added ? 'bi-cart-check-fill in-cart' : 'bi-cart-plus-fill not-in-cart'"></i>

            <template x-if="added">
                <span>Added to cart</span>
            </template>
            <template x-if="!added">
                <span>Add to cart</span>
            </template>

          </button>
        </div>

      </div>
    </div>
  </div>
</div>
