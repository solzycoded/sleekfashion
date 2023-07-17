@props(['product'])

<div class="col-md-3 mb-3 mb-md-0 h-100">
    <div class="card card-span h-100 text-white">
      <img class="img-fluid h-100" src="{{ $product->productImages[0]->image }}" alt="product image" />

      <div class="card-img-overlay ps-0"> </div>

      <div class="card-body ps-0 bg-200">
        <h5 class="fw-bold text-1000 text-truncate text-capitalize">{{ $product->title }}</h5>
        <div class="fw-bold">
          {{-- <span class="text-600 me-2 text-decoration-line-through">$399</span> --}}
          <span class="text-danger">${{ number_format($product->price) }}</span>
        </div>
      </div>

      <x-home.products.viewproduct-button :productId="$product->id" />
    </div>
</div>