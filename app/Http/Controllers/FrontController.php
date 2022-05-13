<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use App\Models\SecondPage;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $homes = HomePage::all();
        return view('front.homepage.index', compact('homes'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $homes = HomePage::find($id);
        $seconds = SecondPage::where('home_id', $id)->get();
        return view('front.homepage.second', compact('seconds','homes'));
    }
}
