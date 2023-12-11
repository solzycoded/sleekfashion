@props(['product'])

<div class="col-12 col-sm-6 col-md-4 mb-3">
    <div class="position-relative">
        <img src="{{ $product->productImages[0]->image }}" class="d-block w-100" style="height: 230px; width: inherit" alt="product order image">
        <div class="text-dark position-absolute bottom-0 start-0 p-2 bg-light" style="width: 100%">
            <h5 class="fw-bold text-capitalize">{{ $product->title }}</h5>
            <p class="text-secondary">${{ number_format($product->price) }}</p>
        </div>
    </div>
</div>