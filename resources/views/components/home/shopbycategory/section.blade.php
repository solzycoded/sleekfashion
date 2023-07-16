{{-- {{ $products }} --}}

<section id="categoryWomen">
    <div class="container">
        <div class="row h-100">
            <div class="col-lg-7 mx-auto text-center mb-6">
              <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Shop By Category</h5>
            </div>
            <div class="col-12">
              <nav>
                {{-- CATEGORY header --}}
                <div class="nav nav-tabs majestic-tabs mb-4 justify-content-center" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-women-tab" data-bs-toggle="tab" data-bs-target="#nav-women" type="button" role="tab" aria-controls="nav-women" aria-selected="true">For Women</button>

                    <button class="nav-link" id="nav-men-tab" data-bs-toggle="tab" data-bs-target="#nav-men" type="button" role="tab" aria-controls="nav-men" aria-selected="false">For Men</button>
                </div>

                <div class="tab-content" id="nav-tabContent">
                  {{-- For Women --}}
                  <x-home.shopbycategory.classification-tab class="show active" id="nav-women" aria-labelledby="nav-women-tab" :categories="$categories" />

                  {{-- For Men --}}
                  <x-home.shopbycategory.classification-tab id="nav-men" aria-labelledby="nav-men-tab" :categories="$categories" />
                </div>

              </nav>
            </div>
        </div>
    </div>
</section>