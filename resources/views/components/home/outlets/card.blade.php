@props(['city'])

{{-- @php
@endphp --}}

<div {{ $attributes(["class" => "carousel-item"]) }}>
    <div class="row h-100 align-items-center g-2">
      <div class="col-12">
        <div class="text-light text-center py-2">
            <h5 class="display-4 fw-normal text-400 fw-normal mb-4">visit our Outlets in</h5>
            <h1 class="display-1 text-white fw-normal mb-8 text-capitalize fs-6">{{ ($city->name . ', ' . $city->country->name) }}</h1>

            <a class="btn btn-lg text-light fs-1 see-addresses" href="#see-addresses" role="button" data-bs-toggle="modal" data-bs-target="#storeAddressesModal" onclick="seeAddresses(this, {city: '{{ $city->name . ', ' . $city->country->name }}', addresses: {{ $city->addresses }}})">
                See Addresses
                <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"> </path>
                </svg>
            </a>
        </div>
      </div>
    </div>
</div>