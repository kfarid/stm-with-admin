<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BasicSetting;
use Illuminate\Http\Request;

class BasicSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = BasicSetting::all();
        return view('admin.setting.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setting.create');
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

        BasicSetting::create($input);
        return redirect()->route('setting.index')->withSuccess('Perfectly Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BasicSetting  $basicSetting
     * @return \Illuminate\Http\Response
     */
    public function show(BasicSetting $basicSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BasicSetting  $basicSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(BasicSetting $basicSetting)
    {
        return view('admin.setting.edit',compact('basicSetting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BasicSetting  $basicSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BasicSetting $basicSetting)
    {
        $basicSetting->description = $request->description;
        $basicSetting->keywords = $request->keywords;
        $basicSetting->logotext = $request->logotext;
        $basicSetting->logo = $request->logo;
        $basicSetting->favicon = $request->favicon;
        $basicSetting->update();
        return redirect()->route('setting.index')->withSuccess('Perfectly Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BasicSetting  $basicSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(BasicSetting $basicSetting)
    {
        $basicSetting->delete();
        return redirect()->route('setting.index')->withSuccess('Perfectly Delete');
    }
}
