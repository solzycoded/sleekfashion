<button type="button" class="btn btn-primary d-none" id="open-paystack" data-bs-toggle="modal" data-bs-target="#paystackModal"></button>

<!-- Modal -->
<div class="modal fade" id="paystackModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="paystackModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content" style="background-color: rgb(234, 234, 234)">
        <div class="modal-header">
            <h3 class="modal-title" id="paystackModalLabel">
                <a href="#!" role="button" class="mr-3" data-bs-dismiss="modal"><i class="bi bi-arrow-left"></i></a>
                Paystack
            </h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <div class="text-left align-items-center justify-content-center">
                <form id="paymentForm">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input class="form-control" type="email" id="email-address" required />
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input class="form-control" type="tel" id="amount" required />
                    </div>
                    <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input class="form-control" type="text" id="first-name" />
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input class="form-control" type="text" id="last-name" />
                    </div>
                
                    <div class="form-submit mt-3" style="text-align: right !important">
                        <button type="submit" class="btn btn-primary text-white" onclick="payWithPaystack()">Pay</button>
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