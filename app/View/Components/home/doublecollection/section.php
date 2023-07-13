<?php

namespace App\View\Components\home\doublecollection;

use Illuminate\View\Component;

use App\Models\Collection;

class section extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $collection = Collection::join('product_collections', 'product_collections.collection_id', 'collections.id')
            ->join('product_images', 'product_images.product_id', 'product_collections.product_id')
            ->select(['collections.name as collection', 'product_images.image as image'])
            ->groupBy('collections.name', 'product_images.image')
            ->distinct()
            ->get()
            ->take(2);

        return view('components.home.doublecollection.section', [
            // we need collection name and one unique product image, for each collection
            'collection' => $collection
        ]);
    }
}
