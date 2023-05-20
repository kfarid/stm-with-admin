<?php

namespace App\Http\Controllers;

use App\Models\Contactus;
use App\Models\ThirdPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactus = Contactus::orderBy('created_at', 'DESC')->get();
        return view('admin.contactus.index', compact('contactus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contactus = Contactus::all();
        return view('admin.contactus.create', compact('contactus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contactus = new Contactus();
        $this->extracted($request, $contactus);
        $contactus->save();
        return redirect()->route('contactus.index')->withSuccess('Contact added');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Contactus $contactus
     * @return \Illuminate\Http\Response
     */
    public function show(Contactus $contactus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Contactus $contactus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contactus = Contactus::find($id);
        return view('admin.contactus.edit', compact('contactus'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Contactus $contactus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contactus $contactus)
    {
        $this->extracted($request, $contactus);
        $contactus->update();
        return redirect()->route('contactus.index')->withSuccess('Contact updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Contactus $contactus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('contactuses')
            ->where('id', $id)
            ->delete();
        return redirect()->route('contactus.index')->withSuccess('Contact deleted');
    }


    /**
     * @param Request $request
     * @param Contactus $contactus
     * @return void
     */
    public function extracted(Request $request, Contactus $contactus): void
    {
        $contactus->address = $request->address;
        $contactus->num1 = $request->num1;
        $contactus->num2 = $request->num2;
        $contactus->email = $request->email;
    }
}
