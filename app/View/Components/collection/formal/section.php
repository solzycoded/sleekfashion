<?php

namespace App\View\Components\collection\formal;

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
        return view('components.collection.formal.section', [
            'collection' => $this->formalCollection()
        ]);
    }

    private function formalCollection(){
        return ProductCollection::searchCollection(['column' => 'name', 'value' => 'formal'])->get()->take(1);
    }
}
