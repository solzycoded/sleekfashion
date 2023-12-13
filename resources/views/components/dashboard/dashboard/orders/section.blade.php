@props(['header'])

@php
    $orders = auth()->user()->orders;
@endphp

<div class="col-12 col-md-6 mb-8">
    <h5 class="fw-bold mb-2" style="font-size: 20px">{{ $header }}</h5>
    @if(count($orders))
        @php
            $id  = str_replace(" ", "-", $header);
        @endphp

        <div id="{{ $id }}" class="carousel carousel-dark slide">
            <div class="carousel-inner">
                @foreach ($orders as $i => $order)
                    <div class="carousel-item {{ ($i==0 ? 'active' : '') }}" >
                        <div class="d-flex justify-content-start">
                            @foreach ($order->customerOrders->take(4) as $customerOrder)
                                <x-dashboard.dashboard.orders.item :product="($customerOrder->product)" :price="$customerOrder->price" />
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#{{ $id }}" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#{{ $id }}" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @else
        <div class="text-secondary fw-bold mb-2">You've not placed any order, yet.</div>
        <div>
            <a href="/?search" class="btn fw-bold text-white" style="background-color: #FFA15C">Start Shopping <i class="bi bi-arrow-right"></i></a>
        </div>
    @endif
</div>