<?php

namespace App\View\Components;

use App\Models\BasicSetting;
use Illuminate\View\Component;

class header extends Component
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
        $settings = BasicSetting::all();
        return view('front.components.header',compact('settings'));
    }
}
