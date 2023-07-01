@props(['product'])

<div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
	<div class="card card-span h-100 text-white">
		<img class="img-fluid h-100" src="{{ $product->productImages[0]->image }}" alt="..." />
		
		<x-wishlist.icon :product="$product" />

		<div class="card-body p-0 bg-200 product-details-container">
			<h5 class="fw-bold text-1000 text-truncate product-Title text-capitalize">{{ $product->title }}</h5>
			
			<div class="fw-bold">
				<!-- THIS is for discount price, you'll still work on this later -->
				<!-- <span class="text-600 me-2 text-decoration-line-through">$200</span> -->
				<span class="text-primary">${{ number_format($product->price) }}</span> 
			</div>

			<x-shoppingcart.icon :product="$product" />
		</div>

		<a class="stretched-link view-product" role="button" data-bs-toggle="modal" data-bs-target="#productModal"></a>

	</div>
</div>

<x-product-details />