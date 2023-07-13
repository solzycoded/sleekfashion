@props(['collection'])

<div class="col-md-6">
    <div class="card card-span h-100 text-white">
        <img class="card-img h-100" src="{{ $collection->image }}" alt="..." />
        <div class="card-img-overlay bg-dark-gradient">
            <div {{ $attributes(['class' => "p-5 p-md-2 p-xl-5"])}}>
                <h1 class="fs-md-4 fs-lg-7 text-light text-capitalize">{{ $collection->collection }}</h1>
                <h5 class="fs-2 text-light">collection</h5>
            </div>
        </div><a class="stretched-link" href="/?collection={{ $collection->collection }}"></a>
    </div>
</div>