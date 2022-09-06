<?php

namespace App\View\Components\frontend;

use Illuminate\View\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class Viewcart extends Component
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
        $count=Cart::count();
        if(Auth::check()){
        $customerName=Auth::user()->customerName;
        }
        else
            $customerName='';
        return view('components.frontend.viewcart',['productcount'=>$count,'customerName'=>$customerName]);
    }

}
