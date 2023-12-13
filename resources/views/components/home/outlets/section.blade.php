@php
    $intervals = ['10000', '5000', '3000', '0'];
@endphp

<section class="py-11" id="outlet">
    <div class="bg-holder overlay overlay-0" style="background-image:url(/assets/img/gallery/cta.png);background-position:center;background-size:cover;">
    </div>
    <!--/.bg-holder-->

    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="carousel slide carousel-fade" id="carouseCta" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($cities->get()->take(4) as $i => $city)
                    <x-home.outlets.card class="{{ ($i > 0 ? '' : 'active') }}" data-bs-interval="$intervals[$i]" :city="$city" />
                @endforeach

              <div class="row">
                <button class="carousel-control-prev" type="button" data-bs-target="#carouseCta" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouseCta" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next </span></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="storeAddressesModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="storeAddressesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="storeAddressesModalLabel">Our Addresses at <b class="store-city text-secondary">Somewhere</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mt-2">
          <ol class="list-group list-group-numbered city-addresses">
            
          </ol>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
      </div>
    </div>
  </div>
</div>