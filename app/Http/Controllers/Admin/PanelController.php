<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Panel;
use App\Models\ThirdPage;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $panels = Panel::orderBy('created_at','desc')->get();
        return view('admin.panel.index',compact('panels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $thirds = ThirdPage::orderBy('created_at','DESC')->get();
        return view('admin.panel.create',compact('thirds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $panels = new Panel();
        $panels->name_en = $request->name_en;
        $panels->name_az = $request->name_az;
        $panels->name_ru = $request->name_ru;
        $panels->name_tr = $request->name_tr;
        $panels->text_en = $request->text_en;
        $panels->text_az = $request->text_az;
        $panels->text_ru = $request->text_ru;
        $panels->text_tr = $request->text_tr;
        $panels->third_id = $request->third_id;
        $panels->save();

        return redirect()->route('panel.index')->withSuccess('Perfectly added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Panel  $panel
     * @return \Illuminate\Http\Response
     */
    public function show(Panel $panel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Panel  $panel
     * @return \Illuminate\Http\Response
     */
    public function edit(Panel $panel)
    {
        $thirds = ThirdPage::orderBy('created_at','DESC')->get();
        return view('admin.panel.edit',compact('panel','thirds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Panel  $panel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Panel $panel)
    {
        $panel->name_en = $request->name_en;
        $panel->name_az = $request->name_az;
        $panel->name_ru = $request->name_ru;
        $panel->name_tr = $request->name_tr;
        $panel->text_en = $request->text_en;
        $panel->text_az = $request->text_az;
        $panel->text_ru = $request->text_ru;
        $panel->text_tr = $request->text_tr;
        $panel->third_id = $request->third_id;
        $panel->update();

        return redirect()->route('panel.index')->withSuccess('Perfectly updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Panel  $panel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Panel $panel)
    {
        $panel->delete();
        return redirect()->route('panel.index')->withSuccess('Perfectly deleted');
    }
}
