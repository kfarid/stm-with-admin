<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\HomePage;
use App\Models\Panel;
use App\Models\SecondPage;
use App\Models\ThirdPage;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class FrontController extends Controller
{
    public function index()
    {
        $homes = HomePage::all();
        return view('front.homepage.index', compact('homes'));
    }

    /**
     * @param String $slug_en
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function second(String $slug_en)
    {
        $homes = HomePage::where('slug_en',$slug_en)->get();
        /*dd($homes);*/
        $seconds = SecondPage::where('home_slug', $slug_en)->get();
        return view('front.homepage.second', compact('seconds','homes'));
    }

    /**
     * @param String $slug_en
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function third(String $slug_en)
    {
        $seconds = SecondPage::where('slug_en',$slug_en)->get();
        /*dd($seconds);*/
        $thirds = ThirdPage::where('second_slug', $slug_en)->get();
        $panels = Panel::orderBy('created_at',"DESC")->get();
        $cards = Card::orderBy('created_at',"DESC")->get();
        return view('front.homepage.third', compact('seconds','thirds','panels','cards'));
    }
}
