@props(['product'])

@php
    $sex      = isset($product->productGenders[0]) ? $product->productGenders[0]->gender->sex : '';
    $gender   = !empty($sex) ? ('for ' . ($sex=='male' ? 'Men' : 'Women')) : '';

    $category = $product->category->name;
    $image    = $product->productImages[0]->image;
@endphp

<div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
    <div class="card card-span h-100 text-white">
        <img class="card-img h-100" src="{{ $image }}" alt="new arrivals image" style="height: 400px !important" />

        <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
            <h6 class="text-primary">${{ number_format($product->price) }}</h6>
            <p class="text-400 fs-1" style="z-index: 99">
                <a href="/?category={{ $category }}&gender={{ $sex }}" style="color: inherit !important">
                    <span class="text-capitalize">{{ $category }}</span> {{ $gender }}
                </a>
            </p>
            <h4 class="text-light text-capitalize">{{ $product->title }}</h4>
        </div>
        
        <a class="stretched-link view-product" role="button" data-bs-toggle="modal" data-bs-target="#productModal" product-id="{{ $product->id }}"></a>
    </div>
</div>