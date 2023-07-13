@props(['products'])

<div {{ $attributes }}>
    <div class="row h-100 align-items-center g-2">
        {{-- 4 cards --}}
        @foreach ($products as $product)
            <x-home.new-arrivals.card :product="$product" />
        @endforeach
    </div>
</div>