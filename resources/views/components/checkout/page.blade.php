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
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-checkoutModal"></button>
        </div>

        <div class="modal-body">
            <div class="container-fluid mt-4 mb-4">
                <div class="row border border-1 rounded p-2">
                    <div class="col-12 fw-bold d-none text-danger" id="checkout-error">
                        Kindly fill out all fields. Delivery details, Contact Details and Payment method.
                    </div>
                    {{-- part 1 --}}
                    <div class="col-12 col-md-8 border border-1 mt-1">
                        {{-- delivery --}}
                        <x-checkout.delivery.section />
                        <br>
                        <hr>
                        <br>
                        {{-- payment options --}}
                        <x-checkout.payment.section />
                    </div>
                    {{-- part 2 --}}
                    <div class="col-12 col-md-4 border border-1 mt-1">
                        {{-- order details --}}
                        <x-checkout.orderdetails.section :cart="$cart" />
                        
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
                                <h5>Total: <small class="text-700" id="checkout-total">$45,600</small></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            {{-- data-bs-dismiss="modal" --}}
            <button type="button" class="btn btn-primary text-white" id="continue-to-payment">
                Continue to payment <i class="ml-2 bi bi-arrow-right"></i>
            </button>
        </div>
      </div>
    </div>
</div>