<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\SoapExtensionNotAvailableException;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialMedia = SocialMedia::all();
        return view('admin.social.index',compact('socialMedia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.social.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $socialMedia = new  SocialMedia();
        $this->extracted($request, $socialMedia);
        $socialMedia->save();
        return redirect()->route('social.index')->withSuccess('Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function show(SocialMedia $socialMedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SocialMedia  $social
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialMedia $social)
    {
        return view('admin.social.edit',compact('social'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialMedia $socialMedia)
    {
        $this->extracted($request, $socialMedia);
        $socialMedia->update();
        return redirect()->route('social.index')->withSuccess('Perfectly updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialMedia  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialMedia $social)
    {
        $social->delete();
        return redirect()->route('social.index')->withSuccess('Perfectly deleted');
    }

    /**
     * @param Request $request
     * @param SocialMedia $socialMedia
     * @return void
     */
    public function extracted(Request $request, SocialMedia $socialMedia): void
    {
        $socialMedia->facebook = $request->facebook;
        $socialMedia->instagram = $request->instagram;
        $socialMedia->twitter = $request->twitter;
        $socialMedia->youtube = $request->youtube;
        $socialMedia->linkedin = $request->linkedin;
        $socialMedia->whatsapp = $request->whatsapp;
        $socialMedia->telegram = $request->telegram;
    }
}
