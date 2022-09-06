<?php

namespace App\View\Components\frontend;

use App\Models\Page;
use Illuminate\View\Component;

class PageLink extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }


    public function render()
    {
        $pages=Page::where('status',">",'0')->where('position',1)->get();
        return view('components.frontend.page-link',['pages'=>$pages]);
    }
}
