<?php

namespace App\View\Components\checkout\delivery;

use Illuminate\View\Component;

use App\Http\Controllers\OrderAddressController;

class door extends Component
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
        return view('components.checkout.delivery.door', [
            'customerAddresses' => $this->customerAddresses()
        ]);
    }

    protected function customerAddresses(){
        return (new OrderAddressController())->index();
    }
}
