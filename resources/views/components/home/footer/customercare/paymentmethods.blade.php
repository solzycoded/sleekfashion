<div class="modal fade" id="paymentmethodsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="paymentmethodsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-center" id="paymentmethodsModalLabel" style="width: 100% !important">Payment Methods</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="m-2">
            <div style="background-color: lightgrey !important" class="p-3 rounded">
                <h5 class="fw-normal text-center">We have 4 payment methods available today, as at (21/08/2023). We'd update you, if we have a new payment method available.</h5>
            </div>

            <div class="mt-5 justify-content-center align-items-center">
                <div class="row">
                    {{-- return instructions --}}
                    <div class="col-12 mb-2">
                        <h4 class="mb-4">Available Payment methods</h4>
                        <div class="row">
                            <div class="col-12 col-md-6 mb-2">
                                <p class="fw-bold p-0 m-0">Pay with Debit card:</p>
                                <p class="fw-normal">If you choose to use this payment method, you'll provide the required details on your ATM card (ATM card holder name, expiration date, etc.). as long as the amount to be debited exists in your account. the payment would be successful.</p>
                            </div>
                            <div class="col-12 col-md-6 mb-2">
                                <p class="fw-bold p-0 m-0">Pay with Bank:</p>
                                <p class="fw-normal">You'll need to provide your bank account details (bank name, bank account number).</p>
                            </div>
                            
                            <div class="col-12 col-md-6 mb-2">
                                <p class="fw-bold p-0 m-0">Pay with Transfer:</p>
                                <p class="fw-normal">If you choose to use this payment method, you'll be provided with an account number, where you can deposit the "exact" amount that's required. You'd have to make the transfer, within a specific time limit.
                                </p>
                            </div>
                            <div class="col-12 col-md-6 mb-2">
                                <p class="fw-bold p-0 m-0">Pay with USSD:</p>
                                <p class="fw-normal">You'll be required to pay via the USSD code of the bank you use.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-1">
                        <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#allProductsModal">
                            Start Shopping <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>