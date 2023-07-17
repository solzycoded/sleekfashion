<?php

namespace App\View\Components\home\products\bestsellers;

use Illuminate\View\Component;
use App\Http\Controllers\CustomerOrderController;

class section extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.products.bestsellers.section', [
            'products' => $this->bestSellers()
        ]);
    }

    public function bestSellers(){
        return (new CustomerOrderController())->bestSellers();
    }
}
