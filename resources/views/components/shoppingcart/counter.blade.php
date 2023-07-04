{{-- include the no of items left --}}
@props(['maxQuantity'])

<div {{ $attributes(["class" => "cart-item-counter"])}}>
    <button role="button" 
        class="p-0 m-0 border border-2 border-dark shoppingcart-counter shoppingcart-counter-decrease text-black bg-transparent fw-bold" 
        @click="counter = (counter - 1) < 1  ? 1 : --counter">
        <i class="bi bi-dash"></i>
    </button>

    <span class="ms-2 me-2 text-dark product-quantity" style="font-size: 1.1em;">
        <strong x-text="counter"></strong>
    </span>

    {{-- the counter can't exceed the "max no of items" --}}
    <button role="button" 
        class="p-0 m-0 border border-2 border-dark shoppingcart-counter shoppingcart-counter-increase text-dark bg-transparent fw-bold"
        @click="counter = ((counter + 1) > {{ $maxQuantity }}) ? counter : ++counter">
        <i class="bi bi-plus"></i>
    </button>
</div>