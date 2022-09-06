<?php

namespace App\View\Components\frontend;

use Illuminate\View\Component;
use App\Models\Link;

class BottomLink extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pos)
    {
        $this->position=$pos;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $links=Link::where('status',">",0)->where('position',$this->position)->get();
        return view('components.frontend.bottom-link',['links'=>$links]);
    }
}
