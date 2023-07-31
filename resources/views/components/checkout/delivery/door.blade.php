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
                    <div class="container-fluid p-0">
                        <div class="row">
                            {{-- <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="countries" class="form-label">Country</label>
                                    <select class="form-select p-1" id="countries" aria-label="New Country" name="country" required>
                                        <option selected disabled>Select Country</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="cities" class="form-label">City</label>
                                    <select class="form-select p-1" id="checkout-new-city" aria-label="New City" name="city" required>
                                        <option selected disabled>Select City</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div> --}}

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="new-address" class="form-label">Address</label>
                                    <input type="text" class="form-control p-1" name="address" id="new-address" placeholder="Type New Address here" required>
                                </div>
                            </div>
                        </div>
                    </div>

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
                <small>(You selected: <span class="text-black-50 doordelivery-selected-address">-</span>)</small>
            </h5>
            <ol class="list-group checkout-addresses pt-2">
                {{-- <li class="list-group-item align-items-start">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="customer-address" onchange="highlightAddress(this, '.doordelivery-selected-address')">
                        <label class="form-check-label text-muted">No 8 obasuyi crescent, Ijegun road, Ikotun, Lagos</label>
                    </div>
                </li> --}}
            </ol>
            <div class="d-none"><p class="text-grey">You currently have no address listed yet.</p></div>
        </div>
    </div>
</div>