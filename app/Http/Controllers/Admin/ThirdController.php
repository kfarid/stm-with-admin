<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Panel;
use App\Models\SecondPage;
use App\Models\Slider;
use App\Models\ThirdPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\ShiftLeft;

class ThirdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thirdPage = ThirdPage::orderBy('created_at', 'desc')->get();
        return view('admin.thirdpage.index', compact('thirdPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secondPage = SecondPage::orderBy('created_at', 'desc')->get();
        $cards = Card::orderBy('created_at', 'desc')->get();
        $third = ThirdPage::orderBy('created_at', 'desc')->get();
        $panels = Panel::all();
        return view('admin.thirdpage.create', compact('secondPage', 'panels', 'cards', 'third', 'panels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thirdPage = new ThirdPage();
        $this->extracted($request, $thirdPage);
        $thirdPage->save();


        return redirect()->route('thirdpage.index')->withSuccess('Perfectly added');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seconds = SecondPage::orderBy('created_at', 'desc')->get();
        $third = ThirdPage::find($id);
        $cards = Card::orderBy('created_at', 'desc')->get();
        $panels = Panel::all();
        return view('admin.thirdpage.edit', [
            'third' => $third,
            'seconds' => $seconds,
            'panels' => $panels,
            'cards' => $cards,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $thirdPage = ThirdPage::find($id);
        $this->extracted($request, $thirdPage);
        $thirdPage->update();

        $slider = Slider::find($id);
        $slider->page_id = $request->page_id;
        $slider->third_id = $request->third_id;
        $slider->save();


        return redirect()->route('thirdpage.index')->withSuccess('Perfectly added');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('third_pages')
            ->where('id', $id)
            ->delete();
        return redirect()->route('thirdpage.index')->withSuccess('Perfectly deleted');
    }

    /**
     * @param Request $request
     * @param $thirdPage
     * @return void
     */
    public function extracted(Request $request, $thirdPage): void
    {
        $thirdPage->title_en = $request->title_en;
        $thirdPage->title_az = $request->title_az;
        $thirdPage->title_ru = $request->title_ru;
        $thirdPage->title_tr = $request->title_tr;
        $thirdPage->textarea_en = $request->textarea_en;
        $thirdPage->textarea_az = $request->textarea_az;
        $thirdPage->textarea_ru = $request->textarea_ru;
        $thirdPage->textarea_tr = $request->textarea_tr;
        $thirdPage->img = $request->img;
        $thirdPage->second_slug = $request->second_slug;
    }
}
