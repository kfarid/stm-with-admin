<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Google;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $googles = Google::all();
        return view('admin.google.index',compact('googles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.google.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        Google::create($input);
        return redirect()->route('google.index')->withSuccess('Perfectly Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Google  $google
     * @return \Illuminate\Http\Response
     */
    public function show(Google $google)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Google  $google
     * @return \Illuminate\Http\Response
     */
    public function edit(Google $google)
    {
        return view('admin.google.edit',compact('google'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Google  $google
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Google $google)
    {
       $google->analytics_link = $request->analytics_link;
       $google->analytics_script = $request->analytics_script;
       $google->search_script = $request->search_script;
       $google->tag_link = $request->tag_link;
       $google->tag_script_head = $request->tag_script_head;
       $google->tag_script_body = $request->tag_script_body;
        $google->update();

        return redirect()->route('google.index')->withSuccess('Perfectly Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Google  $google
     * @return \Illuminate\Http\Response
     */
    public function destroy(Google $google)
    {
        $google->delete();
        return redirect()->route('google.index')->withSuccess('Perfectly Delete');
    }
}
