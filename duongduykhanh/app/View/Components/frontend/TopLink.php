<?php

namespace App\View\Components\frontend;

use App\Models\Link;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class TopLink extends Component
{

    public function __construct()
    {
        //
    }


    public function render()
    {
        
        $links=Link::where('status',">",0)->where('position',1)->get();
     
        if(Auth::check()){
        $customerName=Auth::user()->customerName;
    }
    else 
        $customerName='';


  
        return view('components.frontend.top-link',['links'=>$links,'customerName'=>$customerName]);
    
}
}
