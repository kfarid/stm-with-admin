<?php

namespace App\Http\Controllers;

use App\Models\BasicSetting;
use App\Models\Contact;
use App\Models\Google;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        $settings = BasicSetting::all();
        $googles = Google::all();
        return view('front.homepage.contact',compact('googles','settings'))  ;
    }


    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'phone' => 'required',
        ]);

        $input = $request->all();

        Contact::create($input);

        //  Send mail to admin
        \Mail::send('front.homepage.contactMail', $input,
            function($message) use ($request){
            $message->from($request->email);
            $message->to('admin@admin.com', 'Admin')->subject($request->get('subject'));
        });

        return redirect()->back()->withSuccess('Your message has been sent. Thank you!');
    }
}
