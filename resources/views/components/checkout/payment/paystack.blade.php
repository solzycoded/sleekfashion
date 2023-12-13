@if(!is_null(auth()->user()))
    @php
        $profile   = auth()->user()->profile;
        $noProfile = is_null($profile);
    @endphp

    <button type="button" class="btn btn-primary d-none" id="open-paystack" data-bs-toggle="modal" data-bs-target="#paystackModal"></button>

    <!-- Modal -->
    <div class="modal fade" id="paystackModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="paystackModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
        <div class="modal-content" style="background-color: rgb(234, 234, 234)">
            <div class="modal-header">
                <h3 class="modal-title" id="paystackModalLabel">
                    <a href="#!" role="button" class="mr-3" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#checkoutModal"><i class="bi bi-arrow-left"></i></a>
                    Paystack
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-paystackModal"></button>
            </div>

            <div class="modal-body">
                <div class="text-left align-items-center justify-content-center">
                    <form id="paymentForm">
                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>
                            <input class="form-control p-1" type="email" id="email-address" value="{{ auth()->user()->email }}" required readonly />
                        </div>
                        <div class="form-group mb-3">
                            <label for="checkout-amount">Amount</label>
                            <input class="form-control p-1" type="tel" id="checkout-amount" required readonly />
                        </div>
                        <div class="form-group mb-3">
                            <label for="first-name">First Name</label>
                            <input class="form-control p-1" type="text" id="first-name" required value="{{ ($noProfile ? '' : $profile->first_name) }}" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="last-name">Last Name</label>
                            <input class="form-control p-1" type="text" id="last-name" required value="{{ ($noProfile ? '' : $profile->last_name) }}" />
                        </div>
                    
                        <div class="form-submit mt-3" style="text-align: right !important">
                            <button type="submit" class="btn btn-primary text-white">Pay</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-primary continue-to-payment text-white" data-bs-dismiss="modal">
                    Continue to payment <i class="ml-2 bi bi-arrow-right"></i>
                </button>
            </div> --}}
        </div>
        </div>
    </div>

    {{-- payment successful, MODAL --}}
    <div class="modal fade" id="paymentSuccessfulModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="paymentSuccessfulModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
        <div class="modal-content" style="background-color: rgb(234, 234, 234)">
            <div class="modal-header">
                {{-- <h3 class="modal-title" id="paymentSuccessfulModalLabel">
                    Payment successful
                </h3> --}}
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-paymentSuccessfulModal"></button> --}}
            </div>

            <div class="modal-body">
                <div class="text-center align-items-center justify-content-center text-success">
                    <div class="fw-bold" style="font-size: 45px"><i class="bi bi-check2-circle"></i></div>
                    <h3>Payment was successful!</h3>
                    <h6 class="paystack-payment-reference"></h6>
                    <h6 class="customer-order-display" style="color: black">Your order #SLK<b></b> was successfully created.</h6>

                    <div class="mt-4">
                        <div style="color: gray">This page will now reload in <b class="text-danger payment-countdown ps-2">12</b></div>
                        {{-- <button class="btn btn-primary text-white p-2" data-bs-toggle="modal" data-bs-target="#allProductsModal" data-bs-dismiss="modal">
                            Continue Shopping <i class="bi bi-arrow-right"></i>
                        </button>
                        <button class="btn btn-dark text-white p-2" data-bs-dismiss="modal">Close</button> --}}
                    </div>
                </div>
            </div>

        </div>
        </div>
    </div>
@endif