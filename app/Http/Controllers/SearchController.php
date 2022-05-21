<?php

namespace App\Http\Controllers;

use App\Models\BasicSetting;
use App\Models\Google;
use App\Models\HomePage;
use App\Models\SecondPage;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){

        $search = $request->input('search');
        $settings = BasicSetting::all();
        $googles = Google::all();
        $seconds = SecondPage::query()
            ->where('title_'.app()->getLocale(), 'LIKE', "%{$search}%")
            ->get();

        return view('front.homepage.search', compact('seconds','seconds','googles','settings'));
    }
}
