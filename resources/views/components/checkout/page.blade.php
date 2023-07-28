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
                        <div class="pt-2">
                            <h4>Delivery Details</h4>
                            {{-- showDoor: false, showPickUp: false, toggleDelivery: function(showPickUp){showPickUp = false; showDoor = true} --}}
                            <div class="ml-1" x-data="{showPickUp: false, showDoor: false}">
                                {{-- door delivery --}}
                                <div class="mb-3">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input"
                                            type="radio"
                                            name="checkout-delivery"
                                            id="checkout-delivery-door"
                                            @change="showDoor = true; showPickUp = false">
                                        <label class="form-check-label" for="checkout-delivery-door">Door Delivery</label>
                                    </div>
                                    {{-- details for door delivery --}}
                                    <div style="padding-left: 20px !important;" class="pb-2" x-show="showDoor" x-transition.duration.500ms>
                                        {{-- add section for new address --}}
                                        <div class="checkout-new-address" x-data="{showNewAddress: false}">
                                            <button class="btn btn-dark text-white" @click="showNewAddress = !showNewAddress">
                                                Add new address <i class="bi" :class="'bi-' + (!showNewAddress ? 'plus' : 'x') + '-circle-fill'"></i>
                                            </button>
                                            <div class="mt-4" x-show="showNewAddress" x-transition.duration.300ms>
                                                <form action="/new-customer-address"
                                                    method="POST" 
                                                    id="form-customer-address"
                                                    autocomplete="off">
                                                    {{-- INCLUDE 
                                                        - country, 
                                                        - city, 
                                                        - address 
                                                    --}}
                                                    <input type="text" class="form-control p-1" name="new_address" id="new-address" placeholder="Type New Address here">

                                                    <div style="text-align: right !important">
                                                        <button class="btn btn-primary text-primary mt-1 bg-white pt-1" type="submit">
                                                            Save <i class="bi bi-check-circle-fill"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="checkout-address-list mt-5">
                                            <h5>
                                                Available Address List 
                                                <small>(Select an address / You selected: <span class="text-black-50">No 8 obasuyi crescent, Ijegun road, Ikotun, Lagos</span>)</small>
                                            </h5>
                                            <ol class="list-group">
                                                <li class="list-group-item align-items-start">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="customer-address" checked>
                                                        <label class="form-check-label text-muted">No 8 obasuyi crescent, Ijegun road, Ikotun, Lagos</label>
                                                    </div>
                                                </li>
                                            </ol>
                                            <div class="d-none"><p class="text-grey">You currently have no address listed yet.</p></div>
                                        </div>
                                    </div>
                                </div>
                                {{-- pick up --}}
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" 
                                            type="radio" 
                                            name="checkout-delivery" 
                                            id="checkout-delivery-pickup" 
                                            @change="showPickUp = true; showDoor = false">
                                        <label class="form-check-label" for="checkout-delivery-pickup">Pick Up
                                        </label>
                                    </div>
                                    <div style="padding-left: 20px !important;" class="pb-2" x-show="showPickUp" x-transition.duration.500ms>
                                        <h5>
                                            Pick a location that's closest you
                                            <small>(You selected: <span class="text-black-50">No 8 obasuyi crescent, Ijegun road, Ikotun, Lagos</span>)</small>
                                        </h5>
                                        <ol class="list-group">
                                            <li class="list-group-item align-items-start">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="available-pickup-location" checked>
                                                    <label class="form-check-label text-muted">No 8 obasuyi crescent, Ijegun road, Ikotun, Lagos</label>
                                                </div>
                                            </li>
                                        </ol>
                                        <div class="d-none"><p class="text-grey">There are no available locations in your current vicinity / state.</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
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