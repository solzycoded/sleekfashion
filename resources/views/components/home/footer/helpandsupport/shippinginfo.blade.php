<div class="modal fade" id="shippinginfoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="shippinginfoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-center" id="shippinginfoModalLabel" style="width: 100% !important">Shipping Info</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="m-2">
            <h5 class="fw-normal text-center">See below for information about the shipping to your location.</h5>

            <div class="mt-3 justify-content-center align-items-center">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <p style="font-size: 2em"><i class="bi bi-truck"></i></p>
                        <h5>Standard Delivery</h5>
                        
                        <div style="padding-left: 40px !important">
                            @php
                                $sevenDaysFromToday = date('D, d M Y', strtotime('+7 days'));
                            @endphp

                            <p>Delivered on or before {{ $sevenDaysFromToday }}</p>
                            <p><small class="text-primary fw-normal">Note: Subject to placing your order before specific cut-off times. Details available in checkout.</small></p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 mt-6">
                        <h5>$17.50</h5>

                        <h6>Free– <small>spend over $100.00</small></h6>
                    </div>
                    
                    <div class="col-12 mt-3">
                        <p><b>NEED MORE INFORMATION?</b> Contact us</p>
                        <div>
                            <x-home.footer.contactus />
                        </div>
                    </div>

                    <div class="mt-5">
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