@if($collection->count())
    @php
        $product = $collection[0]->product;
    @endphp

    <section>

        <div class="container">
        <div class="row h-100 g-0">

            <div class="col-md-6">
            <div class="bg-300 p-4 h-100 d-flex flex-column justify-content-center">
                <h1 class="fw-semi-bold lh-sm fs-4 fs-lg-5 fs-xl-6">Gentle Formal Looks </h1>
                <p class="mb-5 fs-1">We provide the top formal apparel package to make your job look confident and comfortable. Stay connect.</p>
                <div class="d-grid gap-2 d-md-block">
                    <a class="btn btn-lg btn-dark" href="/?collection=formal" role="button">Explore Collection</a>
                </div>
            </div>
            </div>

            <div class="col-md-6">
            <div class="card card-span h-100 text-white">
                <img class="card-img h-100" src="{{ $product->productImages[0]->image }}" alt="collection category image" />
                <a class="stretched-link" href="/?category={{ $product->category->name }}&collection=formal"></a>
            </div>
            </div>
        </div>
        </div>
        <!-- end of .container-->

    </section>
@endif