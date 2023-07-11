@props(['newArrivals'])

@php
    $intervals = [10000, 5000, 3000, 0];
@endphp

<section class="py-0">
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
                            <x-home.new-arrivals.items class="carousel-item {{ ($i==0 ? 'active' : '') }}" data-bs-interval="{{ $intervals[$i] }}" :products="$products" />
                        @endforeach

                        {{-- <div class="carousel-item active" data-bs-interval="10000">
                            <div class="row h-100 align-items-center g-2">
                                <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                <div class="card card-span h-100 text-white"><img class="card-img h-100" src="/assets/img/gallery/full-body.png" alt="..." />
                                    <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                    <h6 class="text-primary">$175</h6>
                                    <p class="text-400 fs-1">Jumper set for Women</p>
                                    <h4 class="text-light">Flat Hill Slingback</h4>
                                    </div><a class="stretched-link" href="#"></a>
                                </div>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                <div class="card card-span h-100 text-white"><img class="card-img h-100" src="/assets/img/gallery/formal-coat.png" alt="..." />
                                    <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                    <h6 class="text-primary">$175</h6>
                                    <p class="text-400 fs-1">Jumper set for Women</p>
                                    <h4 class="text-light">Ocean Blue Ring</h4>
                                    </div><a class="stretched-link" href="#"></a>
                                </div>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                <div class="card card-span h-100 text-white"><img class="card-img h-100" src="/assets/img/gallery/ocean-blue.png" alt="..." />
                                    <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                    <h6 class="text-primary">$175</h6>
                                    <p class="text-400 fs-1">Jumper set for Women</p>
                                    <h4 class="text-light">Brown Leathered Wallet</h4>
                                    </div><a class="stretched-link" href="#"></a>
                                </div>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                <div class="card card-span h-100 text-white"><img class="card-img h-100" src="/assets/img/gallery/sweater.png" alt="..." />
                                    <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                    <h6 class="text-primary">$175</h6>
                                    <p class="text-400 fs-1">Jumper set for Women</p>
                                    <h4 class="text-light">Silverside Wristwatch</h4>
                                    </div><a class="stretched-link" href="#"></a>
                                </div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="carousel-item" data-bs-interval="5000">
                            
                        </div>

                        <div class="carousel-item" data-bs-interval="3000">
                           
                        </div>

                        <div class="carousel-item">

                        </div> --}}

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