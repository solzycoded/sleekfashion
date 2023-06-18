{{-- user clicks "+", display "counter / no of items" AND change "+" to "-", user increments from 0, change "-", to "check / ready", user decrements to 0, change "ready" to "-" --}}

<div class="p-0 bg-white container-fluid shoppingcart-icon-overlay">
    <div class="p-0 row shoppingcart-icon-container text-right" x-data="{show: false}">
        <x-shoppingcart.counter x-show="show" class="p-0 col-10 col-sm-10 shoppingcart-counter text-black" />
        <div x-show="!show" class="col-10 col-sm-10"></div>
        
        <div class="col-2 col-sm-2">
            <button type="button" 
                role="button" 
                class="btn p-0 text-primary"
                @click="show = !show">
                <i class="bi" :class="!show ? 'bi-cart-plus-fill' : 'bi-cart-dash-fill'"></i>
            </button>
        </div>
    </div>
</div>