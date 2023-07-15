@props(['product'])

<div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-60" style="margin-bottom: 10px !important">
  <div class="card card-span h-60 text-white">
    <img class="img-fluid img-thumbnail h-60" src="{{ $product->productImages[0]->image }}" alt="Sleekfashion product item" style="height: 200px" />
    
		<x-wishlist.icon :product="$product" />

    <div class="card-body ps-0 bg-200 product-details-container bg-transparent">
      <h5 class="fw-bold text-1000 text-truncate product-Title">{{ $product->title }}</h5>

      <div class="fw-bold">
        <!-- THIS is for discount price, you'll still work on this later -->
        <!-- <span class="text-600 me-2 text-decoration-line-through">$200</span> -->
        <span class="text-primary">${{ number_format($product->price) }}</span>
      </div>

			<x-shoppingcart.icon :product="$product" />
    </div>

    <a class="stretched-link view-product from-all-products" role="button" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#productModal" product-id="{{ $product->id }}"></a> 

  </div>
</div>