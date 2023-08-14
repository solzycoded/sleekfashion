@props(['product'])

@php
    $saved = isset(auth()->user()->id) ? $product->isSaved(auth()->user()->id) : false;
@endphp

<div x-data="{saved: {{ $saved ? 'true' : 'false' }}}">
    <div class="card-img-overlay ps-0" style="width: 30px !important; height: 30px !important">
        <div class="wrapper">
            <button class="saved d-none" @click="saved = true"></button>
            <button class="not-saved d-none" @click="saved = false"></button>

            <div {{ $attributes(["class" => "icon-wishlist add-to-wishlist"]) }}
                @click="saved = !saved" 
                product-id="{{ $product->id }}"
                onclick="toggleWishlist(this)">
                <i class="bi ms-2 mt-2" 
                    :class="saved ? 'bi-heart-fill saved-to-wishlist' : 'bi-heart removed-from-wishlist'"></i>
            </div>
        </div>
    </div>
</div> 