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
        $basicSetting = new BasicSetting();
        $basicSetting->description = $request->description;
        $basicSetting->keywords = $request->keywords;
        $basicSetting->logotext = $request->logotext;
        $basicSetting->logo = $request->logo;
        $basicSetting->favicon = $request->favicon;
        $basicSetting->save();
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
     * @param  \App\Models\BasicSetting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(BasicSetting $setting)
    {
        return view('admin.setting.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BasicSetting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BasicSetting $setting)
    {

        $setting->description = $request->description;
        $setting->keywords = $request->keywords;
        $setting->logotext = $request->logotext;
        $setting->logo = $request->logo;
        $setting->favicon = $request->favicon;
        $setting->update();
        return redirect()->route('setting.index')->withSuccess('Perfectly Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BasicSetting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(BasicSetting $setting)
    {
        $setting->delete();
        return redirect()->route('setting.index')->withSuccess('Perfectly Delete');
    }
}
