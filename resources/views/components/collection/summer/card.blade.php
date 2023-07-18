@props(['product'])

@php
    $category = $product->category->name;
@endphp

<div {{ $attributes(["class" => "col-md-6"]) }}>
    <div class="card card-span h-100 text-white">
        <img class="card-img h-100" src="{{ $product->productImages[0]->image }}" alt="product image" />

        <div class="card-img-overlay bg-dark-gradient rounded-0">
            <div class="p-5 p-xl-5 p-md-0">
                <h3 class="text-light text-capitalize">{{ $category }}</h3>
            </div>
        </div>

      <a class="stretched-link" href="/?category={{ $category }}&collection=summer"></a>
    </div>
</div>