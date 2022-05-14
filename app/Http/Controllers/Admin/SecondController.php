<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use App\Models\SecondPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SecondController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secondPage = SecondPage::orderBy('created_at', 'desc')->get();
        return view('admin.secondpage.index',compact('secondPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $homePage = HomePage::orderBy('created_at', 'desc')->get();
        return view('admin.secondpage.create',compact('homePage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $secondPage = new SecondPage();
        $secondPage->title_en = $request->title_en;
        $secondPage->title_az = $request->title_az;
        $secondPage->title_ru = $request->title_ru;
        $secondPage->title_tr = $request->title_tr;
        $secondPage->img = $request->img;
        $secondPage->home_slug = $request->home_slug;
        $secondPage->save();

        return redirect()->route('secondpage.index')->withSuccess('Perfectly added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $homePage = HomePage::orderBy('created_at', 'desc')->get();
        $second = SecondPage::find($id);
        return view('admin.secondpage.edit',[
            'homePage' => $homePage,
            'second' => $second
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $secondPage =  SecondPage::find($id);
        $secondPage->title_en = $request->title_en;
        $secondPage->title_az = $request->title_az;
        $secondPage->title_ru = $request->title_ru;
        $secondPage->title_tr = $request->title_tr;
        $secondPage->img = $request->img;
        $secondPage->home_slug = $request->home_slug;
        $secondPage->update();

        return redirect()->route('secondpage.index')->withSuccess('Perfectly edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('second_pages')
            ->where('id', $id)
            ->delete();
        return redirect()->route('secondpage.index')->withSuccess('Perfectly deleted');
    }
}
