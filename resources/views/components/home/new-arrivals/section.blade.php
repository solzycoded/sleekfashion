@props(['newArrivals'])

@if($newArrivals->count())
    @php
        $intervals = [10000, 5000, 3000, 0];
    @endphp

    <section class="py-0 mt-7">
        <div class="container">
            <div class="row h-100">
                <div class="col-lg-7 mx-auto text-center mb-6">
                    <h5 class="fs-3 fs-lg-5 lh-sm mb-3">Checkout New Arrivals</h5>
                </div>

                <div class="col-12">
                    <div class="carousel slide" id="carouselNewArrivals" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            {{-- find out if you can split an array into parts... --}}
                            {{-- AIM: split it into 4 different parts --}}

                            @foreach ($newArrivals->chunk(4) as $i => $products)
                                <x-home.new-arrivals.items class="carousel-item {{ ($i==0 ? 'active' : '') }}"
                                    data-bs-interval="{{ $intervals[$i] }}"
                                    :products="$products" />
                            @endforeach

                            <div class="row">
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselNewArrivals" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span>
                                </button>

                                <button class="carousel-control-next" type="button" data-bs-target="#carouselNewArrivals" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif