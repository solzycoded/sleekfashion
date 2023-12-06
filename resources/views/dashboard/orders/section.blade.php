<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="p-8">
        <div class="d-flex justify-content-start mb-4">
            <div>
                <button class="btn text-white btn-warning mr-3">
                    Pending
                </button>
            </div>
            <div>
                <button class="btn text-white btn-danger mr-3">
                    Cancelled
                </button>
            </div>
            <div>
                <button class="btn text-white btn-success mr-3">
                    Delivered
                </button>
            </div>
        </div>
        <hr>

        <div class="row mt-4">
            <div class="col-12 col-md-6">
                <h5 class="mb-1">Order <b>#SLK3847372849</b></h5>
                <h6>Delivery between <b>Saturday, 12/12/2023 - Saturday, 24/12/2023</b></h6>

                <div class="mt-3">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item active d-flex">
                            <div class="pr-1">
                                <img src="/assets/img/gallery/bagpacks-3.png" class="d-block" alt="customer order image" style="width: 100%">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>First slide label</h5>
                                    <p>Some representative placeholder content for the first slide.</p>
                                </div>
                            </div>
                            <div class="pr-1">
                                <img src="/assets/img/gallery/bagpacks-3.png" class="d-block" alt="customer order image" style="width: 100%">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>First slide label</h5>
                                    <p>Some representative placeholder content for the first slide.</p>
                                </div>
                            </div>
                            <div class="">
                                <img src="/assets/img/gallery/bagpacks-3.png" class="d-block" alt="customer order image" style="width: 100%">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>First slide label</h5>
                                    <p>Some representative placeholder content for the first slide.</p>
                                </div>
                            </div>
                          </div>

                          <div class="carousel-item">
                            <img src="/assets/img/gallery/bagpacks-3.png" class="d-block" alt="customer order image" style="width: 100%">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Second slide label</h5>
                              <p>Some representative placeholder content for the second slide.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="/assets/img/gallery/bagpacks-3.png" class="d-block" alt="customer order image" style="width: 100%">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Third slide label</h5>
                              <p>Some representative placeholder content for the third slide.</p>
                            </div>
                          </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="mt-2"><p>Amount Paid: <b>$34,000</b>.</p></div>
            </div>
        </div>
    </div>
</x-app-layout>