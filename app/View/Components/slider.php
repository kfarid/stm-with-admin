<?php

namespace App\View\Components;

use App\Models\SecondPage;
use Illuminate\View\Component;

class slider extends Component
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
        $seconds = SecondPage::all();
        return view('front.components.slider',compact('seconds'));
    }
}
