<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\String_;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homep = HomePage::orderBy('created_at', 'desc')->get();
        return view('admin.homepage.index', compact('homep'));
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
        $homep = new HomePage();
        $homep->title = $request->title;
        $homep->img = $request->img;
        $homep->sec_id = $request->sec_id;
        $homep->save();

        return redirect()->back()->withSuccess('Perfectly added');
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
    public function edit(HomePage $homep)
    {

        return view('admin.homepage.edit',compact('homep'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomePage $homep)
    {
        $homep->title = $request->title;
        $homep->img = $request->img;
        $homep->cat_id = $request->cat_id;
        /*$homep->save();*/
        $homep->update();

        return redirect()->back()->withSuccess('Perfectly edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param HomePage $homep
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomePage $homep)
    {
        $homep->delete();
        return redirect()->back()->withSuccess('Perfectly deleted');
    }
}
