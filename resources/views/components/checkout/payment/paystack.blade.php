
<button type="button" class="btn btn-primary d-none" id="open-paystack" data-bs-toggle="modal" data-bs-target="#paystackModal"></button>

<!-- Modal -->
<div class="modal fade" id="paystackModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="paystackModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="paystackModalLabel">
                <a href="#!" role="button" class="mr-3" data-bs-dismiss="modal"><i class="bi bi-arrow-left"></i></a>
                Paystack Checkout
            </h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <form id="paymentForm">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email-address" required />
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="tel" id="amount" required />
                </div>
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" id="first-name" />
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" id="last-name" />
                </div>
            
                <div class="form-submit">
                    <button type="submit" onclick="payWithPaystack()"> Pay </button>
                </div>
            </form>
        </div>

        {{-- <div class="modal-footer">
            <button type="button" class="btn btn-primary continue-to-payment text-white" data-bs-dismiss="modal">
                Continue to payment <i class="ml-2 bi bi-arrow-right"></i>
            </button>
        </div> --}}
      </div>
    </div>
</div>