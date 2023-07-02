{{-- add a product to cart --}}
@props(['product'])

@php
    $inCart = isset(auth()->user()->id) ? $product->inCart(auth()->user()->id) : false;
@endphp

<div class="p-0 shoppingcart-icon-overlay text-center border-top border-lighter mt-1 pt-2" x-data="{added: {{ $inCart ? 'true' : 'false' }}}">
    <button type="button"
        role="button"
        class="btn add-to-cart border border-2 border-primary rounded p-1"
        style="width: 100% !important;"
        @click="added = !added"
        :class="added ? 'bg-secondary text-white' : 'text-primary'"
        product-id="{{ $product->id }}"
        onclick="cart(this)">

        <i class="bi" :class="added ? 'bi-cart-check-fill' : 'bi-cart-plus-fill'"></i>
        
        <template x-if="added">
            <span>Added to cart</span>
        </template>
        <template x-if="!added">
            <span>Add to cart</span>
        </template>

    </button>
</div>