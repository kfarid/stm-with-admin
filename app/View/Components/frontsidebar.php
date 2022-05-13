<?php

namespace App\View\Components;

use App\Models\HomePage;
use Illuminate\View\Component;

class frontsidebar extends Component
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
        $links = HomePage::orderBy('id')->get();
        return view('front.components.frontsidebar',compact('links'));
    }
}
