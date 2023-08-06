<?php

namespace App\View\Components\checkout\delivery;

use App\Http\Controllers\CustomerContactController;
use Illuminate\View\Component;

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
        return view('components.checkout.delivery.section', [
            'customerContact' => $this->customerContact()
        ]);
    }

    protected function customerContact(){
        return (new CustomerContactController())->index();
    }
}
