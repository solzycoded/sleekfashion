@props(['item'])

<div class="col-sm-6 col-md-4 mb-3 mb-md-0 h-60" style="margin-bottom: 10px !important">
    <div class="card card-span h-60 text-white"> 
        <img class="img-fluid img-thumbnail h-60" src="{{ $item->productImages[0]->image }}" alt="Sleekfashion product item" style="height: 200px" /> 

        <x-wishlist.icon :product="$item" />

        <div class="card-body ps-0 bg-200 product-details-container bg-transparent"> 
            <h5 class="fw-bold text-1000 text-truncate product-Title">{{ $item->title }}</h5> 

            <div class="fw-bold">
                <span class="text-primary">${{ number_format($item->price) }}</span>
            </div>

			<x-shoppingcart.icon :product="$item" />
        </div>

        <a class="stretched-link view-product" role="button" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#productModal" product-id="{{ $item->id }}"></a>

    </div>
</div>