<?php

namespace App\View\Components\wishlist;

use Illuminate\View\Component;

use App\Http\Controllers\WishlistController;

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
        return view('components.wishlist.section', [
            'wishlist' => (new WishlistController())->index()
        ]);
    }
}
