<?php

namespace App\View\Components\home\outlets;

use Illuminate\View\Component;

use App\Models\City;

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
        return view('components.home.outlets.section', [
            'cities' => City::filter('customer')
        ]);
    }
}
