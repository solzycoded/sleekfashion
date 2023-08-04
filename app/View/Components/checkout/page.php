<?php

namespace App\View\Components\checkout;

use Illuminate\View\Component;

use App\Http\Controllers\ShoppingCartController;

class page extends Component
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
        // a. cart, 
        // b. previous delivery addresses, 
        // c. available pickup locations
        // d. previous phone number

        return view('components.checkout.page', [
            'cart' => $this->cart()
        ]);
    }

    protected function cart(){
        return (new ShoppingCartController())->index();
    }
}
