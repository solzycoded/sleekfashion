@props(['product'])

<div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
    <div class="card card-span h-100 text-white">
        {{-- display product image --}}
        <img class="img-fluid h-100" src="/assets/img/gallery/shirt-1.png" alt="..." />

        <div class="card-img-overlay ps-0"> </div>
            <div class="card-body ps-0 bg-200">
            <h5 class="fw-bold text-1000 text-truncate text-capitalize product-Title">{{ $product->title }}</h5>
            <div class="fw-bold">
                {{-- <span class="text-600 me-2 text-decoration-line-through">${{ $product->price }}</span> --}}
                <span class="text-primary">${{ number_format($product->price) }}</span>
            </div>
        </div>

        <a class="stretched-link view-product" data-bs-toggle="modal" data-bs-target="#productModal" role="button" data-bs-dismiss="modal" product-id="{{ $product->id }}"></a>
    </div>
</div>