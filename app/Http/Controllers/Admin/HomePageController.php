<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homePage = HomePage::orderBy('created_at', 'desc')->get();

        return view('admin.homepage.index', compact('homePage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.homepage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $homePage = new HomePage();
        $homePage->title_en = $request->title_en;
        $homePage->title_az = $request->title_az;
        $homePage->title_ru = $request->title_ru;
        $homePage->title_tr = $request->title_tr;
        $homePage->img = $request->img;
        $homePage->save();

        return redirect()->route('homepage.index')->withSuccess('Perfectly added');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\HomePage $homePage
     * @return \Illuminate\Http\Response
     */
    public function show(HomePage $homePage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $home = HomePage::find($id);
        return view('admin.homepage.edit', [
            'home' => $home
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $homePage =  HomePage::find($id);
        $homePage->title_en = $request->title_en;
        $homePage->title_az = $request->title_az;
        $homePage->title_ru = $request->title_ru;
        $homePage->title_tr = $request->title_tr;
        $homePage->img = $request->img;
        $homePage->update();

        return redirect()->route('homepage.index')->withSuccess('Perfectly edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('home_pages')
            ->where('id', $id)
            ->delete();
        return redirect()->back()->withSuccess('Perfectly deleted');
    }
}
