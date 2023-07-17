@props(['products'])

<div {{ $attributes(["class" => "carousel-item"]) }}>
    <div class="row h-100 align-items-center g-2">
        @foreach ($products as $product)
            <x-home.products.bestsellers.card :product="$product" />
        @endforeach
    </div>
</div>