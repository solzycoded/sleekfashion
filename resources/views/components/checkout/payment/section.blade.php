<div class="pt-2">
    <h4>Payment Options</h4>

    <div class="ml-1">
        <div class="mb-3">
            <div class="form-check mb-2" style="font-size: 20px">
                <input class="form-check-input" type="radio" name="checkout-payment-option" id="checkout-pay-now">
                <label class="form-check-label" for="checkout-delivery-door">Pay Now</label>
            </div>
            <div class="form-check mb-2" style="font-size: 20px">
                {{-- this should be available, depending on the no of successful orders that this person has made --}}
                <input class="form-check-input" type="radio" name="checkout-payment-option" id="checkout-pay-ondelivery">
                <label class="form-check-label" for="checkout-delivery-door">Pay on Delivery <small class="text-400">(you're not eligible for this, yet)</small></label>
            </div>
        </div>
    </div>
</div>