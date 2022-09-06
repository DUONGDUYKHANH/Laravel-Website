<?php

namespace App\View\Components\frontend;

use App\Models\Category;
use Illuminate\View\Component;

class CategoryMenu extends Component
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


    public function render()
    {
        $categories1=Category::where('status',">",0)->where('parentId',0)->get();
        $categories2=Category::where('status',">",0)->where('parentId',">",0)->get();
        return view('components.frontend.category-menu',[
            'categories1'=>$categories1,
            'categories2'=>$categories2,

        ]);
    }
}
