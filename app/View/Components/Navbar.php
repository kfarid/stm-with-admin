<?php

namespace App\View\Components;

use App\Models\Contact;
use Illuminate\View\Component;

class Navbar extends Component
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
        $mail_count = Contact::all()->count();
        $contacts = Contact::orderBy('created_at','DESC')->get();
        return view('admin.components.navbar',compact('mail_count','contacts'));
    }
}
