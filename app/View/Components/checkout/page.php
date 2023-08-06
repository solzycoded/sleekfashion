<?php

namespace App\View\Components\checkout;

use Illuminate\View\Component;

use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\CustomerContactController;

class page extends Component
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
        // a. [DONE], 
        // b. previous delivery addresses, 
        // c. available pickup locations
        // d. previous phone number

        return view('components.checkout.page', [
            'cart'            => $this->cart(),
            'customerContact' => $this->customerContact()
        ]);
    }

    protected function cart(){
        return (new ShoppingCartController())->index();
    }

    protected function customerContact(){
        return (new CustomerContactController())->index();
    }
}
