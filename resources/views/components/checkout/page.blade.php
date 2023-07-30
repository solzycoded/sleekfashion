<button type="button" class="btn btn-primary d-none" id="open-checkout" data-bs-toggle="modal" data-bs-target="#checkoutModal"></button>

<!-- Modal -->
<div class="modal fade" id="checkoutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="checkoutModalLabel">
                <a href="#!" role="button" class="mr-3" data-bs-toggle="modal" data-bs-target="#shoppingcartModal" data-bs-dismiss="modal"><i class="bi bi-arrow-left"></i></a>
                Checkout <small id="checkout-n-items">(3)</small>
            </h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <div class="container-fluid mt-4 mb-4">
                <div class="row border border-1 rounded p-2">
                    {{-- part 1 --}}
                    <div class="col-12 col-md-8 border border-1 mt-1">
                        {{-- delivery --}}
                        <x-checkout.delivery.section />
                        <br>
                        <hr>
                        <br>
                        {{-- payment options --}}
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
                    </div>
                    {{-- part 2 --}}
                    <!-- <div class="col-12 col-md-4 border border-1 mt-1">
                        {{-- order details --}}
                        <div class="container-fluid p-0">
                            <div class="row pt-2">
                                <h4 class="col">Order Details</h4>
                                <div class="col" style="text-align: right !important">
                                    <a href="/" id="checkout-update-cart" class="btn btn-primary text-white p-2">Update Cart</a>
                                </div>
                            </div>
                            <hr>
                            <div class="checkout-order-details pt-2" style="max-height: 200px; overflow-y: auto; overflow-x: hidden">
                                <ol class="list-group">
                                    <li class="list-group-item mb-2 border-0">
                                        <div class="row">
                                            <div class="col-3 col-sm-3">
                                                <img src="/assets/img/gallery/vanity-bag.png" alt="checkout product image" style="height: 100% !important" width="80">
                                            </div>
                                            <div class="col-9 col-sm-9">
                                                <h5>Title</h5>
                                                <p class="p-0 m-0">$2000</p>
                                                <small><b>Quantity:</b> 3</small>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        
                        {{-- summary --}}
                        <div class="container-fluid p-0 mt-4">
                            <div class="pt-2">
                                <h4>Summary</h4>
                            </div>
                            <hr>
                            <div class="checkout-order-details pt-2" style="max-height: 200px; overflow-y: auto; overflow-x: hidden">
                                <div class="mb-3">
                                    <h5>Subtotal: <small class="text-700">$45,000</small></h5>
                                    <h5>Delivery fee: <small class="text-700">$600</small></h5>
                                </div>
                                <h5>Total: <small class="text-700">$45,600</small></h5>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary continue-to-payment text-white" data-bs-dismiss="modal">
                Continue to payment <i class="ml-2 bi bi-arrow-right"></i>
            </button>
        </div>
      </div>
    </div>
</div>