@if($products->count() > 0)
  @php
    $intervals = ['10000', '5000', '3000', '0'];
  @endphp

  <section>
      <div class="container">
        <div class="row h-100">
          <div class="col-lg-7 mx-auto text-center mb-6">
            <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Best Sellers</h5>
          </div>
          <div class="col-12">
            <div class="carousel slide" id="carouselBestSellers" data-bs-touch="false" data-bs-interval="false">
              <div class="carousel-inner">
                @foreach ($products->chunk(4) as $i => $items)
                  <x-home.products.bestsellers.page class="active" data-bs-interval="$intervals[$i]" :products="$items" />
                @endforeach

                <div class="row">
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselBestSellers" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>

                  <button class="carousel-control-next" type="button" data-bs-target="#carouselBestSellers" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next </span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

@endif