<div class="pt-2">
    <h4>Delivery Details</h4>
    {{-- showDoor: false, showPickUp: false, toggleDelivery: function(showPickUp){showPickUp = false; showDoor = true} --}}
    <div class="ml-1" x-data="{showPickUp: false, showDoor: false}">
        {{-- door delivery --}}
        <x-checkout.delivery.door />
        {{-- pick up --}}
        <x-checkout.delivery.pickup />

        {{-- contact details --}}
        <div class="mt-2">
            <h5>Contact details</h5>
            <div style="padding-left: 10px !important">
                <div class="form-group">
                    <label for="checkout-phonenumber">Kindly provide your <b>active phone number</b> for delivery</label>
                    <input type="phone" class="form-control p-1" id="checkout-phonenumber" placeholder="e.g (234)7082821966">
                </div>
            </div>
        </div>
    </div>
</div>