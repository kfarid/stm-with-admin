<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\ThirdPage;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::orderby('created_at','desc')->get();
        $thirds = ThirdPage::all();
        return view('admin.card.index',compact('cards','thirds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $thirds = ThirdPage::all();
       return view('admin.card.create',compact('thirds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cards = new Card();
        $this->extracted($request, $cards);
        $cards->save();
        return redirect()->route('card.index')->withSuccess('Cards added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        $thirds = ThirdPage::all();
       return view('admin.card.edit',compact('card','thirds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        $this->extracted($request, $card);
        $card->update();
        return redirect()->route('card.index')->withSuccess('Cards updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->delete();
        return redirect()->route('card.index')->withSuccess('Cards deleted');
    }

    /**
     * @param Request $request
     * @param Card $card
     * @return void
     */
    public function extracted(Request $request, Card $card): void
    {
        $card->category = $request->category;
        $card->title = $request->title;
        $card->location = $request->location;
        $card->phone = $request->phone;
        $card->fax = $request->fax;
        $card->email = $request->email;
        $card->link = $request->link;
        $card->img = $request->img;
        $card->third_id = $request->third_id;
    }
}
