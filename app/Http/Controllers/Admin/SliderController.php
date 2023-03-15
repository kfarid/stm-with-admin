<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\ThirdPage;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBY('created_at','DESC')->get();
        $thirds = ThirdPage::all();
        return  view('admin.slider.index',compact('sliders','thirds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $thirds = ThirdPage::all();
        return view('admin.slider.create',compact('thirds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = new  Slider();
        $this->extracted($request, $slider, );
        $slider->save();
        return redirect()->route('slider.index')->withSuccess('Perfectly added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        $thirds =ThirdPage::all();
        return view('admin.slider.edit',compact('slider','thirds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $this->extracted($request, $slider);
        $slider->update();
        return redirect()->route('slider.index')->withSuccess('Perfectly update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('slider.index')->withSuccess('Perfectly deleted');
    }

    public function extracted(Request $request, Slider $slider): void
    {
        $slider->title_az = $request->title_az;
        $slider->title_en = $request->title_en;
        $slider->title_tr = $request->title_tr;
        $slider->title_ru = $request->title_ru;
        $slider->page_id = $request->page_id;
        $slider->img = $request->img;
        $slider->third_id = $request->third_id;
    }
}


