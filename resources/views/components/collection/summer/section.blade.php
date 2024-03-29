@if($collection->count())
  <section class="py-0" id="outlet">

      <div class="container">
        <div class="row h-100 g-0">

          <div class="col-md-6">
            <div class="card card-span h-100 text-white">
              <img class="card-img h-100" src="/assets/img/gallery/summer.png" alt="collection image" />
              <div class="card-img-overlay bg-dark-gradient rounded-0">
                <div class="p-5 p-md-2 p-xl-5 d-flex flex-column flex-end-center align-items-baseline h-100">
                  <h1 class="fs-md-4 fs-lg-7 text-light">Summer of '{{ date('y')}} </h1>
                </div>
              </div><a class="stretched-link" href="/?collection=summer"></a>
            </div>
          </div>

          <div class="col-md-6 h-100">
            <div class="row h-100 g-0">
              @foreach ($collection as $i => $item)
                <x-collection.summer.card class="{{ ($i==0 ? 'h-100' : '') }}" :product="$item->product" />
              @endforeach
            </div>
          </div>

        </div>
      </div>
      <!-- end of .container-->

  </section>
@endif