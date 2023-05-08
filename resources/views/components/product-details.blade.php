
<!-- Modal -->
<div class="modal fade" id="productModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
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
          <img src="/assets/img/gallery/sunglasses.png" class="img-fluid modal-product-image" alt="Product Image" style="width: 100%; height: 220px;">
        </div>
        <!-- END product image -->

        <!-- product details -->
        <!-- price, quantity -->
        <div class="product-details">
          <!-- category, sex -->
          <div class="row" style="margin-top: 20px">
            <div class="col-6 col-sm-6">
              <h5 class="fw-bold">Price</h5>
              <hr>
              <p class="modal-product-price">$60,000</p>
            </div>

            <div class="col-6 col-sm-6">
              <h5 class="fw-bold">Stock Left</h5>
              <hr>
              <p class="modal-product-stockLeft">60</p>
            </div>
          </div>
          <!-- END price, quantity -->

          <!-- category, sex -->
          <div class="row" style="margin-top: 20px">
            <div class="col-6 col-sm-6">
              <h5 class="fw-bold">Category</h5>
              <hr>
              <p><a class="text-primary modal-product-category" href="/categories/category">category</a></p>
            </div>

            <div class="col-6 col-sm-6">
              <h5 class="fw-bold">Classification</h5>
              <hr>
              <p><a class="text-primary modal-product-sex" href="/gender/men">For women / men</a></p>
            </div>
          </div>
          <!-- END category, sex -->

          <!-- description -->
          <div class="product-details-description" style="margin-top: 20px">
            <h5 class="fw-bold">Description</h5>
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
        <button type="button" class="btn btn-secondary text-left" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
      </div>
    </div>
  </div>
</div>
