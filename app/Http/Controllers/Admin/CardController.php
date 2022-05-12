<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
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
        return view('admin.card.index',compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.card.create');
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
        $cards->category = $request->category;
        $cards->title = $request->title;
        $cards->location = $request->location;
        $cards->phone = $request->phone;
        $cards->fax = $request->fax;
        $cards->email = $request->email;
        $cards->link = $request->link;
        $cards->img = $request->img;
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
       return view('admin.card.edit',compact('card'));
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
        $card->category = $request->category;
        $card->title = $request->title;
        $card->location = $request->location;
        $card->phone = $request->phone;
        $card->fax = $request->fax;
        $card->email = $request->email;
        $card->link = $request->link;
        $card->img = $request->img;
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
}
