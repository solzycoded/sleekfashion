@props(['product'])

<div class="pe-2">
    <div class="position-relative">
        <img src="{{ $product->productImages[0]->image }}" class="d-block w-100 h-40" alt="...">
        <div class="position-absolute text-left fw-bold bottom-0 end-0 w-100">
            <div class="bg-dark text-white p-1 opacity-80">
                <h5 class="fw-bold text-capitalize">{{ $product->title }}</h5>
                <small class="fw-lighter">${{ number_format($product->price) }}</small>
            </div>
        </div>
    </div>
</div>
