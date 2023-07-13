<?php

namespace App\View\Components\home\shopbycategory;

use Illuminate\View\Component;

use App\Models\Product;
use App\Models\Category;

class section extends Component
{
    // SEARCH products, groupBy(categories.name) -> distinct
    /**
     * Create a new component instance.
     *
     * @return void
     */
    // public function __construct(public Collection $products)
    // {
    // }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // randomly select 5 products
        return view('components.home.shopbycategory.section', [
            'categories' => Category::inRandomOrder()->limit(6)->get()
        ]);
    }
}
