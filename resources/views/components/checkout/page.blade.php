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

                            <div class="ml-1">
                                {{-- door delivery --}}
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="checkout-delivery" id="checkout-delivery-door">
                                        <label class="form-check-label" for="checkout-delivery-door">Door Delivery</label>
                                    </div>
                                    {{-- details for door delivery --}}
                                    <div style="padding-left: 20px !important" class="pb-2">
                                        {{-- add section for new address --}}
                                        <div class="new-address">
                                            <button class="btn btn-dark text-white">
                                                Add new address <i class="bi bi-plus-circle-fill"></i>
                                            </button>
                                            <div class="mt-4">
                                                <form action="/new-customer-address"
                                                    method="POST">
                                                    <input type="text" class="form-control p-1" name="new_address" id="new-address" placeholder="Type New Address here">

                                                    <div style="text-align: right !important">
                                                        <button class="btn btn-primary text-primary mt-1 bg-white pt-1" type="submit">
                                                            Save <i class="bi bi-check-circle-fill"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="address-list mt-5">
                                            <h5>
                                                Available Address List 
                                                <small>(You selected: <span class="text-black-50">No 8 obasuyi crescent, Ijegun road, Ikotun, Lagos</span>)</small>
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
                                        <input class="form-check-input" type="radio" name="checkout-delivery" id="checkout-delivery-pickup">
                                        <label class="form-check-label" for="checkout-delivery-pickup">Pick Up
                                        </label>
                                    </div>
                                    <div style="padding-left: 20px !important" class="pb-2">
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
                    </div>
                    {{-- part 2 --}}
                    {{-- <div class="col-12 col-md-4 ms-auto border border-1 mt-1">.col-md-4 .ms-auto</div> --}}
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