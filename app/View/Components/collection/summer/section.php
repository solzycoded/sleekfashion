<?php

namespace App\View\Components\collection\summer;

use Illuminate\View\Component;

use App\Models\ProductCollection;

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
        return view('components.collection.summer.section', [
            'collection' => $this->summerCollection()
        ]);
    }

    private function summerCollection(){
        return ProductCollection::searchCollection(['column' => 'name', 'value' => 'summer'])->get()->take(4);
    }
}
