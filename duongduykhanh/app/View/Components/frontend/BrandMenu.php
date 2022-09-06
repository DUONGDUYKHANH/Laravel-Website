<?php

namespace App\View\Components\frontend;

use Illuminate\View\Component;
use App\Models\Brand;

class BrandMenu extends Component
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
        $brands=Brand::where('status',">",0)->get();
        return view('components.frontend.brand-menu',['brands'=>$brands]);
    }
}
