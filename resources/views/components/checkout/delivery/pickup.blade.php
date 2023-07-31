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
            <small>(You selected: <span class="text-black-50 pickup-selected-address">No 8 obasuyi crescent, Ijegun road, Ikotun, Lagos</span>)</small>
        </h5>
        <ol class="list-group">
            <li class="list-group-item align-items-start p-0 border-0">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="available-pickup-location" onchange="highlightAddress(this, '.pickup-selected-address')">
                    <label class="form-check-label text-muted">No 8 obasuyi crescent, Ijegun road, Ikotun, Lagos</label>
                </div>
            </li>
        </ol>
        <div class="d-none"><p class="text-grey">There are no available pick up locations in your current vicinity / state.</p></div>
    </div>
</div>