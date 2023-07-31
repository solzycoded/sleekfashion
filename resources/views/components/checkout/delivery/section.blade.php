<div class="pt-2">
    <h4>Delivery Details</h4>
    {{-- showDoor: false, showPickUp: false, toggleDelivery: function(showPickUp){showPickUp = false; showDoor = true} --}}
    <div class="ml-1" x-data="{showPickUp: false, showDoor: false}">
        {{-- door delivery --}}
        <x-checkout.delivery.door />
        {{-- pick up --}}
        <x-checkout.delivery.pickup />
    </div>
</div>