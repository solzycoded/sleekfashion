@props(['productId'])

<div x-data="{saved: false}">
    <div class="add-to-wishlist card-img-overlay ps-0" @click="saved = !saved" product-id="{{ $productId }}">
        <div class="wrapper">
            <div class="icon-wishlist">
                <i class="bi ms-2 mt-2" 
                    :class="saved ? 'bi-heart-fill saved-to-wishlist' : 'bi-heart removed-from-wishlist'"></i>
            </div>
        </div>
    </div>
</div>