<?php

namespace App\View\Components\frontend;

use App\Models\Product;
use Illuminate\View\Component;

class ProductByCat extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($catId,$catName)
    {
        $this->catId=$catId;
        $this->catName=$catName;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $products=Product::where('status',">",0)->wherenotnull('salePrice')->where('catId',$this->catId)->orderby('created_at','desc')->limit(6)->get();
        return view('components.frontend.product-by-cat',['product'=>$products,'catName'=>$this->catName]);
    }
}
